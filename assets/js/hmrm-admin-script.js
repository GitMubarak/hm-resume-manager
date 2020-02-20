(function($) {

    // USE STRICT
    "use strict";

    /*
    $.each(hmrmAdminScript.hmrmIdsOfColorPicker, function(index, value) {
        $(value).wpColorPicker();
    });
	*/

    $('input#hmrm-media-manager').click(function(e) {

        e.preventDefault();
        var hmrm_image_frame;
        if (hmrm_image_frame) {
            hmrm_image_frame.open();
        }
        // Define hmrm_image_frame as wp.media object
        hmrm_image_frame = wp.media({
            title: 'Select Media',
            multiple: false,
            library: {
                type: 'image',
            }
        });

        hmrm_image_frame.on('close', function() {
            // On close, get selections and save to the hidden input
            // plus other AJAX stuff to refresh the image preview
            var selection = hmrm_image_frame.state().get('selection');
            var gallery_ids = new Array();
            var my_index = 0;
            selection.each(function(attachment) {
                gallery_ids[my_index] = attachment['id'];
                my_index++;
            });
            var ids = gallery_ids.join(",");
            $('input#hmrm_photograph').val(ids);
            HmrmRefreshImage(ids);
        });

        hmrm_image_frame.on('open', function() {
            // On open, get the id from the hidden input
            // and select the appropiate images in the media manager
            var selection = hmrm_image_frame.state().get('selection');
            var ids = jQuery('input#hmrm_photograph').val().split(',');
            ids.forEach(function(id) {
                var attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add(attachment ? [attachment] : []);
            });

        });

        hmrm_image_frame.open();
    });

    var hmrmSyOption = '';
    for (var sy = new Date().getFullYear(); sy >= 1900; sy--) {
        hmrmSyOption += '<option value="' + sy + '">' + sy + '</option>';
    }

    var hmrmEyOption = '';
    var hmrmEndingYear = new Date();
    for (var ey = hmrmEndingYear.getFullYear() + 7; ey >= 1900; ey--) {
        hmrmEyOption += '<option value="' + ey + '">' + ey + '</option>';
    }

    var hmrmMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var hmrmMonthOption = '';

    hmrmMonth.forEach(function(element) {
        hmrmMonthOption += '<option value="' + element + '">' + element + '</option>';
    });

    //==================================================
    $('.add').on('click', function() {
        var npstp_tr_sl = $('tr.hmrm-add-row-tr').length;

        var npstp_tr = '<tr class="hmrm-add-row-tr">' +
            '<td>' + (npstp_tr_sl + 1) + '</td>' +
            '<td class="hmrm_edu_school">' +
            '<input type="text" name="hmrm_edu_school[]" class="hmrm_edu_school regular-text" placeholder="Ex: Boston University">' +
            '</td>' +
            '<td class="hmrm_edu_degree">' +
            '<input type="text" name="hmrm_edu_degree[]" class="hmrm_edu_degree regular-text" placeholder="Ex: Bachelor">' +
            '</td>' +
            '<td class="hmrm_edu_subject">' +
            '<input type="text" name="hmrm_edu_subject[]" class="hmrm_edu_subject regular-text" placeholder="Ex: Business">' +
            '</td>' +
            '<td class="hmrm_edu_start_year">' +
            '<select name="hmrm_edu_start_year[]" class="hmrm_edu_start_year">' +
            '<option value="">Year</option>' + hmrmSyOption +
            '</select>' +
            '<td class="hmrm_edu_end_year">' +
            '<select name="hmrm_edu_end_year[]" class="hmrm_edu_end_year">' +
            '<option value="">Year</option>' + hmrmEyOption +
            '</select>' +
            '</td>' +
            '<td class="hmrm_edu_grade">' +
            '<input type="text" name="hmrm_edu_grade[]" class="hmrm_edu_grade">' +
            '</td>' +
            '<td><a href="#" class="dashicons dashicons-no delete">&nbsp;</a></td></tr>';
        $('.hmrm-add-row-tbody').append(npstp_tr);

        $.each(['#hmrm_bg_color_' + (npstp_tr_sl + 1)], function(index, value) {
            $(value).wpColorPicker();
        });
    });

    //==================================================
    $('tbody.hmrm-add-row-tbody').delegate('.delete', 'click', function() {
        var npstp_tr_sl = $('tr.hmrm-add-row-tr').length;
        if (npstp_tr_sl > 1) {
            $(this).parent().parent().remove();
        }
    });

    //==================================================
    // Experience Adding
    //==================================================
    $('.hmrm-exp-add').on('click', function() {
        var hmrmexp_tr_sl = $('tr.hmrm-exp-add-row-tr').length;

        var hmrm_exp_tr = '<tr class="hmrm-exp-add-row-tr">' +
            '<td style="vertical-align: top;">' + (hmrmexp_tr_sl + 1) + '</td>' +
            '<td class="hmrm_exp_company" style="vertical-align: top;">' +
            '<input type="text" name="hmrm_exp_company[]" class="hmrm_exp_company regular-text" placeholder="Ex: Microsoft">' +
            '</td>' +
            '<td class="hmrm_exp_job_title" style="vertical-align: top;">' +
            '<input type="text" name="hmrm_exp_job_title[]" class="hmrm_exp_job_title regular-text" placeholder="Ex: Senior Software Engineer">' +
            '</td>' +
            '<td class="hmrm_edu_start_month" style="vertical-align: top;">' +
            '<select name="hmrm_edu_start_month[]" class="hmrm_edu_start_month">' +
            '<option value="">Month</option>' + hmrmMonthOption +
            '</select> ' +
            '<select name="hmrm_exp_start_year[]" class="hmrm_exp_start_year">' +
            '<option value="">Year</option>' + hmrmSyOption +
            '</select>' +
            '<td class="hmrm_exp_end_month" style="vertical-align: top;">' +
            '<select name="hmrm_edu_end_month[]" class="hmrm_exp_end_month">' +
            '<option value="">Month</option>' + hmrmMonthOption +
            '</select> ' +
            '<select name="hmrm_exp_end_year[]" class="hmrm_exp_end_year">' +
            '<option value="">Year</option>' + hmrmEyOption +
            '</select>' +
            '</td>' +
            '<td class="hmrm_edu_grade" style="vertical-align: top;">' +
            '<textarea name="hmrm_exp_role[]" class="hmrm_exp_role" cols="50" rows="5"></textarea>' +
            '<br><code> Accepts HTML Tag </code>' +
            '</td>' +
            '<td style="vertical-align: top;"><a href="#" class="dashicons dashicons-no hmrm-exp-delete">&nbsp;</a></td></tr>';
        $('.hmrm-exp-add-row-tbody').append(hmrm_exp_tr);

        $.each(['#hmrm_bg_color_' + (npstp_tr_sl + 1)], function(index, value) {
            $(value).wpColorPicker();
        });
    });

    //==================================================
    // Delete Exp
    $('tbody.hmrm-exp-add-row-tbody').delegate('.hmrm-exp-delete', 'click', function() {
        var hmrmexp_tr_sl2 = $('tr.hmrm-exp-add-row-tr').length;
        if (hmrmexp_tr_sl2 > 1) {
            $(this).parent().parent().remove();
        }
    });

    //====================================================
    $('.hmrm-closebtn').on('click', function() {
        this.parentElement.style.display = 'none';
    });


    // Ajax request to refresh the image preview
    function HmrmRefreshImage(the_id) {
        var data = {
            action: 'hmrm_get_image',
            id: the_id
        };
        $.get(ajaxurl, data, function(response) {

            if (response.success === true) {
                //alert(response.data.image);
                $('#hmrm-preview-image').replaceWith(response.data.image);
            }
        });
    }

})(jQuery);