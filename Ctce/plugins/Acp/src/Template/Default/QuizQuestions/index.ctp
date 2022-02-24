<?php
    use Cake\Collection\Collection; 
?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <div class="row align-items-center mb-4">
            <div class="col-md-3 col-6 my-3">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?= $this->Url->build(['controller' => 'Quizzes', 'action' => 'index', $this->request->getQuery('quiz_id')]) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-info"><i class="fa fa-undo"></i><?= __d('acp','Back') ?></a>
                    </div>
                    <div class="btn-group">
                        <a href="<?= $this->Url->build(['action' => 'add', '?' => $this->request->getQuery()]) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-plus"></i><?= __d('acp','Add New') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-6 my-3"></div>
            <div class="col-md-4 col-6 my-3">
                <div class="table-toolbar">
                    <?php $collection = new Collection($quizQuestions); ?>
                    <div class="btn-group">
                        <a class="btn btn-bold btn-sm btn-font-sm btn-label-warning">Total marks: <?= $collection->sumOf('marks'); ?>/10</a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-bold btn-sm btn-font-sm btn-label-warning">Total grade: <?= $collection->sumOf('grade'); ?>/100</a>
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
                            'controller' => 'quizQuestions',
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
                                <th><?= __d('acp','Content')?></th>
                                <th><i class="fa fa-check"></i></th>
                                <th><?= __d('acp','Action')?></th>
                                <th>
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                        <input type="checkbox" id="checkall">&nbsp;<span></span>
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($quizQuestions as $quizQuestion): ?>
                                <tr data-id="<?= $quizQuestion->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($quizQuestion->id) ?></th>
                                    <td>
                                        <?= h($this->Text->truncate($quizQuestion->content, 50, ['ellipsis' => ' ...', 'exact' => false ])) ?>
                                    </td>
                                    <td> 
                                        <label class="jupdate_single_field update-status" data-field="status">
                                            <?= $this->Element('Acp.Core' . DS . 'status', [
                                                'status' => [
                                                    'value' => $quizQuestion->status,
                                                    'class' => [
                                                        'enable' => 'fa fa-check',
                                                        'disable' => 'fa fa-check gray'
                                                    ]
                                                ]
                                            ]) ?>
                                        </label>
                                    </td>
                                    <td>
                                        <?= $this->Html->link('<i class="fa fa-address-book"></i>'.__d('acp','Quiz Answers') . ': ' .count($quizQuestion->quiz_answers), [
                                            'controller' => 'QuizAnswers',
                                            'action' => 'index',
                                            '?' => [
                                                'quiz_question_id' => $quizQuestion->id
                                            ]
                                            ], ['class' => 'btn btn-sm btn-label-info btn-bold btn-remove mb-2', 'escape' => false]) ?>
                                        <?= $this->Element('Acp.Core' . DS . 'action', ['id' => $quizQuestion->id]) ?></td>
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

