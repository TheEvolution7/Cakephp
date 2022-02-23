<div class="doc-dashboard">
    <div class="profile profile_user">
        <div class="profile__bg" style="background-image: url('<?= $webroot ?>img/bg-profile.jpg');">
            <!-- <a class="profile__edit modal-doctor" href="#modal-edit"><svg class="icon icon-edit">
                  <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-plus"></use>
                </svg></a> -->
        </div>
        <div class="profile__user">
            <div class="profile__ava">
                <!-- <label for="update-file" class="btn-update">
                    <svg class="icon icon-edit">
                        <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-plus"></use>
                    </svg>
                </label>
                <input type="file" name="update-file" accept="image/* " id="update-file" class="update-img" /> -->
                <?php $image = $this->Url->build('/uploads/users/' . $this->AuthUser->user('id') . DS . $this->AuthUser->user('image'));?>
                
                    <?php if (!file_exists(WWW_ROOT . '/uploads/users/' . $this->AuthUser->user('id') . DS . $this->AuthUser->user('image'))): ?>
                    <div class="friends__ava">
                        <div class="no-img">
                            <?php 
                                $str = explode(' ', $this->AuthUser->user('full_name'));
                                $arr = '';
                                foreach ($str as $s) {
                                    $arr .= substr($s, 0, 1);
                                }
                                echo $arr;
                            ?>
                        </div>
                    </div>
                    <?php else: ?>
                        <img class="profile__pic" src="<?= $image ?>" alt="" />
                    <?php endif ?>
                <!-- <div class="no-img">Do</div> -->
            </div>
            <div class="profile__details"><span class="profile__title title"><?= $this->AuthUser->user('full_name') ?></span><span class="profile__login"><?= $this->AuthUser->user('email') ?></span></div>
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
                            <a class="options2__item" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'account']) ?>">
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
                    <div class="card1__note"><?= $this->AuthUser->user('profile') ?></div>
                    <div class="card1__list">
                        <a class="card1__item" href="#">
                            <svg class="icon icon-place">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-place"></use>
                            </svg>
                            <?= $this->AuthUser->user('address') ?>
                        </a>
                        <a class="card1__item" href="#">
                            <svg class="icon icon-date">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-date"></use>
                            </svg>
                            Joined <?= $this->AuthUser->user('created')->nice() ?>
                        </a>
                        <!-- <a class="card1__item" href="#">
                            <svg class="icon icon-relationship">
                                <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-relationship"></use>
                            </svg>
                            Cardiologist
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="page2__col page2__col_w65">
            <div class="section">
                <div class="sec-h1">
                    <div class="sec-h1-title">
                        <div class="sec-h1-title-text">
                            Welcome back, <?= $this->AuthUser->user('full_name') ?>
                        </div>
                    </div>
                    <div class="sec-h1-control">
                        <!-- <button class="button button_outlined button_small">View all</button> -->
                    </div>
                </div>
            </div>
            <div class="tab-wrapper tab-dashboard">
                <ul class="tab">
                    <li>
                        <a href="#tab-1" class="doc-dashboard-item">
                            <div class="ddi-title">Notifications</div>
                            <div class="ddi-value"><?= count($notifications) ?></div>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-2" class="doc-dashboard-item">
                            <div class="ddi-title">New Patients</div>
                            <div class="ddi-value"><?= count($newPatients) ?></div>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-3" class="doc-dashboard-item">
                            <div class="ddi-title">Total Patients</div>
                            <div class="ddi-value-group">
                                <div class="ddi-value"><?= count($patients) ?></div>
                            </div>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#tab-4" class="doc-dashboard-item">
                            <div class="ddi-title">Earning</div>
                            <div class="ddi-value-group">
                                <div class="ddi-value">$347.56</div>
                            </div>
                            <div class="ddi-controls"></div>
                        </a>
                    </li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-item" id="tab-1">
                        <div class="notifications__list" style="margin-bottom: 15px;">
                            <?php foreach($notifications as $notification):?>
                                <a href="<?= $notification->link ?>" class="notifications__item">
                                    <div class="ava"><img class="ava__pic" src="<?= $notification->photo ?>"></div>
                                      <div class="notifications__details">
                                        <div class="notifications__text">
                                            <strong><?= $notification->text ?></strong>
                                        </div>
                                        <div class="notifications__time"><?= $notification->time ?></div>

                                      </div>
                                </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="tab-item" id="tab-2">
                        <div class="overview__card overview__card_p0">
                            <div class="statistics">
                                <div class="statistics__body">
                                    <div class="statistics__top">
                                        <div class="statistics__title">New Patients</div>
                                    </div>
                                    <div class="statistics__group">
                                        <div class="statistics__group_head">
                                            Yesterday
                                        </div>
                                        <?php foreach ($newPatients as $patient): ?>
                                            <div class="statistics__item">
                                                <a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'view', $patient->id]) ?>" class="ava">
                                                    <?php $image = $this->Url->build('/uploads/patients/' . $patient->id . DS . $patient->image);?>
                                                    <?php if (!file_exists(WWW_ROOT . '/uploads/patients/' . $patient->id . DS . $patient->image)): ?>
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
                                                    <?php else: ?>
                                                        <img class="settings__pic" src="<?= $image ?>" alt="" />
                                                        
                                                    <?php endif ?>
                                                </a>
                                                <div class="statistics__details">
                                                    <a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'view', $patient->id]) ?>" class="statistics__man"><?= $patient->full_name ?></a>
                                                    <div class="statistics__id"><?= ucfirst($patient->sex) ?></div>
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
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="statistics__foot"><a class="statistics__view" href="#">View all patients</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-item" id="tab-3">
                        <div class="overview__card overview__card_p0">
                            <div class="statistics">
                                <div class="statistics__body">
                                    <div class="statistics__top">
                                        <div class="statistics__title">All Patients</div>
                                    </div>
                                    <div class="statistics__group">
                                        <?php foreach ($patients as $patient): ?>
                                            <div class="statistics__item">
                                                <a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'view', $patient->id]) ?>" class="ava">
                                                    <?php $image = $this->Url->build('/uploads/patients/' . $patient->id . DS . $patient->image);?>
                                                    <?php if (!file_exists(WWW_ROOT . '/uploads/patients/' . $patient->id . DS . $patient->image)): ?>
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
                                                    <?php else: ?>
                                                        <img class="settings__pic" src="<?= $image ?>" alt="" />
                                                        
                                                    <?php endif ?>
                                                </a>
                                                <div class="statistics__details">
                                                    <a href="<?= $this->Url->build(['controller' => 'Patients', 'action' => 'view', $patient->id]) ?>" class="statistics__man"><?= $patient->full_name ?></a>
                                                    <div class="statistics__id"><?= ucfirst($patient->sex) ?></div>
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
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <!-- <div class="statistics__foot"><a class="statistics__view" href="#">View all patients</a></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-item" id="tab-4">
                        <div class="doc-das-earning">
                            <div class="sec-h1">
                                <div class="sec-h1-title">
                                    <div class="sec-h1-title-text">Earnings</div>
                                    <div class="sec-h1-title-subtitle">Earning increased <span class="grow-up-inline">15%</span> compared to previous period.</div>
                                </div>
                            </div>
                            <div class="sec-body">
                                <div class="sec-body-row earningChart" id="earningChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
