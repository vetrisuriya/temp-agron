
<?php 
    $title = $widget->get_setting('title', '');
    $percent = $widget->get_setting('percent', 50);
    $chart_size = $widget->get_setting('chart_size', 85);
    $line_width = $widget->get_setting('line_width', 5);
    $bar_color = $widget->get_setting('bar_color', '#000');
    $track_color = $widget->get_setting('track_color', '#FFF');
    $line_cap = $widget->get_setting('line_cap', '');
    $rotate = $widget->get_setting('rotate', 0);
    $params = [
        'chartSize'    => $chart_size,
        'lineWidth' => $line_width,
        'barColor' => $bar_color,
        'trackColor' => $track_color,
        'lineCap'    => $line_cap,   
        'rotate'  => $rotate
    ];
    $params = json_encode($params);

    $layout_style = $widget->get_setting('layout_style', 'pie-chart-default');
?>
<div class="pxl-pie-chart <?php echo esc_attr($layout_style); ?>">
    <div class="pxl-chart" data-percent="<?php echo esc_attr($percent); ?>" data-pie-chart="<?php echo esc_attr($params); ?>">
        <span class="pxl-percent">
            <?php echo esc_html($percent.'%'); ?>
        </span>
    </div>
    <div class="pxl-title">
        <span class="pxl-title-text">
            <?php echo esc_html($title); ?>
        </span>
    </div>
</div>