<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_search_form',
        'title' => esc_html__('Case Search Form', 'agron' ),
        'icon' => 'eicon-cart-light',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'form_max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
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
                                '{{WRAPPER}}' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'search_icon',
                            'label' => esc_html__('Search Icon', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/05/arrow-up-right.svg'), 
                                    'id' => 61, 
                                ],
                                'library' => 'svg',
                            ],
                            'condition' => [
                                'popup_form!' => '',
                            ],
                        ),
                        array(
                            'name' => 'search_form_popup',
                            'label' => esc_html__('Popup', 'agron' ),
                            'type' => 'switcher',
                            'default' => ''
                        ),
                        array(
                            'name' => 'form_css_hidden',
                            'type' => 'hidden',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-sea'
                            ]
                        )
                    ),
                ),
                // array(
                //     'name' => 'tab_form_responsive',
                //     'label' => esc_html__('Responsive', 'agron' ),
                //     'tab' => 'style',
                //     'controls' => array( 
                //         arr
                //     )
                // ),
                array(
                    'name' => 'tab_field_style',
                    'label' => esc_html__('Field', 'agron' ),
                    'tab' => 'style',
                    'controls' => array( 
                        array(
                            'name' => 'field_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-search-form .search-field',
                        ),
                        array(
                            'name' => 'field_text_shadow',
                            'label' => esc_html__('Text Shadow', 'agron' ),
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-search-form .search-field',
                        ),
                        array(
                            'name' => 'field_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'field_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'field_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-field' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'field_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-search-form .search-field',
                                        ),
                                        array(
                                            'name' => 'field_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-search-form .search-field',
                                        ),
                                        array(
                                            'name'         => 'field_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-search-form .search-field',
                                        ),
                                        array(
                                            'name' => 'field_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'field_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-field' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'field_hover_focus',
                                    'label' => esc_html__('Hover/Focus', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'field_hover_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-field:hover, {{WRAPPER}} .pxl-search-form .search-field:focus' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'field_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-search-form .search-field:hover, {{WRAPPER}} .pxl-search-form .search-field:focus',
                                        ),
                                        array(
                                            'name' => 'field_transition',
                                            'label' => esc_html__('Transition(s)', 'agron'),
                                            'type'  => 'slider',
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
                                                '{{WRAPPER}} .pxl-search-form .search-submit' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'field_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-search-form .search-field:hover, {{WRAPPER}} .pxl-search-form .search-field:focus',
                                        ),
                                        array(
                                            'name'         => 'field_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-search-form .search-field:hover, {{WRAPPER}} .pxl-search-form .search-field:focus',
                                        ),
                                        array(
                                            'name' => 'field_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-field:hover, {{WRAPPER}} .pxl-search-form .search-field:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'field_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-field:hover, {{WRAPPER}} .pxl-search-form .search-field:focus' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),  
                    ),
                ),
                array(
                    'name' => 'tab_submit_style',
                    'label' => esc_html__('Submit', 'agron' ),
                    'tab' => 'style',
                    'controls' => array( 
                        array(
                            'name' => 'submit_box_size',
                            'label' => esc_html__('Box Size', 'agron'),
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
                                '{{WRAPPER}} .pxl-search-form .search-submit' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'submit_icon_size',
                            'label' => esc_html__('Icon Size', 'agron' ),
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
                                '{{WRAPPER}} .pxl-search-form .search-submit svg' => 'height: {{SIZE}}{{UNIT}}; width: auto',
                                '{{WRAPPER}} .pxl-search-form .search-submit'     => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'submit_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'submit_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'submit_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-submit' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'submit_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-search-form .search-submit',
                                        ),
                                        array(
                                            'name' => 'submit_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-search-form .search-submit',
                                        ),
                                        array(
                                            'name'         => 'submit_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-search-form .search-submit',
                                        ),
                                        array(
                                            'name' => 'submit_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'submit_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'submit_hover_focus',
                                    'label' => esc_html__('Hover/Focus', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'submit_hover_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-submit:hover, {{WRAPPER}} .pxl-search-form .search-submit:focus' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'submit_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-search-form .search-submit:hover, {{WRAPPER}} .pxl-search-form .search-submit:focus',
                                        ),
                                        array(
                                            'name' => 'submit_transition',
                                            'label' => esc_html__('Transition(s)', 'agron'),
                                            'type'  => 'slider',
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
                                                '{{WRAPPER}} .pxl-search-form .search-submit' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'submit_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-search-form .search-submit:hover, {{WRAPPER}} .pxl-search-form .search-submit:focus',
                                        ),
                                        array(
                                            'name'         => 'submit_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-search-form .search-submit:hover, {{WRAPPER}} .pxl-search-form .search-submit:focus',
                                        ),
                                        array(
                                            'name' => 'submit_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-submit:hover, {{WRAPPER}} .pxl-search-form .search-submit:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'submit_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-search-form .search-submit:hover, {{WRAPPER}} .pxl-search-form .search-submit:focus' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),  
                    ),
                ),
                array(
                    'name' => 'tab_btn_style',
                    'label' => esc_html__('Button', 'agron' ),
                    'tab' => 'style',
                    'controls' => array( 
                        array(
                            'name' => 'btn_box_size',
                            'label' => esc_html__('Box Size', 'agron'),
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
                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_width',
                            'label' => esc_html__('Width', 'agron'),
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
                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_height',
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
                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon_size',
                            'label' => esc_html__('Icon Size', 'agron' ),
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
                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup svg' => 'height: {{SIZE}}{{UNIT}}; width: auto',
                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup'     => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'btn_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'btn_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .search-form-wrap .pxl-button-popup',
                                        ),
                                        array(
                                            'name' => 'btn_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .search-form-wrap .pxl-button-popup',
                                        ),
                                        array(
                                            'name'         => 'btn_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .search-form-wrap .pxl-button-popup',
                                        ),
                                        array(
                                            'name' => 'btn_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'btn_hover_focus',
                                    'label' => esc_html__('Hover/Focus', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'btn_hover_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup:hover, {{WRAPPER}} .search-form-wrap .pxl-button-popup:focus' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .search-form-wrap .pxl-button-popup:hover, {{WRAPPER}} .search-form-wrap .pxl-button-popup:focus',
                                        ),
                                        array(
                                            'name' => 'btn_transition',
                                            'label' => esc_html__('Transition(s)', 'agron'),
                                            'type'  => 'slider',
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
                                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'btn_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .search-form-wrap .pxl-button-popup:hover, {{WRAPPER}} .search-form-wrap .pxl-button-popup:focus',
                                        ),
                                        array(
                                            'name'         => 'btn_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .search-form-wrap .pxl-button-popup:hover, {{WRAPPER}} .search-form-wrap .pxl-button-popup:focus',
                                        ),
                                        array(
                                            'name' => 'btn_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup:hover, {{WRAPPER}} .search-form-wrap .pxl-button-popup:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .search-form-wrap .pxl-button-popup:hover, {{WRAPPER}} .pxl-search-form .pxl-button-popup:focus' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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