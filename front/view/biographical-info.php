<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="hm_cv_name">
    <?php esc_html_e( $hmrm_author_name ); ?>
</div>
<div class="hm_cv_title">
    <?php esc_html_e( $hmrm_author_title ); ?>
</div>
<div class="hm_cv_carrer_summary">
    <?php echo wpautop( wp_kses_post( $hmrm_biographical_info ) ); ?>
</div>