<?php 
    use Cake\I18n\Time;
    use Cake\I18n\Number;

    $consults = unserialize($appointment->data_save);
    $time = new Time(__('{date} {time}', $consults['slot']));
?>
<div class="builder-container">
    <div class="builder-row">
        <div class="form-build">
            <div class="form-container __review-step">
                <?php if(!empty($paymentData)){ ?>
                    <h2 class="field__title">
                        Your Payment has been Successful!
                    </h2>
                    <div class="row-cancel box-sumary">
                        <div class="col-box-6">
                            <div class="field">
                                <h3 class="field__title">Payment Information</h3>
                                <div class="table-wrap">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>TXN ID:</td>
                                                <td><?php echo $paymentData['txn_id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Paid Amount:</td>
                                                <td><?php echo $paymentData['payment_gross'].' '.$paymentData['currency_code']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Payment Status:</td>
                                                <td><?php echo $paymentData['payment_status']; ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <td>Payment Date:</td>
                                                <td><?php echo $paymentData['created']; ?></td>
                                            </tr> -->
                                            <tr>
                                                <td>Payer Name:</td>
                                                <td><?php echo $paymentData['payer_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Payer Email:</td>
                                                <td><?php echo $paymentData['payer_email']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-box-6">
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
                                                <td><?= $consults['findPractitioner']['full_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>When</td>
                                                <td><?= $time->nice() . ' - ' . $services->duration . ' minutes' ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <td>Location (at time of appointment)</td>
                                                <td><?= $consults['location']['timezone'] ?></td>
                                            </tr> -->
                                            <tr>
                                                <td>Price</td>
                                                <td><?php echo $this->Number->currency($services->price, 'USD'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Appointment Status</td>
                                                <td><?php echo $appointment->status; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Payment status</td>
                                                <td>
                                                    <?= $appointment->order->status ?>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td>Payment status</td>
                                                <td>
                                                    <?php 
                                                    if (!empty($appointment->stripe_status)) {
                                                        echo ucfirst(json_decode($appointment->stripe_status, true)['data']['object']['charges']['data'][0]['status']);
                                                    } else {

                                                    }
                                                    ?>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                    <h2 class="field__title">
                        Your Payment has Failed
                    </h2>
                <?php } ?>
            </div>
            <div class="flex justify-center btn-step">
                <a href="<?= $this->Url->build(['controller' => 'Dashboards', 'action' => 'index']) ?>" class="btn btn_blue __back">
                    <svg class="icon icon-arrow-prev">
                        <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-prev"></use>
                    </svg>
                    Back to Dashbroad
                </a>
            </div>
        </div>
    </div>
</div>
