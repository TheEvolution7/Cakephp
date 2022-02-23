<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $articleCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Article Category'), ['action' => 'edit', $articleCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Article Category'), ['action' => 'delete', $articleCategory->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $articleCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Article Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Article Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Parent Article Categories'), ['controller' => 'ArticleCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Parent Article Category'), ['controller' => 'ArticleCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Child Article Categories'), ['controller' => 'ArticleCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Child Article Category'), ['controller' => 'ArticleCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articleCategories view large-9 medium-8 columns content">
    <h3><?= h($articleCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Parent Article Category') ?></th>
            <td><?= $articleCategory->has('parent_article_category') ? $this->Html->link($articleCategory->parent_article_category->id, ['controller' => 'ArticleCategories', 'action' => 'view', $articleCategory->parent_article_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Type') ?></th>
            <td><?= h($articleCategory->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($articleCategory->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($articleCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Order') ?></th>
            <td><?= $this->Number->format($articleCategory->order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Lft') ?></th>
            <td><?= $this->Number->format($articleCategory->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Rght') ?></th>
            <td><?= $this->Number->format($articleCategory->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($articleCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($articleCategory->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $articleCategory->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __d('acp', 'Allowed Fields') ?></h4>
        <?= $this->Text->autoParagraph(h($articleCategory->allowed_fields)); ?>
    </div>
    <div class="related">
        <h4><?= __d('acp', 'Related Article Categories') ?></h4>
        <?php if (!empty($articleCategory->child_article_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Parent Id') ?></th>
                <th scope="col"><?= __d('acp', 'Type') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Order') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Lft') ?></th>
                <th scope="col"><?= __d('acp', 'Rght') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col"><?= __d('acp', 'Allowed Fields') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($articleCategory->child_article_categories as $childArticleCategories): ?>
            <tr>
                <td><?= h($childArticleCategories->id) ?></td>
                <td><?= h($childArticleCategories->parent_id) ?></td>
                <td><?= h($childArticleCategories->type) ?></td>
                <td><?= h($childArticleCategories->image) ?></td>
                <td><?= h($childArticleCategories->order) ?></td>
                <td><?= h($childArticleCategories->status) ?></td>
                <td><?= h($childArticleCategories->lft) ?></td>
                <td><?= h($childArticleCategories->rght) ?></td>
                <td><?= h($childArticleCategories->created) ?></td>
                <td><?= h($childArticleCategories->modified) ?></td>
                <td><?= h($childArticleCategories->allowed_fields) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'ArticleCategories', 'action' => 'view', $childArticleCategories->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'ArticleCategories', 'action' => 'edit', $childArticleCategories->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'ArticleCategories', 'action' => 'delete', $childArticleCategories->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $childArticleCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __d('acp', 'Related Articles') ?></h4>
        <?php if (!empty($articleCategory->articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Article Category Id') ?></th>
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
            <?php foreach ($articleCategory->articles as $articles): ?>
            <tr>
                <td><?= h($articles->id) ?></td>
                <td><?= h($articles->article_category_id) ?></td>
                <td><?= h($articles->user_id) ?></td>
                <td><?= h($articles->image) ?></td>
                <td><?= h($articles->image_list) ?></td>
                <td><?= h($articles->view_count) ?></td>
                <td><?= h($articles->comment_count) ?></td>
                <td><?= h($articles->allow_comment) ?></td>
                <td><?= h($articles->order) ?></td>
                <td><?= h($articles->status) ?></td>
                <td><?= h($articles->home) ?></td>
                <td><?= h($articles->featured) ?></td>
                <td><?= h($articles->tag) ?></td>
                <td><?= h($articles->created) ?></td>
                <td><?= h($articles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $articles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
