<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pie_chart',
        'title' => esc_html__('Case Pie Chart', 'agron'),
        'icon' => 'eicon-circle-o',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            // 'easy-pie-chart',
            'agron-pie-chart',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_pie_chart_content',
                    'label' => esc_html__('Pie Chart', 'agron'),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'layout_style',
                            'label' => esc_html__('Layout Style', 'agron' ),
                            'type' => 'select',
                            'default' => '',
                            'options' => [
                                'pie-chart-default' => esc_html__('Default', 'agron' ),
                                'pie-chart-style1'  => esc_html__('Style 1', 'agron' ),
                            ],
                            'default' => 'pie-chart-default',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'agron'),
                            'type' => 'textarea',
                            'rows' => 3,
                        ),
                        array(
                            'name' => 'percent',
                            'label' => esc_html__('Percent(%)', 'agron'),
                            'type' => 'number',
                            'min'  => 1,
                            'default' => 50,
                            'separator' => 'before'
                        ),
                        array(
                            'name' => 'chart_size',
                            'label' => esc_html__('Chart Size(px)', 'agron'),
                            'type' => 'number',
                            'min'  => 1,
                            'default' => 85,
                        ),
                        array(
                            'name' => 'line_width',
                            'label' => esc_html__('Line Width(px)', 'agron'),
                            'type' => 'number',
                            'min'  => 1,
                            'default' => 5,
                        ),
                        array(
                            'name' => 'rotate',
                            'label' => esc_html__('Rotate(deg)', 'agron'),
                            'type' => 'number',
                            'min'  => 1,
                            'default' => 5,
                        ),
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__('Bar Color', 'agron'),
                            'type' => 'color',
                        ),
                        array(
                            'name' => 'track_color',
                            'label' => esc_html__('Track Color', 'agron'),
                            'type' => 'color',
                        ),
                        array(
                            'name' => 'line_cap',
                            'label' => esc_html__('Line Cap', 'agron'),
                            'type' => 'select',
                            'options' => [
                                ''        =>  esc_html__('Default', 'agron'),
                                'round'   =>  esc_html__('Round', 'agron'),
                                'square'  =>  esc_html__('Square', 'agron'),
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
                            'name' => 'flex_direction',
                            'label' => esc_html__('Flex Direction', 'agron'),
                            'type' => 'choose',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'options' => array(
                                'row' => [
                                    'title' => esc_html__('Row', 'agron' ),
                                    'icon' => 'eicon-arrow-right',
                                ],
                                'column' => [
                                    'title' => esc_html__('Center', 'agron' ),
                                    'icon' => 'eicon-arrow-down',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart' => 'flex-direction: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'title_alignment',
                            'label' => esc_html__('Title Alignment', 'agron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'options' => [
                                'left' =>  [
                                    'title' => esc_html__('Left', 'agron'),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' =>  [
                                    'title' => esc_html__('Center', 'agron'),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' =>  [
                                    'title' => esc_html__('Right', 'agron'),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-title' => 'text-align: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'agron' ),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart' => 'max-width: {{SIZE}}{{UNIT}};',
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
                            'name'      => 'title_color',
                            'label'     => esc_html__('Text Color', 'agron' ),
                            'type'      => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'title_typography',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'separator' => 'before',
                            'selector'     => '{{WRAPPER}} .pxl-pie-chart .pxl-title',
                        ),
                        array(
                            'name' => 'title_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_percent_style',
                    'label' => esc_html__('percent', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name'      => 'percent_color',
                            'label'     => esc_html__('Text Color', 'agron' ),
                            'type'      => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pie-chart .pxl-percent' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'percent_typography',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'separator' => 'before',
                            'selector'     => '{{WRAPPER}} .pxl-pie-chart .pxl-percent',
                        ),
                        array(
                            'name' => 'percent_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-percent',
                        ),
                        array(
                            'name' => 'percent_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pie-chart .pxl-percent',
                        ),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);
