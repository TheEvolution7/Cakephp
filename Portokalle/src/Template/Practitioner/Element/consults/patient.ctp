<?php echo $this->Form->create(); ?>
<div class="form-container">
    <div class="field">
        <h3 class="field__title"><?= __('Who is this visit for ?') ?></h3>
        <div class="field__wrap">
            <div class="profiles-body md:grid-col-4">
                <?php foreach ($patients as $key => $patient): ?>
                    <input type="radio" id="patient-<?= $key ?>" class="hidden" name="patient_id" value="<?= $patient->id ?>" required/>
                    <label for="patient-<?= $key ?>">
                        <div class="profile-wrapper">
                            <div class="profile-image">
                                <?= $this->Html->image('/uploads/patients/' . $patient->id . DS . $patient->image) ?>
                            </div>
                            <div class="profile-name"><?= $patient->full_name ?></div>
                            <div class="profile-age-gender">
                                <?= __('{0} Years Old {1}', 18, ucfirst($patient->sex)) ?>
                            </div>
                            <div class="profile-relationship">
                                <?= ucfirst($patient->relationship) ?>
                            </div>
                        </div>
                    </label>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue']) ?>
    <?= $this->Form->button(__('Next'), ['class' => 'btn btn_blue']) ?>
</div>
<? echo $this->Form->end();