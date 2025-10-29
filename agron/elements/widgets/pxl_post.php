<?php
$post_type = ['post'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post',
        'title' => esc_html__('Case Post', 'agron' ),
        'icon' => 'eicon-post',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'pxl-post-grid',
            'agron-effects',
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
                                'default'  => 'post',
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
                                    'layout_post!' => ['post-1'],
                                ]
                            ),
                            array(
                                'name'     => 'layout2_style',
                                'label'    => esc_html__( 'Layout Style', 'agron' ),
                                'type'     => 'select',
                                'options'  => [
                                    'default' => esc_html__('Default', 'agron'),
                                    'style1' => esc_html__('Style 1', 'agron'),
                                ],
                                'default'  => 'default',
                                'condition' => [
                                    'layout_post' => ['post-2'],
                                ]
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
                                'name' => 'show_author',
                                'label' => esc_html__('Show Author', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_post' => ['post-1', 'post-3', 'post-6'],
                                ]
                            ),
                            array(
                                'name' => 'show_comment',
                                'label' => esc_html__('Show Comment', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_post' => ['post-1', 'post-3', 'post-6'],
                                ]
                            ),
                            array(
                                'name' => 'show_reading_time',
                                'label' => esc_html__('Show Reading Time', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_post' => ['post-1'],
                                ]
                            ),
                            array(
                                'name' => 'show_date',
                                'label' => esc_html__('Show Date', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_post' => ['post-2', 'post-4', 'post-5', 'post-6'],
                                ]
                            ),
                            array(
                                'name' => 'show_category',
                                'label' => esc_html__('Show Category', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_post' => ['post-2', 'post-4', 'post-5', 'post-6'],
                                ]
                            ),
                            array(
                                'name' => 'category_separator',
                                'label' => esc_html__('Category Separator', 'agron'),
                                'type' => 'text',
                                'default' => ', ',
                                'condition' => [
                                    'show_category!' => '',
                                    'layout_post' => ['post-2', 'post-4', 'post-5', 'post-6'],
                                ]
                            ),
                            array(
                                'name' => 'show_excerpt',
                                'label' => esc_html__('Show Excerpt', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_post' => ['post-1', 'post-2', 'post-5'],
                                ],
                            ),
                            array(
                                'name' => 'num_of_words',
                                'label' => esc_html__('Number of Words', 'agron' ),
                                'type' => 'number',
                                'condition' => [
                                    'show_excerpt!' => '',
                                    'layout_post' => ['post-1', 'post-2', 'post-5'],
                                ],
                            ),
                            array(
                                'name' => 'show_button',
                                'label' => esc_html__('Show Button', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                            ),
                            array(
                                'name' => 'button_text',
                                'label' => esc_html__('Button Text', 'agron' ),
                                'type' => 'text',
                                'placeholder' => esc_html__('More Details...', 'agron'),
                                'condition' => [
                                    'show_button!' => '',
                                    'layout_post!' => ['post-6'],
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
                        'layout_post!' => ['post-1'],
                    ],
                    'controls' => array(
                        grid_controls_options(),
                    ),
                ),
                array(
                    'name' => 'tab_carousel_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'condition' => [
                        'layout_type' => 'carousel',
                        'layout_post!' => ['post-1'],
                    ],
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
                            'name' => 'feature_item_width',
                            'label' => esc_html__('Feature Item Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature' => 'flex:0 1 {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_post' => ['post-5'],
                            ],
                        ),
                        array(
                            'name' => 'layout_width',
                            'label' => esc_html__('Layout Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper .swiper-container' => 'flex:0 1 {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_type' => 'carousel',
                                'layout_post' => ['post-5'],
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
                                '{{WRAPPER}} .pxl-post .pxl-post-featured' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
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
                                '{{WRAPPER}} .pxl-post .pxl-post-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'category_spacing',
                            'label' => esc_html__('Category Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-category' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'show_category!' => '',
                                'layout_post' => ['post-2'],
                            ]
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
                                '{{WRAPPER}} .pxl-post .pxl-post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'show_excerpt!' => '',
                                'layout_post' => ['post-1', 'post-2', 'post-5'],
                            ]
                        ),
                        array(
                            'name' => 'meta_spacing',
                            'label' => esc_html__('Meta Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_post' => ['post-1', 'post-3', 'post-4', 'post-5'],
                            ]
                        ),
                        array(
                            'name' => 'meta_gap',
                            'label' => esc_html__('Meta Gap', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-meta' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_post' => ['post-1', 'post-3', 'post-4', 'post-5'],
                            ]
                        ),
                        array(
                            'name' => 'meta_dot_size',
                            'label' => esc_html__('Meta Dot Size', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-meta svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                            ],
                            'condition' => [
                                'layout_post' => ['post-1', 'post-4', 'post-5'],
                            ]
                        ),
                        array(
                            'name' => 'meta_dot_color',
                            'label' => esc_html__('Meta Dot Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-meta svg' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout_post' => ['post-1', 'post-4', 'post-5'],
                            ]
                        ),
                        array(
                            'name' => 'feature_general_heading',
                            'type' => 'heading',
                            'label' => esc_html__('Feature Item', 'agron' ),
                            'separator' => 'before',
                            'condition' => [
                                'layout_post' => ['post-5'],
                            ]
                        ),
                        array(
                            'name' => 'feature_overlay',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner::before',
                            'condition' => [
                                'layout_post' => ['post-5'],
                            ]
                        ),
                        array(
                            'name' => 'feature_date_spacing',
                            'label' => esc_html__('Date Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_post' => ['post-5'],
                            ]
                        ),
                        array(
                            'name' => 'feature_title_spacing',
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
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_post' => ['post-5'],
                            ]
                        ),


                    ],
                ),

                array(
                    'name' => 'tab_box_style',
                    'label' => esc_html__('Box Item', 'agron' ),
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
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-item',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-item',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-item',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name' => 'box_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-item:hover',
                                        ),
                                        array(
                                            'name'      => '_box_hover_border_color',
                                            'label'     => esc_html__('Border Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-item:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-item:hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-item:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'box_item_feature',
                            'label' => esc_html__('Item Feature', 'agron' ),
                            'type' => 'heading',
                            'separator' => 'before',
                            'condition' => [
                                'layout_post' => ['post-5'],
                            ],
                        ),
                        array(
                            'name' => 'box_feature_controls',
                            'control_type' => 'tab',
                            'condition' => [
                                'layout_post' => ['post-5'],
                            ],
                            'tabs' => [
                                [
                                    'name' => 'box_feature_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'box_feature_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                        ),
                                        array(
                                            'name' => 'box_feature_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                        ),
                                        array(
                                            'name'         => 'box_feature_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                        ),
                                        array(
                                            'name' => 'box_feature_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'box_feature_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'box_feature_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner:hover',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                        ),
                                        array(
                                            'name'      => '_box_feature_hover_border_color',
                                            'label'     => esc_html__('Border Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner:hover' => 'border-color: {{VALUE}};',
                                            ],
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                        ),
                                        array(
                                            'name' => 'box_feature_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner:hover',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                        ),
                                        array(
                                            'name'         => 'box_feature_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner:hover',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                        ),
                                        array(
                                            'name' => 'box_feature_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-post .pxl-post-featured img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-featured img',
                                        ),
                                        array(
                                            'name' => 'featured_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                'hover-image-default'  => esc_html__('Default', 'agron'),
                                                'hover-image-parallax' => esc_html__('Parallax', 'agron'),
                                                'hover-image-overlay-fade--x' => esc_html__('Overlay Fade X', 'agron'),
                                                'hover-image-overlay-fade--y' => esc_html__('Overlay Fade Y', 'agron'),
                                                'hover-image-flashing' => esc_html__('Flashing', 'agron'),
                                                'hover-image-overlay-shine' => esc_html__('Shine', 'agron'),
                                            ],
                                            'default' => 'hover-image-default',
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
                                                '{{WRAPPER}} .pxl-post .pxl-post-item:hover .pxl-post-featured img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-item:hover .pxl-post-featured img',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-item:hover .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content_style',
                    'label' => esc_html__('Box Content', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'box_content_heading',
                            'type' => 'heading',
                            'label' => esc_html__('Normal', 'agron' ),
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name' => 'content_bg',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-content',
                        ),
                        array(
                            'name' => 'content_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-content',
                        ),
                        array(
                            'name'         => 'content_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-content',
                        ),
                        array(
                            'name' => 'content_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_content_feature_heading',
                            'type' => 'heading',
                            'label' => esc_html__('Box Content Feature', 'agron' ),
                            'separator' => 'before',
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name' => 'content_feature_bg',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-content',
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name' => 'content_feature_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-content',
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name'         => 'content_feature_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-content',
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name' => 'content_feature_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name' => 'content_feature_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
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
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-title',
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
                                                '{{WRAPPER}} .pxl-post .pxl-post-title' => 'color: {{VALUE}};',
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
                                                '{{WRAPPER}} .pxl-post .pxl-post-title:hover:not(.hover-text-fill)' => 'color: {{VALUE}};',
                                                '{{WRAPPER}} .pxl-post .pxl-post-title.hover-text-fill' => '--link-color-hover: {{VALUE}};'
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),

                        array(
                            'name' => 'feature_title_heading',
                            'type' => 'heading',
                            'label' => esc_html__('Feature Title', 'agron'),
                            'separator' => 'before',
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name' => 'feature_title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-title',
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name' => 'feature_title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-title',
                            'condition' => array(
                                'layout_post' => ['post-5'],
                            ),
                        ),
                        array(
                            'name' => 'feature_title_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'feature_title_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'feature_title_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'feature_title_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'feature_title_hover_style',
                                            'label' => esc_html__('Hover Style', 'agron' ),
                                            'type' => 'select',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
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
                                            'name' => 'feature_title_underline_h',
                                            'label' => esc_html__('Underline Weight(px)', 'agron'),
                                            'type' => 'slider',
                                            'size_units' => ['px'],
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-item .pxl-post-title' => "--pxl-height: {{SIZE}}{{UNIT}};",
                                            ],
                                            'condition' => [
                                                'feature_title_hover_style' => ['hover-text-underline', 'hover-text-underline--slide-ltr', 'hover-text-underline--slide-rtl', 'hover-text-underline--expland'],
                                            ],
                                        ),
                                        array(
                                            'name' => 'feature_title_divider',
                                            'type' => 'divider',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                        ),
                                        array(
                                            'name' => 'feature_title_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'condition' => array(
                                                'layout_post' => ['post-5'],
                                            ),
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-title:hover:not(.hover-text-fill)' => 'color: {{VALUE}};',
                                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-title.hover-text-fill' => '--link-color-hover: {{VALUE}};'
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_category_style',
                    'label' => esc_html__('Post Category', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'show_category!' => '',
                        'layout_post' => ['post-2', 'post-4', 'post-5', 'post-6', 'post-7']
                    ],
                    'controls' => array(
                        array(
                            'name' => 'category_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-category > a',
                        ),
                        array(
                            'name' => 'category_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'category_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'category_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-category > a' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'category_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-category > a',
                                        ),
                                        array(
                                            'name' => 'category_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-category > a',
                                        ),
                                        array(
                                            'name'         => 'category_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-category > a',
                                        ),
                                        array(
                                            'name' => 'category_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-category > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'category_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-category > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'category_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'category_hover_color',
                                            'label' => esc_html__('Link Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-category > a:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'category_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-category > a:hover',
                                        ),
                                        array(
                                            'name' => 'category_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-category > a:hover',
                                        ),
                                        array(
                                            'name'         => 'category_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-category > a:hover',
                                        ),
                                        array(
                                            'name' => 'category_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-category > a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'category_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post .pxl-post-category > a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        'layout_post' => ['post-1', 'post-2', 'post-5']
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
                    'name' => 'tab_btn_style',
                    'label' => esc_html__('Post Button', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
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
                                    '{{WRAPPER}} .pxl-post .pxl-post-button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
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
                                                    '{{WRAPPER}} .pxl-post .pxl-post-button' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-post .pxl-post-button',
                                            ),
                                            array(
                                                'name' => 'btn_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-post .pxl-post-button',
                                            ),
                                            array(
                                                'name'         => 'btn_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-button',
                                            ),
                                            array(
                                                'name' => 'btn_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-post-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .pxl-post .pxl-post-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                    'layout_post' => ['post-2', 'post-3', 'post-4', 'post-5'],
                                                ]
                                            ),
                                            array(
                                                'name' => 'btn_hover_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-post-button:hover' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic' ],
                                                'selector' => '{{WRAPPER}} .pxl-post .pxl-post-button:hover',
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
                                                    '{{WRAPPER}} .pxl-post .pxl-post-button' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                                ]
                                            ),
                                            array(
                                                'name' => 'btn_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-post .pxl-post-button:hover',
                                            ),
                                            array(
                                                'name'         => 'btn_hover_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-button:hover',
                                            ),
                                            array(
                                                'name' => 'btn_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-post-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .pxl-post .pxl-post-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                ],
                            ), 

                            array(
                                'name' => 'feature_btn_heading',
                                'label' => esc_html__('Feature Button', 'agron' ),
                                'type' => 'heading',
                                'separator' => 'before',
                                'condition' => array(
                                    'layout_post' => ['post-5'],
                                ),
                            ),
                            array(
                                'name' => 'feature_btn_h',
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
                                    '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                                'condition' => array(
                                    'layout_post' => ['post-5'],
                                ),
                            ),
                            array(
                                'name' => 'feature_btn_controls',
                                'control_type' => 'tab',
                                'condition' => array(
                                    'layout_post' => ['post-5'],
                                ),
                                'tabs' => [
                                    [
                                        'name' => 'feature_btn_normal',
                                        'label' => esc_html__('Normal', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [  
                                            array(
                                                'name' => 'feature_btn_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'feature_btn_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button',
                                            ),
                                            array(
                                                'name' => 'feature_btn_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button',
                                            ),
                                            array(
                                                'name'         => 'feature_btn_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button',
                                            ),
                                            array(
                                                'name' => 'feature_btn_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'feature_btn_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'feature_btn_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [
                                            array(
                                                'name' => 'feature_btn_hover_style',
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
                                                    'layout_post' => ['post-2', 'post-3', 'post-4', 'post-5'],
                                                ]
                                            ),
                                            array(
                                                'name' => 'feature_btn_hover_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button:hover' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'feature_btn_hover_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic' ],
                                                'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button:hover',
                                            ),
                                            array(
                                                'name' => 'feature_btn_transition',
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
                                                    '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                                ]
                                            ),
                                            array(
                                                'name' => 'feature_btn_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button:hover',
                                            ),
                                            array(
                                                'name'         => 'feature_btn_hover_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button:hover',
                                            ),
                                            array(
                                                'name' => 'feature_btn_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'feature_btn_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'name' => 'tab_date_style',
                    'label' => esc_html__('Post Date', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'show_date!' => '',
                        'layout_post' => ['post-4', 'post-5', 'post-6', 'post-7']
                    ],
                    'controls' => array(
                        array(
                            'name' => 'date_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-date',
                        ),
                        array(
                            'name' => 'date_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-date' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'date_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-date',
                        ),
                        array(
                            'name' => 'date_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-date',
                        ),
                        array(
                            'name'         => 'date_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-post-date',
                        ),
                        array(
                            'name' => 'date_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'date_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-post-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'date_day_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'field_options' => array(
                                'typography' => [
                                    'label' => esc_html__('Day Typography', 'agron'),
                                ],
                            ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-day',
                        ),
                        array(
                            'name' => 'date_day_color',
                            'label' => esc_html__('Day Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-day' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'date_month_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'field_options' => array(
                                'typography' => [
                                    'label' => esc_html__('Month Typography', 'agron'),
                                ],
                            ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-month',
                        ),
                        array(
                            'name' => 'date_month_color',
                            'label' => esc_html__('Month Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-month' => 'color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'feature_item_date_heading',
                            'type' => 'heading',
                            'label' => esc_html__('Feature Date', 'agron'),
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'feature_date_box_size',
                            'label' => esc_html__('Box Size', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1,
                                    'step' => 0.01,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'feature_date_day_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'field_options' => array(
                                'typography' => [
                                    'label' => esc_html__('Day Typography', 'agron'),
                                ],
                            ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date',
                        ),
                        array(
                            'name' => 'feature_date_day_color',
                            'label' => esc_html__('Day Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date .pxl-day' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'feature_date_month_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'field_options' => array(
                                'typography' => [
                                    'label' => esc_html__('Month Typography', 'agron'),
                                ],
                            ),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-month',
                        ),
                        array(
                            'name' => 'feature_date_month_color',
                            'label' => esc_html__('Month Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'feature_date_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date',
                        ),
                        array(
                            'name' => 'feature_date_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date',
                        ),
                        array(
                            'name'         => 'feature_date_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date',
                        ),
                        array(
                            'name' => 'feature_date_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'feature_date_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post .pxl-item-feature .pxl-item-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
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
                        'selectors' => '{{WRAPPER}} .grid .grid-item, {{WRAPPER}} .pxl-swiper .swiper-slide',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);