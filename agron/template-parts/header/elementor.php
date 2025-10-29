<?php 
$header_mobile_logo = agron()->get_opt( 'header_mobile_logo', ['url' => get_template_directory_uri().'/assets/img/logo-mobile.png', 'id' => 'null'] );
$primary_menu = agron()->get_page_opt('primary_menu');

$header_display = agron()->get_page_opt('header_display', 'show');

$header_layout = agron()->get_opt('header_layout');
$post_header = get_post($header_layout);

$header_type = get_post_meta( $post_header->ID, 'header_type', true );
$header_mobile_layout = agron()->get_opt('header_mobile_layout');
$header_mobile_layout_count = (int)agron()->get_opt('header_mobile_layout');
$post_header_mobile = get_post($header_mobile_layout);

// Header sticky
$header_sticky_show_on_scroll = agron()->get_opt('header_sticky_show_on_scroll');
$has_header_sticky = isset($args['header_layout_sticky']) && $args['header_layout_sticky'] > 0 || false;
if($header_display === 'show') : ?>
    <header id="pxl-header-elementor" class="pxl-header">
        <div id="pxl-header-desktop" class="<?php echo esc_attr($header_type); ?>">
            <?php if(isset($args['header_layout']) && $args['header_layout'] > 0) : ?>
                <div class="pxl-header-main">
                    <div class="pxl-header-inner">
                        <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['header_layout']); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($has_header_sticky) : ?>
                <div class="pxl-header-sticky pxl-onepage-sticky <?php echo esc_attr($header_sticky_show_on_scroll); ?>">
                    <div class="pxl-header-inner">
                        <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['header_layout_sticky']); ?>
                    </div>
                </div>
        <?php endif; ?>
        </div> 
        <div id="pxl-header-mobile" class="pxl-header-mobile">
                <div class="pxl-header-main">
                    <div class="pxl-header-inner">
                        <?php if ($header_mobile_layout_count <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) : ?>
                            <div class="pxl-header-logo">
                                <?php
                                    if ($header_mobile_logo['url']) {
                                        printf(
                                            '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                            esc_url( home_url( '/' ) ),
                                            esc_attr( get_bloginfo( 'name' ) ),
                                            esc_url( $header_mobile_logo['url'] )
                                        );
                                    }
                                ?>
                            </div>
                            <div class="pxl-toggle-menu">
                                <div class="nav-mobile-button pxl-anchor-divider pxl-cursor-cta">
                                    <span class="pxl-icon-line pxl-icon-line1"></span>
                                    <span class="pxl-icon-line pxl-icon-line2"></span>
                                    <span class="pxl-icon-line pxl-icon-line3"></span>
                                </div>
                            </div>
                        <?php else : ?>
                                <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $header_mobile_layout ); ?>
                        <?php endif; ?>
                        <div class="pxl-sidebar-menu">
                            <div class="pxl-sidebar-box">
                                <div class="pxl-header-logo pxl-hide-xl">
                                    <?php
                                        if ($header_mobile_logo['url']) {
                                            printf(
                                                '<a class="logo" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                                esc_url( home_url( '/' ) ),
                                                esc_attr( get_bloginfo( 'name' ) ),
                                                esc_url( $header_mobile_logo['url'] )
                                            );
                                        }
                                    ?>
                                </div>
                                <?php agron_mobile_search_form(); ?>
                                <nav class="pxl-header-nav">
                                    <?php 
                                        if ( has_nav_menu( 'primary-mobile' ) )
                                        {
                                            $attr_menu = array(
                                                'theme_location' => 'primary-mobile',
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
                                        } elseif ( has_nav_menu( 'primary' ) ) {
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
        
                                        } else { ?>
                                            <ul class="pxl-menu-primary">
                                                <?php wp_list_pages( array(
                                                    'depth'        => 0,
                                                    'show_date'    => '',
                                                    'date_format'  => get_option( 'date_format' ),
                                                    'child_of'     => 0,
                                                    'exclude'      => '',
                                                    'title_li'     => '',
                                                    'echo'         => 1,
                                                    'authors'      => '',
                                                    'sort_column'  => 'menu_order, post_title',
                                                    'link_before'  => '',
                                                    'link_after'   => '',
                                                    'item_spacing' => 'preserve',
                                                    'walker'       => '',
                                                ) ); ?>
                                            </ul>
                                        <?php }
                                    ?>
                                </nav>
                                <div class="pxl-close-menu pxl-button-close"></div>
                            </div>
                        </div>
                        <div class="pxl-header-backdrop"></div>
                    </div>
                </div>
            </div>
    </header>
<?php endif; ?>