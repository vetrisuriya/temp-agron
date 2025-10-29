<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('Case Heading', 'agron' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'agron-animated',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_heading_content',
                    'label' => esc_html__('Title', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'subtitle',
                            'label' => esc_html__('Subtitle', 'agron' ),
                            'type' => 'textarea',
                            'default' => esc_html__('Subtitle', 'agron'),
                            'rows' => 2,
                            'description' => esc_html__('Highlight use shortcode: [highlight text="..."] or [highlight_image img_id="123"]', 'agron'),
                        ),
                        array(
                            'name' => 'subtitle_style',
                            'label' => esc_html__('Subtitle Style', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                'heading-subtitle-default' => esc_html__('Default', 'agron'),
                                'heading-subtitle-custom' => esc_html__('Custom', 'agron'),
                            ],
                            'default' => 'heading-subtitle-default',
                            'condition' => [
                                'subtitle!' => '',
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'agron' ),
                            'type' => 'textarea',
                            'separator' => 'before',
                            'rows' => 10,
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
                            'default' => 'h2',
                            'condition' => [
                                'title!' => '',
                            ],
                        ),
                        array(
                            'name' => 'title_style',
                            'label' => esc_html__('Title Style', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                'heading-title-default' => esc_html__('Default', 'agron'),
                                'heading-title-custom' => esc_html__('Custom', 'agron'),
                                'text-image'          => esc_html__('Clip Image', 'agron'),
                                'text-vertical'          => esc_html__('Text Vertical', 'agron'),
                            ],
                            'default' => 'heading-title-default',
                            'condition' => [
                                'title!' => '',
                            ],
                        ),
                        array(
                            'name' => 'title_text_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic'],
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-title',
                            'condition' => [
                                'title_style' => 'text-image',
                            ],
                        ),
                        array(
                            'name' => 'title_wrap',
                            'label' => esc_html__('Title Wrap', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => array(
                                'wrap' => [
                                    'title' => esc_html__('Wrap', 'agron' ),
                                    'icon' => 'eicon-wrap',
                                ],
                                'nowrap' => [
                                    'title' => esc_html__('Nowrap', 'agron' ),
                                    'icon' => 'eicon-nowrap',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading-title' => 'white-space: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__('Alignment', 'agron' ),
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
                                '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'subtitle_spacing',
                            'label' => esc_html__('Subtitle Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'subtitle!' => '',
                            ],
                        ),
                        array(
                            'name' => 'heading_max_w',
                            'label' => esc_html__('Max Width', 'agron' ),
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
                                '{{WRAPPER}}' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_title_style',
                    'label' => esc_html__('Title', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'title!' => '',
                    ],
                    'controls' => array_merge(
                        array(
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
                                                    '{{WRAPPER}} .pxl-heading .pxl-heading-title' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'title_typography',
                                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                                'control_type' => 'group',
                                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-title',
                                            ),
                                            array(
                                                'name' => 'title_stroke',
                                                'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                                'control_type' => 'group',
                                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-title',
                                            ),
                                            array(
                                                'name' => 'title_shadow',
                                                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-title',
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
                                                    '{{WRAPPER}} .pxl-heading .pxl-heading-title .pxl-text-highlight' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'title_hl_typography',
                                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                                'control_type' => 'group',
                                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-title .pxl-text-highlight',
                                            ),
                                            array(
                                                'name' => 'title_hl_line_weight',
                                                'label' => esc_html__('Line Weight', 'agron' ),
                                                'type' => 'slider',
                                                'control_type' => 'responsive',
                                                'size_units' => [ 'px', 'custom' ],
                                                'range' => [
                                                    'px' => [
                                                        'min' => 0,
                                                        'max' => 50,
                                                    ],
                                                ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-heading .pxl-heading-title .pxl-text-highlight' => 'text-decoration-thickness: {{SIZE}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'title_hl_stroke',
                                                'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                                'control_type' => 'group',
                                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-title .pxl-text-highlight',
                                            ),
                                            array(
                                                'name' => 'title_hl_shadow',
                                                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-title .pxl-text-highlight',
                                            ),
                                        ],
                                    ],
                                ],
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_subtitle_style',
                    'label' => esc_html__('Subtitle', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'subtitle!' => '',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'subtitle_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading-subtitle' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'subtitle_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-subtitle',
                        ),
                        array(
                            'name' => 'subtitle_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-subtitle',
                        ),
                        array(
                            'name' => 'subtitle_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-heading-subtitle',
                        ),
                    )
                ),
                array(
                    'name' => 'pxl_moution_effects',
                    'label' => esc_html__('Motion Effects', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'title_anim_heading',
                                'type' => 'heading',
                                'label' => esc_html__('Title Animation', 'agron' ),
                                'condition' => [
                                    'title!' => ''
                                ]
                            ),
                        ),
                        agron_get_animation_options([
                            'prefix' => 'title',
                            'selectors' => '{{WRAPPER}} .pxl-heading .pxl-heading-title',
                            'condition' => [
                                'title!' => ''
                            ],
                            'type' => 'text',
                        ]),
                        array(
                            array(
                                'name' => 'subtitle_anim_heading',
                                'type' => 'heading',
                                'separator' => 'before',
                                'label' => esc_html__('Subtitle Animation', 'agron' ),
                                'condition' => [
                                    'subtitle!' => ''
                                ]
                            ),
                        ),
                        agron_get_animation_options([
                            'prefix' => 'subtitle',
                            'selectors' => '{{WRAPPER}} .pxl-heading .pxl-heading-subtitle',
                            'condition' => [
                                'subtitle!' => ''
                            ],
                            'type' => 'text',
                        ]),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);