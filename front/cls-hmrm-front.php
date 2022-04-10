<?php

/**
 *	Front Parent Class
 */
class Hmrm_Front
{
	private $hmrm_version;

	function __construct($version)
	{
		$this->hmrm_version = $version;
		$this->hmrm_assets_prefix = substr(HMRM_PRFX, 0, -1) . '-';
	}

	function hmrm_front_assets() {

		wp_enqueue_style(
            $this->hmrm_assets_prefix . 'font-awesome',
            HMRM_ASSETS . 'css/font-awesome/css/font-awesome.min.css',
            array(),
            $this->hmrm_version,
            FALSE
        );

		wp_enqueue_style('dashicons');
		
		wp_enqueue_style(
			'hmrm-front',
			HMRM_ASSETS . 'css/' . $this->hmrm_assets_prefix . 'front.css',
			'',
			$this->hmrm_version,
			FALSE
		);

		wp_enqueue_style(
			'hmrm-progressbar',
			HMRM_ASSETS . 'css/jquery.rprogessbar.min.css',
			'',
			$this->hmrm_version,
			FALSE
		);

		if (!wp_script_is('jquery')) {
			wp_enqueue_script('jquery');
		}

		wp_enqueue_script(
			'hmrm-waypoints-script',
			'//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js',
			['jquery'],
			$this->hmrm_version,
			TRUE
		);

		wp_enqueue_script(
			'hmrm-progressbar-script',
			HMRM_ASSETS . 'js/jQuery.rProgressbar.min.js',
			['jquery'],
			$this->hmrm_version,
			TRUE
		);

		wp_enqueue_script(
			'hmrm-front-script',
			HMRM_ASSETS . 'js/' . $this->hmrm_assets_prefix . 'front-script.js',
			array('jquery'),
			$this->hmrm_version,
			TRUE
		);
	}

	function hmrm_load_shortcode() {

		add_shortcode('hm_resume_manager', array($this, 'hmrm_load_shortcode_view'));
	}

	function hmrm_load_shortcode_view() {
		
		$output = '';
		ob_start();
		include HMRM_PATH . 'front/view/resume.php';
		$output .= ob_get_clean();
		return $output;
	}
}