<?php
/**
 * Plugin Name:	HM Resume Manager
 * Plugin URI:	http://wordpress.org/plugins/hm-resume_manager/
 * Description:	A Resume Manager plugin that create a resume with personal information, education & experience history, as well as a list of skills with career summary. Use shortcode: [hm_resume_manager]
 * Version:		1.0.1
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
define( 'HMRM_VERSION', '1.0.1' );

require_once HMRM_PATH . 'inc/' . HMRM_CLS_PRFX . 'master.php';
$hmrm = new Hmrm_Master();
$hmrm->hmrm_run();
register_deactivation_hook( __FILE__, array($hmrm, HMRM_PRFX . 'unregister_settings') );