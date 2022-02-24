<?php
    if (!isset($params['escape']) || $params['escape'] !== false) {
        $message = h($message);
    }
?>
<script type="text/javascript">
    $(function() {
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "3000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr["warning"]("<?php echo $message ?>", "<?php echo __('Notifications'); ?>");
    });
</script>