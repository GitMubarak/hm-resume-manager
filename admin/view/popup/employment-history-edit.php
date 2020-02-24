<!-- Open Fancybox -->
<div id="form-employment-history-edit" style="min-height:400px; width:710px; display:none;">
    <div class="hmcs-header-bar">
        <h3 class="hmcs-header-title">Edit Experience</h3>
    </div>
    <form name="hmrm_employment_history_form" role="form" class="hmcs-form form-employment-history" method="post"
        action="" id="hmrm-employment-history-settings-form">
        <input type="hidden" name="hmrm_update_exp_setting"
            value="<?php printf('%s', wp_create_nonce('hmrm-update-exp-setting')); ?>" />
        <input type="hidden" name="hmrm_exp_id" id="hmrm-exp-id-edit" />
        <label for="hmrm_exp_company">Company Name:</label>
        <input type="text" name="hmrm_exp_company" class="hmrm_exp_company" id="hmrm-exp-company-edit"
            placeholder="Ex: Microsoft" value="">

        <label for="hmrm_exp_job_title">Job Title:</label>
        <input type="text" name="hmrm_exp_job_title" class="hmrm_exp_job_title" id="hmrm-exp-job-title-edit"
            placeholder="Ex: Senior Software Engineer" value="">

        <label for="hmrm_exp_started_from">Start From:</label>
        <input type="text" name="hmrm_exp_started_from" class="hmrm_exp_started_from" id="hmrm-exp-started-from-exp"
            placeholder="Ex: 2000-01-31" value="">

        <label for="hmrm_exp_ended_to">Ended To:</label>
        <input type="text" name="hmrm_exp_ended_to" class="hmrm_exp_ended_to" id="hmrm-exp-ended-to-exp"
            placeholder="Ex: 2000-01-31" value="">

        <label for="hmrm_exp_role">Role:</label>
        <textarea name="hmrm_exp_role" class="hmrm_exp_role" id="hmrm-exp-role-edit" rows="5"></textarea>
        <div display="inline-block">
            <button id="updateExpSettings" name="updateExpSettings" class="hmcs-btn-submit"
                class=""><?php esc_html_e('Submit', HMRM_TXT_DOMAIN); ?></button>
        </div>

    </form>
</div>