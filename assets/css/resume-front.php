<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
div.hm_cv_top {
    background-color: <?php esc_attr_e( $hmrm_bg_color ); ?>;
    border-color: <?php esc_attr_e( $hmrm_border_color ); ?>;
}
div.hm_cv_name {
    color: <?php esc_attr_e( $hmrm_name_color ); ?>;
    font-size: <?php esc_attr_e( $hmrm_name_font_size ); ?>px;
}
div.hm_cv_title {
    color: <?php esc_attr_e( $hmrm_title_color ); ?>;
    font-size: <?php esc_attr_e( $hmrm_title_font_size ); ?>px;
}
div.hm_cv_carrer_summary,
div.hm_cv_carrer_summary p {
    color: <?php esc_attr_e( $hmrm_carrer_summary_color ); ?>;
    font-size: <?php esc_attr_e( $hmrm_carrer_summary_font_size ); ?>px;
    line-height: <?php esc_attr_e( $hmrm_carrer_summary_font_size + 10 ); ?>px;
}
ul.hmrm-social-ul li div {
    color: <?php esc_attr_e( $hmrm_contact_color ); ?>;
    font-size: <?php esc_attr_e( $hmrm_contact_font_size ); ?>px;
}
div.hm_cv_skills_title {
    color: <?php esc_attr_e( $hmrm_skill_label_color ); ?>;
    border-bottom: 3px solid <?php esc_attr_e( $hmrm_skill_label_color ); ?>;
    font-size: <?php esc_attr_e( $hmrm_skill_label_font_size ); ?>px;
}
div.hm_cv_education_title {
    color: <?php esc_attr_e( $hmrm_edu_label_color ); ?>;
    border-bottom: 3px solid <?php esc_attr_e( $hmrm_edu_label_color ); ?>;
    font-size: <?php esc_attr_e( $hmrm_edu_label_font_size ); ?>px;
}
div.hm_cv_experience_title {
    color: <?php esc_attr_e( $hmrm_exp_label_color ); ?>;
    border-bottom: 3px solid <?php esc_attr_e( $hmrm_exp_label_color ); ?>;
    font-size: <?php esc_attr_e( $hmrm_exp_label_font_size ); ?>px;
}
</style>