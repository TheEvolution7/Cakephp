<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content Head -->
    
    <!-- end:: Content Head -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-plus"></i><?= __d('acp','Add') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <form class="float-left" style="margin-top: 15px; margin-bottom: 20px;">
                    <!-- <?= $this->Form->control('role_category_id', [
                        'options'       => $roleCategories,
                        'class'         => 'form-control kt-select2 select2',
                        'id'            => 'kt_form_type',
                        'div'           => false,
                        'label'         => false,
                        'hiddenField'   => false,
                        'empty'         => 'Select Category',
                        'value' => !empty($requestQuery['role_category_id']) ? $requestQuery['role_category_id'] : null,
                        'onchange' => 'this.form.submit()'
                        ]);
                    ?> -->
                </form>
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
                            'controller' => 'Roles',
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
                                <th><?= __d('acp','Name')?></th>
                                <th><?= __d('acp','Color')?></th>
                                <th><?= __d('acp','Description')?></th>
                                <th><?= __d('acp','Permission')?></th>
                                <th><?= __d('acp','Action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roles as $role): ?>
                                <tr data-id="<?= $role->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($role->id) ?></th>
                                    <td><?= h($role->title) ?></td>
                                    <td><?= h($role->color) ?></td>
                                    <td><?= h($role->description) ?></td>
                                    <td><a href="<?= $this->Url->build(['controller' => 'Roles', 'action' => 'permission',$role->id]) ?>"><button type="button" class="btn btn-bold btn-sm btn-font-sm btn-label-success" ><?=  __d('acp', 'Permission') ?></button></a>
                                    <td><?= $this->Element('Acp.Core' . DS . 'action', ['id' => $role->id]) ?></td>
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