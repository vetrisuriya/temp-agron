<?php 
/*
    General Custom Options
*/
add_action( 'elementor/element/container/section_layout/after_section_end', 'agron_element_custom_options', 1, 1 ); 
function agron_element_custom_options( \Elementor\Element_Base $el ) {
    $el->start_controls_section(
        'el_custom_opts',
        [
            'label' => esc_html__( 'Agron Custom Options', 'agron' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $el->add_responsive_control(
        'el_backdrop_filter',
        [
            'label' => esc_html__( 'Backdrop Filter', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'size_units' => [ 'px', 'custom'],
            'selectors' => [
                '{{WRAPPER}}' => 'backdrop-filter: blur({{SIZE}}{{UNIT}})',
            ],
        ]
    );

    
    $el->add_responsive_control(
        'el_position',
        [
            'label' => esc_html__( 'Position', 'agron' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' => [
                ''         => esc_html__('Default', 'agron'),
                'static'   => esc_html__('Static', 'agron'),
                'relative' => esc_html__('Relative', 'agron'),
                'absolute' => esc_html__('Absolute', 'agron'),
                'fixed'    => esc_html__('Fixed', 'agron'),
                'sticky'   => esc_html__('Sticky', 'agron'),
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'position: {{VALUE}} !important;',
            ],
        ]
    );
    // 
    $el->add_control(
        'el_popover_position',
        [
            'label' => esc_html__( 'Controls Position', 'agron' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'agron' ),
            'label_on' => esc_html__( 'Custom', 'agron' ),
            'return_value' => 'yes',
            'condition' => [
                'el_position' => ['absolute', 'fixed', 'sticky'],
            ],
        ],
    );
    $el->start_popover();
    $el->add_responsive_control(
        'el_offset_t',
        [
            'label' => esc_html__('Top', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'top: {{SIZE}}{{UNIT}};;',
            ],
        ]
    );
    $el->add_responsive_control(
        'el_offset_r',
        [
            'label' => esc_html__('Right', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'right: {{SIZE}}{{UNIT}};',
                
            ],
        ]
    );
    $el->add_responsive_control(
        'el_offset_b',
        [
            'label' => esc_html__('Bottom', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'bottom: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $el->add_responsive_control(
        'el_offset_l',
        [
            'label' => esc_html__('Left', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'left: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $el->end_popover();
    // 
    $el->add_responsive_control(
        'el_max_w',
        [
            'label' => esc_html__('Max Width', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $el->add_responsive_control(
        'el_min_w',
        [
            'label' => esc_html__('Min Width', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'min-width: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $el->add_responsive_control(
        'el_height',
        [
            'label' => esc_html__('Height', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $el->end_controls_section();

}

/*
    Background 
*/
add_action( 'elementor/element/container/section_layout/after_section_end', 'agron_element_custom_background', 1, 1 ); 
function agron_element_custom_background( \Elementor\Element_Base $el ) {
    $el->start_controls_section(
        'pxl_section_background',
        [
            'label' => esc_html__( 'Agron Background', 'agron' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
    $el->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'pxl_background',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .pxl-background',
        ]
    );
    $el->add_control(
        'pxl_background_effect',
        [
            'label' => esc_html__( 'Effect', 'agron' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' => [
                ''                      => esc_html__( 'None', 'agron' ),
                'scroll-based-parallax' => esc_html__('Scroll-based Parallax', 'agron')
            ],
        ],
    );
    $el->add_control(
        'pxl_background_z_index',
        [
            'label' => esc_html__('Z Index', 'agron' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'selectors' => [
                '{{WRAPPER}} .pxl-background' => 'z-index: {{VALUE}};',
            ],
        ]
    );
    $el->add_responsive_control(
        'pxl_background_height',
        [
            'label' => esc_html__('Height', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'condition' => [
                'pxl_background_effect' => 'scroll-based-parallax'
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $el->add_responsive_control(
        'pxl_background_min_height',
        [
            'label' => esc_html__('Min Height', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
            ],
            'condition' => [
                'pxl_background_effect' => 'scroll-based-parallax'
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'min-height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $el->add_control(
        'parallax_params_toggle',
        [
            'label' => esc_html__( 'Parallax Params', 'agron' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'return_value' => 'yes',
            'condition' => [
                'pxl_background_effect' => 'scroll-based-parallax',
            ],
        ]
    );
    $el->start_popover();
    $el->add_control(
        'parallax_x',
        [
            'label' => esc_html__( 'X (translateX)', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [ 'min' => -500, 'max' => 500, 'step' => 1 ],
            ],
            'default' => [ 'size' => 0, 'unit' => 'px' ],
            'condition' => [
                'parallax_params_toggle' => 'yes',
            ],
        ]
    );

    $el->add_control(
        'parallax_y',
        [
            'label' => esc_html__( 'Y (translateY)', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [ 'min' => -500, 'max' => 500, 'step' => 1 ],
            ],
            'default' => [ 'size' => 0, 'unit' => 'px' ],
            'condition' => [
                'parallax_params_toggle' => 'yes',
            ],
        ]
    );

    $el->add_control(
        'parallax_rotate',
        [
            'label' => esc_html__( 'Rotate (deg)', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [ 'min' => -180, 'max' => 180, 'step' => 1 ],
            ],
            'default' => [ 'size' => 0 ],
            'condition' => [
                'parallax_params_toggle' => 'yes',
            ],
        ]
    );

    $el->add_control(
        'parallax_scale',
        [
            'label' => esc_html__( 'Scale', 'agron' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [ 'min' => 0.1, 'max' => 3, 'step' => 0.1 ],
            ],
            'default' => [ 'size' => 1 ],
            'condition' => [
                'parallax_params_toggle' => 'yes',
            ],
        ]
    );

    $el->end_popover();

    $el->end_controls_section();
}

/*
    Mask 
*/
add_action( 'elementor/element/container/section_layout/after_section_end', 'agron_element_custom_mask', 1, 1 );
function agron_element_custom_mask( \Elementor\Element_Base $el ) {
    $el->start_controls_section(
        'pxl_section_mask',
        [
            'label' => esc_html__( 'Agron Mask', 'agron' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
    $el->add_control(
        'pxl_image_mask',
        [
            'type' => \Elementor\Controls_Manager::MEDIA,
            'selectors' => [
                '{{WRAPPER}}' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
            ],
        ],
    );
    $el->add_control(
          'pxl_mask_size',
          [
                'label' => esc_html__( 'Mask Size', 'agron' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                     'auto' => esc_html__('Auto', 'agron'),
                     'cover' => esc_html__('Cover', 'agron'),
                     'contain' => esc_html__('Contain', 'agron'),
                ],
                'selectors' => [
                     '{{WRAPPER}}' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                ],
          ]
     );
     $el->add_control(
          'pxl_mask_position',
          [
                'label' => esc_html__( 'Mask Position', 'agron' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center',
                'options' => [
                     'center' => esc_html__('Center', 'agron'),
                     'top' => esc_html__('Top', 'agron'),
                     'bottom' => esc_html__('Bottom', 'agron'),
                     'left' => esc_html__('Left', 'agron'),
                     'right' => esc_html__('Right', 'agron'),
                     'top left' => esc_html__('Top Left', 'agron'),
                     'top right' => esc_html__('Top Right', 'agron'),
                     'bottom left' => esc_html__('Bottom Left', 'agron'),
                     'bottom right' => esc_html__('Bottom Right', 'agron'),
                ],
                'selectors' => [
                     '{{WRAPPER}}' => '-webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                ],
          ]
     );

    $el->end_controls_section();
}

/*
    Templates 
*/
add_action( 'elementor/element/container/section_layout/after_section_end', 'agron_templates', 1, 1 ); 
function agron_templates( \Elementor\Element_Base $el ) {
    $el->start_controls_section(
        'pxl_section_templates',
        [
            'label' => esc_html__( 'Agron Templates', 'agron' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
    $el->add_control(
        'pxl_template',
        [
            'label' => esc_html__('Is Template', 'agron'),
            'type' => 'switcher',
            'default' => '',
            'hide_inner' => true,
        ],
    );
    $el->add_control(
        'pxl_template_toggle_type',
        [
            'label' => esc_html__( 'Toggle Type', 'agron' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'groups' => [
                [
                    'label' => esc_html('Fade', 'agron'),
                    'options' => [
                        'fade-in' => esc_html('Fade In', 'agron'),
                    ]
                ],
                [
                    'label' => esc_html('Slide', 'agron'),
                    'options' => [
                        'slide-up' => esc_html('Slide Up', 'agron'),
                        'slide-right' => esc_html('Slide Right', 'agron'),
                        'slide-bottom' => esc_html('Slide Bottom', 'agron'),
                        'slide-left' => esc_html('Slide Left', 'agron'),
                    ],
                ],
                [
                    'label' => esc_html('Other', 'agron'),
                    'options' => [
                        'popup' => esc_html('Pop Up', 'agron'),
                    ],
                ],
            ],
            'default' => 'fade-in',
            'condition' => [
                'pxl_template!' => '',
            ],
        ],
    );
    $el->add_responsive_control(
        'pxl_template_transition_duration',
        [
            'label' => esc_html__('Transition Duration', 'agron'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 's', 'mss' ],
            'range' => [
                's' => [
                    'min' => 0,
                    'max' => 10,
                    'step' => 0.1,
                ],
                'mss' => [
                    'min' => 0,
                    'max' => 10000,
                    'step' => 10,
                ],
            ],
            'default' => [
                'size' => 0.5,
                'unit' => 's',
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'transition-duration: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_template!' => '',
            ],
        ]
    );
    $el->end_controls_section();
}
/*
    Motion Effects 
*/
add_action( 'elementor/element/container/section_layout/after_section_end', 'agron_moution_effects', 1, 1 ); 
function agron_moution_effects( \Elementor\Element_Base $el ) {
    $el->start_controls_section(
        'pxl_section_motion_effetcs',
        [
            'label' => esc_html__( 'Agron Motion Effects', 'agron' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
    $el->add_control(
        'is_scrolling_effects',
        [
            'label' => esc_html__('Scrolling Effects', 'agron'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => '',
        ],
    );
    $el->add_control(
        'divider_1',
        ['type' => \Elementor\Controls_Manager::DIVIDER,],
    );
    $el->add_control(
        'is_mouse_effects',
        [
            'label' => esc_html__('Mouse Effects', 'agron'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => '',
        ],
    );
    $el->add_control(
        'divider_2',
        ['type' => \Elementor\Controls_Manager::DIVIDER,],
    );
    $el->add_control(
        'is_sticky',
        [
            'label' => esc_html__('Is Sticky', 'agron'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => '',
        ],
    );
    $el->add_control(
        'divider_3',
        ['type' => \Elementor\Controls_Manager::DIVIDER,],
    );
    $el->add_control(
        'pxl_entrance_animation',
        [
            'label' => esc_html__('Entrance Animation', 'agron'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'multiple' => false,
            'groups' => agron_entrance_anim(),
            'default' => '',
        ],
    );
    $el->end_controls_section();
}


/*
    Class Render
*/
add_filter( 'pxl_custom_class', 'agron_e_con_class_render', 1, 2);
function agron_e_con_class_render($classes, $settings) {
    $classes = '';
    if(!empty($settings['pxl_template'])) {
        $classes .= 'e-template '.$settings['pxl_template_toggle_type'];
    }
    if(!empty($settings['pxl_entrance_animation'])) {
        $classes .= ' '.$settings['pxl_entrance_animation'];
    }
    return $classes;
}

/*
    HTML Before Content Render
*/
add_filter( 'pxl_element_container/before-render', 'agron_element_before_render', 1, 2 );
function agron_element_before_render($output, $settings) {
    $output = null;
    if (!empty($settings['pxl_background_image'])) {
        $background_effect = $settings['pxl_background_effect'] ?? 'none';
        $output .= '<div class="pxl-background ' . esc_attr($background_effect) . '"';
        if ($background_effect === 'scroll-based-parallax') {
            $parallax_params = [
                'x' => $settings['parallax_x']['size'] ?? 0,
                'y' => $settings['parallax_y']['size'] ?? 0,
                'rotate' => $settings['parallax_rotate']['size'] ?? 0,
                'scale' => $settings['parallax_scale']['size'] ?? 1,
            ];
            $parallax_json = htmlspecialchars(json_encode($parallax_params), ENT_QUOTES, 'UTF-8');
            $output .= ' data-based-parallax="' . $parallax_json . '"';
        }
        $output .= '></div>';
    }
    return $output;
}


/*
    HTML After Content Render
*/
add_filter( 'pxl_element_container/after-render', 'agron_element_after_render', 1, 2) ;
function agron_element_after_render($output, $settings) {
    $output = null;
    return $output;
}