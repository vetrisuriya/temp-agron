
<?php
    $percent = $widget->get_setting('percent', ['size' => '50']);
    $percent_size = $percent['size'].'%';
    $title = $widget->get_setting('title', '');
    $style = 'progress-bar-'.$widget->get_setting('style', 'default');
?>

<div class="pxl-progress-bar <?php echo esc_attr($style); ?>" style="--pxl-width: <?php echo esc_attr($percent_size); ?>">
    <div class="pxl-progress-bar-meta">
        <div class="pxl-progress-bar-title">
            <?php echo esc_html($title); ?>
        </div>
        <span class="pxl-progress-bar-percent"><?php echo esc_html($percent_size); ?></span>
    </div>
    <div class="pxl-progress-bar-track">
        <span class="pxl-progress-bar-fill wow growWidth"></span>
    </div>
</div>
