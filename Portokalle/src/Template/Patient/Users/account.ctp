<?= $this->element('submenu') ?>
    <?php echo $this->Form->create($user, ['type' => 'file']) ?>
    <?php $this->Form->setTemplates([
        'inputContainer' => '{{content}}',
    ]) ?>
    <div class="account-row">
        <div class="account-title"><?= __('Your information') ?></div>        
        <div class="account-body">
            <div class="form-avatar">
                <div class="avatar">
                    <?php
                        $image = '/img/no_thumb.png';
                        if (file_exists(WWW_ROOT . 'uploads/users/' . $user->id . DS . $user->image)) {
                            $image = '/uploads/users/' . $user->id . DS . $user->image;
                        }
                        echo $this->Html->image($image);
                    ?>
                    <div class="avatar-control">
                        <button class="button-simple-icon"><i class="fas fa-image"></i></button>
                        <button class="button-simple-icon"><i class="fas fa-camera"></i></button>
                    </div>
                </div>
                <div class="username">
                    <?= $user->full_name ?>
                </div>
            </div>
            <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('first_name') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('last_name') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('email') ?>
                </div>
            </div>
            
            <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('phone_number') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('address') ?>
                </div>
            </div>
            <div class="form-item">
                <?= $this->Form->control('image', ['type' => 'file', 'accept' => 'image/png, image/jpeg']) ?>
            </div>
            <div class="form-control">
                <button type="submit" class="button button_primary"><?= __('Update account') ?></button>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end() ?>
</div>
