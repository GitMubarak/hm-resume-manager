<?php
/**
 * Plugin Name:	HM Resume Manager
 * Plugin URI:	http://wordpress.org/plugins/hm-resume-manager/
 * Description:	This plugin display a Resume in a front page with personal information, education & experience history, as well as a list of skills with career summary. Use shortcode: [hm_resume_manager]
 * Version:		        2.4.2
 * Author:		        HM Plugin
 * Author URI:	        https://hmplugin.com
 * Requires at least:   5.4
 * Requires PHP:        7.2
 * Tested up to:        6.9
 * Text Domain:         hm-resume-manager
 * Domain Path:         /languages/
 * License:		GPL-2.0+
 * License URI:	http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'hrm_fs' ) ) {
    
    hrm_fs()->set_basename( true, __FILE__ );

} else {

    if ( ! class_exists('Hmrm_Master') ) {

        define('HMRM_PATH', plugin_dir_path(__FILE__));
        define('HMRM_ASSETS', plugins_url('/assets/', __FILE__));
        define('HMRM_SLUG', plugin_basename(__FILE__));
        define('HMRM_PRFX', 'hmrm_');
        define('HMRM_CLS_PRFX', 'cls-hmrm-');
        define('HMRM_TXT_DOMAIN', 'hm-resume-manager');
        define('HMRM_VERSION', '2.4.2');

        require_once HMRM_PATH . '/lib/freemius-integrator.php';
        require_once HMRM_PATH . 'inc/' . HMRM_CLS_PRFX . 'master.php';

        $hmrm = new Hmrm_Master();
        $hmrm->hmrm_run();

        // Donation link to plugin description
        add_filter( 'plugin_row_meta', 'hmrm_plugin_row_meta', 10, 2 );
        function hmrm_plugin_row_meta( $links, $file ) {
        
            if ( HMRM_SLUG === $file ) {

                $row_meta = array(
                    'hmtb_donation'    => '<a href="' . esc_url( 'https://www.paypal.me/mhmrajib/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'hm-resume-manager' ) . '" style="color:green; font-weight: bold;">' . esc_html__( 'Donate us', 'hm-resume-manager' ) . '</a>'
                );
        
                return array_merge( $links, $row_meta );
            }
            return (array) $links;
        }
    
    }
}