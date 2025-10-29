<?php
$images = $widget->get_setting('images', []);
$layout_type = $widget->get_setting('layout_type', 'grid');
$elementor_repeater_item_tmp = null;
$masonry_items = ($layout_type === 'masonry') ? $widget->get_setting('masonry_items', []) : [];
$is_overlay = (bool)$widget->get_setting('is_overlay', '');
if(!empty($images)) : 
    $img_dimension = $widget->get_setting('img_dimension', 'full');
    if($img_dimension === 'custom') {
        $custom_img_dimension = $widget->get_setting('custom_img_dimension', []);
        $img_dimension = (!empty($custom_img_dimension['width']) && !empty($custom_img_dimension['height'])) ? $custom_img_dimension : 'full';
    }
    if($layout_type === 'masonry' || $layout_type === 'grid') : ?>
        <div class="pxl-image-gallery pxl-gallery-lightbox <?php echo esc_attr($layout_type); ?>">
            <?php foreach($images as $key => $image) :
                $img_dimension_tmp = $img_dimension;
                $img_dimension = isset($masonry_items[$key]) ? $masonry_items[$key]['img_dimension_m'] : $img_dimension_tmp;
                if($img_dimension === 'custom') {
                    $img_dimension_m_custom = $masonry_items[$key]['img_dimension_m_custom'];
                    $img_dimension = (!empty($img_dimension_m_custom['width']) && !empty($img_dimension_m_custom['height'])) ? $img_dimension_m_custom : $img_dimension_tmp;
                }
                $get_image = agron_get_image_by_size([
                    'img_id' => $image['id'],
                    'img_dimension' => $img_dimension,
                    'attr' => [
                        'class' => 'pxl-image',
                    ]
                ]);
                $image_url = wp_get_attachment_image_url($image['id'], 'full');
                $elementor_repeater_item     = isset($masonry_items[$key]) ? 'elementor-repeater-item-'.$masonry_items[$key]['_id'] : null;
                $elementor_repeater_item_tmp = ($key === 0) ? $elementor_repeater_item : $elementor_repeater_item_tmp;
            ?>
                <span class="grid-item  <?php echo esc_attr($elementor_repeater_item.' image-'.$key); ?>">
                    <a class="grid-item-inner image-item lightbox" href="<?php echo esc_url($image_url); ?>">
                        <?php pxl_print_html($get_image); ?>
                        <?php if($is_overlay) : ?>
                            <div class="pxl-background-overlay"></div>
                        <?php endif; ?>
                        <span class="preview-icon">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                        </span>
                    </a>
                </span>
                <?php
            endforeach;?>
            <div class="grid-sizer"></div>
        </div>
    <?php else : 
        $effect = $widget->get_setting('effect', 'slide');
        $allow_touch_move = $widget->get_setting('allow_touch_move', '');
        $autoplay = $widget->get_setting('autoplay', false);
        $disable_on_interaction = $widget->get_setting('disable_on_interaction', false);
        $delay = $widget->get_setting('delay', 5000);
        $loop  = $widget->get_setting('loop', false);
        $speed = $widget->get_setting('speed', 500);
        $pagination = $widget->get_setting('swiper_pagination', '');
        $navigation = (bool)$widget->get_setting('swiper_navigation', false);
        $slides_per_view_xs  = $widget->get_setting('slides_per_view_xs', 1);
        $slides_per_view_sm  = $widget->get_setting('slides_per_view_sm', 2);
        $slides_per_view_md  = $widget->get_setting('slides_per_view_md', 3);
        $slides_per_view_lg  = $widget->get_setting('slides_per_view_lg', 4);
        $slides_per_view_xl  = $widget->get_setting('slides_per_view_xl', 5);
        $slides_per_view_xxl = $widget->get_setting('slides_per_view_xxl', 6);
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
        
    ?>
        <div class="pxl-swiper pxl-image-carousel <?php echo esc_attr($swiper_boxshadow); ?>">
            <div class="swiper-inner">
                <div class="swiper-container" data-swiper = "<?php echo esc_attr($swiperParams); ?>">
                    <div class="swiper-wrapper">
                        <?php foreach($images as $image) : 
                            $get_image = agron_get_image_by_size([
                                'img_id' => $image['id'],
                                'img_dimension' => $img_dimension,
                                'attr' => [
                                    'class' => 'pxl-image',
                                ]
                            ]); 
                        ?>
                            <div class="swiper-slide">
                                <?php pxl_print_html($get_image);?>
                                <?php if($is_overlay) : ?>
                                    <div class="pxl-background-overlay"></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php if(!empty($pagination)) : ?>
                <div class="swiper-pagination"></div>
            <?php endif; ?>
            <?php if($navigation) : ?>
                <div class="swiper-navigation <?php echo esc_attr($navigation_hidden_class); ?>" <?php if(!empty($nav_widget_id)) : ?> data-navigation-id="<?php echo esc_attr($nav_widget_id); ?>" <?php endif; ?>>
                    <div class="pxl-swiper-button swiper-button-prev <?php echo esc_attr($swiper_btn_hover_style); ?>">
                        <?php \Elementor\Icons_Manager::render_icon( $swiper_btn_icon_prev, [ 'aria-hidden' => 'true', 'class' => 'pxl-button-icon' ], 'i' ); ?>
                    </div>
                    <div class="pxl-swiper-button swiper-button-next <?php echo esc_attr($swiper_btn_hover_style); ?>">
                        <?php \Elementor\Icons_Manager::render_icon( $swiper_btn_icon_next, [ 'aria-hidden' => 'true', 'class' => 'pxl-button-icon' ], 'i' ); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php 
endif;