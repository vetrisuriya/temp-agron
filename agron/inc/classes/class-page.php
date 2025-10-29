<?php

if (!class_exists('Agron_Page')) {

    class Agron_Page
    {
        public function get_site_loader(){

            $site_loader = agron()->get_theme_opt( 'site_loader', 'off' );
            if($site_loader == 'on') : ?>
                <div id="preloader" class="preloader">
                    <div class="pxl-loader-spinner">
                        <div class="pxl-loader-bounce1"></div>
                        <div class="pxl-loader-bounce2"></div>
                        <div class="pxl-loader-bounce3"></div>
                    </div>
                </div>
            <?php endif;
        }

        public function get_link_pages() {
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) ); 
        }

        
        public function get_post_title() {
            $post_title_mode = agron()->get_theme_opt('post_title_mode', '');
            $post_title_layout = (int)agron()->get_theme_opt('post_title_layout', 0);
            if(is_singular('project')) {
                $post_title_mode = agron()->get_theme_opt('project_title_mode', '');
                $post_title_layout = (int)agron()->get_theme_opt('project_title_layout', 0);
            }elseif(is_singular('service')) {
                $post_title_mode = agron()->get_theme_opt('service_title_mode', '');
                $post_title_layout = (int)agron()->get_theme_opt('service_title_layout', 0);
            }elseif(is_singular('team')) {
                $post_title_mode = agron()->get_theme_opt('team_title_mode', '');
                $post_title_layout = (int)agron()->get_theme_opt('team_title_layout', 0);
            }elseif(is_singular('product')) {
                $post_title_mode = agron()->get_theme_opt('product_title_mode', '');
                $post_title_layout = (int)agron()->get_theme_opt('product_title_layout', 0);
            }elseif(is_search()) {
                $post_title_mode = agron()->get_theme_opt('search_title_mode', '');
                $post_title_layout = (int)agron()->get_theme_opt('search_title_layout', 0);
            }
            if($post_title_mode === 'disable') return;
            $is_builder = $post_title_mode === 'builder' && $post_title_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' );
            ?>
            <section id="pxl-post-title" class="pxl-post-title">
                <?php if ($is_builder) : ?>
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display($post_title_layout);?>
                <?php else : ?>
                    <?php 
                        $title = $this->get_title();
                        $post_title = $title['title'];    
                    ?>
                    <div class="wrapper">
                        <div class="container">
                            <h1 class="post-title-heading">
                                <span class="pxl-title-text">
                                    <?php echo esc_html($post_title); ?>
                                </span>
                            </h1>
                        </div>
                    </div>
                <?php endif; ?>
            </section>

            <?php
        }

        public function get_page_title(){
            $titles = $this->get_title();
            $page_title_mode   = agron()->get_page_opt('page_title_mode', 'inherit');
            if($page_title_mode === 'inherit') {
                $page_title_mode = agron()->get_theme_opt('page_title_mode', 'default');
            }
            if($page_title_mode === 'disable') return;

            $page_title_layout = (int)agron()->get_opt('page_title_layout', 0);

            $is_page_title_builder = ($page_title_mode === 'builder' && $page_title_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance'));

            if ($is_page_title_builder) : ?>
                <section id="pxl-page-title" class="pxl-page-title page-title-builder">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $page_title_layout);?>
                </section>
            <?php else : ?>
                <section id="pxl-page-title" class="pxl-page-title page-title-default">
                    <div class="pxl-container">
                        <div class="pxl-inner">
                            <h1 class="pxl-page-title-heading"><?php echo esc_html($titles['title']) ?></h1>
                        </div>
                    </div>
                </section>
            <?php endif;
        } 

        public function get_title() {
            $title = '';
            // Default titles
            if ( ! is_archive() ) {
                // Posts page view
                if ( is_home() ) {
                    // Only available if posts page is set.
                    if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                        $title = get_post_meta( $page_for_posts, 'custom_title', true );
                        if ( empty( $title ) ) {
                            $title = get_the_title( $page_for_posts );
                        }
                    }
                    if ( is_front_page() ) {
                        $title = esc_html__( 'Blog', 'agron' );
                    }
                } // Single page view
                elseif ( is_page() ) {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404 Error', 'agron' );
                } elseif ( is_search() ) {
                    $title = esc_html__( 'Search results', 'agron' );
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'agron' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb() {
            if (!class_exists('CASE_Breadcrumb')) 
                return;

            $breadcrumb = new CASE_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if (empty($entries)) 
                return;
            

            ob_start();
            echo '<ul class="pxl-breadcrumb">';
            foreach ($entries as $entry) {
                $entry = wp_parse_args($entry, array(
                    'label' => '',
                    'url'   => ''
                ));

                $entry_label = $entry['label'];
                if (!empty($_GET['blog_title'])) {
                    $blog_title = $_GET['blog_title'];
                    $custom_title = explode('_', $blog_title);
                    foreach ($custom_title as $index => $value) {
                        $arr_str_b[$index] = $value;
                    }
                    $str = implode(' ', $arr_str_b);
                    $entry_label = $str;
                }

                if (empty($entry_label)) {
                    continue;
                }

                echo '<li>';

                if (!empty($entry['url'])) {
                    printf(
                    '<a class="pxl-breadcrumb-link" href="%1$s">%2$s</a>',
                    esc_url($entry['url']),
                    esc_attr($entry_label)
                    );
                } else {
                    $breadcrumb = agron()->get_page_opt('page_breadcrumb', '');
                    $breadcrumb_text = agron()->get_page_opt('page_breadcrumb_text', '');
                    if(is_singular('project')) {
                        $breadcrumb = agron()->get_theme_opt('single_project_breadcrumb', 'default');
                        $breadcrumb_text = agron()->get_theme_opt('single_project_breadcrumb_text', 'Project Details');
                    }elseif(is_singular('service')) {
                        $breadcrumb = agron()->get_theme_opt('single_service_breadcrumb', 'default');
                        $breadcrumb_text = agron()->get_theme_opt('single_service_breadcrumb_text', 'Service Details');
                    }elseif(is_singular('product')) {
                        $breadcrumb = agron()->get_theme_opt('single_product_breadcrumb', 'default');
                        $breadcrumb_text = agron()->get_theme_opt('single_product_breadcrumb_text', 'Single Product');
                    }elseif(is_singular('post')){
                        $breadcrumb = agron()->get_theme_opt('single_post_breadcrumb', 'default');
                        $breadcrumb_text = agron()->get_theme_opt('single_post_breadcrumb_text', 'Blog Details');
                    }elseif(is_singular('team')){
                        $breadcrumb = agron()->get_theme_opt('single_team_breadcrumb', 'default');
                        $breadcrumb_text = agron()->get_theme_opt('single_team_breadcrumb_text', 'Single Team');
                    }elseif(is_search()){
                        $breadcrumb = agron()->get_theme_opt('search_breadcrumb', 'default');
                        $breadcrumb_text = agron()->get_theme_opt('search_breadcrumb_text', 'Search Results');
                    }elseif(is_home()){
                        $breadcrumb = agron()->get_theme_opt('blog_breadcrumb', 'default');
                        $breadcrumb_text = agron()->get_theme_opt('blog_breadcrumb_text', 'Blog');
                    }
                    $entry_label = ($breadcrumb === 'custom' && !empty($breadcrumb_text)) ? $breadcrumb_text : $entry_label;
                    printf('<span class="pxl-breadcrumb-current">%s</span>', esc_html($entry_label));
                }

                echo '</li>';
                echo '<li class="pxl-breadcrumb-separator">
                        <svg class="separator" xmlns="http://www.w3.org/2000/svg" width="12" height="9" viewBox="0 0 12 9" fill="none">
                            <path d="M3.18178 4.09091L-3.17899e-07 0.909077L0.909083 9.13937e-07L5 4.09091L0.909084 8.18176L-3.97373e-08 7.27268L3.18178 4.09091Z" fill="currentcolor"/>
                            <path d="M10.1818 4.09079L7 0.908955L7.90908 -0.000121156L12 4.09079L7.90908 8.18164L7 7.27256L10.1818 4.09079Z" fill="currentcolor"/>
                        </svg>
                    </li>';
                }
            echo '</ul>';

            $output = ob_get_clean();
            if ($output) {
                echo wp_kses( $output, [
                    'ul' => ['class' => true],
                    'li' => ['class' => true],
                    'a'  => ['href' => true, 'class' => true],
                    'span' => ['class' => true],
                    'svg' => [
                        'class' => true,
                        'xmlns' => true,
                        'width' => true,
                        'height' => true,
                        'viewBox' => true,
                        'fill' => true,
                    ],
                    'path' => [
                        'd' => true,
                        'fill' => true,
                    ],
                ] );
            }

        }

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'agron_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path transform="scale(-1,1) translate(-16,0)" d="M12.1716 6.77822L6.8076 1.41421L8.2218 0L16 7.77822L8.2218 15.5563L6.8076 14.1421L12.1716 8.77822H0V6.77822H12.1716Z" fill="currentcolor"/>
                                </svg>',
                'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" >
                                    <path d="M12.1716 6.77822L6.8076 1.41421L8.2218 0L16 7.77822L8.2218 15.5563L6.8076 14.1421L12.1716 8.77822H0V6.77822H12.1716Z" fill="currentcolor"/>
                                </svg>',
                'before_page_number' => '<span>',
                'after_page_number' => '</span>',
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ): 
                $links = preg_replace_callback( '/>(\d+)</', function( $matches ) {
                    $num = (int) $matches[1];
                    $formatted = $num < 10 ? '0' . $num : $num;
                    return '>' . $formatted . '<';
                }, $links );?>
                <div class="grid-pagination <?php echo esc_attr($ajax ? 'ajax' : ''); ?>">
                    <?php printf($links); ?>
                </div>
            <?php endif;
        }
    }
}
