<?php
$hmrmCurrentUser = wp_get_current_user();
if(is_array(stripslashes_deep(unserialize(get_option('hmrm_general_settings'))))){
	$hmrmGeneralSettings 	= stripslashes_deep(unserialize(get_option('hmrm_general_settings')));
	$hmrmPhotograph 		= !empty($hmrmGeneralSettings['hmrm_photograph']) ? $hmrmGeneralSettings['hmrm_photograph'] : "";
	$hmrmAuthorName 		= !empty($hmrmGeneralSettings['hmrm_author_name']) ? $hmrmGeneralSettings['hmrm_author_name'] : $hmrmCurrentUser->display_name;
	$hmrmAuthorTitle 		= !empty($hmrmGeneralSettings['hmrm_author_title']) ? $hmrmGeneralSettings['hmrm_author_title'] : '';
	$hmrmAuthorEmail 		= !empty($hmrmGeneralSettings['hmrm_author_email']) ? $hmrmGeneralSettings['hmrm_author_email'] : $hmrmCurrentUser->user_email;
	$hmrmAuthorWebsite 		= !empty($hmrmGeneralSettings['hmrm_author_website']) ? $hmrmGeneralSettings['hmrm_author_website'] : $hmrmCurrentUser->user_url;
	$hmrmCurrentAddress 	= !empty($hmrmGeneralSettings['hmrm_current_address']) ? $hmrmGeneralSettings['hmrm_current_address'] : '';
	$hmrmBiographicalInfo	= !empty($hmrmGeneralSettings['hmrm_biographical_info']) ? wp_kses_post($hmrmGeneralSettings['hmrm_biographical_info']) : '';
	$hmrmContactNo 			= !empty($hmrmGeneralSettings['hmrm_contact_number']) ? $hmrmGeneralSettings['hmrm_contact_number'] : '';
	$hmrmTwitter 			= !empty($hmrmGeneralSettings['hmrm_twitter']) ? $hmrmGeneralSettings['hmrm_twitter'] : '';
	$hmrmFacebook 			= !empty($hmrmGeneralSettings['hmrm_facebook']) ? $hmrmGeneralSettings['hmrm_facebook'] : '';
	$hmrmSkills				= !empty($hmrmGeneralSettings['hmrm_skills']) ? wp_kses_post($hmrmGeneralSettings['hmrm_skills']) : '';
} else{
	$hmrmPhotograph 		= "";
	$hmrmAuthorName 		= $hmrmCurrentUser->display_name;
	$hmrmBiographicalInfo 	= '';
	$hmrmAuthorEmail 		= $hmrmCurrentUser->user_email;
	$hmrmAuthorWebsite 		=  $hmrmCurrentUser->user_url;
	$hmrmCurrentAddress		= '';
	$hmrmAuthorTitle 		= "";
	$hmrmContactNo 			= '';
	$hmrmTwitter			= '';
	$hmrmFacebook 			= '';
	$hmrmSkills				= '';
}
?>

<div class="hm_cv_top">

	<div class="hm_cv_left">
		<div class="hm_cv_photograph">
			<?php
			$hmrmImage = array();
			$hmrmPhotograph2 = "";
			if( intval( $hmrmPhotograph ) > 0 ) {
				$hmrmImage = wp_get_attachment_image_src($hmrmPhotograph, 'fulll', false);
				$hmrmPhotograph2 = $hmrmImage[0];
			} else {  
				$hmrmPhotograph2 = HMRM_ASSETS . 'img/noimage.jpg';
			}
			?>
			<img src="<?php echo esc_attr($hmrmPhotograph2); ?>" class="hmrm-photograph" />
		</div>
		<div class="hm_cv_name">
			<?php echo esc_html($hmrmAuthorName); ?>
		</div>
		<div class="hm_cv_title">
			<?php echo esc_html($hmrmAuthorTitle); ?>
		</div>
		<div class="hm_cv_carrer_summary">
			<?php echo wpautop(wp_kses_post($hmrmBiographicalInfo)); ?>
		</div>
	</div>
	
	<div class="hm_cv_right" style="border:0px solid #000;">
		
		<br />
		
		<!-- PERSONAL INFO STARTED -->
		<div class="hm_cv_social">
			<ul class="hm_cv_social_ul">
				<li id="paddress">
					<div class="social_title"><span class="dashicons dashicons-admin-home"></span> <?php echo esc_html($hmrmCurrentAddress); ?></div>
				</li>
				<li id="website">
					<div class="social_title"><span class="dashicons dashicons-admin-site-alt3"></span> <?php echo esc_html($hmrmAuthorWebsite); ?></div>
				</li>
				<li id="phone">
					<div class="social_title"><span class="dashicons dashicons-phone"></span> <?php echo esc_html($hmrmContactNo); ?></div>
				</li>
				<li id="email">
					<div class="social_title"><span class="dashicons dashicons-email-alt"></span> <?php echo esc_html($hmrmAuthorEmail); ?></div>
				</li>
				<li id="twitter">
					<div class="social_title"><span class="dashicons dashicons-twitter"></span> <?php echo esc_html($hmrmTwitter); ?></div>
				</li>
				<!-- li id="linkedin" style="width:100%;">
					<div class="social_title">bd.linkedin.com/in/xyz</div>
				</li -->
				<li id="linkedin" style="width:100%;">
					<div class="social_title"><span class="dashicons dashicons-facebook-alt"></span> <?php echo esc_html($hmrmFacebook); ?></div>
				</li>
				<div style="clear:both"></div>
			</ul>
		</div>
		<!-- PERSONAL INFO ENDED -->
		
		<br /><br />
		
		<!-- SKILLS STARTED -->
		<div class="hm_cv_skills">
			<div class="hm_cv_skills_title skill">SKILLS</div>
			<div class="hm_skills_items">
				<?php echo wpautop(wp_kses_post($hmrmSkills)); ?>
			</div>
		</div>
		<!-- SKILLS ENDED -->
		
	</div>
	
	<div style="clear:both"></div>
	
	<!-- EDUCATION STARTED -->
	<div class="hm_education">
		<div class="hm_cv_experience_title">EDUCATION</div>
		
		<br />
		<?php
		$hmrm_edu_info_settings = get_option('hmrm_edu_info_settings');
		$hmrmEdu=0;
		if($hmrm_edu_info_settings) {
			for($hmrmEdu=0; $hmrmEdu<count($hmrm_edu_info_settings); $hmrmEdu++){
			?>
			<div class="education_block">
				<div class="hm_cv_experience_cmp edu">
					<b><?php echo esc_html($hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_degree']); ?></b> 
					in <?php echo esc_html($hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_subject']); ?> - 
					<span><?php echo esc_html($hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_start_year']); ?>-<?php echo esc_html($hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_end_year']); ?></span>
				</div>
				<div class="hm_cv_experience_position edu"><?php echo esc_html($hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_school']); ?></div>
				<div class="hm_cv_experience_period edu">CGPA: <?php echo esc_html($hmrm_edu_info_settings[$hmrmEdu]['hmrm_edu_grade']); ?></div>
				<div style="clear:both"></div>
			</div>
			<?php
			}
		}
		?>
		
		<div style="clear:both"></div>
	</div>
	<!-- EDUCATION ENDED -->
	
	<br />
	
	<!-- EXPERIENCE STARTED -->
	<div class="hm_cv_experience">
		<div class="hm_cv_experience_title">EXPERIENCE</div>
		
		<br />
		<?php
		$hmrmExpSettings = get_option('hmrm_exp_settings');
		if($hmrmExpSettings) {
			for($hmrmExp=0; $hmrmExp<count($hmrmExpSettings); $hmrmExp++){
			?>
			<div class="hm_cv_experience_cmp"><?php printf('%d', $hmrmExp+1); ?>. <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_company']); ?></div>
			<div class="hm_cv_experience_position"><?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_job_title']); ?></div>
			<div class="hm_cv_experience_period">
				<?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_start_month']); ?>, <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_start_year']); ?> - 
				<?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_end_month']); ?>, <?php echo esc_html($hmrmExpSettings[$hmrmExp]['hmrm_exp_end_year']); ?>
			</div>
			<?php echo wp_kses_post($hmrmExpSettings[$hmrmExp]['hmrm_exp_role']); ?>
			<br>
			<?php
			}
		} ?>

		<div style="clear:both"></div>
		<br />
	</div>
	<!-- EXPERIENCE ENDED -->
	
	<!-- CERTIFICATION STARTED -->
	<!-- TBA -->
	<!-- CERTIFICATION ENDED -->
</div>