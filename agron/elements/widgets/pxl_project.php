<?php
$post_type = ['project'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_project',
        'title' => esc_html__('Case Project', 'agron' ),
        'icon' => 'eicon-post',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'pxl-post-grid',
            'agron-swiper',
            'agron-parallax'
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_post_layout',
                    'label'    => esc_html__( 'Layout', 'agron' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'type'     => 'hidden',
                                'default'  => 'project',
                            ),
                            array(
                                'name'     => 'layout_type',
                                'label'    => esc_html__( 'Layout Type', 'agron' ),
                                'type'     => 'select',
                                'options'  => [
                                    'grid' => esc_html__('Grid', 'agron'),
                                    'carousel' => esc_html__('Carousel', 'agron'),
                                ],
                                'default'  => 'grid',
                            ),
                            array(
                                'name'     => 'layout_style',
                                'label'    => esc_html__( 'Layout Style', 'agron' ),
                                'type'     => 'select',
                                'options'  => [
                                    'default' => esc_html__('Default', 'agron'),
                                    'style1' => esc_html__('Style 1', 'agron'),
                                    'style2' => esc_html__('Style 2', 'agron'),
                                ],
                                'condition' => [
                                    'layout_portfolio' => ['1']
                                ],
                                'default'  => 'default',
                            ),
                        ),
                        agron_get_post_layout($post_type, []), 
                    ),
                ),
                agron_source_post_settings($post_type),
                array(
                    'name' => 'tab_display_opts',
                    'label' => esc_html__('Display', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array_merge(
                        image_dimension_options(),
                        array(
                            array(
                                'name' => 'title_tag',
                                'label' => esc_html__('Title HTML Tag', 'agron'),
                                'type' => 'select',
                                'seperator' => 'before',
                                'options' => [
                                    ''   => esc_html__('Default', 'agron'),
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
                                'default' => '',
                            ),
                            array(
                                'name' => 'show_category',
                                'label' => esc_html__('Show Category', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                                'condition' => [
                                    'layout_portfolio' => ['1', '3']
                                ]
                            ),
                            array(
                                'name' => 'show_excerpt',
                                'label' => esc_html__('Show Excerpt', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                            ),
                            array(
                                'name' => 'num_of_words',
                                'label' => esc_html__('Number of Words', 'agron' ),
                                'type' => 'number',
                                'condition' => [
                                    'show_excerpt!' => '',
                                ],
                            ),
                            array(
                                'name' => 'show_button',
                                'label' => esc_html__('Show Button', 'agron' ),
                                'type' => 'switcher',
                                'default' => 'true',
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_grid_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'condition' => [
                        'layout_type' => 'grid'
                    ],
                    'controls' => array(
                        grid_controls_options(),
                    ),
                ),
                array(
                    'name' => 'tab_carousel_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'condition' => [
                        'layout_type' => 'carousel'
                    ],
                    'controls' => array(
                        swiper_controls_options(),  
                    ),
                ),
                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron'),
                    'tab'   => 'style',
                    'controls' => [
                        array(
                            'name' => 'category_spacing',
                            'label' => esc_html__('Category Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-project .pxl-post-category' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout_portfolio' => ['1'],
                            ]
                        ),
                        array(
                            'name' => 'title_spacing',
                            'label' => esc_html__('Title Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-project .pxl-post-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'show_category!' => '',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_spacing',
                            'label' => esc_html__('Excerpt Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-project .pxl-post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'show_excerpt!' => '',
                            ],
                        ),
                    ],
                ),
                array(
                    'name' => 'tab_content_style',
                    'label' => esc_html__('Box Content', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'content_bg',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-project:not(.pxl-project-layout3) .pxl-post-content, {{WRAPPER}} .pxl-project.pxl-project-layout3 .pxl-post-content:before',
                        ),
                        array(
                            'name' => 'content_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-content',
                        ),
                        array(
                            'name'         => 'content_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-project .pxl-post-content',
                        ),
                        array(
                            'name' => 'content_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-project .pxl-post-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Padding', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-project .pxl-post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_featured_style',
                    'label' => esc_html__('Project Featured', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'featured_width',
                            'label' => esc_html__('Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-project .pxl-post-featured img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'featured_height',
                            'label' => esc_html__('Height', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-project .pxl-post-featured img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'featured_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'featured_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'featured_opacity',
                                            'label' => esc_html__('Opacity', 'agron' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => ['px'],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-project .pxl-post-featured img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-featured img',
                                        ),
                                        array(
                                            'name' => 'featured_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-project .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-project .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'featured_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tabs',
                                    'controls' => [
                                        array(
                                            'name' => 'featured_hover_style',
                                            'label' => esc_html__('Hover Style', 'agron' ),
                                            'type' => 'select',
                                            'options' => [
                                                'hover-image-default'  => esc_html__('Default', 'agron'),
                                                'hover-image-parallax' => esc_html__('Parallax', 'agron'),
                                                'hover-image-overlay-fade--x' => esc_html__('Overlay Fade X', 'agron'),
                                                'hover-image-overlay-fade--y' => esc_html__('Overlay Fade Y', 'agron'),
                                                'hover-image-flashing' => esc_html__('Flashing', 'agron'),
                                                'hover-image-overlay-shine' => esc_html__('Shine', 'agron'),
                                            ],
                                            'default' => '',
                                        ),
                                        array(
                                            'name' => 'featured_hover_opacity',
                                            'label' => esc_html__('Opacity', 'agron' ),
                                            'type' => 'slider',
                                            'control_type' => 'responsive',
                                            'size_units' => ['px'],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 1,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-featured img,
                                                {{WRAPPER}} .pxl-project.pxl-project-layout1 .pxl-post-featured:hover img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-featured img,
                                            {{WRAPPER}} .pxl-project.pxl-project-layout1 .pxl-post-featured:hover img',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-featured, 
                                            {{WRAPPER}} .pxl-project.pxl-project-layout1 .pxl-post-featured:hover',
                                        ),
                                        array(
                                            'name'         => 'featured_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-featured,
                                            {{WRAPPER}} .pxl-project.pxl-project-layout1 .pxl-post-featured:hover',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-featured,
                                                {{WRAPPER}} .pxl-project.pxl-project-layout1 .pxl-post-featured:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label' => esc_html__('Project Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-title',
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
                                                '{{WRAPPER}} .pxl-project .pxl-post-title' => 'color: {{VALUE}};',
                                            ],
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
                                            'name' => 'title_underline_h',
                                            'label' => esc_html__('Underline Weight(px)', 'agron'),
                                            'type' => 'slider',
                                            'size_units' => ['px'],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-project .pxl-post-item .pxl-post-title' => "--pxl-height: {{SIZE}}{{UNIT}};",
                                            ],
                                            'condition' => [
                                                'title_hover_style' => ['hover-text-underline', 'hover-text-underline--slide-ltr', 'hover-text-underline--slide-rtl', 'hover-text-underline--expland'],
                                            ],
                                        ),
                                        array(
                                            'name' => 'title_divider',
                                            'type' => 'divider',
                                        ),
                                        array(
                                            'name' => 'title_hover_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-project .pxl-post-title:hover' => 'color: {{VALUE}};',
                                                '{{WRAPPER}} .pxl-project .pxl-post-title.hover-text-fill' => '--link-color-hover: {{VALUE}};'
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_category_style',
                    'label' => esc_html__('Project Category', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'show_category!' => '',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'category_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-category',
                        ),
                        array(
                            'name' => 'category_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-project .pxl-post-category',
                        ),
                        array(
                            'name' => 'category_controls',
                            'control_type' => 'tab',
                            'tabs' => [
                                [
                                    'name' => 'category_normal',
                                    'label' => esc_html__('Normal', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [  
                                        array(
                                            'name' => 'category_color',
                                            'label' => esc_html__('Text Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-project .pxl-post-category a' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                                [
                                    'name' => 'category_hover',
                                    'label' => esc_html__('Hover', 'agron' ),
                                    'type' => 'tab',
                                    'controls' => [
                                        array(
                                            'name' => 'category_hover_color',
                                            'label' => esc_html__('Link Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-project .pxl-post-category > a:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_button_style',
                    'label' => esc_html__('Post Button', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout_project!' => ['project-1'],
                    ],
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'btn_w',
                                'label' => esc_html__('Width', 'agron' ),
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
                                    '{{WRAPPER}} .pxl-project .pxl-post-button' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_h',
                                'label' => esc_html__('Height', 'agron' ),
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
                                    '{{WRAPPER}} .pxl-project .pxl-post-button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'inset_border',
                                'label' => esc_html__('Inset Border', 'agron' ),
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
                                    '{{WRAPPER}} .pxl-project.post-custom-layout3 .pxl-post-button > svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'layout' => ['3'],
                                ],
                            ),
                            array(
                                'name' => 'divider1',
                                'type' => 'divider',
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
                                                    '{{WRAPPER}} .pxl-project .pxl-post-button' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_inset_border_color',
                                                'label' => esc_html__('Border Inset Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-project.post-custom-layout3 .pxl-post-button > svg' => 'color: {{VALUE}};',
                                                ],
                                                'condition' => [
                                                    'layout_project' => ['project-2'],
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic', 'gradient' ],
                                                'selector' => '{{WRAPPER}} .pxl-project .pxl-post-button',
                                            ),
                                            array(
                                                'name' => 'btn_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-project .pxl-post-button',
                                            ),
                                            array(
                                                'name'         => 'btn_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-project .pxl-post-button',
                                            ),
                                            array(
                                                'name' => 'btn_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-project .pxl-post-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-project .pxl-post-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                    [
                                        'name' => 'btn_hover',
                                        'label' => esc_html__('Hover', 'agron' ),
                                        'type' => 'tab',
                                        'controls' => [
                                            array(
                                                'name' => 'btn_hover_color',
                                                'label' => esc_html__('Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-button' => 'color: {{VALUE}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_inset_border_color',
                                                'label' => esc_html__('Border Inset Color', 'agron' ),
                                                'type' => 'color',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-project.post-custom-layout3 {{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-button > svg' => 'color: {{VALUE}};',
                                                ],
                                                'condition' => [
                                                    'layout_project' => ['project-2'],
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_background',
                                                'type' => \Elementor\Group_Control_Background::get_type(),
                                                'control_type' => 'group',
                                                'types' => [ 'classic' ],
                                                'selector' => '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-button',
                                            ),
                                            array(
                                                'name' => 'btn_transition',
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
                                                    '{{WRAPPER}} .pxl-project .pxl-post-button' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                                ]
                                            ),
                                            array(
                                                'name' => 'btn_hover_border',
                                                'type' => \Elementor\Group_Control_Border::get_type(),
                                                'separator' => 'before',
                                                'control_type' => 'group', 
                                                'selector' => '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-button',
                                            ),
                                            array(
                                                'name'         => 'btn_hover_box_shadow',
                                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                                'control_type' => 'group',
                                                'selector'     => '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-button',
                                            ),
                                            array(
                                                'name' => 'btn_hover_border_radius',
                                                'label' => esc_html__('Border Radius', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                            array(
                                                'name' => 'btn_hover_padding',
                                                'label' => esc_html__('Padding', 'agron' ),
                                                'type' => 'dimensions',
                                                'size_units' => [ 'px', 'custom' ],
                                                'control_type' => 'responsive',
                                                'separator' => 'before',
                                                'selectors' => [
                                                    '{{WRAPPER}} .pxl-project .pxl-post-item:hover .pxl-post-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                ],
                                            ),
                                        ],
                                    ],
                                ],
                            ), 
                        ),
                    ),
                ),
                swiper_bullets_pagination_style_options(),
                swiper_navigation_button_style_options(),
                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .grid .grid-item, {{WRAPPER}} .pxl-swiper .swiper-slide',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);