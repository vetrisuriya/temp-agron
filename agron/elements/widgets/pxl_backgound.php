<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_background',
        'title' => esc_html__('Case Backgroud', 'agron' ),
        'icon' => 'eicon-background',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'agron-parallax',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_background_content',
                    'label' => esc_html__('Background', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(   
                        array(
                            'name' => 'pxl_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-background',
                        ),
                        array(
                            'name' => 'backgroud_height',
                            'label' => esc_html__('Height', 'agron'),
                            'type' => 'slider',
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 5000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array (
                            'name' => 'background_z_index',
                            'label' => esc_html__('Z Index', 'agron' ),
                            'type' => 'number',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-background' => 'z-index: {{VALUE}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_effect_content',
                    'label' => esc_html__('Effects', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(   
                        array(
                            'name' => 'background_effect',
                            'label' => esc_html__( 'Effect', 'agron' ),
                            'type' => 'select',
                            'default' => '',
                            'options' => [
                                ''                      => esc_html__( 'None', 'agron' ),
                                'scroll-based-parallax' => esc_html__('Scroll-based Parallax', 'agron')
                            ],
                        ),
                        array(
                            'name' => 'parallax_params_toggle',
                            'label' => esc_html__( 'Parallax Params', 'agron' ),
                            'type' => 'popover_toggle',
                            'return_value' => 'yes',
                            'condition' => [
                                'background_effect' => 'scroll-based-parallax',
                            ],
                        ),
                        array(
                            'name' => 'parallax_params_start_popover',
                            'type' => 'pxl_start_popover',
                        ),
                        array(
                            'name' => 'parallax_x',
                            'label' => esc_html__( 'X (translateX)', 'agron' ),
                            'type' => 'slider',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [ 'min' => -500, 'max' => 500, 'step' => 1 ],
                            ],
                            'default' => [ 'size' => 0, 'unit' => 'px' ],
                            'condition' => [
                                'parallax_params_toggle' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'parallax_y',
                            'label' => esc_html__( 'Y (translateY)', 'agron' ),
                            'type' => 'slider',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [ 'min' => -500, 'max' => 500, 'step' => 1 ],
                            ],
                            'default' => [ 'size' => 0, 'unit' => 'px' ],
                            'condition' => [
                                'parallax_params_toggle' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'parallax_rotate',
                            'label' => esc_html__( 'Rotate (deg)', 'agron' ),
                            'type' => 'slider',
                            'range' => [
                                'px' => [ 'min' => -180, 'max' => 180, 'step' => 1 ],
                            ],
                            'default' => [ 'size' => 0 ],
                            'condition' => [
                                'parallax_params_toggle' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'parallax_scale',
                            'label' => esc_html__( 'Scale', 'agron' ),
                            'type' => 'slider',
                            'range' => [
                                'px' => [ 'min' => 0.1, 'max' => 3, 'step' => 0.1 ],
                            ],
                            'default' => [ 'size' => 1 ],
                            'condition' => [
                                'parallax_params_toggle' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'parallax_params_end_popover',
                            'type' => 'pxl_end_popover',
                        ),                    
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);