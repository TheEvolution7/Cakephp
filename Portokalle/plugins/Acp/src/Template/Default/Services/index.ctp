
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Section-->
    <div class="row align-items-center mb-4">
        <div class="col-md-3 col-6 my-3">
            <div class="table-toolbar">
                <div class="btn-group">
                    <?= $this->Html->link('<i class="fa fa-plus"></i>' . __d('acp','Add New'), 
                        [
                            'action' => 'add'
                        ],
                        [
                            'class' => 'btn btn-bold btn-sm btn-font-sm btn-label-success',
                            'escape' => false
                        ]) 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach ($services as $service): ?>
            <div class="col-xl-3">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit-y kt-margin-b-40">

                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-4">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <?php
                                        $imagePath = 'img/no_thumb.png';
                                        if (!empty($service->image)) {
                                            $imagePath = 'uploads' . DS . 'services' . DS . $service->id . DS . $service->image;
                                        }
                                    ?>
                                    <img class="kt-widget__img" src="<?php echo $this->Url->build(DS . $imagePath) ?>">
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="<?= $this->Url->build(['action' => 'edit', $service->id]) ?>" class="kt-widget__username">
                                            <?= $service->title ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end::Widget -->
                    </div>
                </div>
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