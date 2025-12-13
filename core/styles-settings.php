<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Styles Settings
*/
trait Hmrm_Styles_Settings {

    protected $fields, $settings, $options;

    protected function hmrm_set_styles_settings( $post ) {

        $this->fields   = $this->hmrm_styles_option_fileds();

        $this->options  = $this->hmrm_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'hmrm_style_settings', $this->options, $post );

        return update_option( 'hmrm_style_settings', serialize( $this->settings ) );
    }

    function hmrm_get_styles_settings() {

        $this->fields   = $this->hmrm_styles_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmrm_style_settings') ) );
        
        return $this->hmrm_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function hmrm_styles_option_fileds() {

        return [
            [
                'name'      => 'hmrm_bg_color',
                'type'      => 'text',
                'default'   => '#FFFAF0',
            ],
            [
                'name'      => 'hmrm_border_color',
                'type'      => 'text',
                'default'   => '#FF6633',
            ],
            [
                'name'      => 'hmrm_name_color',
                'type'      => 'text',
                'default'   => '#333333',
            ],
            [
                'name'      => 'hmrm_name_font_size',
                'type'      => 'number',
                'default'   => '28',
            ],
            [
                'name'      => 'hmrm_title_color',
                'type'      => 'text',
                'default'   => '#333333',
            ],
            [
                'name'      => 'hmrm_title_font_size',
                'type'      => 'number',
                'default'   => '18',
            ],
            [
                'name'      => 'hmrm_carrer_summary_color',
                'type'      => 'text',
                'default'   => '#333333',
            ],
            [
                'name'      => 'hmrm_carrer_summary_font_size',
                'type'      => 'number',
                'default'   => '12',
            ],
            [
                'name'      => 'hmrm_contact_color',
                'type'      => 'text',
                'default'   => '#333333',
            ],
            [
                'name'      => 'hmrm_contact_font_size',
                'type'      => 'number',
                'default'   => '12',
            ],
            [
                'name'      => 'hmrm_skill_label_text',
                'type'      => 'text',
                'default'   => 'Skills',
            ],
            [
                'name'      => 'hmrm_skill_label_color',
                'type'      => 'text',
                'default'   => '#333333',
            ],
            [
                'name'      => 'hmrm_skill_label_font_size',
                'type'      => 'number',
                'default'   => '28',
            ],
            [
                'name'      => 'hmrm_edu_label_text',
                'type'      => 'text',
                'default'   => 'Education',
            ],
            [
                'name'      => 'hmrm_edu_label_color',
                'type'      => 'text',
                'default'   => '#333333',
            ],
            [
                'name'      => 'hmrm_edu_label_font_size',
                'type'      => 'number',
                'default'   => '28',
            ],
            [
                'name'      => 'hmrm_exp_label_text',
                'type'      => 'text',
                'default'   => 'Experience',
            ],
            [
                'name'      => 'hmrm_exp_label_color',
                'type'      => 'text',
                'default'   => '#333333',
            ],
            [
                'name'      => 'hmrm_exp_label_font_size',
                'type'      => 'number',
                'default'   => '28',
            ],
        ];
    }
}
?>