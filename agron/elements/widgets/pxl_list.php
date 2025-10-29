<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list',
        'title' => esc_html__('Case List', 'agron' ),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_list_content',
                    'label' => esc_html__('List', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(   
                        array(
                            'name' => '_icon',
                            'label' => esc_html__('Icon', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/05/check.svg'), 
                                    'id' => 357, 
                                ],
                                'library' => 'svg',
                            ],
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'agron' ),
                                    'type' => 'text',
                                    'label_block' => true,
                                ),
                            ),
                            'default' => [
                                [
                                    'text' => esc_html__( 'Lorem ipsum dolor sit' ,'agron')
                                ],
                                [
                                    'text' => esc_html__( 'Lorem ipsum dolor sit' ,'agron')
                                ],
                                [
                                    'text' => esc_html__( 'Lorem ipsum dolor sit' ,'agron')
                                ],
                                
                            ],
                            'title_field' => '{{{text}}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_list_style',
                    'label' => esc_html__('List', 'agron' ),
                    'tab' => 'style',
                    'controls' => array( 
                        array(
                            'name' => 'flex_direction',
                            'label' => esc_html__('Direction', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => array(
                                'row' => [
                                    'title' => esc_html__('Row', 'agron' ),
                                    'icon' => 'eicon-arrow-right',
                                ],
                                'column' => [
                                    'title' => esc_html__('Column', 'agron' ),
                                    'icon' => 'eicon-arrow-down',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list-wrapper' => 'flex-direction: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'flex_wrap',
                            'label' => esc_html__('Wrap', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => array(
                                'wrap' => [
                                    'title' => esc_html__('Wrap', 'agron' ),
                                    'icon' => 'eicon-wrap',
                                ],
                                'nowrap' => [
                                    'title' => esc_html__('Nowrap', 'agron' ),
                                    'icon' => 'eicon-nowrap',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list-wrapper' => 'flex-wrap: {{VALUE}};'
                            ],
                            'condition' => [
                                'flex_direction' => 'row',
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
                                '{{WRAPPER}} .pxl-list-wrapper' => 'justify-content: {{VALUE}};'
                            ],
                            'condition' => [
                                'flex_direction' => 'row',
                            ],
                        ),
                        array(
                            'name' => 'item_align_items',
                            'label' => esc_html__('Item Vertical Align', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => array(
                                'start' =>[
                                    'title' => esc_html__('Start', 'agron'),
                                    'icon' => 'eicon-align-start-v',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'agron'),
                                    'icon' => 'eicon-align-center-v'
                                ],
                                'end' => [
                                    'title' => esc_html__('End', 'agron'),
                                    'icon' => 'eicon-align-end-v',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item' => 'align-items: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Spacing', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_spacing',
                            'label' => esc_html__('Icon Spacing', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'list_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'text_normal',
                                    'label' => esc_html__('Text', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'text_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'icon_normal',
                                    'label' => esc_html__('Icon', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'icon_color',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item .pxl-item-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_box_size',
                                            'label' => esc_html__('Box Size', 'agron'),
                                            'type' => 'slider',
                                            'control_type' => 'responsive' ,
                                            'size_units' => ['px', 'custom'],
                                            'px' => [
                                                'min' => 0,
                                                'max' => 2000
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item .pxl-item-icon' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                                            ],
                                        ), 
                                        array(
                                            'name' => 'icon_size',
                                            'label' => esc_html__('Icon Size', 'agron'),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => ['px', 'custom'],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1000,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item svg' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item .pxl-item-icon' => 'font-size: {{SIZE}}{{UNIT}};'
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item .pxl-item-icon',
                                        ),
                                        array(
                                            'name' => 'icon_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item .pxl-item-icon',
                                        ),
                                        array(
                                            'name'         => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item .pxl-item-icon',
                                        ),
                                        array(
                                            'name' => 'icon_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item .pxl-item-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item .pxl-item-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        'selectors' => '{{WRAPPER}} .pxl-list-wrapper .pxl-list-item'
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);