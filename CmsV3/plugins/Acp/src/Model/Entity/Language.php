<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * Language Entity
 *
 * @property string $id
 * @property string|null $def
 * @property string $title
 * @property string $image
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Language extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        // 'def' => true,
        // 'title' => true,
        // 'image' => true,
        // 'status' => true,
        // 'created' => true,
        // 'modified' => true
        '*' => true
    ];
}
