<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Name') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Alias') ?></th>
            <td><?= h($role->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Color') ?></th>
            <td><?= h($role->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Description') ?></th>
            <td><?= h($role->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $this->Number->format($role->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($role->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($role->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __d('acp', 'Related Users') ?></h4>
        <?php if (!empty($role->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __d('acp', 'Id') ?></th>
                <th scope="col"><?= __d('acp', 'Email') ?></th>
                <th scope="col"><?= __d('acp', 'Password') ?></th>
                <th scope="col"><?= __d('acp', 'Role Id') ?></th>
                <th scope="col"><?= __d('acp', 'Gender') ?></th>
                <th scope="col"><?= __d('acp', 'First Name') ?></th>
                <th scope="col"><?= __d('acp', 'Last Name') ?></th>
                <th scope="col"><?= __d('acp', 'Birthday') ?></th>
                <th scope="col"><?= __d('acp', 'Phone Number') ?></th>
                <th scope="col"><?= __d('acp', 'Image') ?></th>
                <th scope="col"><?= __d('acp', 'Status') ?></th>
                <th scope="col"><?= __d('acp', 'Active') ?></th>
                <th scope="col"><?= __d('acp', 'System') ?></th>
                <th scope="col"><?= __d('acp', 'Company') ?></th>
                <th scope="col"><?= __d('acp', 'Address') ?></th>
                <th scope="col"><?= __d('acp', 'City') ?></th>
                <th scope="col"><?= __d('acp', 'State') ?></th>
                <th scope="col"><?= __d('acp', 'Zip Code') ?></th>
                <th scope="col"><?= __d('acp', 'Country Id') ?></th>
                <th scope="col"><?= __d('acp', 'Note') ?></th>
                <th scope="col"><?= __d('acp', 'Fbid') ?></th>
                <th scope="col"><?= __d('acp', 'Ggid') ?></th>
                <th scope="col"><?= __d('acp', 'Last Visit') ?></th>
                <th scope="col"><?= __d('acp', 'Has Read') ?></th>
                <th scope="col"><?= __d('acp', 'Created') ?></th>
                <th scope="col"><?= __d('acp', 'Modified') ?></th>
                <th scope="col" class="actions"><?= __d('acp', 'Actions') ?></th>
            </tr>
            <?php foreach ($role->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->gender) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->birthday) ?></td>
                <td><?= h($users->phone_number) ?></td>
                <td><?= h($users->image) ?></td>
                <td><?= h($users->status) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->system) ?></td>
                <td><?= h($users->company) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->city) ?></td>
                <td><?= h($users->state) ?></td>
                <td><?= h($users->zip_code) ?></td>
                <td><?= h($users->country_id) ?></td>
                <td><?= h($users->note) ?></td>
                <td><?= h($users->fbid) ?></td>
                <td><?= h($users->ggid) ?></td>
                <td><?= h($users->last_visit) ?></td>
                <td><?= h($users->has_read) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__d('acp', 'View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__d('acp', 'Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__d('acp', 'Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
