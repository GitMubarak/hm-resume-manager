<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'header.php';

// Load Styling
include HMRM_PATH . 'assets/css/resume-front.php';
?>
<div class="hm_cv_top">

    <div class="hmrm-header">

        <div class="hmrm-header-left">
        
            <img src="<?php esc_attr_e( $hmrmPhotograph2 ); ?>" />
        
        </div>
        
        <div class="hmrm-header-right">
            <?php include 'personal-info.php'; ?>
        </div>

    </div>

    <div class="hmrm-level-two">

        <div class="hmrm-level-two-left">
            <?php include 'biographical-info.php'; ?>
        </div>

        <div class="hmrm-level-two-right">
            <?php include 'skills.php'; ?>
        </div>
    </div>

    <?php include 'educations.php'; ?>

    <!-- EXPERIENCE STARTED -->
    <div class="hm_cv_experience">

        <div class="hm_cv_experience_title">
            <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $hmrmExpLabelText ); ?>
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
    <!-- EXPERIENCE ENDED -->

    <!-- CERTIFICATION STARTED -->
    <!-- TBA -->
    <!-- CERTIFICATION ENDED -->
    <br>
</div>