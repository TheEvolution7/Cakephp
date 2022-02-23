<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PageCategory $pageCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Page Category'), ['action' => 'edit', $pageCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Page Category'), ['action' => 'delete', $pageCategory->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $pageCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Page Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Page Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Parent Page Categories'), ['controller' => 'PageCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Parent Page Category'), ['controller' => 'PageCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Child Page Categories'), ['controller' => 'PageCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Child Page Category'), ['controller' => 'PageCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Page'), ['controller' => 'Pages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pageCategories view large-9 medium-8 columns content">
    <h3><?= h($pageCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Parent Page Category') ?></th>
            <td><?= $pageCategory->has('parent_page_category') ? $this->Html->link($pageCategory->parent_page_category->id, ['controller' => 'PageCategories', 'action' => 'view', $pageCategory->parent_page_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($pageCategory->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($pageCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Lft') ?></th>
            <td><?= $this->Number->format($pageCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Rght') ?></th>
            <td><?= $this->Number->format($pageCategory->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($pageCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($pageCategory->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $pageCategory->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __d('acp', 'Allowed Fields') ?></h4>
        <?= $this->Text->autoParagraph(h($pageCategory->allowed_fields)); ?>
    </div>
    <div class="related">
        <h4><?= __d('acp', 'Related Page Categories') ?></h4>
        <?php if (!empty($pageCategory->child_page_categories)): ?>
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
                <th scope="col"><?= __d('acp', 'Allowed Fields') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($pageCategory->child_page_categories as $childPageCategories): ?>
            <tr>
                <td><?= h($childPageCategories->id) ?></td>
                <td><?= h($childPageCategories->parent_id) ?></td>
                <td><?= h($childPageCategories->image) ?></td>
                <td><?= h($childPageCategories->status) ?></td>
                <td><?= h($childPageCategories->lft) ?></td>
                <td><?= h($childPageCategories->rght) ?></td>
                <td><?= h($childPageCategories->created) ?></td>
                <td><?= h($childPageCategories->modified) ?></td>
                <td><?= h($childPageCategories->allowed_fields) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'PageCategories', 'action' => 'view', $childPageCategories->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'PageCategories', 'action' => 'edit', $childPageCategories->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'PageCategories', 'action' => 'delete', $childPageCategories->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $childPageCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __d('acp', 'Related Pages') ?></h4>
        <?php if (!empty($pageCategory->pages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Page Category Id') ?></th>
                <th scope="col"><?= __d('acp', 'User Id') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Image List') ?></th>
                <th scope="col"><?= __d('acp', 'View Count') ?></th>
                <th scope="col"><?= __d('acp', 'Comment Count') ?></th>
                <th scope="col"><?= __d('acp', 'Allow Comment') ?></th>
                <th scope="col"><?= __d('acp', 'Order') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Home') ?></th>
                <th scope="col"><?= __d('acp', 'Featured') ?></th>
                <th scope="col"><?= __d('acp', 'Tag') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($pageCategory->pages as $pages): ?>
            <tr>
                <td><?= h($pages->id) ?></td>
                <td><?= h($pages->page_category_id) ?></td>
                <td><?= h($pages->user_id) ?></td>
                <td><?= h($pages->image) ?></td>
                <td><?= h($pages->image_list) ?></td>
                <td><?= h($pages->view_count) ?></td>
                <td><?= h($pages->comment_count) ?></td>
                <td><?= h($pages->allow_comment) ?></td>
                <td><?= h($pages->order) ?></td>
                <td><?= h($pages->status) ?></td>
                <td><?= h($pages->home) ?></td>
                <td><?= h($pages->featured) ?></td>
                <td><?= h($pages->tag) ?></td>
                <td><?= h($pages->created) ?></td>
                <td><?= h($pages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'Pages', 'action' => 'view', $pages->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'Pages', 'action' => 'edit', $pages->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'Pages', 'action' => 'delete', $pages->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $pages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
