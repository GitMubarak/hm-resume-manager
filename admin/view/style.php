<?php
$hmrmStyleShowMessage = false;

if (isset($_POST['updateStyleSettings'])) {
    $hmrmStyleSettings = array(
        'hmrm_bg_color'          => sanitize_text_field($_POST['hmrm_bg_color']) ? sanitize_text_field($_POST['hmrm_bg_color']) : '#FFFAF0',
        'hmrm_border_color'          => sanitize_text_field($_POST['hmrm_border_color']) ? sanitize_text_field($_POST['hmrm_border_color']) : '#FF6633',
        'hmrm_skill_label_text'          => sanitize_text_field($_POST['hmrm_skill_label_text']) ? sanitize_text_field($_POST['hmrm_skill_label_text']) : 'Skills',
        'hmrm_edu_label_text'          => sanitize_text_field($_POST['hmrm_edu_label_text']) ? sanitize_text_field($_POST['hmrm_edu_label_text']) : 'Education',
        'hmrm_exp_label_text'          => sanitize_text_field($_POST['hmrm_exp_label_text']) ? sanitize_text_field($_POST['hmrm_exp_label_text']) : 'Experience',
    );
    $hmrmStyleShowMessage = update_option('hmrm_style_settings', serialize($hmrmStyleSettings));
}
$hmrmStyleSettings = stripslashes_deep(unserialize(get_option('hmrm_style_settings')));
?>
<div id="hmcs-wrap-all" class="wrap hmcs-settings-wrap">

    <div class="hmcs-header-bar">
        <div class="hmcs-header-left">
            <h3 class="hmcs-header-title"><i class="fa fa-paint-brush" aria-hidden="true"></i>&nbsp;<?php _e('Styles Settings', HMRM_TXT_DOMAIN); ?></h3>
        </div>
    </div>

    <?php 
    if ( $hmrmStyleShowMessage ) {
        $this->hmrm_display_notification('success', __('Your information updated successfully', HMRM_TXT_DOMAIN) );
    }
    ?>

    <div class="hmrm-wrap">

        <div class="hmrm_personal_wrap hmrm_personal_help" style="width: 75%; float: left;">

            <form name="hmrm_general_settings_form" role="form" class="form-horizontal" method="post" action=""
                id="hmrm-general-settings-form">
                <table class="form-table">
                    <tr class="hmrm_bg_color">
                        <th scope="row">
                            <label for="hmrm_bg_color"><?php esc_html_e('Background Color:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input class="wsp-wp-color" type="text" name="hmrm_bg_color" id="hmrm_bg_color"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_bg_color']); ?>">
                            <div id="colorpicker"></div>
                        </td>
                    </tr>
                    <tr class="hmrm_border_color">
                        <th scope="row">
                            <label for="hmrm_border_color"><?php esc_html_e('Border Color:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input class="wsp-wp-color" type="text" name="hmrm_border_color" id="hmrm_border_color"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_border_color']); ?>">
                            <div id="colorpicker"></div>
                        </td>
                    </tr>
                    <tr class="hmrm_skill_label_text">
                        <th scope="row">
                            <label
                                for="hmrm_skill_label_text"><?php esc_html_e('Skills Label Text:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="text" name="hmrm_skill_label_text" placeholder="Skills" class="regular-text"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_skill_label_text']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_edu_label_text">
                        <th scope="row">
                            <label
                                for="hmrm_edu_label_text"><?php esc_html_e('Education Label Text:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="text" name="hmrm_edu_label_text" placeholder="Education" class="regular-text"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_edu_label_text']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_exp_label_text">
                        <th scope="row">
                            <label
                                for="hmrm_exp_label_text"><?php esc_html_e('Experience Label Text:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="text" name="hmrm_exp_label_text" placeholder="Experience" class="regular-text"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_exp_label_text']); ?>">
                        </td>
                    </tr>
                </table>
                <hr>

                <p class="submit">
                    <button id="updateStyleSettings" name="updateStyleSettings" class="hmcs-btn"><?php esc_html_e('Update Styles', HMRM_TXT_DOMAIN); ?></button>
                </p>

            </form>
        
        </div>
            
        <?php include_once('partial/admin-sidebar.php'); ?> 

    </div>

</div>