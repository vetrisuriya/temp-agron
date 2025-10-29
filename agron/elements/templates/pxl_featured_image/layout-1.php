<?php
    $img_dimension = $widget->get_setting('img_dimension', 'full');
    if($img_dimension === 'custom') {
        $custom_img_dimension = $widget->get_setting('custom_img_dimension', []);
        $img_dimension = (!empty($custom_img_dimension['width']) && !empty($custom_img_dimension['height'])) ? $custom_img_dimension : 'full';
    }
    $img_hover_effect = $widget->get_setting('img_hover_effect', '');
    $link_attrs = agron_get_link_attributes($settings['image_link']);
    $tag  = !is_null($link_attrs) ? 'a' : 'span';
    $thumbnail = agron_get_image_by_size([
        'img_dimension' => $img_dimension,
        'attr' => [
            'class' => 'pxl-image no-lazyload'.$img_hover_effect,
        ]
    ], get_the_ID());
    $entrance_anim = $widget->get_setting('entrance_anim', '');
?>
<<?php echo esc_attr($tag); ?> class="pxl-featured-image-wrapper" <?php pxl_print_html($link_attrs); ?>>
    <?php pxl_print_html($thumbnail); ?>
</<?php echo esc_attr($tag); ?>>
