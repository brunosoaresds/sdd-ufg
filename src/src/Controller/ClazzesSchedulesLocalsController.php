<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClazzesSchedulesLocals Controller
 *
 * @property \App\Model\Table\ClazzesSchedulesLocalsTable $ClazzesSchedulesLocals
 */
class ClazzesSchedulesLocalsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clazzes', 'Schedules', 'Locals']
        ];
        $this->set('clazzesSchedulesLocals', $this->paginate($this->ClazzesSchedulesLocals));
        $this->set('_serialize', ['clazzesSchedulesLocals']);
    }

    /**
     * View method
     *
     * @param string|null $id Clazzes Schedules Local id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clazzesSchedulesLocal = $this->ClazzesSchedulesLocals->get($id, [
            'contain' => ['Clazzes', 'Schedules', 'Locals']
        ]);
        $this->set('clazzesSchedulesLocal', $clazzesSchedulesLocal);
        $this->set('_serialize', ['clazzesSchedulesLocal']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clazzesSchedulesLocal = $this->ClazzesSchedulesLocals->newEntity();
        if ($this->request->is('post')) {
            $clazzesSchedulesLocal = $this->ClazzesSchedulesLocals->patchEntity($clazzesSchedulesLocal, $this->request->data);
            if ($this->ClazzesSchedulesLocals->save($clazzesSchedulesLocal)) {
                $this->Flash->success(__('The clazzes schedules local has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clazzes schedules local could not be saved. Please, try again.'));
            }
        }
        $clazzes = $this->ClazzesSchedulesLocals->Clazzes->find('list', ['limit' => 200]);
        $schedules = $this->ClazzesSchedulesLocals->Schedules->find('list', ['limit' => 200]);
        $locals = $this->ClazzesSchedulesLocals->Locals->find('list', ['limit' => 200]);
        $this->set(compact('clazzesSchedulesLocal', 'clazzes', 'schedules', 'locals'));
        $this->set('_serialize', ['clazzesSchedulesLocal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clazzes Schedules Local id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clazzesSchedulesLocal = $this->ClazzesSchedulesLocals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clazzesSchedulesLocal = $this->ClazzesSchedulesLocals->patchEntity($clazzesSchedulesLocal, $this->request->data);
            if ($this->ClazzesSchedulesLocals->save($clazzesSchedulesLocal)) {
                $this->Flash->success(__('The clazzes schedules local has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clazzes schedules local could not be saved. Please, try again.'));
            }
        }
        $clazzes = $this->ClazzesSchedulesLocals->Clazzes->find('list', ['limit' => 200]);
        $schedules = $this->ClazzesSchedulesLocals->Schedules->find('list', ['limit' => 200]);
        $locals = $this->ClazzesSchedulesLocals->Locals->find('list', ['limit' => 200]);
        $this->set(compact('clazzesSchedulesLocal', 'clazzes', 'schedules', 'locals'));
        $this->set('_serialize', ['clazzesSchedulesLocal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clazzes Schedules Local id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clazzesSchedulesLocal = $this->ClazzesSchedulesLocals->get($id);
        if ($this->ClazzesSchedulesLocals->delete($clazzesSchedulesLocal)) {
            $this->Flash->success(__('The clazzes schedules local has been deleted.'));
        } else {
            $this->Flash->error(__('The clazzes schedules local could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
