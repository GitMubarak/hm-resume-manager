<?php
$hmrmCurrentUser = wp_get_current_user();

$hmrmShowGeneralMessage = false;

if (isset($_POST['updateGeneralSettings'])) {
    $hmrmGeneralSettingsInfo = array(
        'hmrm_author_name'          => (!empty($_POST['hmrm_author_name']) && (sanitize_text_field($_POST['hmrm_author_name']) != '')) ? sanitize_text_field($_POST['hmrm_author_name']) : $hmrmCurrentUser->display_name,
        'hmrm_author_title'         => (!empty($_POST['hmrm_author_title']) && (sanitize_text_field($_POST['hmrm_author_title']) != '')) ? sanitize_text_field($_POST['hmrm_author_title']) : '',
        'hmrm_author_email'         => (!empty($_POST['hmrm_author_email']) && (sanitize_text_field($_POST['hmrm_author_email']) != '')) ? sanitize_text_field($_POST['hmrm_author_email']) : $hmrmCurrentUser->user_email,
        'hmrm_author_website'       => (!empty($_POST['hmrm_author_website']) && (sanitize_text_field($_POST['hmrm_author_website']) != '')) ? sanitize_text_field($_POST['hmrm_author_website']) : $hmrmCurrentUser->user_url,
        'hmrm_current_address'      => (!empty($_POST['hmrm_current_address']) && (sanitize_text_field($_POST['hmrm_current_address']) != '')) ? sanitize_text_field($_POST['hmrm_current_address']) : '',
        'hmrm_contact_number'       => (!empty($_POST['hmrm_contact_number']) && (sanitize_text_field($_POST['hmrm_contact_number']) != '')) ? sanitize_text_field($_POST['hmrm_contact_number']) : '',
        'hmrm_biographical_info'    => !empty($_POST['hmrm_biographical_info']) ? wp_kses_post($_POST['hmrm_biographical_info']) : '',
        'hmrm_photograph'           => (sanitize_file_name($_POST['hmrm_photograph']) != '') ? sanitize_file_name($_POST['hmrm_photograph']) : '',
        'hmrm_twitter'              => (!empty($_POST['hmrm_twitter']) && (sanitize_text_field($_POST['hmrm_twitter']) != '')) ? sanitize_text_field($_POST['hmrm_twitter']) : '',
        'hmrm_facebook'             => (!empty($_POST['hmrm_facebook']) && (sanitize_text_field($_POST['hmrm_facebook']) != '')) ? sanitize_text_field($_POST['hmrm_facebook']) : '',
        //'hmrm_skills'               => !empty($_POST['hmrm_skills']) ? wp_kses_post($_POST['hmrm_skills']) : '',
    );
    $hmrmShowGeneralMessage = update_option('hmrm_general_settings', serialize($hmrmGeneralSettingsInfo));
}
$hmrmGeneralSettings = stripslashes_deep(unserialize(get_option('hmrm_general_settings')));
//echo "<pre>";
//print_r($hmrmGeneralSettings);
?>
<div id="hmcs-wrap-all" class="wrap hmcs-settings-wrap">
    
    <div class="hmcs-header-bar">
        <div class="hmcs-header-left">
            <h3 class="hmcs-header-title"><i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp;<?php _e('Personal Info Settings', HMRM_TXT_DOMAIN); ?></h3>
        </div>
    </div>

    <?php 
    if ( $hmrmShowGeneralMessage ) {
        $this->hmrm_display_notification('success', __('Your information updated successfully', HMRM_TXT_DOMAIN) );
    }
    ?>

    <div class="hmrm-wrap">

        <div class="hmrm_personal_wrap hmrm_personal_help" style="width: 75%; float: left;">

            <form name="hmrm_general_settings_form" role="form" class="form-horizontal" method="post" action=""
                id="hmrm-general-settings-form">
                <table class="form-table">
                    <tr class="hmrm_author_name">
                        <th scope="row">
                            <label for="hmrm_author_name"><?php esc_html_e('Name:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="text" name="hmrm_author_name" placeholder="Name" class="regular-text"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_author_name']); ?>">
                            <br>
                            <code><i><?php esc_html_e('Keep null to display profile Display Name', HMRM_TXT_DOMAIN); ?></i></code>
                        </td>
                    </tr>

                    <tr class="hmrm_author_title">
                        <th scope="row">
                            <label for="hmrm_author_title"><?php echo esc_attr('Title:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="text" name="hmrm_author_title" placeholder="Title" class="regular-text"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_author_title']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_author_email">
                        <th scope="row">
                            <label for="hmrm_author_email"><?php esc_html_e('Email:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_author_email" type="text" placeholder="Email" class="regular-text"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_author_email']); ?>">
                            <br>
                            <code><i><?php esc_html_e('Keep null to display profile Email', HMRM_TXT_DOMAIN); ?></i></code>
                        </td>
                    </tr>
                    <tr class="hmrm_author_website">
                        <th scope="row">
                            <label for="hmrm_author_website"><?php esc_html_e('Website:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_author_website" type="text" placeholder="Website" class="regular-text"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_author_website']); ?>">
                            <br>
                            <code><i><?php esc_html_e('Keep null to display profile Website', HMRM_TXT_DOMAIN); ?></i></code>
                        </td>
                    </tr>
                    <tr class="hmrm_current_address">
                        <th scope="row">
                            <label for="hmrm_current_address"><?php esc_html_e('Address:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_current_address" type="text" placeholder="Address" class="regular-text"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_current_address']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_contact_number">
                        <th scope="row">
                            <label for="hmrm_contact_number"><?php esc_html_e('Contact No.:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_contact_number" type="text" placeholder="Contact No." class="regular-text"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_contact_number']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_twitter">
                        <th scope="row">
                            <label for="hmrm_twitter"><?php esc_html_e('Twitter:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_twitter" type="text" placeholder="Twitter" class="regular-text"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_twitter']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_facebook">
                        <th scope="row">
                            <label for="hmrm_facebook"><?php esc_html_e('Facebook:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_facebook" type="text" placeholder="Facebook" class="regular-text"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_facebook']); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_biographical_info">
                        <th scope="row">
                            <label for="hmrm_biographical_info"><?php esc_html_e('Career Summary:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <div style="width:700px;">
                                <?php
                                $hmrmBiographicalInfoSettings   = array('media_buttons' => false, 'textarea_rows' => '10');
                                $hmrmBiographicalInfoContent    = wp_kses_post($hmrmGeneralSettings['hmrm_biographical_info']);
                                $hmrmBiographicalInfoId         = 'hmrm_biographical_info';
                                wp_editor($hmrmBiographicalInfoContent, $hmrmBiographicalInfoId, $hmrmBiographicalInfoSettings);
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr class="hmrm_photograph">
                        <th scope="row">
                            <label for="hmrm_photograph"><?php esc_html_e('Photgraph:', HMRM_TXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <input type="hidden" name="hmrm_photograph" id="hmrm_photograph"
                                value="<?php echo esc_attr($hmrmGeneralSettings['hmrm_photograph']); ?>" class="regular-text" />
                            <input type='button' class="button-primary" value="<?php echo esc_attr('Select Photograph'); ?>"
                                id="hmrm-media-manager" />
                            <br><br>
                            <?php
                            $hmrmImageId = $hmrmGeneralSettings['hmrm_photograph'];
                            $hmrmImage = "";
                            if (intval($hmrmImageId) > 0) {
                                $hmrmImage = wp_get_attachment_image($hmrmImageId, 'thumbnail', false, array('id' => 'hmrm-preview-image'));
                            }
                            ?>
                            <div id="hmrm-preview-image"><?php echo $hmrmImage; ?></div>
                        </td>
                    </tr>
                </table>
                <hr>
                <p class="submit"><button id="updateGeneralSettings" name="updateGeneralSettings"
                        class="hmcs-btn"><?php esc_html_e('Update Settings', HMRM_TXT_DOMAIN); ?></button></p>
            </form>
            
        </div>

        <?php include_once('partial/admin-sidebar.php'); ?> 

    </div>
</div>