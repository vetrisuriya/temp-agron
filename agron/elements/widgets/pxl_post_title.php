<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_title',
        'title' => esc_html__('Case Post Title', 'agron' ),
        'icon' => 'eicon-post-title',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(         
                array(
                    'name' => 'tab_post_title_content',
                    'label' => esc_html__('Post Title', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name'    => 'enable_custom_title',
                            'label'   => esc_html__('Custom Title', 'agron'),
                            'type'    => 'switcher',
                            'default' => '',
                        ),
                        array(
                            'name'    => 'get_title_default',
                            'label'   => esc_html__('Get Title Default', 'agron'),
                            'type'    => 'switcher',
                            'default' => '',
                            'condition' => [
                                'enable_custom_title' => '',
                            ],
                        ),
                        array(
                            'name'      => 'custom_title_text',
                            'label'     => esc_html__('Custom Title Text', 'agron'),
                            'type'      => 'textarea',
                            'row'       => 5,
                            'condition' => [
                                'enable_custom_title' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('Title HTML Tag', 'agron' ),
                            'type' => 'select',
                            'separator' => 'before',
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'p' => 'p',
                                'span' => 'span',
                            ],
                            'default' => 'h1',
                        ),
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__('Alignment', 'agron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
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
                                'justify' =>  [
                                    'title' => esc_html__('Justify', 'agron'),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-title' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_post_title_style',
                    'label' => esc_html__('Post Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name'         => 'title_typography',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'separator' => 'before',
                            'selector'     => '{{WRAPPER}} .pxl-post-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-title',
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
                                            'name'      => 'title_color',
                                            'label'     => esc_html__('Text Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-post-title',
                                        ),
                                    ],
                                ],
                                
                                [
                                    'name' => 'title_highlight',
                                    'label' => esc_html__('Highlight', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name'      => 'title_hl_color',
                                            'label'     => esc_html__('Text Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-title .pxl-text-highlight' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_hl_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-post-title .pxl-text-highlight',
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