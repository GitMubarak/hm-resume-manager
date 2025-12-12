<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="hmrm-social">
    <ul class="hmrm-social-ul">
        <?php
        if ( '' !== $hmrm_current_address ) {
            ?>
            <li>
                <div class="social-title">
                    <i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $hmrm_current_address ); ?>
                </div>
            </li>
            <?php
        }
        
        if ( '' !== $hmrm_author_website ) {
            ?>
            <li>
                <div class="social-title">
                    <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;<?php echo esc_url( $hmrm_author_website ); ?>
                </div>
            </li>
            <?php
        }

        if ( '' !== $hmrm_contact_number ) {
            ?>
            <li>
                <div class="social-title">
                    <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $hmrm_contact_number ); ?>
                </div>
            </li>
            <?php
        }

        if ( '' !== $hmrm_author_email ) {
            ?>
            <li>
                <div class="social-title">
                    <i class="fa-solid fa-envelope"></i>&nbsp;<?php esc_html_e( $hmrm_author_email ); ?>
                </div>
            </li>
            <?php
        }

        if ( '' !== $hmrm_twitter ) {
            ?>
            <li>
                <div class="social-title">
                    <i class="fa-brands fa-twitter"></i>&nbsp;<?php esc_html_e( $hmrm_twitter ); ?>
                </div>
            </li>
            <?php
        }

        if ( '' !== $hmrm_facebook ) {
            ?>
            <li>
                <div class="social-title">
                    <i class="fa-brands fa-facebook"></i>&nbsp;<?php esc_html_e( $hmrm_facebook ); ?>
                </div>
            </li>
            <?php
        }
        ?>
    </ul>
</div>