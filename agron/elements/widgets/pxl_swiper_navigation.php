<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_swiper_navigation',
        'title' => esc_html__('Case Swiper Navigation', 'agron' ),
        'icon' => 'eicon-post-navigation',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_navigation_carousel_content',
                    'label' => esc_html__('Navigation', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'nav_id',
                            'label' => esc_html__('ID', 'agron'),
                            'type' => 'text',
                            'placeholder' => esc_html__('nav-260301', 'agron'),
                            'description' => esc_html__('This ID must be unique and can include letters, numbers, hyphens, or underscores. You will need to copy and paste this ID into the navigation option, replacing the "Additional Options" in the carousel widget.', 'agron'),
                        ),
                        array(
                            'name' => 'button_icon_prev',
                            'label' => esc_html__('Button Icon Prev', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/06/arrow-short-right.svg'),
                                    'id' => 4357,
                                ],
                                'library' => 'svg',
                            ],
                            'condition' => [
                                'swiper_navigation!' => '',
                                'use_swiper_nav_widget' => ''
                            ],
                        ),
                        array(
                            'name' => 'button_icon_next',
                            'label' => esc_html__('Button Icon Next', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/06/arrow-short-right.svg'),
                                    'id' => 4357,
                                ],
                                'library' => 'svg',
                            ],
                            'condition' => [
                                'swiper_navigation!' => '',
                                'use_swiper_nav_widget' => ''
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'max_width',
                                'label' => esc_html__('Max Width', 'agron'),
                                'type' => 'slider',
                                'size_units' => ['px', 'custom', 'custom'],
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}}' => 'max-width: {{SIZE}}{{UNIT}} !important;',
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
                                    '{{WRAPPER}} .pxl-swiper-navigation' => 'gap: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'button_position',
                                'label' => esc_html__('Layout Position', 'agron'),
                                'type' => 'select',
                                'options' => [
                                    '' => esc_html__('Default', 'agron'),
                                    'relative' => esc_html__('Relative', 'agron'),
                                    'absolute' => esc_html__('Absolute', 'agron'),
                                    'static'   => esc_html__('Static', 'agron')
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-navigation' => 'position: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'swiper_nav_css_hidden',
                                'type' => 'hidden',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-navigation' => 'top: 0; left: 0; transform: translate(0, 0); width: auto;'
                                ],
                                'condition' => [
                                    'button_position' => 'relative',
                                ],
                            ),
                            array(
                                'name' => 'direction',
                                'label' => esc_html__('Direction', 'agron'),
                                'type' => 'choose',
                                'control_type' => 'responsive',
                                'options' => array(
                                    'row' => [
                                        'title' => esc_html__('Row', 'agron' ),
                                        'icon' => 'eicon-arrow-right',
                                    ],
                                    'column' => [
                                        'title' => esc_html__('Column', 'agron' ),
                                        'icon' => 'eicon-arrow-down',
                                    ],
                                ),
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-navigation' => 'flex-direction: {{VALUE}};'
                                ],
                                'condition' => [
                                    'button_position!' => 'absolute',
                                ]
                            ),
                            array(
                                'name' => 'justify_content_row',
                                'label' => esc_html__('Justify Content', 'agron'),
                                'type' => 'choose',
                                'control_type' => 'responsive',
                                'options' => array(
                                    'start' => [
                                        'title' => esc_html__('Start', 'agron' ),
                                        'icon' => 'eicon-justify-start-h',
                                    ],
                                    'center' => [
                                        'title' => esc_html__('Center', 'agron' ),
                                        'icon' => 'eicon-justify-center-h',
                                    ],
                                    'end' => [
                                        'title' => esc_html__('End', 'agron' ),
                                        'icon' => 'eicon-justify-end-h',
                                    ],
                                    'space-around' => [
                                        'title' => esc_html__('Space Around', 'agron'),
                                        'icon' => 'eicon-justify-space-around-h',
                                    ],
                                    'space-evenly' => [
                                        'title' => esc_html__('Space Evenly', 'agron'),
                                        'icon' => 'eicon-justify-space-evenly-h',
                                    ],
                                    'space-between' =>  [
                                        'title' => esc_html__('Space Between', 'agron'),
                                        'icon' => 'eicon-justify-space-between-h',
                                    ],
                                ),
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-navigation' => 'justify-content: {{VALUE}};'
                                ],
                                'condition' => [
                                    'direction!' => 'column',
                                    'button_position!' => 'absolute',
                                ]
                            ),
                            array(
                                'name' => 'justify_content_column',
                                'label' => esc_html__('Justify Content', 'agron'),
                                'type' => 'choose',
                                'control_type' => 'responsive',
                                'options' => array(
                                    'start' => [
                                        'title' => esc_html__('Start', 'agron' ),
                                        'icon' => 'eicon-justify-start-v',
                                    ],
                                    'center' => [
                                        'title' => esc_html__('Center', 'agron' ),
                                        'icon' => 'eicon-justify-center-v',
                                    ],
                                    'end' => [
                                        'title' => esc_html__('End', 'agron' ),
                                        'icon' => 'eicon-justify-end-v',
                                    ],
                                    'space-around' => [
                                        'title' => esc_html__('Space Around', 'agron'),
                                        'icon' => 'eicon-justify-space-around-v',
                                    ],
                                    'space-evenly' => [
                                        'title' => esc_html__('Space Evenly', 'agron'),
                                        'icon' => 'eicon-justify-space-evenly-v',
                                    ],
                                    'space-between' => [
                                        'title' => esc_html__('Space Between', 'agron'),
                                        'icon' => 'eicon-justify-space-between-v',
                                    ],
                                ),
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-navigation' => 'justify-content: {{VALUE}};'
                                ],
                                'condition' => [
                                    'direction' => 'column',
                                    'button_position!' => 'absolute',
                                ]
                            ),
                            array(
                                'name' => 'button_position_controls',
                                'control_type' => 'tab',
                                'tabs' => [
                                    [
                                        'name' => 'button_prev_position',
                                        'label' => esc_html__('Prev', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => agron_position_options([
                                            'prefix' => 'button_prev',
                                            'selector' => '{{WRAPPER}} .pxl-swiper-navigation .swiper-button-prev',
                                            'condition' => [
                                                'button_position' => 'absolute'
                                            ]
                                        ]),
                                    ],
                                    [
                                        'name' => 'button_next_position',
                                        'label' => esc_html__('Next', 'agron' ),
                                        'type' => 'tabs',
                                        'controls' => agron_position_options([
                                            'prefix' => 'button_next',
                                            'selector' => '{{WRAPPER}} .pxl-swiper-navigation .swiper-button-next',
                                            'condition' => [
                                                'button_position' => 'absolute'
                                            ]
                                        ]),
                                    ],
                                ],
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_navigation_carousel_style',
                    'label' => esc_html__('Navigation Carousel', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'justify_content',
                                'label' => esc_html__('Justify Content', 'agron'),
                                'type' => 'choose',
                                'control_type' => 'responsive',
                                'options' => array(
                                    'start' => [
                                        'title' => esc_html__('Start', 'agron' ),
                                        'icon' => 'eicon-justify-start-h',
                                    ],
                                    'center' => [
                                        'title' => esc_html__('Center', 'agron' ),
                                        'icon' => 'eicon-justify-center-h',
                                    ],
                                    'end' => [
                                        'title' => esc_html__('End', 'agron' ),
                                        'icon' => 'eicon-justify-end-h',
                                    ],
                                ),
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-navigation' => 'justify-content: {{VALUE}};'
                                ],
                            ),
                            array(
                                'name' => 'btn_box_sz',
                                'label' => esc_html__('Box Size', 'agron' ),
                                'type' => 'slider',
                                'size_units' => ['px', '%', 'custom'],
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_icon_sz',
                                'label' => esc_html__('Icon Size', 'agron' ),
                                'type' => 'slider',
                                'size_units' => ['px', '%', 'custom'],
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button' => 'font-size: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;'
                                ],
                            ),
                            array(
                                'name' => 'btn_typography',
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button',
                            ),
                            array(
                                'name' => 'btn_text_shadow',
                                'label' => esc_html__('Text Shadow', 'agron' ),
                                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button',
                            ),
                            array(
                                'name' => 'btn_controls',
                                'control_type' => 'tab',
                                'tabs' => [
                                    [
                                        'name' => 'btn_normal',
                                        'label' => esc_html__('Normal', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [  
                                            array(
                                                'name' => 'btn_color',
                                                'label' => esc_html__('Text Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_bg',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button',
                                            ),
                                            array(
                                                'name' => 'btn_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button',
                                            ),
                                            array(
                                                'name'         => 'btn_box_shadow',
                                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button',
                                            ),
                                            array(
                                                'name' => 'btn_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', '%', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', '%', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'btn_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tabs',
                                        'controls' => [
                                            array(
                                                'name' => 'btn_hover_style',
                                                'label' => esc_html__('Hover Style', 'agron' ),
                                                'type' => 'select',
                                                'options' => [
                                                    'hover-default' => esc_html__('Default', 'agron'),
                                                    'hover-scaley-fill' => esc_html__('Grow Height', 'agron'),
                                                ],
                                                'default' => 'hover-default',
                                            ),
                                            array(
                                                'name' => 'btn_hove_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button:hover' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_bg',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button:hover',
                                            ),
                                            array(
                                                'name' => '_btn_hover_border_color',
                                                'label' => esc_html__('Border Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button:hover' => 'border-color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button:hover',
                                            ),
                                            array(
                                                'name'         => 'btn_hover_box_shadow',
                                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button:hover',
                                            ),
                                            array(
                                                'name' => 'btn_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', '%', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', '%', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-swiper-navigation .pxl-swiper-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-swiper-navigation',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);