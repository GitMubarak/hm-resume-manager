<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *	Admin Parent Class
 */
class Hmrm_Admin
{
	private $hmrm_version;
	private $hmrm_assets_prefix;

	function __construct($version)
	{
		$this->hmrm_version = $version;
		$this->hmrm_assets_prefix = substr(HMRM_PRFX, 0, -1) . '-';
	}

	/**
	 *	Loading the admin menu
	 */
	public function hmrm_admin_menu()
	{

		add_menu_page(
			esc_html__('HM Resume Manager', HMRM_TXT_DOMAIN),
			esc_html__('HM Resume Manager', HMRM_TXT_DOMAIN),
			'manage_options',
			'hmrm-admin-panel',
			array($this, 'hmrm_personal_info_settings'),
			'dashicons-id-alt',
			100
		);

		add_submenu_page(
			'hmrm-admin-panel',
			esc_html__('Personal Info Settings', HMRM_TXT_DOMAIN),
			esc_html__('Personal Info Settings', HMRM_TXT_DOMAIN),
			'manage_options',
			'hmrm-personal-info-settings',
			array($this, 'hmrm_personal_info_settings')
		);

		add_submenu_page(
			'hmrm-admin-panel',
			esc_html__('Education Settings', HMRM_TXT_DOMAIN),
			esc_html__('Education Settings', HMRM_TXT_DOMAIN),
			'manage_options',
			'hmrm-education-settings',
			array($this, 'hmrm_education_info_settings')
		);

		add_submenu_page(
			'hmrm-admin-panel',
			esc_html__('Experience Settings', HMRM_TXT_DOMAIN),
			esc_html__('Experience Settings', HMRM_TXT_DOMAIN),
			'manage_options',
			'hmrm-experience-settings',
			array($this, 'hmrm_experience_info_settings')
		);

		add_submenu_page(
			'hmrm-admin-panel',
			esc_html__('Skills Settings', HMRM_TXT_DOMAIN),
			esc_html__('Skills Settings', HMRM_TXT_DOMAIN),
			'manage_options',
			'hmrm-skills-settings',
			array($this, 'hmrm_skills_settings')
		);

		add_submenu_page(
			'hmrm-admin-panel',
			esc_html__('Style Settings', HMRM_TXT_DOMAIN),
			esc_html__('Style Settings', HMRM_TXT_DOMAIN),
			'manage_options',
			'hmrm-style-settings',
			array($this, 'hmrm_style_settings')
		);
	}

	/**
	 *	Loading admin panel assets
	 */
	function hmrm_enqueue_assets() {
		wp_enqueue_style(
            $this->hmrm_assets_prefix . 'font-awesome',
            HMRM_ASSETS . 'css/font-awesome/css/font-awesome.min.css',
            array(),
            $this->hmrm_version,
            FALSE
        );

		wp_enqueue_style(
			$this->hmrm_assets_prefix . 'admin',
			HMRM_ASSETS . 'css/' . $this->hmrm_assets_prefix . 'admin.css',
			array(),
			$this->hmrm_version,
			FALSE
		);

		wp_enqueue_style(
			$this->hmrm_assets_prefix . 'fancybox',
			HMRM_ASSETS . 'css/jquery.fancybox.css',
			array(),
			$this->hmrm_version,
			FALSE
		);

		// You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
		wp_register_style('jquery-ui', '//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('jquery-ui');

		wp_enqueue_media();

		wp_enqueue_style(
			'hm-custom-style',
			HMRM_ASSETS . 'css/hm-custom-style.css',
			array(),
			$this->hmrm_version,
			FALSE
		);

		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		if (!wp_script_is('jquery')) {
			wp_enqueue_script('jquery');
		}

		// Load the datepicker script (pre-registered in WordPress).
		wp_enqueue_script('jquery-ui-datepicker');

		wp_enqueue_script(
			$this->hmrm_assets_prefix . 'fancybox-js',
			HMRM_ASSETS . 'js/jquery.fancybox.js',
			array('jquery'),
			$this->hmrm_version,
			TRUE
		);
		wp_enqueue_script(
			$this->hmrm_assets_prefix . 'admin-script',
			HMRM_ASSETS . 'js/' . $this->hmrm_assets_prefix . 'admin-script.js',
			array('jquery'),
			$this->hmrm_version,
			TRUE
		);

		$hmrmAdminArray = array(
			'ajaxurl' => admin_url('admin-ajax.php'),
		);

		wp_localize_script('hmrm-admin-script', 'hmrm_admin_ajax_object', $hmrmAdminArray);
	}

	/**
	 *	Loading admin panel view/forms
	 */
	function hmrm_personal_info_settings() {
		
		require_once HMRM_PATH . 'admin/view/personal-info.php';
	}

	function hmrm_education_info_settings() {

		require_once HMRM_PATH . 'admin/view/education.php';
	}

	function hmrm_experience_info_settings() {

		require_once HMRM_PATH . 'admin/view/experience.php';
	}

	function hmrm_skills_settings() {

		require_once HMRM_PATH . 'admin/view/skills.php';
	}

	function hmrm_style_settings() {
		
		require_once HMRM_PATH . 'admin/view/style.php';
	}

	function hmrm_get_image()
	{
		if (isset($_GET['id'])) {
			$image = wp_get_attachment_image(filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT), 'thumbnail', false, array('id' => 'hmrm-preview-image'));
			$data = array(
				'image' => $image,
			);
			wp_send_json_success($data);
		} else {
			wp_send_json_error();
		}
	}

	protected function hmrm_display_notification($type, $msg)
	{ ?>
<div class="hmrm-alert <?php printf('%s', $type); ?>">
    <span class="hmrm-closebtn">&times;</span>
    <strong><?php esc_html_e(ucfirst($type), HMRM_TXT_DOMAIN); ?>!</strong> <?php esc_html_e($msg, HMRM_TXT_DOMAIN); ?>
</div>
<?php }

	protected function hmrm_months()
	{
		return array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	}

	protected function hmrm_load_delete_button($key)
	{
	?>
<form action="admin.php?page=hmrm-experience-settings" id="hmrm-exp-delete-form" name="hmrm-exp-delete-form"
    class="hmcs-delete-form" method="POST">
    <input type="hidden" name="hmrm_delete_key" value="<?php printf('%s', $key); ?>" />
    <input id="hmrm-exp-delete-btn" name="hmrm_exp_delete_btn" class="hmcs-btn small" type="submit" value="Delete"
        class="button">
</form>
<?php
	}

	function hmrm_load_experience()
	{
		$id = $_POST['exp'];
		$hmrmExpArr = !empty(get_option('hmrm_exp_settings')) ? get_option('hmrm_exp_settings') : array();
		$returnExp = array_key_exists($id, $hmrmExpArr) ? $hmrmExpArr[$id] : '';
		echo json_encode($returnExp);
		die();
	}
}
?>