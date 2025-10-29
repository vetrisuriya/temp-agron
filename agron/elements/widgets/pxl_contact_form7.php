<?php
$contact_forms[0] = 'Choose Form';
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'agron')] = 0;
    }
}

pxl_add_custom_widget(
    array(
        'name' => 'pxl_contact_form7',
        'title' => esc_html__('Case Contact Form 7', 'agron'),
        'icon' => 'eicon-form-horizontal',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_contact_form_content',
                    'label' => esc_html__('Contact Form', 'agron'),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'cf7_id',
                            'label' => esc_html__('Choose Form', 'agron'),
                            'type' => 'select',
                            'options' => $contact_forms,
                            'default' => '0',
                        ),
                        array(
                            'name' => 'form_style',
                            'label' => esc_html__('Form Style', 'agron'),
                            'type' => 'select',
                            'options' => [
                                '' => esc_html__('Default', 'agron'),
                                'form-style1' => esc_html__('Form Style 1', 'agron'),
                                'form-style2' => esc_html__('Form Style 2', 'agron'),
                                'form-style3' => esc_html__('Form Style 3', 'agron'),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'submit_with_button_widget',
                            'label' => esc_html__('Submit with Button Widget', 'agron'),
                            'type' => 'switcher',
                            'default' => '',
                        ),
                        array(
                            'name' => 'contacform_id',
                            'label' => esc_html__('Form ID', 'agron'),
                            'type' => 'text',
                            'condition' => [
                                'submit_with_button_widget!' => '',
                            ],
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),

                        array(
                            'name' => 'field_columns',
                            'label' => esc_html__('Columns', 'agron' ),
                            'type' => 'select',
                            'control_type' => 'responsive',
                            'options' => [
                                ''     => esc_html__('Default', 'agron'),
                                '100%' => '1',
                                '50%'  => '2',
                                '33.33333%' => '3',
                                '25%'  => '4',
                                '20%' => '5',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-form .pxl-form-control' => 'max-width: {{VALUE}}; flex: 0 1 {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_input_style',
                    'label' => esc_html__('Field', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'textarea_resize',
                            'label' => esc_html__('Textarea Resize', 'agron'),
                            'type' => 'select',
                            'options' => [
                                '' => esc_html__('Default', 'agron'),
                                'both' => esc_html__('Both', 'agron'),
                                'horizontal' => esc_html__('Horizontal', 'agron'),
                                'vertical' => esc_html__('Vertical', 'agron'),
                                'none' => esc_html__('None', 'agron'),
                            ],
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea' => "resize: {{VALUE}};",
                            ],
                        ),
                        array(
                            'name' => 'textarea_h',
                            'label' => esc_html__('Textarea Height', 'agron'),
                            'type' => 'slider',
                            'size_units' => ['px', '%', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea' => "height: {{SIZE}}{{UNIT}};",
                            ],
                        ),
                        array(
                            'name' => 'divider2',
                            'type' => 'divider',
                        ),
                        array(
                            'name' => 'input_height',
                            'label' => esc_html__('Field Height', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input' => 'line-height: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'input_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input, 
                            {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea, 
                            {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight',
                        ),
                        array(
                            'name' => 'input_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'input_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'input_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'input_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select',
                                        ),
                                        array(
                                            'name' => 'input_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select',
                                        ),
                                        array(
                                            'name'         => 'input_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select',
                                        ),
                                        array(
                                            'name' => 'input_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'input_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'input_focus',
                                    'label' => esc_html__('Focus/Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'input_focus_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:focus, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:hover, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'input_focus_bg',
                                            'label' => esc_html__('Background Color', 'agron' ),
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:focus, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:hover, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:hover',
                                        ),
                                        array(
                                            'name'         => 'input_focus_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:focus, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:hover, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:hover',
                                            'separator' => 'before',
                                        ),
                                        array(
                                            'name' => 'input_focus_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:focus, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:hover, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:hover',
                                        ),
                                        array(
                                            'name' => 'input_focus_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                            'size_units' => [ 'px', '%' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:focus, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:hover, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:hover, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'input_focus_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                            'size_units' => [ 'px', '%' ],
                                            'control_type' => 'responsive',
                                            'separator' => 'before',
                                            'selectors' => [
                                                '{{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap input:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:focus, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap textarea:hover, 
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap .pxl-select-higthlight:hover,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:focus,
                                                {{WRAPPER}} .wpcf7 form .wpcf7-form-control-wrap select:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'condition' => [
                        'use_default_submit!' => '',
                    ],
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'btn_h',
                                'label' => esc_html__('Height', 'agron' ),
                                'type' => 'slider',
                                'size_units' => ['px', '%', 'custom'],
                                'control_type' => 'responsive',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .wpcf7 form .wpcf7-submit' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_typography',
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-submit',
                                'separator' => 'before',
                            ),
                            array(
                                'name' => 'btn_text_shadow',
                                'label' => esc_html__('Text Shadow', 'agron' ),
                                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-submit',
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
                                                    '{{WRAPPER}} .wpcf7 form .wpcf7-submit' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_bg',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-submit',
                                            ),
                                            array(
                                                'name' => 'btn_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-submit',
                                            ),
                                            array(
                                                'name'         => 'btn_box_shadow',
                                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .wpcf7 form .wpcf7-submit',
                                            ),
                                            array(
                                                'name' => 'btn_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', '%', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .wpcf7 form .wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', '%', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .wpcf7 form .wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'btn_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tabs',
                                        'controls' => [
                                            array(
                                                'name' => 'btn_hover_style',
                                                'label' => esc_html__('Hover Style', 'agron' ),
                                                'type' => 'select',
                                                'options' => [
                                                    'hover-default' => esc_html__('Default', 'agron'),
                                                    'hover-spotlight-scale' => esc_html__('Spotlight', 'agron'),
                                                    'hover-parallax' => esc_html__('Parallax', 'agron'),
                                                ],
                                                'default' => 'hover-default',
                                                'condition' => [
                                                    'btn_type!' => ['pxl-btn-split'],
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hove_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .wpcf7 form .wpcf7-submit:hover' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_bg',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-submit:hover',
                                            ),
                                            array(
                                                'name' => '_btn_hover_border_color',
                                                'label' => esc_html__('Border Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .wpcf7 form .wpcf7-submit:hover' => 'border-color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_anim',
                                                'label' => esc_html__( 'Hover Animation', 'agron' ),
                                                'type' => 'hover_animation',
                                            ),
                                            array(
                                                'name' => 'btn_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .wpcf7 form .wpcf7-submit:hover',
                                            ),
                                            array(
                                                'name'         => 'btn_hover_box_shadow',
                                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .wpcf7 form .wpcf7-submit:hover',
                                            ),
                                            array(
                                                'name' => 'btn_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', '%', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .wpcf7 form .wpcf7-submit:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', '%', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .wpcf7 form .wpcf7-submit:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-contact-form-wrapper',
                    ]),
                ),

            ),
        ),
    ),
    agron_get_class_widget_path()
);