<?php
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
    $this->Paginator->options([
        'url' => [
            'keyword' => $keyword,
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
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <?php if (!empty($listData)): ?>
        <?php foreach ($listData as $key => $listdata): ?>
            <?php if (count($listdata) > 0): ?>
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <!--Begin::Dashboard 1-->
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 col-6 my-3">
                            <div class="table-toolbar">
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?= $key ?></h5>
                            </div>
                        </div>
                    </div>

                    <!--Begin::Row-->
                    <div class="row kt-portlet">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-left">ID</th>
                                            <!-- <th class="text-left"><?= __d('acp','Image')?></th> -->
                                            <th class="text-left"><?= __d('acp','Title')?></th>
                                            <th><?= __d('acp','Category')?></th>
                                            <th><?= __d('acp','Language')?></th>
                                            <th><?= __d('acp','Action')?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listdata->toArray() as $data): ?>
                                            <tr data-id="<?= $data->id?>" class="text-center">
                                                <th style="width:10%" class="text-left"><?= $this->Number->format($data->id) ?></th>
                                                <td style="width:60%">
                                                    <div class="text-left"><?= h($this->Text->truncate($data->title, 120, ['ellipsis' => ' ...', 'exact' => false ])) ?></div>
                                                        
                                                </td>
                                                <td style="width:20%">
                                                    <div>
                                                    <?php if (isset($data[strtolower(rtrim($key,"s")) . '_categories'])): ?>
                                                        <?php foreach ($data[strtolower(rtrim($key,"s")) . '_categories'] as $cat) {
                                                            if (isset($cat->id)) {

                                                                $str = 'parent_' . strtolower(rtrim($key,"s")) .'_category';
                                                                if (empty($cat->$str)) {
                                                                     echo $cat->title . '<br>';
                                                                }else{
                                                                     echo $cat->$str->title . ' -> ' . $cat->title . '<br>';
                                                                }
                                                            }
                                                            
                                                        }?>
                                                    <?php else: ?>
                                                        <?php  
                                                        if (isset($data[strtolower(rtrim($key,"s")) . '_category'])) {
                                                            $str = strtolower(rtrim($key,"s")) . '_category';
                                                            $str1 = 'parent_' . strtolower(rtrim($key,"s")) .'_category';
                                                            if (($data->$str)) {
                                                                 echo $data->$str->title . '<br>';
                                                            }else{
                                                                 echo $data->$str1->title . ' -> ' . $data->$str1->title . '<br>';
                                                            }
                                                        }?>
                                                    <?php endif ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php 
                                                        $languages = $this->getConfigure('Core.languages');
                                                    ?>
                                                    <div class="d-inline-block">
                                                        <?php foreach ($languages as $keyL => $language): ?>
                                                            <?php if ($language->id != $configs['language']): ?>
                                                                <a href="<?= $this->Url->build([
                                                                    'controller' => $key,
                                                                    'action' => 'edit',
                                                                    $data->id,
                                                                    '?' => ['language_id' => ($language->id != $configs['language']) ? $language->id : null]
                                                                    ])?>">
                                                                <button type="button" class="btn btn-bold btn-sm btn-font-sm btn-label-info mb-2"><?php echo $language->id ?></button></a>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </div>
                                                </td>
                                                <td  style="width:10%" class="text-right">
                                                    <div class="d-inline-block">
                                                        <?= $this->Html->link('<i class="fa fa-pen"></i>'.__d('acp','Edit'), ['controller' => $key, 'action' => 'edit', $data->id], ['class' => 'btn btn-sm btn-label-warning btn-bold mb-2', 'escape' => false]) ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <tr>
                                            <td colspan="11" class="pd-top">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-12">
                                                        <div class="dataTables_info" id="sample_1_info"><?= $this->Paginator->counter(['format' => __d('acp', 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => $key]) ?></div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-12">
                                                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded" id="kt_datatable_latest_orders">
                                                            <div class="kt-datatable__pager kt-datatable--paging-loaded">
                                                                <ul class="kt-datatable__pager-nav">
                                                                    <?= $this->Paginator->first('<i class="flaticon2-fast-back"></i>',  ['escape' => false ]) ?>
                                                                    <?= $this->Paginator->prev('<i class="flaticon2-back"></i>',  ['escape' => false ]) ?>
                                                                    <?= $this->Paginator->numbers(['model' => $key]) ?>
                                                                    <?= $this->Paginator->next('<i class="flaticon2-next"></i>',  ['escape' => false ]) ?>
                                                                    <?= $this->Paginator->last('<i class="flaticon2-fast-next"></i>',  ['escape' => false ]) ?>
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
                </div>
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>
</div>
