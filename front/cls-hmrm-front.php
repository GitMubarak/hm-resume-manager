<?php
/**
*	Front Parent Class
*/
class Hmrm_Front 
{	
	private $hmrm_version;

	function __construct( $version )
	{
		$this->hmrm_version = $version;
		$this->hmrm_assets_prefix = substr(HMRM_PRFX, 0, -1) . '-';
	}
	
	function hmrm_front_assets()
	{
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style(	'hmrm-front-style',
							HMRM_ASSETS . 'css/' . $this->hmrm_assets_prefix . 'front-style.css',
							array(),
							$this->hmrm_version,
							FALSE );
		if ( !wp_script_is( 'jquery' ) ){
			wp_enqueue_script('jquery');
		}
		wp_enqueue_script(  'hmrm-front-script',
							HMRM_ASSETS . 'js/' . $this->hmrm_assets_prefix . 'front-script.js',
							array('jquery'),
							$this->hmrm_version,
							TRUE );
	}

	function hmrm_load_shortcode()
	{
		add_shortcode( 'hm_resume_manager', array( $this, 'hmrm_load_shortcode_view' ) );
	}
	
	function hmrm_load_shortcode_view()
	{
		$output = '';
		ob_start();
		include HMRM_PATH . 'front/view/' . $this->hmrm_assets_prefix . 'front-view.php';
		$output .= ob_get_clean();
		return $output;
	}
}
?>