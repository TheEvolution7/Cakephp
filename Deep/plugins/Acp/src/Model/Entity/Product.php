<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;
use Cake\Core\Configure;
use Acp\Model\Entity\Language;
use Cake\ORM\Behavior\Translate\TranslateTrait;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $article_category_id
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
 * @property \Acp\Model\Entity\ProductCategory $article_category
 * @property \Acp\Model\Entity\User $user
 */

class Product extends Entity
{
    use TranslateTrait;
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

    // protected function _getPrice(){
    //     if (Configure::read('Core.setting.currency') == $this->_properties['currency']) {
    //         pr($this->Cms->price_translate());exit;
    //     }
    //     return $this->_properties['price'];
    // }
}
