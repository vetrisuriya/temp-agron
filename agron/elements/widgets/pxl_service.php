<?php
$post_type = ['service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_service',
        'title' => esc_html__('Case Services', 'agron' ),
        'icon' => 'eicon-site-identity',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'pxl-post-grid',
            'agron-swiper',
            'agron-parallax'
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_post_layout',
                    'label'    => esc_html__( 'Layout', 'agron' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'type'     => 'hidden',
                                'default'  => 'service',
                            ),
                            array(
                                'name'     => 'layout_type',
                                'label'    => esc_html__( 'Layout Type', 'agron' ),
                                'type'     => 'select',
                                'options'  => [
                                    'grid' => esc_html__('Grid', 'agron'),
                                    'carousel' => esc_html__('Carousel', 'agron'),
                                ],
                                'default'  => 'grid',
                                'condition' => [
                                    'layout_service!' => ['service-2'],
                                ],
                            ),
                        ),
                        agron_get_post_layout($post_type, []), 
                    ),
                ),

                agron_source_post_settings($post_type),

                array(
                    'name' => 'tab_display_opts',
                    'label' => esc_html__('Display', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array_merge(
                        image_dimension_options(),
                        array(
                            array(
                                'name' => 'title_tag',
                                'label' => esc_html__('Title HTML Tag', 'agron'),
                                'type' => 'select',
                                'seperator' => 'before',
                                'options' => [
                                    ''   => esc_html__('Default', 'agron'),
                                    'h1' => esc_html__('H1', 'agron'),
                                    'h2' => esc_html__('H2', 'agron'),
                                    'h3' => esc_html__('H3', 'agron'),
                                    'h4' => esc_html__('H4', 'agron'),
                                    'h5' => esc_html__('H5', 'agron'),
                                    'h6' => esc_html__('H6', 'agron'),
                                    'div' => esc_html__('div', 'agron'),
                                    'p'  => esc_html__('p', 'agron'),
                                    'span' => esc_html__('span', 'agron'),
                                ],
                                'default' => '',
                            ),
                            array(
                                'name' => 'show_icon',
                                'label' => esc_html__('Show Icon', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_service!' => ['service-3'],
                                ]
                            ),
                            array(
                                'name' => 'show_category',
                                'label' => esc_html__('Show Category', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_service' => ['service-3'],
                                ],
                            ),
                            array(
                                'name' => 'show_excerpt',
                                'label' => esc_html__('Show Excerpt', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                            ),
                            array(
                                'name' => 'num_of_words',
                                'label' => esc_html__('Number of Words', 'agron' ),
                                'type' => 'number',
                                'condition' => [
                                    'show_excerpt!' => '',
                                ],
                            ),
                            array(
                                'name' => 'show_button',
                                'label' => esc_html__('Show Button', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_service!' => ['service-3', 'service-4', 'service-6'],
                                ]
                            ),
                            array(
                                'name' => 'button_text',
                                'label' => esc_html__('Button Text', 'agron' ),
                                'type' => 'text',
                                'placeholder' => esc_html__('More Details...', 'agron'),
                                'condition' => [
                                    'show_button!' => '',
                                    'layout_service!' => ['service-3', 'service-4', 'service-6'],
                                ],
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_grid_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'condition' => [
                        'layout_type' => 'grid',
                    ],
                    'controls' => array(
                        grid_controls_options(),
                    ),
                ),
                array(
                    'name' => 'tab_carousel_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'condition' => ['layout_type' => 'carousel'],
                    'controls' => array(
                        swiper_controls_options(),   
                    ),
                ),

                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron'),
                    'tab'   => 'style',
                    'controls' => [
                        array(
                            'name' => 'icon_spacing',
                            'label' => esc_html__('Icon Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service:not(.pxl-service-layout2) .pxl-post-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-service.pxl-service-layout2 .group' => 'gap: {{SIZE}}{{UNIT}};'
                            ],
                            'condition' => [
                                'layout_service!' => ['service-8'],
                            ]
                        ),
                        array(
                            'name' => 'title_spacing',
                            'label' => esc_html__('Title Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service .pxl-post-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_spacing',
                            'label' => esc_html__('Excerpt Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service .pxl-post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'featured_spacing',
                            'label' => esc_html__('Featured Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service .pxl-post-item' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_service!' => ['service-8'],
                            ]
                        ),
                        array(
                            'name' => 'layout_max_width',
                            'label' => esc_html__('Layout Max Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper .swiper-container' => '--pxl-max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_type' => 'carousel',
                            ]
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__('Divider Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service .pxl-divider' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout_service' => ['service-8'],
                            ],
                        ),
                        array(
                            'name' => 'divider_margin',
                            'label' => esc_html__('Divider Margin', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service .pxl-divider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_service' => ['service-8'],
                            ],
                        ),
                        array(
                            'name' => 'shape_color',
                            'label' => esc_html__('Shape Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service .pxl-shape' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout_service' => ['service-8'],
                            ],
                        ),
                    ],
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
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-item',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-item',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-item',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'box_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'box_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-item:hover',
                                        ),
                                        array(
                                            'name'      => '_box_hover_border_color',
                                            'label'     => esc_html__('Border Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-item:hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-item:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_title_style',
                    'label' => esc_html__('Post Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-title',
                        ),
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'title_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'title_hover_style',
                                            'label' => esc_html__('Hover Style', 'agron' ),
                                            'type' => 'select',
                                            'groups' => [
                                                [
                                                    'label' => esc_html__('Default', 'agron'),
                                                    'options' => [
                                                        '' => esc_html__('Default', 'agron'),
                                                    ],
                                                ],
                                                [
                                                    'label' => esc_html__('Underline', 'agron'),
                                                    'options' => [
                                                        'hover-text-underline' => esc_html__('Underline', 'agron'),
                                                        'hover-text-underline--slide-ltr' => esc_html__('Slide LTR', 'agron'),
                                                        'hover-text-underline--slide-rtl' => esc_html__('Slide RTL', 'agron'),
                                                        'hover-text-underline--expland' => esc_html__('Expand', 'agron'),
                                                        'hover-text-fill' => esc_html__('Fill', 'agron'),
                                                    ],
                                                ],
                                            ],
                                            'default' => '',
                                        ),
                                        array(
                                            'name' => 'title_underline_h',
                                            'label' => esc_html__('Underline Weight(px)', 'agron'),
                                            'type' => 'slider',
                                            'size_units' => ['px'],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-item .pxl-post-title' => "--pxl-height: {{SIZE}}{{UNIT}};",
                                            ],
                                            'condition' => [
                                                'title_hover_style' => ['hover-text-underline', 'hover-text-underline--slide-ltr', 'hover-text-underline--slide-rtl', 'hover-text-underline--expland'],
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_divider',
                                            'type' => 'divider',
                                        ),
                                        array(
                                            'name' => 'title_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-title:hover' => 'color: {{VALUE}};',
                                                '{{WRAPPER}} .pxl-service .pxl-post-title.hover-text-fill' => '--link-color-hover: {{VALUE}};'
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_featured_style',
                    'label' => esc_html__('Post Featured', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout_service!' => ['service-8'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'featured_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'featured_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'featured_opacity',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-featured' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'featured_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'featured_hover_style',
                                            'label' => esc_html__('Hover Style', 'agron' ),
                                            'type' => 'select',
                                            'options' => [
                                                ''  => esc_html__('None', 'agron'),
                                                'hover-image-default'  => esc_html__('Default', 'agron'),
                                                'hover-image-parallax' => esc_html__('Parallax', 'agron'),
                                                'hover-image-overlay-fade--x' => esc_html__('Overlay Fade X', 'agron'),
                                                'hover-image-overlay-fade--y' => esc_html__('Overlay Fade Y', 'agron'),
                                                'hover-image-flashing' => esc_html__('Flashing', 'agron'),
                                                'hover-image-overlay-shine' => esc_html__('Shine', 'agron'),
                                            ],
                                            'default' => '',
                                        ),
                                        array(
                                            'name' => 'featured_hover_opacity',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-featured' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_icon',
                    'label' => esc_html__('Post Icon', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'box_size',
                            'label' => esc_html__('Box Size', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'px' => [
                                'min' => 0,
                                'max' => 2000
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service .pxl-post-icon' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ), 
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'px' => [
                                'min' => 0,
                                'max' => 2000
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-service .pxl-post-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-service .pxl-post-icon ' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-icon',
                                        ),
                                        array(
                                            'name' => 'icon_opacity',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-icon' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-icon',
                                        ),
                                        array(
                                            'name'         => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-icon',
                                        ),
                                        array(
                                            'name' => 'icon_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-icon',
                                        ),
                                        array(
                                            'name'         => 'icon_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-icon',
                                        ),
                                        array(
                                            'name' => 'icon_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_hover_opacity',
                                            'label' => esc_html__('Opacity', 'agron' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'size_units' => ['px'],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-item:hover .pxl-post-icon' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_excerpt_style',
                    'label' => esc_html__('Post Excerpt', 'agron'),
                    'tab' => 'style',
                    'condition' => [
                        'show_excerpt!' => '',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'excerpt_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-excerpt',
                        ),
                        array(
                            'name' => 'excerpt_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'excerpt_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'excerpt_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-excerpt' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'excerpt_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'excerpt_hover_color',
                                            'label' => esc_html__('Link Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-item:hover .pxl-post-excerpt' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_button_style',
                    'label' => esc_html__('Post Button', 'agron' ),
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
                                    '{{WRAPPER}} .pxl-service .pxl-post-button' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
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
                                    '{{WRAPPER}} .pxl-service .pxl-post-button' => 'height: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-button' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-button',
                                        ),
                                        array(
                                            'name' => 'btn_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-button',
                                        ),
                                        array(
                                            'name'         => 'btn_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-button',
                                        ),
                                        array(
                                            'name' => 'btn_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                'hover-underline-ltr' => esc_html__('Underline Slide LTR', 'agron'),
                                                'hover-underline-rtl' => esc_html__('Underline Slide RTL', 'agron'),
                                                'hover-underline-expand' => esc_html__('Underline Expand', 'agron'),
                                                'hover-underline-split' => esc_html__('Underline Split', 'agron'),
                                            ],
                                            'condition' => [
                                                'layout_service' => ['service-1', 'service-4', 'service-6'],
                                            ]
                                        ),
                                        array(
                                            'name' => 'btn_hover_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                            {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-button' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'btn_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                            {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button',
                                        ),
                                        array(
                                            'name'         => 'btn_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                            {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button',
                                        ),
                                        array(
                                            'name' => 'btn_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'name' => 'tab_button_icon_style',
                    'label' => esc_html__('Button Icon', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'btn_icon_width',
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
                                    '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_icon_height',
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
                                    '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'divider3',
                                'type' => 'divider',
                            ),
                            array(
                                'name' => 'btn_icon_controls',
                                'control_type' => 'tab',
                                'tabs' => [
                                    [
                                        'name' => 'btn_icon_normal',
                                        'label' => esc_html__('Normal', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [  
                                            array(
                                                'name' => 'btn_icon_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_icon_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon',
                                            ),
                                            array(
                                                'name' => 'btn_icon_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon',
                                            ),
                                            array(
                                                'name'         => 'btn_icon_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon',
                                            ),
                                            array(
                                                'name' => 'btn_icon_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_icon_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'btn_icon_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [
                                            array(
                                                'name' => 'btn_icon_hover_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                    {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button .pxl-button-icon' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_icon_hover_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic' ],
                                                'selector' => '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button .pxl-button-icon',
                                            ),
                                            array(
                                                'name' => 'btn_icon_transition',
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
                                                    '{{WRAPPER}} .pxl-service .pxl-post-button .pxl-button-icon' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                                ]
                                            ),
                                            array(
                                                'name' => 'btn_icon_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button .pxl-button-icon',
                                            ),
                                            array(
                                                'name'         => 'btn_icon_hover_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button .pxl-button-icon',
                                            ),
                                            array(
                                                'name' => 'btn_icon_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                    {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button .pxl-button-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_icon_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .pxl-post-button:hover, 
                                                    {{WRAPPER}} .pxl-service.pxl-service-layout8 .pxl-post-item:hover .pxl-post-button .pxl-button-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'name' => 'tab_tab_button_style',
                    'label' => esc_html__('Tab Button', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout_service' => ['service-2'],
                    ],
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'tab_btn_h',
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
                                    '{{WRAPPER}} .pxl-service .tab-buttons .tab-button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'divider2',
                                'type' => 'divider',
                            ),
                            array(
                                'name' => 'tab_btn_controls',
                                'control_type' => 'tab',
                                'tabs' => [
                                    [
                                        'name' => 'tab_btn_normal',
                                        'label' => esc_html__('Normal', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [  
                                            array(
                                                'name' => 'tab_btn_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .tab-buttons .tab-button' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'tab_btn_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-service .tab-buttons .tab-button',
                                            ),
                                            array(
                                                'name' => 'tab_btn_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-service .tab-buttons .tab-button',
                                            ),
                                            array(
                                                'name'         => 'tab_btn_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-service .tab-buttons .tab-button',
                                            ),
                                            array(
                                                'name' => 'tab_btn_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .tab-buttons .tab-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'tab_btn_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .tab-buttons .tab-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'tab_btn_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [
                                            array(
                                                'name' => 'tab_btn_hover_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .tab-buttons .tab-button:hover' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'tab_btn_hover_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic' ],
                                                'selector' => '{{WRAPPER}} .pxl-service .tab-buttons .tab-button:hover',
                                            ),
                                            array(
                                                'name' => 'tab_btn_transition',
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
                                                    '{{WRAPPER}} .pxl-service .tab-buttons .tab-button' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                                ]
                                            ),
                                            array(
                                                'name' => 'tab_btn_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-service .tab-buttons .tab-button:hover',
                                            ),
                                            array(
                                                'name'         => 'tab_btn_hover_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-service .tab-buttons .tab-button:hover',
                                            ),
                                            array(
                                                'name' => 'tab_btn_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .tab-buttons .tab-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'tab_btn_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-service .tab-buttons .tab-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-swiper .swiper-slide, {{WRAPPER}} .grid .grid-item',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);