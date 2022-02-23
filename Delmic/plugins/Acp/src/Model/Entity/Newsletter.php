<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * Newsletter Entity
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property bool $status
 * @property int $has_read
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Newsletter extends Entity
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
        // 'email' => true,
        // 'name' => true,
        // 'status' => true,
        // 'has_read' => true,
        // 'created' => true,
        // 'modified' => true

        '*' => true
    ];
}
