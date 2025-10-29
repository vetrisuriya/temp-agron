<?php
    $post_type = $widget->get_setting('post_type', ['service']);
    $tax = ['category'];
    $layout = $widget->get_setting('layout_'.$post_type, 'service-1');
    $layout_type = $widget->get_setting('layout_type', 'grid');
    $select_post_by = $widget->get_setting('select_post_by', '');
    $post_ids = ($select_post_by === 'post_selected') ? $widget->get_setting('source_'.$post_type.'_post_ids', '') : [];
    $source = ($select_post_by === 'term_selected') ? $widget->get_setting('source_'.$post_type , '') : [];
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 6);
    extract(pxl_get_posts_of_grid(
        $post_type, 
        [
            'source' => $source, 
            'orderby' => $orderby, 
            'order' => $order, 
            'limit' => $limit, 
            'post_ids' => $post_ids
        ],
    ));

    if( count($posts) <= 0) : ?>
        <div class="pxl-notification"><?php echo esc_html__( 'No Post Found', 'agron' ); ?></div>;
        <?php return; ?>
    <?php endif;
    
    $title_tag = $widget->get_setting('title_tag', 'h5');
    $img_dimension = $widget->get_setting('img_dimension', 'custom');
    if($img_dimension === 'custom') {
        $custom_img_dimension = $widget->get_setting('custom_img_dimension', []);
        $img_dimension = (!empty($custom_img_dimension['width']) && !empty($custom_img_dimension['height'])) ? $custom_img_dimension : ['width' => 576, 'height' => 814];
    }
    $entrance_anim = $widget->get_setting('entrance_anim', '');
    $anim_delay    = $widget->get_setting('anim_delay', 0);
    $featured_hover_style = $widget->get_setting('featured_hover_style', '');
    $title_hover_style    = $widget->get_setting('title_hover_style', '');
    $show_icon = (bool)$widget->get_setting('show_icon', '');

    $load_more = array(
        'layout_type'     => $layout_type,
        'tax'             => $tax,
        'post_type'       => $post_type,   
        'layout'          => $layout,
        'orderby'         => $orderby,
        'order'           => $order,
        'limit'           => $limit,
        'post_ids'        => $post_ids,
        'title_tag'       => $title_tag,
        'show_icon'      => $show_icon,
        'img_dimension'   => $img_dimension,
        'featured_hover_style' => $featured_hover_style,
        'title_hover_style'    => $title_hover_style,
        'entrance_anim'   => $entrance_anim,
        'anim_delay'      => $anim_delay,
    );
    if($layout_type === 'grid') : 
        $pagination = $widget->get_setting('grid_pagination', '');
        $load_more = array_merge(
            $load_more, 
            [
                'startPage'       => $paged,
                'maxPages'        => $max,
                'total'           => $total,
                'perpage'         => $limit,
                'nextLink'        => $next_link,
                'source'          => $source,
                'pagination'      => $pagination,
            ]
        );
        $wrap_attrs = [
            'class'            => 'grid pxl-service pxl-service-grid pxl-service-layout7',
            'data-start-page'  => $paged,
            'data-max-pages'   => $max,
            'data-total'       => $total,
            'data-perpage'     => $limit,
            'data-next-link'   => $next_link,
            
        ];
        if (!empty($pagination)){
            $wrap_attrs['data-loadmore'] = json_encode($load_more);
        }
        $widget->add_render_attribute( 'wrapper', $wrap_attrs );
    ?>
    <div <?php pxl_print_html($widget->get_render_attribute_string('wrapper')) ?>>
        <div class="grid-inner">
            <?php agron_get_post_template($posts, $load_more); ?>
        </div>
        <?php if ($pagination == 'pagination') : ?>
            <?php agron()->page->get_pagination($query, true); ?>
        <?php endif; 
        if (!empty($next_link) && $pagination === 'loadmore') : ?>
            <div class="grid-load-more ">
                <button type="button" class="button pxl-load-more-button <?php echo esc_attr($load_more_style); ?>">
                    <div class="pxl-button-text"></div>
                </button>
            </div>
        <?php endif; ?>
    </div>
<?php else: 
    wp_enqueue_script('agron-swiper');
    $effect = $widget->get_setting('effect', 'slide');
    $allow_touch_move = $widget->get_setting('allow_touch_move', '');
    $autoplay = $widget->get_setting('autoplay', false);
    $disable_on_interaction = $widget->get_setting('disable_on_interaction', false);
    $delay = $widget->get_setting('delay', 5000);
    $loop  = $widget->get_setting('loop', false);
    $speed = $widget->get_setting('speed', 500);
    $pagination = $widget->get_setting('swiper_pagination', '');
    $navigation = (bool)$widget->get_setting('swiper_navigation', false);
    $custom_slides = (bool)$widget->get_setting('custom_slides', '');
    $slides_per_view_xs  = $widget->get_setting('slides_per_view_xs', 1);
    $slides_per_view_sm  = $widget->get_setting('slides_per_view_sm', 2);
    $slides_per_view_md  = $widget->get_setting('slides_per_view_md', 2);
    $slides_per_view_lg  = $widget->get_setting('slides_per_view_lg', 3);
    $slides_per_view_xl  = $widget->get_setting('slides_per_view_xl', 4);
    $slides_per_view_xxl = $widget->get_setting('slides_per_view_xxl', 4);
    $swiperParams = [
        'effect'                 => $effect,
        'allow_touch_move'       => (bool)$allow_touch_move,
        'autoplay'               => (bool)$autoplay,
        'disable_on_interaction' => (bool)$disable_on_interaction,
        'delay'                  => $delay,
        'loop'                   => (bool)$loop,
        'speed'                  => $speed,
        'pagination'             => $pagination,
        'navigation'             => $navigation,
        'slides_per_view_xs'     => (int)$slides_per_view_xs,
        'slides_per_view_sm'     => (int)$slides_per_view_sm,
        'slides_per_view_md'     => (int)$slides_per_view_md,
        'slides_per_view_lg'     => (int)$slides_per_view_lg,
        'slides_per_view_xl'     => (int)$slides_per_view_xl,
        'slides_per_view_xxl'    => (int)$slides_per_view_xxl,
    ];
    $swiperParams = json_encode($swiperParams); 
    $swiper_boxshadow = $widget->get_setting('slide_boxshadow', '');
    $nav_widget_id = $widget->get_setting('nav_widget_id', '');
    $navigation_hidden_class = !empty($nav_widget_id) ? 'swiper-navigation-hidden' : null;
    $nav_btn_icon_prev = $widget->get_settings('nav_btn_icon_prev', []);
    $nav_btn_icon_next = $widget->get_settings('nav_btn_icon_next', []);

?>
    <div class="pxl-swiper pxl-service pxl-service-carousel pxl-service-layout7 <?php echo esc_attr($swiper_boxshadow); ?>">
        <div class="swiper-inner">
            <div class="swiper-container" data-swiper = "<?php echo esc_attr($swiperParams); ?>">
                <div class="swiper-wrapper">
                    <?php agron_get_post_template($posts, $load_more); ?>
                </div>
                <?php if(!empty($pagination)) : ?>
                    <div class="swiper-pagination"></div>
                <?php endif; ?>
                <?php if($navigation) : ?>
                    <div class="swiper-navigation <?php echo esc_attr($navigation_hidden_class); ?>" <?php if(!empty($nav_widget_id)) : ?> data-navigation-id="<?php echo esc_attr($nav_widget_id); ?>" <?php endif; ?>>
                        <div class="pxl-swiper-button swiper-button-prev">
                            <?php \Elementor\Icons_Manager::render_icon( $nav_btn_icon_prev, [ 'aria-hidden' => 'true', 'class' => 'pxl-button-icon' ], 'i' ); ?>
                        </div>
                        <div class="pxl-swiper-button swiper-button-next">
                            <?php \Elementor\Icons_Manager::render_icon( $nav_btn_icon_next, [ 'aria-hidden' => 'true', 'class' => 'pxl-button-icon' ], 'i' ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
