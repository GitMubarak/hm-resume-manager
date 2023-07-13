<?php

/**
 * Plugin Name:	HM Resume Manager
 * Plugin URI:	http://wordpress.org/plugins/hm-resume-manager/
 * Description:	This plugin display a Resume in a front page with personal information, education & experience history, as well as a list of skills with career summary. Use shortcode: [hm_resume_manager]
 * Version:		2.2
 * Author:		        HM Plugin
 * Author URI:	        https://hmplugin.com
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Tested up to:        6.2.2
 * Text Domain:         hm-resume-manager
 * Domain Path:         /languages/
 * License:		GPL-2.0+
 * License URI:	http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'hrm_fs' ) ) {
    // Create a helper function for easy SDK access.
    function hrm_fs() {
        global $hrm_fs;

        if ( ! isset( $hrm_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $hrm_fs = fs_dynamic_init( array(
                'id'                  => '10195',
                'slug'                => 'hm-resume-manager',
                'type'                => 'plugin',
                'public_key'          => 'pk_735808551710fc0a4e8fb62bcd385',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'hmrm-admin-panel',
                    'first-path'     => 'admin.php?page=hmrm-admin-panel',
                ),
            ) );
        }

        return $hrm_fs;
    }

    // Init Freemius.
    hrm_fs();
    // Signal that SDK was initiated.
    do_action( 'hrm_fs_loaded' );
}

define('HMRM_PATH', plugin_dir_path(__FILE__));
define('HMRM_ASSETS', plugins_url('/assets/', __FILE__));
define('HMRM_SLUG', plugin_basename(__FILE__));
define('HMRM_PRFX', 'hmrm_');
define('HMRM_CLS_PRFX', 'cls-hmrm-');
define('HMRM_TXT_DOMAIN', 'hm-resume-manager');
define('HMRM_VERSION', '2.2');

require_once HMRM_PATH . 'inc/' . HMRM_CLS_PRFX . 'master.php';
$hmrm = new Hmrm_Master();
$hmrm->hmrm_run();
register_deactivation_hook(__FILE__, array($hmrm, HMRM_PRFX . 'unregister_settings'));