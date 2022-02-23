<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

/**
 * Pharmacys Controller
 *
 * @property \Acp\Model\Table\PharmacysTable $Pharmacys
 *
 * @method \Acp\Model\Entity\Pharmacy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PharmacysController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'order' => ['Pharmacys.id' => 'DESC'],
            'maxLimit' => 10
        ];
        $pharmacys = $this->paginate($this->Pharmacys);

        $this->set(compact('pharmacys'));
    }

    public function edit($id = null)
    {
        $pharmacy = $this->Pharmacys->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacy = $this->Pharmacys->patchEntity($pharmacy, $this->request->getData());
            if ($this->Pharmacys->save($pharmacy)) {
                $this->Flash->success(__d('acp', 'The pharmacy has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The pharmacy could not be saved. Please, try again.'));
        }

        $this->set(compact('pharmacy'));
    }

    public function add()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pharmacy = $this->Pharmacys->newEntity($this->request->getData());
            if ($this->Pharmacys->save($pharmacy)) {
                $this->Flash->success(__d('acp', 'The pharmacy has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The pharmacy could not be saved. Please, try again.'));
        }

        $this->set(compact('pharmacy'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pharmacy = $this->Pharmacys->get($id);
        if ($this->Pharmacys->delete($pharmacy)) {
            $this->Flash->success(__('The pharmacy has been deleted.'));
        } else {
            $this->Flash->error(__('The pharmacy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
