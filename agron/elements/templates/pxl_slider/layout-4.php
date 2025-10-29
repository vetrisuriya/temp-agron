<?php 
    $slides = $widget->get_setting('slides', []);
    if(!empty($slides)) : 
        $autoplay = $widget->get_setting('autoplay', false);
        $disable_on_interaction = $widget->get_setting('disable_on_interaction', false);
        $allow_touch_move = $widget->get_setting('allow_touch_move', '');
        $delay = $widget->get_setting('delay', 5000);
        $loop  = $widget->get_setting('loop', false);
        $speed = $widget->get_setting('speed', 500);
        $pagination = $widget->get_setting('swiper_pagination', '');
        $navigation = (bool)$widget->get_setting('swiper_navigation', false);
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
            'slides_per_view_xs'     => 1,
            'slides_per_view_sm'     => 1,
            'slides_per_view_md'     => 1,
            'slides_per_view_lg'     => 1,
            'slides_per_view_xl'     => 1,
            'slides_per_view_xxl'    => 1,
        ];
        $swiperParams = json_encode($swiperParams); 
        $nav_widget_id = $widget->get_setting('nav_widget_id', '');
        $navigation_hidden_class = !empty($nav_widget_id) ? 'swiper-navigation-hidden' : null;
        $nav_btn_icon_prev = $widget->get_settings('nav_btn_icon_prev', []);
        $nav_btn_icon_next = $widget->get_settings('nav_btn_icon_next', []);


        $title_animated = $widget->get_setting('title_entrance_anim', '');
        $button_first_animated = $widget->get_setting('button_first_entrance_anim', '');
    ?>
        <div class="pxl-slider slider-layout4">
            <div class="swiper-container" data-swiper="<?php echo esc_attr($swiperParams); ?>">
                <div class="swiper-wrapper">
                    <?php foreach($slides as $slide) : 
                        $title = $widget->parse_text_editor( $slide['title'] ?? '' );
                        $title_tag = $slide['title_tag'] ?? 'div';
                        $subtitle = $widget->parse_text_editor( $slide['subtitle'] ?? '' );
                        $button_link_attr = agron_get_link_attributes($slide['button_first_link']);
                    ?>                    
                        <div class="swiper-slide <?php echo esc_attr('elementor-repeater-item-'.$slide['_id']); ?>">
                            <div class="slide-background"></div>  
                            <div class="slide-container">
                                <div class="slide-inner">
                                    <div class="slide-heading">
                                        <div class="subtitle-text <?php echo esc_attr($title_animated); ?>">
                                            <?php pxl_print_html($subtitle); ?>
                                        </div>
                                        <<?php echo esc_attr($title_tag); ?> class="heading-title">
                                            <div class="title-text <?php echo esc_attr($title_animated); ?>">
                                                <?php pxl_print_html($title); ?>
                                            </div>
                                        </<?php echo esc_attr($title_tag); ?>>
                                    </div>
                                    <a <?php pxl_print_html($button_link_attr) ?> class="pxl-button slide-button slide-button-first pxl-button-default <?php echo esc_attr($button_first_animated); ?>">
                                        <span class="pxl-button-text">
                                            <span class="pxl-button-icon icon-duplicated">
                                                <?php \Elementor\Icons_Manager::render_icon( $slide['button_first_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                                            </span>
                                            <?php echo esc_html($slide['button_first_text']); ?>
                                            <span class="pxl-button-icon icon-main">
                                                <?php \Elementor\Icons_Manager::render_icon( $slide['button_first_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                                            </span>
                                        </span>
                                    </a>
                                </div>
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
<?php 
    endif;