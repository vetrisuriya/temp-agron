<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_links',
        'title' => esc_html__('Case Links', 'agron' ),
        'icon' => 'eicon-link',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_link_content',
                    'label' => esc_html__('Links', 'agron' ),
                    'tab' => 'content',
                    'controls' => array( 
                        array(
                            'name' => 'use_common_icon',
                            'label' => esc_html__('Use Common Icon', 'agron' ),
                            'type' => 'switcher',
                            'default' => '',
                        ), 
                        array(
                            'name' => 'common_icon',
                            'label' => esc_html__('Common Icon', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'use_common_icon!' => '',
                            ],
                        ),
                        array(
                            'name' => 'links',
                            'label' => esc_html__('Links', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'link_icon',
                                    'label' => esc_html__('Own Icon', 'agron' ),
                                    'type' => 'icons',
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'link_text',
                                    'label' => esc_html__('Text', 'agron' ),
                                    'type' => 'text',
                                    'label_block' => true,
                                    'default' => esc_html__('Enter link here', 'agron'),
                                ),
                                array( 
                                    'name' => 'link_url',
                                    'label' => esc_html__('Link URL', 'agron' ),
                                    'type' => 'url',
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                                array(
                                    'name' => 'item_icon_size',
                                    'label' => esc_html__('Icon Size', 'agron' ),
                                    'type' => 'slider',
                                    'separator' => 'before',
                                    'size_units' => ['px', 'custom'],
                                    'control_type' => 'responsive',
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 1000,
                                        ],
                                    ],
                                    'condition' => [
                                        'use_common_icon' => '',
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item{{CURRENT_ITEM}} svg' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                                        '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item{{CURRENT_ITEM}} i' => 'font-size: {{SIZE}}{{UNIT}}'
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ link_text }}}',
                            'default' => [
                                [
                                    'link_text' =>  esc_html__('Link 1', 'agron'),
                                    'link_url' => [
                                        'url' => '#',
                                    ],
                                ],
                                [
                                    'link_text' =>  esc_html__('Link 2', 'agron'),
                                    'link_url' => [
                                        'url' => '#',
                                    ],
                                ],
                                [
                                    'link_text' =>  esc_html__('Link 3', 'agron'),
                                    'link_url' => [
                                        'url' => '#',
                                    ],
                                ],
                            ],

                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'agron' ),
                            'type' => 'slider',
                            'separator' => 'before',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'condition' => [
                                'use_common_icon!' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item svg' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item i' => 'font-size: {{SIZE}}{{UNIT}}'
                            ],
                        ),
                        array(
                            'name' => 'icon_spacing',
                            'label' => esc_html__('Icon Spacing', 'agron' ),
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
                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Spacing', 'agron' ),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item + .pxl-link-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_link_style',
                    'label' => esc_html__('Link', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'link_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link',
                        ),
                        array(
                            'name' => 'link_text_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link',
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
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_icon_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item i,
                                                {{WRAPPER}} .pxl-links-wrapper .pxl-link-item svg' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link',
                                        ),
                                        array(
                                            'name' => 'link_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link',
                                        ),
                                        array(
                                            'name'         => 'link_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link',
                                        ),
                                        array(
                                            'name' => 'link_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'link_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'link_hover_style',
                                            'label' => esc_html__('Hover Style', 'agron' ),
                                            'type' => 'select',
                                            'groups' => [
                                                [
                                                    'label' => esc_html__('Default', 'agron'),
                                                    'options' => [
                                                        '' => esc_html__('Default', 'agron'),
                                                    ],
                                                ],
                                                [
                                                    'label' => esc_html__('Underline', 'agron'),
                                                    'options' => [
                                                        'hover-text-underline' => esc_html__('Underline', 'agron'),
                                                        'hover-text-underline--slide-ltr' => esc_html__('Slide LTR', 'agron'),
                                                        'hover-text-underline--slide-rtl' => esc_html__('Slide RTL', 'agron'),
                                                        'hover-underline-expand' => esc_html__('Expand', 'agron'),
                                                        'hover-underline-split' =>  esc_html__('Split', 'agron'),
                                                    ],
                                                ],
                                            ],
                                            'default' => '',
                                        ),
                                        array(
                                            'name' => 'link_underline_weight',
                                            'label' => esc_html__('Underline Weight(px)', 'agron'),
                                            'type' => 'slider',
                                            'size_units' => ['px'],
                                            'default' => [
                                                'size' => 1,
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link' => "--pxl-height: {{SIZE}}{{UNIT}};",
                                            ],
                                            'condition' => [
                                                'link_hover_style' => ['hover-text-underline', 'hover-text-underline--slide-ltr', 'hover-text-underline--slide-rtl'],
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_hover_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    array(
                                            'name' => 'link_hover_icon_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link:hover  i,
                                                {{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link:hover svg' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link:hover',
                                        ),
                                        array(
                                            'name' => 'link_transition',
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
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'link_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link:hover',
                                        ),
                                        array(
                                            'name'         => 'link_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link:hover',
                                        ),
                                        array(
                                            'name' => 'link_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'link_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-links-wrapper .pxl-link-item .pxl-link:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    agron_get_class_widget_path(),
);