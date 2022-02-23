<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __d('acp', 'Actions') ?></li>
        <li><?= $this->Html->link(__d('acp', 'Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__d('acp', 'Delete User'), ['action' => 'delete', $user->id], ['confirm' => __d('acp', 'Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__d('acp', 'New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __d('acp', 'Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Phone Number') ?></th>
            <td><?= h($user->phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Image') ?></th>
            <td><?= h($user->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Company') ?></th>
            <td><?= h($user->company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'City') ?></th>
            <td><?= h($user->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'State') ?></th>
            <td><?= h($user->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Zip Code') ?></th>
            <td><?= h($user->zip_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Country') ?></th>
            <td><?= $user->has('country') ? $this->Html->link($user->country->id, ['controller' => 'Countries', 'action' => 'view', $user->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Fbid') ?></th>
            <td><?= h($user->fbid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Ggid') ?></th>
            <td><?= h($user->ggid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Has Read') ?></th>
            <td><?= $this->Number->format($user->has_read) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Birthday') ?></th>
            <td><?= h($user->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Last Visit') ?></th>
            <td><?= h($user->last_visit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Gender') ?></th>
            <td><?= $user->gender ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Status') ?></th>
            <td><?= $user->status ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'Active') ?></th>
            <td><?= $user->active ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __d('acp', 'System') ?></th>
            <td><?= $user->system ? __d('acp', 'Yes') : __d('acp', 'No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __d('acp', 'Note') ?></h4>
        <?= $this->Text->autoParagraph(h($user->note)); ?>
    </div>
</div>
