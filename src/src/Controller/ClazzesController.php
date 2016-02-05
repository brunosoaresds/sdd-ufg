<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;


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
                $schedules = is_array($schedules) ? $schedules : [];
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
                $this->request->data['scheduleLocals'] = $scheduleLocals;
            }
            $data = $this->request->data;
            unset($data['schedules']);
            $clazz = $this->Clazzes->patchEntity($clazz, $data, [
                'associated' => ['ClazzesSchedulesLocals']
            ]);

            if ($this->Clazzes->save($clazz)) {
                $this->Flash->success(__('Turma adicionada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível adicionar a turma, tente novamente.'));
            }
        }

        $this->set('subjects', array_replace([0 => __('[Selecione]')],
            $this->Clazzes->Subjects->find('list')->toArray()));
        $this->set('processes', array_replace([0 => __('[Selecione]')],
            $this->Clazzes->Processes->find('list')->toArray()));

        $this->set('locals', array_replace([0 => __('[Selecione]')],
            $this->Clazzes->Locals->find('list')->toArray()));
        $this->set('schedules', array_replace([0 => __('[Selecione]')],
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
                $schedules = is_array($schedules) ? $schedules : [];
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
            }
            $data = $this->request->data;
            unset($data['schedules']);
            $clazz = $this->Clazzes->patchEntity($clazz, $data);
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

        $this->set('subjects', array_replace([0 => __('[Selecione]')],
            $this->Clazzes->Subjects->find('list')->toArray()));
        $this->set('processes', array_replace([0 => __('[Selecione]')],
            $this->Clazzes->Processes->find('list')->toArray()));

        $this->set('locals', array_replace([0 => __('[Selecione]')],
            $this->Clazzes->Locals->find('list')->toArray()));
        $this->set('schedules', array_replace([0 => __('[Selecione]')],
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

	/**
	* Allocate Teacher method
	*
	*/
	public function allocateTeacher($clazz_id, $teacher_id = null, $allocate = false)
	{

		$table_clazzes_teachers = TableRegistry::get('ClazzesTeachers');

		$clazzesTeachers = $table_clazzes_teachers->find('all')->where(['clazz_id' => $clazz_id]);

		$clazz = $this->Clazzes->get($clazz_id, [
            'contain' => [
				'Subjects'
				, 'Subjects.Knowledges'
				, 'Subjects.Courses'
				, 'ClazzesSchedulesLocals'
			]
        ]);

		$teachers = $this->getTeachers();

		if ($clazz_id != null && $teacher_id != null) {

			if ($this->RequestHandler->accepts('ajax')) {

				$this->response->disableCache();

				if ($teacher_id != null && $clazz_id != null && $allocate == 'allocate') {

					$query = $table_clazzes_teachers->query();
					$query->update()
							->set(['status' => 'PENDING'])
							->where([
							'clazz_id' => $clazz_id,
							'teacher_id != ' => $teacher_id
					])->execute();

					$query = $table_clazzes_teachers->query();
					$query->delete()->where([
							'clazz_id' => $clazz_id,
							'teacher_id' => $teacher_id
					])->execute();

					$query = $table_clazzes_teachers->query();
					$query->insert(['clazz_id', 'teacher_id', 'status'])->values([
							'clazz_id' => $clazz_id,
							'teacher_id' => $teacher_id,
							'status' => 'ACTIVE'
						])->execute();

					if ($query) {
						echo 'success';
					} else {
						echo 'error';
					}

					die();
				} else if ($teacher_id != null && $clazz_id != null && $allocate == 'deallocate') {

					$query = $table_clazzes_teachers->query();
					$query->update()
							->set(['status' => 'PENDING'])
							->where([
							'clazz_id' => $clazz_id,
							'teacher_id' => $teacher_id
					])->execute();

					if ($query) {
						echo 'success';
					} else {
						echo 'error';
					}
					die();

					if ($query) {
						echo 'success';
					} else {
						echo 'error';
					}
					die();
				}
			}
		}

		/* Filters */
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$teachers = $this->getTeachers($data);
			echo json_encode($teachers);
			die();
		}

		$this->set(compact('clazz'));
		$this->set('_serialize', ['clazz']);
		$this->set('teachers', $teachers);
		$this->set('_serialize', ['teachers']);
		$this->set('clazzesTeachers', $clazzesTeachers);
		$this->set('_serialize', ['clazzesTeachers']);
	}

	private function getTeachers($params = null) {

		$this->loadModel('Teachers');

		if ($params == null) {
			return $this->paginate(
				$this->Teachers->find('all')->contain(['Users', 'Clazzes', 'Clazzes.Subjects'
				, 'Clazzes.Processes', 'Knowledges', 'Roles', 'Roles.Knowledges'])
			);

		} else {

			$clazz = $this->Clazzes->get($params['clazz_id']);

			$query = $this->Teachers->find('all')
						->distinct(['Teachers.id'])
						->where([
								'COALESCE(Teachers.registry, "") LIKE ' => '%' . $params['registry'] . '%',
								'COALESCE(Teachers.workload, "") LIKE ' => '%' . $params['workload'] . '%',
								'COALESCE(Teachers.formation, "") LIKE ' => '%' . $params['formation'] . '%',
								'COALESCE(Teachers.situation, "") LIKE ' => '%' . $params['situation'] . '%'
								])
						->contain(['Users', 'Knowledges',
							'Clazzes', 'Clazzes.Subjects',
							'Clazzes.Processes', 'Roles', 'Roles.Knowledges'])
						->matching('Users', function($q) use ($params) {
							return $q->where(['Users.name LIKE ' => '%' . $params['name'] . '%']);
						});



			if ($params['only_clazz'] == 1) {
				$query->matching('ClazzesTeachers', function($q) use ($clazz) {
					return $q->where(['ClazzesTeachers.clazz_id' => $clazz->id]);
				});
			}

			if ($params['knowledge'] == '') {

				if ($params['only_knowledge'] == 0) {
					$query->leftJoinWith('Knowledges', function($q) use ($params) {
						return $q->where(['COALESCE(Knowledges.name, "") LIKE ' => '%' . $params['knowledge'] . '%']);
					});
				} else {
					$params_clazz = array();
					$params_clazz[] = $params;
					$params_clazz[] = $clazz;

					$query->leftJoinWith('Knowledges', function($q) use ($params_clazz) {
						return $q->where(['COALESCE(Knowledges.name, "") LIKE ' => '%' . $params_clazz[0]['knowledge'] . '%'])
							->where(['Knowledges.id' => $params_clazz[1]->knowledge]);
					});
				}


			} else {
				if ($params['only_knowledge'] == 0) {
					$query->matching('Knowledges', function($q) use ($params) {
						return $q->where(['COALESCE(Knowledges.name, "") LIKE ' => '%' . $params['knowledge'] . '%']);
					});
				} else {

					$query->matching('Knowledges', function($q) use ($params) {
						return $q->where(['COALESCE(Knowledges.name, "") LIKE ' => '%' . $params['knowledge'] . '%'])
							->where(['Knowledges.id' => $clazz->knowledge]);
					});
				}
			}

			return $query->all();

		}

	}

	public function listOpenedClazzes()
	{
		$processes = $this->Clazzes->Processes->find('list')
            ->where(['initial_date <= ' => 'CURDATE()', 'final_date >= ' => 'CURDATE()'])
            ->orWhere(['status' => 'OPEN'])
            ->toArray();

        $processes = array_replace(['' => __('[Selecione]')], $processes);

		if (count($processes) < 2) {
			$this->Flash->info(__('Não existe nenhum Processo de Distribuição de Disciplinas aberto.'));
			$this->set('process_exists', false);
			$this->set('_serialize', ['process_exists']);
			$this->set('clazzes', array());
			$this->set('_serialize', ['clazzes']);
			$this->set('processes', array());
			$this->set('_serialize', ['processes']);
			$this->set('process_options', array());
			$this->set('_serialize', ['process_options']);
		} else {
			$clazzes = $this->getClazzes();

			/* Filters */
			if ($this->request->is('post')) {
				$data = $this->request->data;
				$clazzes = $this->getClazzes($data);
				echo json_encode($clazzes);
				die();
			}

			$this->set('clazzes', $clazzes);
			$this->set('_serialize', ['clazzes']);
			$this->set('processes', $processes);
			$this->set('_serialize', ['processes']);
			$this->set('process_exists', true);
			$this->set('_serialize', ['process_exists']);
		}
	}


	public function getClazzes($params = null)
	{
        $data = $this->Clazzes->find('all')
            ->contain([
                'Subjects.Courses', 'Subjects.Knowledges',
                'ClazzesSchedulesLocals.Locals', 'ClazzesSchedulesLocals.Schedules',
                'Processes'
            ]);

        if($params !== null) {
            $data->where([
                "Knowledges.name LIKE" => "%" . $params['knowledge_name'] . "%",
                "Clazzes.process_id" => $params['process']
            ]);
        }

        return $data->toArray();
	}
}
