<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_carousel',
        'title' => esc_html__('Case Testimonial Carousel', 'agron' ),
        'icon' => 'eicon-testimonial-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'agron-swiper',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_testimonial_layout',
                    'label' => esc_html__('Layout', 'agron'),
                    'tab' => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'agron'),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => array(
                                '1' => array(
                                    'label' => esc_html__('Testimonial 1', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/testimonial-1.webp',
                                ),
                                '2' => array(
                                    'label' => esc_html__('Testimonial 2', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/testimonial-2.webp',
                                ),
                                '3' => array(
                                    'label' => esc_html__('Testimonial 3', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/testimonial-3.webp',
                                ),
                                '4' => array(
                                    'label' => esc_html__('Testimonial 4', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/testimonial-4.webp',
                                ),
                                '5' => array(
                                    'label' => esc_html__('Testimonial 5', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/testimonial-5.webp',
                                ),
                                '6' => array(
                                    'label' => esc_html__('Testimonial 6', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/testimonial-6.webp',
                                ),
                                '7' => array(
                                    'label' => esc_html__('Testimonial 7', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/testimonial-7.webp',
                                ),
                                '8' => array(
                                    'label' => esc_html__('Testimonial 8', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/testimonial-8.webp',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_testimonial_content',
                    'label' => esc_html__('Items', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => '_icon',
                            'label' => esc_html__('Icon', 'agron'),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/05/chat-bubble.svg'),
                                    'id' => 600,
                                ],
                                'library' => 'svg',
                            ],
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'featured',
                                    'label' => esc_html__('Featured', 'agron' ),
                                    'type' => 'media',
                                ),
                                array(
                                    'name' => 'rating',
                                    'label' => esc_html__('Rating', 'agron'),
                                    'type' => 'number',
                                    'min' => 0,
                                    'max' => 5,
                                ),
                                array(
                                    'name' => 'heading',
                                    'label' => esc_html__('Heading', 'agron'),
                                    'type' => 'text',
                                    'default' => esc_html__('Heading', 'agron'),
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'agron'),
                                    'type' => 'textarea',
                                    'rows' => 10,
                                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'agron'),
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'agron' ),
                                    'type' => 'media',
                                ),
                                array(
                                    'name' => 'name',
                                    'label' => esc_html__('Name', 'agron'),
                                    'type' => 'text',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'agron'),
                                    'type' => 'text',
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link URL', 'agron' ),
                                    'type' => 'url',
                                ),
                            ),
                            'title_field' => '{{{ name }}}',
                            'default' => [
                                [
                                    'content' => esc_html__('“I would recommend practitioners at this center to everyone! They are great to work with and are excellent trainers. Thank you all!”', 'agron'),
                                    'name'    => 'Benjamin Taylor',
                                    'title'   => 'Formal Farmer',
                                    'rating'  => 5,
                                ],
                                [
                                    'content' => esc_html__('“I would recommend practitioners at this center to everyone! They are great to work with and are excellent trainers. Thank you all!”', 'agron'),
                                    'name'    => 'Emilio J. Harper',
                                    'title'   => 'Formal Farmer',
                                    'rating'  => 5,
                                ],
                            ],

                        ),
                    ),
                ),
                array(
                    'name' => 'tab_thumbs_content',
                    'label' => esc_html__('Thumbs Options', 'komestic' ),
                    'tab' => 'content',
                    'condition' => [
                        'layout' => ['7'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'thumbs',
                            'label' => esc_html__('Thumbs', 'komestic' ),
                            'type' => 'repeater',
                            'controls' => array_merge(
                                array(
                                    [
                                        'name' => 'thumbs_box_sz',
                                        'label' => esc_html__('Box Size', 'komestic'),
                                        'type' => 'slider',
                                        'control_type' => 'responsive',
                                        'size_units' => ['px', '%', 'custom'],
                                        'range' => [
                                            'px' => [
                                                'min' => 0,
                                            ],
                                            '%' => [
                                                'min' => 0,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}} .pxl-swiper img{{CURRENT_ITEM}}' => '--pxl-box-size: {{SIZE}}{{UNIT}};'
                                        ],
                                    ],
                                    array(
                                        'name' => 'thumbs_z_index',
                                        'label' => esc_html__('Z index', 'komestic'),
                                        'type' => 'number',
                                        'selectors' => [
                                            '{{WRAPPER}} .pxl-swiper img{{CURRENT_ITEM}}' => 'z-index: {{VALUE}};'
                                        ],
                                    ),
                                    array(
                                        'name' => 'layer_position_heading',
                                        'label' => esc_html__('Position', 'komestic'),
                                        'type' => 'heading',
                                    ),
                                    [
                                        'name' => 'thumb_offset_t',
                                        'label' => esc_html__('Top', 'agron' ),
                                        'type' => 'slider',
                                        'size_units' => [ 'px', 'custom' ],
                                        'control_type' => 'responsive',
                                        'range' => [
                                            'px' => [
                                                'min' => 1,
                                                'max' => 1000,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}} .pxl-swiper img{{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                                        ],
                                    ],
                                    [
                                        'name' => 'thumb_offset_r' ,
                                        'label' => esc_html__('Right', 'agron' ),
                                        'type' => 'slider',
                                        'size_units' => [ 'px', 'custom' ],
                                        'control_type' => 'responsive',
                                        'range' => [
                                            'px' => [
                                                'min' => 1,
                                                'max' => 1000,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}} .pxl-swiper img{{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
                                        ],
                                    ],
                                    [
                                        'name' => 'thumb_offset_b' ,
                                        'label' => esc_html__('Bottom', 'agron' ),
                                        'type' => 'slider',
                                        'size_units' => [ 'px', 'custom' ],
                                        'control_type' => 'responsive',
                                        'range' => [
                                            'px' => [
                                                'min' => 1,
                                                'max' => 1000,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}} .pxl-swiper img{{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                                        ],
                                    ],
                                    [
                                        'name' => 'thumb_offset_l' ,
                                        'label' => esc_html__('Left', 'agron' ),
                                        'type' => 'slider',
                                        'size_units' => [ 'px', 'custom' ],
                                        'control_type' => 'responsive',
                                        'range' => [
                                            'px' => [
                                                'min' => 1,
                                                'max' => 1000,
                                            ],
                                        ],
                                        'selectors' => [
                                            '{{WRAPPER}} .pxl-swiper img{{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                                        ],
                                    ],
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_testimonial_display',
                    'label' => esc_html__('Display', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array(
                        array(
                            'name' => 'show_rating',
                            'label' => esc_html__('Show Rating', 'agron' ),
                            'type' => 'switcher',
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1', '4', '5', '8'],
                            ],
                        ),   
                        array(
                            'name' => 'show_user',
                            'label' => esc_html__('Show User', 'agron' ),
                            'type' => 'switcher',
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_icon',
                            'label' => esc_html__('Show Icon', 'agron' ),
                            'type' => 'switcher',
                            'default' => 'true',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_icon',
                    'label' => esc_html__('Icon', 'agron'),
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
                                '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon ' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ), 
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon',
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
                                '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon',
                        ),
                        array(
                            'name'         => 'icon_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon',
                        ),
                        array(
                            'name' => 'icon_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper .pxl-testimonial-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),  
                array(
                    'name' => 'tab_carousel_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array(
                        swiper_controls_options(),   
                    ),
                ),
                array(
                    'name' => 'tab_gereral_style',
                    'label' => esc_html__('General', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'rating_spacing',
                            'label' => esc_html__('Rating Spacing', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'rating_gap',
                            'label' => esc_html__('Rating Gap', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_spacing',
                            'label' => esc_html__('Content Spacing', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'user_gap',
                            'label' => esc_html__('User Gap', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
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
                                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name' => 'box_hove_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item:hover',
                                        ),
                                        array(
                                            'name' => '_box_hover_border_color',
                                            'label' => esc_html__('Border Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item:hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label' => esc_html__('Testimonial Featured', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .testimonial-images img' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name'     => 'featured_css_filters',
                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .testimonial-images img',
                        ),
                        array(
                            'name' => 'featured_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'separator' => 'before',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .testimonial-images',
                        ),
                        array(
                            'name'         => 'featured_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-testimonial-carousel .testimonial-images',
                        ),
                        array(
                            'name' => 'featured_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .testimonial-images' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_rating_style',
                    'label' => esc_html__('Testimonial Rating', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'rating_icon_size',
                            'label' => esc_html__('Icon Size', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'rating_color',
                            'label' => esc_html__('Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'rating_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating',
                        ),
                        array(
                            'name' => 'rating_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating',
                        ),
                        array(
                            'name'         => 'rating_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating',
                        ),
                        array(
                            'name' => 'rating_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'rating_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content_style',
                    'label' => esc_html__('Testimonial Content', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'content_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-content',
                        ),
                        array(
                            'name' => 'content_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-content',
                        ),
                        array(
                            'name' => 'content_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'content_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'content_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-content' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'content_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'content_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-item:hover .pxl-testimonial-content' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_user_image_style',
                    'label' => esc_html__('User Image', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'user_image_box_size',
                            'label' => esc_html__('Box Size', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-image img' => '--pxl-box-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'user_image_opacity',
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
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-image img' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name'     => 'user_image_css_filters',
                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-image img',
                        ),
                        array(
                            'name' => 'user_image_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'separator' => 'before',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-image img',
                        ),
                        array(
                            'name'         => 'user_image_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-image img',
                        ),
                        array(
                            'name' => 'user_image_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_user_title_style',
                    'label' => esc_html__('User Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'user_title_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'user_title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-title',
                        ),
                        array(
                            'name' => 'user_title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_user_name_style',
                    'label' => esc_html__('User Name', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'user_name_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-name' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'user_name_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-name',
                        ),
                        array(
                            'name' => 'user_name_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-testimonial-user .pxl-user-name',
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
                        'selectors' => '{{WRAPPER}} .pxl-swiper .swiper-slide',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);