
$(document).ready(function(){

   bindDateTimePicker();
});


/**
 * Attaches date-time picker on input field with class .datetimepicker
 */
function bindDateTimePicker()
{
    var format = 'd.m.Y. \\u H:m';
    var dayOfWeekStart = 1;
    var lang = 'sr';
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

    $('.datetimepicker#start-date').datetimepicker({
        format: format,
        dayOfWeekStart: dayOfWeekStart,
        lang: lang,
        i18n: i18n,
        onShow: function(ct){
            this.setOptions({
                maxDate: $('.datetimepicker#end-date').val() ? $('.datetimepicker#end-date').val() : false,
                maxTime: $('.datetimepicker#end-date').val() ? $('.datetimepicker#end-date').val() : false
            })
        }
    });

    $('.datetimepicker#end-date').datetimepicker({
        format: format,
        dayOfWeekStart: dayOfWeekStart,
        lang: lang,
        i18n: i18n,
        onShow: function(ct){
            this.setOptions({
                minDate: $('.datetimepicker#start-date').val() ? $('.datetimepicker#start-date').val() : false,
                minTime: $('.datetimepicker#start-date').val() ? $('.datetimepicker#start-date').val() : false
            })
        }
    });
}