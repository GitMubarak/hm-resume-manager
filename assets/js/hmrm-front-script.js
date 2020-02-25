(function($) {

    // USE STRICT
    "use strict";

    var hmrmPercentage = 0;
    var hmrmPb;
    var hmrmColor = '';
    for (hmrmPb = 0; hmrmPb < $('.hmrm-skill-item').length; hmrmPb++) {
        hmrmPercentage = $('.single-progressbar #progressbar_' + hmrmPb).data('percentage');
        hmrmColor = $('.single-progressbar #progressbar_' + hmrmPb).data('color');
        $('.single-progressbar #progressbar_' + hmrmPb).rProgressbar({
            percentage: hmrmPercentage,
            fillBackgroundColor: hmrmColor
        });
    }

})(jQuery);