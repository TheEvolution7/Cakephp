<div class="profiles-container">
    <div class="profiles-row">
        <div class="profiles-header flex justify-between">
            <div class="profiles-title">Patient Profiles</div>
            <div class="buider-header-controls">
                <a class="button button_primary button_small" href="<?= $this->url->build(['action' => 'add']) ?>">
                    Add Profile
                    <svg class="icon icon-friends-request">
                        <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-friends-request"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div class="profiles-body patient-list">
            <?php foreach ($patients as $patient): ?>
                    <a href="<?= $this->Url->build(['action' => 'edit', $patient->id]) ?>" class="profile-wrapper">
                        <div class="profile-image">
                        <?php $image = $this->Html->image('/uploads/patients/' . $patient->id . DS . $patient->image) ?>
                        <?php if (!file_exists(WWW_ROOT . '/uploads/patients/' . $patient->id . DS . $patient->image)): ?>
                            <div class="no-img">
                                <?php 
                                    $str = explode(' ', $patient->full_name);
                                    $arr = '';
                                    foreach ($str as $s) {
                                        $arr .= substr($s, 0, 1);
                                    }
                                    echo $arr;
                                ?>
                            </div>
                        <?php else: ?>
                            <?php echo $image ?>
                        <?php endif ?>
                        </div>
                        <div class="profile-name"><?= $patient->full_name ?></div>
                        <div class="profile-age-gender"><?= __('{0} Years Old {1}', date('Y') - $patient->date_of_birth->format('Y'), ucfirst($patient->sex)) ?></div>
                        <div class="profile-relationship"><?= ucfirst($patient->relationship) ?></div>
                    </a>
            <?php endforeach ?>
        </div>
    </div>
</div>
