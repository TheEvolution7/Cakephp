<?php 
    use Cake\I18n\Time;
    use Cake\I18n\Number;

    $session = $this->getRequest()->getSession();
    $consults = $session->read('Consults');
    $time = new Time(__('{date} {time}', $consults['slot']));
    echo $this->Form->create();
?>
<div class="form-container">
    <div class="form-container __review-step">
        <h2 class="field__title">
            Review booking details
        </h2>
        <div class="row-cancel box-sumary">
            <div class="col-box-7">
                <div class="field">
                    <h3 class="field__title">Appointment details</h3>
                    <div class="table-wrap">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Service</td>
                                    <td><?= $services->title ?></td>
                                </tr>
                                <tr>
                                    <td>Provider</td>
                                    <td><?= $session->read('Consults.findPractitioner.full_name') ?></td>
                                </tr>
                                <tr>
                                    <td>When</td>
                                    <td><?= $time->nice() ?></td>
                                </tr>
                                <!-- <tr>
                                    <td>Location (at time of appointment)</td>
                                    <td><?= $consults['location']['timezone'] ?></td>
                                </tr> -->
                                <tr>
                                    <td>Price</td>
                                    <td><?php echo $this->Number->currency($services->price, 'USD'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-box-5">
                <div class="field">
                    <h3 class="field__title">Your details</h3>
                    <div class="table-wrap">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Patient</td>
                                    <td><?= $patients->full_name ?></td>
                                </tr>
                                <tr>
                                    <td>Tell us more</td>
                                    <td>
                                        <?php foreach ($session->read('Consults.details') as $key => $value): ?>
                                            <?php echo !empty($value) ? ucfirst($key) . ': ' . $value . '<br>' : null ?>
                                        <?php endforeach ?>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-checkbox flex item-center mr-6">
    <input type="checkbox" class="form-checkbox" name="check-review" id="check-review" required="true">
    <label for="check-review">I have read and agree to the <a href="#">Cancellation Policy</a></label>
</div>
<div class="flex justify-center btn-step">
    <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue __back']) ?>
    <?= $this->Form->button(__('Continue'), ['class' => 'btn btn_blue __next']) ?>
</div>
<?php echo $this->Form->end() ?>
