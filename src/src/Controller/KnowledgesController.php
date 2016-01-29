<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Knowledges Controller
 *
 * @property \App\Model\Table\KnowledgesTable $Knowledges
 */
class KnowledgesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('knowledges', $this->paginate($this->Knowledges));
        $this->set('_serialize', ['knowledges']);
    }

    /**
     * View method
     *
     * @param string|null $id Knowledge id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $knowledge = $this->Knowledges->get($id, [
            'contain' => []
        ]);
        $this->set('knowledge', $knowledge);
        $this->set('_serialize', ['knowledge']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $knowledge = $this->Knowledges->newEntity();
        if ($this->request->is('post')) {
            $knowledge = $this->Knowledges->patchEntity($knowledge, $this->request->data);
            if ($this->Knowledges->save($knowledge)) {
                $this->Flash->success(__('The knowledge has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The knowledge could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('knowledge'));
        $this->set('_serialize', ['knowledge']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Knowledge id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $knowledge = $this->Knowledges->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $knowledge = $this->Knowledges->patchEntity($knowledge, $this->request->data);
            if ($this->Knowledges->save($knowledge)) {
                $this->Flash->success(__('The knowledge has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The knowledge could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('knowledge'));
        $this->set('_serialize', ['knowledge']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Knowledge id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $knowledge = $this->Knowledges->get($id);
        if ($this->Knowledges->delete($knowledge)) {
            $this->Flash->success(__('The knowledge has been deleted.'));
        } else {
            $this->Flash->error(__('The knowledge could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
