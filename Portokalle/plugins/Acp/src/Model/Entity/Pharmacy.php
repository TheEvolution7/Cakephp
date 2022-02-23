<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pharmacy Entity
 *
 * @property int $id
 * @property string|null $page_category_id
 * @property int|null $user_id
 * @property string|null $image
 * @property string|null $image_list
 * @property int $view_count
 * @property int|null $comment_count
 * @property int $allow_comment
 * @property int|null $sort
 * @property bool|null $status
 * @property bool|null $home
 * @property bool|null $featured
 * @property string|null $tag
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \Acp\Model\Entity\PharmacyCategory $page_category
 * @property \Acp\Model\Entity\User $user
 */
class Pharmacy extends Entity
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
        // 'page_category_id' => true,
        // 'user_id' => true,
        // 'image' => true,
        // 'image_list' => true,
        // 'view_count' => true,
        // 'comment_count' => true,
        // 'allow_comment' => true,
        // 'sort' => true,
        // 'status' => true,
        // 'home' => true,
        // 'featured' => true,
        // 'tag' => true,
        // 'created' => true,
        // 'modified' => true,
        // 'page_category' => true,
        // 'user' => true

        '*' => true
    ];
}
