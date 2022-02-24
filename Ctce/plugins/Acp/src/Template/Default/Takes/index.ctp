<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <div class="row align-items-center mb-4">
        </div>

        <!--Begin::Row-->
        <div class="row kt-portlet">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <?= $this->Form->create(null, [
                        'class' => 'ajax-table',
                        'url' => [
                            'plugin' => 'Acp',
                            'controller' => 'takes',
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
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th><?= __d('acp','User')?></th>
                                <th><?= __d('acp','Quiz')?></th>
                                <th><?= __d('acp','Action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($takes as $take): ?>
                                <tr data-id="<?= $take->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($take->id) ?></th>
                                    <td>
                                        <?= $this->Html->link($take->user->full_name, [
                                            'controller' => 'TakeAnswers',
                                            'action' => 'index',
                                            '?' => [
                                                'user_id' => $take->user_id
                                            ]
                                            ]) ?>
                                    </td>
                                    <td>
                                        <?= $take->quiz->content ?>
                                    </td>
                                    <td>
                                        <?= $this->Html->link('<i class="fa fa-address-book"></i>'.__d('acp','Take Answers'), [
                                            'controller' => 'TakeAnswers',
                                            'action' => 'index',
                                            '?' => [
                                                'take_id' => $take->id
                                            ]
                                            ], ['class' => 'btn btn-sm btn-label-info btn-bold btn-remove mb-2', 'escape' => false]) ?>

                                        <?= $this->Html->link('<i class="fa fa-question"></i>'.__d('acp','View Result'), [
                                            'controller' => 'Takes',
                                            'action' => 'view',
                                            $take->id
                                            ], ['class' => 'btn btn-sm btn-label-success btn-bold btn-remove mb-2', 'escape' => false]) ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <?= $this->Element('Acp.Core' . DS . 'pagination', ['delete' => false, 'sort' => false]) ?>
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

