<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_gallery',
        'title' => esc_html__('Case Image Gallery', 'agron' ),
        'icon' => 'eicon-gallery-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'agron-swiper',
            'agron-layout',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_image_content',
                    'label' => esc_html__('Images', 'agron' ),
                    'tab' => 'content',
                    'controls' => array_merge(
                        array(
                            array(
                            'name' => 'layout_type',
                            'label' => esc_html__('Layout Type', 'agron'),
                            'type' => 'select',
                            'separator' => 'before',
                            'options' => [
                                'grid'    => esc_html__('Grid', 'agron'),
                                'masonry' => esc_html__('Masonry', 'agron'),
                                'carousel' => esc_html__('Carousel', 'agron'),
                            ],
                            'default' => 'grid',
                        ),
                            array(
                                'name' => 'images',
                                'label' => esc_html__( 'Add Images', 'agron' ),
                                'type' => 'gallery',
                                'show_label' => true,
                                'default' => [],
                            ),
                        ),
                        image_dimension_options(),
                        array(
                            array(
                                'name' => 'is_overlay',
                                'label' => esc_html__('Overlay', 'agron'),
                                'type' => 'switcher',
                                'separator' => 'before',
                                'default' => '',
                            ),
                            array(
                                'name' => 'overlay_bg',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .pxl-image-gallery .grid-item-inner .pxl-background-overlay',
                                'condition' => [
                                    'is_overlay!' => '',
                                ],
                            ),
                            array(
                                'name' => 'overlay_bg_opacity',
                                'label' => esc_html__('Overlay Opacity', 'agron' ),
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
                                    '{{WRAPPER}} .pxl-image-gallery .grid-item-inner .pxl-background-overlay' => 'opacity: {{SIZE}};',
                                ],
                                'condition' => [
                                    'is_overlay!' => '',
                                ],
                            ),
                            array(
                                'name' => '_icon',
                                'label' => esc_html__('Icon', 'agron' ),
                                'type' => 'icons',
                                'fa4compatibility' => 'icon',
                                'separator' => 'before',
                                'default' => [
                                    'value' => [
                                        'url' => content_url('/uploads/2025/05/plus.svg'), 
                                        'id' => 948, 
                                    ],
                                    'library' => 'svg',
                                ],
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'tab_image_additional_options',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'content',
                    'condition' => [
                        'layout_type!' => 'carousel',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'columns',
                            'label' => esc_html__('Columns', 'agron'),
                            'type' => 'select',
                            'control_type' => 'responsive' ,
                            'options' => [
                                ''     => esc_html__('Default', 'agron'),
                                '100%' => '1',
                                '50%'  => '2',
                                '33.3333%' => '3',
                                '25%'  => '4',
                                '20%'  => '5',
                                '16.66666%' => '6',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-gallery .grid-item, 
                                {{WRAPPER}} .pxl-image-gallery.masonry .grid-sizer'  => 'flex-basis: {{VALUE}}; max-width: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'grid_sizer_width',
                            'label' => esc_html__('Grid Sizer', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['%', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'unit' => '%',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-gallery.masonry .grid-sizer' => 'flex-basis: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'columns' => '',
                            ],
                            'description' => esc_html__('Grid item widths should be multiples of the grid-sizer for accurate layout alignment.', 'agron'),
                        ),
                        array(
                            'name' => 'masonry_items',
                            'label' => esc_html__('Masonry Items', 'agron' ),
                            'type' => 'repeater',
                            'condition' => [
                                'layout_type' => 'masonry',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'masonry_item_width',
                                    'label' => esc_html__('Width', 'agron'),
                                    'type' => 'slider',
                                    'control_type' => 'responsive',
                                    'size_units' => ['%', 'custom'],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'default' => [
                                        'unit' => '%',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-image-gallery.masonry .grid-item{{CURRENT_ITEM}}' => 'flex-basis: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'masonry_item_height',
                                    'label' => esc_html__('Height', 'agron'),
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
                                        '{{WRAPPER}} .pxl-image-gallery.masonry .grid-item{{CURRENT_ITEM}} .grid-item-inner' => 'height: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'img_dimension_m',
                                    'label' => esc_html__('Image Dimension', 'agron'),
                                    'type' => 'select',
                                    'options' => [
                                        'thumbnail'     => esc_html__('Thumbnail', 'agron'),
                                        'thumb'         => esc_html__('Thumb (Alias of Thumbnail)', 'agron'),
                                        'medium'        => esc_html__('Medium', 'agron'),
                                        'medium_large'  => esc_html__('Medium Large', 'agron'),
                                        'large'         => esc_html__('Large', 'agron'),
                                        'full'          => esc_html__('Full (Original)', 'agron'),
                                        'custom'        => esc_html__('Custom', 'agron'),
                                    ],
                                    'default' => 'full',
                                ),
                                array(
                                    'name' => 'img_dimension_m_custom',
                                    'label' => esc_html__( 'Image Dimension Custom', 'agron' ),
                                    'type' => 'image_dimensions',
                                    'separator' => 'before',
                                    'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'agron' ),
                                    'condition' => [
                                        'img_dimension_m' => 'custom',
                                    ]
                                ),
                            ),
                        ),
                        array(
                            'name' => 'item_spacing_block',
                            'label' => esc_html__('Spacing Block', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'separator' => 'before',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-gallery' => '--pxl-spacing-block: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing_inline',
                            'label' => esc_html__('Spacing Inline', 'agron'),
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
                                '{{WRAPPER}} .pxl-image-gallery' => '--pxl-spacing-inline: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_carousel_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'condition' => [
                        'layout_type' => 'carousel',
                    ],
                    'controls' => array(
                        swiper_controls_options(),   
                    ),
                ),
                array(
                    'name' => 'tab_image_style',
                    'label' => esc_html__('Image', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'image_width',
                            'label' => esc_html__('Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 2000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner img, {{WRAPPER}} .pxl-swiper .swiper-slide img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_max_w',
                            'label' => esc_html__('Max Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 2000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner img, {{WRAPPER}} .pxl-swiper .swiper-slide img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_min_h',
                            'label' => esc_html__('Min Height', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 2000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner img, {{WRAPPER}} .pxl-swiper .swiper-slide img' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_h',
                            'label' => esc_html__('Height', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 2000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner img, {{WRAPPER}} .pxl-swiper .swiper-slide img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_controls',
                            'control_type' => 'tab',
                            'separator' => 'before',
                            'tabs' => [
                                [
                                    'name' => 'image_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'image_opacity',
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
                                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner, {{WRAPPER}} .pxl-swiper .swiper-slide img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'image_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-image-gallery .grid-item-inner, {{WRAPPER}} .pxl-swiper .swiper-slide img',
                                        ),
                                        array(
                                            'name' => 'image_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-image-gallery .grid-item-inner, {{WRAPPER}} .pxl-swiper .swiper-slide img',
                                        ),
                                        array(
                                            'name'         => 'image_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-image-gallery .grid-item-inner, {{WRAPPER}} .pxl-swiper .swiper-slide img',
                                        ),
                                        array(
                                            'name' => 'image_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner, {{WRAPPER}} .pxl-swiper .swiper-slide img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'image_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'image_hover_opacity',
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
                                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner:hover, 
                                                {{WRAPPER}} .pxl-swiper .swiper-slide img:hover' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'image_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-image-gallery .grid-item-inner:hover, 
                                            {{WRAPPER}} .pxl-swiper .swiper-slide img:hover',
                                        ),
                                        array(
                                            'name' => 'image_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-image-gallery .grid-item-inner:hover, 
                                            {{WRAPPER}} .pxl-swiper .swiper-slide img:hover',
                                        ),
                                        array(
                                            'name'         => 'image_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-image-gallery .grid-item-inner:hover, 
                                            {{WRAPPER}} .pxl-swiper .swiper-slide img:hover',
                                        ),
                                        array(
                                            'name' => 'image_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner:hover, 
                                                {{WRAPPER}} .pxl-swiper .swiper-slide img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),

                                        array(
                                            'name' => 'image_hover_overlay_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-image-gallery .grid-item-inner:hover .pxl-background-overlay',
                                            'condition' => [
                                                'is_overlay!' => '',
                                            ],
                                        ),
                                        array(
                                            'name' => 'image_hover_overlay_bg_opacity',
                                            'label' => esc_html__('Overlay Opacity', 'agron' ),
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
                                                '{{WRAPPER}} .pxl-image-gallery .grid-item-inner:hover .pxl-background-overlay' => 'opacity: {{SIZE}};',
                                            ],
                                            'condition' => [
                                                'is_overlay!' => '',
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