$(document).on("change",'.check-slug', function(e){
    e.preventDefault();
    var src = $(this).attr('data-url');
    var formData = new FormData();
    formData.append('slug',$(this).val());
    formData.append('model',$(this).attr('data-model'));
    

    $.ajax({
        url: src,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            if (data.status == 1) {
                $('.check-slug').removeClass('is-invalid');
                $('.check-slug').addClass('is-valid');
                $('p[id="msg-check"]').empty();
                $('input[name="slug"]').after('<p id="msg-check" class="valid-feedback" style="display: block">' + data.message + '</p>');
            }else{
                $('.check-slug').removeClass('is-valid');
                $('.check-slug').addClass('is-invalid');
                $('p[id="msg-check"]').empty();
                $('input[name="slug"]').after('<p id="msg-check" class="invalid-feedback" style="display: block">' + data.message + ' <a href="' + data.data + '">Access to slug existed</a>' + '</p>');
            }
        }
    });
});

$('#kt_datetimepicker_1').datetimepicker({
    todayHighlight: true,
    autoclose: true,
    format: 'yyyy-mm-dd hh:ii:ss'
});

$(document).on("click",'.update-status-tasks', function() {
    var src = $('.form-update-status-tasks').attr('action');
    var formData = new FormData();
    var dataId = $(this).attr('data-id');   
    formData.append('id',$(this).val());

    var list = JSON.parse($('#listStatusTask').text());
    $.ajax({
        url: src,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {
            if (data.status == 1) {
                $('.change-color-1-' + dataId).removeClass('kt-widget2__item--' + list[data.data.oldStatus].class);
                $('.change-color-1-' + dataId).addClass('kt-widget2__item--' + list[data.data.newStatus].class);

                $('.change-color-2-' + dataId).removeClass('kt-badge--' + list[data.data.oldStatus].class);
                $('.change-color-2-' + dataId).addClass('kt-badge--' + list[data.data.newStatus].class);
                $('.change-color-2-' + dataId).text(list[data.data.newStatus].title);
            }
        }
    });
})

"use strict";

// Class definition
var KTDashboard = function() {

    // Bandwidth Charts 1.
    // Based on Chartjs plugin - http://www.chartjs.org/
    var bandwidthChart1 = function() {
        if ($('#kt_chart_bandwidth1').length == 0) {
            return;
        }

        var ctx = document.getElementById("kt_chart_bandwidth1").getContext("2d");

        var gradient = ctx.createLinearGradient(0, 0, 0, 240);
        gradient.addColorStop(0, Chart.helpers.color('#d1f1ec').alpha(1).rgbString());
        gradient.addColorStop(1, Chart.helpers.color('#d1f1ec').alpha(0.3).rgbString());

        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December"],
                datasets: [{
                    label: "Products",
                    backgroundColor: gradient,
                    borderColor: KTApp.getStateColor('success'),

                    pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                    pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                    pointHoverBackgroundColor: KTApp.getStateColor('danger'),
                    pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.1).rgbString(),

                    //fill: 'start',
                    data: JSON.parse($('#data_products_year').text())
                }]
            },
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                    position: 'nearest',
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        display: false,
                        gridLines: false,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: false,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                elements: {
                    line: {
                        tension: 0.0000001
                    },
                    point: {
                        radius: 4,
                        borderWidth: 12
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 10,
                        bottom: 0
                    }
                }
            }
        };

        var chart = new Chart(ctx, config);
    }

    // Bandwidth Charts 2.
    // Based on Chartjs plugin - http://www.chartjs.org/
    var bandwidthChart2 = function() {
        if ($('#kt_chart_bandwidth2').length == 0) {
            return;
        }

        var ctx = document.getElementById("kt_chart_bandwidth2").getContext("2d");

        var gradient = ctx.createLinearGradient(0, 0, 0, 240);
        gradient.addColorStop(0, Chart.helpers.color('#ffefce').alpha(1).rgbString());
        gradient.addColorStop(1, Chart.helpers.color('#ffefce').alpha(0.3).rgbString());

        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December"],
                datasets: [{
                    label: "Aricles",
                    backgroundColor: gradient,
                    borderColor: KTApp.getStateColor('warning'),
                    pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                    pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                    pointHoverBackgroundColor: KTApp.getStateColor('danger'),
                    pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.1).rgbString(),

                    //fill: 'start',
                    data: JSON.parse($('#data_aritlces_year').text())
                }]
            },
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                    position: 'nearest',
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                legend: {
                    display: false
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        display: false,
                        gridLines: false,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: false,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                elements: {
                    line: {
                        tension: 0.0000001
                    },
                    point: {
                        radius: 4,
                        borderWidth: 12
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 10,
                        bottom: 0
                    }
                }
            }
        };

        var chart = new Chart(ctx, config);

    }

    var dailySales = function() {
            var chartContainer = KTUtil.getByID('kt_chart_daily_sales');

            if (!chartContainer) {
                return;
            }

            var chartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December"],
                datasets: [{
                    //label: 'Dataset 1',
                    label: "Orders complete",
                    backgroundColor: KTApp.getStateColor('success'),
                    data: JSON.parse($('#data_orders_final_year').text())
                }, {
                    //label: 'Dataset 2',
                    label: "Orders",
                    backgroundColor: '#f3f3fb',
                    data: JSON.parse($('#data_orders_watting_year').text())
                }]
            };

            var chart = new Chart(chartContainer, {
                type: 'bar',
                data: chartData,
                options: {
                    title: {
                        display: false,
                    },
                    tooltips: {
                        intersect: false,
                        mode: 'nearest',
                        xPadding: 10,
                        yPadding: 10,
                        caretPadding: 10
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    barRadius: 4,
                    scales: {
                        xAxes: [{
                            display: false,
                            gridLines: false,
                            stacked: true
                        }],
                        yAxes: [{
                            display: false,
                            stacked: true,
                            gridLines: false
                        }]
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    }
                }
            });
        }

    var profitShare = function() {        
        if (!KTUtil.getByID('kt_chart_profit_share')) {
            return;
        }

        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: JSON.parse($('#data_users_gender').text()),
                    backgroundColor: [
                        KTApp.getStateColor('success'),
                        KTApp.getStateColor('danger'),
                        KTApp.getStateColor('brand')
                    ]
                }],
                labels: [
                    'Undefined',
                    'Male',
                    'Female'
                ]
            },
            options: {
                cutoutPercentage: 75,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Technology'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10, 
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KTApp.getStateColor('brand'),
                    titleFontColor: '#ffffff', 
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                }
            }
        };

        var ctx = KTUtil.getByID('kt_chart_profit_share').getContext('2d');
        var myDoughnut = new Chart(ctx, config);
    }

    var revenueChange = function() {
        if ($('#kt_chart_revenue_change').length == 0) {
            return;
        }

        Morris.Donut({
            element: 'kt_chart_revenue_change',
            data: JSON.parse($('#data_orders_country').text()),
            colors: [
                KTApp.getStateColor('success'),
                KTApp.getStateColor('danger'),
                KTApp.getStateColor('brand'),
                KTApp.getStateColor('warning')
            ],
        });
    }
    return {
        // Init demos
        init: function() {
            // init charts
            
            bandwidthChart1();
            bandwidthChart2();
            dailySales();
            profitShare();
            revenueChange();

            // demo loading
            var loading = new KTDialog({'type': 'loader', 'placement': 'top center', 'message': 'Loading ...'});
            loading.show();

            setTimeout(function() {
                loading.hide();
            }, 3000);
        }
    };
}();

// Class initialization on page load
jQuery(document).ready(function() {
    KTDashboard.init();
});

var KTQuickSearch = function() {
    var target;
    var form;
    var input;
    var closeIcon;
    var resultWrapper;
    var resultDropdown;
    var resultDropdownToggle;
    var inputGroup;
    var query = '';

    var hasResult = false; 
    var timeout = false; 
    var isProcessing = false;
    var requestTimeout = 200; // ajax request fire timeout in milliseconds 
    var spinnerClass = 'kt-spinner kt-spinner--input kt-spinner--sm kt-spinner--brand kt-spinner--right';
    var resultClass = 'kt-quick-search--has-result';
    var minLength = 2;

    var showProgress = function() {
        isProcessing = true;
        KTUtil.addClass(inputGroup, spinnerClass); 

        if (closeIcon) {
            KTUtil.hide(closeIcon);
        }       
    }

    var hideProgress = function() {
        isProcessing = false;
        KTUtil.removeClass(inputGroup, spinnerClass);

        if (closeIcon) {
            if (input.value.length < minLength) {
                KTUtil.hide(closeIcon);
            } else {
                KTUtil.show(closeIcon, 'flex');
            }            
        }
    }

    var showDropdown = function() {
        if (resultDropdownToggle && !KTUtil.hasClass(resultDropdown, 'show')) {
            $(resultDropdownToggle).dropdown('toggle');
            $(resultDropdownToggle).dropdown('update'); 
        }
    }

    var hideDropdown = function() {
        if (resultDropdownToggle && KTUtil.hasClass(resultDropdown, 'show')) {
            $(resultDropdownToggle).dropdown('toggle');
        }
    }

    var processSearch = function() {
        if (hasResult && query === input.value) {  
            hideProgress();
            KTUtil.addClass(target, resultClass);
            showDropdown();
            KTUtil.scrollUpdate(resultWrapper);

            return;
        }

        query = input.value;

        KTUtil.removeClass(target, resultClass);
        showProgress();

        setTimeout(function() {
            $.ajax({
                url: '/',
                data: {
                    query: query
                },
                dataType: 'html',
                success: function(res) {
                    hasResult = true;
                    hideProgress();
                    KTUtil.addClass(target, resultClass);
                    KTUtil.setHTML(resultWrapper, res);
                    showDropdown();
                    KTUtil.scrollUpdate(resultWrapper);
                },
                error: function(res) {
                    hasResult = false;
                    hideProgress();
                    KTUtil.addClass(target, resultClass);
                    KTUtil.setHTML(resultWrapper, '<span class="kt-quick-search__message">Connection error. Pleae try again later.</div>');
                    showDropdown();
                    KTUtil.scrollUpdate(resultWrapper);
                }
            });
        }, 1000);       
    }

    var handleCancel = function(e) {
        input.value = '';
        query = '';
        hasResult = false;
        KTUtil.hide(closeIcon);
        KTUtil.removeClass(target, resultClass);
        hideDropdown();
    }

    var handleSearch = function() {
        if (input.value.length < minLength) {
            hideProgress();
            hideDropdown();

            return;
        }

        if (isProcessing == true) {
            return;
        }

        if (timeout) {
            clearTimeout(timeout);
        }

        timeout = setTimeout(function() {
            processSearch();
        }, requestTimeout);     
    }

    return {     
        init: function(element) { 
            // Init
            target = element;
            form = KTUtil.find(target, '.kt-quick-search__form');
            input = KTUtil.find(target, '.kt-quick-search__input');
            closeIcon = KTUtil.find(target, '.kt-quick-search__close');
            resultWrapper = KTUtil.find(target, '.kt-quick-search__wrapper');
            resultDropdown = KTUtil.find(target, '.dropdown-menu'); 
            resultDropdownToggle = KTUtil.find(target, '[data-toggle="dropdown"]');
            inputGroup = KTUtil.find(target, '.input-group');           

            // Attach input keyup handler
            KTUtil.addEvent(input, 'keyup', handleSearch);
            KTUtil.addEvent(input, 'focus', handleSearch);

            // Prevent enter click
            form.onkeypress = function(e) {
                var key = e.charCode || e.keyCode || 0;     
                if (key == 13) {
                    e.preventDefault();
                }
            }
           
            KTUtil.addEvent(closeIcon, 'click', handleCancel);     

            // Auto-focus on the form input on dropdown form open
            var toggle = KTUtil.getByID('kt_quick_search_toggle');
            if (toggle) {
                $(toggle).on('shown.bs.dropdown', function () {
                    input.focus();
                });
            }  
        }
    };
};

var KTQuickSearchMobile = KTQuickSearch;

$(document).ready(function() {
    if (KTUtil.get('kt_quick_search_default')) {
        KTQuickSearch().init(KTUtil.get('kt_quick_search_default'));
    }

    if (KTUtil.get('kt_quick_search_inline')) {
        KTQuickSearchMobile().init(KTUtil.get('kt_quick_search_inline'));
    }
});

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

