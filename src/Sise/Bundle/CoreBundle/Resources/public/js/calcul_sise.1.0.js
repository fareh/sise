/**
 * Created by hp on 29/01/2015.
 */
(function ($) {
    $.fn.calculsise = function (options) {
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
            fDIV: "nombelevmasc",
            sDIV: "nombelevfemi",
            tdIV: "nombtotaelev"
        }, options);
        this.change(function () {
            var clickDiv = $(this).attr("class");

            switch (clickDiv) {
                case settings.fDIV:
                    if ($(this).parents('tr').find('input.' + settings.tdIV).length) {
                        $(this).parents('tr').find('input.' + settings.tdIV).val(parseInt($(this).parents('tr').find('input.' + settings.sDIV).val()) + parseInt($(this).val()));
                    } else {
                        $(this).parents('tr').find('td.' + settings.tdIV).text(parseInt($(this).parents('tr').find('input.' + settings.sDIV).val()) + parseInt($(this).val()));
                    }
                    break;
                default:
                    if ($(this).parents('tr').find('input.' + settings.tdIV).length) {
                        $(this).parents('tr').find('input.' + settings.tdIV).val(parseInt($(this).parents('tr').find('input.' + settings.fDIV).val()) + parseInt($(this).val()));
                    } else {
                        $(this).parents('tr').find('td.' + settings.tdIV).text(parseInt($(this).parents('tr').find('input.' + settings.fDIV).val()) + parseInt($(this).val()));
                    }

            }
        });

    };

}(jQuery));