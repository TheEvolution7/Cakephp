<?php
namespace Acp\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Text;

/**
 * Cms behavior
 */
class CmsBehavior extends Behavior
{
    public function price_translate(EntityInterface $entity) {
        return '1';
    }
}
