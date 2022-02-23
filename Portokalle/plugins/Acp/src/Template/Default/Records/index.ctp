<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Section-->
    <div class="row">
        <?php foreach ($records as $record): ?>
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
                                                if (!empty($record->image)) {
                                                    $imagePath = 'uploads' . DS . 'records' . DS . $record->id . DS . $record->image;
                                                }
                                            ?>
                                            <img src="<?php echo $this->Url->build(DS . $imagePath) ?>">
                                        </span>
                                    </div>
                                    <div class="kt-widget__info">
                                        <a href="<?= $this->Url->build(['action' => 'edit', $record->id]) ?>" class="kt-widget__title">
                                            <?= $record->full_name ?>
                                        </a>
                                        <span class="kt-widget__desc">
                                            <?= $record->title ?>
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
                                            <span class="btn btn-label-brand btn-sm btn-bold btn-upper"><?= $record->created ?></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__item">
                                        <span class="kt-widget__date">
                                            Modified
                                        </span>
                                        <div class="kt-widget__label">
                                            <span class="btn btn-label-danger btn-sm btn-bold btn-upper"><?= $record->modified ?></span>
                                        </div>
                                    </div>
                                </div>
                                <span class="kt-widget__text">
                                    <?= $record->description ?>
                                </span>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__details">
                                        <!-- <span class="kt-widget__subtitle">Number of uses</span>
                                        <span class="kt-widget__value">10</span> -->
                                    </div>
                                    <div class="kt-widget__details">
                                        <!-- <span class="kt-widget__subtitle">Total cost</span>
                                        <span class="kt-widget__value"><span>$</span>76,810</span> -->
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__subtitle">Record attachments</span>
                                        <div class="kt-badge kt-badge__pics">

                                            <?php if (!empty($record->record_attachments)): ?>
                                                <?php $str =  explode('|', $record->record_attachments); unset($str[count($str) - 1])?>
                                                <?php foreach ($str as $img): ?>
                                                    <img class="kt-badge__pic" src="<?= $this->Url->build(DS . 'uploads' . DS . 'records' . DS . $record->id . DS . $img) ?>">
                                                <?php endforeach ?> 
                                            <?php endif ?>
                                            
                                            <!-- <a href="#" class="kt-badge__pic kt-badge__pic--last kt-font-brand">
                                                +7
                                            </a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__footer">
                                <div class="kt-widget__wrapper">
                                    <div class="kt-widget__section">
                                        <!-- <div class="kt-widget__blog">
                                            <i class="flaticon2-list-1"></i>
                                            <a href="#" class="kt-widget__value kt-font-brand">72 Tasks</a>
                                        </div>
                                        <div class="kt-widget__blog">
                                            <i class="flaticon2-talk"></i>
                                            <a href="#" class="kt-widget__value kt-font-brand">648 Comments</a>
                                        </div> -->
                                    </div>
                                    <div class="kt-widget__section">
                                        <a href="<?= $this->Url->build(['action' => 'edit', $record->id]) ?>"><button type="button" class="btn btn-brand btn-sm btn-upper btn-bold">details</button></a>
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