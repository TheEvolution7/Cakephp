<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Language'), ['action' => 'edit', $language->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Language'), ['action' => 'delete', $language->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $language->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Languages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Language'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="languages view large-9 medium-8 columns content">
    <h3><?= h($language->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= h($language->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Def') ?></th>
            <td><?= h($language->def) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Title') ?></th>
            <td><?= h($language->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($language->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($language->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($language->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $language->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
</div>
