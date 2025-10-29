<?php
    $background_effect = $widget->get_setting('background_effect', '');
    if ($background_effect === 'scroll-based-parallax') {
        $parallax_params = [
            'x' => $settings['parallax_x']['size'] ?? 0,
            'y' => $settings['parallax_y']['size'] ?? 0,
            'rotate' => $settings['parallax_rotate']['size'] ?? 0,
            'scale' => $settings['parallax_scale']['size'] ?? 1,
        ];
        $parallax_params = json_encode($parallax_params);
    }
?>
<div class="pxl-background <?php echo esc_attr($background_effect); ?>" 
<?php if($background_effect === 'scroll-based-parallax') : ?> data-based-parallax="<?php echo esc_attr($parallax_params); ?>" <?php endif; ?>></div>