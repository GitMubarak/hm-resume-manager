<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="hm_education">

    <div class="hm_cv_education_title">
        <i class="fa fa-university" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $hmrmEduLabelText ); ?>
    </div>
    
    <?php
    $hmrm_edu_info_settings = get_option('hmrm_edu_info_settings');
    $hmrmEdu = 0;

    if ( $hmrm_edu_info_settings ) { 
        ?>
        <div class="hmrm-education-item-wrapper">
            <?php 
            for ( $hmrmEdu = 0; $hmrmEdu < 10; $hmrmEdu++ ) {

                if ( ! empty( $hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_degree'] ) ) {
                    ?>
                    <div class="education_block">
                        <div class="hm_cv_experience_cmp edu">
                            <?php 
                            echo '<strong>' . esc_html( $hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_degree'] ) . '</strong><br>' .
                            esc_html($hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_subject']) . '<br>';
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
        <?php 
    } 
    ?>
</div>