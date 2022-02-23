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
                                <th><?php echo __d('acp', 'User Ip') ?></th>
                                <th><?= __d('acp','User Agent')?></th>
                                <th><?= __d('acp','Action')?></th>
                                <th><?= __d('acp','Created')?></th>
                                <th><?= __d('acp','Link')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <style type="text/css">
                                .active-bold td{
                                    font-weight: bold;
                                }
                            </style>
                            <?php foreach ($usersLogs as $userslog): ?>
                                <tr data-id="<?= $userslog->id?>" class="text-center <?= $userslog->has_read == 0 ? 'active-bold' : ''?>" <?= $userslog->id == $index? 'style="background-color:#fd397a"': '' ?>>
                                    <th scope="row"><?= $this->Number->format($userslog->id) ?></th>
                                    <td><?= h($userslog->user_ip) ?></td>
                                    <td><?= h($userslog->user_agent) ?></td>
                                    <td><?= h($userslog->action) ?></td>
                                    <td><?= $userslog->created ?></td>
                                    <td><?= $userslog->action != 'Users.login.successed' ? $this->Html->link(
                                        __d('acp', 'Link'), $userslog->content) : ''; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                            <td colspan="11" class="pd-top">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">                                        
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded" id="kt_datatable_latest_orders">
                                            <div class="kt-datatable__pager kt-datatable--paging-loaded">
                                                <ul class="kt-datatable__pager-nav">
                                                    <?php if ($this->Paginator->numbers()): ?>
                                                    <?php
                                                        $this->Paginator->templates([
                                                            'nextActive' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link--next" href="{{url}}">{{text}}</a></li>',
                                                            'nextDisabled' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link--next kt-datatable__pager-link--disabled>{{text}}</a></li>',
                                                            
                                                            'prevActive' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link--prev" href="{{url}}">{{text}}</a></li>',
                                                            'prevDisabled' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled">{{text}}</a></li>',
                                                            
                                                            'counterRange' => '{{start}} - {{end}} of {{count}}',
                                                            'counterPages' => '{{page}} of {{pages}}',
                                                            
                                                            'first' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link--first" href="{{url}}">{{text}}</a></li>',
                                                            'last' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link--last" href="{{url}}">{{text}}</a></li>',
                                                            
                                                            'number' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link-number" href="{{url}}">{{text}}</a></li>',
                                                            'current' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link-number kt-datatable__pager-link--active">{{text}}</a></li>',
                                                            
                                                            'ellipsis' => '<li><a href="" onclick="return false;">...</a></li>',

                                                            'sort' => '<a href="{{url}}">{{text}}</a>',
                                                            'sortAsc' => '<a class="asc" href="{{url}}">{{text}}</a>',
                                                            'sortDesc' => '<a class="desc" href="{{url}}">{{text}}</a>',
                                                            'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
                                                            'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',
                                                        ]);
                                                    ?>

                                                    <?= $this->Paginator->first('<i class="flaticon2-fast-back"></i>',  ['escape' => false ]) ?>
                                                    <?= $this->Paginator->prev('<i class="flaticon2-back"></i>',  ['escape' => false ]) ?>
                                                    <?= $this->Paginator->numbers() ?>
                                                    <?= $this->Paginator->next('<i class="flaticon2-next"></i>',  ['escape' => false ]) ?>
                                                    <?= $this->Paginator->last('<i class="flaticon2-fast-next"></i>',  ['escape' => false ]) ?>
                                                    
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
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