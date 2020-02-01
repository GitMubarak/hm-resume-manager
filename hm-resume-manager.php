<?php
/**
 * Plugin Name:	HM Resume Manager
 * Plugin URI:	http://wordpress.org/plugins/hm-resume_manager/
 * Description:	Allow users to display a notification/alert box in a Post or Page multiple times. Use shortcode: [hm_resume_manager]
 * Version:		1.0
 * Author:		Hossni Mubarak
 * Author URI:	http://www.hossnimubarak.com
 * License:		GPL-2.0+
 * License URI:	http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'HMRM_PATH', plugin_dir_path( __FILE__ ) );
define( 'HMRM_ASSETS', plugins_url( '/assets/', __FILE__ ) );
define( 'HMRM_SLUG', plugin_basename( __FILE__ ) );
define( 'HMRM_PRFX', 'hmrm_' );
define( 'HMRM_CLS_PRFX', 'cls-hmrm-' );
define( 'HMRM_TXT_DOMAIN', 'hm-resume-manager' );
define( 'HMRM_VERSION', '1.0' );

require_once HMRM_PATH . 'inc/' . HMRM_CLS_PRFX . 'master.php';
$hmrm = new Hmrm_Master();
$hmrm->hmrm_run();
register_deactivation_hook( __FILE__, array($hmrm, HMRM_PRFX . 'unregister_settings') );