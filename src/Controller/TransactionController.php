<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Transaction Controller
 *
 * @property \App\Model\Table\TransactionTable $Transaction
 */
class TransactionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Transaction->find()
            ->contain(['Products', 'Customers']);
        $transaction = $this->paginate($query);

        $this->set(compact('transaction'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transaction->get($id, contain: ['Products', 'Customers']);
        $this->set(compact('transaction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transaction = $this->Transaction->newEmptyEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transaction->patchEntity($transaction, $this->request->getData());
            if ($this->Transaction->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $products = $this->Transaction->Products->find('list', limit: 200)->all();
        $customers = $this->Transaction->Customers->find('list', limit: 200)->all();
        $this->set(compact('transaction', 'products', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transaction->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transaction->patchEntity($transaction, $this->request->getData());
            if ($this->Transaction->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $products = $this->Transaction->Products->find('list', limit: 200)->all();
        $customers = $this->Transaction->Customers->find('list', limit: 200)->all();
        $this->set(compact('transaction', 'products', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transaction->get($id);
        if ($this->Transaction->delete($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
