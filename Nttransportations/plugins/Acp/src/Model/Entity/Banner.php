<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * Banner Entity
 *
 * @property int $id
 * @property string|null $banner_category_id
 * @property int|null $user_id
 * @property string|null $image
 * @property string|null $image_list
 * @property int|null $sort
 * @property bool|null $status
 * @property bool|null $featured
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \Acp\Model\Entity\BannerCategory $banner_category
 * @property \Acp\Model\Entity\User $user
 */
class Banner extends Entity
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
        // 'banner_category_id' => true,
        // 'user_id' => true,
        // 'image' => true,
        // 'image_list' => true,
        // 'sort' => true,
        // 'status' => true,
        // 'featured' => true,
        // 'created' => true,
        // 'modified' => true,
        // 'banner_category' => true,
        // 'user' => true
        '*' => true
    ];
}
