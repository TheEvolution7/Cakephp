<? 

    $this->Breadcrumbs->add([
        ['title' => __d('acp', 'Dashboard'), 'url' => ['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']],
        ['title' => $this->request->getParam('controller'), 'url' => ['controller' => $this->request->getParam('controller'), 'action' => 'index']],
        ['title' => ucfirst($this->request->getParam('action')), 'url' => false]
    ]);

    $this->Breadcrumbs->templates([
        'wrapper' => '<div class="kt-subheader__breadcrumbs">{{content}}</div>',
        'item' => '{{separator}}<a class="kt-subheader__breadcrumbs-link" href="{{url}}"{{innerAttrs}}>{{title}}</a>',
        'itemWithoutLink' => '<span class="kt-subheader__breadcrumbs-separator" {{innerAttrs}}></span><span{{innerAttrs}} class="kt-subheader__desc">{{title}}</span>{{separator}}',
        'separator' => '<span class="kt-subheader__breadcrumbs-separator" {{innerAttrs}}>{{separator}}</span>'
    ]);

?>
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title"><?= $this->request->getParam('controller').' '.ucfirst($this->request->getParam('action')) ?> </h3></h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <?= $this->Breadcrumbs->render(
                [],
                ['separator']
            ); ?>
        </div>
        
    </div>
</div>