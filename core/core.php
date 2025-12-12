<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *	Trait: Core
 */
trait Hmrm_Core {
    
	protected $data;

	protected function hmrm_build_set_settings_options( $fields, $post ) {

		$this->data = [];

		$i=0;
        
        foreach ( $fields as $field => $value ) {

            if ( 'string' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) && filter_var( $post[$fields[$i]['name']], FILTER_SANITIZE_STRING ) ? $post[$fields[$i]['name']] : $fields[$i]['default'];

            }
            if ( 'number' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) && filter_var( $post[$fields[$i]['name']], FILTER_SANITIZE_NUMBER_INT ) ? $post[$fields[$i]['name']] : $fields[$i]['default'];

            }
            if ( 'boolean' === $fields[$i]['type'] ) {

                $this->data[$fields[$i]['name']] = isset( $post[$fields[$i]['name']] ) ? $post[$fields[$i]['name']] : $fields[$i]['default'];

            }
            if ( 'text' === $this->fields[$i]['type'] ) {

                $this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) ? sanitize_text_field( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];

            }
            if ( 'textarea' === $this->fields[$i]['type'] ) {

                $this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) ? sanitize_textarea_field( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];

            }
            if ( 'email' === $this->fields[$i]['type'] ) {

                $this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) ? sanitize_email( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];

            }
            if ( 'kses_post' === $this->fields[$i]['type'] ) {
        
                $this->data[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) ? wp_kses_post( $post[$this->fields[$i]['name']] ) : $this->fields[$i]['default'];
        
            }

            $i++;
        }

		return $this->data;
	}

	protected function hmrm_build_get_settings_options( $fields, $settings ) {
		
		$this->data = [];
        
        $i = 0;

        foreach ( $fields as $option => $value ) {

            $this->data[$fields[$i]['name']]  = isset( $settings[$fields[$i]['name']] ) ? $settings[$fields[$i]['name']] : $fields[$i]['default'];
            
            $i++;
        }

		return $this->data;
	}
}