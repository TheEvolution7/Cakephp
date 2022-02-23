<div class="page2__container">
    <div class="patient-container">
        <div class="applicant__title title"><?= __('List Patients') ?></div>
        <div class="applicant__group">
            <?php foreach ($patients as $patient): ?>
                <div class="applicant__user">
                    <?php $image = $this->Url->build('/uploads/patients/' . $patient->id . DS . $patient->image);?>
                    <?php if (!file_exists(WWW_ROOT . '/uploads/patients/' . $patient->id . DS . $patient->image)): ?>
                        <div class="friends__ava">
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
                        </div>
                    <?php else: ?>
                        <div class="applicant__ava">
                            <img class="applicant__pic" src="<?= $this->Url->build('/uploads/patients/' . $patient->id . DS . $patient->image) ?>" alt="" />
                        </div>
                    <?php endif ?>
                    <div class="applicant__desc">
                        <div class="applicant__man"><?= $patient->full_name ?></div>
                    </div>
                    <div class="applicant__actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patient->id]) ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
