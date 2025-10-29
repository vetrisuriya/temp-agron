<?php 
    $items = $widget->get_setting('items', []);
    if(!empty($items)) : 
        $effect = $widget->get_setting('effect', 'slide');
        $autoplay = $widget->get_setting('autoplay', false);
        $disable_on_interaction = $widget->get_setting('disable_on_interaction', false);
        $allow_touch_move = $widget->get_setting('allow_touch_move', '');
        $delay = $widget->get_setting('delay', 5000);
        $loop  = $widget->get_setting('loop', false);
        $speed = $widget->get_setting('speed', 500);
        $pagination = $widget->get_setting('swiper_pagination', '');
        $navigation = (bool)$widget->get_setting('swiper_navigation', false);
        $slides_per_view     = $widget->get_setting('slides_per_view', 'auto');
        $slides_per_view_xs  = $widget->get_setting('slides_per_view_xs', 1);
        $slides_per_view_sm  = $widget->get_setting('slides_per_view_sm', 1);
        $slides_per_view_md  = $widget->get_setting('slides_per_view_md', 2);
        $slides_per_view_lg  = $widget->get_setting('slides_per_view_lg', 2);
        $slides_per_view_xl  = $widget->get_setting('slides_per_view_xl', 3);
        $slides_per_view_xxl = $widget->get_setting('slides_per_view_xxl', 3);
        $swiperParams = [
            'effect'                 => $effect,
            'autoplay'               => (bool)$autoplay,
            'disable_on_interaction' => (bool)$disable_on_interaction,
            'allow_touch_move'       => (bool)$allow_touch_move,
            'delay'                  => $delay,
            'loop'                   => (bool)$loop,
            'speed'                  => $speed,
            'pagination'             => $pagination,
            'navigation'             => $navigation,
            'slides_per_view'        => $slides_per_view,
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
        
        $show_user = (bool)$widget->get_setting('show_user', '');
        $show_icon = (bool)$widget->get_setting('show_icon', '');
        $entrance_anim = $widget->get_setting('entrance_anim', '');
        $anim_delay = $widget->get_setting('anim_delay', 0);
    ?>
    <div class="pxl-swiper pxl-testimonial-carousel pxl-testimonial-carousel2 <?php echo esc_attr($swiper_boxshadow); ?>">
        <div class="swiper-inner">
            <div class="swiper-container" data-swiper = "<?php echo esc_attr($swiperParams); ?>">
                <div class="swiper-wrapper">
                    <?php foreach($items as $key => $item) : ?>
                        <?php 
                            $user_image = agron_get_image_by_size([
                                'img_id' => $item['image']['id'],
                                'img_dimension' => 'full',
                                'attr' => [
                                    'class' => 'pxl-image no-lazyload',
                                ]
                            ]);    
                        ?>
                        <div class="swiper-slide <?php echo esc_attr($entrance_anim); ?>"
                        <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                            <div class="pxl-testimonial-item">
                                <?php if($show_icon) : ?>
                                    <div class="pxl-testimonial-icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                                    </div>
                                <?php endif; ?>
                                <p class="pxl-testimonial-content">
                                    <?php echo esc_html($item['content']); ?>
                                </p>
                                <?php if($show_user) : ?>
                                    <div class="pxl-testimonial-user">
                                        <div class="pxl-user-image">
                                            <?php pxl_print_html($user_image); ?>
                                        </div>
                                        <div class="pxl-user-content">
                                            <div class="pxl-user-title"><?php echo esc_html($item['title']); ?></div>
                                            <div class="pxl-user-name"><?php echo esc_html($item['name']); ?></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if(!empty($pagination)) : ?>
                <div class="swiper-pagination"></div>
            <?php endif; ?>
            <?php if($navigation) : ?>
                <div class="swiper-navigation <?php echo esc_attr($navigation_hidden_class); ?>" <?php if(!empty($nav_widget_id)) : ?> data-navigation-id="<?php echo esc_attr($nav_widget_id); ?>" <?php endif; ?>>
                    <div class="pxl-swiper-button swiper-button-prev">
                        <?php \Elementor\Icons_Manager::render_icon( $nav_btn_icon_prev, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                    </div>
                    <div class="pxl-swiper-button swiper-button-next">
                        <?php \Elementor\Icons_Manager::render_icon( $nav_btn_icon_next, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>