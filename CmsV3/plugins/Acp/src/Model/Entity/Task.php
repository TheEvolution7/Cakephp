<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Time;
class Task extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
    ];

    protected function _getLastStatus()
    {
    	$time = $this->date;
    	$time_now = Time::now();
    	if ($time < $time_now) {
    		$status = 3;
    	}else{
    		$status = $this->status;
    	}
    	return $status;
    }
}
