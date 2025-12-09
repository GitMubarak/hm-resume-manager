<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

    $hmrmStyleSettings              = stripslashes_deep(unserialize(get_option('hmrm_style_settings')));
    $hmrmSkillLabelText             = !empty($hmrmStyleSettings['hmrm_skill_label_text']) ? $hmrmStyleSettings['hmrm_skill_label_text'] : "Skills";
    $hmrmEduLabelText               = !empty($hmrmStyleSettings['hmrm_edu_label_text']) ? $hmrmStyleSettings['hmrm_edu_label_text'] : "Education";
    $hmrmExpLabelText               = !empty($hmrmStyleSettings['hmrm_exp_label_text']) ? $hmrmStyleSettings['hmrm_exp_label_text'] : "Experience";
    $hmrmBgClr                      = !empty($hmrmStyleSettings['hmrm_bg_color']) ? $hmrmStyleSettings['hmrm_bg_color'] : "#FFFAF0";
    $hmrmBrdrClr                    = !empty($hmrmStyleSettings['hmrm_border_color']) ? $hmrmStyleSettings['hmrm_border_color'] : "#FF6633";
    $hmrm_name_color                = isset($hmrmStyleSettings['hmrm_name_color']) ? sanitize_text_field($hmrmStyleSettings['hmrm_name_color']) : '#333333';
    $hmrm_name_font_size            = isset($hmrmStyleSettings['hmrm_name_font_size']) && filter_var( $hmrmStyleSettings['hmrm_name_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field($hmrmStyleSettings['hmrm_name_font_size']) : 28;
    $hmrm_title_color               = isset($hmrmStyleSettings['hmrm_title_color']) ? sanitize_text_field($hmrmStyleSettings['hmrm_title_color']) : '#333333';
    $hmrm_title_font_size           = isset($hmrmStyleSettings['hmrm_title_font_size']) && filter_var( $hmrmStyleSettings['hmrm_title_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field($hmrmStyleSettings['hmrm_title_font_size']) : 18;
    $hmrm_carrer_summary_color      = isset($hmrmStyleSettings['hmrm_carrer_summary_color']) ? sanitize_text_field($hmrmStyleSettings['hmrm_carrer_summary_color']) : '#111111';
    $hmrm_carrer_summary_font_size  = isset($hmrmStyleSettings['hmrm_carrer_summary_font_size']) && filter_var( $hmrmStyleSettings['hmrm_carrer_summary_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field( $hmrmStyleSettings['hmrm_carrer_summary_font_size'] ) : 12;
    $hmrm_contact_color             = isset($hmrmStyleSettings['hmrm_contact_color']) ? sanitize_text_field($hmrmStyleSettings['hmrm_contact_color']) : '#444444';
    $hmrm_contact_font_size         = isset($hmrmStyleSettings['hmrm_contact_font_size']) && filter_var( $hmrmStyleSettings['hmrm_contact_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field( $hmrmStyleSettings['hmrm_contact_font_size'] ) : 22;
    $hmrm_skill_label_color         = isset($hmrmStyleSettings['hmrm_skill_label_color']) ? sanitize_text_field($hmrmStyleSettings['hmrm_skill_label_color']) : '#444444';
    $hmrm_skill_label_font_size     = isset($hmrmStyleSettings['hmrm_skill_label_font_size']) && filter_var( $hmrmStyleSettings['hmrm_skill_label_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field( $hmrmStyleSettings['hmrm_skill_label_font_size'] ) : 28;
    $hmrm_edu_label_color           = isset($hmrmStyleSettings['hmrm_edu_label_color']) ? sanitize_text_field($hmrmStyleSettings['hmrm_edu_label_color']) : '#444444';
    $hmrm_edu_label_font_size       = isset($hmrmStyleSettings['hmrm_edu_label_font_size']) && filter_var( $hmrmStyleSettings['hmrm_edu_label_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field( $hmrmStyleSettings['hmrm_edu_label_font_size'] ) : 28;
    $hmrm_exp_label_color           = isset($hmrmStyleSettings['hmrm_exp_label_color']) ? sanitize_text_field($hmrmStyleSettings['hmrm_exp_label_color']) : '#444444';
    $hmrm_exp_label_font_size       = isset($hmrmStyleSettings['hmrm_exp_label_font_size']) && filter_var( $hmrmStyleSettings['hmrm_exp_label_font_size'], FILTER_SANITIZE_NUMBER_INT ) ? sanitize_text_field( $hmrmStyleSettings['hmrm_exp_label_font_size'] ) : 28;
} else {
    $hmrmSkillLabelText = "Skills";
    $hmrmEduLabelText = "Education";
    $hmrmExpLabelText = "Experience";
    $hmrmBgClr = "#FFFAF0";
    $hmrmBrdrClr = "#FF6633";
}

$hmrmSkillsSettings = get_option('hmrm_skills_settings');

// Loading image
$hmrmImage = array();
$hmrmPhotograph2 = '';

if ( intval( $hmrmPhotograph ) > 0 ) {

    $hmrmImage = wp_get_attachment_image_src( $hmrmPhotograph, 'fulll', false );
    $hmrmPhotograph2 = $hmrmImage[0];

} else {

    $hmrmPhotograph2 = HMRM_ASSETS . 'img/noimage.jpg';
}