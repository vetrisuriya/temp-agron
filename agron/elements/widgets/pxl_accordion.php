<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_accordion',
        'title' => esc_html__('Case Accordion', 'agron' ),
        'icon' => 'eicon-accordion',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'agron-accordion',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_accordion_content',
                    'label' => esc_html__('Accordion', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(   
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'agron' ),
                            'type' => 'number',
                            'min' => 1,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('Title HTML Tag', 'agron'),
                            'type' => 'select',
                            'default' => 'h6',
                            'options' => [
                                'h1' => esc_html__('H1', 'agron'),
                                'h2' => esc_html__('H2', 'agron'),
                                'h3' => esc_html__('H3', 'agron'),
                                'h4' => esc_html__('H4', 'agron'),
                                'h5' => esc_html__('H5', 'agron'),
                                'h6' => esc_html__('H6', 'agron'),
                                'div' => esc_html__('div', 'agron'),
                                'p'  => esc_html__('p', 'agron'),
                                'span' => esc_html__('span', 'agron'),
                            ],
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'agron' ),
                                    'type' => 'textarea',
                                    'label_block' => true, 
                                    'rows' => 2,
                                    'default' => esc_html__('Accordion Title', 'agron'),
                                ),
                                array(
                                    'name' => 'content',
                                    'type' => 'wysiwyg',
                                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus nisl vitae magna pulvinar laoreet nu llam erat ipsum, mattis nec mollis ac, accumsan a enim.', 'agron'),
                                    'description' => 'Highlight text width shortcode: [highlight text="..."]',
                                ),
                            ),
                            'title_field' => '{{{title}}}',
                            'default' => [
                                [
                                    'title' => esc_html__('Accordion Title', 'agron'),
                                    'content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus nisl vitae magna pulvinar laoreet nu llam erat ipsum, mattis nec mollis ac, accumsan a enim.', 'agron'),
                                ],
                                [
                                    'title' => esc_html__('Accordion Title', 'agron'),
                                    'content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus nisl vitae magna pulvinar laoreet nu llam erat ipsum, mattis nec mollis ac, accumsan a enim.', 'agron'),
                                ],
                                [
                                    'title' => esc_html__('Accordion Title', 'agron'),
                                    'content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus nisl vitae magna pulvinar laoreet nu llam erat ipsum, mattis nec mollis ac, accumsan a enim.', 'agron'),
                                ],
                            ],
                        ),

                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Spacing', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', '%', 'custom'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item + .pxl-accordion-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ), 

                        array(
                            'name' => 'content_max_width',
                            'label' => esc_html__('Content Max Width', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-content' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_box_item_style',
                    'label' => esc_html__('Box Item', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(  
                        array(
                            'name' => 'box_item_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'box_item_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'box_item_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item',
                                        ),
                                        array(
                                            'name' => 'box_item_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item',
                                        ),
                                        array(
                                            'name'         => 'box_item_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item',
                                        ),
                                        array(
                                            'name' => 'box_item_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_item_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'box_item_hover_active',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'box_item_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover, 
                                            {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active',
                                        ),
                                        array(
                                            'name' => '_box_item_hover_border_color',
                                            'label' => esc_html__('Border Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover, 
                                                {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_item_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover, 
                                            {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active',
                                        ),
                                        array(
                                            'name'         => 'box_item_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover, 
                                            {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active',
                                        ),
                                        array(
                                            'name' => 'box_item_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover, 
                                                {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_item_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover, 
                                                {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_header_style',
                    'label' => esc_html__('Header', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(  
                        array(
                            'name' => 'header_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'header_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'header_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item .pxl-accordion-header',
                                        ),
                                        array(
                                            'name' => 'header_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item .pxl-accordion-header',
                                        ),
                                        array(
                                            'name'         => 'header_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item .pxl-accordion-header',
                                        ),
                                        array(
                                            'name' => 'header_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item .pxl-accordion-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'header_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item .pxl-accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'header_hover_active',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'header_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover .pxl-accordion-header, 
                                            {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active .pxl-accordion-header',
                                        ),
                                        array(
                                            'name' => '_header_hover_border_color',
                                            'label' => esc_html__('Border Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover .pxl-accordion-header, 
                                                {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active .pxl-accordion-header' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'header_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover .pxl-accordion-header, 
                                            {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active .pxl-accordion-header',
                                        ),
                                        array(
                                            'name'         => 'header_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover .pxl-accordion-header, 
                                            {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active .pxl-accordion-header',
                                        ),
                                        array(
                                            'name' => 'header_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover .pxl-accordion-header, 
                                                {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active .pxl-accordion-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'header_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover .pxl-accordion-header, 
                                                {{WRAPPER}} .pxl-accordion .pxl-accordion-item.active .pxl-accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_title_style',
                    'label' => esc_html__('Accordion Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-header .pxl-accordion-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-header .pxl-accordion-title',
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
                                            'name' => 'title_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-header .pxl-accordion-title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'title_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'title_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item.active .pxl-accordion-title,
                                                {{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover .pxl-accordion-title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_icon_style',
                    'label' => esc_html__('Accordion Icon', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-header .pxl-accordion-icon' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                            ],
                        ),
                        array(
                            'name' => 'icon_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'icon_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'icon_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-header .pxl-accordion-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'icon_hover',
                                    'label' => esc_html__('Hover/Active', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'icon_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-item.active .pxl-accordion-icon,
                                                {{WRAPPER}} .pxl-accordion .pxl-accordion-item:hover .pxl-accordion-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_content_style',
                    'label' => esc_html__('Content', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(  
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-content p' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-content p',
                        ),
                        array(
                            'name' => 'content_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-content p',
                        ),
                        array(
                            'name' => 'content_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'separator' => 'before',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-content p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-accordion .pxl-accordion-item',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);