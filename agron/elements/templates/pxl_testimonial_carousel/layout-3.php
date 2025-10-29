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
            'slides_per_view_xs'     => 1,
            'slides_per_view_sm'     => 1,
            'slides_per_view_md'     => 1,
            'slides_per_view_lg'     => 1,
            'slides_per_view_xl'     => 1,
            'slides_per_view_xxl'    => 1,
        ];
        $swiperParams = json_encode($swiperParams); 
        $swiper_boxshadow = $widget->get_setting('slide_boxshadow', '');
        $nav_widget_id = $widget->get_setting('nav_widget_id', '');
        $navigation_hidden_class = !empty($nav_widget_id) ? 'swiper-navigation-hidden' : null;
        $nav_btn_icon_prev = $widget->get_settings('nav_btn_icon_prev', []);
        $nav_btn_icon_next = $widget->get_settings('nav_btn_icon_next', []);
        
        $show_user = (bool)$widget->get_setting('show_user', '');
        $show_icon = (bool)$widget->get_setting('show_icon', '');
    ?>
    <div class="pxl-swiper pxl-testimonial-carousel pxl-testimonial-carousel3 <?php echo esc_attr($swiper_boxshadow); ?>">
        <div class="swiper-inner">
            <div class="testimonial-images image-group" >
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
                <!-- <div class="swiper-subtitle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M2.88363 15.397L3.29441 15.8323C6.83324 15.7357 9.14425 16.2738 11.747 15.6502C15.5055 14.7495 17.6268 11.765 18.5194 8.85015C18.7623 7.89312 18.8953 6.92449 18.9542 5.99332C19.1114 3.50832 19.9999 0.0796472 19.9999 0.0796472C19.9999 0.0796472 11.6624 -0.714337 6.56187 2.71144C1.93136 5.82156 2.52003 10.4616 2.88363 12.6629C3.16597 14.3721 2.88363 15.397 2.88363 15.397Z" fill="#9EC63D"/>
                        <path d="M11.7475 15.299C9.08754 16.096 7.49836 14.9079 3.29492 15.8327L3.78348 16.3504C8.07781 15.6801 8.88719 16.8819 11.7475 16.0248C15.8805 14.7864 17.7517 11.8768 18.5199 8.85059C17.5063 11.6082 15.4498 14.1897 11.7475 15.299Z" fill="#93B230"/>
                        <path d="M5.75627 13.0044C5.69736 13.0044 5.63783 12.9872 5.58556 12.9514C5.44779 12.857 5.41267 12.6687 5.50713 12.531C7.164 10.1137 6.52572 5.49717 6.51908 5.45084C6.49541 5.28553 6.61017 5.13224 6.77548 5.10857C6.9408 5.08486 7.094 5.19955 7.11779 5.36486C7.14634 5.56353 7.79685 10.2603 6.00603 12.873C5.9474 12.9584 5.85267 13.0044 5.75627 13.0044Z" fill="#B7E546"/>
                        <path d="M9.64493 9.04565C9.59001 9.04565 9.53447 9.03073 9.48454 8.99936C9.34306 8.91061 9.30029 8.72393 9.38904 8.58245C9.83118 7.87757 10.0849 6.73979 10.1227 5.29218C10.1517 4.17991 10.042 3.28026 10.0409 3.27128C10.0203 3.10553 10.138 2.95448 10.3037 2.93389C10.4695 2.91374 10.6205 3.03104 10.6411 3.19678C10.6602 3.35112 11.0966 6.9985 9.90142 8.90385C9.844 8.99542 9.7456 9.04565 9.64493 9.04565Z" fill="#B7E546"/>
                        <path d="M9.84834 9.04617C9.71967 9.04617 9.60037 8.9634 9.55982 8.8341C9.50986 8.67473 9.59858 8.505 9.75795 8.45508C12.3901 7.62996 15.194 8.33735 15.3121 8.36781C15.4738 8.40961 15.571 8.57461 15.5292 8.73633C15.4874 8.89801 15.3224 8.99512 15.161 8.95352C15.1336 8.94649 12.4025 8.25992 9.93893 9.03223C9.90877 9.04168 9.8783 9.04617 9.84834 9.04617Z" fill="#B7E546"/>
                        <path d="M6.35315 12.7583C6.22252 12.7583 6.10209 12.6731 6.06323 12.5414C6.01596 12.3812 6.10745 12.213 6.26764 12.1658C9.90163 11.093 13.6376 12.1205 13.7949 12.1647C13.9556 12.21 14.0493 12.377 14.004 12.5378C13.9588 12.6985 13.7919 12.7921 13.6312 12.747C13.5942 12.7367 9.90159 11.7237 6.43889 12.7459C6.41034 12.7544 6.38147 12.7583 6.35315 12.7583Z" fill="#B7E546"/>
                        <path d="M0.511332 19.9727L1.23313 19.4313C3.22985 16.7079 8.60852 10.3724 13.4586 4.88574C10.0091 7.72695 4.93246 12.4366 0.139808 18.8706C-0.0958557 19.187 -0.0262463 19.6355 0.293285 19.8668C0.361254 19.916 0.43516 19.9506 0.511332 19.9727Z" fill="#B7E546"/>
                        <path d="M17.1022 5.21542C17.0248 5.19815 15.5405 4.87483 13.9979 5.0705L13.3576 5.30616L13.1914 5.85347C14.8654 5.34866 16.9492 5.801 16.9707 5.80577C17.1335 5.84202 17.2952 5.73936 17.3315 5.5764C17.3679 5.41347 17.2652 5.25179 17.1022 5.21542Z" fill="#B7E546"/>
                        <path d="M12.8457 5.39559L13.3582 5.30602L13.7068 4.6816C13.7852 4.33234 13.8482 3.93383 13.8953 3.48699C13.9859 2.62687 13.9834 1.91012 13.9832 1.88C13.9823 1.71348 13.8471 1.5791 13.6808 1.5791C13.6803 1.5791 13.6797 1.5791 13.6792 1.5791C13.5122 1.57996 13.3775 1.71605 13.3784 1.88305C13.382 2.58582 13.2882 4.45156 12.8457 5.39559Z" fill="#B7E546"/>
                        <path d="M16.7915 2.31248C16.0579 2.83655 14.9004 3.6978 13.459 4.88498C6.98383 11.255 2.13738 17.6967 0.511719 19.9719C0.794258 20.0539 1.1098 19.9538 1.2884 19.6986C2.77207 17.5782 8.26098 10.0891 16.8698 2.41123C16.9295 2.35807 16.8565 2.26608 16.7915 2.31248Z" fill="#ABD641"/>
                    </svg>
                    <?php echo esc_html__('Our Testimonial', 'agron'); ?>
                </div> -->
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