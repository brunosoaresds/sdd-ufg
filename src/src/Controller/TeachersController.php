<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Teachers Controller
 *
 * @property \App\Model\Table\TeachersTable $Teachers
 */
class TeachersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('teachers', $this->paginate($this->Teachers->find('all')->contain(['Users'])));
        $this->set('_serialize', ['teachers']);
    }

    /**
     * View method
     *
     * @param string|null $id Teacher id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('teacher', $teacher);
        $this->set('_serialize', ['teacher']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$teacher = $this->Teachers->newEntity();
		
		if ($this->request->is('post')) {
			
			$data = $this->request->data;
			$data['user']['is_admin'] = isset($this->request->data['user']['is_admin']) ? 1 : 0;

			$teacher = $this->Teachers->newEntity($data, [
				'associated' => ['Users' => ['validate' => 'default']]
			]);
			
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));
                return $this->redirect(['action' => 'edit', $teacher->id]);
            } else {
                $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('teacher'));
        $this->set('_serialize', ['teacher']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacher id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => ['Users'
				, 'Clazzes'
				, 'Clazzes.Subjects'
				, 'Clazzes.Subjects.Knowledges'
				, 'Clazzes.Subjects.Courses'
			]
        ]);
		
		$clazzes = $this->getClazzes();
		
        if ($this->request->is(['patch', 'post', 'put'])) {				
			
			$data = $this->request->data;
			$data['user']['is_admin'] = isset($this->request->data['user']['is_admin']) ? 1 : 0;
			
			if (!empty($this->request->data['pwd'])) {
				$data['user']['password'] = $data['pwd'];
				unset($data['pwd']);
			}
			
			$teacher = $this->Teachers->patchEntity($teacher, $data, [
				'associated' => ['Users' => ['validate' => 'default']]
			]);
			
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
            }
        }
		
		
        $this->set(compact('teacher'));
        $this->set('_serialize', ['teacher']);
		$this->set('clazzes', $clazzes);
        $this->set('_serialize', ['clazzes']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teacher = $this->Teachers->get($id);
        if ($this->Teachers->delete($teacher)) {
            $this->Flash->success(__('The teacher has been deleted.'));
        } else {
            $this->Flash->error(__('The teacher could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	/**
     * Allocate Knowledges method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	public function allocateKnowledges($id = null) 
	{
		$teacher = $this->Teachers->get($id, [
            'contain' => ['Users'
				, 'Clazzes'
				, 'Clazzes.Subjects'
				, 'Clazzes.Subjects.Knowledges'
				, 'Clazzes.Subjects.Courses'
			]
        ]);
		
		$knowledges = $this->getKnowledges();
		
        if ($this->request->is(['patch', 'post', 'put'])) {				
			
			$data = $this->request->data;
			
        }

		$this->set(compact('teacher'));
        $this->set('_serialize', ['teacher']);
		$this->set('knowledges', $knowledges);
        $this->set('_serialize', ['knowledges']);
	}
	
	/**
     * Allocate Clazzes method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	public function allocateClazzes($id = null) 
	{
		$teacher = $this->Teachers->get($id, [
            'contain' => ['Users'
				, 'Clazzes'
				, 'Clazzes.Subjects'
				, 'Clazzes.Subjects.Knowledges'
				, 'Clazzes.Subjects.Courses'
			]
        ]);
		
		$clazzes = $this->getClazzes();
		
        if ($this->request->is(['patch', 'post', 'put'])) {				
			
			$data = $this->request->data;
			
        }
		$this->set(compact('teacher'));
        $this->set('_serialize', ['teacher']);
		$this->set('clazzes', $clazzes);
        $this->set('_serialize', ['clazzes']);
	}

	/**
     * Get Knowledges method
     *
     * @param array|null $params Filters.
     * @return paginated data.
     */
	private function getKnowledges($params = null) 
    {
		return null;
	}
	
	/**
     * Get Clazzes method
     *
     * @param array|null $params Filters.
     * @return paginated data.
     */
    private function getClazzes($params = null) 
    {	
		$this->loadModel('ClazzesSchedulesLocals');
		$this->loadModel('Clazzes');
		
		/*array('clazz_name' => ''
					, 'subject_name' => ''
					, 'course_name' => ''
					, 'knowledge_name' => ''
					, 'week_day' => ''
					, 'start_time' => ''
					, 'end_time' => ''
					, 'address' => ''*/

		if ($params == null) {
			return $this->paginate($this->ClazzesSchedulesLocals->find()
					->contain(['Clazzes', 'Clazzes.Subjects', 'Clazzes.Subjects.Knowledges', 'Clazzes.Subjects.Courses', 'Locals', 'Schedules']));
					//->where(['process_id' => $params['process_id']])
		
		} else {
		
			$query = $this->ClazzesSchedulesLocals->find()->matching('Clazzes', function ($q) {
				return $q->where([
					'Clazzes.name LIKE ' => (!empty($params['clazz_name']) ? '%' . $params['clazz_name'] . '%' : '')
				]);
			})->matching('Clazzes.Subjects', function ($q) {
				return $q->where([
					'Clazzes.Subjects.name LIKE ' => (!empty($params['subject_name']) ? '%' . $params['subject_name'] . '%' : '')
					, 'Clazzes.Subjects.Courses.name LIKE ' => (!empty($params['course_name']) ? '%' . $params['course_name'] . '%' : '')
					, 'Clazzes.Subjects.Knowleges.name LIKE ' => (!empty($params['knowledge_name']) ? '%' . $params['knowledge_name'] . '%' : '')
				]);
			})->matching('Locals', function ($q) {
				return $q->where([
					'Locals.address LIKE' => (!empty($params['address']) ? '%' . $params['address'] . '%' : '')
				]);
			})->matching('Schedules', function ($q) {
				return $q->where([
					'Schedules.week_day LIKE ' =>(!empty($params['week_day']) ? '%' . $params['week_day'] . '%' : '')
					, 'Schedules.start_time LIKE' => (!empty($params['start_time']) ? '%' . $params['start_time'] . '%' : '')
					, 'Schedules.end_time LIKE' => (!empty($params['end_time']) ? '%' . $params['end_time'] . '%' : '')
				]);
			});

			return $this->paginate($query);
		}

    }
}
