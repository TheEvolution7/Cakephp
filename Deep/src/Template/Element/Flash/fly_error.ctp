<?php
    if (!isset($params['escape']) || $params['escape'] !== false) {
        $message = h($message);
    }
?>
<script type="text/javascript">
    $(function() {

        $.toast({
            heading: '<?php echo __('Notifications'); ?>',
            text: '<?php echo $message ?>',
            showHideTransition: 'slide',
            icon: 'error',
            loaderBg: '#f2a654',
            position: 'top-right'
        });
    });
</script>