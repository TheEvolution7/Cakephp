<style>
    body
{
   font-family: Arial;
   text:#212121;
}
#gallery{
    width:1057px;
    margin: 0 auto;
}
#image-list { 
    list-style-type: none; 
    margin: 0; 
    padding: 0; 
}
#image-list li { 
    margin: 10px 20px 10px 0px; 
    display: inline-block;
}
#image-list li img{
    width: 250px;
    height: 155px;
}

#image-container{
    margin-bottom: 14px;
}

#txtresponse 
{
    padding: 10px 20px;
    border-radius: 3px;
    margin-bottom: 10px;
    width: 100%;
    display: none;
    border :#E0E0E0 1px solid;
    color:#212121;
   
}
 
.btn-submit {
    padding: 10px 30px;
    background: #333;
    border: #E0E0E0 1px solid;
    color: #FFF;
    font-size: 0.9em;
    width: 100px;
       
    border-radius: 0px;
    cursor:pointer;
    position: absolute;
}
</style>


<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Dashboard 1-->
    <!--Begin::Row-->
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__body">
            <ul id="image-list" >
                <?php $images = explode('|', $product->images);unset($images[count($images) - 1]);?>
                <?php foreach ($images as $key => $image) {
                    $width = 0;
                    $height = 0;
                    $extension = 0;
                    $imagePath = 'img/no_thumb.png';
                    if (!empty($image)) {
                        
                        $imagePath = 'uploads' . DS . 'products' . DS . $product->id . DS . $image;

                        if (file_exists($imagePath)) {
                            list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                            $extension = pathinfo(WWW_ROOT . $imagePath, PATHINFO_EXTENSION);
                        } else {

                            $image = NULL;
                        }
                        if ($width > 500) {
                            $imagePath = 'uploads' . DS . 'products' . DS . $product->id . DS . 'thumbnail' . DS . $image;
                        }
                    }
                    $info = $this->Cms->getInfoImage('uploads' . DS . 'products' . DS . $product->id, $image);
                    echo '<li id="image_' . $key . '" >
                        <img src="' . $this->Cms->processImagePath('uploads' . DS . 'products' . DS . $product->id, $image) . '" alt="' . $image . '" data-skin="dark" data-toggle="kt-tooltip" title="" data-html="true" data-original-title="'. "File Information <br>Width: " . $info['width'] . "px <br>Height: " . $info['height'] . "px <br>Extension: ". $info['extension'] .'"></li>';
                } ?>
            </ul>
            <div class="form-group row">
                <label class="col-form-label col-md-5 col-sm-3 col-12"></label>
                <div class="col-md-7 col-sm-9 col-12">
                    <div class="kt-portlet__foot ta-foot">
                        <div class="kt-form__actions">
                            <button type="button" onclick="location.href='<?= $this->Url->build(['controller' => 'Products', 'action' => 'edit', $product->id]) ?>';" class="btn btn-success btn-icon-text"><?php echo __d('acp', 'Back to this product') ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->start('scriptJs') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <link href="<?= $webrootAcp ?>vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <script src="<?= $webrootAcp ?>vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
    <script>
        
        $(document).ready(function () {
            var dropIndex;
            
            $("#image-list").sortable({
                    update: function(event, ui) {
                        dropIndex = ui.item.index();

                        var imageIdsArray = [];

                $('#image-list li').each(function (index) {
                    if(index <= dropIndex) {
                        var id = $(this).attr('id');
                        var split_id = id.split("_");
                        imageIdsArray.push(split_id[1]);
                    }
                });

                
                if (imageIdsArray.length != 1) {
                    $.ajax({
                        url: '<?= $this->Url->build(['controller' => 'Products', 'action' => 'reorderImage', $product->id]) ?>',
                        type: 'post',
                        data: {imageIds: imageIdsArray},
                        success: function (response) {
                           toastr.success("Sort success","<?php echo __d('acp', 'Notifications'); ?>");
                        }
                    });
                }else{
                    toastr.error("Sort error","<?php echo __d('acp', 'Notifications'); ?>");
                }
                e.preventDefault();
                }
            });
        });

    </script>
<?php $this->end() ?>