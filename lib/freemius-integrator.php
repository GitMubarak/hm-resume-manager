<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'hrm_fs' ) ) {
    
    // Create a helper function for easy SDK access.
    function hrm_fs() {

        global $hrm_fs;

        if ( ! isset( $hrm_fs ) ) {
            // Include Freemius SDK.
            require_once HMRM_PATH . '/freemius/start.php';

            $hrm_fs = fs_dynamic_init( array(
                'id'                  => '10195',
                'slug'                => 'hm-resume-manager',
                'type'                => 'plugin',
                'public_key'          => 'pk_735808551710fc0a4e8fb62bcd385',
                'is_premium'          => true,
                'premium_suffix'      => 'Professional',
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'menu'                => array(
                    'slug'           => 'hmrm-admin-panel',
                    'first-path'     => 'admin.php?page=hmrm-admin-panel',
                ),
                // Set the SDK to work in a sandbox mode (for development & testing).
                // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
                'secret_key'          => 'sk_9N[.f5=rv0RchlIam%}Rc~2q@58Gn',
            ) );
        }

        return $hrm_fs;
    }

    // Init Freemius.
    hrm_fs();
    // Signal that SDK was initiated.
    do_action( 'hrm_fs_loaded' );

    function hrm_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __( 'Hey %1$s' ) . ',<br>' .
            __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'hm-resume-manager' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }
    hrm_fs()->add_filter('connect_message_on_update', 'hrm_fs_custom_connect_message_on_update', 10, 6);

    function hrm_fs_support_forum_url( $wp_support_url ) {
        return 'https://wordpress.org/plugins/hm-resume-manager/';
    }
    hrm_fs()->add_filter( 'support_forum_url', 'hrm_fs_support_forum_url' );

    function hrm_fs_uninstall_cleanup() {

		global $wpdb;
	
		$tbl = $wpdb->prefix . 'options';
		$search_string = HMRM_PRFX .'%';
		
		$sql = $wpdb->prepare( "SELECT option_name FROM $tbl WHERE option_name LIKE %s", $search_string );
		$options = $wpdb->get_results( $sql , OBJECT );
	
		if ( is_array( $options ) && count( $options ) ) {
			
			foreach ( $options as $option ) {
				delete_option( $option->option_name );
				delete_site_option( $option->option_name );
			}
		}
	}
    hrm_fs()->add_action('after_uninstall', 'hrm_fs_uninstall_cleanup');

    hrm_fs()->add_filter( 'pricing/show_annual_in_monthly', '__return_false' );
}