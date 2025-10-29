<?php
//Register Counter Widget
 pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter_box',
        'title' => esc_html__('Case Counter Box', 'agron'),
        'icon' => 'eicon-facebook-like-box',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'agron-counter',
            // 'agron-effects'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_counter_content',
                    'label' => esc_html__('Counter', 'agron'),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'counter_style',
                            'label' => esc_html__('Layout Style', 'agron'),
                            'type' => 'select',
                            'options' => [
                                'default'  => esc_html__('Default', 'agron'),
                                '1'       => esc_html__('Style 1', 'agron'),
                                '2'       => esc_html__('Style 2', 'agron'),
                                'custom'  => esc_html__('Custom', 'agron'),
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'agron'),
                            'type' => 'number',
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'agron'),
                            'type' => 'number',
                            'default' => 100,
                        ),
                        array(
                            'name' => 'number_prefix',
                            'label' => esc_html__('Number Prefix', 'agron'),
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'number_suffix',
                            'label' => esc_html__('Number Suffix', 'agron'),
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'number_anim_duration',
                            'label' => esc_html__('Animation Duration(ms)', 'agron'),
                            'type' => 'number',
                            'default' => 2000,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-number' => 'animation-duration: {{VALUE}}ms;',
                            ],
                        ),
                        array(
                            'name' => 'number_delimiter',
                            'label' => esc_html__('Number Delimiter', 'agron'),
                            'type' => 'select',
                            'options' => [
                                ''  => esc_html__('None', 'agron'),
                                '.' => esc_html__('Dot', 'agron'),
                                ',' => esc_html__('Comma', 'agron'),
                                ' ' => esc_html__('Space', 'agron'),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'number_tag',
                            'label' => esc_html__('Number HTML Tag', 'agron'),
                            'type' => 'select',
                            'default' => 'div',
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
                            'name' => 'description',
                            'label' => esc_html__('Description', 'agron'),
                            'type' => 'textarea',
                            'separator' => 'before',
                            'rows' => 5,
                            'default' => esc_html__('Description here', 'agron'),
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
                                '{{WRAPPER}} .pxl-counter-box' => 'align-items: {{VALUE}};'
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
                                '{{WRAPPER}} .pxl-counter-box' => 'align-items: {{VALUE}};'
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
                                '{{WRAPPER}} .pxl-counter-box' => 'flex-direction: {{VALUE}};'
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon svg' => 'height: {{SIZE}}{{UNIT}}; width:auto;',
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-counter-box' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_alignment',
                            'label' => esc_html__('Content Alignment', 'agron' ),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'options' => [
                                'start' =>  [
                                    'title' => esc_html__('Left', 'agron'),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' =>  [
                                    'title' => esc_html__('Center', 'agron'),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' =>  [
                                    'title' => esc_html__('Right', 'agron'),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-content' => 'align-items: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-content' => 'gap: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-content' => 'flex-direction: {{VALUE}}; '
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
                            'name' => 'box_bg',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-counter-box',
                        ),
                        array(
                            'name' => 'box_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-counter-box',
                        ),
                        array(
                            'name'         => 'box_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-counter-box',
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon' => 'font-size: {{SIZE}}{{UNIT}};'
                            ],
                        ),
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon' => 'min-width: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_bacground',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon',
                        ),
                        array(
                            'name' => 'icon_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon',
                        ),
                        array(
                            'name'         => 'icon_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon',
                        ),
                        array(
                            'name' => 'icon_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_number_style',
                    'label' => esc_html__('Number', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-number',
                        ),
                        array(
                            'name' => 'number_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-number',
                        ),
                        array(
                            'name' => 'number_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-number',
                        ),
                        array(
                            'name' => 'divider_number',
                            'type' => 'divider',
                        ),
                        array(
                            'name' => 'number_fix_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'num_prefix_normal',
                                    'label' => esc_html__('Prefix', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'num_prefix_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-number .pxl-number-prefix' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'num_prefix_typography',
                                            'type' => \Elementor\Group_Control_Typography::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-number .pxl-number-prefix',
                                        ),
                
                                    ],
                                ],
                                [
                                    'name' => 'num_suffix_normal',
                                    'label' => esc_html__('Suffix', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => array_merge(
                                        array(
                                            array(
                                                'name' => 'num_suffix_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-counter-box .pxl-counter-number .pxl-number-suffix' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'num_suffix_typography',
                                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                                'control_type' => 'group',
                                                'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-number .pxl-number-suffix',
                                            ),
                                        ),
                                    ), 
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
                            'name' => 'description_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter-box .pxl-counter-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-description',
                        ),
                        array(
                            'name' => 'description_stroke',
                            'type' => \Elementor\Group_Control_Text_Stroke::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-description',
                        ),
                        array(
                            'name' => 'description_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter-box .pxl-counter-description',
                        ),
                    ),
                ),
                
                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-counter-box',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);