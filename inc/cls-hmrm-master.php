<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once HMRM_PATH . 'core/core.php';
include_once HMRM_PATH . 'core/personal-info-settings.php';

/**
 * Class: Main
 */
class Hmrm_Master {

	protected $hmrm_loader;
	protected $hmrm_version;

	function __construct() {

		$this->hmrm_version = HMRM_VERSION;
		add_action( 'plugins_loaded', array( $this, 'hmrm_load_plugin_textdomain' ) );
		$this->hmrm_load_dependencies();
		$this->hmrm_trigger_admin_hooks();
		$this->hmrm_trigger_front_hooks();
	}

	function hmrm_load_plugin_textdomain() {

		load_plugin_textdomain( HMRM_TXT_DOMAIN, FALSE, HMRM_TXT_DOMAIN . '/languages/' );
	}

	private function hmrm_load_dependencies() {

		require_once HMRM_PATH . 'admin/' . HMRM_CLS_PRFX . 'admin.php';
		require_once HMRM_PATH . 'front/' . HMRM_CLS_PRFX . 'front.php';
		require_once HMRM_PATH . 'inc/' . HMRM_CLS_PRFX . 'loader.php';
		$this->hmrm_loader = new Hmrm_Loader();
	}

	private function hmrm_trigger_admin_hooks() {

		$hmrm_admin = new Hmrm_Admin($this->hmrm_version());
		$this->hmrm_loader->add_action('admin_menu', $hmrm_admin, HMRM_PRFX . 'admin_menu');
		$this->hmrm_loader->add_action('admin_enqueue_scripts', $hmrm_admin, HMRM_PRFX . 'enqueue_assets');
		$this->hmrm_loader->add_action('wp_ajax_hmrm_get_image', $hmrm_admin, 'hmrm_get_image');
		$this->hmrm_loader->add_action('wp_ajax_nopriv_hmrm_get_image', $hmrm_admin, 'hmrm_get_image');
		$this->hmrm_loader->add_action('wp_ajax_hmrm_load_experience', $hmrm_admin, 'hmrm_load_experience');
		$this->hmrm_loader->add_action('wp_ajax_nopriv_hmrm_load_experience', $hmrm_admin, 'hmrm_load_experience');
	}

	function hmrm_trigger_front_hooks() {

		$hmrm_front = new Hmrm_Front($this->hmrm_version());
		$this->hmrm_loader->add_action('wp_enqueue_scripts', $hmrm_front, HMRM_PRFX . 'front_assets');
		$hmrm_front->hmrm_load_shortcode();
	}

	function hmrm_run() {

		$this->hmrm_loader->hmrm_run();
	}

	function hmrm_version() {

		return $this->hmrm_version;
	}
}