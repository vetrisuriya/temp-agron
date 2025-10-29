<?php
$default_settings = [
    'date' => '2030/10/10',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
$month = esc_html__('Month', 'agron');
$months = esc_html__('Months', 'agron');
$day = esc_html__('DAYS', 'agron');
$days = esc_html__('DAYS', 'agron');
$hour = esc_html__('HOURS', 'agron');
$hours = esc_html__('HOURS', 'agron');
$minute = esc_html__('MINUTES', 'agron');
$minutes = esc_html__('MINUTES', 'agron');
$second = esc_html__('SECONDS', 'agron');
$seconds = esc_html__('SECONDS', 'agron');
?>
<div class="pxl-countdown-wrapper">
	<div class="pxl-countdown-item" 
		data-month="<?php echo esc_attr($month) ?>"
		data-months="<?php echo esc_attr($months) ?>"
		data-day="<?php echo esc_attr($day) ?>"
		data-days="<?php echo esc_attr($days) ?>"
		data-hour="<?php echo esc_attr($hour) ?>"
		data-hours="<?php echo esc_attr($hours) ?>"
		data-minute="<?php echo esc_attr($minute) ?>"
		data-minutes="<?php echo esc_attr($minutes) ?>"
		data-second="<?php echo esc_attr($second) ?>"
		data-seconds="<?php echo esc_attr($seconds) ?>">
		<div class="pxl-countdown-time" data-count-down="<?php echo esc_attr($date);?>"></div>
	</div>
</div>