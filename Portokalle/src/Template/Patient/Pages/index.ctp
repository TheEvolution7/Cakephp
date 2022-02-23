<div class="page2__container">
    <div class="page2__row">
        <div class="page2__col page2__col_w65">
            <div class="sorting js-sorting">
                <h1 class="sorting__title title"><?php echo __('Recent History') ?></h1>
            </div>

            <div class="card1">
                <div class="card1__body">
                    <div class="card1__note"><?php echo __('Hi {0}, you haven\'t been prescribed any medication or received a doctor\'s note yet.', $this->request->session()->read('Auth.User.full_name')) ?></div>
                    <a href="past-medical-history.html" class="header__btn btn btn_blue btn__ssm"><?php echo __('Get care') ?></a>
                </div>
            </div>
        </div>

        <!-- <div class="page2__col page2__col_w35">
            <div class="overview__card overview__card_p0">
                <div class="statistics">
                    <div class="statistics__body">
                        <div class="statistics__top">
                            <div class="statistics__title">Consultations</div>
                        </div>
                        <div class="statistics__group">
                            <div class="statistics__item">
                                <div class="statistics__details">
                                    <div class="statistics__man">DRAFT</div>
                                    <p>Lipsum dolor sit amet consectetur adipisicing elit...</p>
                                    <a class="statistics__view" href="#">Continue with this consultation</a>
                                </div>
                                <div class="statistics__actions">
                                    <button class="statistics__action">
                                        <svg class="icon icon-email">
                                            <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-email"></use>
                                        </svg>
                                    </button>
                                    <button class="statistics__action">
                                        <svg class="icon icon-block">
                                            <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-block"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>