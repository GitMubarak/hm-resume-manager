<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hmrmAdminNotification = false;

if ( isset( $_POST['updateSkills'] ) ) {

    if ( ! isset( $_POST['hmrm_skills_nonce_field'] ) 
        || ! wp_verify_nonce( $_POST['hmrm_skills_nonce_field'], 'hmrm_skills_action_filed' ) ) {
        print 'Sorry, your nonce did not verify.';
        exit;
    } else {
        
        if ( isset( $_POST['hmrm_skill_name'] ) ) {

            for ( $i = 0; $i < count( $_POST['hmrm_skill_name'] ); $i++ ) {
            
                $hmrmSkillArr[$i] = array(
                    'hmrm_skill_name'   => sanitize_text_field($_POST['hmrm_skill_name'][$i]) ? sanitize_text_field($_POST['hmrm_skill_name'][$i]) : '',
                    'hmrm_skill_percentage'   => sanitize_text_field($_POST['hmrm_skill_percentage'][$i]) ? sanitize_text_field($_POST['hmrm_skill_percentage'][$i]) : null,
                    'hmrm_skill_bg_color'   => sanitize_text_field($_POST['hmrm_skill_bg_color'][$i]) ? sanitize_text_field($_POST['hmrm_skill_bg_color'][$i]) : '#009900',
                );
            }

            $hmrmAdminNotification = update_option('hmrm_skills_settings', $hmrmSkillArr);
        }
    }
}

$hmrmSkillsSettings = get_option('hmrm_skills_settings');
?>
<div id="hmcs-wrap-all" class="wrap hmcs-settings-wrap">
    
    <div class="hmcs-header-bar">
        <div class="hmcs-header-left">
            <h3 class="hmcs-header-title"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php _e('Skills Settings', 'hm-resume-manager'); ?></h3>
        </div>
    </div>

    <?php 
    if ( $hmrmAdminNotification ) {

        $this->hmrm_display_notification('success', __('Your information updated successfully', 'hm-resume-manager') );
    }
    ?>

    <div class="hmrm-wrap">

        <div class="hmrm_personal_wrap hmrm_personal_help" style="width: 75%; float: left;">

            <form name="wpre-table" role="form" class="form-horizontal" method="post" action="" id="hmrm-settings-form">
                <?php wp_nonce_field( 'hmrm_skills_action_filed', 'hmrm_skills_nonce_field' ); ?>
                <table class="hmrm-skills-table">
                    <tr>
                        <td colspan="2">
                            <table class="hmrm-form-table" width="100%" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php _e('Skill Name', 'hm-resume-manager'); ?></th>
                                        <th><?php _e('Percentage', 'hm-resume-manager'); ?></th>
                                        <th><?php _e('Percentage Color', 'hm-resume-manager'); ?></th>
                                        <th>
                                            <input type="button" class="button button-primary" id="hmrm-skills-add" value="Add New">
                                        </th>
                                    <tr>
                                </thead>
                                <tbody class="hmrm-add-skill-row-tbody">
                                    <?php
                                    if ( $hmrmSkillsSettings ) {

                                        for ( $j = 0; $j < count( $hmrmSkillsSettings ); $j++ ) {
                                            ?>
                                            <tr class="hmrm-add-skill-row">
                                                <td style="vertical-align: middle;"><?php printf('%d', $j + 1); ?></td>
                                                <td class="hmrm_skill_name" style="vertical-align: middle;">
                                                    <input type="text" name="hmrm_skill_name[]" class="hmrm_skill_name" value="<?php esc_attr_e( $hmrmSkillsSettings[$j]['hmrm_skill_name'] ); ?>" required>
                                                </td>
                                                <td class="hmrm_skill_percentage" style="vertical-align: middle;">
                                                    <input type="number" min="0" max="100" step="1" name="hmrm_skill_percentage[]" class="hmrm_skill_percentage" value="<?php esc_attr_e( $hmrmSkillsSettings[$j]['hmrm_skill_percentage'] ); ?>" required>
                                                </td>
                                                <td class="hmrm_skill_bg_color" style="vertical-align: middle;">
                                                    <input class="hmrm-wp-color" type="text" name="hmrm_skill_bg_color[]" id="hmrm_skill_bg_color_<?php printf('%d', $j); ?>"
                                                        value="<?php esc_attr_e( $hmrmSkillsSettings[$j]['hmrm_skill_bg_color'] ); ?>">
                                                    <div id="colorpicker"></div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <a href="#" class="dashicons dashicons-no hmrm-skills-delete">&nbsp;</a>
                                                </td>
                                            <tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr class="hmrm-add-skill-row">
                                            <td style="vertical-align: middle;">1</td>
                                            <td class="hmrm_skill_name" style="vertical-align: middle;">
                                                <input type="text" name="hmrm_skill_name[]" class="hmrm_skill_name" required>
                                            </td style="vertical-align: middle;">
                                            <td class="hmrm_skill_percentage" style="vertical-align: top;">
                                                <input type="number" min="0" max="100" step="1" name="hmrm_skill_percentage[]" class="hmrm_skill_percentage" required>
                                            </td>
                                            <td class="hmrm_skill_bg_color" style="vertical-align: middle;">
                                                <input class="hmrm-wp-color" type="text" name="hmrm_skill_bg_color[]" id="hmrm_skill_bg_color_1">
                                                <div id="colorpicker"></div>
                                            </td>
                                            <td style="vertical-align: middle;"></td>
                                        <tr>
                                        <?php 
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <button id="updateSkills" name="updateSkills" class="hmcs-btn"><?php esc_html_e('Update Skills', 'hm-resume-manager'); ?></button>
                </p>
            </form>
        
        </div>
        
        <?php include_once('partial/admin-sidebar.php'); ?> 

    </div>
</div>