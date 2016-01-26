<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TeachersChangeHistory Controller
 *
 * @property \App\Model\Table\TeachersChangeHistoryTable $TeachersChangeHistory
 */
class TeachersChangeHistoryController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teachers']
        ];
        $this->set('teachersChangeHistory', $this->paginate($this->TeachersChangeHistory));
        $this->set('_serialize', ['teachersChangeHistory']);
    }

    /**
     * View method
     *
     * @param string|null $id Teachers Change History id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teachersChangeHistory = $this->TeachersChangeHistory->get($id, [
            'contain' => ['Teachers']
        ]);
        $this->set('teachersChangeHistory', $teachersChangeHistory);
        $this->set('_serialize', ['teachersChangeHistory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teachersChangeHistory = $this->TeachersChangeHistory->newEntity();
        if ($this->request->is('post')) {
            $teachersChangeHistory = $this->TeachersChangeHistory->patchEntity($teachersChangeHistory, $this->request->data);
            if ($this->TeachersChangeHistory->save($teachersChangeHistory)) {
                $this->Flash->success(__('The teachers change history has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teachers change history could not be saved. Please, try again.'));
            }
        }
        $teachers = $this->TeachersChangeHistory->Teachers->find('list', ['limit' => 200]);
        $this->set(compact('teachersChangeHistory', 'teachers'));
        $this->set('_serialize', ['teachersChangeHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Teachers Change History id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teachersChangeHistory = $this->TeachersChangeHistory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teachersChangeHistory = $this->TeachersChangeHistory->patchEntity($teachersChangeHistory, $this->request->data);
            if ($this->TeachersChangeHistory->save($teachersChangeHistory)) {
                $this->Flash->success(__('The teachers change history has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teachers change history could not be saved. Please, try again.'));
            }
        }
        $teachers = $this->TeachersChangeHistory->Teachers->find('list', ['limit' => 200]);
        $this->set(compact('teachersChangeHistory', 'teachers'));
        $this->set('_serialize', ['teachersChangeHistory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Teachers Change History id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teachersChangeHistory = $this->TeachersChangeHistory->get($id);
        if ($this->TeachersChangeHistory->delete($teachersChangeHistory)) {
            $this->Flash->success(__('The teachers change history has been deleted.'));
        } else {
            $this->Flash->error(__('The teachers change history could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
