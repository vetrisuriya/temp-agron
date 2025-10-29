<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_breadcrumb',
        'title' => esc_html__('Case Breadcrumb', 'agron' ),
        'icon' => 'eicon-yoast',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'agron' ),
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
                                '{{WRAPPER}} .pxl-breadcrumb' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'justify_content_row',
                            'label' => esc_html__('Justify Content', 'agron'),
                            'type' => 'choose',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'options' => array(
                                'start' => [
                                    'title' => esc_html__('Start', 'agron' ),
                                    'icon' => 'eicon-justify-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'agron' ),
                                    'icon' => 'eicon-justify-center-h',
                                ],
                                'end' => [
                                    'title' => esc_html__('End', 'agron' ),
                                    'icon' => 'eicon-justify-end-h',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb' => 'justify-content: {{VALUE}};'
                            ],
                        ),
                        
                    ),
                ),
                array(
                    'name' => 'tab_text_style',
                    'label' => esc_html__('Text', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'text_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-breadcrumb li > a, {{WRAPPER}} .pxl-breadcrumb li > span, {{WRAPPER}} .pxl-breadcrumb li > .separator',
                        ),
                        array(
                            'name' => 'text_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'text_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'text_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-breadcrumb li > a, 
                                                {{WRAPPER}} .pxl-breadcrumb li > span, 
                                                {{WRAPPER}} .pxl-breadcrumb li > .separator' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'text_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'text_hover_color',
                                            'label' => esc_html__('Link Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-breadcrumb li > a:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),

                    ),
                ),
                array(
                    'name' => 'tab_separator_style',
                    'label' => esc_html__('Separator', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'separator_color',
                            'label' => esc_html__('Icon Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb li > .separator' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'separator_size',
                            'label' => esc_html__('Icon Size', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb li > .separator' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);