<?php
/**
*	Admin Parent Class
*/
class Hmrm_Admin 
{	
	private $hmrm_version;
	private $hmrm_assets_prefix;

	function __construct( $version ){
		$this->hmrm_version = $version;
		$this->hmrm_assets_prefix = substr(HMRM_PRFX, 0, -1) . '-';
	}
	
	/**
	*	Loading the admin menu
	*/
	public function hmrm_admin_menu(){
		
		add_menu_page(	esc_html__('HM Resume Manager', HMRM_TXT_DOMAIN),
						esc_html__('HM Resume Manager', HMRM_TXT_DOMAIN),
						'',
						'hmrm-admin-panel',
						'',
						'dashicons-id-alt',
						100 
					);
		
		add_submenu_page( 	'hmrm-admin-panel',
					esc_html__('Personal Info Settings', HMRM_TXT_DOMAIN),
					esc_html__('Personal Info Settings', HMRM_TXT_DOMAIN),
					'manage_options',
					'hmrm-personal-info-settings',
					array( $this, 'hmrm_personal_info_settings' )
				);
		
		add_submenu_page( 	'hmrm-admin-panel',
			esc_html__('Education Settings', HMRM_TXT_DOMAIN),
			esc_html__('Education Settings', HMRM_TXT_DOMAIN),
			'manage_options',
			'hmrm-education-settings',
			array( $this, 'hmrm_education_info_settings' )
		);

		add_submenu_page( 	'hmrm-admin-panel',
			esc_html__('Experience Settings', HMRM_TXT_DOMAIN),
			esc_html__('Experience Settings', HMRM_TXT_DOMAIN),
			'manage_options',
			'hmrm-experience-settings',
			array( $this, 'hmrm_experience_info_settings' )
		);
	}
	
	/**
	*	Loading admin panel assets
	*/
	function hmrm_enqueue_assets(){
		
		wp_enqueue_style(
							$this->hmrm_assets_prefix . 'admin-style',
							HMRM_ASSETS . 'css/' . $this->hmrm_assets_prefix . 'admin-style.css',
							array(),
							$this->hmrm_version,
							FALSE
						);

		wp_enqueue_media();

		if ( !wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}
		wp_enqueue_script(
							$this->hmrm_assets_prefix . 'admin-script',
							HMRM_ASSETS . 'js/' . $this->hmrm_assets_prefix . 'admin-script.js',
							array('jquery'),
							$this->hmrm_version,
							TRUE
						);
	}
	
	/**
	*	Loading admin panel view/forms
	*/
	function hmrm_personal_info_settings(){
		require_once HMRM_PATH . 'admin/view/' . $this->hmrm_assets_prefix . 'personal-info-settings.php';
	}

	function hmrm_education_info_settings(){
		require_once HMRM_PATH . 'admin/view/' . $this->hmrm_assets_prefix . 'education-settings.php';
	}

	function hmrm_experience_info_settings(){
		require_once HMRM_PATH . 'admin/view/' . $this->hmrm_assets_prefix . 'experience-settings.php';
	}

	function hmrm_get_image() {
		if(isset($_GET['id']) ){
			$image = wp_get_attachment_image( filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ), 'thumbnail', false, array( 'id' => 'hmrm-preview-image' ) );
			$data = array(
							'image' => $image,
						);
			wp_send_json_success( $data );
		} else {
			wp_send_json_error();
		}
	}

	protected function hmrm_display_notification($type, $msg){ ?>
		<div class="hmrm-alert <?php printf('%s', $type); ?>">
			<span class="hmrm-closebtn">&times;</span> 
			<strong><?php esc_html_e(ucfirst($type), HMRM_TXT_DOMAIN); ?>!</strong> <?php esc_html_e($msg, HMRM_TXT_DOMAIN); ?>
		</div>
	<?php }

	protected function hmrm_months(){
		return array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	}
}
?>