<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Section-->
    <div class="row">
        <?php foreach ($medical_requests as $medical_request): ?>
            <div class="col-xl-6">

                <!--begin:: Portlet-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__body kt-portlet__body--fit">

                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--project-1">
                            <div class="kt-widget__head">
                                <div class="kt-widget__label">
                                    <div class="kt-widget__media">
                                        <span class="kt-userpic kt-userpic--lg kt-userpic--circle">
                                            <?php
                                                $imagePath = 'img/no_thumb.png';
                                                if (!empty($medical_request->user->image)) {
                                                    $imagePath = 'uploads' . DS . 'users' . DS . $medical_request->user->id . DS . $medical_request->user->image;
                                                }
                                            ?>
                                            <img src="<?php echo $this->Url->build(DS . $imagePath) ?>">
                                        </span>
                                    </div>
                                    <div class="kt-widget__info">
                                        <a href="<?= $this->Url->build(['action' => 'edit', $medical_request->id]) ?>" class="kt-widget__title">
                                            <?= $medical_request->user->full_name ?>
                                        </a>
                                        <span class="kt-widget__desc">
                                            User
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-widget__label">
                                    <div class="kt-widget__media">
                                        <span class="kt-userpic kt-userpic--lg kt-userpic--circle">
                                            <?php
                                                $imagePath = 'img/no_thumb.png';
                                                if (!empty($medical_request->doctor->image)) {
                                                    $imagePath = 'uploads' . DS . 'users' . DS . $medical_request->doctor->id . DS . $medical_request->doctor->image;
                                                }
                                            ?>
                                            <img src="<?php echo $this->Url->build(DS . $imagePath) ?>">
                                        </span>
                                    </div>
                                    <div class="kt-widget__info">
                                        <a href="<?= $this->Url->build(['action' => 'edit', $medical_request->id]) ?>" class="kt-widget__title">
                                            <?= $medical_request->doctor->full_name ?>
                                        </a>
                                        <span class="kt-widget__desc">
                                            Doctor
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__body">
                                <div class="kt-widget__stats">
                                    <div class="kt-widget__item">
                                        <span class="kt-widget__date">
                                            Create
                                        </span>
                                        <div class="kt-widget__label">
                                            <span class="btn btn-label-brand btn-sm btn-bold btn-upper"><?= $medical_request->created ?></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__item">
                                        <span class="kt-widget__date">
                                            Modified
                                        </span>
                                        <div class="kt-widget__label">
                                            <span class="btn btn-label-danger btn-sm btn-bold btn-upper"><?= $medical_request->modified ?></span>
                                        </div>
                                    </div>
                                </div>
                                <span class="kt-widget__text">
                                    <p><b>Symptoms</b>: <?= $medical_request->symptoms ?></p>
                                    <p><b>Description</b>: <?= $medical_request->description ?></p>
                                    <p><b>Sick Notes</b>: <?= $medical_request->sick_notes ?></p>
                                    <p><b>Prescriptions</b>: <?= $medical_request->prescriptions ?></p>
                                </span>
                                <!-- <div class="kt-widget__content">
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__subtitle">Number of uses</span>
                                        <span class="kt-widget__value">10</span>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__subtitle">Total cost</span>
                                        <span class="kt-widget__value"><span>$</span>76,810</span>
                                    </div>
                                </div> -->
                            </div>
                            <div class="kt-widget__footer">
                                <div class="kt-widget__wrapper">
                                    <div class="kt-widget__section">
                                        <div class="kt-widget__blog">
                                            <i class="flaticon2-phone"></i>
                                            <a href="#" class="kt-widget__value kt-font-brand">Audio 5:30</a>
                                        </div>
                                        <div class="kt-widget__blog">
                                            <i class="flaticon2-avatar"></i>
                                            <a href="#" class="kt-widget__value kt-font-brand">Video 8:21</a>
                                        </div>
                                    </div>
                                    <div class="kt-widget__section">
                                        <a href="<?= $this->Url->build(['action' => 'view', $medical_request->id]) ?>"><button type="button" class="btn btn-brand btn-sm btn-upper btn-bold">details</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end::Widget -->
                    </div>
                </div>

                <!--end:: Portlet-->
            </div>
        <?php endforeach ?>
    </div>

    <!--End::Section-->

    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">

            <!--begin:: Components/Pagination/Default-->
            <div class="kt-portlet">
                <div class="kt-portlet__body">

                    <!--begin: Pagination-->
                    <?= $this->Element('Acp.pagination') ?>

                    <!--end: Pagination-->
                </div>
            </div>

            <!--end:: Components/Pagination/Default-->
        </div>
    </div>

    <!--End::Section-->
</div>