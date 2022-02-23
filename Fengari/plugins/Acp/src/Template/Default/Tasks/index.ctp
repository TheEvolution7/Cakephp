<?
    use Cake\I18n\FrozenTime;
    use Cake\I18n\Time;
    $list = [
        0 => __d('acp','new'),
        1 => __d('acp','pending'),
        2 => __d('acp','important'),
        3 => __d('acp','finish'),
        4 => __d('acp','expired')
    ];
?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <div class="row align-items-center mb-4">
            <div class="col-md-3 col-6 my-3">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-plus"></i><?= __d('acp','Add New') ?></a>
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
                            'controller' => 'tasks',
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
                                <th><?= __d('acp','Title')?></th>
                                <th><?= __d('acp','Description')?></th>
                                <th><?= __d('acp','Status')?></th>
                                <th><?= __d('acp','Time')?></th>
                                <th><?= __d('acp','Action')?></th>
                                <th>
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                        <input type="checkbox" id="checkall">&nbsp;<span></span>
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tasks as $task): ?>
                                <tr data-id="<?= $task->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($task->id) ?></th>
                                    <td>
                                        <?= h($this->Text->truncate($task->title, 120, ['ellipsis' => ' ...', 'exact' => false ])) ?>
                                            
                                    </td>
                                    <td>
                                        <?= h($this->Text->truncate($task->description, 120, ['ellipsis' => ' ...', 'exact' => false ])) ?>
                                    </td>
                                    <td><span class="kt-badge kt-badge--info kt-badge--inline">
                                        <?php 
                                            $time = $task->date; 
                                            $time_now = Time::now();
                                        ?>
                                        <?php 
                                            if ($time < $time_now){
                                                echo $list[4];
                                            }else{
                                                echo $list[$task->status];
                                            }
                                        ?>
                                        </span></td>
                                    <td><?= $task->date ?></td>
                                    <td><?= $this->Element('Acp.Core' . DS . 'action', ['id' => $task->id]) ?></td>
                                    <td>
                                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                            <input type="checkbox" class="cb-element">&nbsp;<span></span>
                                        </label>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <?= $this->Element('Acp.Core' . DS . 'pagination', ['delete' => true, 'sort' => true]) ?>
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

