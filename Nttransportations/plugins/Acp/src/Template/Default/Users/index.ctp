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
            <div class="col-md-3 col-6 my-3 d-flex flex-wrap justify-content-end">
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded float-none m-0" id="kt_datatable_latest_orders my-0" >
                    <div class="kt-datatable__pager kt-datatable--paging-loaded">
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail mr-1"><?= __d('acp','records') ?></span>
                            <div class="dropdown bootstrap-select w-auto kt-datatable__pager-size mr-0">
                                <form action="">
                                    <?= $this->Form->control('limit', [
                                        'options'       => [10 => 10 , 20 => 20 , 30 => 30 , 50 => 50 , 100 => 100, 200 => 200, 500 => 500],
                                        'class'         => 'selectpicker kt-datatable__pager-size mr-0',
                                        'div'         => false,
                                        'label'         => false,
                                        'hiddenField'   => false,
                                        'data-width' => '60px',
                                        'value' => !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10,
                                        'onchange' => 'this.form.submit()'
                                        ]);
                                    ?>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-3">
                <form class="d-flex justify-content-end align-items-center d-table mx-auto w-auto" action="">
                    <label class="mr-1 mb-0"><?= __d('acp','Search') ?>:</label>
                    <label class="mr-1 mb-0">
                        <?= $this->Form->control('keyword', ['class' => 'form-control input-medium', 'div' => false, 'label' => false, 'placeholder' => 'Email, name, phone', 'value' => !empty($requestQuery['keyword']) ? $requestQuery['keyword'] : null]); ?>
                    </label>
                    <label class="mr-1 mb-0">
                        <?= $this->Form->control('role_id', [
                            'options'       => $roles,
                            'class'         => 'form-control',
                            'id'            => 'kt_form_type',
                            'div'           => false,
                            'label'         => false,
                            'hiddenField'   => false,
                            'empty'         => __d('acp','Roles'),
                            'value' => !empty($requestQuery['role_id']) ? $requestQuery['role_id'] : null,
                            ]);
                        ?>
                    </label>
                    <label class=" mb-0 text-center" style="width: 45px">
                        <button title="Search" type="submit"  class="btn btn-bold btn-font-sm btn-label-success w-100 d-block"><i class="fa fa-search"></i></button>
                    </label>
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
                            'controller' => 'Users',
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
                                <th class="text-left"><?= __d('acp','Image')?></th>
                                <th><?= __d('acp','Email')?></th>
                                <th><?= __d('acp','Name')?></th>
                                <th><?= __d('acp','Role')?></th>
                                <th><i class="fa fa-check"></i></th>
                                <th><?= __d('acp','Order')?></th>
                                <th><?= __d('acp','Action')?></th>
                                <th>
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                        <input type="checkbox" id="checkall">&nbsp;<span></span>
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr data-id="<?= $user->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($user->id) ?></th>
                                    <td>
                                        <?php
                                            $width = 0;
                                            $height = 0;
                                            $extension = 0;

                                            $imagePath = 'img/no_thumb.png';
                                            if (!empty($user->image)) {
                                                
                                                $imagePath = 'uploads' . DS . 'users' . DS . $user->id . DS . $user->image;

                                                if (file_exists($imagePath)) {
                                                    list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                                                    $extension = pathinfo(WWW_ROOT . $imagePath, PATHINFO_EXTENSION);
                                                } else {

                                                    $user->image = NULL;
                                                }
                                            }
                                        ?>
                                        <a href="<?= $this->Url->build(['action' => 'edit', $user->id]) ?>"><img src="<?php echo $this->Url->build(DS . $imagePath) ?>" class="thumbnail _cover" data-skin="dark" data-toggle="kt-tooltip" title="" data-html="true" data-original-title="<?= "File Information <br>Width: " . $width . "px <br>Height: " . $height . "px <br>Extension: ". $extension ?>"></a>
                                    </td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->full_name) ?></td>
                                    <td><a href="<?= $this->Url->build(['plugin' => 'Acp', 'controller' => 'Roles', 'action' => 'edit', $user->role->id]) ?>"><button type="button" class="btn btn-bold btn-sm btn-font-sm btn-label-success" ><?= $user->role->title ?></button></td>
                                    <td> 
                                        <label class="jupdate_single_field green update-status" data-field="status">
                                            <?= $this->Element('Acp.Core' . DS . 'status', [
                                                'status' => [
                                                    'value' => $user->status,
                                                    'class' => [
                                                        'enable' => 'fa fa-check green',
                                                        'disable' => 'fa fa-ban red'
                                                    ]
                                                ]
                                            ]) ?>
                                        </label>
                                    </td>
                                    <td class="width-sort"><?php echo $this->Form->number('sort', ['div' => false, 'label' => false, 'class' => 'form-control input-small', 'value' => $user->sort,'style' => 'margin: auto !important;']); ?></td>
                                    <td><?= $this->Element('Acp.Core' . DS . 'action', ['id' => $user->id]) ?></td>
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

