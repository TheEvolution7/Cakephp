<?php
namespace App\View\Cell;

use Cake\View\Cell;
use TinyAuth\Controller\Component\AuthUser;
class RecordCell extends Cell
{   
    public function add($id = null)
    {
        $this->loadModel('Records');
        $record = $this->Records->newEntity();
        $recordCategories = $this->Records->RecordCategories->find('list');
        $this->set(compact('record', 'recordCategories', 'id'));
    }

    public function edit($record = null)
    {
        $this->loadModel('Records');
        $recordCategories = $this->Records->RecordCategories->find('list');
        $this->set(compact('record', 'recordCategories'));
    }

    public function listImage($record = null)
    {
        $this->set(compact('record'));
    }
}