<?php 
$nav_id = $widget->get_setting('nav_id', pxl_get_element_id($settings));
$btn_hover_style = $widget->get_setting('btn_hover_style', '');
$btn_icon_prev = $widget->get_setting('button_icon_prev', []);
$btn_icon_next = $widget->get_setting('button_icon_next', []);
$entrance_anim = $widget->get_setting('entrance_anim', '');
?>
<div id="<?php echo esc_attr($nav_id); ?>" class="pxl-swiper-navigation <?php echo esc_attr($entrance_anim); ?>">
    <div class="pxl-swiper-button swiper-button-prev <?php echo esc_attr($btn_hover_style); ?>">
        <?php \Elementor\Icons_Manager::render_icon( $btn_icon_prev, [ 'aria-hidden' => 'true', 'class' => 'pxl-button-icon' ], 'i' ); ?>
    </div>
    <div class="pxl-swiper-button swiper-button-next <?php echo esc_attr($btn_hover_style); ?>">
        <?php \Elementor\Icons_Manager::render_icon( $btn_icon_next, [ 'aria-hidden' => 'true', 'class' => 'pxl-button-icon' ], 'i' ); ?>
    </div>
</div>