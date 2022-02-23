<tr>
    <td colspan="11" class="pd-top">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <label>With selected: </label>
                <?php if (isset($sort) && $sort): ?>
                    <?= $this->Form->create(null, [
                        'class' => 'sort-all d-inline',
                        'url' => [
                            'action' => 'sortAll'
                        ]
                    ]) ?>
                    <?php $this->Form->unlockField('sortIds'); ?>
                    <?= $this->Form->input('sortIds', ['type' => 'hidden']); ?>
                    <?= $this->Form->button(__d('acp', 'Re-Order'), ['type' => 'submit', 'class' => 'btn btn-sm btn-font-sm btn-label-brand btn-bold', 'escape' => false]) ?>
                    <?= $this->Form->end() ?>
                <?php endif; ?>

                <?php if (isset($delete) && $delete): ?>
                    
                    <?= $this->Form->create(null, [
                        'class' => 'delete-all d-inline ml-1',
                        'url' => [
                            'action' => 'deleteAll'
                        ]
                    ]) ?>
                    <?php $this->Form->unlockField('deleteIds'); ?>
                    <?= $this->Form->input('deleteIds', ['type' => 'hidden']); ?>
                    <?= $this->Form->button('<i class="fa fa-trash-alt"></i> ' .__d('acp', 'Delete'), ['type' => 'submit', 'class' => 'btn btn-sm btn-label-danger btn-bold', 'escape' => false]) ?>
                    <?= $this->Form->end() ?>
                <?php endif; ?>

                <?php if (isset($exportExcel) && $exportExcel): ?>
                    <a href="<?php echo $this->Url->build(['plugin' => 'acp', 'controller' => $requestParams['controller'], 'action' => 'exportExcel']); ?>" class="btn btn-sm btn-label-info btn-bold"><?= __d('acp', 'Export Excel') ?></a>
                <?php endif; ?>                                        
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded" id="kt_datatable_latest_orders">
                    <div class="kt-datatable__pager kt-datatable--paging-loaded">
                        <ul class="kt-datatable__pager-nav">
                            <?php if ($this->Paginator->numbers()): ?>
                            <?php
                                $limit = isset($_GET['limit']) ? $_GET['limit'] : null;
                                $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
                                $banner_category_id = isset($_GET['banner_category_id']) ? $_GET['banner_category_id'] : null;

                                $this->Paginator->options([
                                    'url' => [
                                        'limit' => $limit,
                                        'keyword' => $keyword,
                                        'banner_category_id' => $banner_category_id
                                    ]
                                ]);
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



