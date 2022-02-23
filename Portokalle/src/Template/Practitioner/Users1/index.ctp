<div class="doc-dashboard">
    <div class="profile profile_user">
        <div class="profile__bg" style="background-image: url('<?= $webroot ?>img/bg-profile.jpg');">
            <a class="profile__edit modal-doctor" href="#modal-edit">
                Edit Profile
                <svg class="icon icon-edit">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-edit"></use>
                </svg>
            </a>
        </div>
        <div class="profile__user">
            <div class="profile__ava"><img class="profile__pic" src="<?= $webroot ?>img/ava-square-3.png" alt="" /></div>
            <div class="profile__details"><span class="profile__title title">Dr. Annie Do</span><span class="profile__login">@annie_do</span></div>
        </div>
    </div>
    <div class="page2__row">
        <div class="page2__col page2__col_w35">
            <div class="card1">
                <div class="card1__head">
                    <div class="card1__category">About Me</div>
                    <div class="options2 js-options">
                        <button class="options2__btn js-options-btn">
                            <svg class="icon icon-dots">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dots"></use>
                            </svg>
                        </button>
                        <div class="options2__dropdown js-options-dropdown">
                            <a class="options2__item modal-doctor" href="#modal-edit">
                                <div class="options2__icon">
                                    <svg class="icon icon-edit">
                                        <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-edit"></use>
                                    </svg>
                                </div>
                                <div class="options2__details">
                                    <div class="options2__info" style="white-space: nowrap;">Edit info</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card1__body">
                    <div class="card1__note">“Lorem ipsum dolor sit, amet consectetur adipisicing elit.”</div>
                    <div class="card1__list">
                        <a class="card1__item" href="#">
                            <svg class="icon icon-place">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-place"></use>
                            </svg>
                            Yogyakarta, ID
                        </a>
                        <a class="card1__item" href="#">
                            <svg class="icon icon-date">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-date"></use>
                            </svg>
                            Joined June 2021
                        </a>
                        <a class="card1__item" href="#">
                            <svg class="icon icon-relationship">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-relationship"></use>
                            </svg>
                            Cardiologist
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page2__col page2__col_w65">
            <div class="section">
                <div class="sec-h1">
                    <div class="sec-h1-title">
                        <div class="sec-h1-title-text">
                            Welcome back, dr. Annie Do
                        </div>
                    </div>
                    <div class="sec-h1-control">
                        <!-- <button class="button button_outlined button_small">View all</button> -->
                    </div>
                </div>

                <!-- <div class="sec-bgrid4">
<div class="doc-dashboard-item">
<div class="ddi-title">Notifications</div>
<div class="ddi-value">10</div>
<a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
</div>
<div class="doc-dashboard-item">
<div class="ddi-title">Drop-in</div>
<div class="ddi-value">3</div>
<a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
</div>
<div class="doc-dashboard-item">
<div class="ddi-title">Views</div>
<div class="ddi-value-group">
  <div class="ddi-value">1,219</div>
  <div class="ddi-grow grow-up">+11%</div>
</div>
<a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
</div>
<div class="doc-dashboard-item">
<div class="ddi-title">Earning this week</div>
<div class="ddi-value-group">
  <div class="ddi-value">$ 347.56</div>
  <div class="ddi-grow grow-down">-25%</div>
</div>
<div class="ddi-controls">
  <a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
</div>
</div>
</div> -->
                <div class="settings__list BZ59D6">
                    <div class="settings__card">
                        <div class="settings__counter">Summary</div>
                        <a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
                    </div>
                    <div class="settings__card">
                        <div class="settings__counter">12</div>
                        <div class="settings__text">New Messages</div>
                        <div class="settings__status settings__status_up">
                            +0.5%
                            <svg class="icon icon-arrow-top">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-top"></use>
                            </svg>
                        </div>
                        <a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
                    </div>
                    <div class="settings__card">
                        <div class="settings__counter">18</div>
                        <div class="settings__text">New Patiens</div>
                        <div class="settings__status settings__status_up">
                            1.5%
                            <svg class="icon icon-arrow-top">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-top"></use>
                            </svg>
                        </div>
                        <a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
                    </div>
                </div>

                <div class="settings__list BZ59D6">
                    <div class="settings__card">
                        <div class="settings__counter">3,123</div>
                        <div class="settings__text">Total Patients</div>
                        <div class="settings__status settings__status_up">
                            +0.5%
                            <svg class="icon icon-arrow-top">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-top"></use>
                            </svg>
                        </div>
                        <a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
                    </div>
                    <div class="settings__card">
                        <div class="settings__counter">$5,090</div>
                        <div class="settings__text">Income</div>
                        <div class="settings__status settings__status_up">
                            +0.5%
                            <svg class="icon icon-arrow-top">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-top"></use>
                            </svg>
                        </div>
                        <a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
                    </div>
                    <div class="settings__card">
                        <div class="settings__counter">$35,000</div>
                        <div class="settings__text">Earning</div>
                        <div class="settings__status settings__status_up">
                            1.5%
                            <svg class="icon icon-arrow-top">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-top"></use>
                            </svg>
                        </div>
                        <a href="doctor_drop-in.html" class="btn-a btn-a-sublink">View all ></a>
                    </div>
                </div>
            </div>

            <div class="overview__card overview__card_p0">
                <div class="statistics">
                    <div class="statistics__body">
                        <div class="statistics__top">
                            <div class="statistics__title">New Patients</div>
                            <div class="options2 js-options">
                                <button class="options2__btn js-options-btn">
                                    <svg class="icon icon-dots">
                                        <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-dots"></use>
                                    </svg>
                                </button>
                                <div class="options2__dropdown js-options-dropdown">
                                    <a class="options2__link" href="#">Remove Notifications</a>
                                    <a class="options2__link" href="#">Turn Off Notifications from Janeta</a>
                                </div>
                            </div>
                        </div>
                        <div class="statistics__group">
                            <div class="statistics__group_head">
                                Yesterday
                            </div>
                            <div class="statistics__item">
                                <div class="ava"><img class="ava__pic" src="<?= $webroot ?>img/ava-10.png" alt="" /></div>
                                <div class="statistics__details">
                                    <div class="statistics__man">Isabella Moran</div>
                                    <div class="statistics__id">Patients ID#00222</div>
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
                            <div class="statistics__item">
                                <div class="ava" style="background-color: #ff9ad5;">WC</div>
                                <div class="statistics__details">
                                    <div class="statistics__man">Warren Craig</div>
                                    <div class="statistics__id">Patients ID#00221</div>
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
                            <div class="statistics__group_head">
                                Last 3 days
                            </div>
                            <div class="statistics__item">
                                <div class="ava"><img class="ava__pic" src="<?= $webroot ?>img/ava-11.png" alt="" /></div>
                                <div class="statistics__details">
                                    <div class="statistics__man">Andrew Ellis</div>
                                    <div class="statistics__id">Patients ID#00220</div>
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
                            <div class="statistics__item">
                                <div class="ava"><img class="ava__pic" src="<?= $webroot ?>img/ava-9.png" alt="" /></div>
                                <div class="statistics__details">
                                    <div class="statistics__man">Sam Conner</div>
                                    <div class="statistics__id">Patients ID#00219</div>
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
                            <div class="statistics__item">
                                <div class="ava" style="background-color: #50b5ff;">SC</div>
                                <div class="statistics__details">
                                    <div class="statistics__man">Sam Conner</div>
                                    <div class="statistics__id">Patients ID#00218</div>
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
                    <div class="statistics__foot"><a class="statistics__view" href="#">View all patients</a></div>
                </div>
            </div>
        </div>
    </div>
</div>