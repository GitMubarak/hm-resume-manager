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
            [
                'name'      => 'hmrm_author_title',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'hmrm_author_email',
                'type'      => 'email',
                'default'   => '',
            ],
            [
                'name'      => 'hmrm_author_website',
                'type'      => 'url',
                'default'   => '',
            ],
            [
                'name'      => 'hmrm_current_address',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'hmrm_contact_number',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'hmrm_twitter',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'hmrm_facebook',
                'type'      => 'url',
                'default'   => '',
            ],
            [
                'name'      => 'hmrm_biographical_info',
                'type'      => 'kses_post',
                'default'   => '',
            ],
            [
                'name'      => 'hmrm_photograph',
                'type'      => 'file',
                'default'   => '',
            ],
        ];
    }
}