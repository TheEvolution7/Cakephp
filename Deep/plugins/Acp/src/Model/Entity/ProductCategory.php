<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductCategory Entity
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
 * @property \Acp\Model\Entity\ParentProductCategory $parent_article_category
 * @property \Acp\Model\Entity\ChildProductCategory[] $child_article_categories
 * @property \Acp\Model\Entity\Product[] $articles
 */
class ProductCategory extends Entity
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
        // 'type' => true,
        // 'image' => true,
        // 'order' => true,
        // 'status' => true,
        // 'lft' => true,
        // 'rght' => true,
        // 'created' => true,
        // 'modified' => true,
        // 'allowed_fields' => true,
        // 'parent_article_category' => true,
        // 'child_article_categories' => true,
        // 'articles' => true
        '*' => true
    ];
}
