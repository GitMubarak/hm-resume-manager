<?php
$hmrmStyleShowMessage = false;

if (isset($_POST['updateStyleSettings'])) {
    $hmrmStyleSettings = array(
        'hmrm_bg_color'          => sanitize_text_field($_POST['hmrm_bg_color']) ? sanitize_text_field($_POST['hmrm_bg_color']) : '#FFFAF0',
        'hmrm_border_color'          => sanitize_text_field($_POST['hmrm_border_color']) ? sanitize_text_field($_POST['hmrm_border_color']) : '#FF6633',
        'hmrm_skill_label_text'          => sanitize_text_field($_POST['hmrm_skill_label_text']) ? sanitize_text_field($_POST['hmrm_skill_label_text']) : 'Skills',
        'hmrm_edu_label_text'          => sanitize_text_field($_POST['hmrm_edu_label_text']) ? sanitize_text_field($_POST['hmrm_edu_label_text']) : 'Education',
        'hmrm_exp_label_text'          => sanitize_text_field($_POST['hmrm_exp_label_text']) ? sanitize_text_field($_POST['hmrm_exp_label_text']) : 'Experience',
        /*'hmrm_author_title'         => (!empty($_POST['hmrm_author_title']) && (sanitize_text_field($_POST['hmrm_author_title']) != '')) ? sanitize_text_field($_POST['hmrm_author_title']) : '',
        'hmrm_author_email'         => (!empty($_POST['hmrm_author_email']) && (sanitize_text_field($_POST['hmrm_author_email']) != '')) ? sanitize_text_field($_POST['hmrm_author_email']) : $hmrmCurrentUser->user_email,
        'hmrm_author_website'       => (!empty($_POST['hmrm_author_website']) && (sanitize_text_field($_POST['hmrm_author_website']) != '')) ? sanitize_text_field($_POST['hmrm_author_website']) : $hmrmCurrentUser->user_url,
        'hmrm_current_address'      => (!empty($_POST['hmrm_current_address']) && (sanitize_text_field($_POST['hmrm_current_address']) != '')) ? sanitize_text_field($_POST['hmrm_current_address']) : '',
        'hmrm_contact_number'       => (!empty($_POST['hmrm_contact_number']) && (sanitize_text_field($_POST['hmrm_contact_number']) != '')) ? sanitize_text_field($_POST['hmrm_contact_number']) : '',
        'hmrm_biographical_info'    => !empty($_POST['hmrm_biographical_info']) ? wp_kses_post($_POST['hmrm_biographical_info']) : '',
        'hmrm_photograph'           => (sanitize_file_name($_POST['hmrm_photograph']) != '') ? sanitize_file_name($_POST['hmrm_photograph']) : '',
        'hmrm_twitter'              => (!empty($_POST['hmrm_twitter']) && (sanitize_text_field($_POST['hmrm_twitter']) != '')) ? sanitize_text_field($_POST['hmrm_twitter']) : '',
        'hmrm_facebook'             => (!empty($_POST['hmrm_facebook']) && (sanitize_text_field($_POST['hmrm_facebook']) != '')) ? sanitize_text_field($_POST['hmrm_facebook']) : '',
        'hmrm_skills'               => !empty($_POST['hmrm_skills']) ? wp_kses_post($_POST['hmrm_skills']) : '',*/
    );
    $hmrmStyleShowMessage = update_option('hmrm_style_settings', serialize($hmrmStyleSettings));
}
$hmrmStyleSettings = stripslashes_deep(unserialize(get_option('hmrm_style_settings')));

//echo '<pre>';
//print_r($hmrmStyleSettings);
?>
<div id="hmcs-wrap-all" class="wrap hmcs-settings-wrap">
    <div class="hmcs-header-bar">
        <div class="hmcs-header-left">
            <div class="hmcs-header-bar-logo">
                <img src="<?php echo esc_attr(HMRM_ASSETS . 'img/tools.png'); ?>" alt="hm-resume-manager">
            </div>
            <h3 class="hmcs-header-title"><?php esc_html_e('Style Settings', HMRM_TXT_DOMAIN);
                                            ?></h3>
        </div>
        <div class="hmcs-header-right"></div>
    </div>
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
        <p class="submit"><button id="updateStyleSettings" name="updateStyleSettings"
                class="hmcs-btn"><?php esc_html_e('Update Styles', HMRM_TXT_DOMAIN); ?></button></p>
    </form>
</div>