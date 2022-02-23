<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $documentCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Document Category'), ['action' => 'edit', $documentCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Document Category'), ['action' => 'delete', $documentCategory->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $documentCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Document Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Document Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Parent Document Categories'), ['controller' => 'DocumentCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Parent Document Category'), ['controller' => 'DocumentCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Child Document Categories'), ['controller' => 'DocumentCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Child Document Category'), ['controller' => 'DocumentCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Documents'), ['controller' => 'Documents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Document'), ['controller' => 'Documents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="documentCategories view large-9 medium-8 columns content">
    <h3><?= h($documentCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Parent Document Category') ?></th>
            <td><?= $documentCategory->has('parent_document_category') ? $this->Html->link($documentCategory->parent_document_category->id, ['controller' => 'DocumentCategories', 'action' => 'view', $documentCategory->parent_document_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($documentCategory->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($documentCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Lft') ?></th>
            <td><?= $this->Number->format($documentCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Rght') ?></th>
            <td><?= $this->Number->format($documentCategory->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($documentCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($documentCategory->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $documentCategory->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __d('acp', 'Related Document Categories') ?></h4>
        <?php if (!empty($documentCategory->child_document_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Parent Id') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Lft') ?></th>
                <th scope="col"><?= __d('acp', 'Rght') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($documentCategory->child_document_categories as $childDocumentCategories): ?>
            <tr>
                <td><?= h($childDocumentCategories->id) ?></td>
                <td><?= h($childDocumentCategories->parent_id) ?></td>
                <td><?= h($childDocumentCategories->image) ?></td>
                <td><?= h($childDocumentCategories->status) ?></td>
                <td><?= h($childDocumentCategories->lft) ?></td>
                <td><?= h($childDocumentCategories->rght) ?></td>
                <td><?= h($childDocumentCategories->created) ?></td>
                <td><?= h($childDocumentCategories->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'DocumentCategories', 'action' => 'view', $childDocumentCategories->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'DocumentCategories', 'action' => 'edit', $childDocumentCategories->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'DocumentCategories', 'action' => 'delete', $childDocumentCategories->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $childDocumentCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __d('acp', 'Related Documents') ?></h4>
        <?php if (!empty($documentCategory->documents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Document Category Id') ?></th>
                <th scope="col"><?= __d('acp', 'User Id') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Image List') ?></th>
                <th scope="col"><?= __d('acp', 'Sort') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Featured') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($documentCategory->documents as $documents): ?>
            <tr>
                <td><?= h($documents->id) ?></td>
                <td><?= h($documents->document_category_id) ?></td>
                <td><?= h($documents->user_id) ?></td>
                <td><?= h($documents->image) ?></td>
                <td><?= h($documents->image_list) ?></td>
                <td><?= h($documents->sort) ?></td>
                <td><?= h($documents->status) ?></td>
                <td><?= h($documents->featured) ?></td>
                <td><?= h($documents->created) ?></td>
                <td><?= h($documents->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'Documents', 'action' => 'view', $documents->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'Documents', 'action' => 'edit', $documents->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'Documents', 'action' => 'delete', $documents->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $documents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
