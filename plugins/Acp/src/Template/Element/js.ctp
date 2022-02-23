<?php if (in_array($this->request->getParam('action'), ['add', 'edit'])): ?>
<script src="<?= $this->Url->build('/ckfinder/ckfinder.js')?>"></script>
<script src="<?= $webroot ?>packages/ckeditor5/build/ckeditor.js"></script>
<script src="<?= $webroot ?>packages/ckeditor5/build/translations/<?=!empty($this->request->getParam('lang'))?$this->request->getParam('lang'):$this->getConfigure('Core')['setting']['language_id'] ?>.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.editor' ), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo',
                    'fontBackgroundColor',
                    'code',
                    'codeBlock',
                    'fontSize',
                    'fontFamily',
                    'highlight',
                    'horizontalLine',
                    'removeFormat',
                    'subscript',
                    'superscript',
                    'underline',
                    'CKFinder'
                ]
            },
            language: '<?=!empty($this->request->getParam('lang'))?$this->request->getParam('lang'):$this->getConfigure('Core')['setting']['language_id'] ?>',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            ckfinder: {
                // Upload the images to the server using the CKFinder QuickUpload command.
                uploadUrl: '<?= $this->Url->build('/',true) ?>'+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
            }
            
        } )
        .then( editor => {
            window.editor = editor;
    
            
            
            
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

<?php endif; ?>