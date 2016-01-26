<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClazzesTeachers Controller
 *
 * @property \App\Model\Table\ClazzesTeachersTable $ClazzesTeachers
 */
class ClazzesTeachersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clazzes', 'Teachers']
        ];
        $this->set('clazzesTeachers', $this->paginate($this->ClazzesTeachers));
        $this->set('_serialize', ['clazzesTeachers']);
    }

    /**
     * View method
     *
     * @param string|null $id Clazzes Teacher id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clazzesTeacher = $this->ClazzesTeachers->get($id, [
            'contain' => ['Clazzes', 'Teachers']
        ]);
        $this->set('clazzesTeacher', $clazzesTeacher);
        $this->set('_serialize', ['clazzesTeacher']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clazzesTeacher = $this->ClazzesTeachers->newEntity();
        if ($this->request->is('post')) {
            $clazzesTeacher = $this->ClazzesTeachers->patchEntity($clazzesTeacher, $this->request->data);
            if ($this->ClazzesTeachers->save($clazzesTeacher)) {
                $this->Flash->success(__('The clazzes teacher has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clazzes teacher could not be saved. Please, try again.'));
            }
        }
        $clazzes = $this->ClazzesTeachers->Clazzes->find('list', ['limit' => 200]);
        $teachers = $this->ClazzesTeachers->Teachers->find('list', ['limit' => 200]);
        $this->set(compact('clazzesTeacher', 'clazzes', 'teachers'));
        $this->set('_serialize', ['clazzesTeacher']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clazzes Teacher id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clazzesTeacher = $this->ClazzesTeachers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clazzesTeacher = $this->ClazzesTeachers->patchEntity($clazzesTeacher, $this->request->data);
            if ($this->ClazzesTeachers->save($clazzesTeacher)) {
                $this->Flash->success(__('The clazzes teacher has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clazzes teacher could not be saved. Please, try again.'));
            }
        }
        $clazzes = $this->ClazzesTeachers->Clazzes->find('list', ['limit' => 200]);
        $teachers = $this->ClazzesTeachers->Teachers->find('list', ['limit' => 200]);
        $this->set(compact('clazzesTeacher', 'clazzes', 'teachers'));
        $this->set('_serialize', ['clazzesTeacher']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clazzes Teacher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clazzesTeacher = $this->ClazzesTeachers->get($id);
        if ($this->ClazzesTeachers->delete($clazzesTeacher)) {
            $this->Flash->success(__('The clazzes teacher has been deleted.'));
        } else {
            $this->Flash->error(__('The clazzes teacher could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
