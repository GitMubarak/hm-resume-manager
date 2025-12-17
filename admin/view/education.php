<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hmrmAdminNotification = false;

if ( isset( $_POST['updateSettings'] ) ) {

     if (!isset($_POST['hmrm_update_setting'])) die("Something wrong!");
     if (!wp_verify_nonce($_POST['hmrm_update_setting'],'hmrm-update-setting')) die("Something wrong!");
     
     for ( $i=0; $i < count( $_POST['hmrm_edu_school'] ); $i++ ) {

        $hmrmEduInfoArr[$i] = array(
            'hmrm_edu_school'       => (!empty($_POST['hmrm_edu_school'][$i]) && (sanitize_text_field($_POST['hmrm_edu_school'][$i])!='')) ? sanitize_text_field($_POST['hmrm_edu_school'][$i]) : '',
            'hmrm_edu_degree'       => (!empty($_POST['hmrm_edu_degree'][$i]) && (sanitize_text_field($_POST['hmrm_edu_degree'][$i])!='')) ? sanitize_text_field($_POST['hmrm_edu_degree'][$i]) : '',
            'hmrm_edu_subject'      => (!empty($_POST['hmrm_edu_subject'][$i]) && (sanitize_text_field($_POST['hmrm_edu_subject'][$i])!='')) ? sanitize_text_field($_POST['hmrm_edu_subject'][$i]) : '',
            'hmrm_edu_start_year'   => (!empty($_POST['hmrm_edu_start_year'][$i]) && (sanitize_text_field($_POST['hmrm_edu_start_year'][$i])!='')) ? sanitize_text_field($_POST['hmrm_edu_start_year'][$i]) : '',
            'hmrm_edu_end_year'     => (!empty($_POST['hmrm_edu_end_year'][$i]) && (sanitize_text_field($_POST['hmrm_edu_end_year'][$i])!='')) ? sanitize_text_field($_POST['hmrm_edu_end_year'][$i]) : '',
            'hmrm_edu_grade'        => (!empty($_POST['hmrm_edu_grade'][$i]) && (sanitize_text_field($_POST['hmrm_edu_grade'][$i])!='')) ? sanitize_text_field($_POST['hmrm_edu_grade'][$i]) : ''
        );
     }
     $hmrmAdminNotification = update_option('hmrm_edu_info_settings', $hmrmEduInfoArr);
}

$hmrm_edu_info_settings = get_option('hmrm_edu_info_settings');
?>
<div id="hmrm-wrap-all" class="wrap">
    
    <div class="hmcs-header-bar">
        <div class="hmcs-header-left">
            <h3 class="hmcs-header-title"><i class="fa fa-university" aria-hidden="true"></i>&nbsp;<?php _e('Education Info Settings', 'hm-resume-manager'); ?></h3>
        </div>
    </div>
    
    <?php 
    if ( $hmrmAdminNotification ) {

        $this->hmrm_display_notification('success', __('Your information updated successfully', 'hm-resume-manager') );
    }
    ?>

    <form name="wpre-table" role="form" class="form-horizontal" method="post" action="" id="hmrm-settings-form">
        <?php wp_nonce_field( 'hmrm_skills_action_filed', 'hmrm_skills_nonce_field' ); ?>
        <table class="hmrm-form-table">
        <tr>
            <td colspan="2">
                <table class="hmrm-education-info-table table" width="100%" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php esc_html_e('School', 'hm-resume-manager'); ?></th>
                                <th><?php esc_html_e('Degree', 'hm-resume-manager'); ?></th>
                                <th><?php esc_html_e('Field of study', 'hm-resume-manager'); ?></th>
                                <th><?php esc_html_e('Start Year', 'hm-resume-manager'); ?></th>
                                <th><?php esc_html_e('End Year', 'hm-resume-manager'); ?></th>
                                <th><?php esc_html_e('Grade', 'hm-resume-manager'); ?></th>
                                <th><input type="button" class="button button-primary add" value="Add New"></th>
                            <tr>
                        </thead>
                        <tbody class="hmrm-add-row-tbody">
                            <?php
                            $i=0;

                            if ( $hmrm_edu_info_settings ) {

                                for( $i = 0; $i < count( $hmrm_edu_info_settings ); $i++ ) {
                                    ?>
                                    <tr class="hmrm-add-row-tr">
                                        <td><?php printf('%d', $i+1); ?></td>
                                        <td class="hmrm_edu_school">
                                            <input type="text" name="hmrm_edu_school[]" class="hmrm_edu_school regular-text" placeholder="Ex: Boston University" value="<?php echo esc_attr($hmrm_edu_info_settings[$i]['hmrm_edu_school']); ?>">
                                        </td>
                                        <td class="hmrm_edu_degree">
                                            <input type="text" name="hmrm_edu_degree[]" class="hmrm_edu_degree regular-text" placeholder="Ex: Bachelor" value="<?php echo esc_attr($hmrm_edu_info_settings[$i]['hmrm_edu_degree']); ?>">
                                        </td>
                                        <td class="hmrm_edu_subject">
                                            <input type="text" name="hmrm_edu_subject[]" class="hmrm_edu_subject regular-text" placeholder="Ex: Business" value="<?php echo esc_attr($hmrm_edu_info_settings[$i]['hmrm_edu_subject']); ?>">
                                        </td>
                                        <td class="hmrm_edu_start_year">
                                            <select name="hmrm_edu_start_year[]" class="hmrm_edu_start_year">
                                                <option value="">Year</option>
                                                <?php 
                                                for( $sy = date('Y'); $sy >= 1950; $sy-- ) {
                                                    ?>
                                                    <option value="<?php printf('%d', $sy); ?>" <?php if($sy == $hmrm_edu_info_settings[$i]['hmrm_edu_start_year']) echo 'selected'; ?> ><?php printf('%d', $sy); ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="hmrm_edu_end_year">
                                            <select name="hmrm_edu_end_year[]" class="hmrm_edu_end_year">
                                                <option value=""><?php esc_html_e('Year', 'hm-resume-manager'); ?></option>
                                                <?php 
                                                for( $ey = ( date('Y') + 10 ); $ey >= 1950; $ey-- ) {
                                                    ?>
                                                    <option value="<?php printf('%d', $ey); ?>" <?php if($ey == $hmrm_edu_info_settings[$i]['hmrm_edu_end_year']) echo 'selected'; ?> ><?php printf('%d', $ey); ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="hmrm_edu_grade">
                                            <input type="text" name="hmrm_edu_grade[]" class="hmrm_edu_grade" value="<?php echo esc_attr($hmrm_edu_info_settings[$i]['hmrm_edu_grade']); ?>">
                                        </td>
                                        <td style="vertical-align: top;"><a href="#" class="dashicons dashicons-no delete">&nbsp;</a></td>
                                    <tr>
                                    <?php
                                }
                            } else{ ?>
                                    <tr class="hmrm-add-row-tr">
                                        <td><?php printf('%d', $i+1); ?></td>
                                        <td class="hmrm_edu_school">
                                            <input type="text" name="hmrm_edu_school[]" class="hmrm_edu_school regular-text" placeholder="Ex: Boston University">
                                        </td>
                                        <td class="hmrm_edu_degree">
                                            <input type="text" name="hmrm_edu_degree[]" class="hmrm_edu_degree regular-text" placeholder="Ex: Bachelor">
                                        </td>
                                        <td class="hmrm_edu_subject">
                                            <input type="text" name="hmrm_edu_subject[]" class="hmrm_edu_subject regular-text" placeholder="Ex: Business">
                                        </td>
                                        <td class="hmrm_edu_start_year">
                                            <select name="hmrm_edu_start_year[]" class="hmrm_edu_start_year">
                                                <option value="">Year</option>
                                                <?php for($sy=date('Y'); $sy>=1900; $sy--): ?>
                                                <option value="<?php printf('%d', $sy); ?>"><?php printf('%d', $sy); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </td>
                                        <td class="hmrm_edu_end_year">
                                            <select name="hmrm_edu_end_year[]" class="hmrm_edu_end_year">
                                                <option value="">Year</option>
                                                <?php for($ey=(date('Y')+7); $ey>=1900; $ey--): ?>
                                                <option value="<?php printf('%d', $ey); ?>"><?php printf('%d', $ey); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </td>
                                        <td class="hmrm_edu_grade">
                                            <input type="text" name="hmrm_edu_grade[]" class="hmrm_edu_grade">
                                        </td>
                                        <td style="vertical-align: top;"></td>
                                    <tr>
                            <?php } ?>
                        </tbody>
                </table>
            </td>
        </tr>
        </table>
        <p class="submit">
            <button id="updateSettings" name="updateSettings" class="button button-primary"><?php esc_html_e('Update Settings', 'hm-resume-manager'); ?></button>
        </p>
    </form>
</div>