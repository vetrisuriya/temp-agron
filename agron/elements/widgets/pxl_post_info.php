<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_info',
        'title' => esc_html__('Case Post Info', 'agron' ),
        'icon' => 'eicon-post-info',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(         
                array(
                    'name' => 'tab_post_info_content',
                    'label' => esc_html__('Post Info', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name'    => 'info_type',
                            'label'   => esc_html__('Info Type', 'agron'),
                            'type'    => 'select',
                            'options' => array(
                                'category' => esc_html__('Category', 'agron'),
                                'tags'     => esc_html__('Tags', 'agron'),
                                'date'     => esc_html__('Date', 'agron'),
                                'author'   => esc_html__('Author', 'agron'),
                                'custom'   => esc_html__('Custom', 'agron'),
                            ),
                            'default' => 'custom',
                        ),
                        array(
                            'name' => 'label_type',
                            'label' => esc_html__('Label Type', 'agron'),
                            'type' => 'select',
                            'options' => array(
                                'text' => esc_html__('Text', 'agron'),
                                'icon' => esc_html__('Icon', 'agron'),
                            ),
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'date_format',
                            'label' => esc_html__('Date Format', 'agron'),
                            'type' => 'text',
                            'default' => 'd F, Y',
                            'condition' => array(
                                'info_type' => 'date',
                            ),
                        ),
                        array(
                            'name' => '_icon',
                            'label' => esc_html__('Info Icon', 'agron'),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-star',
                                'library' => 'Font Awesome 5 Free',
                            ],
                            'condition' => [
                                'label_type' => 'icon',
                            ],
                        ),
                        array(
                            'name'      => 'label_text',
                            'label'     => esc_html__('Label Text', 'agron'),
                            'type'      => 'text',
                            'label_block'  => true,
                            'default' => esc_html__('Label here', 'agron'),
                            'condition' => [
                                'label_type' => 'text',
                            ],
                        ),
                        array(
                            'name'      => 'info_custom',
                            'label'     => esc_html__('Info Custom', 'agron'),
                            'type'      => 'text',
                            'label_block'  => true,
                            'default' => esc_html__('Info post here!', 'agron'),
                            'condition' => [
                                'info_type' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'info_link',
                            'label' => esc_html__('Link URL', 'agron' ),
                            'type' => 'url',
                            'condition' => [
                                'info_type' => 'custom',
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
                                'space-between' => [
                                    'title' => esc_html__('Space Between', 'agron' ),
                                    'icon' => 'eicon-justify-space-between-h',
                                ],
                                'space-around' => [
                                    'title' => esc_html__('Space Around', 'agron' ),
                                    'icon' => 'eicon-justify-space-around-h',
                                ],
                                'space-evenly' => [
                                    'title' => esc_html__('Space Evenly', 'agron' ),
                                    'icon' => 'eicon-justify-space-evenly-h',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-info' => 'justify-content: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'align_items_row',
                            'label' => esc_html__('Align Items', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => array(
                                'start' => [
                                    'title' => esc_html__('Start', 'agron' ),
                                    'icon' => 'eicon-align-start-v',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'agron' ),
                                    'icon' => 'eicon-align-center-v',
                                ],
                                'end' => [
                                    'title' => esc_html__('End', 'agron' ),
                                    'icon' => 'eicon-align-end-v',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-info' => 'align-items: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-info' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
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
                                            'name' => 'box_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post-info',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post-info',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-info',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name' => 'box_hover_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post-info:hover',
                                        ),
                                        array(
                                            'name'      => '_box_hover_border_color',
                                            'label'     => esc_html__('Border Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info:hover' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post-info:hover',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-info:hover',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label' => esc_html__('Icon', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'box_size',
                            'label' => esc_html__('Box Size', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'px' => [
                                'min' => 0,
                                'max' => 2000
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-info .pxl-info-icon' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ), 
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive' ,
                            'size_units' => ['px', 'custom'],
                            'px' => [
                                'min' => 0,
                                'max' => 2000
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-info .pxl-info-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-post-info .pxl-info-icon ' => 'font-size: {{SIZE}}{{UNIT}};',
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
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info .pxl-info-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post-info .pxl-info-icon',
                                        ),
                                        array(
                                            'name' => 'icon_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post-info .pxl-info-icon',
                                        ),
                                        array(
                                            'name'         => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-info .pxl-info-icon',
                                        ),
                                        array(
                                            'name' => 'icon_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info .pxl-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info .pxl-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'icon_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'icon_hover_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info:hover .pxl-info-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post-info:hover .pxl-info-icon',
                                        ),
                                        array(
                                            'name' => 'icon_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post-info:hover .pxl-info-icon',
                                        ),
                                        array(
                                            'name'         => 'icon_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-info:hover .pxl-info-icon',
                                        ),
                                        array(
                                            'name' => 'icon_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info:hover .pxl-info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info:hover .pxl-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
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
                            'selector' => '{{WRAPPER}} .pxl-post-info .pxl-info-content',
                        ),
                        array(
                            'name' => 'text_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-info .pxl-info-content',
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
                                                '{{WRAPPER}} .pxl-post-info .pxl-info-content' => 'color: {{VALUE}};',
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
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-info:hover .pxl-info-content' => 'color: {{VALUE}};',
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