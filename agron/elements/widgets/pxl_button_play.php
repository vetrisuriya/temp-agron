<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button_play',
        'title' => esc_html__('Case Button Play', 'agron' ),
        'icon' => 'eicon-play',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'agron-effetcs',
            'agron-parallax'
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_btn_content',
                    'label' => esc_html__('Button', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'button_style',
                            'label' => esc_html__('Button Style', 'agron'),
                            'type' => 'select',
                            'options' => [
                                'default' => esc_html__('Defautl', 'agron'),
                                'style1' => esc_html__('Style 1', 'agron'),
                                'custom' => esc_html('Custom', 'agron')
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'video_link',
                            'label' => esc_html__('Video Link', 'agron' ),
                            'type' => 'url',
                        ),
                        array(
                            'name' => 'button_icon',
                            'label' => esc_html__('Button Icon', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'separator' => 'before',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/06/play.svg '),
                                    'id' => 2589, 
                                ],
                                'library' => 'svg',
                            ],
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-button-icon'     => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .pxl-button-icon svg' => 'height: {{SIZE}}{{UNIT}}; width: auto',
                            ],
                        ),
                    ),
                ),
            
                array(
                    'name' => 'tab_btn_style',
                    'label' => esc_html__('Button', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'button_icon_size',
                                'label' => esc_html__('Icon Size', 'agron'),
                                'type' => 'slider',
                                'control_type' => 'responsive' ,
                                'size_units' => ['px', 'custom'],
                                'range' => [
                                    'px' => [
                                        'min' => 0, 
                                        'max' => 1000
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button' => 'font-size: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-button svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;'
                                ],
                            ),
                            array(
                                'name' => 'button_box_size',
                                'label' => esc_html__('Box Size', 'agron'),
                                'type' => 'slider',
                                'control_type' => 'responsive' ,
                                'size_units' => ['px', 'custom'],
                                'range' => [
                                    'px' => [
                                        'min' => 0, 
                                        'max' => 1000
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button'     => '--pxl-box-size: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'divider1',
                                'type' => 'divider',
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
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-button' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-button',
                                            ),
                                            array(
                                                'name' => 'btn_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-button',
                                            ),
                                            array(
                                                'name'         => 'btn_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-button',
                                            ),
                                            array(
                                                'name' => 'btn_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'btn_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [
                                            array(
                                                'name' => 'btn_hover_style',
                                                'label' => esc_html__('Hover Style', 'agron' ),
                                                'type' => 'select',
                                                'default' => '',
                                                'options' => [
                                                    '' => esc_html__('Default', 'agron'),
                                                    'hover-button-parallax' => esc_html__('Parallax', 'agron'),
                                                    'hover-spotlight-scale' => esc_html__('Spotlight Scale', 'agron'),               
                                                ],
                                                'default' => '',
                                            ),
                                            array(
                                                'name' => 'btn_hover_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-button:hover' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic' ],
                                                'selector' => '{{WRAPPER}} .pxl-button:hover:not(.hover-spotlight-scale), {{WRAPPER}} .hover-spotlight-scale .item-spotlight',
                                            ),
                                            array(
                                                'name' => 'btn_transition',
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
                                                    '{{WRAPPER}} .pxl-button' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                                ]
                                            ),
                                            array(
                                                'name' => 'btn_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-button:hover',
                                            ),
                                            array(
                                                'name'         => 'btn_hover_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-button:hover',
                                            ),
                                            array(
                                                'name' => 'btn_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        'selectors' => '{{WRAPPER}} .pxl-button-play',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);