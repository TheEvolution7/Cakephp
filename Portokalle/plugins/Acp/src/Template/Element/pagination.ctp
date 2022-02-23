<?= $this->Form->create(null, ['type' => 'get']) ?>
<div class="kt-pagination kt-pagination--brand">
    <ul class="kt-pagination__links">
        <?php if ($this->Paginator->numbers()): ?>
        <?php
            $limit = isset($_GET['limit']) ? $_GET['limit'] : null;
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

            $this->Paginator->options([
                'url' => [
                    'limit' => $limit,
                    'keyword' => $keyword
                ]
            ]);
            $this->Paginator->templates([
                'nextActive' => '<li class="kt-pagination__link--prev"><a href="{{url}}"><i class="fa fa-angle-right kt-font-brand"></i></a></li>',
                'nextDisabled' => '<li class="kt-pagination__link--prev"><a href="{{url}}"><i class="fa fa-angle-right kt-font-brand"></i></a></li>',
                
                'prevActive' => '<li class="kt-pagination__link--next"><a href="{{url}}"><i class="fa fa-angle-left kt-font-brand"></i></a></li>',
                'prevDisabled' => '<li class="kt-pagination__link--next"><a href="{{url}}"><i class="fa fa-angle-left kt-font-brand"></i></a></li>',
                
                'first' => '<li class="kt-pagination__link--first"><a href="{{url}}"><i class="fa fa-angle-double-left kt-font-brand"></i></a></li>',
                'last' => '<li class="kt-pagination__link--last"><a href="{{url}}"><i class="fa fa-angle-double-right kt-font-brand"></i></a></li>',
                
                'number' => '<li><a class="kt-datatable__pager-link kt-datatable__pager-link-number" href="{{url}}">{{text}}</a></li>',
                'current' => '<li class="kt-pagination__link--active"><a>{{text}}</a></li>',
                'ellipsis' => '<li><a href="" onclick="return false;">...</a></li>'
            ]);
        ?>

        <?= $this->Paginator->first() ?>
        <?= $this->Paginator->prev() ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next() ?>
        <?= $this->Paginator->last() ?>
        
        <?php endif; ?>
    </ul>
    <div class="kt-pagination__toolbar">
        <?= $this->Form->select('limit', [10 => 10 , 20 => 20 , 30 => 30 , 50 => 50 , 100 => 100], [
            'value' => !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10,
            'onchange' => 'this.form.submit()',
            'class' => 'form-control kt-font-brand',
            'style' => 'width: 60px'
        ]) ?>
        <span class="pagination__desc">
            <?= $this->Paginator->counter(['format' => __d('acp', 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?>
        </span>
    </div>
</div>
<?= $this->Form->end() ?>