<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Supliers Controller
 *
 * @property \App\Model\Table\SupliersTable $Supliers
 */
class SupliersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Supliers->find();
        $supliers = $this->paginate($query);

        $this->set(compact('supliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Suplier id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $suplier = $this->Supliers->get($id, contain: ['Products']);
        $this->set(compact('suplier'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suplier = $this->Supliers->newEmptyEntity();
        if ($this->request->is('post')) {
            $suplier = $this->Supliers->patchEntity($suplier, $this->request->getData());
            if ($this->Supliers->save($suplier)) {
                $this->Flash->success(__('The suplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suplier could not be saved. Please, try again.'));
        }
        $this->set(compact('suplier'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Suplier id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $suplier = $this->Supliers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suplier = $this->Supliers->patchEntity($suplier, $this->request->getData());
            if ($this->Supliers->save($suplier)) {
                $this->Flash->success(__('The suplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suplier could not be saved. Please, try again.'));
        }
        $this->set(compact('suplier'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Suplier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suplier = $this->Supliers->get($id);
        if ($this->Supliers->delete($suplier)) {
            $this->Flash->success(__('The suplier has been deleted.'));
        } else {
            $this->Flash->error(__('The suplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
