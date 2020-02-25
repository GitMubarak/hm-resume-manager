<?php
$hmrmShowSkillsMessage = false;
//delete_option('hmrm_skills_settings');

if (isset($_POST['updateSettings'])) {
    if (!isset($_POST['hmrm_update_skills_setting'])) die("Something wrong!");
    if (!wp_verify_nonce($_POST['hmrm_update_skills_setting'], 'hmrm-update-skills-setting')) die("Something wrong!");
    for ($i = 0; $i < count($_POST['hmrm_skill_name']); $i++) {
        $hmrmSkillArr[$i] = array(
            'hmrm_skill_name'   => sanitize_text_field($_POST['hmrm_skill_name'][$i]) ? sanitize_text_field($_POST['hmrm_skill_name'][$i]) : 'Sample Skill',
            'hmrm_skill_percentage'   => sanitize_text_field($_POST['hmrm_skill_percentage'][$i]) ? sanitize_text_field($_POST['hmrm_skill_percentage'][$i]) : '100',
            'hmrm_skill_bg_color'   => sanitize_text_field($_POST['hmrm_skill_bg_color'][$i]) ? sanitize_text_field($_POST['hmrm_skill_bg_color'][$i]) : '#009900',
        );
    }
    $hmrmShowSkillsMessage = update_option('hmrm_skills_settings', $hmrmSkillArr);
}
$hmrmSkillsSettings = get_option('hmrm_skills_settings');
//echo '<pre>';
//print_r($hmrmSkillsSettings);
?>
<div id="hmcs-wrap-all" class="wrap hmcs-settings-wrap">
    <?php if ($hmrmShowSkillsMessage) : $this->hmrm_display_notification('success', 'Your information updated successfully.');
    endif;
    ?>
    <div class="hmcs-header-bar">
        <div class="hmcs-header-left">
            <div class="hmcs-header-bar-logo">
                <img src="<?php echo esc_attr(HMRM_ASSETS . 'img/tools.png'); ?>" alt="hm-resume-manager">
            </div>
            <h3 class="hmcs-header-title"><?php esc_html_e('Skills Settings', HMRM_TXT_DOMAIN);
                                            ?></h3>
        </div>
        <div class="hmcs-header-right"></div>
    </div>

    <form name="wpre-table" role="form" class="form-horizontal" method="post" action="" id="hmrm-settings-form">
        <input type="hidden" name="hmrm_update_skills_setting"
            value="<?php printf('%s', wp_create_nonce('hmrm-update-skills-setting')); ?>" />
        <table class="hmrm-skills-table">
            <tr>
                <td colspan="2">
                    <table class="hmrm-form-table" width="100%" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Skill Name</th>
                                <th>Percentage</th>
                                <th>Skill Color</th>
                                <th><input type="button" class="button button-primary" id="hmrm-skills-add"
                                        value="Add New">
                                </th>
                            <tr>
                        </thead>
                        <tbody class="hmrm-add-skill-row-tbody">
                            <?php
                            if ($hmrmSkillsSettings) {
                                for ($i = 0; $i < count($hmrmSkillsSettings); $i++) {
                            ?>
                            <tr class="hmrm-add-skill-row">
                                <td style="vertical-align: middle;"><?php printf('%d', $i + 1); ?></td>
                                <td class="hmrm_skill_name" style="vertical-align: middle;">
                                    <input type="text" name="hmrm_skill_name[]" class="hmrm_skill_name"
                                        placeholder="PHP"
                                        value="<?php echo esc_attr($hmrmSkillsSettings[$i]['hmrm_skill_name']); ?>">
                                </td>
                                <td class="hmrm_skill_percentage" style="vertical-align: middle;">
                                    <input type="text" name="hmrm_skill_percentage[]" class="hmrm_skill_percentage"
                                        placeholder="85"
                                        value="<?php echo esc_attr($hmrmSkillsSettings[$i]['hmrm_skill_percentage']); ?>">
                                </td>
                                <td class="hmrm_skill_bg_color" style="vertical-align: middle;">
                                    <input class="hmrm-wp-color" type="text" name="hmrm_skill_bg_color[]"
                                        id="hmrm_skill_bg_color_<?php printf('%d', $i); ?>"
                                        value="<?php echo esc_attr($hmrmSkillsSettings[$i]['hmrm_skill_bg_color']); ?>">
                                    <div id="colorpicker"></div>
                                </td>
                                <td style="vertical-align: middle;"><a href="#"
                                        class="dashicons dashicons-no hmrm-skills-delete">&nbsp;</a></td>
                            <tr>
                                <?php
                                }
                            } else { ?>
                            <tr class="hmrm-add-skill-row">
                                <td style="vertical-align: middle;">1</td>
                                <td class="hmrm_skill_name" style="vertical-align: middle;">
                                    <input type="text" name="hmrm_skill_name[]" class="hmrm_skill_name"
                                        placeholder="PHP">
                                </td style="vertical-align: middle;">
                                <td class="hmrm_skill_percentage" style="vertical-align: top;">
                                    <input type="text" name="hmrm_skill_percentage[]" class="hmrm_skill_percentage"
                                        placeholder="85">
                                </td>
                                <td class="hmrm_skill_bg_color" style="vertical-align: middle;">
                                    <input class="hmrm-wp-color" type="text" name="hmrm_skill_bg_color[]"
                                        id="hmrm_skill_bg_color_0">
                                    <div id="colorpicker"></div>
                                </td>
                                <td style="vertical-align: middle;"></td>
                            <tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
        <p class="submit"><button id="updateSettings" name="updateSettings"
                class="hmcs-btn"><?php esc_html_e('Update Skills', HMRM_TXT_DOMAIN); ?></button></p>
    </form>
</div>