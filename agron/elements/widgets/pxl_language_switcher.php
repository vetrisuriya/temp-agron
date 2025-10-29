<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_language_switcher',
        'title' => esc_html__('Case Language Switcher', 'agron' ),
        'icon' => 'eicon-import-export',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_language_switcher_content',
                    'label' => esc_html__('Items', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron'),
                            'type' => 'repeater',
                            'controls' => [
                                array(
                                    'name' => 'flag_img',
                                    'label' => esc_html__('Flag', 'agron' ),
                                    'type' => 'media',
                                ),
                                array(
                                    'name' => 'language',
                                    'label' => esc_html__('Language', 'agron'),
                                    'type'  => 'text',
                                ),
                                array(
                                    'name' => 'code',
                                    'label' => esc_html__('Code', 'agron'),
                                    'type'  => 'text',
                                ),
                            ],
                            'default' => [
                                [
                                    'language' => esc_html__('Vietnam', 'agron'),
                                    'code'     => esc_html__('VN', 'agron'),
                                ],
                                [
                                    'language' => esc_html__('English', 'agron'),
                                    'code'     => esc_html__('ENG', 'agron'),
                                ],
                                [
                                    'language' => esc_html__('China', 'agron'),
                                    'code'     => esc_html__('CHI', 'agron'),
                                ]
                            ],
                            'title_field' => '{{{language}}}',
                        ),
                        array(
                            'name' => 'item_active',
                            'type' => 'number',
                            'label' => esc_html__('Active', 'agron'),
                            'default' => 1,
                            'separator' => 'before'
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'selected_heading',
                            'label' => esc_html__('Selected', 'agron'),
                            'type' => 'heading',
                        ),
                        array(
                            'name' => 'selected_height',
                            'label' => esc_html__('Height', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-selector' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'selected_min_width',
                            'label' => esc_html__('Min Width', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'selected_control_gap',
                            'label' => esc_html__('Flag Spacing', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'separator' => 'before',
                            'range' => [
                                'px' => [
                                    'min' => 0, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-control' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'selected_gap',
                            'label' => esc_html__('Icon Spacing', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-selector' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'options_heading',
                            'label' => esc_html__('Options', 'agron'),
                            'type' => 'heading',
                            'separator' => 'before'
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Spacing', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0, 
                                    'max' => 1000
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option + .option' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_selected_style',
                    'label' => esc_html__('Selected', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name'  => 'selected_code_style_heading',
                            'label' => esc_html__('Code', 'agron'),
                            'type'  => 'heading',
                        ),
                        array(
                            'name' => 'selected_code_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-control .pxl-language-code' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'selected_code_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-control .pxl-language-code',
                        ),
                        array(
                            'name'  => 'selected_image_style_heading',
                            'label' => esc_html__('Image', 'agron'),
                            'type'  => 'heading',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'toggle_selected_image_size',
                            'label' => esc_html__( 'Image Size', 'agron' ),
                            'type' => 'popover_toggle',
                            'default' => '',
                        ),
                        array(
                            'name' => 'selected_image_size_start_popover',
                            'type' => 'pxl_start_popover',
                        ),
                        array(
                            'name' => 'selected_image_width',
                            'label' => esc_html__('Width', 'agron'),
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
                                "{{WRAPPER}} .pxl-language-switcher .pxl-language-control .pxl-flag-image" => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'selected_image_height',
                            'label' => esc_html__('Height', 'agron'),
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
                                "{{WRAPPER}} .pxl-language-switcher .pxl-language-control .pxl-flag-image" => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'selected_image_size_start_popover',
                            'type' => 'pxl_end_popover',
                        ),
                        array(
                            'name' => 'selected_image_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-control .pxl-flag-image',
                        ),
                        array(
                            'name'         => 'selected_image_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-language-switcher .pxl-language-control .pxl-flag-image',
                        ),
                        array(
                            'name' => 'selected_image_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-control .pxl-flag-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'selected_icon_style_heading',
                            'label' => esc_html__('Icon', 'agron'),
                            'type'  => 'heading',
                            'separator' => 'before'
                        ),
                        array(
                            'name' => 'selected_icon_color',
                            'label' => esc_html__('Icon Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .dropdown-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'selected_icon_size',
                            'label' => esc_html__('Icon Size', 'agron'),
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
                                "{{WRAPPER}} .pxl-language-switcher .dropdown-icon" => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_options_style',
                    'label' => esc_html__('Options', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'box_options_style_heading',
                            'label' => esc_html__('Box', 'agron'),
                            'type' => 'heading',
                        ),
                        array(
                            'name' => 'box_options_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic' ],
                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options',
                        ),
                        array(
                            'name' => 'box_options_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options',
                        ),
                        array(
                            'name'         => 'box_options_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options',
                        ),
                        array(
                            'name' => 'box_options_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_options_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'selector_image_style_heading',
                            'label' => esc_html__('Image', 'agron'),
                            'type'  => 'heading',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'toggle_selector_image_size',
                            'label' => esc_html__( 'Image Size', 'agron' ),
                            'type' => 'popover_toggle',
                            'default' => '',
                        ),
                        array(
                            'name' => 'selector_image_size_start_popover',
                            'type' => 'pxl_start_popover',
                        ),
                        array(
                            'name' => 'selector_image_width',
                            'label' => esc_html__('Width', 'agron'),
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
                                "{{WRAPPER}} .pxl-language-switcher .pxl-language-options .pxl-flag-image" => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'selector_image_height',
                            'label' => esc_html__('Height', 'agron'),
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
                                "{{WRAPPER}} .pxl-language-switcher .pxl-language-options .pxl-flag-image" => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'selector_image_size_start_popover',
                            'type' => 'pxl_end_popover',
                        ),
                        array(
                            'name' => 'selector_image_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .pxl-flag-image',
                        ),
                        array(
                            'name'         => 'selector_image_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .pxl-flag-image',
                        ),
                        array(
                            'name' => 'selector_image_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .pxl-flag-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'selector_style_heading',
                            'label' => esc_html__('Selector', 'agron'),
                            'type' => 'heading',
                        ),
                        array(
                            'name' => 'selector_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'selector_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'selector_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'selector_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option',
                                        ),
                                        array(
                                            'name' => 'selector_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option',
                                        ),
                                        array(
                                            'name'         => 'selector_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option',
                                        ),
                                        array(
                                            'name' => 'selector_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => ['px', '%' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'selector_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => ['px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'selector_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'selector_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'selector_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option:hover',
                                        ),
                                        array(
                                            'name' => 'selector_transition',
                                            'label' => esc_html__('Transition(s)', 'agron'),
                                            'type'  => 'slider',
                                            'control_type' => 'responsive' ,
                                            'size_units' => ['s'],
                                            'range' => [
                                                's' => [
                                                    'min' => 0, 
                                                    'max' => 20
                                                ],
                                            ],                                            
                                            'default' => [
                                                'unit' => 's'
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'selector_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option:hover',
                                        ),
                                        array(
                                            'name'         => 'selector_hover_box_shadow',
                                            'label' => esc_html__('Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option:hover',
                                        ),
                                        array(
                                            'name' => 'selector_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'selector_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-language-switcher .pxl-language-options .option:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
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