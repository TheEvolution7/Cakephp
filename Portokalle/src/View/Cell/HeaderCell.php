<?php
namespace App\View\Cell;

use Cake\View\Cell;
class HeaderCell extends Cell
{   
    public function display()
    {
        $this->loadModel('Specialities');
        $specialities = $this->Specialities
            ->find()
            ->where(['Specialities.status' => 1]);
        $this->set(compact('specialities'));
    }
}