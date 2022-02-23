<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentCategory Entity
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
 * @property \Acp\Model\Entity\DocumentCategoriesTitleTranslation $title_translation
 * @property \Acp\Model\Entity\DocumentCategoriesAliasTranslation $alias_translation
 * @property \Acp\Model\Entity\DocumentCategoriesDescriptionTranslation $description_translation
 * @property \Acp\Model\Entity\DocumentCategoriesContentTranslation $content_translation
 * @property \Acp\Model\Entity\DocumentCategoriesTranslation[] $_i18n
 * @property \Acp\Model\Entity\DocumentCategory $parent_document_category
 * @property \Acp\Model\Entity\DocumentCategory[] $child_document_categories
 * @property \Acp\Model\Entity\Document[] $documents
 */
class DocumentCategory extends Entity
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
        // 'parent_document_category' => true,
        // 'child_document_categories' => true,
        // 'documents' => true

        '*' => true
    ];
}
