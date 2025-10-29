<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_timeline_carousel',
        'title' => esc_html__('Case Timeline Carousel', 'agron' ),
        'icon' => 'eicon-time-line',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'agron-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_timeline_carousel_content',
                    'label' => esc_html__('Timeline Carousel', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(   
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('Title HTML Tag', 'agron'),
                            'type' => 'select',
                            'seperator' => 'before',
                            'options' => [
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
                            'default' => 'h5',
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'time',
                                    'label' => esc_html__('Time', 'agron' ),
                                    'type' => 'text',
                                    'label_block' => true, 
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'agron' ),
                                    'type' => 'text',
                                ),
                                array(
                                    'name' => 'description',
                                    'type' => 'textarea',
                                    'rows' => 10,
                                    'default' => esc_html__('Ultrices sagittis orci a scelerisque purus semper eget duis at. Sollicitu nibh sit amet.', 'agron'),
                                ),
                            ),
                            'title_field' => '{{{title}}}',
                            'default' => [
                                [
                                    'time' => esc_html__('2016', 'agron'),
                                    'title' => esc_html__('Grainfarmers Formed', 'agron'),
                                ],
                                [
                                    'time' => esc_html__('2018', 'agron'),
                                    'title' => esc_html__('Start of Agriculture', 'agron'),
                                ],
                                [
                                    'time' => esc_html__('2022', 'agron'),
                                    'title' => esc_html__('Open Our Firm', 'agron'),
                                ],
                                [
                                    'time' => esc_html__('2025', 'agron'),
                                    'title' => esc_html__('Farm Remodelacion', 'agron'),
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_swiper_additional_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        swiper_controls_options()
                    ),
                ),

                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'img_spacing',
                            'label' => esc_html__('Image Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_spacing',
                            'label' => esc_html__('Description Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_img_style',
                    'label' => esc_html__('Image', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'img_w',
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
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_max_w',
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
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_min_h',
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
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_h',
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
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'img_controls',
                            'control_type' => 'tab',
                            'separator' => 'before',
                            'tabs' => [
                                [
                                    'name' => 'img_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'img_opacity',
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
                                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'img_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured',
                                        ),
                                        array(
                                            'name' => 'img_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured',
                                        ),
                                        array(
                                            'name'         => 'img_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured',
                                        ),
                                        array(
                                            'name' => 'img_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'img_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'img_hover_opacity',
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
                                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-item .pxl-timeline-featured' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'img_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-item .pxl-timeline-featured',
                                        ),
                                        array(
                                            'name' => 'img_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-item .pxl-timeline-featured',
                                        ),
                                        array(
                                            'name'         => 'img_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-item .pxl-timeline-featured',
                                        ),
                                        array(
                                            'name' => 'img_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-item .pxl-timeline-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_event_style',
                    'label' => esc_html__('Event', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'event_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-event' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'event_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-event',
                        ),
                        array(
                            'name' => 'event_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-event',
                        ),
                        array(
                            'name' => 'event_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-event',
                        ),
                    )
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
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-title',
                        ),
                        array(
                            'name' => 'title_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-title',
                        ),
                    )
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
                                '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-description',
                        ),
                        array(
                            'name' => 'description_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-description',
                        ),
                        array(
                            'name' => 'description_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-timeline-carousel .pxl-timeline-description',
                        ),
                    )
                ),
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