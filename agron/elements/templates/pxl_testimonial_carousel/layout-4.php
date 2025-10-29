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
        $swiper_params = [
            'effect'                 => $effect,
            'autoplay'               => (bool)$autoplay,
            'disable_on_interaction' => (bool)$disable_on_interaction,
            'allow_touch_move'       => (bool)$allow_touch_move,
            'delay'                  => $delay,
            'loop'                   => (bool)$loop,
            'speed'                  => $speed,
            'pagination'             => $pagination,
            'navigation'             => $navigation,
            'slides_per_view_xs'     => 1,
            'slides_per_view_sm'     => 1,
            'slides_per_view_md'     => 1,
            'slides_per_view_lg'     => 1,
            'slides_per_view_xl'     => 1,
            'slides_per_view_xxl'    => 1,
        ];
        $swiper_params = json_encode($swiper_params); 
        $swiper_boxshadow = $widget->get_setting('slide_boxshadow', '');
        $nav_widget_id = $widget->get_setting('nav_widget_id', '');
        $navigation_hidden_class = !empty($nav_widget_id) ? 'swiper-navigation-hidden' : null;
        $nav_btn_icon_prev = $widget->get_settings('nav_btn_icon_prev', []);
        $nav_btn_icon_next = $widget->get_settings('nav_btn_icon_next', []);
        
        $show_user = (bool)$widget->get_setting('show_user', '');
        $show_rating = (bool)$widget->get_setting('show_rating', '');
    ?>
    <div class="pxl-testimonial-carousel pxl-testimonial-carousel4 <?php echo esc_attr($swiper_boxshadow); ?>">
        <div class="pxl-swiper testimonial-main">
            <div class="swiper-inner">
                <div class="swiper-container" data-swiper = "<?php echo esc_attr($swiper_params); ?>">
                    <div class="swiper-wrapper">
                        <?php foreach($items as $key => $item) : ?>
                            <div class="swiper-slide">
                                <div class="pxl-testimonial-item">
                                    <?php if($show_rating) : ?>
                                        <div class="pxl-testimonial-rating">
                                            <?php for($i=0; $i<$item['rating']; $i++): ?>
                                                <svg width="18" height="18" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.14894 0.92705C9.4483 0.00573921 10.7517 0.00573969 11.0511 0.92705L12.5921 5.66991C12.726 6.08193 13.1099 6.36089 13.5432 6.36089L18.5301 6.3609C19.4988 6.3609 19.9016 7.60051 19.1179 8.16991L15.0834 11.1012C14.7329 11.3558 14.5862 11.8072 14.7201 12.2192L16.2611 16.9621C16.5605 17.8834 15.506 18.6495 14.7223 18.0801L10.6878 15.1488C10.3373 14.8942 9.8627 14.8942 9.51221 15.1488L5.4777 18.0801C4.69398 18.6495 3.6395 17.8834 3.93885 16.9621L5.4799 12.2192C5.61378 11.8072 5.46712 11.3558 5.11663 11.1012L1.08211 8.16991C0.2984 7.60051 0.701176 6.3609 1.6699 6.3609L6.65684 6.36089C7.09007 6.36089 7.47402 6.08193 7.60789 5.66991L9.14894 0.92705Z" stroke="currentcolor" stroke-width="0.5" fill="currentcolor"/>
                                                </svg>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endif; ?>
                                    <p class="pxl-testimonial-content">
                                        <?php echo esc_html($item['content']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $swiper_thumbs = [
                'effect'                 => $effect,
                'autoplay'               => (bool)$autoplay,
                'disable_on_interaction' => (bool)$disable_on_interaction,
                'allow_touch_move'       => false,
                'delay'                  => $delay,
                'loop'                   => (bool)$loop,
                'speed'                  => $speed,
                'pagination'             => 'none',
                'navigation'             => false,
                'slides_per_view_xs'     => 3,
                'slides_per_view_sm'     => 3,
                'slides_per_view_md'     => 3,
                'slides_per_view_lg'     => 3,
                'slides_per_view_xl'     => 3,
                'slides_per_view_xxl'    => 3,
                'centered_slides'        => true,
            ];
            $swiper_thumbs = json_encode($swiper_thumbs);
        ?>
        <div class="pxl-swiper testimonial-thumbs">
            <div class="swiper-inner">
                <div class="swiper-container swiper-container-fade" data-swiper="<?php echo esc_attr($swiper_thumbs); ?>">
                    <div class="swiper-wrapper">
                        <?php foreach($items as $key => $item) : 
                            $user_image = agron_get_image_by_size([
                                'img_id' => $item['image']['id'],
                                'img_dimension' => 'full',
                                'attr' => [
                                    'class' => 'pxl-image no-lazyload',
                                ]
                            ]);   
                            $active = ($key === 0) ? 'active' : null;
                        ?>
                            <div class="swiper-slide <?php echo esc_attr($active); ?>">
                                <div class="pxl-testimonial-user">
                                    <div class="pxl-user-image">
                                        <div class="pxl-testimonial-icon">
                                            <?php \Elementor\Icons_Manager::render_icon( $settings['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                                        </div>
                                        <?php pxl_print_html($user_image); ?>
                                    </div>
                                    <div class="pxl-user-content">
                                        <span class="pxl-user-title"><?php echo esc_html($item['title']); ?></span>
                                        <div class="pxl-user-name"><?php echo esc_html($item['name']); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
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
<?php endif; ?>