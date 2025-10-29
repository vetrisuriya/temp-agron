<?php
$logo  = $widget->get_setting('logo_img', []);
$logo_img  = agron_get_image_by_size( array(
    'img_id'        => $logo['id'],
    'img_dimension' => 'full',
));

$link = $widget->get_setting('logo_link', []);
$link_attrs = agron_get_link_attributes($link);
?>
<a class="pxl-site-logo" <?php pxl_print_html($link_attrs); ?>>
    <?php pxl_print_html($logo_img); ?>
</a>
