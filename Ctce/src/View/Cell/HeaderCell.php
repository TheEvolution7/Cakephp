<?php
namespace App\View\Cell;

use Cake\View\Cell;

class HeaderCell extends Cell
{
    public function display()
    {
        $this->loadModel('ProductCategories');

        $categories = $this->ProductCategories
            ->find('children', ['for' => 1])
            ->find('threaded')
            ->toArray();
        $this->set(compact('categories'));
    }
}