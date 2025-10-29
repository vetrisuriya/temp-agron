<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_marquee',
        'title' => esc_html__('Case Text Marquee', 'agron' ),
        'icon' => 'eicon-wordart',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_text_marquee_content',
                    'label' => esc_html__('Content', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(   
                        array(
                            'name' => 'text',
                            'type' => 'wysiwyg',
                            'default' => esc_html__( 'Farming . Organic . Natural . Vegetables . Agriculture', 'agron' ),
                            'description' => 'Highlight text width shortcode: [highlight text="..."]',
                        ),
                        array(
                            'name' => 'duplicate',
                            'label' => esc_html__('Duplicate', 'agron'),
                            'type' => 'switcher',
                            'separator' => 'before',
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'direction',
                            'label' => esc_html__('Direction', 'agron'),
                            'type' => 'select',
                            'options' => [
                                'rtl' => esc_html__('Right to Left', 'agron'),
                                'ltr' => esc_html__('Left to Right', 'agron'),
                            ],
                            'default' => 'rtl',
                        ),
                        array(
                            'name' => 'duration',
                            'label' => esc_html__('Duration(s)', 'agron'),
                            'type' => 'number',
                            'default' => 20,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item' => '--pxl-duration: {{VALUE}}s;',
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', '%'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee-wrapper' => '--pxl-spacing-inline: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_text_marquee_style',
                    'label' => esc_html__('Text Marquee', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'text_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'text_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'text_color',
                                            'label' => esc_html('Text Color', 'agron'),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item' => 'color: {{VALUE}}',
                                            ],
                                        ),
                                        array(
                                            'name' => 'text_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item',
                                        ),
                                        array(
                                            'name' => 'text_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item',
                                        ),
                                        array(
                                            'name' => 'text_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'text_highlight',
                                    'label' => esc_html__('Highlight', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'svg_size',
                                            'label' => esc_html__('SVG Size', 'agron'),
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
                                                '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-svg-highlight svg' => 'width: {{SIZE}}{{UNIT}}; height:auto;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'text_hl_color',
                                            'label' => esc_html('Text Color', 'agron'),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-text-highlight,
                                                {{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-svg-highlight,
                                                {{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-svg-hightlight' => 'color: {{VALUE}}',
                                            ],
                                        ),
                                        array(
                                            'name' => 'text_hl_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-text-highlight',
                                        ),
                                        array(
                                            'name' => 'text_hl_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-text-highlight,
                                            {{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-svg-highlight',
                                        ),
                                        array(
                                            'name' => 'text_hl_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-text-highlight,
                                            {{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-marquee-item .pxl-svg-highlight',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_link_style',
                    'label' => esc_html__( 'Link', 'agron' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'link_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper a',
                            'control_type' => 'group',
                        ),
                        array(
                            'name' => 'link_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'link_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'link_color',
                                            'label' => esc_html__( 'Color', 'agron' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-text-marquee-wrapper a' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_highlight_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-highlight',
                                        ),
                                        array(
                                            'name' => 'link_highlight_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper .pxl-text-highlight',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'link_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => \Elementor\Controls_Manager::TAB,
                                    'controls' => [
                                        array(
                                            'name' => 'link_hover_style',
                                            'label' => esc_html__( 'Style', 'agron' ),
                                            'type' => 'select',
                                            'options' => [
                                                'link-hover-default' => 'Default',
                                                'link-hover-underline-slide' => 'Underline Slide'
                                            ],
                                            'default' => 'link-hover-default',
                                            'condition' => [
                                                'link_style!' => 'link-underline',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_color_hover',
                                            'label' => esc_html__( 'Color Hover', 'agron' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-text-marquee-wrapper a:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_highlight_stroke_hover',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper a:hover',
                                        ),
                                        array(
                                            'name' => 'link_highlight_shadow_hover',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-marquee-wrapper a:hover',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-text-marquee-wrapper',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);