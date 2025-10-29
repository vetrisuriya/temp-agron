<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_progress_bar',
        'title' => esc_html__( 'Case Progress Bar', 'agron' ),
        'icon' => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_progress_bar_content',
                    'label' => esc_html__( 'Content', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__( 'Layout Style', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                'default' => esc_attr('Default', 'agron'),
                                'style-1' => esc_html__('Style 1', 'agron'),
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__( 'Title', 'agron' ),
                            'type' => 'textarea',
                            'rows' => 2,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'percent',
                            'label' => esc_html__( 'Percent', 'agron' ),
                            'type' => 'slider',
                            'size_units' => ['%'],
                            'separator' => 'before',
                            'default' => [
                                'size' => 50,
                                'unit' => '%',
                            ],
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'line_weight',
                            'label' => esc_html__('Line Weight', 'agron'),
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
                                '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-track' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__('Bar Color', 'agron'),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-fill' => 'background-color: {{VALUE}};'
                            ] 
                        ),
                        array(
                            'name' => 'track_color',
                            'label' => esc_html__('Track Color', 'agron'),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-track' => 'background-color: {{VALUE}};'
                            ] 
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
                            'type' => 'slider',
                            'separator' =>' before',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'max-width: {{SIZE}}{{UNIT}} !important;',
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
                            'name' => 'progress_position',
                            'label' => esc_html__('Progress Position', 'agron'),
                            'type' => 'choose',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'options' => array(
                                'column' => [
                                    'title' => esc_html__('Top', 'agron' ),
                                    'icon' => 'eicon-arrow-up',
                                ],
                                'column-reverse' => [
                                    'title' => esc_html__('Bottom', 'agron' ),
                                    'icon' => 'eicon-arrow-down',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progress-bar' => 'flex-direction: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'progress_spacing',
                            'label' => esc_html__('Progress Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-progress-bar' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'meta_width',
                            'label' => esc_html__('Meta Width', 'agron'),
                            'type' => 'select',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'options' => array(
                                ''          => esc_html__('Default', 'agron'),
                                'auto'      => esc_html__('Auto', 'agron' ),
                                '100%'      => esc_html__('100%', 'agron' ),
                                'var(--pxl-width)' => esc_html__('Bar Width', 'agron')
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progress-bar .pxl-progress-meta' => 'width: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'meta_gap',
                            'label' => esc_html__('Meta Gap', 'agron' ),
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
                                '{{WRAPPER}} .pxl-progress-bar .pxl-progress-meta' => 'gap: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'title_typography',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'separator' => 'before',
                            'selector'     => '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-title',
                        ),
                        array(
                            'name' => 'title_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_percent_style',
                    'label' => esc_html__('Percent', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name'      => 'percent_color',
                            'label'     => esc_html__('Text Color', 'agron' ),
                            'type'      => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-percent' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'percent_typography',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'separator' => 'before',
                            'selector'     => '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-percent',
                        ),
                        array(
                            'name' => 'percent_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-percent',
                        ),
                        array(
                            'name' => 'percent_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progress-bar .pxl-progress-bar-percent',
                        ),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);