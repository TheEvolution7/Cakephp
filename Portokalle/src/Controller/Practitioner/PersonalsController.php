<?php
namespace App\Controller\Practitioner;

use App\Controller\Practitioner\AppController;
use Cake\I18n\Time;
use Cake\ORM\Query;
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
    	$personal = $this->Personals
                ->find()
                ->where(['user_id' => $this->AuthUser->user('id')])
                ->contain(['Services', 'Specialities'])
                ->first();

        if ($this->request->is('put')) {
            $this->Personals->patchEntity($personal, $this->request->getData());
            $personal->slug = strtolower(Text::slug($personal->full_name));
            $personal->regular_hours = serialize($this->request->getData('regular'));
            if ($this->Personals->save($personal)) {
                $this->Flash->success(__("Success !"));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__("Error !"));
            }
        }

        $services = $this->Personals->Services->find('list', [
            'keyField' => 'id',
            'valueField' => function ($services) {
                $data = ' - ( ';
                foreach ($services->specialities as $key => $speciality) {
                    $data .= $speciality->title;
                    if ($key < count($services->specialities) - 1) {
                        $data .= ', ';
                    }
                }
                $data .= ' )';
                return $services->title . $data;
            }
        ])->contain(['Specialities']);

        $specialities = $this->Personals->Specialities
            ->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);
        $this->set(compact('personal', 'services', 'specialities'));
    }
    public function saveOverrideHours($id = null)
    {
        $this->autoRender = false;
        $personal = $this->Personals->get($id);
        if ($this->request->is('post')) {
            $data = [];
            $requestData = $this->request->getData('title');
            foreach (explode(',', $requestData) as $key => $da) {
                $d = explode('-', $da);
                $s = $d[0];
                $e = $d[1];

                $data[$key]['title'] = $da;
                $data[$key]['start'] = $this->request->getData('date') . ' ' . $s;
                $data[$key]['end'] = $this->request->getData('date') . ' ' . $e;
            }
            
            $arrO = [];
            if (!empty($personal->override_hours)) {
               $arrO = unserialize($personal->override_hours);

               foreach ($arrO as $key => $value) {
                    $str = new Time($value['start']);
                    if ($this->request->getData('date') == $str->format('Y-m-d')) {
                        unset($arrO[$key]);
                    }
                }
            }
            
            $arr = array_merge($arrO, $data);
            
            $personal->override_hours = serialize($arr);
            if ($this->Personals->save($personal)) {
                $res = true;
            }else{
                $res = false;
            }
            echo json_encode($res);
        }
    }
}
