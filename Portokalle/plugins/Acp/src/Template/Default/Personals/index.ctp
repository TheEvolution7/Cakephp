<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row align-items-center mb-4">
            <div class="col-md-3 col-6 my-3">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-plus"></i><?= __d('acp','Add New') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-3">
                
            </div>
        </div>
        <!--Begin::Row-->
        <div class="row kt-portlet">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <?php 
                    $tableCells = [];
                    foreach ($personals as $personal) {
                        $tableCells[] = [
                            $personal->full_name,
                            $personal->email,
                            '<a href="' . $this->Url->build(['action' => 'edit', $personal->id]). '" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-pen"></i>Edit</a><a href="' . $this->Url->build(['action' => 'view', $personal->id]). '" class="btn btn-bold btn-sm btn-font-sm btn-label-info"><i class="fa fa-eye"></i>View</a>'
                        ];
                    }
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <?php echo $this->Html->tableHeaders(['Full Name', 'Email', 'Action']); ?>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <?php echo $this->Html->tableCells($tableCells); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
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
    </div>
    <!-- end:: Content -->
</div>

