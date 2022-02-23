<?php 
	$session = $this->getRequest()->getSession();
?>
<div class="page2__container">
    <div class="page2__row">
        <div class="page2__col">
            <div class="card1">
                <div class="card1__body" style="text-align: center;">
                    <div class="card1__note">
                    	<?= $results ?>
                    </div>
                    <a href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'view', $appointment->id]) ?>" class="header__btn btn btn_blue __purple btn__ssm"><?= __('Go to this appointment') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
