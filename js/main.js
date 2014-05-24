
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
    var formatTime = 'H:m';
    var formatDate = 'd.m.Y'
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
        format: format,
        formatTime: formatTime,
        formatDate: formatDate,
        dayOfWeekStart: dayOfWeekStart,
        lang: lang,
        i18n: i18n,
        minDate: 0,
        time: false,
        onShow: function(ct){
            this.setOptions({
                maxDate: $('#end-date').val() ? $('#end-date').val() : false
            })
        }
    });

    $('#end-date').datetimepicker({
        format: format,
        formatTime: formatTime,
        formatDate: formatDate,
        dayOfWeekStart: dayOfWeekStart,
        lang: lang,
        i18n: i18n,
        minDate: 0,
        time: false,
        onShow: function(ct){
            this.setOptions({
                minDate: $('#start-date').val() ? $('#start-date').val() : false
            })
        }
    });
}