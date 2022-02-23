/*
 * jQuery File Upload Plugin JS Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $, window */

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileuploader').fileupload({

        url: $('#image_list').data('url'),
       
        headers: {
            'X-CSRF-Token': $('[name="_csrfToken"]').val()
        },

        formData: function (form) {
            // Good performance
            return $('input[name!=content][name!=description]', form).serializeArray();
        },
        autoUpload: true,


        // Callback for file deletion:
        destroy: function (e, data) {
            if (e.isDefaultPrevented()) {
                return false;
            }
            var that = $(this).data('blueimp-fileupload') ||
                    $(this).data('fileupload'),
                removeNode = function () {
                    that._transition(data.context).done(
                        function () {
                            $(this).remove();
                            that._trigger('destroyed', e, data);
                        }
                    );
                };
            if (data.url) {
                data.headers = {
                    'X-CSRF-Token': $('[name="_csrfToken"]').val()
                },
                data.dataType = data.dataType || that.options.dataType;
                $.ajax(data).done(removeNode).fail(function () {
                    that._trigger('destroyfailed', e, data);
                });
            } else {
                removeNode();
            }
        }
        
    });

    // Enable iframe cross-domain access via redirect option:
    // $('#fileupload').fileupload(
    //     'option',
    //     'redirect',
    //     window.location.href.replace(
    //         /\/[^\/]*$/,
    //         '/cors/result.html?%s'
    //     )
    // );

    // if (window.location.hostname === 'blueimp.github.io') {
    //     // Demo settings:
    //     $('#fileupload').fileupload('option', {
    //         url: '//jquery-file-upload.appspot.com/',
    //         // Enable image resizing, except for Android and Opera,
    //         // which actually support image resizing, but fail to
    //         // send Blob objects via XHR requests:
    //         disableImageResize: /Android(?!.*Chrome)|Opera/
    //             .test(window.navigator.userAgent),
    //         maxFileSize: 999000,
    //         acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
    //     });
    //     // Upload server status check for browsers with CORS support:
    //     if ($.support.cors) {
    //         $.ajax({
    //             url: '//jquery-file-upload.appspot.com/',
    //             type: 'HEAD'
    //         }).fail(function () {
    //             $('<div class="alert alert-danger"/>')
    //                 .text('Upload server currently unavailable - ' +
    //                         new Date())
    //                 .appendTo('#fileupload');
    //         });
    //     }
    // } else {
    //     // Load existing files:
    //     $('#fileupload').addClass('fileupload-processing');
    //     $.ajax({
    //         // Uncomment the following to send cross-domain cookies:
    //         //xhrFields: {withCredentials: true},
    //         url: $('#fileupload').fileupload('option', 'url'),
    //         dataType: 'json',
    //         context: $('#fileupload')[0]
    //     }).always(function () {
    //         $(this).removeClass('fileupload-processing');
    //     }).done(function (result) {
    //         $(this).fileupload('option', 'done')
    //             .call(this, $.Event('done'), {result: result});
    //     });
    // }

});
