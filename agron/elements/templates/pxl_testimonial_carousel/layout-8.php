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
        $slides_per_view_md  = $widget->get_setting('slides_per_view_md', 1);
        $slides_per_view_lg  = $widget->get_setting('slides_per_view_lg', 1);
        $slides_per_view_xl  = $widget->get_setting('slides_per_view_xl', 1);
        $slides_per_view_xxl = $widget->get_setting('slides_per_view_xxl', 1);
        $swiperParams = [
            'effect'                 => 'fade',
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
        
        $show_rating = (bool)$widget->get_setting('show_rating', '');
        $show_user = (bool)$widget->get_setting('show_user', '');

        $entrance_anim = $widget->get_setting('entrance_anim', '');
    ?>
    <div class="pxl-swiper pxl-testimonial-carousel pxl-testimonial-carousel8 <?php echo esc_attr($swiper_boxshadow.' '.$entrance_anim); ?>">
        <div class="swiper-inner">
            <div class="testimonial-images image-group">
                <?php   
                    $img_dimension = $widget->get_setting('img_dimension', 'custom');
                    if($img_dimension === 'custom') {
                        $custom_img_dimension = $widget->get_setting('custom_img_dimension', []);
                        $img_dimension = (!empty($custom_img_dimension['width']) && !empty($custom_img_dimension['height'])) ? $custom_img_dimension : ['width' => 767, 'height' => 778];
                    }
                    foreach($items as $key => $item) : 
                        $active_class = $key === 0 ? 'active' : null;
                        $featured_image = agron_get_image_by_size([
                            'img_id' => $item['featured']['id'],
                            'img_dimension' => $img_dimension,
                            'attr' => [
                                'class' => 'pxl-image no-lazyload '.$active_class,
                            ],
                        ]);
                        pxl_print_html($featured_image);
                ?>
    
                <?php endforeach; ?>
            </div>
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
                        <div class="swiper-slide">
                            <div class="pxl-testimonial-item">
                                <?php if($show_rating) : ?>
                                    <div class="pxl-testimonial-rating">
                                        <?php for($i=0; $i<$item['rating']; $i++): ?>
                                            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.0489 0.928026C11.3483 0.00671506 12.6517 0.00671649 12.9511 0.928027L14.9187 6.98376C15.0526 7.39578 15.4365 7.67474 15.8697 7.67474H22.2371C23.2058 7.67474 23.6086 8.91435 22.8249 9.48376L17.6736 13.2264C17.3231 13.481 17.1764 13.9324 17.3103 14.3444L19.2779 20.4002C19.5773 21.3215 18.5228 22.0876 17.7391 21.5182L12.5878 17.7756C12.2373 17.5209 11.7627 17.5209 11.4122 17.7756L6.2609 21.5182C5.47719 22.0876 4.42271 21.3215 4.72206 20.4002L6.68969 14.3444C6.82356 13.9324 6.6769 13.481 6.32642 13.2264L1.17511 9.48375C0.391392 8.91435 0.794168 7.67474 1.76289 7.67474H8.13026C8.56349 7.67474 8.94744 7.39578 9.08132 6.98376L11.0489 0.928026Z" fill="currentcolor"/>
                                            </svg>
                                        <?php endfor; ?>
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