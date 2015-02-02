/**
 * Created by hp on 29/01/2015.
 */
(function ($) {
    $.fn.menusise = function (options) {
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
            fId: "TdRetour",
            sId: "BtnRetour"
        }, options);
        this.click(function () {
            if ($(this).attr('id') == settings.fId || $(this).attr('id') == settings.fId+"2"  ) {
                if ($("#"+settings.sId).is("input")) {

                    $("#"+settings.sId).click();
                }else{
                    window.location.href = $("#"+settings.sId).attr("href");
                }

            }
        });

    };

}(jQuery));
