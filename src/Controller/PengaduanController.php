<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pengaduan Controller
 *
 * @property \App\Model\Table\PengaduanTable $Pengaduan
 * @method \App\Model\Entity\Pengaduan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PengaduanController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $pengaduan = $this->paginate($this->Pengaduan);

        $this->set(compact('pengaduan'));
    }

    /**
     * View method
     *
     * @param string|null $id Pengaduan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pengaduan = $this->Pengaduan->get($id, [
            'contain' => ['Tanggapan'],
        ]);

        $this->set(compact('pengaduan'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pengaduan = $this->Pengaduan->newEmptyEntity();
        if ($this->request->is('post')) {
            $files = $this->request->getUploadedFiles();
            $files['foto']->getStream();
            $files['foto']->getSize();
            $files['foto']->getClientFileName();

            // Memberi nama file untuk disimpan di db
            $myname = $this->request->getData()['foto']->getClientFileName();
            // Mengambil nama ektensi file
            $myext = substr(strchr($myname, "."), 1);

            $mypath = "upload/".$myname.".". $myext;
            $pengaduan = $this->Pengaduan->patchEntity($pengaduan, $this->request->getData());
            $pengaduan->foto = $myname.".". $myext;
            // memindahkan foto
            $files['foto']->foto = $myname .".". $myext;
            $pengaduan = $this->Pengaduan->patchEntity($pengaduan, $this->request->getData());
            if ($this->Pengaduan->save($pengaduan)) {
                $this->Flash->success(__('The pengaduan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pengaduan could not be saved. Please, try again.'));
        }
        $masyarakat = $this->Pengaduan->Masyarakat->find('list');
        $this->set(compact('pengaduan', 'masyarakat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pengaduan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pengaduan = $this->Pengaduan->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pengaduan = $this->Pengaduan->patchEntity($pengaduan, $this->request->getData());
            if ($this->Pengaduan->save($pengaduan)) {
                $this->Flash->success(__('The pengaduan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pengaduan could not be saved. Please, try again.'));
        }
        $this->set(compact('pengaduan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pengaduan id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pengaduan = $this->Pengaduan->get($id);
        if ($this->Pengaduan->delete($pengaduan)) {
            $this->Flash->success(__('The pengaduan has been deleted.'));
        } else {
            $this->Flash->error(__('The pengaduan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
