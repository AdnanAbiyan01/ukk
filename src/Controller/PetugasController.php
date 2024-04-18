<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Petugas Controller
 *
 * @property \App\Model\Table\PetugasTable $Petugas
 * @method \App\Model\Entity\Petuga[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PetugasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $petugas = $this->paginate($this->Petugas);

        $this->set(compact('petugas'));
    }

    /**
     * View method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $petuga = $this->Petugas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('petuga'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $petuga = $this->Petugas->newEmptyEntity();
        if ($this->request->is('post')) {
            $petuga = $this->Petugas->patchEntity($petuga, $this->request->getData());
            if ($this->Petugas->save($petuga)) {
                $this->Flash->success(__('The {0} has been saved.', 'Petuga'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Petuga'));
        }
        $this->set(compact('petuga'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $petuga = $this->Petugas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $petuga = $this->Petugas->patchEntity($petuga, $this->request->getData());
            if ($this->Petugas->save($petuga)) {
                $this->Flash->success(__('The {0} has been saved.', 'Petuga'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Petuga'));
        }
        $this->set(compact('petuga'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Petuga id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $petuga = $this->Petugas->get($id);
        if ($this->Petugas->delete($petuga)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Petuga'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Petuga'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
