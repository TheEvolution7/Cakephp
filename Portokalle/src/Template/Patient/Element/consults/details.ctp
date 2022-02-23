<?php 
    use Cake\I18n\Time;
    $session = $this->getRequest()->getSession();
    $consults = $session->read('Consults');
    if (!empty($consults['slot']['date'])) {
        $time = new Time(__('{date} {time}', $consults['slot']));
    }
    echo $this->Form->create();
?>
<?php if ($session->read('Consults.speciality.type_booking') == 'book_appointment'): ?>
    <div class="form-container">
        <div class="box-checkout">
            <div class="pack-col">
                <div class="field">
                    <h3 class="field__title">Do you need a note or prescription?</h3>
                    <p style="margin-bottom: 20px;">Included with the consultation, if required</p>
                    <div class="field__wrapper grid grid-col-2 sm:grid-col-2 flex-grow item-start">
                        <div class="form-checkbox flex item-center mr-6">
                            <input type="checkbox" class="form-checkbox" name="note" value="I need a note" />
                            <label for="">I need a note</label>
                        </div>
                        <div class="item-center mr-6" style="width: 100%;">
                            <div class="form-checkbox flex">
                                <input type="checkbox" class="form-checkbox check-input-hidden" id="need-2" name="note" value="I need a prescription renewal." />
                                <label for="need-2">I need a prescription renewal.</label>
                            </div>

                            <div class="field__wrap flex-auto" id="input-hidden" style="display: none;">
                                <input type="text" class="field__input __2" placeholder="Name of medication(optional)" name="medication" />
                            </div>
                        </div>
                    </div>
                    <h3 class="field__title" style="margin-top: 20px;">
                        Tell us more
                    </h3>
                    <div class="field__wrap flex-auto">
                        <textarea class="field__textarea" placeholder="Leave your note to doctors" name="description" id="" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="total-col">
                <h3 class="field__title">Appointment details</h3>
                <div class="box-content edit-form">
                    <div class="box-appoint">
                        <h5>Service</h5>
                        <p><?= $detail->title ?><br/><?= isset($services)?$services->title:null ?></p>
                        <?php if ($session->read('Consults.findPractitioner.full_name')): ?>
                            <h5>Provider</h5>
                            <p><?= $session->read('Consults.findPractitioner.full_name') ?></p>
                        <?php endif ?>
                        <?php if (isset($time)): ?>
                            <h5>When</h5>
                            <p><?= $time->nice() ?></p> 
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center btn-step">
        <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
        <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
    </div>
<?php else: ?>
    <div class="form-container">
        <?php if (!empty($detail->details)): ?>
            <?php foreach (unserialize($detail->details) as $value): ?>
                <div class="field flex sm:flex-col">
                    <h3 class="field__title w-p25 sm:w-p100 mr-6">
                        <?= $value['title'] ?>
                    </h3>
                    <?php foreach ($value['content'] as $k => $v): ?>
                        <?php if ($k == 'checkbox'): ?>
                            <div class="field__wrapper grid grid-col-3 sm:grid-col-2 flex-grow item-start">
                                <?php foreach ($v as $c): ?>
                                    <div class="form-checkbox flex item-center mr-6">
                                        <input type="checkbox" class="form-checkbox" value="<?= $c ?>" name="symptoms[]" />
                                        <label for=""><?= $c ?></label>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>

                        <!-- <?php if ($k == 'textarea'): ?>
                            <div class="field__wrap flex-auto">
                                <textarea class="field__textarea" placeholder="<?= $v ?>" name="description" id="" cols="30" rows="5"></textarea>
                            </div>
                        <?php endif ?> -->
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>
        
        <div class="field flex sm:flex-col">
            <h4 class="field__title w-p25 mr-6 sm:w-p100">
                Do you want a doctor a note or prescription renewal?
            </h4>
            <div class="field__wrap flex flex-col justify-center item-start sm:flex-col w-p75 sm:w-p100">
                <div class="form-checkbox flex item-center mr-6">
                    <input type="checkbox" class="form-checkbox" id="need-1" value="I need a doctor's note" />
                    <label for="need-1">I need a doctor's note</label>
                </div>
                <div class="item-center mr-6" style="width: 100%;">
                    <div class="form-checkbox flex">
                        <input type="checkbox" class="form-checkbox check-input-hidden" id="need-2" />
                        <label for="need-2">I need a prescription renewal.</label>
                    </div>
                    <div class="field__wrap flex-auto" id="input-hidden" style="display: none;">
                        <input type="text" class="field__input __2" placeholder="Name of medication(optional)" name="medication" />
                    </div>
                </div>
            </div>
        </div>
        <div class="field flex sm:flex-col">
            <h4 class="field__title w-p25 sm:w-p100 mr-6">
                Tell us more
            </h4>
            <!-- <div class="field__label">Who is this visit for ?</div> -->
            <div class="field__wrap flex-auto">
                <textarea class="field__textarea" placeholder="Leave your note to doctors" name="description" id="" cols="10" rows="5"></textarea>
            </div>
        </div>

        <div class="flex justify-center btn-step">
            <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
            <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
        </div>
    </div>
<?php endif ?>
<?php echo $this->Form->end() ?>
