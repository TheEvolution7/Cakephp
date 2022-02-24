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
             <?= $this->Form->create($lesson, [
                'type' => 'file',
                'templates' => [
                    'input' => '<div class="col-sm-9"><input type="{{type}}" name="{{name}}" {{attrs}}/></div>',
                    
                    'textarea' => '<div class="col-md-9"><textarea type="{{type}}" name="{{name}}" {{attrs}}>{{value}}</textarea></div>',

                    'select' => '<div class="col-md-9"><select name="{{name}}" {{attrs}}>{{content}}</select></div>',

                    'nestingLabel' => '<label{{attrs}}>{{hidden}}{{input}}{{text}}<span></span></label>',

                    'selectMultiple' => '<div class="col-md-9"><select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select></div>',

                    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
                    'inputContainer'  => '<div class="form-group row">{{content}}</div>',
                    'inputContainerError' => '<div class="form-group row">{{content}}{{error}}</div>',
                    'error' => '<div class="col-md-3"></div><div class="col-md-9"><span class="help-block">{{content}}</span></div>',



                    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary mr-2" {{attrs}}/>',
                    'submitContainer' => '{{content}}',
                ]])
            ?>
                <div class="tab-content">
                
                    <div class="tab-pane active" id="tab_1" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-9">
                                <?php $this->Form->unlockField('files'); ?>
                                
                                <?= $this->Form->control('type', [
                                    'options'       => ['video' => 'Video', 'content' => 'Content'],
                                    'class'         => 'form-control kt-select2 select2',
                                    'label'         => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'],
                                    'hiddenField'   => false,
                                    'empty'         => 'Select Category',
                                    'id' => 'choose-type'
                                ]); ?>

                                <?= $this->Form->control('course_id', [
                                    'options'       => $courses,
                                    'class'         => 'form-control kt-select2 select2',
                                    'label'         => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'],
                                    'hiddenField'   => false,
                                    'empty'         => 'Select Category'
                                ]); ?>
                                
                                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>

                                <div id="type-video" <?= $lesson->type != 'video' ? 'style="display: none;"' : null ?>>
                                    <?= $this->Form->control('video_transcript', ['class' => 'form-control editor', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                    <?= $this->Form->control('transcript_timer', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                    <?= $this->Form->control('video', ['class' => 'form-control', 'label' => ['text' => 'Id Video Youtube', 'class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                </div>

                                <div id="type-content" <?= $lesson->type != 'content' ? 'style="display: none;"' : null ?>>
                                    <?= $this->Form->control('content', ['class' => 'form-control editor1', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                    <?= $this->Form->control('time', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                </div>
                                
                                
                                <?= $this->Form->control('percent', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <?= $this->Form->control('sort', ['class' => 'form-control', 'label' => ['class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 col-12"><?= __d('acp','Status') ?></label>
                                    <div class="col-md-9 col-sm-9 col-12">
                                        <div class="kt-checkbox-inline">
                                            <?= $this->Form->control('status', [
                                                'type' => 'checkbox', 
                                                'label' => ['class' => 'kt-checkbox ta-checkbox'], 
                                                'div' => false,
                                                'templates' => [
                                                    'inputContainer'  => '{{content}}',
                                                ]
                                            ]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                
                            </div>        
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 col-12"></label>
                    <div class="col-md-7 col-sm-9 col-12">
                        <div class="kt-portlet__foot ta-foot">
                            <div class="kt-form__actions">
                                <?= $this->Form->submit(__d('acp', 'Submit')) ?>
                                <button type="reset" class="btn btn-secondary"><?php echo __d('acp', 'Cancel') ?></button>
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
$(document).ready(function(){
    $('#choose-type').on('change', function() {
        switch(this.value) {
            case 'content':
                $('#type-content').show();
                $('#type-video').hide();
            break;
            case 'video':
                $('#type-content').hide();
                $('#type-video').show();
            break;
            default:
            $('#type-content').hide();
            $('#type-video').hide();
        }
    });
});
</script>
