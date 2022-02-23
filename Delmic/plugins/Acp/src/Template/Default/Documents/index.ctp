<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="template-demo">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']) ?>"><?php echo __d('acp', 'Home') ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(['plugin' => 'Acp', 'controller' => 'Documents', 'action' => 'index']) ?>"><?php echo __d('acp', 'Document') ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span><?php echo __d('acp', 'Manage') ?></span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo __d('acp', 'Document Manager') ?></h4>
            <p class="card-description"><?php echo __d('acp', 'All document') ?></p>
            <div class="row">
                <!-- form search -->
                    <form action="" style="display: flex; width: 100%;">

                        <div class="col-1">

                            <?= $this->Form->control('limit', [
                                'options'       => [100 => 'All', 5 => 5, 10 => 10],
                                'class'         => 'form-control',
                                'div'         => false,
                                'label'         => false,
                                'hiddenField'   => false,
                                'value' => !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10,
                                'onchange' => 'this.form.submit()'
                                ]);
                            ?>

                        </div>
                    
                        <div class="col-5"></div>
                        

                        <div class="col-3">
                            <?= $this->Form->control('document_category_id', [
                                'options'       => $documentCategories,
                                'class'         => 'form-control',
                                'div'         => false,
                                'label'         => false,
                                'hiddenField'   => false,
                                'empty'         => 'Select Category',
                                'value' => !empty($requestQuery['document_category_id']) ? $requestQuery['document_category_id'] : null,
                                'onchange' => 'this.form.submit()'
                                ]);
                            ?>
                        </div>
                        <div class="col-3">
                            <?= $this->Form->control('keyword', ['class' => 'form-control', 'div' => false, 'label' => false, 'placeholder' => 'Keyword', 'value' => !empty($requestQuery['keyword']) ? $requestQuery['keyword'] : null]); ?>
                        </div>
                    </form>
                <!-- end form search -->

                <div class="table-sorter-wrapper col-lg-12 table-responsive custom-table">
                    <?= $this->Form->create(null, [
                        'class' => 'ajax-table',
                        'url' => [
                            'plugin' => 'Acp',
                            'controller' => 'Documents',
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
                            <tr>
                                <th>#</th>
                                <th class="sortStyle"><?php echo __d('acp', 'Name') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?php echo __d('acp', 'Category') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?php echo __d('acp', 'Status') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?php echo __d('acp', 'Language') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?php echo __d('acp', 'Sort') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?php echo __d('acp', 'Action') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                        </label>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documents as $document): ?>
                            <tr data-id="<?= $document->id ?>">
                                <td><?= $this->Number->format($document->id) ?></td>
                                
                                <td class="title">
                                    <a href="<?= $this->Url->build(['action' => 'edit', $document->id], ['class' => 'btn btn-light', 'escape' => false]) ?>"><?= h($this->Text->truncate($document->title, 120, ['ellipsis' => ' ...', 'exact' => false ])) ?></a>
                                </td>

                                <td><?= $document->has('document_category') ? $this->Html->link($document->document_category->title, ['controller' => 'Documents', 'action' => 'index', 'document_category_id' => $document->document_category->id]) : '' ?></td>
                                <td>
                                    <?= $this->Element('Acp.Core' . DS . 'status', [
                                        'status' => [
                                            'value' => $document->status,
                                            'class' => [
                                                'enable' => 'ti-check green',
                                                'disable' => 'ti-check red'
                                            ]
                                        ]
                                    ]) ?>
                                </td>
                                <td>
                                   <?= $this->Element('Acp.Core' . DS . 'language', ['id' => $document->id, 'translations' => $document->_translations]) ?>
                                </td>
                                <td class="sort">
                                    <?php echo $this->Form->number('sort', ['div' => false, 'label' => false, 'class' => 'form-control', 'value' => $document->sort]); ?>
                                </td>
                                <td class="element-action">
                                    <?= $this->Element('Acp.Core' . DS . 'action', ['id' => $document->id]) ?>
                                </td>
                                
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?= $this->Element('Acp.Core' . DS . 'pagination', ['delete' => true, 'sort' => true]) ?>
    </div>
</div>