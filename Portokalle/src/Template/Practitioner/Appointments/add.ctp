<?= $this->Form->create($appointment) ?>
<fieldset>
    <legend><?= __('Add Appointment') ?></legend>
    <?php
        echo $this->Form->control('patient_id', ['options' => $patients]);
        echo $this->Form->control('status', ['options' => ['Confirmed', 'Booked', 'Waiting list']]);
        echo $this->Form->control('date');
        echo $this->Form->control('start_time', ['type' => 'time']);
        echo $this->Form->control('duration');
        echo $this->Form->control('location', ['options' => ['Online Consultation' => 'Online Consultation', 'Phone Consultation' => 'Phone Consultation']]);
        echo $this->Form->control('comments');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>