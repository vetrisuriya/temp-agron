<?php
    $direction = $widget->get_setting('direction', 'rtl');
    $duplicate = (bool)$widget->get_setting('duplicate', '');
    $text = $widget->parse_text_editor( $settings['text'] ?? '' );
    $entrance_anim = $widget->get_setting('entrance_anim', '');
 ?>

<div class="pxl-text-marquee-wrapper <?php echo esc_attr($direction.' '.$entrance_anim); ?>">
    <span class="pxl-text-marquee-item main">
        <?php pxl_print_html($text); ?>
    </span>
    <?php if($duplicate) : ?>
        <span class="pxl-text-marquee-item duplicated">
            <?php pxl_print_html($text); ?>
        </span>
    <?php endif; ?>
</div>