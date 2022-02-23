<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * BannerCategory Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property |null $image
 * @property string|null $uuid
 * @property bool|null $status
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Acp\Model\Entity\BannerCategoriesTitleTranslation $title_translation
 * @property \Acp\Model\Entity\BannerCategoriesAliasTranslation $alias_translation
 * @property \Acp\Model\Entity\BannerCategoriesDescriptionTranslation $description_translation
 * @property \Acp\Model\Entity\BannerCategoriesContentTranslation $content_translation
 * @property \Acp\Model\Entity\BannerCategoriesTranslation[] $_i18n
 * @property \Acp\Model\Entity\BannerCategory $parent_banner_category
 * @property \Acp\Model\Entity\BannerCategory[] $child_banner_categories
 * @property \Acp\Model\Entity\Banner[] $banners
 */
class BannerCategory extends Entity
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
        // 'title_translation' => true,
        // 'alias_translation' => true,
        // 'description_translation' => true,
        // 'content_translation' => true,
        // '_i18n' => true,
        // 'parent_banner_category' => true,
        // 'child_banner_categories' => true,
        // 'banners' => true

        '*' => true
    ];
}
