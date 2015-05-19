$(function() {
    
        /*
         * Datepicker options for continuous tournaments
         */
        var options = {
                locale: 'fr',
                format: 'YYYY/MM/DD'
        };
            
        /*
         * Links the "from" and "to" inputs
         * Also, autofills them with transmitted values
         */
        var view = $('.tournament-continuous');
        var toOptions = $.extend({}, options);
        view.find('input[name=to]').datetimepicker(toOptions)
            .on("dp.change", function(e) {
                view.find('input[name=from]').data("DateTimePicker").maxDate(e.date);
        });
            
        var fromOptions = $.extend({}, options);
        view.find('input[name=from]').datetimepicker(fromOptions)
            .on("dp.change", function(e) {
                view.find('input[name=to]').data("DateTimePicker").minDate(e.date);
        });
});