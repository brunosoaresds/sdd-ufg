<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * KnowledgesTeachers Controller
 *
 * @property \App\Model\Table\KnowledgesTeachersTable $KnowledgesTeachers
 */
class KnowledgesTeachersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teachers', 'Knowledges']
        ];
        $this->set('knowledgesTeachers', $this->paginate($this->KnowledgesTeachers));
        $this->set('_serialize', ['knowledgesTeachers']);
    }

    /**
     * View method
     *
     * @param string|null $id Knowledges Teacher id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $knowledgesTeacher = $this->KnowledgesTeachers->get($id, [
            'contain' => ['Teachers', 'Knowledges']
        ]);
        $this->set('knowledgesTeacher', $knowledgesTeacher);
        $this->set('_serialize', ['knowledgesTeacher']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $knowledgesTeacher = $this->KnowledgesTeachers->newEntity();
        if ($this->request->is('post')) {
            $knowledgesTeacher = $this->KnowledgesTeachers->patchEntity($knowledgesTeacher, $this->request->data);
            if ($this->KnowledgesTeachers->save($knowledgesTeacher)) {
                $this->Flash->success(__('The knowledges teacher has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The knowledges teacher could not be saved. Please, try again.'));
            }
        }
        $teachers = $this->KnowledgesTeachers->Teachers->find('list', ['limit' => 200]);
        $knowledges = $this->KnowledgesTeachers->Knowledges->find('list', ['limit' => 200]);
        $this->set(compact('knowledgesTeacher', 'teachers', 'knowledges'));
        $this->set('_serialize', ['knowledgesTeacher']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Knowledges Teacher id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $knowledgesTeacher = $this->KnowledgesTeachers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $knowledgesTeacher = $this->KnowledgesTeachers->patchEntity($knowledgesTeacher, $this->request->data);
            if ($this->KnowledgesTeachers->save($knowledgesTeacher)) {
                $this->Flash->success(__('The knowledges teacher has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The knowledges teacher could not be saved. Please, try again.'));
            }
        }
        $teachers = $this->KnowledgesTeachers->Teachers->find('list', ['limit' => 200]);
        $knowledges = $this->KnowledgesTeachers->Knowledges->find('list', ['limit' => 200]);
        $this->set(compact('knowledgesTeacher', 'teachers', 'knowledges'));
        $this->set('_serialize', ['knowledgesTeacher']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Knowledges Teacher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $knowledgesTeacher = $this->KnowledgesTeachers->get($id);
        if ($this->KnowledgesTeachers->delete($knowledgesTeacher)) {
            $this->Flash->success(__('The knowledges teacher has been deleted.'));
        } else {
            $this->Flash->error(__('The knowledges teacher could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
