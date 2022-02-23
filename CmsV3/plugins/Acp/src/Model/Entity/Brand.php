<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * Brand Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $type
 * @property string $image
 * @property int $order
 * @property bool $status
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $allowed_fields
 *
 * @property \Acp\Model\Entity\ParentBrand $parent_article_category
 * @property \Acp\Model\Entity\ChildBrand[] $child_article_categories
 * @property \Acp\Model\Entity\Product[] $articles
 */
class Brand extends Entity
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
        '*' => true
    ];
}
