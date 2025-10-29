<?php 
    $icon = $widget->get_setting('_icon', []);
    $text = $widget->get_setting('text', '');
    $link = $widget->get_setting('link', []);
    $link_attrs = agron_get_link_attributes($link);
    $wrap_tag = !empty($link_attrs) ? 'a' : 'div'; 
    $text_truncate = !empty($widget->get_setting('text_truncate', '')) ? 'text-truncate' : null;
    $entrance_anim = $widget->get_setting('entrance_anim', '');
    $hover_icon_animation = $widget->get_setting('icon_hover_animation', '');
?>
<<?php echo esc_attr($wrap_tag); ?> class="pxl-icon-text <?php echo esc_attr($entrance_anim); ?>" <?php pxl_print_html($link_attrs); ?>>
    <div class="pxl-icon <?php echo esc_attr($hover_icon_animation); ?>">
        <?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
    </div>
    <div class="pxl-text <?php echo esc_attr($text_truncate); ?>">
        <?php echo esc_html($text); ?>
    </div>
</<?php echo esc_attr($wrap_tag); ?>>