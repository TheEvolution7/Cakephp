$(document).ready(function() {
    // Update status
    if ($('.update-status').length) {

        $('.update-status i').on('click', function() {
            

            // Form data
            var element = $(this);
            var dataElement = element.data();
                dataElement.id = element.parents('tr').data('id');

            form = $('.ajax-table')
            formData = new FormData(form[0]);

            $.each(dataElement, function(k,v) {
                formData.append(k,v);
            })

            // Call ajax
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-Token': $('.ajax-table [name="_csrfToken"]').val(),
                },
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        toastr({
                            heading: 'Notification',
                            text: data.message,
                            icon: 'success'
                        });
                        element
                            .data('class', element.attr('class'))
                            .data('value', data.value)
                            .attr('class', data.class);

                    } else {
                        toastr({
                            heading: 'Notification',
                            text: data.message,
                            icon: 'error'
                        })
                    }
                }
            });

        })
    }

    $('.select2').select2();
});


// end check
$(document).ready(function() {
    if ($(".multi-select2").length) {
        $(".multi-select2").select2();
      }
    // check all list
    $('table.table-striped th input[type="checkbox"]').on('click', function() {
        var check = $(this).is(":checked");
        $('table tbody tr').each(function(k, e) {
            $(e).find('td input[type="checkbox"]').prop('checked', check);
        })

        updateInputCheckbox();
    });


    // delete all list
    $('table.table-striped tr td input[type="checkbox"]').on('click', function() {
        updateInputCheckbox();
    })

    function updateInputCheckbox() {
        
        listId = [];
        $('.table.table-striped tr').each(function(k, e) {

            if ($(e).find('td input[type="checkbox"]').prop('checked')) {
                listId.push($(e).data('id'));
            }

            $('#deleteids').val(listId.toString());
        })
    }


    // sort all list
    $('form.sort-all').on('submit', function(e) {
        e.preventDefault();
        sortIds = [];

        $('table.table-striped tbody tr').each(function(k, e) {
            sortId = $(this).data('id');
            sortValue = $(this).find('.sort input').val();

            sortIds.push({id: sortId, value: sortValue});

        });

        $('#sortids').val(JSON.stringify(sortIds));

        $.post($('.sort-all').attr('action'), $('.sort-all').serialize(), function(data){
            location.reload();
        });


    })


    $('.flash-message').on('click', function() {
        $(this).fadeOut('slow');
    })


    // Ckeditor5 Editor
    // if ($('.editor').length) {
    //  $('.editor').each(function() {

    //      ClassicEditor
    //          .create(document.querySelector('.editor' ), {
    //              // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    //          })
    //          .then( editor => {
    //              window.editor = editor;
    //          })
    //          .catch( err => {
    //              console.error( err.stack );
    //          });
    //  });
    // }

    // Summernote Editor
    if ($('.summernote').length) {
        $('.summernote').each(function() {
            $elementSummernote = $(this);
            $elementSummernote.summernote({
                placeholder: "Please Enter Content...",
                height: 300,
                tabsize: 2,
                callbacks: {
                    onInit: function() {
                        $elementSummernote.summernote('code', $elementSummernote.val())
                    },
                    // onPaste: function(e) {
                    //   console.log('Called event paste');
                    // },
                    // onImageUpload: function(files) {
                    //   // upload image to server and create imgNode...
                    //   $summernote.summernote('insertNode', imgNode);
                    // },
                    onChange: function(contents, $editable) {
                        $elementSummernote.val(contents);
                      // console.log('onChange:', contents, $editable);
                    }
                }
            });
        })
    }


    // Upload image
    if ($('.dropify').length) {
        $('.dropify').dropify();
    }


    

    
});

function toastr(options) {
    $.toast({
        heading: options.heading,
        text: options.text,
        showHideTransition: 'slide',
        icon: options.icon,
        loaderBg: '#f2a654',
        position: 'top-right'
    });

}



$('.file-upload-browse').click(function(e){
    if($.trim($('#title').val()) == ''){
        $.toast({
            heading: "<?php echo __d('acp', 'Notifications'); ?>",
            text: 'Please enter title before',
            showHideTransition: 'slide',
            icon: 'warning',
            loaderBg: '#f2a654',
            position: 'top-right'
        });
    }
});

$('#fileImage').change(function(){
    $('.file-upload-browse').text('Uploading '+this.files.length +'....');
    $('input[type=submit]').addClass('disabled');
    $('.file-upload-browse').addClass('disabled');

    // console.log(this.files);
    // return;
    upload(this.files)
})

$(document).on("click",'.btn-choose-default', function(){
    $("figcaption").find("h4").empty();
    $(this).parent().parent().prepend('<h4 class="choose-default position-absolute w-100 h-100 fixed-top d-flex justify-content-center align-items-center"><button class="btn btn-primary">Default</button></h4>');
    var arr = $(this).attr('data-url').split('/');
    var i = arr.length;
    $('input[name=image]').val(arr[i-1]);
    $('input[name=image_fix]').val(arr[i-1]);
});

$(document).on("click",'.btn-edit', function(){
    var src = $(this).attr('data-url');
    var formData = new FormData();
    $.ajax({
        url: src,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            if (data.status == 1) {
                $('#id-image').val(data.data['id']);
                $('#title-image').val(data.data['title']);
                $('#description-image').val(data.data['description']);
            }
        }
    });
});

$(document).on("click",'#save-content-image', function(e){
    e.preventDefault();
    var src = $(this).attr('data-url');
    var formData = new FormData();
    formData.append('id',$('#id-image').val());
    formData.append('title',$('#title-image').val());
    formData.append('description',$('#description-image').val());

    $.ajax({
        url: src,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            if (data.status == 1) {
                $('#image-modal').modal('hide');
            }
        }
    });
});

$(document).on("click",'.btn-edit-amount', function(){
    $('#form-save-attribute-values-amount').empty();
    var src = $(this).attr('data-url');
    var product_id = $(this).attr('data-product');
    var formData = new FormData();
    formData.append('product_id',$(this).attr('data-product'));
    formData.append('list_attribute',$('.select-attribute-'+$(this).attr('data-attribute-id')).val());
    $.ajax({
        url: src,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            if (data.status == 1) {
                var html = '';
                $.each( data.data, function( key, value ) {
                    html +='<div class="form-group">\
                        <div class="input-group">\
                            <div class="input-group-prepend"><span class="input-group-text">'+ value.value_title +'</span></div>\
                            <input type="number" name="data['+ key +'][amount]" value="'+ value.amount +'" class="form-control" aria-describedby="basic-addon1">\
                            <input type="hidden" name="data['+ key +'][id]" value="'+ value.id +'">\
                            <input type="hidden" name="data['+ key +'][attribute_value_id]" value="'+ value.attribute_value_id +'">\
                            <input type="hidden" name="data['+ key +'][product_id]" value="'+ product_id +'">\
                        </div>\
                    </div>';
                });
                $('#form-save-attribute-values-amount').append(html);
            }
        }
    });
});

$(document).on("click",'#btn-save-attribute-values-amount', function(){

    form = $('#form-save-attribute-values-amount');
    formData = new FormData(form[0]);

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            if (data.status == 1) {
                $.toast({
                    heading: "Notifications",
                    text: data.message,
                    showHideTransition: 'slide',
                    icon: 'success',
                    loaderBg: '#f2a654',
                    position: 'top-right'
                });
            }
        }
    });
});


$(document).on("click",'.btn-remove', function(){
    
    var tmpVal = $('input[name=images]').val();
    var img_delete = $(this).attr('data-url').split('/');
    var i = img_delete.length;

    if(img_delete[i-1] != $('input[name=image_fix]').val()){ 
        $(this).parent().parent().parent().parent().remove();             
        tmpVal = tmpVal.replace(img_delete[i-1]+'|','');
        tmpVal = tmpVal.replace('||','|');
        $('input[name=images]').val(tmpVal);
        $('input[name=images_delete]').val($('input[name=images_delete]').val()+img_delete[i-1]+'|');

        var src = $(this).attr('data-url-remove');
        var formData = new FormData();
        formData.append('id',$(this).attr('id-image'));

        $.ajax({
            url: src,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (data) {
                
            }
        });
    }
    else{
        $.toast({
            heading: "<?php echo __d('acp', 'Notifications'); ?>",
            text: 'You can not remove this image! Please remove Featured image first',
            showHideTransition: 'slide',
            icon: 'warning',
            loaderBg: '#f2a654',
            position: 'top-right'
        });
    }
});

$(".btn-remove-all").click(function(){
    $('.portfolio-grid').empty();
    $('input[name=image]').val('');
    $('input[name=images]').val('');
    $('.btn-remove-all').attr('disabled','disabled');
});

$( "#FormAlbums" ).submit(function( event ) {
  $('#fileImage').remove();
});

var input = $('#fileImage');
var file_index = 0;
var files;

function upload(files){
    var src = input.attr('data-url');
    var frmData = new FormData();
    frmData.append('image_list', files[files.length - file_index - 1]);
    frmData.append('id', $('input[name=id_dir]').val());
    frmData.append('parent_id', $('input[name=id_album]').val());
    frmData.append('title', $('#title').val());
    var img = files[files.length - file_index - 1];


    var bar = $('#imgProgress .progress .progress-bar');
    $.ajax({
        type:'POST',
        url: src.toString(),
        data: frmData,
        contentType: false,
        processData: false,
        beforeSend: function(){

            var percentVal = '0%';
            if ((typeof img.type !== "undefined" ? img.type.match('image/*') : img.name.match('\\.(gif|png|jpeg|jpg)$')) && typeof FileReader !== "undefined") {
                $('#imgProgress').show();
            }
        },
        xhr: function() {  
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    bar.text(percentComplete + '%');
                    bar.css('width', percentComplete + '%');
                }

                if(percentComplete == 100){
                    bar.text('Success ' + (file_index+1) +'/' + files.length);   
                }
            }, false);
            return xhr;
        },
        
        success: function(result){
            $('#imgProgress').hide();
            bar.width('0%');
            $('.btn-remove-all').removeAttr('disabled');
            $("figcaption").find("h4").empty();
            var data = JSON.parse(result);
            var html = '<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 d-flex flex-row mb-3"> <figure class="effect-text-in effect-text-in position-relative w-100 align-self-stretch hover-figure"> <img class="w-100 h-100" style="object-fit: contain" src="'+data.files[0]['thumbnailUrl']+'"/> <figcaption> <h4 class="choose-default position-absolute w-100 h-100 fixed-top d-flex justify-content-center align-items-center"><button class="btn btn-primary">Default</button></h4><p class="mb-0 d-flex justify-content-between position-absolute fixed-bottom w-100 p-3 bg-primary hide-el"> <button type="button" class="btn btn-inverse-dark btn-choose-default"data-url="'+data.files[0]['thumbnailUrl']+'"><i class="fa fa-check"></i></button> <button type="button" class="btn btn-inverse-dark btn-remove" data-url="'+data.files[0]['thumbnailUrl']+'"><i class="fa fa-trash"></i></button> </p> </figcaption> </figure> </div>';
            $('.portfolio-grid').prepend(html);

            $('input[name=image]').val(data.files[0]['name']);
            $('input[name=image_fix]').val(data.files[0]['name']);

            $images = $('input[name=images]').val();
            $('input[name=images]').val($images += (data.files[0]['name']+'|'));
            file_index++;
            if (file_index >= files.length) {

                $('input[type=submit]').removeClass('disabled');
                $('.file-upload-browse').removeClass('disabled');
                $('.file-upload-browse').text('Select file');
                file_index = 0;
                return false;
            }else{
                upload(files);
            }
        }
    });
}
