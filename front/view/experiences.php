<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="hm_cv_experience">

    <div class="hm_cv_experience_title">
        <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $hmrm_exp_label_text ); ?>
    </div>
    
    <?php
    $hmrmExpSettings = get_option('hmrm_exp_settings');
    if ( $hmrmExpSettings ) {
        for ( $hmrmExp = 0; $hmrmExp < 5; $hmrmExp++ ) {
            if ( ! empty( $hmrmExpSettings[$hmrmExp]['hmrm_exp_company'] ) ) {
            ?>
            <div class="hm_cv_experience_cmp"><?php printf('%d', $hmrmExp + 1); ?>.
                <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_company']); ?>
            </div>
            <div class="hm_cv_experience_position">
                <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_job_title']); ?>
            </div>
            <div class="hm_cv_experience_period">
                <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_start_month']); ?>,
                <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_start_year']); ?> -
                <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_end_month']); ?>,
                <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_end_year']); ?>
            </div>
            <div class="hm_cv_experience_role">
                <?php echo wp_kses_post($hmrmExpSettings[$hmrmExp]['hmrm_exp_role']); ?>
            </div>
            <hr>
            <?php
            } 
        }
    } ?>

    <div style="clear:both"></div>
</div>