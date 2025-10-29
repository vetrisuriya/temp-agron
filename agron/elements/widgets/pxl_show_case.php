<?php
// Register Logo Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_show_case',
        'title' => esc_html__('Case Show Case', 'agron' ),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_show_case_content',
                    'label' => esc_html__('Show Case', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'layout_style',
                            'label' => esc_html__('Layout Style', 'agron' ),
                            'type' => 'select',
                            'default' => 'default',
                            'options' => array(
                                'default' => esc_html__('Default', 'agron' ),
                                'style-1' => esc_html__('Style 1', 'agron' ),
                            ),
                        ),
                        array(
                            'name' => 'coming_soon',
                            'label' => esc_html__('Cooming Soon', 'agron' ),
                            'type' => 'switcher',
                            'default' => '',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'agron' ),
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Upload', 'agron' ),
                            'type' => 'media',
                        ),
                        array(
                            'name' => 'buttons',
                            'label' => esc_html__('Buttons', 'agron' ),
                            'type' => 'repeater',
                            'title_field' => '{{{ button_text }}}',
                            'controls' => array(
                                array(
                                    'name' => 'button_text',
                                    'label' => esc_html__('Button Text', 'agron' ),
                                    'type' => 'text',
                                    'default' => esc_html__('Preview', 'agron' ),
                                ),
                                array(
                                    'name' => 'button_link',
                                    'label' => esc_html__('Link', 'agron' ),
                                    'type' => 'url',
                                    'placeholder' => esc_html__('https://example.com', 'agron' ),
                                ),
                            ),
                        )
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
                                            'selector' => '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner, 
                                            {{WRAPPER}} .pxl-show-case.show-case-default',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner, 
                                            {{WRAPPER}} .pxl-show-case.show-case-default',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner, 
                                            {{WRAPPER}} .pxl-show-case.show-case-default',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner, 
                                                {{WRAPPER}} .pxl-show-case.show-case-default' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner, 
                                                {{WRAPPER}} .pxl-show-case.show-case-default' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name' => 'box_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner:hover, 
                                            {{WRAPPER}} .pxl-show-case.show-case-default:hover',
                                        ),
                                        array(
                                            'name'      => '_box_hover_border_color',
                                            'label'     => esc_html__('Border Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner:hover, 
                                                {{WRAPPER}} .pxl-show-case.show-case-default:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner:hover, 
                                            {{WRAPPER}} .pxl-show-case.show-case-default:hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner:hover, 
                                            {{WRAPPER}} .pxl-show-case.show-case-default:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner:hover, 
                                                {{WRAPPER}} .pxl-show-case.show-case-default:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner:hover, 
                                                {{WRAPPER}} .pxl-show-case.show-case-default:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
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
                            'name' => 'image_min_height',
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
                                '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner .pxl-show-case-image img,
                                {{WRAPPER}} .pxl-show-case.show-case-default .pxl-show-case-image' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_height',
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
                                '{{WRAPPER}} .pxl-show-case.show-case-style-1 .pxl-show-case-inner .pxl-show-case-image img,
                                {{WRAPPER}} .pxl-show-case.show-case-default .pxl-show-case-image' => 'height: {{SIZE}}{{UNIT}};',
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
                                            'name'     => 'image_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-show-case .pxl-show-case-inner .pxl-show-case-image',
                                        ),
                                        array(
                                            'name' => 'image_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-show-case .pxl-show-case-inner .pxl-show-case-image',
                                        ),
                                        array(
                                            'name'         => 'image_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-show-case .pxl-show-case-inner .pxl-show-case-image',
                                        ),
                                        array(
                                            'name' => 'image_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-show-case .pxl-show-case-inner .pxl-show-case-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name'     => 'image_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-show-case .pxl-show-case-inner:hover .pxl-show-case-image',
                                        ),
                                        array(
                                            'name' => 'image_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-show-case .pxl-show-case-inner:hover .pxl-show-case-image',
                                        ),
                                        array(
                                            'name'         => 'image_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-show-case .pxl-show-case-inner:hover .pxl-show-case-image',
                                        ),
                                        array(
                                            'name' => 'image_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-show-case .pxl-show-case-inner:hover .pxl-show-case-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'pxl_motion_effetcs',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'tab' => 'style',
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-show-case'
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path(),
);