<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Personal Info Settings
*/
trait Hmrm_Personal_Info_Settings {

    protected $fields, $settings, $options;

    protected function hmrm_set_personal_info_settings( $post ) {

        $this->fields   = $this->hmrm_personal_info_option_fileds();

        $this->options  = $this->hmrm_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'hmrm_general_settings', $this->options, $post );

        return update_option( 'hmrm_general_settings', serialize( $this->settings ) );
    }

    function hmrm_get_personal_info_settings() {

        $this->fields   = $this->hmrm_personal_info_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmrm_general_settings') ) );
        
        return $this->hmrm_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function hmrm_personal_info_option_fileds() {

        return [
            [
                'name'      => 'hmrm_author_name',
                'type'      => 'text',
                'default'   => '',
            ],
        ];
    }
}