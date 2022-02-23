<style>
    .hover-figure .hide-el{
        opacity: 0;
        transition: all .3s ease-in-out;
    }
    .hover-figure:hover .hide-el{
        opacity: 1;
    }
</style>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Dashboard 1-->
    <!--Begin::Row-->
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab_1" role="tab">
                            <i class="flaticon2-heart-rate-monitor" aria-hidden="true"></i><?= __d('acp','General') ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
             <?= $this->Form->create(null, [
                'type' => 'file',
                'templates' => [
                    'inputContainer'  => '<div class="form-group row">{{content}}</div>',
                    'inputContainerError' => '<div class="form-group row">{{content}}{{error}}</div>',
                    'error' => '<div class="col-md-3"></div><div class="col-md-9"><span class="help-block">{{content}}</span></div>',
                    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary mr-2" {{attrs}}/>',
                    'submitContainer' => '{{content}}',
                ]])
            ?>
            <?php $this->Form->lockField('files'); ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1" role="tabpanel">
                        <div class="form-group row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="kt-dropzone dropzone m-dropzone--success" action="<?= $this->Url->build(['controller' => 'Mails','action' => 'import', '_ext' => 'json',$this->getRequest()->params['pass'][0]]) ?>" id="m-dropzone-three">
									<div class="kt-dropzone__msg dz-message needsclick">
										<h3 class="kt-dropzone__msg-title"><?= __d('acp','Drop files here or click to upload.') ?></h3>
										<span class="kt-dropzone__msg-desc"><?= __d('acp','Only image, pdf and psd files are allowed for upload') ?></span>
									</div>
								</div>
							</div>
                            <div class="col-12">
                                <div class="kt-portlet__foot ta-foot">
                                    <div class="kt-form__actions text-center">
                                        <?= $this->Form->submit(__d('acp', 'Submit')) ?>
                                        <button type="reset" class="btn btn-secondary"><?= __d('acp', 'Cancel') ?></button>
                                    </div>
                                </div>
                            </div>
						</div>
                    </div>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <!--End::Row-->
    <!--End::Dashboard 1-->
</div>

<script>

    Dropzone.options.mDropzoneThree = {
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 1,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        acceptedFiles: ".xlsx",
        success: function(file, response){
            if (response.data.result == null) {
                $.toast({
                    heading: '<?= __d('acp', 'Notifications'); ?>',
                    text: response.data.success + ' success ' + response.data.error + ' error',
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                });
            }
        }
    };
</script>