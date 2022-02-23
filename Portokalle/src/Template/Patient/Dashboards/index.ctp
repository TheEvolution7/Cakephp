<?php 
    $session = $this->getRequest()->getSession();
?>
<div class="page2__container">
    <div class="page2__row">
        <div class="page2__col page2__col_w65">
            <div class="sorting js-sorting">
                <h1 class="sorting__title title"><?= __('Recent History') ?></h1>
            </div>

            <div class="card1">
                <div class="card1__body">
                    <div class="card1__note"><?= __('Hi {0}, you haven\'t been prescribed any medication or received a doctor\'s note yet.', $this->AuthUser->user('full_name')) ?></div>
                    <a href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'consults']) ?>" class="header__btn btn btn_blue __purple btn__ssm"><?= __('Get health Care') ?></a>
                </div>
            </div>
        </div>

        <div class="page2__col page2__col_w35">
            <div class="overview__card overview__card_p0">
                <div class="statistics">
                    <div class="statistics__body">
                        <div class="statistics__top">
                            <div class="statistics__title">Consultations</div>
                        </div>
                        <?php if ($session->check('Consults')): ?>
                            <div class="statistics__group">
                                <div class="statistics__item">
                                    <div class="statistics__details">
                                        <div class="statistics__man">DRAFT</div>
                                        <p>You have not submitted this request to the provider.</p>
                                        <a class="statistics__view" href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'consults', $session->read('Consults.uuid'), 'patient']) ?>">Continue with this consultation</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if (!empty($order)): ?>
                            <div class="statistics__group">
                                <div class="statistics__item">
                                    <div class="statistics__details">
                                        <div class="statistics__man">Waitting Payment</div>
                                        <a class="statistics__view" href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'consults', $order->appointment->uuid, 'checkout']) ?>">Continue with this consultation</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
