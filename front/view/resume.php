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
            <div class="hm_cv_name">
                <?php esc_html_e( $hmrmAuthorName ); ?>
            </div>
            <div class="hm_cv_title">
                <?php esc_html_e( $hmrmAuthorTitle ); ?>
            </div>
            <div class="hm_cv_carrer_summary">
                <?php echo wpautop( wp_kses_post( $hmrmBiographicalInfo ) ); ?>
            </div>
        </div>
        <div class="hmrm-level-two-right">
            <!-- SKILLS STARTED -->
            <div class="hmrm-cv-skills">
                
                <div class="hm_cv_skills_title">
                    <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $hmrmSkillLabelText ); ?>
                </div>
                
                <div class="hm_skills_items">
                    <?php
                    if ( $hmrmSkillsSettings ) {
                        $hmrmSkillsC = 0;
                        foreach ( $hmrmSkillsSettings as $hmrmSkills ) {
                            if ( $hmrmSkillsC >= 5 ) { break; } else {
                            ?>
                            <div class="single-progressbar hmrm-skill-item">
                                <h4 class="title"><?php echo esc_html($hmrmSkills['hmrm_skill_name']); ?></h4>
                                <div id="progressbar_<?php printf('%d', $hmrmSkillsC); ?>"
                                    data-percentage="<?php echo esc_attr($hmrmSkills['hmrm_skill_percentage']); ?>"
                                    data-color="<?php echo esc_attr($hmrmSkills['hmrm_skill_bg_color']); ?>">
                                </div>
                            </div>
                            <?php
                            $hmrmSkillsC++;
                            }
                        }
                    } 
                    ?>
                </div>
            </div>
            <!-- SKILLS ENDED -->
        </div>
    </div>

    <!-- EDUCATION STARTED -->
    <div class="hm_education">

        <div class="hm_cv_education_title">
            <i class="fa fa-university" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $hmrmEduLabelText ); ?>
        </div>
        
        <?php
        $hmrm_edu_info_settings = get_option('hmrm_edu_info_settings');
        $hmrmEdu = 0;
        if ( $hmrm_edu_info_settings ) { ?>
        <div class="hmrm-education-item-wrapper">
            <?php 
            for ($hmrmEdu = 0; $hmrmEdu < 3; $hmrmEdu++) {
                if ( ! empty( $hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_degree'] ) ) {
                ?>
                <div class="education_block">
                    <div class="hm_cv_experience_cmp edu">
                        <?php 
                        echo '<strong>' . esc_html( $hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_degree'] ) . '</strong><br>' .
                        esc_html($hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_subject']); 
                        ?>
                        <span>
                            <?php echo esc_html( $hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_start_year'] ) . '-' . esc_html( $hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_end_year'] ); ?>
                        </span>
                    </div>
                    <div class="hm_cv_experience_position edu">
                        <?php esc_html_e( $hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_school'] ); ?>
                    </div>
                    <div class="hm_cv_experience_period edu">
                        <?php
                        echo __('CGPA', HMRM_TXT_DOMAIN) . ':&nbsp;' . esc_html( $hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_grade'] ); 
                        ?>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <?php
                } 
            } 
            ?>
        </div>
        <?php } ?>
    </div>
    <!-- EDUCATION ENDED -->

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