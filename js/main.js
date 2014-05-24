
$(document).ready(function(){

   bindDateTimePicker();
});


/**
 * Attaches date-time picker on input field with class .datetimepicker
 */
function bindDateTimePicker()
{
    var format = 'd.m.Y';
    var dayOfWeekStart = 1;
    var lang = 'sr';
    var formatTime = 'H:i';
    var formatDate = 'd.m.Y';
    var i18n = {
        sr:{
            months:[
                'Januar','Februar','Mart','April',
                'Maj','Jun','Jul','Avgust',
                'Septembar','Oktobar','Novembar','Decembar',
            ],
            dayOfWeek:[
                "Ned", "Pon", "Uto", "Sre",
                "Čet", "Pet", "Sub",
            ]
        }
    };

    $('#start-date').datetimepicker({
        format: formatDate,
        formatDate: formatDate,
        dayOfWeekStart: dayOfWeekStart,
        lang: lang,
        i18n: i18n,
        minDate: 0,
        timepicker: false,
        onShow: function(ct){
            this.setOptions({
                maxDate: $('#end-date').val() ? $('#end-date').val() : false
            })
        }
    });

    $('#end-date').datetimepicker({
        format: formatDate,
        formatDate: formatDate,
        dayOfWeekStart: dayOfWeekStart,
        lang: lang,
        i18n: i18n,
        timepicker: false,
        onShow: function(ct){
            this.setOptions({
                minDate: $('#start-date').val() ? $('#start-date').val() : false
            })
        }
    });

    $('#start-time').datetimepicker({
        format: formatTime,
        formatTime: formatTime,
        datepicker: false,
        onShow: function(ct){
            this.setOptions({
                maxTime: $('#end-time').val() ? $('#end-time').val() : false
            })
        }
    });

    $('#end-time').datetimepicker({
        format: formatTime,
        formatTime: formatTime,
        datepicker: false,
        onShow: function(ct){
            this.setOptions({
                minTime: $('#start-time').val() ? $('#start-time').val() : false
            })
        }
    });
}