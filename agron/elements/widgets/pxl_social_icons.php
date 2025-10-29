<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_social_icons',
        'title' => esc_html__('Case Social Icons', 'agron' ),
        'icon' => 'eicon-social-icons',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_social_icons_content',
                    'label' => esc_html__('Social Icons', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(   
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'social_icon',
                                    'label' => esc_html__('Icon', 'agron' ),
                                    'type' => 'icons',
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'social_link',
                                    'label' => esc_html__('Link URL', 'agron' ),
                                    'type' => 'url',
                                ),
                                array(
                                    'name' => 'item_icon_size',
                                    'label' => esc_html__('Icon Size', 'agron' ),
                                    'type' => 'slider',
                                    'control_type' => 'responsive',
                                    'size_units' => ['px', 'custom'],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'separator' => 'before',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-social-icons .pxl-social-item{{CURRENT_ITEM}}'     => 'font-size: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .pxl-social-icons .pxl-social-item{{CURRENT_ITEM}} svg' => 'height: {{SIZE}}{{UNIT}}; width:auto;',
                                    ],
                                ),
                            ),
                            'default' => [
                                [
                                    'social_icon' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/facebook.svg'), 
                                            'id' => 65, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'social_link' => [
                                        'url' => '#'
                                    ],
                                ],
                                [
                                    'social_icon' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/twitter-x.svg'), 
                                            'id' => 69, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'social_link' => [
                                        'url' => '#'
                                    ],
                                ],
                                [
                                    'social_icon' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/dribbble.svg'), 
                                            'id' => 63, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'social_link' => [
                                        'url' => '#'
                                    ],
                                ],
                                [
                                    'social_icon' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/instagram.svg'), 
                                            'id' => 66, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'social_link' => [
                                        'url' => '#'
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Spacing', 'agron' ),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-icons' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_social_icons_style',
                    'label' => esc_html__('Social Icon', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'agron' ),
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
                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item'     => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item svg' => 'height: {{SIZE}}{{UNIT}}; width:auto;',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_size',
                            'label' => esc_html__('Box Size', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_divider',
                            'type' => 'divider',
                        ),
                        array(
                            'name' => 'icon_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'icon_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'icon_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'exclude' => ['image'],
                                            'selector' => '{{WRAPPER}} .pxl-social-icons .pxl-social-item',
                                        ),
                                        array(
                                            'name' => 'icon_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-social-icons .pxl-social-item',
                                        ),
                                        array(
                                            'name'         => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-social-icons .pxl-social-item',
                                        ),
                                        array(
                                            'name' => 'icon_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => ['px', 'custom'],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => ['px', 'custom'],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'icon_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'icon_hover_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-social-icons .pxl-social-item:hover',
                                        ),
                                        array(
                                            'name' => 'icon_transition',
                                            'label' => esc_html__('Transition(s)', 'agron'),
                                            'type'  => 'slider',
                                            'size_units' => ['s'],
                                            'separator' => 'before',
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
                                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'hover_animation',
                                            'label' => esc_html__( 'Hover Animation', 'agron' ),
				                            'type' => 'hover_animation',
                                        ),                                        
                                        array(
                                            'name' => 'hover_icon_scale',
                                            'label' => esc_html__( 'Scale', 'agron' ),
				                            'type' => 'number',
                                            'max' => 2,
                                            'min' => 1,
                                            'step' => 0.05,
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item:hover svg,
                                                {{WRAPPER}} .pxl-social-icons .pxl-social-item:hover i' => 'scale: {{VALUE}}; transition: scale .3s linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'icon_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-social-icons .pxl-social-item:hover',
                                        ),
                                        array(
                                            'name'         => 'icon_hover_box_shadow',
                                            'label' => esc_html__('Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-social-icons .pxl-social-item:hover',
                                        ),
                                        array(
                                            'name' => 'icon_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-social-icons .pxl-social-item:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);