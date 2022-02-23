<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <div class="row align-items-center mb-4">
            <div class="col-md-3 col-6 my-3">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <?= $this->Html->link('<i class="fa fa-plus"></i>' . __d('acp','Add Practice Hours'), 
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

        <!--Begin::Row-->
        <div class="row kt-portlet">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <?= $this->Form->create(null, [
                        'class' => 'ajax-table',
                        'url' => [
                            'plugin' => 'Acp',
                            'controller' => 'practice_hours',
                            'action' => 'updateStatus'
                        ]
                    ]) ?>
                    <?php 
                        $this->Form->unlockField('class');
                        $this->Form->unlockField('id');
                        $this->Form->unlockField('key');
                        $this->Form->unlockField('value');
                    ?>
                    <?= $this->Form->end() ?>

                    <?php 
                    $tableCells = [];
                    foreach ($practice_hours as $practice_hour) {
                        $tableCells[] = [
                            $practice_hour->personal->title . ' ' . $practice_hour->personal->forename . ' ' . $practice_hour->personal->surname,
                            '<a href="' . $this->Url->build(['action' => 'edit', $practice_hour->id]). '" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-pen"></i>Edit</a><a href="' . $this->Url->build(['action' => 'view', $practice_hour->id]). '" class="btn btn-bold btn-sm btn-font-sm btn-label-info"><i class="fa fa-eye"></i>View</a>'
                        ];
                    }
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <?php echo $this->Html->tableHeaders(['Personal', 'Action']); ?>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <?php echo $this->Html->tableCells($tableCells); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End::Row-->
        <!--End::Dashboard 1-->
        <div class="panel-footer" style="padding:0px 15px !important;">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="dataTables_info" id="sample_1_info"><?= $this->Paginator->counter(['format' => __d('acp', 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></div>
                </div>
                   
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>

