<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'header.php';

// Load Styling
include HMRM_PATH . 'assets/css/resume-front.php';
?>
<div class="hm_cv_top">

    <div class="hmrm-header">

        <div class="hmrm-header-left">
        
            <img src="<?php esc_attr_e( $hmrmPhotograph2 ); ?>" />
        
        </div>
        
        <div class="hmrm-header-right">
            <?php include 'personal-info.php'; ?>
        </div>

    </div>

    <div class="hmrm-level-two">

        <div class="hmrm-level-two-left">
            <?php include 'biographical-info.php'; ?>
        </div>

        <div class="hmrm-level-two-right">
            <?php include 'skills.php'; ?>
        </div>
    </div>

    <?php include 'educations.php'; ?>

    <?php include 'experiences.php'; ?>

    <!-- CERTIFICATION STARTED -->
    <!-- TBA -->
    <!-- CERTIFICATION ENDED -->
    <br>
</div>