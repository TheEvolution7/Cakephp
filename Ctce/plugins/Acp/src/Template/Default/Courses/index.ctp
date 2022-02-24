<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <div class="row align-items-center mb-4">
            <div class="col-md-3 col-6 my-3">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?= $this->Url->build(['action' => 'add', '?' => $this->request->getQuery()]) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-plus"></i><?= __d('acp','Add New') ?></a>
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
                            'controller' => 'courses',
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
                                <th><?= __d('acp','Type')?></th>
                                <th><i class="fa fa-check"></i></th>
                                <th><?= __d('acp','Sort')?></th>
                                <th><?= __d('acp','Action')?></th>
                                <th>
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                        <input type="checkbox" id="checkall">&nbsp;<span></span>
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course): ?>
                                <tr data-id="<?= $course->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($course->id) ?></th>
                                    <td>
                                        <div><?= h($this->Text->truncate($course->title, 120, ['ellipsis' => ' ...', 'exact' => false ])) ?></div>
                                            
                                    </td>
                                    <td>
                                        <?= ucfirst($course->type) ?>
                                    </td>
                                    
                                    <td> 
                                        <label class="jupdate_single_field update-status" data-field="status">
                                            <?= $this->Element('Acp.Core' . DS . 'status', [
                                                'status' => [
                                                    'value' => $course->status,
                                                    'class' => [
                                                        'enable' => 'fa fa-check',
                                                        'disable' => 'fa fa-check gray'
                                                    ]
                                                ]
                                            ]) ?>
                                        </label>
                                    </td>
                                    <td class="width-sort sort"><?php echo $this->Form->number('sort', ['div' => false, 'label' => false, 'class' => 'form-control input-small', 'value' => $course->sort,'style' => 'margin: auto !important;']); ?></td>
                                    <td>
                                        <?php if ($course->type == 'quiz'): ?>
                                            <?= $this->Html->link('<i class="fa fa-book"></i>'.__d('acp','Quizzes'), [
                                            'controller' => 'Quizzes',
                                            'action' => 'index',
                                            '?' => [
                                                'course_id' => $course->id
                                            ]
                                            ], ['class' => 'btn btn-sm btn-label-info btn-bold btn-remove mb-2', 'escape' => false]) ?>
                                        <?php endif ?>

                                        <?php if ($course->type == 'lesson'): ?>
                                            <?= $this->Html->link('<i class="fa fa-book"></i>'.__d('acp','Lessons'), [
                                            'controller' => 'Lessons',
                                            'action' => 'index',
                                            '?' => [
                                                'course_id' => $course->id
                                            ]
                                            ], ['class' => 'btn btn-sm btn-label-success btn-bold btn-remove mb-2', 'escape' => false]) ?>
                                        <?php endif ?>

                                        <?= $this->Element('Acp.Core' . DS . 'action', ['id' => $course->id]) ?></td>
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

