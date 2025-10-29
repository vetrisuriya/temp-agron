<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider',
        'title' => esc_html__('Case Slider', 'agron'),
        'icon' => 'eicon-slides',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'agron-swiper'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_slider_layout',
                    'label' => esc_html__('Layout', 'agron'),
                    'tab' => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'agron'),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => array(
                                '1' => array(
                                    'label' => esc_html__('Layout 1', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/slider-1.webp',
                                ),
                                '2' => array(
                                    'label' => esc_html__('Layout 2', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/slider-2.webp',
                                ),
                                '3' => array(
                                    'label' => esc_html__('Layout 3', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/slider-3.webp',
                                ),
                                '4' => array(
                                    'label' => esc_html__('Layout 4', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/slider-4.webp',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_slider_content',
                    'label' => esc_html__('Slides', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'slides',
                            'label' => esc_html__('Slides', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'slide_layout',
                                    'label' => esc_html__('Slide Layout', 'agron'),
                                    'type' => 'select',
                                    'options' => [
                                        ''  => esc_html__('Select Layout', 'agron'),
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                    ],
                                ),
                                array(
                                    'name' => 'slide_background',
                                    'type' => \Elementor\Group_Control_Background::get_type(),
                                    'control_type' => 'group',
                                    'types' => [ 'classic', 'gradient' ],
                                    'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide{{CURRENT_ITEM}} .slide-background',
                                    'fields_options' => [
                                        'background' => [
                                            'label' => __( 'Background Slide', 'agron' ),
                                        ],
                                    ],
                                ),
                                array(
                                    'name' => 'overlay_background',
                                    'type' => \Elementor\Group_Control_Background::get_type(),
                                    'control_type' => 'group',
                                    'types' => [ 'classic', 'gradient' ],
                                    'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide{{CURRENT_ITEM}} .slide-background::before',
                                    'fields_options' => [
                                        'background' => [
                                            'label' => __( 'Background Overlay', 'agron' ),
                                        ],
                                    ],
                                ),
                                array(
                                    'name' => 'badge_image',
                                    'label' => esc_html__('Badge Image', 'agron'),
                                    'type' => 'media',
                                    'condition' => [
                                        'slide_layout!' => ['1', '2'],
                                    ],
                                ),
                                array(
                                    'name' => 'subtitle',
                                    'label' => esc_html__('Subtitle', 'agron' ),
                                    'type' => 'textarea',
                                    'default' => esc_html__('Subtitle', 'agron'),
                                    'separator' => 'before',
                                    'rows' => 2,
                                    'description' => esc_html__('Highlight use shortcode: [highlight text="..."] or [highlight_image img_id="25"] or [highlight_svg id="26"]', 'agron'),
                                    'condition' => [
                                        'slide_layout!' => ['2'],
                                    ],
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'agron' ),
                                    'type' => 'textarea',
                                    'rows' => 3,
                                    'condition' => [
                                        'slide_layout!' => ['1', '2'],
                                    ],
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'agron' ),
                                    'type' => 'textarea',
                                    'rows' => 5,
                                    'default' => esc_html__('Heading Title', 'agron'),
                                    'label_block' => true,
                                    'description' => esc_html__('Highlight use shortcode: [highlight text="..."] or [highlight_image img_id="123"]', 'agron'),
                                ),
                                array(
                                    'name' => 'title_tag',
                                    'label' => esc_html__('Title HTML Tag', 'agron' ),
                                    'type' => 'select',
                                    'options' => [
                                        'h1' => 'H1',
                                        'h2' => 'H2',
                                        'h3' => 'H3',
                                        'h4' => 'H4',
                                        'h5' => 'H5',
                                        'h6' => 'H6',
                                        'div' => 'div',
                                        'p' => 'p',
                                        'span' => 'span',
                                    ],
                                    'default' => 'h1',
                                    'condition' => [
                                        'title!' => '',
                                    ],
                                ),
                                array(
                                    'name' => 'button_first_heading',
                                    'type' => 'heading',
                                    'label' => esc_html__('Button First', 'agron'),
                                    'separator' => 'before'
                                ),
                                array(
                                    'name' => 'button_first_icon',
                                    'label' => esc_html__('Button Icon', 'agron' ),
                                    'type' => 'icons',
                                    'fa4compatibility' => 'icon',
                                    'default' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/arrow-up-right.svg'), 
                                            'id' => 61, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                ),
                                array(
                                    'name' => 'button_first_text',
                                    'label' => esc_html__('Button Text', 'agron' ),
                                    'type' => 'text',
                                    'default' => esc_html__('Click Here', 'agron'),
                                ),
                                array(
                                    'name' => 'button_first_link',
                                    'label' => esc_html__('Link URL', 'agron' ),
                                    'type' => 'url',
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                                array(
                                    'name' => 'button_second_heading',
                                    'type' => 'heading',
                                    'label' => esc_html__('Button Second', 'agron'),
                                    'separator' => 'before',
                                    'condition' => [
                                        'slide_layout!' => ['2'],
                                    ],
                                ),
                                array(
                                    'name' => 'button_second_icon',
                                    'label' => esc_html__('Button Icon', 'agron' ),
                                    'type' => 'icons',
                                    'fa4compatibility' => 'icon',
                                    'default' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/arrow-up-right.svg'), 
                                            'id' => 61, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'condition' => [
                                        'slide_layout!' => ['2'],
                                    ],
                                ),
                                array(
                                    'name' => 'button_second_text',
                                    'label' => esc_html__('Button Text', 'agron' ),
                                    'type' => 'text',
                                    'default' => esc_html__('Click Here', 'agron'),
                                    'condition' => [
                                        'slide_layout!' => ['2'],
                                    ],
                                ),
                                array(
                                    'name' => 'button_second_link',
                                    'label' => esc_html__('Link URL', 'agron' ),
                                    'type' => 'url',
                                    'default' => [
                                        'url' => '#',
                                    ],
                                    'condition' => [
                                        'slide_layout!' => ['2'],
                                    ],
                                ),
                                array(
                                    'name' => 'slider_item_container',
                                    'label' => esc_html__('Container', 'agron' ),
                                    'type' => 'slider',
                                    'control_type' => 'responsive',
                                    'size_units' => [ 'px', 'custom' ],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-slider .swiper-slide{{CURRENT_ITEM}} .slide-container' => 'max-width: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'slider_container_padding',
                                    'label' => esc_html__('Container Padding', 'agron' ),
                                    'type' => 'dimensions',
                                    'size_units' => [ 'px', 'custom' ],
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-slider .swiper-slide{{CURRENT_ITEM}} .slide-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'slide_item_inner_max_width',
                                    'label' => esc_html__('Inner Max Width', 'agron' ),
                                    'type' => 'slider',
                                    'separator' => 'before',
                                    'control_type' => 'responsive',
                                    'size_units' => [ 'px', 'custom' ],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-slider .swiper-slide{{CURRENT_ITEM}} .slide-inner' => 'max-width: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'slide_item_inner_position',
                                    'label' => esc_html__('Content Position', 'agron'),
                                    'type' => 'choose',
                                    'control_type' => 'responsive',
                                    'options' => array(
                                        'right' => [
                                            'title' => esc_html__('Left', 'agron'),
                                            'icon' => 'eicon-h-align-left',
                                        ],
                                        '' => [
                                            'title' => esc_html__('Center', 'agron'),
                                            'icon' => 'eicon-h-align-center',
                                        ],
                                        'left' => [
                                            'title' => esc_html__('Right', 'agron'),
                                            'icon' => 'eicon-h-align-right',
                                        ],
                                    ),
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-slider .swiper-slide{{CURRENT_ITEM}} .slide-inner' => 'margin-{{VALUE}}: auto;',
                                    ],
                                ),
                                array(
                                    'name' => 'slide_item_inner_align_items_column',
                                    'label' => esc_html__('Align Items', 'agron'),
                                    'type' => 'choose',
                                    'control_type' => 'responsive',
                                    'options' => array(
                                        'start' =>[
                                            'title' => esc_html__('Start', 'agron'),
                                            'icon' => 'eicon-align-start-h',
                                        ],
                                        'center' => [
                                            'title' => esc_html__('Center', 'agron'),
                                            'icon' => 'eicon-align-center-h'
                                        ],
                                        'end' => [
                                            'title' => esc_html__('End', 'agron'),
                                            'icon' => 'eicon-align-end-h',
                                        ],
                                        'stretch' => [
                                            'title' => esc_html__('Stretch', 'agron'),
                                            'icon' => 'eicon-align-stretch-h',
                                        ],
                                    ),
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-slider .swiper-slide{{CURRENT_ITEM}} .slide-inner' => 'align-items: {{VALUE}};'
                                    ],
                                ),
                                array(
                                    'name' => 'slide_item_inner_text_align',
                                    'label' => esc_html__('Text Alignment', 'agron' ),
                                    'type' => 'choose',
                                    'control_type' => 'responsive',
                                    'separator' => 'before',
                                    'options' => [
                                        'left' =>  [
                                            'title' => esc_html__('Left', 'agron'),
                                            'icon' => 'eicon-text-align-left',
                                        ],
                                        'center' =>  [
                                            'title' => esc_html__('Center', 'agron'),
                                            'icon' => 'eicon-text-align-center',
                                        ],
                                        'right' =>  [
                                            'title' => esc_html__('Right', 'agron'),
                                            'icon' => 'eicon-text-align-right',
                                        ],
                                        'justify' =>  [
                                            'title' => esc_html__('Justify', 'agron'),
                                            'icon' => 'eicon-text-align-justify',
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-slider .swiper-slide{{CURRENT_ITEM}} .slide-container' => 'text-align: {{VALUE}};',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                            'default' => [
                                [
                                    'subtitle' => esc_html__('Subtitle', 'agron'),
                                    'title'    => esc_html__('Heading Title', 'agron'),
                                    'button_first_icon' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/arrow-up-right.svg'), 
                                            'id' => 61, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'button_first_text' => esc_html__('Click here', 'agron'),
                                    'button_first_link' => '#',
                                    'button_second_icon' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/arrow-up-right.svg'), 
                                            'id' => 61, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'button_second_text' => esc_html__('Click here', 'agron'),
                                    'button_second_link' => '#'
                                ]
                            ],

                        ),
                    ),
                ),
                array(
                    'name' => 'tab_slider_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array(
                        array(
                            'name' => 'allow_touch_move',
                            'label' => esc_html__('Allow Touch Move', 'agron'),
                            'type' => 'switcher',
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'agron'),
                            'type' => 'switcher',
                            'default' => '',
                        ),
                        array(
                            'name' => 'disable_on_interaction',
                            'label' => esc_html__('Pause on Interaction', 'agron'),
                            'type' => 'switcher',
                            'default' => '',
                            'condition' => [
                                'autoplay!' => '',
                            ],
                        ),
                        array(
                            'name' => 'delay',
                            'label' => esc_html__('Delay', 'agron'),
                            'type' => 'number',
                            'default' => 3000,
                            'condition' => [
                                'autoplay!' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-container' => '--pxl-duration: {{VALUE}}ms;',
                            ],
                        ),
                        array(
                            'name' => 'loop',
                            'label' => esc_html__('Infinite Loop', 'agron'),
                            'type' => 'switcher',
                            'default' => '',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'agron'),
                            'type' => 'number',
                            'default' => 300,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-container' => '--pxl-transition-duration: {{VALUE}}ms;',
                            ],
                        ),
                        array(
                            'name' => 'space_between',
                            'label' => esc_html__('Space Between(px)', 'agron'),
                            'type' => 'number',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper .swiper-inner .swiper-container-fade' => '--pxl-spacing-inline: {{VALUE}}ms;'
                            ]
                        ),
                        array(
                            'name' => 'swiper_pagination',
                            'type' => 'select',
                            'label' => esc_html__('Pagination', 'agron'),
                            'separator' => 'before',
                            'options' => [
                                ''            => esc_html__('None', 'agron'),
                                'bullets'     => esc_html__('Bullets', 'agron'),
                                'progressbar' => esc_html__('Progressbar', 'agron'),
                                'fraction'    => esc_html__('Fraction', 'agron'),
                            ],
                        ),
                        array(
                            'name' => 'swiper_navigation',
                            'label' => esc_html__('Navigation', 'agron'),
                            'type' => 'switcher',
                            'default' => '',
                        ),        
                        array(
                            'name' => 'nav_btn_icon_prev',
                            'label' => esc_html__('Button Icon Prev', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/06/arrow-left.svg'),
                                    'id' => 3614,
                                ],
                                'library' => 'svg',
                            ],
                            'condition' => [
                                'swiper_navigation!' => '',
                            ],
                        ),
                        array(
                            'name' => 'nav_btn_icon_next',
                            'label' => esc_html__('Button Icon Next', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/06/arrow-right.svg'),
                                    'id' => 3615,
                                ],
                                'library' => 'svg',
                            ],
                            'condition' => [
                                'swiper_navigation!' => '',
                            ],
                        ), 
                    ),
                ),
                array(
                    'name' => 'tab_slider_animated',
                    'label' => esc_html__('Animated', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'title_anim_heading',
                                'type' => 'heading',
                                'separator' => 'before',
                                'label' => esc_html__('Title Animation', 'agron' ),
                            ),
                            // array(
                            //     'name' => 'title_animated',
                            //     'type' => 'select',
                            //     'label' => esc_html__('Title Animation', 'agron'),
                            //     'options' => agron_entrance_anim('slider'),
                            //     'default' => ''
                            // ),
                            
                        ),
                        agron_get_animation_options([
                            'prefix' => 'title',
                            'selectors' => '{{WRAPPER}} .pxl-slider .title-text',
                            'type' => 'slider'
                        ]),
                        array(
                            array(
                                'name' => 'button_first_anim_heading',
                                'type' => 'heading',
                                'label' => esc_html__('Button First Animation', 'agron' ),
                            ),
                        ),
                        agron_get_animation_options([
                            'prefix' => 'button_first',
                            'selectors' => '{{WRAPPER}} .pxl-slider .slide-button-first',
                        ]),
                        array(
                            array(
                                'name' => 'button_second_anim_heading',
                                'type' => 'heading',
                                'separator' => 'before',
                                'label' => esc_html__('Button Second Animation', 'agron' ),
                                'condition' => [
                                    'layout!' => ['2'],
                                ]
                            ),
                        ),
                        agron_get_animation_options([
                            'prefix' => 'button_second',
                            'selectors' => '{{WRAPPER}} .pxl-slider .slide-button-second',
                            'condition' => [
                                'layout!' => ['2'],
                            ]
                        ]),
                        array(
                            array(
                                'name' => 'description_anim_heading',
                                'type' => 'heading',
                                'separator' => 'before',
                                'label' => esc_html__('Description Animation', 'agron' ),
                                'condition' => [
                                    'layout' => ['3'],
                                ]
                            ),
                        ),
                        agron_get_animation_options([
                            'prefix' => 'description',
                            'selectors' => '{{WRAPPER}} .pxl-slider .slide-description',
                            'condition' => [
                                'layout' => ['3'],
                            ]
                        ]),
                        array(
                            array(
                                'name' => 'badge_anim_heading',
                                'type' => 'heading',
                                'separator' => 'before',
                                'label' => esc_html__('Badge Animation', 'agron' ),
                                'condition' => [
                                    'layout' => ['3'],
                                ]
                            ),
                        ),
                        agron_get_animation_options([
                            'prefix' => 'badge',
                            'selectors' => '{{WRAPPER}} .pxl-slider .slide-badge',
                            'condition' => [
                                'layout' => ['3'],
                            ]
                        ]),
                    ),
                ),
                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'slider_inner_align_items_column',
                            'label' => esc_html__('Align Items', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => array(
                                'start' =>[
                                    'title' => esc_html__('Start', 'agron'),
                                    'icon' => 'eicon-align-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'agron'),
                                    'icon' => 'eicon-align-center-h'
                                ],
                                'end' => [
                                    'title' => esc_html__('End', 'agron'),
                                    'icon' => 'eicon-align-end-h',
                                ],
                                'stretch' => [
                                    'title' => esc_html__('Stretch', 'agron'),
                                    'icon' => 'eicon-align-stretch-h',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-inner' => 'align-items: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'inner_text_align',
                            'label' => esc_html__('Text Alignment', 'agron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'options' => [
                                'left' =>  [
                                    'title' => esc_html__('Left', 'agron'),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' =>  [
                                    'title' => esc_html__('Center', 'agron'),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' =>  [
                                    'title' => esc_html__('Right', 'agron'),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' =>  [
                                    'title' => esc_html__('Justify', 'agron'),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-container' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'slider_min_height',
                            'label' => esc_html__('Min Height', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-inner' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'slider_inner_padding',
                            'label' => esc_html__('Inner Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'slider_inner_max_w',
                            'label' => esc_html__('Inner Max Width', 'agron' ),
                            'type' => 'slider',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-inner' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'slider_container',
                            'label' => esc_html__('Container', 'agron' ),
                            'type' => 'slider',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-container' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'slider_container_padding',
                            'label' => esc_html__('Container Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'slider_container_margin',
                            'label' => esc_html__('Container Margin', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'subtitle_spacing_bottom',
                            'label' => esc_html__('Subtitle Spacing', 'agron' ),
                            'type' => 'slider',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_hl_spacing',
                            'label' => esc_html__('Title Highlight Spacing', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title .pxl-text-highlight' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_spacing_bottom',
                            'label' => esc_html__('Title Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_max_width',
                            'label' => esc_html__('Title Max Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_gr_spacing',
                            'label' => esc_html__('Button Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .swiper-slide .slide-button-group' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_title_style',
                    'label' => esc_html__('Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'title_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'title_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'title_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title',
                                        ),
                                        array(
                                            'name' => 'title_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'title_highlight',
                                    'label' => esc_html__('Highlight', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'title_hl_block',
                                            'type' => 'choose',
                                            'label' => esc_html__('Width', 'agron'),
                                            'options' => [
                                                'auto' => [
                                                    'title' => esc_html__('Auto', 'agron'),
                                                    'icon' => 'eicon-arrow-right',
                                                ],
                                                '100%' => [
                                                    'title' => esc_html__('100%', 'agron'),
                                                    'icon' => 'eicon-arrow-down',
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title .pxl-text-highlight' => 'display: {{VALUE}}',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_hl_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title .pxl-text-highlight' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_hl_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title .pxl-text-highlight',
                                        ),
                                        array(
                                            'name' => 'title_hl_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide .heading-title .pxl-text-highlight',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_subtitle_style',
                    'label' => esc_html__('Subtitle', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'subtitle_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'subtitle_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'subtitle_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'subtitle_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle',
                                        ),
                                        array(
                                            'name' => 'subtitle_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'subtitle_highlight',
                                    'label' => esc_html__('Highlight', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'subtitle_hl_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle .pxl-text-highlight,
                                                {{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle .pxl-svg-highlight' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'subtitle_hl_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle .pxl-text-highlight',
                                        ),
                                        array(
                                            'name' => 'subtitle_hl_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle .pxl-text-highlight',
                                        ),
                                        array(
                                            'name' => 'subtitle_svg_size',
                                            'label' => esc_html__('SVG Size', 'agron' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => [ 'px', 'custom' ],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 500,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle .pxl-svg-highlight' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'subtitle_img_width',
                                            'label' => esc_html__('Image Width', 'agron' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => [ 'px', 'custom' ],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 500,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle img' => 'width: {{SIZE}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'subtitle_img_height',
                                            'label' => esc_html__('Image Height', 'agron' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => [ 'px', 'custom' ],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 500,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-slider .swiper-slide .heading-subtitle img' => 'height: {{SIZE}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_button_first_style',
                    'label' => esc_html__('Button First', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'button_first_width',
                                'label' => esc_html__('Width', 'agron' ),
                                'type' => 'slider',
                                'size_units' => ['px', 'custom'],
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider .slide-button-first' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'button_first_height',
                                'label' => esc_html__('Height', 'agron' ),
                                'type' => 'slider',
                                'size_units' => ['px', 'custom'],
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider .slide-button-first' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'button_first_typography',
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-first',
                            ),
                            array(
                                'name' => 'divider1',
                                'type' => 'divider',
                            ),
                            array(
                                'name' => 'button_first_controls',
                                'control_type' => 'tab',
                                'tabs' => [
                                    [
                                        'name' => 'button_first_normal',
                                        'label' => esc_html__('Normal', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [  
                                            array(
                                                'name' => 'button_first_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-first' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'button_first_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-first',
                                            ),
                                            array(
                                                'name' => 'button_first_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-first',
                                            ),
                                            array(
                                                'name'         => 'button_first_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-slider .slide-button-first',
                                            ),
                                            array(
                                                'name' => 'button_first_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-first' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'button_first_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-first' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'button_first_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [
                                            array(
                                                'name' => 'button_first_hover_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-first:hover' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'button_first_hover_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic' ],
                                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-first:hover',
                                            ),
                                            array(
                                                'name' => 'button_first_transition',
                                                'label' => esc_html__('Transition(s)', 'agron'),
                                                'type'  => 'slider',
                                                'size_units' => ['s'],
                                                'range' => [
                                                    's' => [
                                                        'min' => 0, 
                                                        'max' => 20
                                                    ],
                                                ],                                            
                                                'default' => [
                                                    'unit' => 's'
                                                ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-first' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                                ]
                                            ),
                                            array(
                                                'name' => 'button_first_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-first:hover',
                                            ),
                                            array(
                                                'name'         => 'button_first_hover_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-slider .slide-button-first:hover',
                                            ),
                                            array(
                                                'name' => 'button_first_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-first:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'button_first_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-first:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                ],
                            ), 
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_button_second_style',
                    'label' => esc_html__('Button Second', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'button_second_width',
                                'label' => esc_html__('Width', 'agron' ),
                                'type' => 'slider',
                                'size_units' => ['px', 'custom'],
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider .slide-button-second' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'button_second_height',
                                'label' => esc_html__('Height', 'agron' ),
                                'type' => 'slider',
                                'size_units' => ['px', 'custom'],
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-slider .slide-button-second' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'button_second_typography',
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-second',
                            ),
                            array(
                                'name' => 'divider2',
                                'type' => 'divider',
                            ),
                            array(
                                'name' => 'button_second_controls',
                                'control_type' => 'tab',
                                'tabs' => [
                                    [
                                        'name' => 'button_second_normal',
                                        'label' => esc_html__('Normal', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [  
                                            array(
                                                'name' => 'button_second_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-second' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'button_second_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-second',
                                            ),
                                            array(
                                                'name' => 'button_second_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-second',
                                            ),
                                            array(
                                                'name'         => 'button_second_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-slider .slide-button-second',
                                            ),
                                            array(
                                                'name' => 'button_second_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-second' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'button_second_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-second' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'button_second_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [
                                            array(
                                                'name' => 'button_second_hover_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-second:hover' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'button_second_hover_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic' ],
                                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-second:hover',
                                            ),
                                            array(
                                                'name' => 'button_second_transition',
                                                'label' => esc_html__('Transition(s)', 'agron'),
                                                'type'  => 'slider',
                                                'size_units' => ['s'],
                                                'range' => [
                                                    's' => [
                                                        'min' => 0, 
                                                        'max' => 20
                                                    ],
                                                ],                                            
                                                'default' => [
                                                    'unit' => 's'
                                                ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-second' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                                ]
                                            ),
                                            array(
                                                'name' => 'button_second_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-slider .slide-button-second:hover',
                                            ),
                                            array(
                                                'name'         => 'button_second_hover_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-slider .slide-button-second:hover',
                                            ),
                                            array(
                                                'name' => 'button_second_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-second:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'button_second_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-slider .slide-button-second:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                ],
                            ), 
                        ),
                    ),
                ),
                swiper_bullets_pagination_style_options(),
                swiper_navigation_button_style_options(),
            ),
        ),
    ),
    agron_get_class_widget_path()
);