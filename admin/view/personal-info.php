<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $hmrmPersonalInfoSettings );
foreach ( $hmrmPersonalInfoSettings as $option_name => $option_value ) {
    if ( isset( $hmrmPersonalInfoSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<div id="hmcs-wrap-all" class="wrap hmcs-settings-wrap">
    
    <div class="hmcs-header-bar">
        <div class="hmcs-header-left">
            <h2 class="hmcs-header-title"><i class="fa fa-user-secret" aria-hidden="true"></i>&nbsp;<?php _e('Personal Info Settings', 'hm-resume-manager'); ?></h2>
        </div>
    </div>

    <?php 
    if ( $hmrmAdminNotification ) {

        $this->hmrm_display_notification('success', __('Your information updated successfully', 'hm-resume-manager') );
    }
    ?>

    <div class="hmrm-wrap">

        <div class="hmrm_personal_wrap hmrm_personal_help" style="width: 75%; float: left;">

            <form name="hmrm_general_settings_form" role="form" class="form-horizontal" method="post" action="" id="hmrm-general-settings-form">
                <?php wp_nonce_field( 'hmrm_personal_info_action_filed', 'hmrm_personal_info_nonce_field' ); ?>
                <table class="form-table">
                    <tr class="hmrm_author_name">
                        <th scope="row">
                            <label for="hmrm_author_name"><?php esc_html_e('Name', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="hmrm_author_name" placeholder="Name" class="regular-text"
                                value="<?php esc_attr_e( $hmrm_author_name ); ?>">
                        </td>
                    </tr>

                    <tr class="hmrm_author_title">
                        <th scope="row">
                            <label for="hmrm_author_title"><?php esc_html_e('Title', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="hmrm_author_title" placeholder="Title" class="regular-text"
                                value="<?php esc_attr_e( $hmrm_author_title ); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_author_email">
                        <th scope="row">
                            <label for="hmrm_author_email"><?php esc_html_e('Email', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_author_email" type="text" placeholder="Email" class="regular-text"
                                value="<?php esc_attr_e( $hmrm_author_email ); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_author_website">
                        <th scope="row">
                            <label for="hmrm_author_website"><?php esc_html_e('Website', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_author_website" type="text" placeholder="Website" class="regular-text"
                                value="<?php echo esc_url( $hmrm_author_website ); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_current_address">
                        <th scope="row">
                            <label for="hmrm_current_address"><?php esc_html_e('Address', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_current_address" type="text" placeholder="Address" class="large-text"
                                value="<?php esc_attr_e( $hmrm_current_address ); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_contact_number">
                        <th scope="row">
                            <label for="hmrm_contact_number"><?php esc_html_e('Contact No.', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_contact_number" type="text" placeholder="Contact No." class="regular-text"
                                value="<?php esc_attr_e( $hmrm_contact_number ); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_twitter">
                        <th scope="row">
                            <label for="hmrm_twitter"><?php esc_html_e('Twitter', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_twitter" type="text" placeholder="Twitter" class="regular-text"
                                value="<?php esc_attr_e( $hmrm_twitter ); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_facebook">
                        <th scope="row">
                            <label for="hmrm_facebook"><?php esc_html_e('Facebook', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input name="hmrm_facebook" type="text" placeholder="Facebook" class="regular-text"
                                value="<?php echo esc_url( $hmrm_facebook ); ?>">
                        </td>
                    </tr>
                    <tr class="hmrm_biographical_info">
                        <th scope="row">
                            <label for="hmrm_biographical_info"><?php esc_html_e('Career Summary', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <div style="width:700px;">
                                <?php
                                $hmrmBiographicalInfoSettings   = array('media_buttons' => false, 'textarea_rows' => '10');
                                $hmrmBiographicalInfoContent    = wp_kses_post( $hmrm_biographical_info );
                                $hmrmBiographicalInfoId         = 'hmrm_biographical_info';
                                wp_editor( $hmrmBiographicalInfoContent, $hmrmBiographicalInfoId, $hmrmBiographicalInfoSettings );
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr class="hmrm_photograph">
                        <th scope="row">
                            <label for="hmrm_photograph"><?php esc_html_e('Photograph', 'hm-resume-manager'); ?></label>
                        </th>
                        <td>
                            <input type="hidden" name="hmrm_photograph" id="hmrm_photograph" value="<?php esc_attr_e( $hmrm_photograph ); ?>" class="regular-text" />
                            <input type='button' class="button-primary" value="<?php esc_attr_e('Select Photograph'); ?>" id="hmrm-media-manager" />
                            <br><br>
                            <?php
                            $hmrmImage = '';

                            if ( intval( $hmrm_photograph ) > 0 ) {
                                $hmrmImage = wp_get_attachment_image( $hmrm_photograph, 'thumbnail', false, array('id' => 'hmrm-preview-image' ) );
                            }
                            ?>
                            <div id="hmrm-preview-image"><?php echo $hmrmImage; ?></div>
                        </td>
                    </tr>
                </table>
                <hr>
                <p class="submit">
                    <button id="updatePersonalInfoSettings" name="updatePersonalInfoSettings" class="hmcs-btn"><?php esc_html_e('Update Settings', 'hm-resume-manager'); ?></button>
                </p>
            </form>
            
        </div>

        <?php include_once('partial/admin-sidebar.php'); ?> 

    </div>
</div>