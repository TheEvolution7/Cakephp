<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Article Categories'), ['controller' => 'ArticleCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Article Category'), ['controller' => 'ArticleCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Article Category') ?></th>
            <td><?= $article->has('article_category') ? $this->Html->link($article->article_category->id, ['controller' => 'ArticleCategories', 'action' => 'view', $article->article_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'User') ?></th>
            <td><?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($article->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image List') ?></th>
            <td><?= h($article->image_list) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Tag') ?></th>
            <td><?= h($article->tag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'View Count') ?></th>
            <td><?= $this->Number->format($article->view_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Comment Count') ?></th>
            <td><?= $this->Number->format($article->comment_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Allow Comment') ?></th>
            <td><?= $this->Number->format($article->allow_comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Order') ?></th>
            <td><?= $this->Number->format($article->order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Featured') ?></th>
            <td><?= $this->Number->format($article->featured) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $article->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Home') ?></th>
            <td><?= $article->home ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
</div>
