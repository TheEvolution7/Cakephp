<div class="page2__container">
    <div class="detail-pt-container">
        <div class="sorting1__row">
            <h1 class="sorting1__title title"><?= $patient->full_name ?> Profile</h1>
            <div class="sorting__variants"></div>
            <!-- <a href="user_dashboard.html" class="btn btn_blue __back">
                <svg class="icon icon-arrow-prev">
                    <use xlink:href="<?= $webroot ?>img/sprite.svg#icon-arrow-prev"></use>
                </svg>
                Back to dashboard
            </a> -->
        </div>
        <div class="page7__wrapper">
            <div class="settings">
                <div class="settings__col">
                    <div class="profile__options __patient">
                        <div class="tab-wrapper tab-patien">
                            <ul class="tab">
                                <li>
                                    <div class="profile__option">
                                        <a class="profile__link" href="#tab-1">
                                            <div class="profile__category">Patient notes</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile__option">
                                        <a class="profile__link" href="#tab-2">
                                            <div class="profile__category">Prescription</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile__option">
                                        <a class="profile__link" href="#tab-3">
                                            <div class="profile__category">Final diagnosis</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile__option">
                                        <a class="profile__link" href="#tab-4">
                                            <div class="profile__category">Prescription sent to pharmacy</div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-item" id="tab-1">
                                    <div class="content-detail">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, rem ut? Quisquam iusto inventore iste eos expedita veritatis assumenda suscipit, dolorem amet ut officiis ab placeat explicabo
                                            corrupti delectus dolore.
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-item" id="tab-2">
                                    <div class="content-detail">
                                        <div class="form-build">
                                            <div class="form-container">
                                                <div class="field">
                                                    <h3 class="field__title">Prescription details</h3>
                                                    <!-- <div class="field__label">Who is this visit for ?</div> -->
                                                    <div class="settings__card settings__card_table">
                                                        <div class="settings__body">
                                                            <div class="settings__table">
                                                                <div class="settings__row settings__row_head">
                                                                    <div class="settings__cell">Drug name</div>
                                                                    <div class="settings__cell">Price</div>
                                                                    <div class="settings__cell">Quantity</div>
                                                                    <div class="settings__cell">Total</div>
                                                                </div>
                                                                <div class="settings__row">
                                                                    <div class="settings__cell">Drug 1</div>
                                                                    <div class="settings__cell"><span class="settings__note">Price:</span>$10</div>
                                                                    <div class="settings__cell"><span class="settings__note">Quantity:</span>3</div>
                                                                    <div class="settings__cell"><span class="settings__note">Total:</span>$110</div>
                                                                </div>
                                                                <div class="settings__row">
                                                                    <div class="settings__cell">Drug 1</div>
                                                                    <div class="settings__cell"><span class="settings__note">Price:</span>$10</div>
                                                                    <div class="settings__cell"><span class="settings__note">Quantity:</span>3</div>
                                                                    <div class="settings__cell"><span class="settings__note">Total:</span>$110</div>
                                                                </div>
                                                                <div class="settings__row">
                                                                    <div class="settings__cell">Drug 1</div>
                                                                    <div class="settings__cell"><span class="settings__note">Price:</span>$10</div>
                                                                    <div class="settings__cell"><span class="settings__note">Quantity:</span>3</div>
                                                                    <div class="settings__cell"><span class="settings__note">Total:</span>$110</div>
                                                                </div>
                                                                <div class="settings__row">
                                                                    <div class="settings__cell">Drug 1</div>
                                                                    <div class="settings__cell"><span class="settings__note">Price:</span>$10</div>
                                                                    <div class="settings__cell"><span class="settings__note">Quantity:</span>3</div>
                                                                    <div class="settings__cell"><span class="settings__note">Total:</span>$110</div>
                                                                </div>
                                                                <div class="settings__row">
                                                                    <div class="settings__cell">Drug 1</div>
                                                                    <div class="settings__cell"><span class="settings__note">Price:</span>$10</div>
                                                                    <div class="settings__cell"><span class="settings__note">Quantity:</span>3</div>
                                                                    <div class="settings__cell"><span class="settings__note">Total:</span>$110</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-item" id="tab-3">
                                    <div class="content-detail">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla officia omnis vitae totam ipsam quo suscipit nisi, nobis quia laboriosam minus et minima pariatur earum cum facere doloribus deserunt
                                            fugiat.
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-item" id="tab-4">
                                    <div class="content-detail">
                                        <div class="package-container">
                                            <div class="col-pack">
                                                <div class="history__card">
                                                    <div class="history__logo">
                                                        <img class="history__pic" src="img/placeholder.svg" alt="" />
                                                        <!-- <div class="check-box-custom"></div> -->
                                                    </div>
                                                    <div class="history__title">Phacmacy 1</div>
                                                    <div class="history__details"><span class="history__company">Open: 7am - 6:30pm (All days)</span></div>
                                                    <div class="history__details"><span class="history__company">Rruga Faik Konica, Tirana, Albania</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="profile__option">
                      <a class="profile__link active" href="doctor_detail-patient.html">
                        <div class="profile__category">Patient notes</div>
                      </a>
                    </div>
                    <div class="profile__option">
                      <a class="profile__link" href="doctor_detail-prescription.html">
                        <div class="profile__category">Prescription</div>
                      </a>
                    </div>
                    <div class="profile__option">
                      <a class="profile__link" href="doctor_detail-diagnosis.html">
                        <div class="profile__category">Final diagnosis</div>
                      </a>
                    </div>
                    <div class="profile__option">
                      <a class="profile__link" href="doctor_detail-pharmacy.html">
                        <div class="profile__category">Prescription sent to pharmacy</div>
                      </a>
                    </div> -->
                    </div>
                </div>
                <div class="settings__col">
                    <div class="settings__card settings__card_profile">
                        <div class="settings__top">
                            <div class="settings__ava">
                                <div class="settings__ava">
                                    <?php $image = $this->Url->build('/uploads/patients/' . $patient->id . DS . $patient->image);?>
                                    <div class="friends__ava">
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
                                    </div>
                                </div>
                            </div>
                            <div class="settings__man"><?= $patient->full_name ?></div>
                            <div class="settings__post"><?= ucfirst($patient->sex) ?></div>
                            <div class="settings__post"><?= date('Y') - $patient->date_of_birth->format('Y') ?> year old</div>
                        </div>
                        <div class="settings__parameters">
                            <div class="settings__parameter">
                                <div class="settings__category">Email</div>
                                <a class="settings__value"><?= $patient->email ?></a>
                            </div>
                            <div class="settings__parameter">
                                <div class="settings__category">Mobile</div>
                                <a class="settings__value"><?= $patient->phone_number ?></a>
                            </div>
                            <!-- <div class="settings__parameter">
                                <div class="settings__category">Info</div>
                                <div class="settings__content">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit repudiandae velit cumque amet soluta, quod totam repellat? Deserunt expedita odio pariatur error dolores cum, inventore rerum?
                                        Voluptatibus mollitia iure enim.
                                    </p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
