<?php
namespace Acp\Controller;

use Acp\Controller\AppController;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\Utility\Text;

class PersonalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [],
            'order' => ['Personals.id' => 'DESC']
        ];
        $personals = $this->paginate($this->Personals);

        $this->set(compact('personals'));
    }

    /**
     * View method
     *
     * @param string|null $id Personal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function view($id = null)
    {
        $personal = $this->Personals->get($id, [
            'contain' => ['PracticeHours' => ['Hours']],
        ]);
        $this->set(compact('personal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personal = $this->Personals->newEntity();
        if ($this->request->is('post')) {
            $personal = $this->Personals->patchEntity($personal, $this->request->getData(), ['associated' => ['Practitioners']]);
            if ($this->Personals->save($personal)) {
                $this->Flash->success(__('The personal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personal could not be saved. Please, try again.'));
        }

        $practitioners = $this->Personals->Practitioners->find('list', [
            'keyField' => 'id',
            'valueField' => 'full_name'
        ]);

        $this->set(compact('personal', 'practitioners'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Personal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personal = $this->Personals->get($id, [
            'contain' => ['Practitioners', 'Services', 'Specialities'],
        ]);
        
        // $fields = ['professional_registration_number', 'qualifications', 'accreditations', 'certifications'];

        // foreach ($fields as $key => $field) {
        //     if ($personal->{$field}) {
        //         $personal->{$field} = unserialize($personal->{$field});
        //     }
        // }

        $time = Time::now();
        $timeNextOneMonths = Time::now()->modify('+1 months');
        $datediff = abs(strtotime($timeNextOneMonths->format('Y-m-d')) - strtotime($time->format('Y-m-d')));
        $countDate = floor($datediff / (60*60*24));

        // $dataEvents = [];

        // $start = '7:00';
        // $end = '20:00';

        // for ($i=0; $i < $countDate; $i++) {
        //     $now = Time::now()->modify('+' . $i . ' days');
        //     if (!in_array($now->format('N'), [6,7])) {
        //         $dataEvents[$i]['title'] = 'Title';
        //         $dataEvents[$i]['start'] = $now->format('Y-m-d') . 'T'. $start;
        //         $dataEvents[$i]['end'] = $now->format('Y-m-d') . 'T'. $end;
        //     }
        // }
        // pr($dataEvents);exit;
        if ($this->request->is(['patch', 'post', 'put'])) {

            // $arr = [];
            // foreach ($this->request->getData('repeater') as $key => $value) {
            //     foreach ($value as $k => $v) {
            //         if (!empty($v)) {
            //             $arr[$k][] = $v;
            //         }
            //     }
            // }
            // foreach ($fields as $field) {
            //     if (!empty($arr[$field])) {
            //         $personal->{$field} = serialize($arr[$field]);
            //     }
            // }

            $personal = $this->Personals->patchEntity($personal, $this->request->getData());
            $personal->slug = strtolower(Text::slug($personal->full_name));
            if ($this->Personals->save($personal)) {
                $this->Flash->success(__('The personal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personal could not be saved. Please, try again.'));
        }
        
        $practitioners = $this->Personals->Practitioners->find('list', [
            'keyField' => 'id',
            'valueField' => 'full_name'
        ]);

        $services = $this->Personals->Services->find('list', [
            'keyField' => 'id',
            'valueField' => function ($services) {
                $data = ' [ ';
                foreach ($services->specialities as $key => $speciality) {
                    $data .= $speciality->title;
                    if ($key < count($services->specialities) - 1) {
                        $data .= ', ';
                    }
                }
                $data .= ' ]';
                return $services->title . $data;
            }
        ])->contain(['Specialities']);

        $specialities = $this->Personals->Specialities->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);

        $this->set(compact('personal', 'practitioners', 'services', 'specialities', 'dataEvents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Personal id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personal = $this->Personals->get($id);
        if ($this->Personals->delete($personal)) {
            $this->Flash->success(__('The personal has been deleted.'));
        } else {
            $this->Flash->error(__('The personal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
