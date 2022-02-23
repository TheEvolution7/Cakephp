<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * Faq Entity
 *
 * @property int $id
 * @property string|null $faq_category_id
 * @property int|null $user_id
 * @property string|null $image
 * @property string|null $image_list
 * @property int $view_count
 * @property int|null $comment_count
 * @property int $allow_comment
 * @property int|null $order
 * @property bool|null $status
 * @property bool|null $home
 * @property int|null $featured
 * @property string|null $tag
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \Acp\Model\Entity\FaqCategory $faq_category
 * @property \Acp\Model\Entity\User $user
 */

class Faq extends Entity
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
        // 'faq_category_id' => true,
        // 'user_id' => true,
        // 'image' => true,
        // 'image_list' => true,
        // 'view_count' => true,
        // 'comment_count' => true,
        // 'allow_comment' => true,
        // 'order' => true,
        // 'status' => true,
        // 'home' => true,
        // 'featured' => true,
        // 'tag' => true,
        // 'created' => true,
        // 'modified' => true,
        // 'faq_category' => true,
        // 'user' => true

        '*' => true
    ];
}
