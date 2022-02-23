<!-- <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
 -->     
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
    echo $this->Form->create($record, ['url' => ['action' => 'jedit', $record->id, '_ext' => 'json'], 'class' => 'dropzone', 'id' => 'dropzoneFrom' . $record->id]);
    echo $this->Form->end();
?>

<script>
    Dropzone.options.dropzoneFrom<?= $record->id ?> = {
        autoProcessQueue: false,
        paramName: 'file',
        maxFilesize: 2, // MB
        dictDefaultMessage: 'Drag an image here to upload, or click to select one',
        acceptedFiles: 'image/*',
        init: function() {
            var submitButton = document.querySelector('.submit-all');
            myDropzone = this;
            submitButton.addEventListener("click", function(){
            myDropzone.processQueue();
            });
            this.on('complete', function(){
                if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                {
                 var _this = this;
                 _this.removeAllFiles();
                }

                list_image();
            });
        }
    };
</script>