<?php

pxl_add_custom_widget(
    array(
        'name' => 'pxl_navigation_menu',
        'title' => esc_html__('Case Navigation Menu', 'agron'),
        'icon' => 'eicon-nav-menu',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_nav_menu_layout',
                    'label' => esc_html__('Navigation Menu', 'agron'),
                    'tab' => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'menu',
                            'label' => esc_html__('Menu', 'agron'),
                            'type' => 'select',
                            'options' => agron_get_menu_options(),
                        ),
                        array(
                            'name' => 'justify_content_row',
                            'label' => esc_html__('Justify Content', 'agron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'options' => [
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
                                'space-around' => [
                                    'title' => esc_html__('Space Around', 'agron' ),
                                    'icon' => 'eicon-justify-space-around-h',
                                ],
                                'space-evenly' => [
                                    'title' => esc_html__('Space Evenly', 'agron' ),
                                    'icon' => 'eicon-justify-space-evenly-h',
                                ],
                                'space-between' => [
                                    'title' => esc_html__('Space Between', 'agron' ),
                                    'icon' => 'eicon-justify-space-between-h',
                                ],
                            ],
                            'label_block' => true,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-menu' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'menu_spacing',
                            'label' => esc_html__('Spacing', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-menu' => '--pxl-spacing-inline: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'menu_h',
                            'label' => esc_html__('Menu Height', 'agron'),
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
                                '{{WRAPPER}} .pxl-navigation-menu > li' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_menu_style',
                    'label' => esc_html__('Menu', 'agron'),
                    'tab' => 'style',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'         => 'menu_typography',
                                'type'         => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-navigation-menu > li > a',
                            ),
                            array(
                                'name'         => 'menu_shadow',
                                'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-navigation-menu > li > a',
                            ),
                            array(
                                'name' => 'menu_stroke',
                                'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-navigation-menu > li > a',
                            ),
                            array(
                                'name' => 'menu_controls',
                                'control_type' => 'tab',
                                'tabs' => [
                                    [
                                        'name' => 'menu_normal',
                                        'label' => esc_html__('Normal', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [  
                                            array(
                                                'name'      => 'menu_color',
                                                'label'     => esc_html__('Text Color', 'agron' ),
                                                'type'      => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-navigation-menu > li > a' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'menu_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [
                                            array(
                                                'name' => 'menu_hover_style',
                                                'label' => esc_html__('Hover Style', 'agron' ),
                                                'type' => 'select',
                                                'options' => [
                                                    '' => esc_html__('Default', 'agron'),
                                                    'hover-underline-ltr' => esc_html__('Underline LTR', 'agron'),
                                                    'hover-underline-rtl' => esc_html__('Underline LTR', 'agron'),
                                                    'hover-underline-expand' => esc_html__('Underline LTR', 'agron'),
                                                    'hover-underline-split' => esc_html__('Under Split', 'agron'),
                                                ],
                                                'default' => '',
                                            ),
                                            array(
                                                'name' => 'menu_hover_color',
                                                'label' => esc_html__('Text Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-navigation-menu > li:hover > a, 
                                                    {{WRAPPER}} .pxl-navigation-menu > li.current-menu-item > a, 
                                                    {{WRAPPER}} .pxl-navigation-menu > li.current-menu-parent > a, 
                                                    {{WRAPPER}} .pxl-navigation-menu > li.current-menu-ancestor > a, 
                                                    {{WRAPPER}} .pxl-navigation-menu > li.current_page_item > a, 
                                                    {{WRAPPER}} .pxl-navigation-menu > li.current_page_ancestor > a, 
                                                    {{WRAPPER}} .pxl-navigation-menu > li.current_page_parent > a, 
                                                    {{WRAPPER}} .pxl-navigation-menu > li > a.pxl-onepage-active' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                ],
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_submenu_style',
                    'label' => esc_html__('Submenu', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'submenu_box_heading',
                            'label' => esc_html__('Box', 'agron'),
                            'type' => 'heading',
                        ),
                        array(
                            'name' => 'submenu_show_effect',
                            'label' => esc_html__('Show Effect', 'agron' ),
                            'type' => 'select',
                            'options' => [
                                'sub-fade-in-up' => esc_html__('Fade In Up', 'agron'),
                                'sub-flip-down' => esc_html__('Flip Down', 'agron'),
                            ],
                            'default' => 'sub-fade-in-up',
                        ),
                        array(
                            'name' => 'submenu_box_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'separator' => 'before',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-navigation-menu .sub-menu:not(.pxl-mega-menu), {{WRAPPER}} .pxl-navigation-menu .children',
                        ),
                        array(
                            'name' => 'submenu_box_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-navigation-menu .sub-menu, {{WRAPPER}} .pxl-navigation-menu .children',
                        ),
                        array(
                            'name'         => 'submenu_box_box_shadow',
                            'label' => esc_html__('Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-navigation-menu .sub-menu, {{WRAPPER}} .pxl-navigation-menu .children',
                        ),
                        array(
                            'name' => 'submenu_box_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu, {{WRAPPER}} .pxl-navigation-menu .children' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'submenu_box_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu, {{WRAPPER}} .pxl-navigation-menu .children' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'submenu_item_heading',
                            'label' => esc_html__('Item', 'agron'),
                            'type' => 'heading',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'submenu_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a',
                        ),
                        array(
                            'name' => 'submenu_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'submenu_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'submenu_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'submenu_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a',
                                        ),
                                        array(
                                            'name' => 'submenu_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a',
                                        ),
                                        array(
                                            'name'         => 'submenu_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a',
                                        ),
                                        array(
                                            'name' => 'submenu_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => ['px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'submenu_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => ['px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'submenu_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'submenu_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li:hover > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-item > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-parent > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-ancestor > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_item > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_ancestor > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_parent > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a.pxl-onepage-active' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'submenu_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li:hover > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-item > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-parent > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-ancestor > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_item > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_ancestor > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_parent > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a.pxl-onepage-active',
                                        ),
                                        array(
                                            'name' => 'submenu_transition',
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
                                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'submenu_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li:hover > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-item > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-parent > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-ancestor > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_item > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_ancestor > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_parent > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a.pxl-onepage-active',
                                        ),
                                        array(
                                            'name'         => 'submenu_hover_box_shadow',
                                            'label' => esc_html__('Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li:hover > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-item > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-parent > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-ancestor > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_item > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_ancestor > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_parent > a, 
                                            {{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a.pxl-onepage-active',
                                        ),
                                        array(
                                            'name' => 'submenu_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li:hover > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-item > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-parent > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-ancestor > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_item > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_ancestor > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_parent > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a.pxl-onepage-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'submenu_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu > li:hover > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-item > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-parent > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current-menu-ancestor > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_item > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_ancestor > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li.current_page_parent > a, 
                                                {{WRAPPER}} .pxl-navigation-menu .sub-menu > li > a.pxl-onepage-active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_mega_menu',
                    'label' => esc_html__('Mega Menu', 'agron'),
                    'tab' => 'style',
                    'controls' => array( 
                        array(
                            'name' => 'mega_menu_max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu.pxl-mega-menu' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'mega_menu_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu.pxl-mega-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                            ],
                        ),
                        array(
                            'name' => 'mega_menu_margin',
                            'label' => esc_html__('Margin', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-menu .sub-menu.pxl-mega-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);