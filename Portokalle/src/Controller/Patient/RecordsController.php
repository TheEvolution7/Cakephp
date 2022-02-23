<?php
namespace App\Controller\Patient;

use App\Controller\Patient\AppController;
use Cake\Routing\Router;

class RecordsController extends AppController
{
    public function listImage($id = null)
    {
        $record = $this->Records->get($id);
        $this->set(compact('record'));
    }

    public function jedit($id = null)
    {
        $record = $this->Records->get($id);

        if ($this->request->is('ajax')) {
            $record = $this->Records->patchEntity($record, $this->request->getData());
            $name = explode('.', $this->request->getData('file.name'));
            $record->record_attachments = $record->record_attachments . $name[0] . '-' . time() . '.' . $name[1] . '|';
            if ($this->Records->save($record)) {

                $message = $record->record_attachments;
            } else {
                $message = 'Error';
            }
            $this->set([
                'message' => $message,
                '_serialize' => ['message']
            ]);
        }
    }

    public function removeImage($id = null)
    {
        $this->layout = 'ajax';
        $record = $this->Records->get($id);

        if ($this->request->is('ajax')) {

            $images = explode('|', $record->record_attachments);
            foreach ($images as $key => $image) {
                if ($this->request->getData('name') == $image) {
                    unset($images[$key]);
                }
            }
            $record->record_attachments = implode('|', $images);
            if ($this->Records->save($record)) {
                $filename = WWW_ROOT . '/uploads/records/'. $record->id . DS . $this->request->getData('name');
                if (file_exists($filename)) {
                    unlink($filename);
                }
            };
        }
        exit;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Patients');
        $this->paginate = [
            'conditions' => ['Patients.user_id' => $this->AuthUser->user('id')],
            'contain' => ['Records'],
        ];
        $patients = $this->paginate($this->Patients);
        $this->set(compact('patients'));
    }

    /**
     * View method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $record = $this->Records->get($id, [
            'contain' => ['Articles'],
        ]);

        $this->set(compact('record'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $record = $this->Records->newEntity();
        if ($this->request->is('post')) {
            $record = $this->Records->patchEntity($record, $this->request->getData());
            $record->user_id = $this->AuthUser->user('id');
            if ($this->Records->save($record)) {
                $this->Flash->success(__('The record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The record could not be saved. Please, try again.'));
        }
        $recordCategories = $this->Records->RecordCategories->find('list', ['limit' => 200]);
        $patients = $this->Records->Patients
            ->find('list')
            ->where(['user_id' => $this->AuthUser->user('id')]);
        $this->set(compact('record', 'recordCategories', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $record = $this->Records->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $record = $this->Records->patchEntity($record, $this->request->getData());
            if ($this->Records->save($record)) {
                $this->Flash->success(__('The record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The record could not be saved. Please, try again.'));
        }
        $recordCategories = $this->Records->RecordCategories->find('list', ['limit' => 200]);
        $patients = $this->Records->Patients
            ->find('list')
            ->where(['user_id' => $this->AuthUser->user('id')]);
        $this->set(compact('record', 'recordCategories', 'patients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Record id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $record = $this->Records->get($id);
        if ($this->Records->delete($record)) {
            $this->Flash->success(__('The record has been deleted.'));
        } else {
            $this->Flash->error(__('The record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
