<?php
$menu_hover_style = $widget->get_setting('menu_hover_style', '');
add_filter('nav_menu_link_attributes', function($attrs, $item, $args, $depth) use ($menu_hover_style) {
    if ($depth === 0) {
        $attrs['class'] = $menu_hover_style;
    }
    return $attrs;
}, 10, 4);

$submenu_show_effect = $widget->get_setting('submenu_show_effect', 'sub-fade-in-up');
$primary_menu = agron()->get_page_opt('primary_menu');
$menu         = !empty($primary_menu) ? $primary_menu : $widget->get_setting('menu', 0);
$menu_class = 'pxl-menu-primary';
if(!empty($menu)) {
    $menu_attrs = [
        'theme_location' => 'primary',
        'menu_class'   => 'pxl-navigation-menu',
        'walker'       => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
        'link_before'  => '<span class="pxl-menu-text">',
        'link_after'   => '</span><svg class="pxl-menu-icon" xmlns="http://www.w3.org/2000/svg" width="9" height="5" viewBox="0 0 9 5" fill="none">
                                    <path d="M4.09085 3.18178L7.27269 0L8.18176 0.909084L4.09085 5L0 0.909084L0.909083 0L4.09085 3.18178Z" fill="currentcolor"/>
                                </svg>',        
        'menu'         => wp_get_nav_menu_object($menu)
    ];
}elseif(has_nav_menu( 'primary' )) {
    $menu_attrs = array(
        'theme_location' => 'primary',
        'menu_class'     => 'pxl-navigation-menu',
        'link_before'  => '<span class="pxl-menu-text">',
        'link_after'   => '</span><svg class="pxl-menu-icon" xmlns="http://www.w3.org/2000/svg" width="9" height="5" viewBox="0 0 9 5" fill="none">
                                    <path d="M4.09085 3.18178L7.27269 0L8.18176 0.909084L4.09085 5L0 0.909084L0.909083 0L4.09085 3.18178Z" fill="currentcolor"/>
                                </svg>',
        'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
    );
}
?>
<?php wp_nav_menu($menu_attrs); ?>
