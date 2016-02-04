<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Locals Controller
 *
 * @property \App\Model\Table\LocalsTable $Locals
 */
class LocalsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [ 'ClazzesSchedulesLocals' ]
        ];
        $this->set('locals', $this->paginate($this->Locals));
        $this->set('_serialize', ['locals']);
    }

    /**
     * View method
     *
     * @param string|null $id Local id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $local = $this->Locals->get($id, [
            'contain' => [
            ]
        ]);
        $this->set('clazzesSchedulesLocals', $this->Locals->ClazzesSchedulesLocals->find('all', array('conditions' => array('local_id' => $local->id))));
        $this->set('local', $local);
        $this->set('_serialize', ['local']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $local = $this->Locals->newEntity();
        if ($this->request->is('post')) {
            $local = $this->Locals->patchEntity($local, $this->request->data);
            if ($this->Locals->save($local)) {
                $this->Flash->success(__('Local adicionada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível adicionar a local, tente novamente.'));
            }
        }
        $this->set(compact('local'));
        $this->set('_serialize', ['local']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Local id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $local = $this->Locals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $local = $this->Locals->patchEntity($local, $this->request->data);
            if ($this->Locals->save($local)) {
                $this->Flash->success(__('Local modificada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível modificar a local, tente novamente.'));
            }
        }
        $this->set(compact('local'));
        $this->set('_serialize', ['local']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Local id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $local = $this->Locals->get($id);
        if ($this->Locals->delete($local)) {
            $this->Flash->success(__('Local removida com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível remover a local, tente novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
