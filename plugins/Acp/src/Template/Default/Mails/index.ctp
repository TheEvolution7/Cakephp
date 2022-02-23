<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Dashboard 1-->
        <div class="row align-items-center mb-4">
            <div class="col-md-3 col-6 my-3">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-bold btn-sm btn-font-sm btn-label-success"><i class="fa fa-plus"></i><?= __d('acp','Add New') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 my-3 d-flex flex-wrap justify-content-end">
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded float-none m-0" id="kt_datatable_latest_orders my-0" >
                    <div class="kt-datatable__pager kt-datatable--paging-loaded">
                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail mr-1"><?= __d('acp','records') ?></span>
                            <div class="dropdown bootstrap-select w-auto kt-datatable__pager-size mr-0">
                                <form action="">
                                    <?= $this->Form->control('limit', [
                                        'options'       => [10 => 10 , 20 => 20 , 30 => 30 , 50 => 50 , 100 => 100],
                                        'class'         => 'selectpicker kt-datatable__pager-size mr-0',
                                        'div'         => false,
                                        'label'         => false,
                                        'hiddenField'   => false,
                                        'data-width' => '60px',
                                        'value' => !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10,
                                        'onchange' => 'this.form.submit()'
                                        ]);
                                    ?>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6 my-3">
                <form class="d-flex justify-content-end align-items-center d-table mx-auto w-auto" action="">
                    <label class="mr-1 mb-0"><?= __d('acp','Search') ?>:</label>
                    <label class="mr-1 mb-0">
                        <?= $this->Form->control('keyword', ['class' => 'form-control input-medium', 'div' => false, 'label' => false, 'placeholder' => 'Keyword', 'value' => !empty($requestQuery['keyword']) ? $requestQuery['keyword'] : null]); ?>
                    </label>
                    <label class="mr-1 mb-0">
                        <?= $this->Form->control('mail_category_id', [
                            'options'       => $mailCategories,
                            'class'         => 'form-control',
                            'id'            => 'kt_form_type',
                            'div'           => false,
                            'label'         => false,
                            'hiddenField'   => false,
                            'empty'         => 'Select Category',
                            'value' => !empty($requestQuery['mail_category_id']) ? $requestQuery['mail_category_id'] : null,
                            ]);
                        ?>
                    </label>
                    <label class=" mb-0 text-center" style="width: 45px">
                        <button title="Search" type="submit"  class="btn btn-bold btn-font-sm btn-label-success w-100 d-block"><i class="fa fa-search"></i></button>
                    </label>
                </form>  
            </div> -->
        </div>

        <!--Begin::Row-->
        <div class="row kt-portlet">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <?= $this->Form->create(null, [
                        'class' => 'ajax-table',
                        'url' => [
                            'plugin' => 'Acp',
                            'controller' => 'mails',
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
                            <tr class="text-center">
                                <th>ID</th>
                                <th><?= __d('acp','Title')?></th>
                                <th><?= __d('acp','Category')?></th>
                                <th><?= __d('acp','Process')?></th>
                                <th><?= __d('acp','Delay')?></th>
                                <th><?= __d('acp','Sent')?></th>
                                <th><i class="fa fa-check"></i></th>
                                <th><?= __d('acp','Action')?></th>
                                <th><?= __d('acp','Created')?></th>
                                <th>
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                        <input type="checkbox" id="checkall">&nbsp;<span></span>
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mails as $mail): ?>
                                <tr data-id="<?= $mail->id?>" class="text-center">
                                    <th scope="row"><?= $this->Number->format($mail->id) ?></th>
                                    <td><?= h($this->Text->truncate($mail->title, 120, ['ellipsis' => ' ...', 'exact' => false ])) ?></td>
                                    <td><a href="<?= $this->Url->build(['controller' => 'Mails', 'action' => 'index', 'mail_category_id' => $mail->mail_category->id]) ?>"><button type="button" class="btn btn-bold btn-sm btn-font-sm btn-label-success" ><?= $mail->mail_category->title ?></button></a></td>
                                    <td><?= @round(($mail->has_sent*100)/$mail->count_mail , 2);?>%</td>
                                    <td><?= $mail->delay ?>s</td>
                                    <td>
                                    <?php 
                                    if ($mail->count_mail - $mail->has_sent <= 0)
                                        $status = 'success';
                                    elseif($mail->count_mail - $mail->has_sent > 0)
                                        $status = 'danger';
                                    else
                                        $status = 'info';
                                    ?>

                                    <a href="javascript:;" class="btn btn-sm btn-label-<?= $status?> btn-bold mb-2"><i class="fa fa-envelope"></i><?= __d('acp','Send') ?></a>
                                    </td>
                                    <td> 
                                        <label class="jupdate_single_field update-status" data-field="status">
                                            <?= $this->Element('Acp.Core' . DS . 'status', [
                                                'status' => [
                                                    'value' => $mail->status,
                                                    'class' => [
                                                        'enable' => 'fa fa-check',
                                                        'disable' => 'fa fa-check gray'
                                                    ]
                                                ]
                                            ]) ?>
                                        </label>
                                    </td>
                                    <td><?= $this->Element('Acp.Core' . DS . 'action', ['id' => $mail->id]) ?><a href="" class="btn btn-sm btn-label-success btn-bold mb-2 btn_view_smtp" data-id="<?php echo $mail->id ?>" data-toggle="modal" data-target="#kt_modal_1"><i class="fa fa-cogs"></i><?= __d('acp','Smtp') ?></a></td>
                                    <td><?= $mail->created ?></td>
                                    <td>
                                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid no-mg">
                                            <input type="checkbox" class="cb-element">&nbsp;<span></span>
                                        </label>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <?= $this->Element('Acp.Core' . DS . 'pagination', ['delete' => true, 'sort' => true]) ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End::Row-->
        <!--End::Dashboard 1-->
        <div class="panel-footer" style="padding:0px 15px !important;">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="dataTables_info" id="sample_1_info"><?= $this->Paginator->counter(['format' => __d('acp', 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></div>
                </div>
                   
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>

<div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= __d('acp','Add New Smtp') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-horizontal" id="addSmtp" action="<?= $this->Url->build(['controller' => 'Mails', 'action' => 'smtp']) ?>">
                    <input type="hidden" name="id" id="idAddSmtp">
                    <?= $this->Form->control('email_user', ['class' => 'form-control', 'label' => ['text' => __d('acp','User'),'class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                    <?= $this->Form->control('email_password', ['class' => 'form-control', 'label' => ['text' => __d('acp','Password'),'class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                    <?= $this->Form->control('email_host', ['class' => 'form-control', 'label' => ['text' => __d('acp','Host'),'class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                    <?= $this->Form->control('email_port', ['class' => 'form-control', 'label' => ['text' => __d('acp','Port'),'class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
                    <?= $this->Form->control('email_smtpsecure', ['class' => 'form-control', 'label' => ['text' => __d('acp','Secure'),'class' => 'col-form-label col-md-3 col-sm-3 col-12']]); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><?= __d('acp','Add Smtp');?></button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    
    $('.btn_view_smtp').click(function(e){
        e.preventDefault();
        dataID = $(this).data('id');
        $.get('<?= $this->Url->build(['controller' => 'Mails', 'action' => 'smtp']) ?>'+'/'+$(this).data('id'), function(data){
            var result = JSON.parse(data);
            if(result.status == 1)
            {
                $('#kt_modal_1').modal('show');
                $('#idAddSmtp').val(dataID);
                $.each(result.data, function(index, value){
                    $("#addSmtp input[name='"+index+"']" ).val(value);
                });
            }else{
                toastr.error('Error', 'Error');
            }
        });
    });

    $('#addSmtp').submit(function(e){
        e.preventDefault();
        $.post('<?= $this->Url->build(['controller' => 'Mails', 'action' => 'smtp']) ?>', $('#addSmtp').serialize(), function(data){
            var result = JSON.parse(data);
            if(result.status == 1)
            {
                document.getElementById('addSmtp').reset();
                $('#kt_modal_1').modal('hide');
                if(result.data.email_user !== ''){
                    $('[data-id=' + result.data.id + ']').removeClass('default');
                    $('[data-id=' + result.data.id + ']').addClass('green');
                }else{
                    $('[data-id=' + result.data.id + ']').removeClass('green');
                    $('[data-id=' + result.data.id + ']').addClass('default');
                }
                $.toast({
                    heading: '<?= __d('acp', 'Notifications'); ?>',
                    text: result.message,
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                });
            }else{
                $.toast({
                    heading: '<?= __d('acp', 'Notifications'); ?>',
                    text: result.message,
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                });
                toastr.error(result.message, 'Error');
            }
            
        });
    });
</script>

