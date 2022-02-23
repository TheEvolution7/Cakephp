<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

/**
 * PracticeHours Controller
 *
 * @property \Acp\Model\Table\PracticeHoursTable $PracticeHours
 *
 * @method \Acp\Model\Entity\PracticeHour[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PracticeHoursController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personals']
        ];
        $practice_hours = $this->paginate($this->PracticeHours);
            
        $this->set(compact('practice_hours'));
    }

    /**
     * View method
     *
     * @param string|null $id PracticeHour id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\PracticeHourNotFoundException When practice_hour not found.
     */
    public function view($id = null)
    {
        $practice_hour = $this->PracticeHours->get($id, [
            'contain' => []
        ]);

        $this->set('practice_hour', $practice_hour);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $practice_hour = $this->PracticeHours->newEntity(['associated' => ['Hours']]);
        if ($this->request->is('post')) {
            $practice_hour = $this->PracticeHours->patchEntity($practice_hour, $this->request->getData());
            $practice_hour->hours = $this->request->getData('repeater');
            if ($this->PracticeHours->save($practice_hour, ['associated' => ['Hours']])) {
                $this->Flash->success(__('The practice_hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The practice_hour could not be saved. Please, try again.'));
        }
        $practitioners = $this->PracticeHours->Practitioners->find('list', ['limit' => 200]);
        $personals = $this->PracticeHours->Personals->find('list', ['limit' => 200]);
        $this->set(compact('practice_hour', 'practitioners', 'personals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id PracticeHour id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\PracticeHourNotFoundException When practice_hour not found.
     */
    public function edit($id = null)
    {
        $practice_hour = $this->PracticeHours->get($id, [
            'contain' => ['Hours']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data =  $this->request->getData();
            $data['hours'] = $this->request->getData('repeater');
            $practice_hour = $this->PracticeHours->patchEntity($practice_hour, $data, ['associated' => ['Hours']]);

            if ($this->PracticeHours->save($practice_hour, ['associated' => ['Hours']])) {
                $this->Flash->success(__('The practice_hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The practice_hour could not be saved. Please, try again.'));
        }
        $practitioners = $this->PracticeHours->Practitioners->find('list', ['limit' => 200]);
        $personals = $this->PracticeHours->Personals->find('list', ['limit' => 200]);
        $this->set(compact('practice_hour', 'practitioners', 'personals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id PracticeHour id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\PracticeHourNotFoundException When practice_hour not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $practice_hour = $this->PracticeHours->get($id);
        if ($this->PracticeHours->delete($practice_hour)) {
            $this->Flash->success(__('The practice_hour has been deleted.'));
        } else {
            $this->Flash->error(__('The practice_hour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
