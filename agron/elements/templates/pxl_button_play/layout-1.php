<?php 
$video_link = $widget->get_setting('video_link', []);
$button_style = 'button-play-'.$widget->get_setting('button_style', 'default');
$button_hover_style = $widget->get_setting('btn_hover_style', '');
$entrance_anim = $widget->get_setting('entrance_anim', '');
?>
<a href="<?php echo esc_url($video_link['url'] ?? null) ?>" class="pxl-button pxl-button-play pxl-action-popup <?php echo esc_attr($button_style.' '.$button_hover_style.' '.$entrance_anim); ?>">
    <span class="pxl-button-icon">
        <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
    </span>
</a>