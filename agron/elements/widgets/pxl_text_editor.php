<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_editor',
        'title' => esc_html__('Case Text Editor', 'agron'),
        'icon' => 'eicon-text',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'agron-animated'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_text_editor_content',
                    'label' => esc_html__('Text Editor', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'text_style',
                            'label' => esc_html__( 'Text Style', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                'text-default'  => esc_html__('Default', 'agron'),
                                'text-custom'   => esc_html__('Custom', 'agron'), 
                            ],
                            'default' => 'text-default',
                        ),
                        array(
                            'name' => 'text',
                            'type' => 'wysiwyg',
                            'default' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'agron' ),
                            'description' => 'Highlight text width shortcode: [highlight text="..."]',
                        ),
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__( 'Alignment', 'agron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'agron' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'agron' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'agron' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'agron' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-editor' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
                            'type' => 'slider',
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
                    'name' => 'tab_text_style',
                    'label' => esc_html__( 'Text', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
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
                                            'label' => esc_html__( 'Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-text-editor' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'text_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-text-editor',
                                        ),
                                        array(
                                            'name' => 'text_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-editor',
                                        ),
                                        array(
                                            'name' => 'text_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-editor',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'text_highlight',
                                    'label' => esc_html__('Highlight', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'text_highlight_color',
                                            'label' => esc_html__( 'Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-text-editor .pxl-text-highlight' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'text_highlight_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-editor .pxl-text-highlight',
                                        ),
                                        array(
                                            'name' => 'text_highlgiht_shadow',
                                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-editor',
                                        ),
                                        array(
                                            'name' => 'text_highlight_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-editor .pxl-text-highlight',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_link_style',
                    'label' => esc_html__( 'Link', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'link_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'selector' => '{{WRAPPER}} .pxl-text-editor a',
                            'control_type' => 'group',
                        ),
                        array(
                            'name' => 'link_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-editor a',
                        ),
                        array(
                            'name' => 'link_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'link_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'link_color',
                                            'label' => esc_html__( 'Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-text-editor a' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-editor a',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'link_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'link_hover_style',
                                            'label' => esc_html__( 'Style', 'agron' ),
                                            'type' => 'select',
                                            'options' => [
                                                'hover-default' => 'Default',
                                                'hover-underline-slide' => 'Underline Slide'
                                            ],
                                            'default' => 'hover-default',
                                        ),
                                        array(
                                            'name' => 'link_hover_color',
                                            'label' => esc_html__( 'Color Hover', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-text-editor a:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-text-editor a:hover',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'pxl_moution_effects',
                    'label' => esc_html__('Motion Effects', 'agron' ),
                    'tab' => 'style',
                    'controls' => array_merge(
                        agron_get_animation_options([
                            'selectors' => '{{WRAPPER}} .pxl-text-editor',
                            'type' => 'text',
                        ]),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);