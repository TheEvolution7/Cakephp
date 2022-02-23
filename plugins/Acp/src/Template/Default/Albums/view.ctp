<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $album
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Album'), ['action' => 'edit', $album->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Album'), ['action' => 'delete', $album->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $album->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Albums'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Album'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Album Categories'), ['controller' => 'AlbumCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Album Category'), ['controller' => 'AlbumCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="albums view large-9 medium-8 columns content">
    <h3><?= h($album->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Album Category') ?></th>
            <td><?= $album->has('album_category') ? $this->Html->link($album->album_category->id, ['controller' => 'AlbumCategories', 'action' => 'view', $album->album_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'User') ?></th>
            <td><?= $album->has('user') ? $this->Html->link($album->user->id, ['controller' => 'Users', 'action' => 'view', $album->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($album->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image List') ?></th>
            <td><?= h($album->image_list) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Tag') ?></th>
            <td><?= h($album->tag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($album->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'View Count') ?></th>
            <td><?= $this->Number->format($album->view_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Comment Count') ?></th>
            <td><?= $this->Number->format($album->comment_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Allow Comment') ?></th>
            <td><?= $this->Number->format($album->allow_comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Order') ?></th>
            <td><?= $this->Number->format($album->order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Featured') ?></th>
            <td><?= $this->Number->format($album->featured) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($album->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($album->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $album->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Home') ?></th>
            <td><?= $album->home ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
</div>
