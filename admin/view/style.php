<?php
$hmrmStyleShowMessage = false;

if (isset($_POST['updateStyleSettings'])) {
    $hmrmStyleSettings = array(
        'hmrm_bg_color'             => sanitize_text_field($_POST['hmrm_bg_color']) ? sanitize_text_field($_POST['hmrm_bg_color']) : '#FFFAF0',
        'hmrm_border_color'         => sanitize_text_field($_POST['hmrm_border_color']) ? sanitize_text_field($_POST['hmrm_border_color']) : '#FF6633',
        'hmrm_skill_label_text'     => sanitize_text_field($_POST['hmrm_skill_label_text']) ? sanitize_text_field($_POST['hmrm_skill_label_text']) : 'Skills',
        'hmrm_edu_label_text'       => sanitize_text_field($_POST['hmrm_edu_label_text']) ? sanitize_text_field($_POST['hmrm_edu_label_text']) : 'Education',
        'hmrm_exp_label_text'       => sanitize_text_field($_POST['hmrm_exp_label_text']) ? sanitize_text_field($_POST['hmrm_exp_label_text']) : 'Experience',
        'hmrm_name_color'           => isset($_POST['hmrm_name_color']) ? sanitize_text_field($_POST['hmrm_name_color']) : '#333333',
        'hmrm_name_font_size'       => isset($_POST['hmrm_name_font_size']) && filter_var( $_POST['hmrm_name_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field($_POST['hmrm_name_font_size']) : 28,
        'hmrm_title_color'          => isset($_POST['hmrm_title_color']) ? sanitize_text_field($_POST['hmrm_title_color']) : '#333333',
        'hmrm_title_font_size'      => isset($_POST['hmrm_title_font_size']) && filter_var( $_POST['hmrm_title_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field($_POST['hmrm_title_font_size']) : 18,
        'hmrm_carrer_summary_color' => isset($_POST['hmrm_carrer_summary_color']) ? sanitize_text_field($_POST['hmrm_carrer_summary_color']) : '#333333',
        'hmrm_carrer_summary_font_size' => isset($_POST['hmrm_carrer_summary_font_size']) && filter_var( $_POST['hmrm_carrer_summary_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field($_POST['hmrm_carrer_summary_font_size']) : 12,
        'hmrm_contact_color'        => isset($_POST['hmrm_contact_color']) ? sanitize_text_field($_POST['hmrm_contact_color']) : '#333333',
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
                            <label for="hmrm_bg_color"><?php esc_html_e('Background Color', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input class="wsp-wp-color" type="text" name="hmrm_bg_color" id="hmrm_bg_color"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_bg_color']); ?>">
                            <div id="colorpicker"></div>
                        </td>
                        <th scope="row">
                            <label for="hmrm_border_color"><?php esc_html_e('Border Color', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input class="wsp-wp-color" type="text" name="hmrm_border_color" id="hmrm_border_color"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_border_color']); ?>">
                            <div id="colorpicker"></div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <hr><b><?php esc_html_e('Personal Info', HMRM_TXT_DOMAIN); ?></b><hr>
                        </th>
                    </tr>
                    <tr class="hmrm_name_color">
                        <th scope="row">
                            <label for="hmrm_name_color"><?php esc_html_e('Name Color', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input class="wsp-wp-color" type="text" name="hmrm_name_color" id="hmrm_name_color"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_name_color']); ?>">
                            <div id="colorpicker"></div>
                        </td>
                        <th scope="row">
                            <label for="hmrm_name_font_size"><?php esc_html_e('Font Size', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="number" class="small-text" min="12" max="100" name="hmrm_name_font_size" id="hmrm_name_font_size" value="<?php esc_attr_e( $hmrmStyleSettings['hmrm_name_font_size'] ); ?>">
                            <code>px</code>
                        </td>
                    </tr>
                    <tr class="hmrm_title_color">
                        <th scope="row">
                            <label for="hmrm_title_color"><?php esc_html_e('Title Color', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input class="wsp-wp-color" type="text" name="hmrm_title_color" id="hmrm_title_color"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_title_color']); ?>">
                            <div id="colorpicker"></div>
                        </td>
                        <th scope="row">
                            <label for="hmrm_title_font_size"><?php esc_html_e('Font Size', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="number" class="small-text" min="12" max="100" name="hmrm_title_font_size" id="hmrm_title_font_size" value="<?php esc_attr_e( $hmrmStyleSettings['hmrm_title_font_size'] ); ?>">
                            <code>px</code>
                        </td>
                    </tr>
                    <tr class="hmrm_carrer_summary_color">
                        <th scope="row">
                            <label for="hmrm_carrer_summary_color"><?php esc_html_e('Career Summary Color', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input class="wsp-wp-color" type="text" name="hmrm_carrer_summary_color" id="hmrm_carrer_summary_color"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_carrer_summary_color']); ?>">
                            <div id="colorpicker"></div>
                        </td>
                        <th scope="row">
                            <label for="hmrm_carrer_summary_font_size"><?php esc_html_e('Font Size', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="number" class="small-text" min="11" max="100" name="hmrm_carrer_summary_font_size" id="hmrm_carrer_summary_font_size" value="<?php esc_attr_e( $hmrmStyleSettings['hmrm_carrer_summary_font_size'] ); ?>">
                            <code>px</code>
                        </td>
                    </tr>
                    <tr class="hmrm_contact_color">
                        <th scope="row">
                            <label for="hmrm_contact_color"><?php esc_html_e('Contact Color', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input class="wsp-wp-color" type="text" name="hmrm_contact_color" id="hmrm_contact_color"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_contact_color']); ?>">
                            <div id="colorpicker"></div>
                        </td>
                    </tr>
                    <tr class="hmrm_skill_label_text">
                        <th scope="row">
                            <label
                                for="hmrm_skill_label_text"><?php esc_html_e('Skills Label Text', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td colspan="3">
                            <input type="text" name="hmrm_skill_label_text" placeholder="Skills" class="regular-text"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_skill_label_text']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_edu_label_text">
                        <th scope="row">
                            <label
                                for="hmrm_edu_label_text"><?php esc_html_e('Education Label Text', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td colspan="3">
                            <input type="text" name="hmrm_edu_label_text" placeholder="Education" class="regular-text"
                                value="<?php echo esc_attr($hmrmStyleSettings['hmrm_edu_label_text']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_exp_label_text">
                        <th scope="row">
                            <label
                                for="hmrm_exp_label_text"><?php esc_html_e('Experience Label Text', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td colspan="3">
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