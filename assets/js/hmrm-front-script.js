(function($) {

    // USE STRICT
    "use strict";

    var input_error = false;
    var weight_valid = false;
    var waterOunces = 0;

    function check_weight() {
        var height_valid;
        if (!$(this).val() || isNaN($(this).val()) || $(this).val() <= 0) {
            $(this).parents('#Weight').addClass('has-error');
            $('#input-verif').removeClass('hide');
            $('#input-verif').text('Please enter a correct weight.');
            $(this).focus();
            weight_valid = false;
        } else {
            $(this).parents('#Weight').removeClass('has-error');
            $('#input-verif').addClass('hide');
            weight_valid = true;
        }
    }

    function reset_form() {
        $('#calculator')[0].reset();
    }

    $('button#calculate-base-water').on("click", function(e) {
        e.preventDefault();
        weight_valid = false;
        check_weight.call($('#inputWeight'));
        input_error = !weight_valid;
        if (input_error == false) {
            var weight;
            weight = $('#inputWeight').val();
            waterOunces = Math.round(0.5 * weight);
            $('#waterOunces').val(waterOunces);
            $('#waterCups').val(Math.round(waterOunces / 8));
            return true;
        }
        return false;
    });

    $('button#calculate-daily-needs').on("click", function(e) {
        e.preventDefault();
        var dailyOunces = 0;
        var activity;
        activity = Number($('#inputActivity').val());
        if (activity == 0) {
            dailyOunces = waterOunces;
        } else {
            dailyOunces = waterOunces + 12 * activity;
        }
        $('#dailyWaterOunces').val(dailyOunces);
        $('#dailyWaterCups').val(Math.round(dailyOunces / 8));
    });

    function calculate_daily_needs1() {
        if (calculate_base_water()) {
            var dailyOunces = 0;
            var activity;
            activity = Number($('#inputActivity').val());
            if (activity == 0) {
                dailyOunces = waterOunces;
            } else {
                dailyOunces = waterOunces + 12 * activity;
            }
            $('#dailyWaterOunces').val(dailyOunces);
            $('#dailyWaterCups').val(Math.round(dailyOunces / 8));
        }
    }
    $(reset_form);

})(jQuery);