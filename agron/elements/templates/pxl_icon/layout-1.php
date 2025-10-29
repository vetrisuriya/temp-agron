<?php 
    $link_attrs =  agron_get_link_attributes($settings['icon_link']);
    $tag = !is_null($link_attrs) ? 'a' : 'span';

    $hover_animation = $widget->get_setting('hover_animation', '');
    $hover_animation_class = !empty($hover_animation) ? 'elementor-animation-'.$hover_animation : null;
    $entrance_anim = $widget->get_setting('entrance_anim', '');
?>
<div class="pxl-icon-wrapper <?php echo esc_attr($entrance_anim); ?>">
    <<?php echo esc_attr($tag); ?> <?php pxl_print_html($link_attrs); ?> class="pxl-icon-item <?php echo esc_attr($hover_animation_class); ?>">
        <?php \Elementor\Icons_Manager::render_icon( $settings['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
    </<?php echo esc_attr($tag); ?>>
</div>
