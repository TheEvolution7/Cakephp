<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="template-demo">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-custom">
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['plugin' => 'Acp', 'controller' => 'Pages', 'action' => 'dashboard']) ?>"><?= __d('acp', 'Home') ?></a></li>
                        <li class="breadcrumb-item"><a href="<?= $this->Url->build(['plugin' => 'Acp', 'controller' => 'DocumentCategories', 'action' => 'index']) ?>"><?= __d('acp', 'Category Document') ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span><?= __d('acp', 'Manage') ?></span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= __d('acp', 'Category Document Manager') ?></h4>
            <p class="card-description"><?= __d('acp', 'All category document') ?></p>
            <div class="row">
                <!-- form search -->
                <!-- <div class=""> -->
                    <div class="col-1">
                        <form action="">
                            <select class="form-control" name="limit" onchange="this.form.submit()">
                                <option>5</option>
                                <option>10</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-8"></div>
                    <div class="col-sm-3">
                        <form action="">
                            <input type="text" class="form-control" name="keyword" placeholder="Keyword" />
                        </form>
                    </div>
                <!-- </div> -->
                <!-- end form search -->

                <div class="table-sorter-wrapper col-lg-12 table-responsive custom-table">
                    <?= $this->Form->create(null, [
                        'class' => 'ajax-table',
                        'url' => [
                            'plugin' => 'Acp',
                            'controller' => 'DocumentCategories',
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
                                <th class="sortStyle"><?= __d('acp', 'Image') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?= __d('acp', 'Parent') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?= __d('acp', 'Name') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?= __d('acp', 'Status') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?= __d('acp', 'Language') ?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle"><?= __d('acp', 'Action') ?><i class="ti-angle-down"></i></th>
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
                            <?php foreach ($documentCategories as $documentCategory): ?>
                            <tr data-id="<?= $documentCategory->id ?>">
                                <td><?= $this->Number->format($documentCategory->id) ?></td>
                                <td>
                                   <?php
                                        if (!empty($documentCategory->image)) {
                                            
                                            $imagePath = 'uploads' . DS . 'document_categories' . DS . $documentCategory->uuid . DS . 'image' . DS . '500-' . $documentCategory->image;
                                        } else {
                                            
                                            $imagePath = 'img/no_thumb.png';
                                        }
                                    ?>
                                    <a href="<?= $this->Url->build(['action' => 'edit', $documentCategory->id], ['class' => 'btn btn-light', 'escape' => false]) ?>"><img src="<?php echo $this->Url->build(DS . $imagePath) ?>" class="rounded"></a>
                                </td>
                                <td><?= $documentCategory->has('parent_document_category') ? $this->Html->link($documentCategory->parent_document_category->title, ['controller' => 'DocumentCategories', 'action' => 'index', 'parent_document_category' => $documentCategory->parent_document_category->id]) : '' ?></td>
                                <td><?= h($documentCategory->title) ?></td>
                                <td>
                                    <?= $this->Element('Acp.Core' . DS . 'status', [
                                        'status' => [
                                            'value' => $documentCategory->status,
                                            'class' => [
                                                'enable' => 'ti-check green',
                                                'disable' => 'ti-check red'
                                            ]
                                        ]
                                    ]) ?>
                                </td>
                                <td>
                                   <?= $this->Element('Acp.Core' . DS . 'language', ['id' => $documentCategory->id, 'translations' => $documentCategory->_translations]) ?>
                                </td>
                                <td class="element-action">
                                    <?= $this->Element('Acp.Core' . DS . 'action', ['id' => $documentCategory->id]) ?>
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
        <?= $this->Element('Acp.Core' . DS . 'pagination', ['delete' => true]) ?>
    </div>
</div>