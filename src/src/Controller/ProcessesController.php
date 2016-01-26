<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Processes Controller
 *
 * @property \App\Model\Table\ProcessesTable $Processes
 */
class ProcessesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('processes', $this->paginate($this->Processes));
        $this->set('_serialize', ['processes']);
    }

    /**
     * View method
     *
     * @param string|null $id Process id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $process = $this->Processes->get($id, [
            'contain' => ['ProcessConfigurations', 'Clazzes']
        ]);
        $this->set('process', $process);
        $this->set('_serialize', ['process']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $process = $this->Processes->newEntity();
        if ($this->request->is('post')) {
            $process = $this->Processes->patchEntity($process, $this->request->data);
            if ($this->Processes->save($process)) {
                $this->Flash->success(__('The process has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The process could not be saved. Please, try again.'));
            }
        }
        $processConfigurations = $this->Processes->ProcessConfigurations->find('list', ['limit' => 200]);
        $this->set(compact('process', 'processConfigurations'));
        $this->set('_serialize', ['process']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Process id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $process = $this->Processes->get($id, [
            'contain' => ['ProcessConfigurations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $process = $this->Processes->patchEntity($process, $this->request->data);
            if ($this->Processes->save($process)) {
                $this->Flash->success(__('The process has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The process could not be saved. Please, try again.'));
            }
        }
        $processConfigurations = $this->Processes->ProcessConfigurations->find('list', ['limit' => 200]);
        $this->set(compact('process', 'processConfigurations'));
        $this->set('_serialize', ['process']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Process id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $process = $this->Processes->get($id);
        if ($this->Processes->delete($process)) {
            $this->Flash->success(__('The process has been deleted.'));
        } else {
            $this->Flash->error(__('The process could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
