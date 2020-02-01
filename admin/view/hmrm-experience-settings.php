<?php
$hmrmExpShowMessage = false;

if(isset($_POST['updateExpSettings'])){
     if (!isset($_POST['hmrm_update_exp_setting'])) die("Something wrong!");
     if (!wp_verify_nonce($_POST['hmrm_update_exp_setting'],'hmrm-update-exp-setting')) die("Something wrong!");
     for($i=0; $i<count($_POST['hmrm_exp_company']); $i++){
        $hmrmExpArr[$i] = array(
        'hmrm_exp_company'      => (!empty($_POST['hmrm_exp_company'][$i]) && (sanitize_text_field($_POST['hmrm_exp_company'][$i])!='')) ? sanitize_text_field($_POST['hmrm_exp_company'][$i]) : '',
        'hmrm_exp_job_title'    => (!empty($_POST['hmrm_exp_job_title'][$i]) && (sanitize_text_field($_POST['hmrm_exp_job_title'][$i])!='')) ? sanitize_text_field($_POST['hmrm_exp_job_title'][$i]) : '',
        'hmrm_exp_start_month'  => (!empty($_POST['hmrm_exp_start_month'][$i]) && (sanitize_text_field($_POST['hmrm_exp_start_month'][$i])!='')) ? sanitize_text_field($_POST['hmrm_exp_start_month'][$i]) : '',
        'hmrm_exp_start_year'   => (!empty($_POST['hmrm_exp_start_year'][$i]) && (sanitize_text_field($_POST['hmrm_exp_start_year'][$i])!='')) ? sanitize_text_field($_POST['hmrm_exp_start_year'][$i]) : '',
        'hmrm_exp_end_month'    => (!empty($_POST['hmrm_exp_end_month'][$i]) && (sanitize_text_field($_POST['hmrm_exp_end_month'][$i])!='')) ? sanitize_text_field($_POST['hmrm_exp_end_month'][$i]) : '',
        'hmrm_exp_end_year'     => (!empty($_POST['hmrm_exp_end_year'][$i]) && (sanitize_text_field($_POST['hmrm_exp_end_year'][$i])!='')) ? sanitize_text_field($_POST['hmrm_exp_end_year'][$i]) : '',
        'hmrm_exp_role'         => (!empty($_POST['hmrm_exp_role'][$i]) && (wp_kses_post($_POST['hmrm_exp_role'][$i])!='')) ? wp_kses_post($_POST['hmrm_exp_role'][$i]) : ''
        );
     }
     $hmrmExpShowMessage = update_option('hmrm_exp_settings', $hmrmExpArr);
}
$hmrmExpSettings = get_option('hmrm_exp_settings');
?>
<div id="hmrm-wrap-all" class="wrap">
     <div class="settings-banner">
          <h2><?php esc_html_e('Experience Settings', HMRM_TXT_DOMAIN); ?></h2>
     </div>
     <?php if($hmrmExpShowMessage): $this->hmrm_display_notification('success', 'Your information updated successfully.'); endif; ?>

     <form name="wpre-table" role="form" class="form-horizontal" method="post" action="" id="hmrm-settings-form">
          <input type="hidden" name="hmrm_update_exp_setting" value="<?php printf('%s', wp_create_nonce('hmrm-update-exp-setting')); ?>" />
          <table class="hmrm-form-table" border="1">
          <tr>
               <td colspan="2">
                    <table class="hmrm-education-info-table table" width="100%" cellpadding="0" cellspacing="0">
                         <thead>
                              <tr>
                                   <th>#</th>
                                   <th>Company</th>
                                   <th>Title</th>
                                   <th>Start From</th>
                                   <th>End To</th>
                                   <th>Role</th>
                                   <th><input type="button" class="button button-primary hmrm-exp-add" value="Add New"></th>
                              <tr>
                         </thead>
                         <tbody class="hmrm-exp-add-row-tbody">
                              <?php
                              $hmrm_months = $this->hmrm_months();
                              $i=0;
                              if($hmrmExpSettings) {
                                   for($i=0; $i<count($hmrmExpSettings); $i++){
                                        ?>
                                        <tr class="hmrm-exp-add-row-tr">
                                            <td style="vertical-align: top;"><?php printf('%d', $i+1); ?></td>
                                            <td class="hmrm_exp_company" style="vertical-align: top;">
                                                <input type="text" name="hmrm_exp_company[]" class="hmrm_exp_company regular-text" placeholder="Ex: Microsoft" value="<?php echo esc_attr($hmrmExpSettings[$i]['hmrm_exp_company']); ?>">
                                            </td>
                                            <td class="hmrm_exp_job_title" style="vertical-align: top;">
                                                <input type="text" name="hmrm_exp_job_title[]" class="hmrm_exp_job_title regular-text" placeholder="Ex: Senior Software Engineer" value="<?php echo esc_attr($hmrmExpSettings[$i]['hmrm_exp_job_title']); ?>">
                                            </td>
                                            <td class="hmrm_exp_start_month" style="vertical-align: top;">
                                                <select name="hmrm_exp_start_month[]" class="hmrm_exp_start_month">
                                                    <option value="">Month</option>
                                                    <?php
                                                    for($hmrmExpSMonthC=0; $hmrmExpSMonthC < count($hmrm_months); $hmrmExpSMonthC++): ?>
                                                        <option value="<?php echo esc_attr($hmrm_months[$hmrmExpSMonthC]); ?>" <?php if($hmrm_months[$hmrmExpSMonthC] == $hmrmExpSettings[$i]['hmrm_exp_start_month']) echo 'selected'; ?> ><?php echo esc_html($hmrm_months[$hmrmExpSMonthC]); ?></option>
                                                        <?php
                                                    endfor; ?>
                                                </select>
                                                <select name="hmrm_exp_start_year[]" class="hmrm_exp_start_year">
                                                    <option value="">Year</option>
                                                    <?php for($sy=date('Y'); $sy>=1900; $sy--): ?>
                                                    <option value="<?php printf('%d', $sy); ?>" <?php if($sy == $hmrmExpSettings[$i]['hmrm_exp_start_year']) echo 'selected'; ?> ><?php printf('%d', $sy); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </td>
                                            <td class="hmrm_exp_end_month" style="vertical-align: top;">
                                                <select name="hmrm_exp_end_month[]" class="hmrm_exp_end_month">
                                                    <option value="">Month</option>
                                                    <?php
                                                    for($hmrmExpEMonthC=0; $hmrmExpEMonthC < count($hmrm_months); $hmrmExpEMonthC++): ?>
                                                        <option value="<?php echo esc_attr($hmrm_months[$hmrmExpEMonthC]); ?>" <?php if($hmrm_months[$hmrmExpEMonthC] == $hmrmExpSettings[$i]['hmrm_exp_end_month']) echo 'selected'; ?> ><?php echo esc_html($hmrm_months[$hmrmExpEMonthC]); ?></option>
                                                        <?php
                                                    endfor; ?>
                                                </select>
                                                <select name="hmrm_exp_end_year[]" class="hmrm_exp_end_year">
                                                    <option value="">Year</option>
                                                    <?php for($ey=(date('Y')+7); $ey>=1900; $ey--): ?>
                                                    <option value="<?php printf('%d', $ey); ?>" <?php if($ey == $hmrmExpSettings[$i]['hmrm_exp_end_year']) echo 'selected'; ?> ><?php printf('%d', $ey); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </td>
                                            <td class="hmrm_exp_role" style="vertical-align: top;">
                                                <?php
                                                    $hmrm_exp_role = wp_kses_post($hmrmExpSettings[$i]['hmrm_exp_role']);
                                                ?>
                                                <textarea name="hmrm_exp_role[]" class="hmrm_exp_role" cols="50" rows="5"><?php echo $hmrm_exp_role; ?></textarea>
                                                <br>
                                                <code>Accepts HTML Tag</code>
                                            </td>
                                            <td style="vertical-align: top;"><a href="#" class="dashicons dashicons-no hmrm-exp-delete">&nbsp;</a></td>
                                        <tr>
                                        <?php
                                   }
                              } else{ ?>
                                        <tr class="hmrm-exp-add-row-tr">
                                            <td style="vertical-align: top;"><?php printf('%d', $i+1); ?></td>
                                            <td class="hmrm_edu_school" style="vertical-align: top;">
                                                <input type="text" name="hmrm_exp_company[]" class="hmrm_exp_company regular-text" placeholder="Ex: Microsoft">
                                            </td>
                                            <td class="hmrm_edu_degree" style="vertical-align: top;">
                                                <input type="text" name="hmrm_exp_job_title[]" class="hmrm_exp_job_title regular-text" placeholder="Ex: Senior Software Engineer">
                                            </td>
                                            <td class="hmrm_exp_start_month" style="vertical-align: top;">
                                                <select name="hmrm_exp_start_month[]" class="hmrm_exp_start_month">
                                                    <option value="">Month</option>
                                                    <?php
                                                    for($hmrmExpSMonthC=0; $hmrmExpSMonthC < count($hmrm_months); $hmrmExpSMonthC++): ?>
                                                        <option value="<?php echo esc_attr($hmrm_months[$hmrmExpSMonthC]); ?>"><?php echo esc_html($hmrm_months[$hmrmExpSMonthC]); ?></option>
                                                        <?php
                                                    endfor; ?>
                                                </select>
                                                <select name="hmrm_edu_start_year[]" class="hmrm_edu_start_year">
                                                    <option value="">Year</option>
                                                    <?php for($sy=date('Y'); $sy>=1900; $sy--): ?>
                                                    <option value="<?php printf('%d', $sy); ?>"><?php printf('%d', $sy); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </td>
                                            <td class="hmrm_exp_end_month" style="vertical-align: top;">
                                                <select name="hmrm_exp_end_month[]" class="hmrm_exp_end_month">
                                                    <option value="">Month</option>
                                                    <?php
                                                    for($hmrmExpEMonthC=0; $hmrmExpEMonthC < count($hmrm_months); $hmrmExpEMonthC++): ?>
                                                        <option value="<?php echo esc_attr($hmrm_months[$hmrmExpEMonthC]); ?>"><?php echo esc_html($hmrm_months[$hmrmExpEMonthC]); ?></option>
                                                        <?php
                                                    endfor; ?>
                                                </select>
                                                <select name="hmrm_edu_end_year[]" class="hmrm_edu_end_year">
                                                    <option value="">Year</option>
                                                    <?php for($ey=(date('Y')+7); $ey>=1900; $ey--): ?>
                                                    <option value="<?php printf('%d', $ey); ?>"><?php printf('%d', $ey); ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </td>
                                            <td class="hmrm_exp_role" style="vertical-align: top;">
                                                <textarea name="hmrm_exp_role[]" class="hmrm_exp_role" cols="50" rows="5"></textarea>
                                                <br>
                                                <code>Accepts HTML Tag</code>
                                            </td>
                                            <td style="vertical-align: top;"></td>
                                        <tr>
                              <?php } ?>
                         </tbody>
                    </table>
               </td>
          </tr>
          </table>
          <p class="submit"><button id="updateSettings" name="updateExpSettings" class="button button-primary"><?php esc_attr_e('Update Settings', HMRM_TXT_DOMAIN); ?></button></p>
     </form>
</div>