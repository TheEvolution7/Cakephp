<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Personal extends Entity
{
    protected $_accessible = [
        '*' => true
    ];

    // protected function _getFullName()
    // {
    //     return $this->title . '  ' . $this->forename . '  ' . $this->surname;
    // }

}
