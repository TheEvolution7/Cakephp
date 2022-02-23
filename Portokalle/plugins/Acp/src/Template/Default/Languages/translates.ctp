<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content Head -->
    <!-- end:: Content Head -->
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
                            'controller' => 'Languages',
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
                                <th><?= __d('acp', 'Id') ?></th>
                                <th><?= __d('acp','Title')?></th>
                                <th><?= __d('acp','Website')?></th>
                                <th></th>
                                <th><?= __d('acp','Admin')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($languages as $language): ?>
                                <tr data-id="<?= $language->id?>" class="text-center">
                                    <th scope="row"><?= h($language->id) ?></th>
                                    <td><?= h($language->title) ?></td>
                                    <td><?= $this->Html->link(__d('acp', 'Update'), ['plugin' => 'Acp', 'controller' => 'pos', 'action' => 'main', $language->id], ['class' => 'btn btn-bold btn-sm btn-font-sm btn-label-success mb-2', 'escape' => false]) ?></td>
                                    <td><?= $this->Html->link(__d('acp', 'Edit'), ['plugin' => 'Acp', 'controller' => 'pos', 'action' => 'index', $language->id], ['class' => 'btn btn-bold btn-sm btn-font-sm btn-label-warning mb-2', 'escape' => false]) ?></td>
                                    <td><?= $this->Html->link(__d('acp', 'Update'), ['plugin' => 'Acp', 'controller' => 'pos', 'action' => 'main', $language->id, 'acp'], ['class' => 'btn btn-bold btn-sm btn-font-sm btn-label-success mb-2', 'escape' => false]) ?></td>
                                    <td><?= $this->Html->link(__d('acp', 'Edit'), ['plugin' => 'Acp', 'controller' => 'pos', 'action' => 'index', $language->id, 'acp'], ['class' => 'btn btn-bold btn-sm btn-font-sm btn-label-warning mb-2', 'escape' => false]) ?></td>
                                </tr>
                            <?php endforeach ?>
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

