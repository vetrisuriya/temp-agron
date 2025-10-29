<?php 
    $sidebar = $widget->get_settings_for_display( 'sidebar' );
?>
<aside class="pxl-sidebar">
    <?php dynamic_sidebar($sidebar); ?>
</aside>