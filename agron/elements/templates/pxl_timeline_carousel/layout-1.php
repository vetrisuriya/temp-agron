<?php 
    $items = $widget->get_setting('items', []);

if(!empty($items)) : 
    $autoplay = $widget->get_setting('autoplay', false);
    $disable_on_interaction = $widget->get_setting('disable_on_interaction', false);
    $delay = $widget->get_setting('delay', 5000);
    $loop = $widget->get_setting('loop', false);
    $speed = $widget->get_setting('speed', 500);
    $pagination = $widget->get_setting('swiper_pagination', '');
    $navigation = $widget->get_setting('swiper_navigation', false);
    $slides_per_view = $widget->get_setting('slides_per_view', 'auto');
    $slides_per_view_xs = $widget->get_setting('slides_per_view_xs', 1);
    $slides_per_view_sm = $widget->get_setting('slides_per_view_sm', 1);
    $slides_per_view_md = $widget->get_setting('slides_per_view_md', 2);
    $slides_per_view_lg = $widget->get_setting('slides_per_view_lg', 3);
    $slides_per_view_xl = $widget->get_setting('slides_per_view_xl', 3);
    $slides_per_view_xxl = $widget->get_setting('slides_per_view_xxl', 4);
    $swiperParams = [
        'autoplay'               => (bool)$autoplay,
        'disable_on_interaction' => (bool)$disable_on_interaction,
        'delay'                  => $delay,
        'loop'                   => (bool)$loop,
        'speed'                  => $speed,
        'pagination'             => $pagination,
        'navigation'             => (bool)$navigation,
        'slides_per_view'        => $slides_per_view,
        'slides_per_view_xs'     => (int)$slides_per_view_xs,
        'slides_per_view_sm'     => (int)$slides_per_view_sm,
        'slides_per_view_md'     => (int)$slides_per_view_md,
        'slides_per_view_lg'     => (int)$slides_per_view_lg,
        'slides_per_view_xl'     => (int)$slides_per_view_xl,
        'slides_per_view_xxl'    => (int)$slides_per_view_xxl,
    ];

    $swiperParams = json_encode($swiperParams);

    $title_tag = $widget->get_setting('title_tag', 'h5');

    $entrance_anim = $widget->get_setting('entrance_anim', '');
?>

    <div class="pxl-swiper pxl-timeline-carousel">
        <div class="swiper-inner">
            <div class="swiper-container" data-swiper = "<?php echo esc_attr($swiperParams); ?>">
                <div class="swiper-wrapper">
                    <?php foreach($items as $key => $item) :   
                        $time      = $item['time'] ?? '';
                        $title      = $item['title']    ?? '';
                        $description = $item['description'] ?? ''; 
                    ?>
                        <div class="swiper-slide <?php echo esc_attr($entrance_anim); ?>">
                            <div class="pxl-timeline-item">
                                <div class="pxl-timeline-time"><?php echo esc_html($time); ?></div>
                                <div class="pxl-timeline-content">
                                    <<?php echo esc_attr($title_tag); ?> class="pxl-timeline-title">
                                        <?php echo esc_html($title); ?>
                                    </<?php echo esc_attr($title_tag); ?>>
                                    <p class="pxl-timeline-description">
                                        <?php echo esc_html($description); ?>
                                    </p>
                                </div>
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