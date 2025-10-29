<?php
$text = $widget->parse_text_editor( $settings['text'] ?? '' );
$text_style = $widget->get_setting('text_style', '');
$entrance_anim = $widget->get_setting('entrance_anim', '');
$wrap_attrs = [
	'class' => trim('pxl-text-editor '.$text_style.' '.$entrance_anim),
];

if(str_contains($entrance_anim, 'text-animated')) {
	$split_type    = $widget->get_setting('split_type', '');  
	$wrap_attrs['data-split-text'] = $split_type;    
}
$widget->add_render_attribute('wrapper_attrs', $wrap_attrs)

?>
<span <?php pxl_print_html($widget->get_render_attribute_string('wrapper_attrs')); ?>>
	<?php pxl_print_html($text); ?>		
</span>