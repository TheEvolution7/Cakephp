<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
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
                                <th><?= __d('acp','Quiz Question')?></th>
                                <th><?= __d('acp','Quiz Answer')?></th>
                                <th><?= __d('acp','Take')?></th>
                                <th><?= __d('acp','Created')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($takeAnswers as $takeAnswer): ?>
                                <tr data-id="<?= $takeAnswer->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($takeAnswer->id) ?></th>
                                    <td>
                                        <?= $takeAnswer->quiz_question->content ?>
                                    </td>
                                    <td>
                                        <?= $takeAnswer->quiz_answer->content ?>
                                    </td>
                                    <td>
                                        <?= $takeAnswer->take->user->full_name ?>
                                    </td>
                                    <td>
                                        <?= $takeAnswer->created->nice() ?>
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

