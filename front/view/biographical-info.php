<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="hm_cv_name">
    <?php esc_html_e( $hmrmAuthorName ); ?>
</div>
<div class="hm_cv_title">
    <?php esc_html_e( $hmrmAuthorTitle ); ?>
</div>
<div class="hm_cv_carrer_summary">
    <?php echo wpautop( wp_kses_post( $hmrmBiographicalInfo ) ); ?>
</div>