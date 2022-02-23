var KTTagify = {
    init: function() {
        var e, a;
        ! function() {
            var e = document.getElementById("kt_tagify_1"),
            a = new Tagify(e, {});
        }(),
        function() {
            var e = document.getElementById("kt_tagify_2"),
                a = new Tagify(e, {});
        }(),
        function() {
            var e = document.getElementById("kt_tagify_3"),
                a = new Tagify(e, {});
        }();
    }
};
jQuery(document).ready(function() { KTTagify.init() });

$('#checkall').change(function () {
    $('.cb-element').prop('checked',this.checked);
});

$('.cb-element').change(function () {
 if ($('.cb-element:checked').length == $('.cb-element').length){
  $('#checkall').prop('checked',true);
 }
 else {
  $('#checkall').prop('checked',false);
 }
});

