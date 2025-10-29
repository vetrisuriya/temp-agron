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
    $slides_per_view_xs  = $widget->get_setting('slides_per_view_xs', 3);
    $slides_per_view_sm  = $widget->get_setting('slides_per_view_sm', 4);
    $slides_per_view_md  = $widget->get_setting('slides_per_view_md', 5);
    $slides_per_view_lg  = $widget->get_setting('slides_per_view_lg', 6);
    $slides_per_view_xl  = $widget->get_setting('slides_per_view_xl', 6);
    $slides_per_view_xxl = $widget->get_setting('slides_per_view_xxl', 7);
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

    $swiper_boxshadow = $widget->get_setting('slide_boxshadow', 'swiper-boxshadow');

    $swiper_navigation_icon_prev = $widget->get_setting('swiper_navigation_icon_prev', []);
    $swiper_navigation_icon_next = $widget->get_setting('swiper_navigation_icon_next', []);
    $nav_id = $widget->get_setting('nav_id', '');
    $navigation_hidden_class = !empty($nav_id) ? 'swiper-navigation-hidden' : null;
?>

    <div class="pxl-swiper pxl-icon-text-carousel">
        <div class="swiper-inner">
            <div class="swiper-container" data-swiper = "<?php echo esc_attr($swiperParams); ?>">
                <div class="swiper-wrapper">
                    <?php foreach($items as $item) : 
                        $link_attr = agron_get_link_attributes($item['link_url']);
                    ?>
                        <div class="swiper-slide">
                            <div class="pxl-icon-text-item">
                                <div class="pxl-icon">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                                </div>
                                <p class="pxl-text">
                                    <?php echo esc_html($item['text']); ?>
                                </p>
                                <a <?php pxl_print_html($link_attr); ?> class="pxl-box-link"></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if(!empty($pagination)) : ?>
                    <div class="swiper-pagination"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; 