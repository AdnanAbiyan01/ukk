<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Masyarakat Controller
 *
 * @property \App\Model\Table\MasyarakatTable $Masyarakat
 * @method \App\Model\Entity\Masyarakat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasyarakatController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $masyarakat = $this->paginate($this->Masyarakat);

        $this->set(compact('masyarakat'));
    }

    /**
     * View method
     *
     * @param string|null $id Masyarakat id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masyarakat = $this->Masyarakat->get($id, [
            'contain' => ['Pengaduan'],
        ]);

        $this->set(compact('masyarakat'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masyarakat = $this->Masyarakat->newEmptyEntity();
        if ($this->request->is('post')) {
            $masyarakat = $this->Masyarakat->patchEntity($masyarakat, $this->request->getData());
            if ($this->Masyarakat->save($masyarakat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Masyarakat'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Masyarakat'));
        }
        $this->set(compact('masyarakat'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Masyarakat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masyarakat = $this->Masyarakat->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masyarakat = $this->Masyarakat->patchEntity($masyarakat, $this->request->getData());
            if ($this->Masyarakat->save($masyarakat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Masyarakat'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Masyarakat'));
        }
        $this->set(compact('masyarakat'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Masyarakat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masyarakat = $this->Masyarakat->get($id);
        if ($this->Masyarakat->delete($masyarakat)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Masyarakat'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Masyarakat'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
