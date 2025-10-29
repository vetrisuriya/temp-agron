<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_step_carousel',
        'title' => esc_html__('Case Step Carousel', 'agron' ),
        'icon' => 'eicon-slider-vertical',
        'categories' => array('pxltheme-core'),
        'scripts' => array('
            agron-swiper'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_btn_content',
                    'label' => esc_html__('Steps', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'title_field' => '{{{ title }}}',
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'agron' ),
                                    'type' => 'media',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'agron'),
                                    'type' => 'text',
                                    'separator' => 'before',
                                    'label_block' => true,
                                    'default' => esc_html__('Heading Title', 'agron'),
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'agron'),
                                    'type' => 'textarea',
                                    'rows' => 10,
                                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'agron'),
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
                                    'name' => 'link_url',
                                    'label' => esc_html__('Link URL', 'agron'),
                                    'type' => 'url',
                                    'separator' => 'before',
                                    'label_block' => true,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_testimonial_display',
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
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron'),
                    'tab'   => 'style',
                    'controls' => [
                        array(
                            'name' => 'img_spacing',
                            'label' => esc_html__('Image Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_size',
                            'label' => esc_html__('Icon Box Size', 'agron' ),
                            'type' => 'slider',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-icon' => '--pxl-box-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-icon' => 'font-size: {{SIZE}}{{UNIT}};'
                            ],
                        ),
                    ],
                ),
                array(
                    'name' => 'tab_icon_style',
                    'label' => esc_html__('Icon', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_bg',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-icon',
                        ),
                        array(
                            'name' => 'icon_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'separator' => 'before',
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-icon',
                        ),
                        array(
                            'name'         => 'icon_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-step-carousel .pxl-step-icon',
                        ),
                        array(
                            'name' => 'icon_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_index_style',
                    'label' => esc_html__('Index', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'index_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-index' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'index_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-index',
                        ),
                        array(
                            'name' => 'index_bg',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-index',
                        ),
                        array(
                            'name' => 'index_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'separator' => 'before',
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-index',
                        ),
                        array(
                            'name'         => 'index_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-step-carousel .pxl-step-index',
                        ),
                        array(
                            'name' => 'index_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-index' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_image_style',
                    'label' => esc_html__('Image', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'img_width',
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
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-image img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_max_width',
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
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-image img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_height',
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
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-image img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_max_height',
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
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-image img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
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
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-image img' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name'     => 'featured_css_filters',
                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-image img',
                        ),
                        array(
                            'name' => 'featured_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'separator' => 'before',
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-image',
                        ),
                        array(
                            'name'         => 'featured_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-step-carousel .pxl-step-image',
                        ),
                        array(
                            'name' => 'featured_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_title_style',
                    'label' => esc_html__('Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_description_style',
                    'label' => esc_html__('Description', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-step-carousel .pxl-step-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-step-carousel .pxl-step-description',
                        ),
                    ),
                ),
                array(
                    'name' => 'pxl_motion_effects',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'tab' => 'style',
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-swiper .swiper-slide'
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);