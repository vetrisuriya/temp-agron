<?php
$form_style = $widget->get_setting('form_style', '');
$form_custom_id = $widget->get_setting('form_custom_id', '');
$submit_with_button_widget = (bool)$widget->get_setting('submit_with_button_widget', '');
$submit_btn_class = !$submit_with_button_widget ? 'wpcf7-default-submit' : 'wpcf7-hidden-submit';
$contacform_id   = $submit_with_button_widget ? $widget->get_setting('contacform_id', '') : null;
$entrance_anim = $widget->get_setting('entrance_anim', '');
if(class_exists('WPCF7')) : ?>
    <?php if($settings['cf7_id'] != 0) : ?>
        <?php 
            add_filter('wpcf7_autop_or_not', '__return_false'); 
        ?>
        <div class="pxl-contact-form <?php echo esc_attr($entrance_anim); ?>">
            <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($settings['cf7_id']).'" html_id="'.$contacform_id.'" html_class="'.esc_attr($form_style.' wpcf7-'.$settings['cf7_id']).' '.$submit_btn_class.'"]'); ?>
        </div>
    <?php else : ?>
        <div class="pxl-notification"><?php echo esc_html('Choose Your Form'); ?></div>
    <?php endif; ?>
<?php endif; ?>