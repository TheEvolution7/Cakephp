<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArticleCategory Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $image
 * @property bool $status
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $allowed_fields
 *
 * @property \App\Model\Entity\ArticleCategory $parent_page_category
 * @property \App\Model\Entity\ArticleCategory[] $child_page_categories
 * @property \App\Model\Entity\Article[] $pages
 */
class ArticleCategory extends Entity
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
        // 'title' => true,
        // 'alias' => true,
        // 'description' => true,
        // 'content' => true,
        // 'status' => true,
        // 'lft' => true,
        // 'rght' => true,
        // 'created' => true,
        // 'modified' => true,
        // 'allowed_fields' => true,
        // 'parent_page_category' => true,
        // 'child_page_categories' => true,
        // 'pages' => true

        '*' => true,
        'id' => false
    ];
}
