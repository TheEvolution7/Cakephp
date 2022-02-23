<?= $this->element('submenu') ?>
    <?php echo $this->Form->create($user, ['type' => 'file']) ?>
    <?php $this->Form->setTemplates([
        'inputContainer' => '{{content}}',
    ]) ?>
    <div class="account-row">
        <div class="account-title"><?= __('Your information') ?></div>        
        <div class="account-body">
            <style>
                .button-simple-icon {
                    display: flex;
                    align-items: center;
                    height: 35px;
                    cursor: pointer;
                }
            </style>
            <div class="form-avatar">
                <div class="avatar">
                     <?php
                        $image = '/img/no_thumb.png';
                        if (file_exists(WWW_ROOT . '/uploads/users/' . $user->id . DS . $user->image)) {
                            $image = '/uploads/users/' . $user->id . DS . $user->image;
                        }
                        echo $this->Html->image($image);
                    ?>
                    <div class="avatar-control">
                        <label for="img-btn" class="button-simple-icon"><i class="fas fa-image"></i> <input type="file" name="image" id="img-btn" class="hidden" name="image" accept="image/png, image/jpeg"></label>
                        <button type="button" class="button-simple-icon" id="del-img"><i class="fas fa-times"></i></button>
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
            <!-- <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('email') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('image', ['type' => 'file', 'required' => false, 'accept' => 'image/png, image/jpeg']) ?>
                </div>
            </div>
            <div class="form-group2">
                <div class="form-item">
                    <?= $this->Form->control('phone_number') ?>
                </div>
                <div class="form-item">
                    <?= $this->Form->control('address') ?>
                </div>
            </div> -->

            <div class="form-group2">
                <div class="form-item"><button type="submit" class="button button_primary"><?= __('Save') ?></button></div>
                <div class="form-item"><a href="<?= $this->Url->build(['controller' => 'Personals']) ?>" class="button button_primary"><?= __('Edit Schedule') ?></a></div>
                <div class="form-item"></div>
                <div class="form-item"></div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end() ?>
</div>
