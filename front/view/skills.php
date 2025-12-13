<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="hmrm-cv-skills">
    
    <div class="hm_cv_skills_title">
        <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $hmrm_skill_label_text ); ?>
    </div>
    
    <div class="hm_skills_items">
        <?php
        if ( $hmrmSkillsSettings ) {

            $hmrmSkillsC = 0;

            foreach ( $hmrmSkillsSettings as $hmrmSkills ) {

                if ( $hmrmSkillsC >= 5 ) { break; } else {
                    ?>
                    <div class="single-progressbar hmrm-skill-item">

                        <h4 class="title"><?php echo esc_html($hmrmSkills['hmrm_skill_name']); ?></h4>

                        <div id="progressbar_<?php printf('%d', $hmrmSkillsC); ?>"
                            data-percentage="<?php echo esc_attr($hmrmSkills['hmrm_skill_percentage']); ?>"
                            data-color="<?php echo esc_attr($hmrmSkills['hmrm_skill_bg_color']); ?>">
                        </div>
                    </div>
                    <?php
                    $hmrmSkillsC++;
                }
            }
        } 
        ?>
    </div>
</div>