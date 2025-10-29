<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('Case Button', 'agron' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'agron-parallax',
            'agron-effects',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_btn_content',
                    'label' => esc_html__('Button', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'btn_type',
                            'label' => esc_html__('Type', 'agron' ),
                            'type' => 'select',
                            'default' => '',
                            'options' => [
                                ''               => esc_html__('Link', 'agron' ),
                                'pxl-atc-submit' => esc_html__('Submit', 'agron' ),
                                'pxl-atc-anchor' => esc_html__('Anchor', 'agron'),
                            ],
                        ),
                        array(
                            'name' => 'scroll_offset_top',
                            'label' => esc_html__('Offset Top', 'agron' ),
                            'type' => 'number',
                            'default' => -100,
                            'condition' => [
                                'btn_type' => 'pxl-atc-anchor',
                            ],
                        ),
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Style', 'agron' ),
                            'type' => 'select',
                            'default' => '',
                            'options' => [
                                'pxl-button-default' => esc_html__('Default', 'agron' ),
                                'pxl-button-custom'  => esc_html__('Custom', 'agron' ),
                            ],
                            'default' => 'pxl-button-default',
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Text', 'agron' ),
                            'type' => 'text',
                            'default' => esc_html__('Click Here', 'agron'),
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'submit_to_contact_form_id',
                            'label' => esc_html__('Submit To Form ID', 'agron' ),
                            'type' => 'text',
                            'description' => esc_html__('Enter the ID of the form you want to submit that was created from "Cas Contact Form"', 'agron'),
                            'condition' => [
                                'btn_type' => 'pxl-atc-submit',
                            ],
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Link URL', 'agron' ),
                            'type' => 'url',
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'btn_type!' => 'pxl-atc-submit',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'separator' => 'before',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/05/arrow-up-right.svg'), 
                                    'id' => 61, 
                                ],
                                'library' => 'svg',
                            ],
                        ),
                        array(
                            'name' => 'icon_position',
                            'label' => esc_html__('Icon Position', 'agron' ),
                            'type' => 'choose',
                            'options' => [
                                'row-reverse' => [
                                    'title' => esc_html__('Left', 'agron'),
                                    'icon'  => 'eicon-arrow-left'
                                ],
                                'row' => [
                                    'title' => esc_html__('Right', 'agron'),
                                    'icon'  => 'eicon-arrow-right'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button' => 'flex-direction: {{VALUE}};',
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
                        array(
                            'name' => 'icon_spacing',
                            'label' => esc_html__('Icon Spacing', 'agron'),
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
                                '{{WRAPPER}} .pxl-button' => 'gap: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button.pxl-button-default .pxl-button-text' => '--pxl-spacing-inline: {{SIZE}}{{UNIT}};'
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
                                'name' => 'btn_width',
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
                                    '{{WRAPPER}} .pxl-button' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_h',
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
                                    '{{WRAPPER}} .pxl-button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'button_typography',
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-button',
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
                                            // array(
                                            //     'name' => 'btn_hover_style',
                                            //     'label' => esc_html__('Hover Style', 'agron' ),
                                            //     'type' => 'select',
                                            //     'default' => '',
                                            //     'groups' => [
                                            //         [
                                            //             'label' => esc_html__('Common', 'agron'),
                                            //             'options' => [
                                            //                 'hover-button-default' => esc_html__('Fade'),
                                            //                 'hover-swap-icon-position' => esc_html__('Swap Icon Position', '')
                                            //             ]
                                            //         ],
                                            //         [

                                            //         ]
                                            //     ],
                                            // ),
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
                                                'selector' => '{{WRAPPER}} .pxl-button:hover',
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
                    'name' => 'pxl_motion_effetcs',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'tab' => 'style',
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-button'
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);