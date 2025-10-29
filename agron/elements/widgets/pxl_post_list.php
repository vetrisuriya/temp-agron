<?php
$post_type = ['current', 'post', 'service', 'project' , 'team'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_list',
        'title' => esc_html__('Case Post List', 'agron' ),
        'icon' => 'eicon-post-list',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
                    'label' => esc_html__('Layout', 'agron'),
                    'tab' => 'layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'agron'),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => array(
                                '1' => array(
                                    'label' => esc_html__('Layout 1', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-list-1.jpg',
                                ),
                                '2' => array(
                                    'label' => esc_html__('Layout 2', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-list-2.jpg',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_post_source',
                    'label' => esc_html__('Source', 'agron' ),
                    'tab' => 'content',
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'filter_by',
                                'label' => esc_html__('Filter by', 'agron' ),
                                'type' => 'select',
                                'default' => 'recent',
                                'options' => [
                                    'related' => esc_html__('Related Posts', 'agron' ),
                                    'recent' => esc_html__('Recent Posts', 'agron' ),
                                    'custom' => esc_html__('Custom', 'agron' ),
                                ],
                            ),
                            array(
                                'name'     => 'post_type_custom',
                                'type'     => 'select',
                                'label'    => esc_html__('Post Type', 'agron'),
                                'options'  => [
                                    'current' => 'Current Post Type',
                                    'post' => 'Post',
                                    'project' => 'Project',
                                    'service' => 'Service',
                                    'team'   => 'Team'
                                ],
                                'default'  => 'post',
                                'description' => esc_html__('If you leave it blank, it will automatically get the post type of the current page.', 'agron'),
                                'condition' => [
                                    'filter_by' =>  'custom',
                                ],
                            ),
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'agron' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'agron' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'agron' ),
                                ],
                                'default'  => 'term_selected',
                                'condition' => [
                                    'filter_by' =>  'custom',
                                ],
                            ) ,
                        ),
                        agron_get_term_by_post_type_custom($post_type, [
                            'custom_condition' => [
                                'filter_by' =>  'custom',
                                'select_post_by' => 'term_selected',
                            ]
                        ]),
                        agron_get_ids_by_post_type_custom($post_type, [
                            'custom_condition' => [
                                'filter_by' =>  'custom',
                                'select_post_by' => 'post_selected',
                            ]
                        ]),
                        array(
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'agron' ),
                                'type' => 'select',
                                'default' => 'DESC',
                                'separator' => 'before',
                                'options' => [
                                    'DESC' => esc_html__('Descending', 'agron' ),
                                    'ASC' => esc_html__('Ascending', 'agron' ),
                                ],
                            ),
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'agron' ),
                                'type' => 'select',
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'agron' ),
                                    'ID' => esc_html__('ID', 'agron' ),
                                    'author' => esc_html__('Author', 'agron' ),
                                    'title' => esc_html__('Title', 'agron' ),
                                    'rand' => esc_html__('Random', 'agron' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Limit', 'agron' ),
                                'type' => 'number',
                                'default' => 6,
                            ),
                            array(
                                'name' => 'show_divider',
                                'label' => esc_html__('Show Divider', 'agron'),
                                'type' => 'switcher',
                                'default' => true,
                                'separator' => 'before',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'tab_general_style',
                    'label' => esc_html__('General', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'featured_width',
                            'label' => esc_html__('Featured Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['%', 'custom'],
                            'range' => [
                                '%' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-list .pxl-post-featured' => 'flex: 0 1 {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_width',
                            'label' => esc_html__('Content Width', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['%', 'custom'],
                            'range' => [
                                '%' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-list .pxl-post-content' => 'flex: 0 1 {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__('Item Spacing', 'agron' ),
                            'type' => 'slider',
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-list .pxl-post-item + .pxl-post-item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_featured_style',
                    'label' => esc_html__('Post Featured', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
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
                                '{{WRAPPER}} .pxl-post-list .pxl-post-featured img' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name'     => 'featured_css_filters',
                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-list .pxl-post-featured img',
                        ),
                        array(
                            'name' => 'featured_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group', 
                            'separator' => 'before',
                            'selector' => '{{WRAPPER}} .pxl-post-list .pxl-post-featured',
                        ),
                        array(
                            'name'         => 'featured_box_shadow',
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-post-list .pxl-post-featured',
                        ),
                        array(
                            'name' => 'featured_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-list .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_title_style',
                    'label' => esc_html__('Post Title', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post .pxl-post-title',
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
                                                '{{WRAPPER}} .pxl-post-list .pxl-post-title' => 'color: {{VALUE}};',
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
                                                '{{WRAPPER}} .pxl-post .pxl-post-item .pxl-post-title' => "--pxl-height: {{SIZE}}{{UNIT}};",
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
                                                '{{WRAPPER}} .pxl-post-list .pxl-post-title:hover:not(.hover-text-fill)' => 'color: {{VALUE}};',
                                                '{{WRAPPER}} .pxl-post-list .pxl-post-title.hover-text-fill' => '--link-color-hover: {{VALUE}};'
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_date_style',
                    'label' => esc_html__('Post Date', 'agron'),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'date_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-list .pxl-post-date' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'date_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-list .pxl-post-date',
                        ),
                    ),
                ),
                array(
                    'name' => 'pxl_motion_effects',
                    'tab' => 'style',
                    'label' => esc_html__('Motion Effects', 'agron'),
                    'controls' => agron_get_animation_options([
                        'selectors' => '{{WRAPPER}} .pxl-swiper .swiper-slide',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);