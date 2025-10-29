<?php
/**
 * Template part for displaying default header layout
 */

$header_logo = agron()->get_theme_opt( 'header_mobile_logo', ['url' => get_template_directory_uri().'/assets/img/logo.png'] );
$primary_menu = agron()->get_page_opt('primary_menu');
?>
<header id="pxl-header-default" class="pxl-header">
    <div id="pxl-header-main" class="pxl-header-main">
        <div class="container">
            <div class="pxl-header-inner">
                <div class="pxl-header-logo">
                    <?php
                        if ($header_logo['url']) {
                            printf(
                                '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                esc_url( home_url( '/' ) ),
                                esc_attr( get_bloginfo( 'name' ) ),
                                esc_url( $header_logo['url'] )
                            );
                        }
                    ?>
                </div>
                <div class="pxl-sidebar-menu">
                    <div class="pxl-sidebar-box">
                        <div class="pxl-header-logo pxl-hide-xl">
                            <?php
                                if ($header_logo['url']) {
                                    printf(
                                        '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                        esc_url( home_url( '/' ) ),
                                        esc_attr( get_bloginfo( 'name' ) ),
                                        esc_url( $header_logo['url'] )
                                    );
                                }
                            ?>
                        </div>
                        <?php agron_mobile_search_form(); ?>
                        <nav class="pxl-header-nav">
                            <?php
                                if ( has_nav_menu( 'primary' ) )
                                {
                                    $attr_menu = array(
                                        'theme_location' => 'primary',
                                        'container'  => '',
                                        'menu_id'    => '',
                                        'menu_class' => 'pxl-menu-primary clearfix',
                                        'link_before'     => '<span>',
                                        'link_after'      => '</span>',
                                        'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
                                    );
                                    if(isset($primary_menu) && !empty($primary_menu)) {
                                        $attr_menu['menu'] = $primary_menu;
                                    }
                                    wp_nav_menu( $attr_menu );
                                } else { 
                                    printf(
                                        '<ul class="pxl-menu-primary pxl-primary-menu-not-set"><li><a href="%1$s">%2$s</a></li></ul>',
                                        esc_url( admin_url( 'nav-menus.php' ) ),
                                        esc_html__( 'Create New Menu', 'agron' )
                                    );
                                    ?>
                                <?php }
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="pxl-toggle-menu">
                    <div class="nav-mobile-button pxl-anchor-divider pxl-cursor-cta">
                        <span class="pxl-icon-line pxl-icon-line1"></span>
                        <span class="pxl-icon-line pxl-icon-line2"></span>
                        <span class="pxl-icon-line pxl-icon-line3"></span>
                    </div>
                </div>
                <div class="pxl-header-backdrop"></div>
            </div>
        </div>
    </div>
</header>
