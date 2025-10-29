<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_box',
        'title' => esc_html__('Case Icon Box', 'agron'),
        'icon' => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
        'scripts' => [
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_icon_box_content',
                    'label' => esc_html__('Icon', 'agron'),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'icon_box_style',
                            'label' => esc_html__('Style', 'agron'),
                            'type' => 'select',
                            'default' => 'icon-box-default',
                            'options' => [
                                'icon-box-default' => esc_html__('Default', 'agron'),
                                'icon-box-style1'  => esc_html__('Style 1', 'agron'),
                                'icon-box-style2'  => esc_html__('Style 2', 'agron'),
                                'icon-box-style3'  => esc_html__('Style 3', 'agron'),
                                'icon-box-style4'  => esc_html__('Style 4', 'agron'),
                                'icon-box-custom'  => esc_html__('Custom', 'agron'),
                            ],
                        ),
                        array(
                            'name' => '_icon',
                            'label' => esc_html__('Icon', 'agron'),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-star',
                                'library' => 'Font Awesome 5 Free',
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'agron'),
                            'type' => 'text',
                            'separator' => 'before',
                            'label_block' => true,
                            'default' => esc_html__('Heading Title', 'agron'),
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('Title HTML Tag', 'agron'),
                            'type' => 'select',
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
                            'default' => 'h6',
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description', 'agron'),
                            'type' => 'textarea',
                            'rows' => 10,
                            'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'agron'),
                        ),
                        array(
                            'name' => 'link_url',
                            'label' => esc_html__('Link URL', 'agron'),
                            'type' => 'url',
                            'separator' => 'before',
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'size_units' => ['px', 'custom'],
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
                    ),
                ),
                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'align_items_row',
                            'label' => esc_html__('Align Items', 'agron'),
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
                                'stretch' => [
                                    'title' => esc_html__('Stretch', 'agron'),
                                    'icon' => 'eicon-align-stretch-v',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-wrapper' => 'align-items: {{VALUE}};'
                            ],
                            'condition' => [
                                'icon_position!' => 'column',
                            ],
                        ),
                        array(
                            'name' => 'align_items_column',
                            'label' => esc_html__('Align Items', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => array(
                                'start' =>[
                                    'title' => esc_html__('Start', 'agron'),
                                    'icon' => 'eicon-align-start-h',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'agron'),
                                    'icon' => 'eicon-align-center-h'
                                ],
                                'end' => [
                                    'title' => esc_html__('End', 'agron'),
                                    'icon' => 'eicon-align-end-h',
                                ],
                                'stretch' => [
                                    'title' => esc_html__('Stretch', 'agron'),
                                    'icon' => 'eicon-align-stretch-h',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-wrapper' => 'align-items: {{VALUE}};'
                            ],
                            'condition' => [
                                'icon_position' => 'column',
                            ],
                        ),
                        array(
                            'name' => 'icon_position',
                            'label' => esc_html__('Icon Position', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'options' => array(
                                'row' =>[
                                    'title' => esc_html__('Left', 'agron'),
                                    'icon' => 'eicon-h-align-left',
                                ],
                                'column' => [
                                    'title' => esc_html__('Top', 'agron'),
                                    'icon' => 'eicon-v-align-top'
                                ],
                                'row-reverse' => [
                                    'title' => esc_html__('Right', 'agron'),
                                    'icon' => 'eicon-h-align-right',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-wrapper' => 'flex-direction: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_sz',
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
                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon svg' => 'height: {{SIZE}}{{UNIT}}; width:auto;',
                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-icon-box-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_alignment',
                            'label' => esc_html__('Content Alignment', 'agron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'separator' => 'before',
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
                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-content' => 'text-align: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'content_spacing',
                            'label' => esc_html__('Content Spacing', 'agron'),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-content' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_position',
                            'label' => esc_html__('Title Position', 'agron'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'options' => array(
                                'column' => [
                                    'title' => esc_html__('Top', 'agron'),
                                    'icon' => 'eicon-v-align-top'
                                ],
                                'column-reverse' => [
                                    'title' => esc_html__('Bottom', 'agron'),
                                    'icon' => 'eicon-v-align-bottom',
                                ],
                            ),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-content' => 'flex-direction: {{VALUE}};'
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_icon_style',
                    'label' => esc_html__('Icon', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'icon_box_size',
                            'label' => esc_html__('Box Size', 'agron'),
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
                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon' => 'min-width: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_bacground',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon',
                                        ),
                                        array(
                                            'name' => 'icon_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon',
                                        ),
                                        array(
                                            'name'         => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon',
                                        ),
                                        array(
                                            'name' => 'icon_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name' => 'icon_hover_animation',
                                            'label' => esc_html__('Hover Animation', 'agron'),
                                            'type' => 'select',
                                            'options' => [
                                                '' => esc_html__('None', 'agron'),
                                                'hover-animation-flipX' => esc_html__('Flip X', 'agron'),
                                                'hover-animation-flipY' => esc_html__('Flip Y', 'agron'),
                                                'hover-animation-rotate-zoom-in' => esc_html__('Rotate Zoom', 'agron'),
                                                'hover-animation-shrink-expand' => esc_html__('Shrink Expand', 'agron'),
                                                'hover-animation-grow-normalize' => esc_html__('Grow Normalize', 'agron')
                                            ],
                                            'default' => '',
                                        ),
                                        array(
                                            'name' => 'icon_color_hover',
                                            'label' => esc_html__('Icon Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-icon-box-wrapper:hover .pxl-icon-box-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'icon_hover_background',
                                            'label' => esc_html__('Background Color', 'agron' ),
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper:hover .pxl-icon-box-icon',
                                        ),
                                        array(
                                            'name' => 'icon_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper:hover .pxl-icon-box-icon',
                                        ),
                                        array(
                                            'name'         => 'icon_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-icon-box-wrapper:hover .pxl-icon-box-icon',
                                        ),
                                        array(
                                            'name' => 'icon_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-icon-box-wrapper:hover .pxl-icon-box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-icon-box-wrapper:hover .pxl-icon-box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label' => esc_html__('Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array( 
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-title',
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
                                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-title' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-title',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'title_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'title_hover_style',
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
                                                        'hover-text-underline--expland' => esc_html__('Expand', 'agron'),
                                                        'hover-text-fill' => esc_html__('Fill', 'agron'),
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
                                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-title' => "--pxl-height: {{SIZE}}{{UNIT}};",
                                            ],
                                            'condition' => [
                                                'title_hover_style' => ['hover-text-underline', 'hover-text-underline--slide-ltr', 'hover-text-underline--slide-rtl', 'hover-text-underline--expland'],
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-title:hover:not(.hover-text-fill)' => 'color: {{VALUE}};',
                                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-title.hover-text-fill' => '--link-color-hover: {{VALUE}};'
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-title:hover',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_description_style',
                    'label' => esc_html__('Description', 'agron' ),
                    'tab' => 'style',
                    'controls' => array( 
                      array(
                            'name' => 'description_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-description',
                        ),
                        array(
                            'name' => 'description_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-description',
                        ),
                        array(
                            'name' => 'description_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'description_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'description_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-description' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'description_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper .pxl-icon-box-description',
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'description_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'description_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-icon-box-wrapper:hover .pxl-icon-box-description' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'description_hover_stroke',
                                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                                            'control_type' => 'group',
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-icon-box-wrapper:hover .pxl-icon-box-description',
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-icon-box-wrapper',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);