<?php
$post_type = ['product'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_product',
        'title' => esc_html__('Case Products', 'agron' ),
        'icon' => 'eicon-products',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'pxl-post-grid',
            'agron-swiper',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_product_layout',
                    'label'    => esc_html__( 'Layout', 'agron' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'type'     => 'hidden',
                                'default'  => 'product',
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
                                    'layout_product' => ['product-1', 'product-3', 'product-4', 'product-5'],
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
                                'name' => 'show_rating',
                                'label' => esc_html__('Show Rating', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                            ),
                            array(
                                'name' => 'show_excerpt',
                                'label' => esc_html__('Show Short Description', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_product' => ['2'],
                                ]
                            ),
                            array(
                                'name' => 'num_of_words',
                                'label' => esc_html__('Number of Words', 'agron' ),
                                'type' => 'number',
                                'condition' => [
                                    'show_excerpt!' => '',
                                    'layout_product' => ['2'],
                                ],
                            ),
                            array(
                                'name' => 'show_actions',
                                'label' => esc_html__('Show Actions', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                            ),
                            array(
                                'name' => 'show_add_to_cart',
                                'label' => esc_html__('Show Add to Cart Button', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_product' => ['product-2', 'product-3', 'product-5'],
                                ]
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_grid_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array(
                        grid_controls_options(),
                    ),
                    'condition' => [
                        'layout_type' => 'grid',
                        'layout_product!' => ['product-2']
                    ],
                ),
                array(
                    'name' => 'tab_carousel_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array(
                        swiper_controls_options(),   
                    ),
                    'condition' => [
                        'layout_type' => 'carousel',
                    ],
                ),

                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron'),
                    'tab'   => 'style',
                    'controls' => [
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
                                '{{WRAPPER}} .pxl-product .pxl-product-featured' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-product .pxl-product-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'rating_spacing',
                            'label' => esc_html__('Rating Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-poduct-rating' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'rating_gap',
                            'label' => esc_html__('Rating Gap', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-rating .rating-star' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
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
                            'name' => 'price_spacing',
                            'label' => esc_html__('Price Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-item',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-item',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-product-item',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-item:hover',
                                        ),
                                        array(
                                            'name'      => '_box_hover_border_color',
                                            'label'     => esc_html__('Border Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-item:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-item:hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-product-item:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-item:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-content',
                        ),
                        array(
                            'name' => 'content_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-content',
                        ),
                        array(
                            'name'         => 'content_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-product-content',
                        ),
                        array(
                            'name' => 'content_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-product .pxl-product-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_featured_style',
                    'label' => esc_html__('Product Featured', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'featured_img_fit',
                            'label' => esc_html__('Image Fit', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                '' => esc_html__('Default', 'agron'),
                                'cover' => esc_html__('Cover', 'agron'),
                                'contain' => esc_html__('Contain', 'agron'),
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-featured img' => 'object-fit: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'featured_width',
                            'label' => esc_html__('Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-featured img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'featured_max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-featured img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'featured_height',
                            'label' => esc_html__('Height', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-featured img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'featured_max_height',
                            'label' => esc_html__('Max Height', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-featured img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'featured_min_height',
                            'label' => esc_html__('Min Height', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-featured' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
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
                                            'name' => 'featured_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-featured',
                                        ),
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
                                                '{{WRAPPER}} .pxl-product .pxl-product-featured img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-featured img',
                                        ),
                                        array(
                                            'name' => 'featured_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-product-featured',
                                        ),
                                        array(
                                            'name' => 'featured_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'featured_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-featured' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-product .pxl-product-item:hover .pxl-post-featured img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-item:hover .pxl-post-featured img',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-product-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-item:hover .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_name_style',
                    'label' => esc_html__('Product Name', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-name',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-name',
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
                                                '{{WRAPPER}} .pxl-product .pxl-product-name' => 'color: {{VALUE}};',
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
                                                        'hover-text-default' => esc_html__('Default', 'agron'),
                                                    ],
                                                ],
                                                [
                                                    'label' => esc_html__('Underline', 'agron'),
                                                    'options' => [
                                                        'hover-text-underline' => esc_html__('Underline', 'agron'),
                                                        'hover-text-underline--slide-ltr' => esc_html__('Slide LTR', 'agron'),
                                                        'hover-text-underline--slide-rtl' => esc_html__('Slide RTL', 'agron'),
                                                    ],
                                                ],
                                            ],
                                            'default' => 'hover-text-default',
                                        ),
                                        array(
                                            'name' => 'title_underline_h',
                                            'label' => esc_html__('Underline Weight(px)', 'agron'),
                                            'type' => 'slider',
                                            'size_units' => ['px'],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-name' => "--pxl-height: {{SIZE}}{{UNIT}};",
                                            ],
                                            'condition' => [
                                                'title_hover_style' => ['hover-text-underline', 'hover-text-underline--slide-ltr', 'hover-text-underline--slide-rtl'],
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
                                                '{{WRAPPER}} .pxl-product .pxl-product-name:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_price_style',
                    'label' => esc_html__('Product Price', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'price_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-price',
                        ),
                        array(
                            'name' => 'price_color',
                            'label' => esc_html__('Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-price' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'price_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'price_ins',
                                    'label' => esc_html__('Ins', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'price_ins_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-price ins' => 'color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'price_ins_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-price ins',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'price_del',
                                    'label' => esc_html__('Del', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'price_del_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-price del' => 'color: {{VALUE}} !important;',
                                            ],
                                        ),
                                        array(
                                            'name' => 'price_del_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-price del',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_rating_style',
                    'label' => esc_html__('Product Rating', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'rating_star_size',
                            'label' => esc_html__('Star Size', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-rating svg' => 'width: {{SIZE}}{{UNIT}}; height:auto;',
                            ],
                        ),
                        array(
                            'name' => 'star_color',
                            'label' => esc_html__('Star Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product .pxl-product-rating .rating-star' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_sale_style',
                    'label' => esc_html__('Product Sale', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'sale_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'sale_text',
                                    'label' => esc_html__('Text', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'sale_text_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-badge',
                                        ),
                                        array(
                                            'name' => 'sale_text_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-badge' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'sale_text_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-badge',
                                        ),
                                        array(
                                            'name' => 'sale_text_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-badge',
                                        ),
                                        array(
                                            'name'         => 'sale_text_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-badge',
                                        ),
                                        array(
                                            'name' => 'sale_text_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'sale_text_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'sale_percent',
                                    'label' => esc_html__('Percent', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'sale_percent_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-percent',
                                        ),
                                        array(
                                            'name' => 'sale_percent_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-percent' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'sale_percent_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-percent',
                                        ),
                                        array(
                                            'name' => 'sale_percent_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-percent',
                                        ),
                                        array(
                                            'name'         => 'sale_percent_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-percent',
                                        ),
                                        array(
                                            'name' => 'sale_percent_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-percent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'sale_percent_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-product-sale .pxl-sale-percent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label' => esc_html__('Product Button', 'agron' ),
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
                                    '{{WRAPPER}} .pxl-product .pxl-post-button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_box_size',
                                'label' => esc_html__('Box Size', 'agron' ),
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
                                    '{{WRAPPER}} .pxl-product .pxl-post-button, 
                                    {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn,
                                    {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn,
                                    {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-product .pxl-post-button, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-post-button, 
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn,
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn,
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn',
                                        ),
                                        array(
                                            'name' => 'btn_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-post-button, 
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn,
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn,
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn',
                                        ),
                                        array(
                                            'name'         => 'btn_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-post-button, 
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn,
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn,
                                            {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn',
                                        ),
                                        array(
                                            'name' => 'btn_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-post-button, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-product .pxl-post-button, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'btn_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
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
                                                'layout_service' => ['service-1', 'service-4', 'service-6', 'service-7'],
                                            ]
                                        ),
                                        array(
                                            'name' => 'btn_hover_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn.woosw-added,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn.woosc-added' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn.woosw-added,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn.woosc-added',
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
                                                '{{WRAPPER}} .pxl-product .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn.woosw-added,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn.woosc-added' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'btn_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-product .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn.woosw-added,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn.woosc-added',
                                        ),
                                        array(
                                            'name'         => 'btn_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-product .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn.woosw-added,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn.woosc-added',
                                        ),
                                        array(
                                            'name' => 'btn_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-product .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn.woosw-added,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn.woosc-added' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-product .pxl-post-button:hover, 
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosq-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosw-btn.woosw-added,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn:hover,
                                                {{WRAPPER}} .pxl-product .pxl-product-item .pxl-product-actions .woosc-btn.woosc-added' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        'selectors' => '{{WRAPPER}} .grid .grid-item, {{WRAPPER}} .pxl-swiper .swiper-slide',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);