<?php
$hmrmExpShowMessage = false;

$hmrmExpArr = !empty(get_option('hmrm_exp_settings')) ? get_option('hmrm_exp_settings') : array();
end($hmrmExpArr);
$hmrmExpArrLastKey = key($hmrmExpArr);
$hmrmExps = ($hmrmExpArrLastKey > -1) ? (intval($hmrmExpArrLastKey) + 1) : 0;

if (isset($_POST['hmrm_exp_delete_btn'])) {
    unset($hmrmExpArr[$_POST['hmrm_delete_key']]);
    update_option('hmrm_exp_settings', $hmrmExpArr);
}

if (isset($_POST['createExpSettings'])) {
    if (!isset($_POST['hmrm_create_exp_setting'])) die("Something wrong!");
    if (!wp_verify_nonce($_POST['hmrm_create_exp_setting'], 'hmrm-create-exp-setting')) die("Something wrong!");

    $hmrmExpArr[$hmrmExps] = array(
        'hmrm_exp_company'      => (!empty($_POST['hmrm_exp_company']) && (sanitize_text_field($_POST['hmrm_exp_company']) != '')) ? sanitize_text_field($_POST['hmrm_exp_company']) : '',
        'hmrm_exp_job_title'    => (!empty($_POST['hmrm_exp_job_title']) && (sanitize_text_field($_POST['hmrm_exp_job_title']) != '')) ? sanitize_text_field($_POST['hmrm_exp_job_title']) : '',
        'hmrm_exp_start_month'  => (!empty($_POST['hmrm_exp_started_from']) && (sanitize_text_field($_POST['hmrm_exp_started_from']) != '')) ? sanitize_text_field(date('m', strtotime($_POST['hmrm_exp_started_from']))) : '',
        'hmrm_exp_start_year'   => (!empty($_POST['hmrm_exp_started_from']) && (sanitize_text_field($_POST['hmrm_exp_started_from']) != '')) ? sanitize_text_field(date('Y', strtotime($_POST['hmrm_exp_started_from']))) : '',
        'hmrm_exp_end_month'    => (!empty($_POST['hmrm_exp_ended_to']) && (sanitize_text_field($_POST['hmrm_exp_ended_to']) != '')) ? sanitize_text_field(date('m', strtotime($_POST['hmrm_exp_ended_to']))) : '',
        'hmrm_exp_end_year'     => (!empty($_POST['hmrm_exp_ended_to']) && (sanitize_text_field($_POST['hmrm_exp_ended_to']) != '')) ? sanitize_text_field(date('Y', strtotime($_POST['hmrm_exp_ended_to']))) : '',
        'hmrm_exp_role'         => (!empty($_POST['hmrm_exp_role']) && (wp_kses_post($_POST['hmrm_exp_role']) != '')) ? wp_kses_post($_POST['hmrm_exp_role']) : ''
    );
    $hmrmExpShowMessage = update_option('hmrm_exp_settings', $hmrmExpArr);
}

if (isset($_POST['updateExpSettings'])) {
    if (!isset($_POST['hmrm_update_exp_setting'])) die("Something wrong!");
    if (!wp_verify_nonce($_POST['hmrm_update_exp_setting'], 'hmrm-update-exp-setting')) die("Something wrong!");

    $hmrmExpArr[$_POST['hmrm_exp_id']] = array(
        'hmrm_exp_company'      => (!empty($_POST['hmrm_exp_company']) && (sanitize_text_field($_POST['hmrm_exp_company']) != '')) ? sanitize_text_field($_POST['hmrm_exp_company']) : '',
        'hmrm_exp_job_title'    => (!empty($_POST['hmrm_exp_job_title']) && (sanitize_text_field($_POST['hmrm_exp_job_title']) != '')) ? sanitize_text_field($_POST['hmrm_exp_job_title']) : '',
        'hmrm_exp_start_month'  => (!empty($_POST['hmrm_exp_started_from']) && (sanitize_text_field($_POST['hmrm_exp_started_from']) != '')) ? sanitize_text_field(date('m', strtotime($_POST['hmrm_exp_started_from']))) : '',
        'hmrm_exp_start_year'   => (!empty($_POST['hmrm_exp_started_from']) && (sanitize_text_field($_POST['hmrm_exp_started_from']) != '')) ? sanitize_text_field(date('Y', strtotime($_POST['hmrm_exp_started_from']))) : '',
        'hmrm_exp_end_month'    => (!empty($_POST['hmrm_exp_ended_to']) && (sanitize_text_field($_POST['hmrm_exp_ended_to']) != '')) ? sanitize_text_field(date('m', strtotime($_POST['hmrm_exp_ended_to']))) : '',
        'hmrm_exp_end_year'     => (!empty($_POST['hmrm_exp_ended_to']) && (sanitize_text_field($_POST['hmrm_exp_ended_to']) != '')) ? sanitize_text_field(date('Y', strtotime($_POST['hmrm_exp_ended_to']))) : '',
        'hmrm_exp_role'         => (!empty($_POST['hmrm_exp_role']) && (wp_kses_post($_POST['hmrm_exp_role']) != '')) ? wp_kses_post($_POST['hmrm_exp_role']) : ''
    );
    $hmrmExpShowMessage = update_option('hmrm_exp_settings', $hmrmExpArr);
}

$hmrmExpSettings = get_option('hmrm_exp_settings');
?>
<div id="hmcs-wrap-all" class="wrap hmcs-settings-wrap">
    <div class="hmcs-header-bar">
        <div class="hmcs-header-left">
            <div class="hmcs-header-bar-logo">
                <img src="<?php echo esc_attr(HMRM_ASSETS . 'img/exp.png'); ?>" alt="hm-resume-manager">
            </div>
            <h3 class="hmcs-header-title"><?php esc_html_e('Experience History', HMRM_TXT_DOMAIN);
                                            ?></h3>
        </div>
        <div class="hmcs-header-right"></div>
    </div>
    <?php
    $hmrm_months = $this->hmrm_months();
    $hmrmExpC = 1;
    if ($hmrmExpSettings) {
        foreach ($hmrmExpSettings as $key => $value) {
    ?>
    <table style="width:100%" class="hmcs-table">
        <tbody>
            <tr>
                <td width="20%" class="hmcs-table-td-title-left">
                    <?php printf('%s: %d', 'Experience', $hmrmExpC++); ?></td>
                <td width="80%" class="hmcs-table-td-title-right">
                    <a href="javascript:;" data-src="#form-employment-history-edit" class="fancybox hmcs-btn small edit"
                        data-fancybox onclick="javascript: hmrmLoadExperience(<?php printf('%d', $key); ?>);">Edit</a>
                    <?php
                            $this->hmrm_load_delete_button($key);
                            ?>
                </td>
            </tr>
            <tr>
                <td>Company:</td>
                <td><?php echo esc_attr($value['hmrm_exp_company']); ?></td>
            </tr>
            <tr>
                <td>Job Title:</td>
                <td><?php echo esc_attr($value['hmrm_exp_job_title']); ?></td>
            </tr>
            <tr>
                <td>Started From:</td>
                <td>
                    <?php
                            $hmrmExpStartMonth = (intval($value['hmrm_exp_start_month']) - 1);
                            echo esc_attr($hmrm_months[$hmrmExpStartMonth]) . ', ' . esc_attr($value['hmrm_exp_start_year']); ?>
                </td>
            </tr>
            <tr>
                <td>Ended To:</td>
                <td>
                    <?php
                            $hmrmExpEndMonth = (intval($value['hmrm_exp_end_month']) - 1);
                            echo esc_attr($hmrm_months[$hmrmExpEndMonth]) . ', ' . esc_attr($value['hmrm_exp_end_year']); ?>
                </td>
            </tr>
            <tr>
                <td>Role:</td>
                <td><?php echo wp_kses_post($value['hmrm_exp_role']); ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <?php
        }
    } ?>
    <div class="hmcs-form-group">
        <a rel="group" data-src="#form-employment-history" href="javascript:;" class="fancybox hmcs-btn"
            data-fancybox><i class='fa fa-plus-circle'></i> <?php echo esc_html('Add Experience'); ?></a>
    </div>
</div>
<?php require_once plugin_dir_path(__FILE__) . 'popup/employment-history.php'; ?>
<?php require_once plugin_dir_path(__FILE__) . 'popup/employment-history-edit.php'; ?>
<script type="text/javascript">
function hmrmLoadExperience(id) {
    jQuery.ajax({
        url: hmrm_admin_ajax_object.ajaxurl,
        type: "POST",
        data: {
            action: 'hmrm_load_experience',
            exp: id
        },
        dataType: 'json',
        success: function(response) {
            jQuery('#hmrm-exp-id-edit').val(id);
            jQuery('#hmrm-exp-company-edit').val(response.hmrm_exp_company);
            jQuery('#hmrm-exp-job-title-edit').val(response.hmrm_exp_job_title);
            jQuery('#hmrm-exp-started-from-exp').val(response.hmrm_exp_start_year + '-' + response
                .hmrm_exp_start_month + '-01');
            jQuery('#hmrm-exp-ended-to-exp').val(response.hmrm_exp_end_year + '-' + response
                .hmrm_exp_end_month + '-01');
            jQuery('#hmrm-exp-role-edit').val(response.hmrm_exp_role);
        }
    });
}
</script>