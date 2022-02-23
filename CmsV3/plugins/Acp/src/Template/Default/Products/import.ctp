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
                            <i class="flaticon2-heart-rate-monitor" aria-hidden="true"></i>General
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
            <?= $this->Form->create(null, [
                'type' => 'file',
                'id'   => 'myform', 
                'templates' => [
                    'input' => '<div class="col-sm-9"><input type="{{type}}" name="{{name}}" {{attrs}}/></div>',
                    'inputContainer'  => '<div class="form-group row">{{content}}</div>',
                    'inputContainerError' => '<div class="form-group row">{{content}}{{error}}</div>',
                    'select' => '<div class="col-md-9"><select name="{{name}}" {{attrs}}>{{content}}</select></div>',
                    'error' => '<div class="col-md-3"></div><div class="col-md-9"><span class="help-block">{{content}}</span></div>',
                    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary mr-2" {{attrs}}/>',
                    'submitContainer' => '{{content}}',
                ]])
            ?>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-5">
                                <?= $this->Form->control('type', [
                                    'options'       => ['Add New Data', 'Reset Data'],
                                    'class'         => 'form-control kt-select2',
                                    'label'         => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'],
                                    'hiddenField'   => false,
                                    'empty'         => 'Choose type',
                                    'required'      => true
                                ]); ?>
                                <?= $this->Form->control('file', [
                                    'type'      => 'file',
                                    'accept'    => '.xlsx',
                                    'class'     => 'custom-file-input',
                                    'id'        => 'file',
                                    'label'     => ['class' => 'col-form-label col-md-3 col-sm-3 col-12'], 
                                    'templates' => [
                                        'file'  => '<div class="col-md-9 col-sm-9 col-12 ">
                                                <div class="custom-file">
                                                <input type="file" name="{{name}}" {{attrs}}/>
                                                <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>'
                                    ],
                                    'required'      => true
                                ]);
                                ?>
                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".progress-bar").width('0%');
        $(".progress-bar").html('0%');
        
        $("#myform").submit(function(e){
            e.preventDefault();
            $('input[type="submit"]').attr("disabled", true);
            var fd = new FormData();
            var files = $('#file')[0].files;

            if(files.length > 0 ){
               fd.append('file',files[0]);

               $.ajax({
                  url: '<?= $this->Url->build(['controller' => 'Products', 'action' => 'getInfo']) ?>',
                  type: 'post',
                  data: fd,
                  contentType: false,
                  processData: false,
                  success: function(response){
                    var obj = JSON.parse(response);
                     if(obj.status == 1){
                        $(".progress-bar").width('0%');
                        $(".progress-bar").html('0%');
                        callAjax(1, obj.data);
                     }else{
                        alert('file not uploaded');
                     }
                  },
               });
            }else{
               alert("Please select a file.");
            }
        });

        function callAjax(index, count){
            var mfd = new FormData();
            var files = $('#file')[0].files;
            mfd.append('file',files[0]);
            mfd.append('index',index);
            $.ajax({
              url: '<?= $this->Url->build(['controller' => 'Products', 'action' => 'import']) ?>',
              type: 'post',
              data: mfd,
              contentType: false,
              processData: false,
              success: function(response){
                var obj = JSON.parse(response);
                if(obj.status == 1){
                    var percentComplete = ((obj.data / count) * 100);
                    $(".progress-bar").width(percentComplete + '%');
                    $(".progress-bar").html(percentComplete+'%');
                    if (obj.data + 1 <= count) {
                        callAjax(obj.data + 1, count);
                    }
                    $('input[type="submit"]').removeAttr("disabled");
                    $('#myform')[0].reset();
                    $('#file').value  = "";
                }
              },
           });
        }
    });
</script>