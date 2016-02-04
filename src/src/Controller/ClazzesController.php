<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clazzes Controller
 *
 * @property \App\Model\Table\ClazzesTable $Clazzes
 */
class ClazzesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Processes', 'Subjects', 'ClazzesTeachers.Teachers.Users']
        ];
        $this->set('clazzes', $this->paginate($this->Clazzes));
        $this->set('_serialize', ['clazzes']);
    }

    /**
     * View method
     *
     * @param string|null $id Clazze id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clazz = $this->Clazzes->get($id, [
            'contain' => [
                'Processes', 'Subjects', 'ClazzesTeachers.Teachers.Users',
                'ClazzesSchedulesLocals.Locals', 'ClazzesSchedulesLocals.Schedules'
            ]
        ]);
        $this->set('clazz', $clazz);
        $this->set('_serialize', ['clazz']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clazz = $this->Clazzes->newEntity();
        if ($this->request->is('post')) {
            if(isset($this->request->data['schedules'])) {
                $schedules = json_decode($this->request->data['schedules'], true);
                $scheduleLocals = [];
                foreach($schedules as $weekDay) {
                    if($weekDay == null) {
                        continue;
                    }
                    foreach($weekDay as $schedule) {
                        $scheduleLocals[] = [
                            "schedule_id" => $schedule['schedule_id'],
                            "local_id" => $schedule['local_id'],
                            "week_day" => $schedule['week_day']
                        ];
                    }
                }
                unset($this->request->data['schedules']);
                $this->request->data['scheduleLocals'] = $scheduleLocals;
            }

            $clazz = $this->Clazzes->patchEntity($clazz, $this->request->data, [
                'associated' => ['ClazzesSchedulesLocals']
            ]);

            if ($this->Clazzes->save($clazz)) {
                $this->Flash->success(__('Turma adicionada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível adicionar a turma, tente novamente.'));
            }
        }

        $this->set('subjects', array_replace([0 => _('[Selecione]')],
            $this->Clazzes->Subjects->find('list')->toArray()));
        $this->set('processes', array_replace([0 => _('[Selecione]')],
            $this->Clazzes->Processes->find('list')->toArray()));

        $this->set('locals', array_replace([0 => _('[Selecione]')],
            $this->Clazzes->Locals->find('list')->toArray()));
        $this->set('schedules', array_replace([0 => _('[Selecione]')],
            $this->Clazzes->Schedules->find('list')->toArray()));

        $this->set(compact('clazz'));
        $this->set('_serialize', ['clazz']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clazze id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clazz = $this->Clazzes->get($id, [
            'contain' => ['Processes', 'Subjects', 'ClazzesSchedulesLocals']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            if(isset($this->request->data['schedules'])) {
                $schedules = json_decode($this->request->data['schedules'], true);
                $scheduleLocals = [];

                foreach($schedules as $weekDay) {
                    if($weekDay == null) {
                        continue;
                    }
                    foreach($weekDay as $schedule) {
                        $scheduleLocalEnt = $this->Clazzes->ClazzesSchedulesLocals->newEntity([
                            "clazz_id" => $clazz->id,
                            "schedule_id" => $schedule['schedule_id'],
                            "local_id" => $schedule['local_id'],
                            "week_day" => $schedule['week_day']
                        ]);

                        $scheduleLocals[] = $scheduleLocalEnt;
                    }
                }
                unset($this->request->data['schedules']);
            }

            $clazz = $this->Clazzes->patchEntity($clazz, $this->request->data);
            if(isset($scheduleLocals)) {
                $this->Clazzes->ClazzesSchedulesLocals->deleteAll(['clazz_id' => $clazz->id]);
                $clazz->scheduleLocals = $scheduleLocals;
                $clazz->dirty('scheduleLocals', true);
            }

            if ($this->Clazzes->save($clazz)) {
                $this->Flash->success(__('Turma modificada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível modificar a turma, tente novamente.'));
            }
        }

        $schedules = [[], [], [], [], [], [], [], []];
        $schedulesIndex = 0;
        foreach($clazz->scheduleLocals as $scheduledLocal) {
            $schedules[$scheduledLocal->week_day][] = [
                "id" => $schedulesIndex++,
                "week_day" => $scheduledLocal->week_day,
                "schedule_id" => $scheduledLocal->schedule_id,
                "local_id" => $scheduledLocal->local_id
            ];
        }

        $this->set('scheduledLocals', json_encode($schedules));

        $this->set('subjects', array_replace([0 => _('[Selecione]')],
            $this->Clazzes->Subjects->find('list')->toArray()));
        $this->set('processes', array_replace([0 => _('[Selecione]')],
            $this->Clazzes->Processes->find('list')->toArray()));

        $this->set('locals', array_replace([0 => _('[Selecione]')],
            $this->Clazzes->Locals->find('list')->toArray()));
        $this->set('schedules', array_replace([0 => _('[Selecione]')],
            $this->Clazzes->Schedules->find('list')->toArray()));

        $this->set(compact('clazz'));
        $this->set('_serialize', ['clazz']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clazze id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clazze = $this->Clazzes->get($id);
        if ($this->Clazzes->delete($clazze)) {
            $this->Flash->success(__('Turma removida com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível remover a turma, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
