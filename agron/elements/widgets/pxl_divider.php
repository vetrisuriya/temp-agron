<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_divider',
        'title' => esc_html__('Case Divider', 'agron' ),
        'icon' => 'eicon-divider',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_divider_content',
                    'label' => esc_html__('Divider', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'divider_css_hidden',
                            'type' => 'hidden',
                            'selectors' => [
                                '{{WRAPPER}}' => 'pointer-events: none;',
                            ]
                        ),
                        array(
                            'name' => 'divider_direction',
                            'label' => esc_html__('Direction', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                'horizontal' => esc_html__('Horizontal', 'agron'),
                                'vertical'   => esc_html__('Vertical', 'agron'),
                            ],
                            'default' => 'horizontal',
                        ),
                        array(
                            'name' => 'divider_style',
                            'label' => esc_html__('Divider Style', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                ''       => esc_html__('Default', 'agron'),
                                'solid'  => esc_html__('Solid', 'agron'),
                                'dashed' => esc_html__('Dashed', 'agron'),
                                'dotted' => esc_html__('Dotted', 'agron'),
                                'double' => esc_html__('Double', 'agron'),
                                'custom' => esc_html__('Custom', 'agron'),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'divider_custom',
                            'label' => esc_html__('Upload', 'agron'),
                            'type' => 'media',
                            'condition' => [
                                'divider_style' => 'custom',
                            ]
                        ),
                        array(
                            'name' => 'divider_element',
                            'label' => esc_html__('Add Element', 'agron' ),
                            'type' => 'select',
                            'separator' => 'before',
                            'options' => [
                                ''                  => esc_html__('None', 'agron'),
                                'title' => esc_html__('Text', 'agron'),
                                'icon'  => esc_html__('Icon', 'agron'),
                                'elements' => esc_html__('Many Elements', 'agron'),
                            ],
                            'default' => '',
                            'condition' => [
                                'divider_direction' => 'horizontal'
                            ],
                        ),

                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'condition' => [
                                'divider_element' => 'elements',
                                'divider_direction' => 'horizontal'
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'divider_element_icon',
                                    'label' => esc_html__('Icon', 'agron'),
                                    'type' => 'icons',
                                    'fa4compatibility' => 'icon',
                                    'default' => [
                                        'value' => 'fas fa-star',
                                        'library' => 'Font Awesome 5 Free',
                                    ],
                                ),
                                array(
                                    'name' => 'divider_element_offset_left',
                                    'label' => esc_html__('Left', 'agron' ),
                                    'type' => 'slider',
                                    'separator' => 'before',
                                    'size_units' => ['px', 'custom'],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-divider-wrapper {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};'
                                    ]
                                ),
                                array(
                                    'name' => 'divider_element_offset_right',
                                    'label' => esc_html__('Right', 'agron' ),
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
                                        '{{WRAPPER}} .pxl-divider-wrapper {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};'
                                    ]
                                ),
                                array(
                                    'name' => 'divider_element_size',
                                    'label' => esc_html__('Font Size', 'agron' ),
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
                                        '{{WRAPPER}} .pxl-divider-wrapper {{CURRENT_ITEM}}' => 'font-size: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .pxl-divider-wrapper {{CURRENT_ITEM}} svg' => 'height: {{SIZE}}{{UNIT}}; width:auto;', 
                                    ]
                                ),
                                array(
                                    'name' => 'dvider_element_color',
                                    'label' => esc_html__('Color', 'agron'),
                                    'type' => 'color',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-divider-wrapper {{CURRENT_ITEM}}' => 'color: {{VALUE}};'
                                    ],
                                ),
                                array(
                                    'name' => 'divider_element_display',
                                    'label' => esc_html__('Display', 'agron'),
                                    'control_type' => 'responsive',
                                    'type' => 'select',
                                    'options' => [
                                        ''       => esc_html__('Auto', 'agron'),
                                        'none' => esc_html__('None', 'agron'),
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-divider-wrapper {{CURRENT_ITEM}}' => 'display: {{VALUE}};',
                                    ],
                                ),
                            ),
                        ),
                        array(
                            'name' => 'divider_icon',
                            'label' => esc_html__('Icon', 'agron'),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-star',
                                'library' => 'Font Awesome 5 Free',
                            ],
                            'condition' => [
                                'divider_element' => 'icon',
                                'divider_direction' => 'horizontal'
                            ],
                        ),
                        array(
                            'name' => 'divider_title',
                            'type' => 'textarea',
                            'rows' => 3,
                            'label' => esc_html__('Title', 'agron'),
                            'condition' => [
                                'divider_element' => 'title',
                                'divider_direction' => 'horizontal'
                            ],
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
                            'default' => 'span',
                            'condition' => [
                                'divider_element' => 'title',
                                'divider_direction' => 'horizontal'
                            ],
                        ),
                        array(
                            'name' => 'title_wrap',
                            'label' => esc_html__('Title Wrap', 'agron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'wrap' => [
                                    'title' => esc_html__('Wrap', 'agron' ),
                                    'icon' => 'eicon-wrap',
                                ],
                                'nowrap' => [
                                    'title' => esc_html__('No Wrap', 'agron' ),
                                    'icon' => 'eicon-nowrap',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title' => 'white-space: {{VALUE}};',
                            ],
                            'condition' => [
                                'divider_element' => 'title',
                                'divider_direction' => 'horizontal'
                            ],
                        ),
                        array(
                            'name' => 'title_max_width',
                            'label' => esc_html__('Title Max Width', 'agron' ),
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
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'divider_element' => 'title',
                                'divider_direction' => 'horizontal'
                            ]
                        ),
                        array(
                            'name' => 'justify_content_row',
                            'label' => esc_html__('Justify Content', 'agron'),
                            'type' => 'choose',
                            'separator' => 'before',
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
                                '{{WRAPPER}} .pxl-divider-wrapper' => 'justify-content: {{VALUE}};'
                            ],
                            'condition' => [
                                'divider_direction' => 'horizontal'
                            ],
                        ),
                        array(
                            'name' => 'align_items_row',
                            'label' => esc_html__('Align Items', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => array(
                                'start' => [
                                    'title' => esc_html__('Start', 'agron' ),
                                    'icon' => 'eicon-align-start-v',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'agron' ),
                                    'icon' => 'eicon-align-center-v',
                                ],
                                'end' => [
                                    'title' => esc_html__('End', 'agron' ),
                                    'icon' => 'eicon-align-end-v',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider-wrapper' => 'align-items: {{VALUE}};'
                            ],
                            'condition' => [
                                'divider_direction' => 'vertical'
                            ],
                        ),
                        array(
                            'name' => 'element_spacing',
                            'label' => esc_html__('Element Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-divider-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'divider_element!' => '',
                                'divider_direction' => 'horizontal'
                            ]
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_divider_style',
                    'label' => esc_html__('Divider', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'divider_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item',
                            'fields_options' => [
                                'color' => [
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item:not(.divider-dashed):not(.divider-dotted):not(.divider-double):not(.divider-custom)' => 'background-color: {{VALUE}}',
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'divider_weight',
                            'label' => esc_html__('Weight', 'agron' ),
                            'type' => 'slider',
                            'separator' => 'before',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item.pxl-divider-horizontal:not(.divider-dashed):not(.divider-dotted):not(.divider-double)' => 'height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item.pxl-divider-vertical:not(.divider-dashed):not(.divider-dotted):not(.divider-double)'   => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item:not(.divider-custom)' => '--pxl-weight: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item.divider-custom img' => 'height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item.divider-custom svg' => 'height: {{SIZE}}{{UNIT}}; width: auto;' 
                            ],
                        ),
                        array(
                            'name' => 'divider_width',
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
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item,
                                {{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item.divider-custom img' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item.divider-custom svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;'
                            ],
                            'condition' => [
                                'divider_direction' => 'horizontal',
                            ],
                        ),
                        array(
                            'name' => 'divider_max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
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
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'divider_direction' => 'horizontal',
                            ],
                        ),

                        array(
                            'name' => 'divider_height',
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
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item,
                                {{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item.divider-custom img' => 'height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-item.divider-custom svg' => 'height: {{SIZE}}{{UNIT}}; width: auto;'                            ],
                            'condition' => [
                                'divider_direction' => 'vertical',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_title_style',
                    'label' => esc_html__('Title', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'divider_element' => 'title',
                        'divider_direction' => 'horizontal',
                    ],
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
                                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title',
                                        ),
                                        array(
                                            'name' => 'title_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title',
                                        ),
                                        array(
                                            'name' => 'title_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'title_highlight',
                                    'label' => esc_html__('Highlight', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'title_hl_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title .pxl-text-highlight' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_hl_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title .pxl-text-highlight',
                                        ),
                                        array(
                                            'name' => 'title_hl_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title .pxl-text-highlight',
                                        ),
                                        array(
                                            'name' => 'title_hl_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title .pxl-text-highlight',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_style_icon',
                    'label' => esc_html__('Icon', 'agron'),
                    'tab' => 'style',
                    'condition' => [
                        'divider_element' => 'icon',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_sz',
                            'label' => esc_html__('Icon Size', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'px' => [
                                'min' => 0,
                                'max' => 2000
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ), 
                    ),
                ),

                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-divider-wrapper .pxl-divider-icon, {{WRAPPER}} .pxl-divider-wrapper .pxl-divider-title',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);