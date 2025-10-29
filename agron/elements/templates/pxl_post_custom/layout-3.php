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
    $slides_per_view_sm  = $widget->get_setting('slides_per_view_sm', 1);
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

    $title_tag = $widget->get_setting('title_tag', 'h4');
    $featured_hover_style = $widget->get_setting('featured_hover_style', '');

    $entrance_anim = $widget->get_setting('entrance_anim', '');
    $anim_delay = $widget->get_setting('anim_delay', 0);
?>
    <div class="pxl-swiper pxl-post-custom post-custom-carousel post-custom-layout3">
        <div class="swiper-inner">
            <div class="swiper-container" data-swiper="<?php echo esc_attr($swiperParams); ?>">
                <div class="swiper-wrapper">
                    <?php foreach($items as $key => $item) : 
                        $button_link_attr = agron_get_link_attributes($item['button_link']);
                        $title = $widget->parse_text_editor($item['title'] ?? '');
                    ?>
                    <div class="swiper-slide <?php echo esc_attr($entrance_anim); ?>"
                    <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                        <div class="pxl-post-item <?php if($key === 1) echo 'is-active'; ?>">
                            <svg class="pxl-shape" xmlns="http://www.w3.org/2000/svg" width="424" height="127" viewBox="0 0 424 127" fill="none">
                                <path d="M207.182 102.025C112.745 151.477 29.7121 116.229 0 92.4228V0.000244141H424V114.028C413.159 79.8197 325.227 40.2102 207.182 102.025Z" fill="white" fill-opacity="0.08"/>
                            </svg>
                            <div class="pxl-post-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                            </div>
                            <div class="pxl-post-content">
                                <<?php echo esc_attr($title_tag); ?> class="pxl-post-title">
                                    <?php pxl_print_html($title); ?>
                                </<?php echo esc_attr($title_tag); ?>>
                                <p class="pxl-post-excerpt">
                                    <?php echo esc_html($item['excerpt']); ?>  
                                </p>
                                <div class="button pxl-post-button">
                                    <?php pxl_print_html(agron_get_svg(content_url('/uploads/2025/10/border-circle-dash.svg'))); ?>
                                    <span class="pxl-button-icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $item['button_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                                    </span>
                                </div>
                            </div>
                            <a <?php pxl_print_html($button_link_attr); ?> class="pxl-box-link"></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php 
endif;