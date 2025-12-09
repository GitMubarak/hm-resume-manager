<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- PERSONAL INFO STARTED -->
<div class="hmrm-social">
    <ul class="hmrm-social-ul">
        <?php
        if ( '' !== $hmrmCurrentAddress ) {
            ?>
            <li>
                <div class="social-title">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <?php esc_html_e( $hmrmCurrentAddress ); ?>
                </div>
            </li>
            <?php
        }
        ?>
        <li>
            <div class="social-title">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <?php esc_html_e( $hmrmAuthorWebsite ); ?>
            </div>
        </li>
        <?php
        if ( '' !== $hmrmContactNo ) {
            ?>
            <li>
                <div class="social-title">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <?php esc_html_e( $hmrmContactNo ); ?>
                </div>
            </li>
            <?php
        }
        ?>
        <li>
            <div class="social-title">
                <i class="fa-solid fa-envelope"></i>
                <?php esc_html_e( $hmrmAuthorEmail ); ?>
            </div>
        </li>
        <li>
            <div class="social-title">
                <i class="fa-brands fa-twitter"></i>
                <?php esc_html_e( $hmrmTwitter ); ?>
            </div>
        </li>
        <li>
            <div class="social-title">
                <i class="fa-brands fa-facebook"></i>
                <?php esc_html_e( $hmrmFacebook ); ?>
            </div>
        </li>
    </ul>
</div>
<!-- PERSONAL INFO ENDED -->