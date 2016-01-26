<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProcessesProcessConfigurations Controller
 *
 * @property \App\Model\Table\ProcessesProcessConfigurationsTable $ProcessesProcessConfigurations
 */
class ProcessesProcessConfigurationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Processes', 'ProcessConfigurations']
        ];
        $this->set('processesProcessConfigurations', $this->paginate($this->ProcessesProcessConfigurations));
        $this->set('_serialize', ['processesProcessConfigurations']);
    }

    /**
     * View method
     *
     * @param string|null $id Processes Process Configuration id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $processesProcessConfiguration = $this->ProcessesProcessConfigurations->get($id, [
            'contain' => ['Processes', 'ProcessConfigurations']
        ]);
        $this->set('processesProcessConfiguration', $processesProcessConfiguration);
        $this->set('_serialize', ['processesProcessConfiguration']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $processesProcessConfiguration = $this->ProcessesProcessConfigurations->newEntity();
        if ($this->request->is('post')) {
            $processesProcessConfiguration = $this->ProcessesProcessConfigurations->patchEntity($processesProcessConfiguration, $this->request->data);
            if ($this->ProcessesProcessConfigurations->save($processesProcessConfiguration)) {
                $this->Flash->success(__('The processes process configuration has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The processes process configuration could not be saved. Please, try again.'));
            }
        }
        $processes = $this->ProcessesProcessConfigurations->Processes->find('list', ['limit' => 200]);
        $processConfigurations = $this->ProcessesProcessConfigurations->ProcessConfigurations->find('list', ['limit' => 200]);
        $this->set(compact('processesProcessConfiguration', 'processes', 'processConfigurations'));
        $this->set('_serialize', ['processesProcessConfiguration']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Processes Process Configuration id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $processesProcessConfiguration = $this->ProcessesProcessConfigurations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $processesProcessConfiguration = $this->ProcessesProcessConfigurations->patchEntity($processesProcessConfiguration, $this->request->data);
            if ($this->ProcessesProcessConfigurations->save($processesProcessConfiguration)) {
                $this->Flash->success(__('The processes process configuration has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The processes process configuration could not be saved. Please, try again.'));
            }
        }
        $processes = $this->ProcessesProcessConfigurations->Processes->find('list', ['limit' => 200]);
        $processConfigurations = $this->ProcessesProcessConfigurations->ProcessConfigurations->find('list', ['limit' => 200]);
        $this->set(compact('processesProcessConfiguration', 'processes', 'processConfigurations'));
        $this->set('_serialize', ['processesProcessConfiguration']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Processes Process Configuration id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $processesProcessConfiguration = $this->ProcessesProcessConfigurations->get($id);
        if ($this->ProcessesProcessConfigurations->delete($processesProcessConfiguration)) {
            $this->Flash->success(__('The processes process configuration has been deleted.'));
        } else {
            $this->Flash->error(__('The processes process configuration could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
