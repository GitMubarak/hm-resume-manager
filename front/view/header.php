<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hmrmPersonalInfoSettings = $this->hmrm_get_personal_info_settings();

foreach ( $hmrmPersonalInfoSettings as $option_name => $option_value ) {
    if ( isset( $hmrmPersonalInfoSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

$hmrmStylesSettings = $this->hmrm_get_styles_settings();

foreach ( $hmrmStylesSettings as $option_name => $option_value ) {
    if ( isset( $hmrmStylesSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

$hmrmSkillsSettings = get_option('hmrm_skills_settings');

// Loading image
$hmrmImage = array();
$hmrmPhotograph2 = '';

if ( intval( $hmrm_photograph ) > 0 ) {

    $hmrmImage = wp_get_attachment_image_src( $hmrm_photograph, 'fulll', false );
    $hmrmPhotograph2 = $hmrmImage[0];

} else {

    $hmrmPhotograph2 = HMRM_ASSETS . 'img/noimage.jpg';
}
?>