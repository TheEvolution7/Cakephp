<?php
namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;
use Cake\I18n\FrozenTime;

class DoctorSchedulesController extends AppController
{
    

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('DoctorSchedules');
    }

    public function appointment() {
    }

	public function calendar() {
        
        $doctor_schedule = $this->DoctorSchedules->find()->where([])->contain(['Users']);

        $listColor = [
            'Arrived' => '#FF7F50',
            'Attended' => '#D2691E',
            'Booked' => '#DC143C',
            'Cancelled' => '#00008B',
            'Check response' => '#A9A9A9',
            'Confirmed' => '#556B2F',
            'Declined' => '#E9967A',
            'Did not attend' => '#FF1493',
            'Pending' => '#696969',
            'Rejected' => '#B22222',
            'Rescheduled' => '#FFD700',
            'Waiting List' => '#008000',
        ];

        $data = [];
        foreach ($doctor_schedule as $key => $value) {
            $data[$key]['id'] = $value->id;          
            $data[$key]['title'] = $value->user->full_name . ' ' .  strtolower($value->status);
            $data[$key]['start'] = FrozenTime::parse($value->date_start);
            $data[$key]['end'] = FrozenTime::parse($value->date_end);
            $data[$key]['color'] = $listColor[$value->status];  
            //$data[$key]['display'] = 'block';   
        }
        
        // $data[] = [
        //     'start' => '2021-07-21',
        //     'end' => '2022-07-21',
        //     'display' => 'inverse-background',
        //     'color' => '#00008B'
        // ];
        $data = json_encode($data);

        $this->set(compact('data'));
    }
}
