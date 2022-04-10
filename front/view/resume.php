<?php
$hmrmCurrentUser = wp_get_current_user();
if (is_array(stripslashes_deep(unserialize(get_option('hmrm_general_settings'))))) {
    $hmrmGeneralSettings     = stripslashes_deep(unserialize(get_option('hmrm_general_settings')));
    $hmrmPhotograph         = !empty($hmrmGeneralSettings['hmrm_photograph']) ? $hmrmGeneralSettings['hmrm_photograph'] : "";
    $hmrmAuthorName         = !empty($hmrmGeneralSettings['hmrm_author_name']) ? $hmrmGeneralSettings['hmrm_author_name'] : $hmrmCurrentUser->display_name;
    $hmrmAuthorTitle         = !empty($hmrmGeneralSettings['hmrm_author_title']) ? $hmrmGeneralSettings['hmrm_author_title'] : '';
    $hmrmAuthorEmail         = !empty($hmrmGeneralSettings['hmrm_author_email']) ? $hmrmGeneralSettings['hmrm_author_email'] : $hmrmCurrentUser->user_email;
    $hmrmAuthorWebsite         = !empty($hmrmGeneralSettings['hmrm_author_website']) ? $hmrmGeneralSettings['hmrm_author_website'] : $hmrmCurrentUser->user_url;
    $hmrmCurrentAddress     = !empty($hmrmGeneralSettings['hmrm_current_address']) ? $hmrmGeneralSettings['hmrm_current_address'] : '';
    $hmrmBiographicalInfo    = !empty($hmrmGeneralSettings['hmrm_biographical_info']) ? wp_kses_post($hmrmGeneralSettings['hmrm_biographical_info']) : '';
    $hmrmContactNo             = !empty($hmrmGeneralSettings['hmrm_contact_number']) ? $hmrmGeneralSettings['hmrm_contact_number'] : '';
    $hmrmTwitter             = !empty($hmrmGeneralSettings['hmrm_twitter']) ? $hmrmGeneralSettings['hmrm_twitter'] : '';
    $hmrmFacebook             = !empty($hmrmGeneralSettings['hmrm_facebook']) ? $hmrmGeneralSettings['hmrm_facebook'] : '';
    //$hmrmSkills                = !empty($hmrmGeneralSettings['hmrm_skills']) ? wp_kses_post($hmrmGeneralSettings['hmrm_skills']) : '';
} else {
    $hmrmPhotograph         = "";
    $hmrmAuthorName         = $hmrmCurrentUser->display_name;
    $hmrmBiographicalInfo     = '';
    $hmrmAuthorEmail         = $hmrmCurrentUser->user_email;
    $hmrmAuthorWebsite         =  $hmrmCurrentUser->user_url;
    $hmrmCurrentAddress        = '';
    $hmrmAuthorTitle         = "";
    $hmrmContactNo             = '';
    $hmrmTwitter            = '';
    $hmrmFacebook             = '';
    //$hmrmSkills                = '';
}

if (is_array(stripslashes_deep(unserialize(get_option('hmrm_style_settings'))))) {
    $hmrmStyleSettings     = stripslashes_deep(unserialize(get_option('hmrm_style_settings')));
    $hmrmSkillLabelText = !empty($hmrmStyleSettings['hmrm_skill_label_text']) ? $hmrmStyleSettings['hmrm_skill_label_text'] : "Skills";
    $hmrmEduLabelText         = !empty($hmrmStyleSettings['hmrm_edu_label_text']) ? $hmrmStyleSettings['hmrm_edu_label_text'] : "Education";
    $hmrmExpLabelText         = !empty($hmrmStyleSettings['hmrm_exp_label_text']) ? $hmrmStyleSettings['hmrm_exp_label_text'] : "Experience";
    $hmrmBgClr         = !empty($hmrmStyleSettings['hmrm_bg_color']) ? $hmrmStyleSettings['hmrm_bg_color'] : "#FFFAF0";
    $hmrmBrdrClr         = !empty($hmrmStyleSettings['hmrm_border_color']) ? $hmrmStyleSettings['hmrm_border_color'] : "#FF6633";
} else {
    $hmrmSkillLabelText = "Skills";
    $hmrmEduLabelText = "Education";
    $hmrmExpLabelText = "Experience";
    $hmrmBgClr = "#FFFAF0";
    $hmrmBrdrClr = "#FF6633";
}

$hmrmSkillsSettings = get_option('hmrm_skills_settings');
?>

<style type="text/css">
div.hm_cv_top {
    background-color: <?php echo esc_attr($hmrmBgClr);
    ?>;
    border-color: <?php echo esc_attr($hmrmBrdrClr);
    ?>;
}
</style>

<div class="hm_cv_top">

    <div class="hmrm-header">
        <div class="hmrm-header-left">
            <?php
            $hmrmImage = array();
            $hmrmPhotograph2 = "";
            if (intval($hmrmPhotograph) > 0) {
                $hmrmImage = wp_get_attachment_image_src($hmrmPhotograph, 'fulll', false);
                $hmrmPhotograph2 = $hmrmImage[0];
            } else {
                $hmrmPhotograph2 = HMRM_ASSETS . 'img/noimage.jpg';
            }
            ?>
            <img src="<?php esc_attr_e( $hmrmPhotograph2 ); ?>" />
        </div>
        <div class="hmrm-header-right">
            <!-- PERSONAL INFO STARTED -->
            <div class="hmrm-social">
                <ul class="hmrm-social-ul">
                    <li>
                        <div class="social-title">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <?php esc_html_e( $hmrmCurrentAddress ); ?>
                        </div>
                    </li>
                    <li>
                        <div class="social-title">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            <?php esc_html_e( $hmrmAuthorWebsite ); ?>
                        </div>
                    </li>
                    <li>
                        <div class="social-title">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <?php esc_html_e( $hmrmContactNo ); ?>
                        </div>
                    </li>
                    <li>
                        <div class="social-title">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <?php esc_html_e( $hmrmAuthorEmail ); ?>
                        </div>
                    </li>
                    <li>
                        <div class="social-title">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <?php esc_html_e( $hmrmTwitter ); ?>
                        </div>
                    </li>
                    <li>
                        <div class="social-title">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <?php esc_html_e( $hmrmFacebook ); ?>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- PERSONAL INFO ENDED -->
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