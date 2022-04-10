<!-- Open Fancybox -->
<div id="form-employment-history" style="min-height:400px; width:710px; display:none;">
    <div class="hmcs-header-bar">
        <h3 class="hmcs-header-title">Add New Experience</h3>
    </div>
    <form name="hmrm_employment_history_form" role="form" class="hmcs-form form-employment-history" method="post"
        action="" id="hmrm-employment-history-settings-form">
        <input type="hidden" name="hmrm_create_exp_setting"
            value="<?php printf('%s', wp_create_nonce('hmrm-create-exp-setting')); ?>" />
        <label for="hmrm_exp_company">Company Name:</label>
        <input type="text" name="hmrm_exp_company" class="hmrm_exp_company" placeholder="Ex: Microsoft" value="">

        <label for="hmrm_exp_job_title">Job Title:</label>
        <input type="text" name="hmrm_exp_job_title" class="hmrm_exp_job_title"
            placeholder="Ex: Senior Software Engineer" value="">

        <label for="hmrm_exp_started_from">Start From:</label>
        <input type="text" name="hmrm_exp_started_from" class="hmrm_exp_started_from" id="hmrm-exp-started-from"
            placeholder="Ex: 2000-01-31" value="">

        <label for="hmrm_exp_ended_to">Ended To:</label>
        <input type="text" name="hmrm_exp_ended_to" class="hmrm_exp_ended_to" id="hmrm-exp-ended-to"
            placeholder="Ex: 2000-01-31" value="">

        <label for="hmrm_exp_role">Role:</label>
        <textarea name="hmrm_exp_role" class="hmrm_exp_role" rows="5"></textarea>
        <div display="inline-block">
            <button id="createExpSettings" name="createExpSettings" class="hmcs-btn-submit half"
                class=""><?php esc_html_e('Submit', HMRM_TXT_DOMAIN); ?></button>
            <input type="reset" value="<?php esc_attr_e('Reset', HMRM_TXT_DOMAIN); ?>" class="hmcs-btn-reset half" />
        </div>

    </form>
</div>