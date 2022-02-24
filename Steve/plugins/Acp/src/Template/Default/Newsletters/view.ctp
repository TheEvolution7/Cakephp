<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-form kt-form--label-right">
                <div class="kt-portlet__body">
                    <div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label"><?= __d('acp','Name') ?>:</label>
                        <div class="col-9">
                            <span class="form-control-plaintext kt-font-bolder"><?= h($newsletter->name) ?></span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label"><?= __d('acp','Email') ?>:</label>
                        <div class="col-9">
                            <span class="form-control-plaintext kt-font-bolder"><?= h($newsletter->email) ?></span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label"><?= __d('acp','Phone') ?>:</label>
                        <div class="col-9">
                            <span class="form-control-plaintext kt-font-bolder"><?= h($newsletter->phone) ?></span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label"><?= __d('acp','Title') ?>:</label>
                        <div class="col-9">
                            <span class="form-control-plaintext kt-font-bolder"><?= h($newsletter->title) ?></span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label"><?= __d('acp','Content') ?>:</label>
                        <div class="col-9">
                            <span class="form-control-plaintext kt-font-bolder"><?= h($newsletter->content) ?></span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label"><?= __d('acp','Created') ?>:</label>
                        <div class="col-9">
                            <span class="form-control-plaintext kt-font-bolder"><?= h($newsletter->created) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

