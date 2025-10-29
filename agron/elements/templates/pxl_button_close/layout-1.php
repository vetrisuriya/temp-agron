<?php 
    $is_icon = !empty($settings['btn_icon']['value']) ? 'is-icon' : null;
?>
<button type="button" class="pxl-button pxl-button-close <?php echo esc_attr($is_icon); ?>">
    <?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
</button>
