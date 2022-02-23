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
                            'controller' => 'Contacts',
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
                                <th><?php echo __d('acp', 'Name') ?></th>
                                <th><?= __d('acp','Email')?></th>
                                <th><?= __d('acp','Attach Resume')?></th>
                                <th><?= __d('acp','Content')?></th>
                                <th><?= __d('acp','Created')?></th>
                                <th><?= __d('acp','Action')?></th>
                                <th>
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                        <input type="checkbox" id="checkall">&nbsp;<span></span>
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <style type="text/css">
                                .active-bold td{
                                    font-weight: bold;
                                }
                            </style>
                            <?php foreach ($careers as $career): ?>
                                <tr data-id="<?= $career->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($career->id) ?></th>
                                    <td><?= h($career->name) ?></td>
                                    <td><?= h($career->email) ?></td>
                                    <td><a href="<?= $this->Url->build('/uploads/careers/'.$career->article->uuid.'/file/'.$career->file) ?>" target="_blank"><?= $career->file ?></a></td>
                                    <td><?= h($career->content) ?></td>
                                    <td><?= $career->created ?></td>
                                    <td><?= $this->Element('Acp.Core' . DS . 'action', ['except' => ['edit' => false],'id' => $career->id]) ?></td>
                                    <td>
                                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                            <input type="checkbox" class="cb-element">&nbsp;<span></span>
                                        </label>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <?= $this->Element('Acp.Core' . DS . 'pagination', ['delete' => true, 'sort' => false,'exportExcel' => true]) ?>
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