<?php 
$items = $widget->get_setting('items', []);
if(!empty($items)) :
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
    $slides_per_view_lg  = $widget->get_setting('slides_per_view_lg', 2);
    $slides_per_view_xl  = $widget->get_setting('slides_per_view_xl', 3);
    $slides_per_view_xxl = $widget->get_setting('slides_per_view_xxl', 3);
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
    $swiper_boxshadow = $widget->get_setting('slide_boxshadow', 'swiper-normal');
    $swiper_navigation_icon_prev = $widget->get_setting('swiper_navigation_icon_prev', []);
    $swiper_navigation_icon_next = $widget->get_setting('swiper_navigation_icon_next', []);
    $nav_widget_id = $widget->get_setting('nav_widget_id', '');
    $navigation_hidden_class = !empty($nav_widget_id) ? 'swiper-navigation-hidden' : null;

    $img_dimension = $widget->get_setting('img_dimension', 'custom');
    if($img_dimension === 'custom') {
        $custom_img_dimension = $widget->get_setting('custom_img_dimension', []);
        $img_dimension = (!empty($custom_img_dimension['width']) && !empty($custom_img_dimension['height'])) ? $custom_img_dimension : ['width' => 767, 'height' => 930];
    }
    $title_tag = $widget->get_setting('title_tag', 'div');
    $featured_hover_style = $widget->get_setting('featured_hover_style', 'hover-image-default');
    $title_hover_style    = $widget->get_setting('title_hover_style', '');
    $button_hover_style   = $widget->get_setting('btn_hover_style', '');


    $entrance_anim = $widget->get_setting('entrance_anim', '');
    $anim_delay = $widget->get_setting('anim_delay', 0);
?>
    <div class="pxl-swiper pxl-post-custom post-custom-carousel post-custom-layout1">
        <div class="swiper-inner">
            <div class="swiper-container" data-swiper="<?php echo esc_attr($swiperParams); ?>">
                <div class="swiper-wrapper">
                    <?php foreach($items as $key => $item) : 
                        $featured_image = agron_get_image_by_size([
                            'img_id' => $item['featured_image']['id'],
                            'img_dimension' => $img_dimension,
                            'attr' => [
                                'class' => 'pxl-image no-lazyload',
                            ],
                        ]);
                        $link_attr = agron_get_link_attributes($item['button_link']);
                        $title = $widget->parse_text_editor($item['title'] ?? '');
                    ?>
                    <div class="swiper-slide <?php echo esc_attr($entrance_anim); ?> "
                    <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                        <div class="pxl-post-item">
                            <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                                <a <?php pxl_print_html($link_attr); ?> class="pxl-featured-image">
                                    <?php pxl_print_html($featured_image); ?>
                                </a>
                            </div>
                            <<?php echo esc_attr($title_tag); ?> class="pxl-post-title box">
                                    <?php pxl_print_html($title); ?>
                            </<?php echo esc_attr($title_tag); ?>>
                            <div class="pxl-post-content">
                                <div class="pxl-post-icon">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                                </div>
                                <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                                    <a <?php pxl_print_html($link_attr); ?> class="pxl-title-link">
                                        <?php pxl_print_html($title); ?>
                                    </a>
                                </<?php echo esc_attr($title_tag); ?>>
                                <p class="pxl-post-excerpt">
                                    <?php echo esc_html($item['excerpt']); ?>  
                                </p>
                                <a <?php pxl_print_html($link_attr); ?> class="button pxl-post-button pxl-button-default <?php echo esc_attr($button_hover_style); ?>">
                                    <span class="pxl-button-text">
                                        <span class="pxl-button-icon icon-duplicated">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                            </svg>                                    
                                        </span>
                                        <?php echo esc_html($item['button_text']); ?>
                                        <span class="pxl-button-icon icon-main">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                            </svg>                                    
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php 
endif;