<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('Case Pricing', 'agron' ),
        'icon' => 'eicon-price-list',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_pricing_content',
                    'label' => esc_html__('Pricing', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'active',
                            'type' => 'switcher',
                            'label' => esc_html__('Is Active', 'agron'),
                            'default' => '',
                        ),
                        array(
                            'name' => '_icon',
                            'label' => esc_html__('Icon', 'agron'),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-star',
                                'library' => 'Font Awesome 5 Free',
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'agron'),
                            'type' => 'text',
                            'label_block' => true,
                            'default' => esc_html__('Heading Title', 'agron'),
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
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'agron'),
                            'type' => 'text',
                            'default' => esc_html__('$99', 'agron'),
                            'separator' => 'before',

                        ),
                        array(
                            'name' => 'unit',
                            'label' => esc_html__('Unit', 'agron'),
                            'type' => 'text',
                            'default' => esc_html__('Per Night', 'agron'),
                        ),
                        array(
                            'name' => 'show_divider',
                            'type' => 'switcher',
                            'separator' => 'before',
                            'label' => esc_html__('Show Divider', 'agron'),
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'divider_style',
                            'label' => esc_html__('Style', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                ''       => esc_html__('Default', 'agron'),
                                'solid'  => esc_html__('Solid', 'agron'),
                                'dashed' => esc_html__('Dashed', 'agron'),
                                'dotted' => esc_html__('Dotted', 'agron'),
                                'double' => esc_html__('Double', 'agron'),
                            ],
                            'default' => '',
                            'condition' => [
                                'show_divider!' => '',
                            ],
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description', 'agron'),
                            'type' => 'textarea',
                            'separator' => 'before',
                            'rows' => 3,
                            'default' => esc_html__('There are many variations of passages of available but the majority variations.', 'agron'),
                        ),
                        array(
                            'name' => 'link_url',
                            'label' => esc_html__('Link URL', 'agron'),
                            'type' => 'url',
                        ),
                        array(
                            'name' => 'feature_icon',
                            'label' => esc_html__('Icon', 'agron' ),
                            'type' => 'icons',
                            'separator' => 'before',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/05/check.svg'), 
                                    'id' => 357, 
                                ],
                                'library' => 'svg',
                            ],
                        ),
                        array(
                            'name' => 'features',
                            'label' => esc_html__('Features', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'feature_text',
                                    'label' => esc_html__('Text', 'agron'),
                                    'type' => 'textarea',
                                    'rows' => 3,
                                ),
                            ),
                            'title_field' => '{{{feature_text}}}',
                            'default' => [
                                [
                                    'feature_text' => esc_html__('Lorem ipsum dolor', 'agron'),
                                ],
                                [
                                    'feature_text' => esc_html__('Lorem ipsum dolor', 'agron'),
                                ],
                                [
                                    'feature_text' => esc_html__('Lorem ipsum dolor', 'agron'),
                                ],
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
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'agron'),
                            'type' => 'text',
                            'default' => esc_html__('Get Started Now', 'agron'),
                        ),
                        array(
                            'name' => 'btn_icon_position',
                            'label' => esc_html__('Icon Position', 'agron' ),
                            'type' => 'choose',
                            'options' => [
                                'row' => [
                                    'title' => esc_html__('Left', 'agron'),
                                    'icon'  => 'eicon-arrow-left'
                                ],
                                'row-reverse' => [
                                    'title' => esc_html__('Right', 'agron'),
                                    'icon'  => 'eicon-arrow-right'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper .pxl-pricing-button' => 'flex-direction: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon_size',
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
                                '{{WRAPPER}} .pxl-swiper .pxl-pricing-button .pxl-button-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-swiper .pxl-pricing-button .pxl-button-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon_spacing',
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
                                '{{WRAPPER}} .pxl-swiper .pxl-pricing-button' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'heading_gap',
                            'label' => esc_html__('Heading Gap', 'agron' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_spacing',
                            'label' => esc_html__('Heading Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'price_gap',
                            'label' => esc_html__('Price Gap', 'agron' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-price' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'price_spacing',
                            'label' => esc_html__('Price Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider_spacing',
                            'label' => esc_html__('Divider Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-divider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'show_divider!' => '',
                            ],
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__('Divider Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-divider' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'show_divider!' => '',
                            ],
                        ),
                        array(
                            'name' => 'feature_gap',
                            'label' => esc_html__('Feature Gap', 'agron' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'feature_spacing',
                            'label' => esc_html__('Feature Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item + .pxl-feature-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_spacing',
                            'label' => esc_html__('Button Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-features' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'tab_box_style',
                    'label' => esc_html__('Box', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'box_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'box_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'box_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-pricing',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-pricing',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-pricing',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'box_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'box_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-pricing'
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-pricing:hover, 
                                            {{WRAPPER}} .pxl-pricing.active',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-pricing:hover, 
                                            {{WRAPPER}} .pxl-pricing.active',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover, 
                                                {{WRAPPER}} .pxl-pricing.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover, 
                                                {{WRAPPER}} .pxl-pricing.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_heading_style',
                    'label' => esc_html__('Heading', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'heading_icon_size',
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading .pxl-heading-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading .pxl-heading-icon svg' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                            ],
                        ),
                        array(
                            'name' => 'heading_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading',
                        ),
                        array(
                            'name' => 'heading_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading',
                        ),
                        array(
                            'name' => 'heading_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'heading_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'heading_icon_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading .pxl-heading-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'heading_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'heading_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-heading',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'heading_highlight',
                                    'label' => esc_html__('Highlight', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'heading_hover_icon_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-heading .pxl-heading-icon,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-heading .pxl-heading-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'heading_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-heading,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-heading' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'heading_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-heading,
                                            {{WRAPPER}} .pxl-pricing.active .pxl-pricing-heading',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'tab_price_style',
                    'label' => esc_html__('Price', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'price_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-text',
                        ),
                        array(
                            'name' => 'price_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-text',
                        ),
                        array(
                            'name' => 'price_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'price_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'price_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-text' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'price_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-text',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'price_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'price_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-price .pxl-price-text,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-price .pxl-price-text' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'price_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-price .pxl-price-text,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-price .pxl-price-text',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'tab_unit_style',
                    'label' => esc_html__('Unit', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'unit_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-separator, 
                                            {{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-unit',
                        ),
                        array(
                            'name' => 'unit_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-separator, 
                                            {{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-unit',
                        ),
                        array(
                            'name' => 'unit_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'unit_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'unit_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-separator, 
                                                {{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-unit' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'unit_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-separator, 
                                                {{WRAPPER}} .pxl-pricing .pxl-pricing-price .pxl-price-unit',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'unit_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'unit_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-price .pxl-price-separator,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-price .pxl-price-separator,
                                                {{WRAPPER}} .pxl-pricing:hover .pxl-pricing-price .pxl-price-unit,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-price .pxl-price-unit' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'unit_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-price .pxl-price-separator,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-price .pxl-price-separator,
                                                {{WRAPPER}} .pxl-pricing:hover .pxl-pricing-price .pxl-price-unit,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-price .pxl-price-unit',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'tab_descrition_style',
                    'label' => esc_html__('Description', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'description_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-description',
                        ),
                        array(
                            'name' => 'description_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-description',
                        ),
                        array(
                            'name' => 'description_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'description_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'description_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-description' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'description_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-description',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'description_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'description_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-description,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-description' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'description_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-description,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-description',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'tab_feature_style',
                    'label' => esc_html__('Feature', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'feature_icon_size',
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
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item svg' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                            ],
                        ),
                        array(
                            'name' => 'feature_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item',
                        ),
                        array(
                            'name' => 'feature_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item',
                        ),
                        array(
                            'name' => 'feature_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'feature_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'feature_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'feature_icon_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item i,
                                                {{WRAPPER}} .pxl-pricing .pxl-pricing-features .pxl-feature-item svg' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'feature_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'feature_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-features .pxl-feature-item,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-features .pxl-feature-item' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'feature_hover_icon_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-pricing:hover .pxl-pricing-features .pxl-feature-item i,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-features .pxl-feature-item i,
                                                {{WRAPPER}} .pxl-pricing:hover .pxl-pricing-features .pxl-feature-item svg,
                                                {{WRAPPER}} .pxl-pricing.active .pxl-pricing-features .pxl-feature-item svg' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    )
                ),
                // array(
                //     'name' => 'tab_features_style',
                //     'label' => esc_html__('Features', 'agron' ),
                //     'tab' => 'style',
                //     'controls' => array_merge(
                //         array(
                //             array(
                //                 'name' => 'btn_typography',
                //                 'type' => \Elementor\Group_Control_Typography::get_type(),
                //                 'control_type' => 'group',
                //                 'selector' => '{{WRAPPER}} .pxl-swiper .pxl-pricing-button',
                //             ),
                //             array(
                //             'name' => 'btn_text_shadow',
                //                 'label' => esc_html__('Text Shadow', 'agron' ),
                //                 'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                //                 'control_type' => 'group',
                //                 'selector' => '{{WRAPPER}} .pxl-swiper .pxl-pricing-button',
                //             ),
                //             array(
                //                 'name' => 'btn_controls',
                //                 'control_type' => 'tab',
                //                 'tabs' => [
                //                     [
                //                         'name' => 'btn_normal',
                //                         'label' => esc_html__('Normal', 'agron' ),
                //                         'type' => 'tab',
                //                         'controls' => [  
                //                             array(
                //                                 'name' => 'btn_color',
                //                                 'label' => esc_html__('Text Color', 'agron' ),
                //                                 'type' => 'color',
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-button' => 'color: {{VALUE}};',
                //                                 ],
                //                             ),
                //                             array(
                //                                 'name' => 'btn_bg',
                //                                 'type' => \Elementor\Group_Control_Background::get_type(),
                //                                 'control_type' => 'group',
                //                                 'types' => [ 'classic', 'gradient' ],
                //                                 'selector' => '{{WRAPPER}} .pxl-swiper .pxl-pricing-button',
                //                             ),
                //                             array(
                //                                 'name' => 'btn_icon_color',
                //                                 'label' => esc_html__('Icon Color', 'agron' ),
                //                                 'type' => 'color',
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-button .pxl-button-icon' => 'color: {{VALUE}};',
                //                                 ],
                //                             ),
                //                             array(
                //                                 'name' => 'btn_border',
                //                                 'type' => \Elementor\Group_Control_Border::get_type(),
                //                                 'separator' => 'before',
                //                                 'control_type' => 'group', 
                //                                 'selector' => '{{WRAPPER}} .pxl-swiper .pxl-pricing-button',
                //                             ),
                //                             array(
                //                                 'name'         => 'btn_box_shadow',
                //                                 'label' => esc_html__( 'Box Shadow', 'agron' ),
                //                                 'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                //                                 'control_type' => 'group',
                //                                 'selector'     => '{{WRAPPER}} .pxl-swiper .pxl-pricing-button',
                //                             ),
                //                             array(
                //                                 'name' => 'btn_border_radius',
                //                                 'label' => esc_html__('Border Radius', 'agron' ),
                //                                 'type' => 'dimensions',
                //                                 'size_units' => [ 'px', 'custom' ],
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                //                                 ],
                //                             ),
                //                             array(
                //                                 'name' => 'btn_padding',
                //                                 'label' => esc_html__('Padding', 'agron' ),
                //                                 'type' => 'dimensions',
                //                                 'size_units' => [ 'px', 'custom' ],
                //                                 'control_type' => 'responsive',
                //                                 'separator' => 'before',
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                //                                 ],
                //                             ),
                //                         ],
                //                     ],
                //                     [
                //                         'name' => 'btn_hover',
                //                         'label' => esc_html__('Hover', 'agron' ),
                //                         'type' => 'tabs',
                //                         'controls' => [
                //                             array(
                //                                 'name' => 'btn_hove_color',
                //                                 'label' => esc_html__('Color', 'agron' ),
                //                                 'type' => 'color',
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-card:hover .pxl-pricing-button, 
                //                                     {{WRAPPER}} .pxl-swiper .pxl-pricing-card.active .pxl-pricing-button' => 'color: {{VALUE}};',
                //                                 ],
                //                             ),
                //                             array(
                //                                 'name' => 'btn_hover_bg',
                //                                 'type' => \Elementor\Group_Control_Background::get_type(),
                //                                 'control_type' => 'group',
                //                                 'types' => [ 'classic', 'gradient' ],
                //                                 'selector' => '{{WRAPPER}} .pxl-swiper .pxl-pricing-card:hover .pxl-pricing-button, 
                //                                 {{WRAPPER}} .pxl-swiper .pxl-pricing-card.active .pxl-pricing-button',
                //                             ),
                //                             array(
                //                                 'name' => 'btn_hover_icon_color',
                //                                 'label' => esc_html__('Icon Color', 'agron' ),
                //                                 'type' => 'color',
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-card:hover .pxl-pricing-button .pxl-button-icon, 
                //                                     {{WRAPPER}} .pxl-swiper .pxl-pricing-card.active .pxl-pricing-button .pxl-button-icon' => 'color: {{VALUE}};',
                //                                 ],
                //                             ),
                //                             array(
                //                                 'name' => '_btn_hover_border_color',
                //                                 'label' => esc_html__('Border Color', 'agron' ),
                //                                 'type' => 'color',
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-card:hover .pxl-pricing-button, 
                //                                     {{WRAPPER}} .pxl-swiper .pxl-pricing-card.active .pxl-pricing-button' => 'border-color: {{VALUE}};',
                //                                 ],
                //                             ),
                //                             array(
                //                                 'name' => 'btn_hover_border',
                //                                 'type' => \Elementor\Group_Control_Border::get_type(),
                //                                 'separator' => 'before',
                //                                 'control_type' => 'group', 
                //                                 'selector' => '{{WRAPPER}} .pxl-swiper .pxl-pricing-card:hover .pxl-pricing-button, 
                //                                 {{WRAPPER}} .pxl-swiper .pxl-pricing-card.active .pxl-pricing-button',
                //                             ),
                //                             array(
                //                                 'name'         => 'btn_hover_box_shadow',
                //                                 'label' => esc_html__( 'Box Shadow', 'agron' ),
                //                                 'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                //                                 'control_type' => 'group',
                //                                 'selector'     => '{{WRAPPER}} .pxl-swiper .pxl-pricing-card:hover .pxl-pricing-button, 
                //                                 {{WRAPPER}} .pxl-swiper .pxl-pricing-card.active .pxl-pricing-button',
                //                             ),
                //                             array(
                //                                 'name' => 'btn_hover_border_radius',
                //                                 'label' => esc_html__('Border Radius', 'agron' ),
                //                                 'type' => 'dimensions',
                //                                 'size_units' => [ 'px', 'custom' ],
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-card:hover .pxl-pricing-button, 
                //                                     {{WRAPPER}} .pxl-swiper .pxl-pricing-card.active .pxl-pricing-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                //                                 ],
                //                             ),
                //                             array(
                //                                 'name' => 'btn_hover_padding',
                //                                 'label' => esc_html__('Padding', 'agron' ),
                //                                 'type' => 'dimensions',
                //                                 'size_units' => [ 'px', 'custom' ],
                //                                 'control_type' => 'responsive',
                //                                 'separator' => 'before',
                //                                 'selectors' => [
                //                                     '{{WRAPPER}} .pxl-swiper .pxl-pricing-card:hover .pxl-pricing-button, 
                //                                     {{WRAPPER}} .pxl-swiper .pxl-pricing-card.active .pxl-pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                //                                 ],
                //                             ),
                //                         ],
                //                     ],
                //                 ],
                //             ),
                //         ),
                //     ),
                // ),
            ),
        ),
    ),
    agron_get_class_widget_path(),
);