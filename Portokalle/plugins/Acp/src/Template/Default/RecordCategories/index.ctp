<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Dashboard 1-->
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-12">
            <div class="table-toolbar">
                <div class="btn-group">
                    <a href="<?= $this->Url->build(['plugin' => 'Acp', 'controller' => 'RecordCategories', 'action' => 'add']) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-plus"></i> <?= __d('acp', 'Add New') ?></a>
                    <!-- <a href="add-Records.html" class="btn btn-bold btn-sm btn-font-sm btn-warning"><i class="fa fa-plus"></i> Sort</a> -->
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
                        'controller' => 'RecordCategories',
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
                            <th>ID</th>
                            <th style="text-align: left;"><?= __d('acp', 'Name') ?></th>
                            <th><?= __d('acp', 'Language') ?></th>
                            <th><?= __d('acp', 'Sort') ?></th>
                            <th><i class="fa fa-check"></i></th>
                            <th><?= __d('acp', 'Action') ?></th>
                            <th>
                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                    <input type="checkbox" id="checkall">&nbsp;<span></span>
                                </label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recordCategories_id as $key_c_id => $c_id): ?>
                            <?php foreach ($recordCategories as $recordCategory): ?>
                                <?php if ($key_c_id == $recordCategory->id): ?>
                                    <tr class="text-center" data-id="<?= $recordCategory->id ?>">
                                        <th scope="row"><?= $this->Number->format($recordCategory->id) ?></th>
                                        <td style="text-align: left;"><?php echo h($c_id) ?></td>
                                        <td><?= $this->Element('Acp.Core' . DS . 'language', ['id' => $recordCategory->id, 'translations' => $recordCategory->_translations]) ?></td>
                                        <td>
                                            <?php echo $this->Html->link('<i class="fa fa-angle-up"></i>', ['action' => 'moveup/',$recordCategory->id],['escape' => false,'class' => 'btn btn-sm btn-bold']); ?>
                                            <?php echo $this->Html->link('<i class="fa fa-angle-down"></i>', ['action' => 'movedown/',$recordCategory->id],['escape' => false,'class' => 'btn btn-sm btn-bold']); ?>
                                        </td>
                                        <td> 
                                            <label class="jupdate_single_field update-status" data-field="status">
                                                <?= $this->Element('Acp.Core' . DS . 'status', [
                                                    'status' => [
                                                        'value' => $recordCategory->status,
                                                        'class' => [
                                                            'enable' => 'fa fa-check',
                                                            'disable' => 'fa fa-check gray'
                                                        ]
                                                    ]
                                                ]) ?>
                                            </label>
                                        </td>
                                        <td>
                                            <?= $this->Element('Acp.Core' . DS . 'action', ['id' => $recordCategory->id]) ?>
                                        </td>
                                        <td>
                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                                <input type="checkbox" class="cb-element">&nbsp;<span></span>
                                            </label>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endforeach ?>
                        <tr>
                            <td>
                                <?= $this->Element('Acp.Core' . DS . 'pagination', ['delete' => true, 'sort' => true]) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--End::Row-->
    <!--End::Dashboard 1-->
</div>