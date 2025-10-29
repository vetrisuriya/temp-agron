<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_marquee',
        'title' => esc_html__('Case Image Marquee', 'agron' ),
        'icon' => 'eicon-photo-library',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_image_content',
                    'label' => esc_html__('Images', 'agron' ),
                    'tab' => 'content',
                    'controls' => array_merge(
                        image_dimension_options(),
                        array(
                            array(
                                'name' => 'images',
                                'label' => esc_html__('Images', 'agron' ),
                                'type' => 'repeater',
                                'controls' => array(
                                    array(
                                        'name' => 'image',
                                        'label' => esc_html__('Image', 'agron' ),
                                        'type' => 'media',
                                    ),
                                    array(
                                        'name' => 'link_url',
                                        'label' => esc_html__('Link URL', 'agron' ),
                                        'type' => 'url',
                                    ),
                                    array(
                                        'name' => 'current_img_dimension',
                                        'label' => esc_html__( 'Dimension Custom', 'agron' ),
                                        'type' => 'image_dimensions',
                                        'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'agron' ),
                                    ),
                                ),
                                // 'title_field' => '{{{link}}}',
                            ),
                            array(
                                'name' => 'addtional_options_heading',
                                'label' => esc_html__('Addtional Options', 'agron'),
                                'type' => 'heading',
                                'separator' => 'before',
                            ),
                            array(
                                'name' => 'direction',
                                'label' => esc_html__('Direction', 'agron'),
                                'type' => 'select',
                                'options' => [
                                    'rtl' => esc_html__('RTL', 'agron'),
                                    'ltr' => esc_html__('LTR', 'agron'),
                                ],
                                'default' => 'rtl',
                            ),
                            array(
                                'name' => 'duration',
                                'label' => esc_html__('Duration', 'agron'),
                                'type' => 'slider',
                                'size_units' => ['ms', 's', 'custom'],
                                'default' => [
                                    'unit' => 's',
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item' => '--pxl-duration: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'gap',
                                'label' => esc_html__('Gap', 'agron'),
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
                                    '{{WRAPPER}} .pxl-image-marquee-wrapper' => '--pxl-spacing: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'pause_on_hover',
                                'label' => esc_html__('Pause on Hover', 'agron'),
                                'type' => 'select',
                                'options' => [
                                    ''       => esc_html__('Off', 'agron'),
                                    'paused' => esc_html__('On', 'agron'),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-image-marquee-wrapper:hover .pxl-image-marquee-item' => 'animation-play-state: {{VALUE}};-webkit-animation-play-state: {{VALUE}};',
                                ],
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'tab_image_style',
                    'label' => esc_html__('Image', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        [
                            'name' => 'img_toggle_size',
                            'label' => esc_html__( 'Image Size', 'agron' ),
                            'type' => 'popover_toggle',
                            'default' => '',
                        ],
                        [
                            'name' => 'img_popover',
                            'type' => 'pxl_start_popover',
                        ],
                        [
                            'name' => 'img_width',
                            'label' => esc_html__('Width', 'agron'),
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
                                '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ],
                        [
                            'name' => 'img_min_width',
                            'label' => esc_html__('Min Width', 'agron'),
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
                                '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ],
                        [
                            'name' => 'img_max_width',
                            'label' => esc_html__('Max Width', 'agron'),
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
                                '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ],
                        [
                            'name' => 'img_height',
                            'label' => esc_html__('Height', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ],
                        [
                            'name' => 'img_popover',
                            'type' => 'pxl_end_popover',
                        ],

                        array(
                            'name' => 'img_opacity',
                            'label' => esc_html__('Opacity', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1,
                                    'step' => 0.01,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name'     => 'img_css_filters',
                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img',
                        ),
                        array(
                            'name' => 'img_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'separator' => 'before',
                            'selector' => '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img',
                        ),
                        array(
                            'name'         => 'img_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img',
                        ),
                        array(
                            'name' => 'img_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'custom', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-image-marquee-wrapper .pxl-image-marquee-image',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);