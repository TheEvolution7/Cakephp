<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * MailCategory Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $image
 * @property string|null $uuid
 * @property bool|null $status
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Acp\Model\Entity\ParentMailCategory $parent_mail_category
 * @property \Acp\Model\Entity\ChildMailCategory[] $child_mail_categories
 */
class MailCategory extends Entity
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
        // 'parent_id' => true,
        // 'image' => true,
        // 'uuid' => true,
        // 'status' => true,
        // 'lft' => true,
        // 'rght' => true,
        // 'created' => true,
        // 'modified' => true,
        // 'parent_mail_category' => true,
        // 'child_mail_categories' => true
        '*' => true
    ];
}
