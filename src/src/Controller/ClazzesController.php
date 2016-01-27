<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $clazze = $this->Clazzes->get($id, [
            'contain' => []
        ]);
        $this->set('clazze', $clazze);
        $this->set('_serialize', ['clazze']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clazze = $this->Clazzes->newEntity();
        if ($this->request->is('post')) {
            $clazze = $this->Clazzes->patchEntity($clazze, $this->request->data);
            if ($this->Clazzes->save($clazze)) {
                $this->Flash->success(__('The clazze has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clazze could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('clazze'));
        $this->set('_serialize', ['clazze']);
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
        $clazze = $this->Clazzes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clazze = $this->Clazzes->patchEntity($clazze, $this->request->data);
            if ($this->Clazzes->save($clazze)) {
                $this->Flash->success(__('The clazze has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clazze could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('clazze'));
        $this->set('_serialize', ['clazze']);
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
            $this->Flash->success(__('The clazze has been deleted.'));
        } else {
            $this->Flash->error(__('The clazze could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
