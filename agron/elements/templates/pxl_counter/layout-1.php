<?php 
    $description = $widget->get_setting('description', '');
    $description = $widget->parse_text_editor($description);
    $number_tag = $widget->get_setting('number_tag', 'div');
    $entrance_anim = $widget->get_setting('entrance_anim', '');

    $number_starting = $widget->get_setting('starting_number', 1);
    $number_ending   = $widget->get_setting('ending_number', 100);
    $number_delimiter = $widget->get_setting('number_delimiter', '');

    $counter_style = 'counter-'.$widget->get_setting('counter_style', 'default');
?>

<div class="pxl-counter <?php echo esc_attr($counter_style.' '.$entrance_anim); ?>">
    <<?php echo esc_attr($number_tag); ?> class="pxl-counter-number"> 
        <?php if(!empty($settings['number_prefix']) || $settings['number_prefix'] == '0') : ?>
            <span class="number-prefix"><?php pxl_print_html($settings['number_prefix']); ?></span>
        <?php endif; ?> 
        <span class="number-value counter" data-delimiter="<?php echo esc_attr($number_delimiter); ?>">
            <?php echo esc_html($number_ending); ?>
        </span>
        <?php if(!empty($settings['number_suffix'])) : ?>
            <span class="number-suffix"><?php pxl_print_html($settings['number_suffix']); ?></span>
        <?php endif; ?> 
    </<?php echo esc_attr($number_tag); ?>>
    <?php if(!empty($description)) : ?>
        <p class="pxl-counter-description">
            <?php pxl_print_html($description); ?>
        </p>
    <?php endif; ?>
</div>