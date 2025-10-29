<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_featured_image',
        'title' => esc_html__('Case Featured Image', 'agron' ),
        'icon' => 'eicon-featured-image',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'bundle',
            'agron-effects',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_image_content',
                    'label' => esc_html__('Image', 'agron' ),
                    'tab' => 'content',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'image',
                                'label' => esc_html__('Image', 'agron' ),
                                'type' => 'media',
                            ),
                        ),
                        image_dimension_options(),
                        array(
                            array(
                                'name' => 'image_link',
                                'label' => esc_html__('Link URL', 'agron' ),
                                'type' => 'url',
                            ),
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
                                'selector' => '{{WRAPPER}} .pxl-featured-image-wrapper:after',
                                'condition' => [
                                    'is_overlay!' => '',
                                ],
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'tab_image_style',
                    'label' => esc_html__('Image', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'image_w',
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
                                '{{WRAPPER}} .pxl-featured-image-wrapper' => 'width: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-featured-image-wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-featured-image-wrapper' => 'min-height: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-featured-image-wrapper' => 'height: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-featured-image-wrapper' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'image_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-featured-image-wrapper',
                                        ),
                                        array(
                                            'name' => 'image_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-featured-image-wrapper',
                                        ),
                                        array(
                                            'name'         => 'image_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-featured-image-wrapper',
                                        ),
                                        array(
                                            'name' => 'image_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-featured-image-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-featured-image-wrapper:hover' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'image_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-featured-image-wrapper:hover',
                                        ),
                                        array(
                                            'name' => 'image_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-featured-image-wrapper:hover',
                                        ),
                                        array(
                                            'name'         => 'image_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-featured-image-wrapper:hover',
                                        ),
                                        array(
                                            'name' => 'image_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-featured-image-wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'image_hover_effect',
                                            'label' => esc_html__('Hover Effect', 'agron' ),
                                            'type' => 'select',
                                            'separator' => 'before',
                                            'options' => [
                                                ''               => esc_html__('None', 'agron'),
                                                'hover-image-parallax' => esc_html__('Parallax', 'agron'),
                                                'hover-flowmap-deformation flowmap-deformation1' => esc_html__('Flowmap Deformation 1', 'agron'),
                                                'hover-flowmap-deformation flowmap-deformation2' => esc_html__('Flowmap Deformation 2', 'agron'),
                                                'hover-distortion-transition' => esc_html__('Image Distortion', 'agron'),
                                            ],
                                            'default' => '',
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
                        'selectors' => '{{WRAPPER}} .pxl-featured-image-wrapper',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);