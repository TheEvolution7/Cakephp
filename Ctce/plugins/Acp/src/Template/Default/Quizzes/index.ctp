<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <div class="row align-items-center mb-4">
            <div class="col-md-3 col-6 my-3">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?= $this->Url->build(['controller' => 'Courses', 'action' => 'index', $this->request->getQuery('course_id')]) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-info"><i class="fa fa-undo"></i><?= __d('acp','Back') ?></a>
                    </div>
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
                            'controller' => 'quizzes',
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
                                <th><?= __d('acp','Course')?></th>
                                <th><?= __d('acp','Content')?></th>
                                <th><?= __d('acp','Action')?></th>
                                <th>
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                        <input type="checkbox" id="checkall">&nbsp;<span></span>
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($quizzes as $quiz): ?>
                                <tr data-id="<?= $quiz->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($quiz->id) ?></th>
                                    <td>
                                        <?= $quiz->course->title ?>
                                    </td>
                                    <td>
                                        <?= $quiz->content ?>
                                    </td>
                                    <td>
                                        <!-- <?= $this->Html->link('<i class="fa fa-address-book"></i>'.__d('acp','Quiz Answers'), [
                                            'controller' => 'QuizAnswers',
                                            'action' => 'index',
                                            '?' => [
                                                'quiz_id' => $quiz->id
                                            ]
                                            ], ['class' => 'btn btn-sm btn-label-info btn-bold btn-remove mb-2', 'escape' => false]) ?> -->

                                        <?= $this->Html->link('<i class="fa fa-question"></i>'.__d('acp','Quiz Question') . ': '. count($quiz->quiz_questions), [
                                            'controller' => 'QuizQuestions',
                                            'action' => 'index',
                                            '?' => [
                                                'quiz_id' => $quiz->id
                                            ]
                                            ], ['class' => 'btn btn-sm btn-label-info btn-bold btn-remove mb-2', 'escape' => false]) ?>

                                        <?= $this->Element('Acp.Core' . DS . 'action', ['id' => $quiz->id]) ?></td>
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

