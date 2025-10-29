<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_custom',
        'title' => esc_html__('Case Post Custom', 'agron'),
        'icon' => 'eicon-posts-ticker',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'agron-swiper'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_post_layout',
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
                                    'label' => esc_html__('Post 1', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-custom-1.webp',
                                ),
                                '2' => array(
                                    'label' => esc_html__('Post 2', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-custom-2.webp',
                                ),
                                '3' => array(
                                    'label' => esc_html__('Post 3', 'agron'),
                                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-custom-3.webp',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_post_content',
                    'label' => esc_html__('Posts', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'featured_image',
                                    'label' => esc_html__('Featured Image', 'agron'),
                                    'type' => 'media',
                                ),
                                array(
                                    'name' => '_icon',
                                    'label' => esc_html__('Icon', 'agron' ),
                                    'type' => 'icons',
                                    'fa4compatibility' => 'icon',
                                    'default' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/06/badge-2.svg'), 
                                            'id' => 4116, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'agron' ),
                                    'type' => 'textarea',
                                    'rows' => 5,
                                    'default' => esc_html__('Heading Title', 'agron'),
                                    'label_block' => true,
                                    'description' => esc_html__('Highlight use shortcode: [highlight text="..."] or [highlight_image img_id="123"]', 'agron'),
                                ),
                                array(
                                    'name' => 'excerpt',
                                    'label' => esc_html__('Excerpt', 'agron' ),
                                    'type' => 'textarea',
                                    'rows' => 5,
                                ),
                                array(
                                    'name' => 'due_date',
                                    'label' => esc_html__( 'Due Date', 'agron' ),
                                    'type' => 'date_time',
                                ),
                                array(
                                    'name' => 'button_icon',
                                    'label' => esc_html__('Button Icon', 'agron' ),
                                    'type' => 'icons',
                                    'fa4compatibility' => 'icon',
                                    'default' => [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/05/arrow-up-right.svg'), 
                                            'id' => 61, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                ),
                                array(
                                    'name' => 'button_text',
                                    'label' => esc_html__('Button Text', 'agron' ),
                                    'type' => 'text',
                                    'default' => esc_html__('More Details', 'agron'),
                                ),
                                array(
                                    'name' => 'button_link',
                                    'label' => esc_html__('Link URL', 'agron' ),
                                    'type' => 'url',
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',

                        ),
                    ),
                ),
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
                        ),
                    ),
                ),
                // array(
                //     'name' => 'tab_grid_add_opts',
                //     'label' => esc_html__('Additional Options', 'agron' ),
                //     'tab' => 'settings',
                //     'condition' => [
                //         'layout_type' => 'grid',
                //         'layout_post!' => ['post-1'],
                //     ],
                //     'controls' => array(
                //         grid_controls_options(),
                //     ),
                // ),
                array(
                    'name' => 'tab_carousel_add_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'settings',
                    'controls' => array(
                        swiper_controls_options(),   
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
                                            'name' => 'box_bg',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-item',
                                        ),
                                        array(
                                            'name' => 'box_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-item',
                                        ),
                                        array(
                                            'name'         => 'box_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-custom .pxl-post-item',
                                        ),
                                        array(
                                            'name' => 'box_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name' => 'box_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover,
                                            {{WRAPPER}} .pxl-post-custom .pxl-post-item.is-active',
                                        ),
                                        array(
                                            'name'      => '_box_hover_border_color',
                                            'label'     => esc_html__('Border Color', 'agron' ),
                                            'type'      => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover,
                                                {{WRAPPER}} .pxl-post-custom .pxl-post-item.is-active' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover,
                                            {{WRAPPER}} .pxl-post-custom .pxl-post-item.is-active',
                                        ),
                                        array(
                                            'name'         => 'box_hover_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover,
                                            {{WRAPPER}} .pxl-post-custom .pxl-post-item.is-active',
                                        ),
                                        array(
                                            'name' => 'box_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover,
                                                {{WRAPPER}} .pxl-post-custom .pxl-post-item.is-active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'box_hover_padding',
                                            'label' => esc_html__('Padding', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover,
                                                {{WRAPPER}} .pxl-post-custom .pxl-post-item.is-active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label' => esc_html__('Box Content', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'content_bg',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-content, {{WRAPPER}} .pxl-post-custom .pxl-post-title.box',
                        ),
                        array(
                            'name' => 'content_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-content, {{WRAPPER}} .pxl-post-custom .pxl-post-title.box',
                        ),
                        array(
                            'name'         => 'content_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-post-custom .pxl-post-content, {{WRAPPER}} .pxl-post-custom .pxl-post-title.box',
                        ),
                        array(
                            'name' => 'content_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', '%', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-content, {{WRAPPER}} .pxl-post-custom .pxl-post-title.box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-content, {{WRAPPER}} .pxl-post-custom .pxl-post-title.box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_featured_style',
                    'label' => esc_html__('Post Featured', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout' => ['1'],
                    ],
                    'controls' => array(
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
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-featured' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-custom .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover .pxl-post-featured' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name'     => 'featured_hover_css_filters',
                                            'type'     => \Elementor\Group_Control_Css_Filter::get_type(),
                                            'control_type' => 'group',
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'control_type' => 'group', 
                                            'separator' => 'before',
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name'         => 'featured_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover .pxl-post-featured',
                                        ),
                                        array(
                                            'name' => 'featured_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', '%', 'custom' ],
                                            'control_type' => 'responsive',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-item:hover .pxl-post-featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_shape_style',
                    'label' => esc_html__('Shape', 'agron' ),
                    'tab' => 'style',
                    'condition' => [
                        'layout' => ['3'],
                    ],
                    'controls' => array(
                        array(
                            'name'      => 'shape_color',
                            'label'     => esc_html__('Color', 'agron' ),
                            'type'      => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-custom .pxl-shape' => 'color: {{VALUE}};',
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
                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-title',
                        ),
                        array(
                            'name' => 'title_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-title',
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
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-title' => 'color: {{VALUE}};',
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
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-title:hover' => 'color: {{VALUE}};',
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-title.hover-text-fill' => '--link-color-hover: {{VALUE}};'
                                            ],
                                        ),
                                    ],
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_excerpt_style',
                    'label' => esc_html__('Post Excerpt', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'excerpt_color',
                            'label' => esc_html__('Text Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-excerpt',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_icon',
                    'label' => esc_html__('Post Icon', 'agron'),
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
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-icon' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-icon ' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ), 
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'agron' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-icon' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-icon',
                        ),
                        array(
                            'name' => 'icon_opacity',
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
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-icon' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-icon',
                        ),
                        array(
                            'name'         => 'icon_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'agron' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-post-custom .pxl-post-icon',
                        ),
                        array(
                            'name' => 'icon_border_radius',
                            'label' => esc_html__('Border Radius', 'agron' ),
                            'type' => 'dimensions',
                            'size_units' => [ 'px', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-post-custom .pxl-post-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_button_style',
                    'label' => esc_html__('Post Button', 'agron' ),
                    'tab' => 'style',
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
                                    '{{WRAPPER}} .pxl-post-custom .pxl-post-button' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
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
                                    '{{WRAPPER}} .pxl-post-custom .pxl-post-button' => 'height: {{SIZE}}{{UNIT}};',
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
                                    '{{WRAPPER}} .pxl-post-custom.post-custom-layout3 .pxl-post-button > svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-button' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_inset_border_color',
                                            'label' => esc_html__('Border Inset Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom.post-custom-layout3 .pxl-post-button > svg' => 'color: {{VALUE}};',
                                            ],
                                            'condition' => [
                                                'layout' => ['3'],
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-button',
                                        ),
                                        array(
                                            'name' => 'btn_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-button',
                                        ),
                                        array(
                                            'name'         => 'btn_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-custom .pxl-post-button',
                                        ),
                                        array(
                                            'name' => 'btn_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name' => 'btn_hover_style',
                                            'label' => esc_html__('Hover Style', 'agron' ),
                                            'type' => 'select',
                                            'default' => '',
                                            'options' => [
                                                '' => esc_html__('Default', 'agron'),
                                                'hover-underline-ltr' => esc_html__('Underline Slide LTR', 'agron'),
                                                'hover-underline-rtl' => esc_html__('Underline Slide RTL', 'agron'),
                                                'hover-underline-expand' => esc_html__('Underline Expand', 'agron'),
                                                'hover-underline-split' => esc_html__('Underline Split', 'agron'),
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_color',
                                            'label' => esc_html__('Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-button:hover' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_inset_border_color',
                                            'label' => esc_html__('Border Inset Color', 'agron' ),
                                            'type' => 'color',
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom.post-custom-layout3 .pxl-post-button:hover > svg' => 'color: {{VALUE}};',
                                            ],
                                            'condition' => [
                                                'layout' => ['3'],
                                            ],
                                        ),
                                        array(
                                            'name' => 'btn_hover_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types' => [ 'classic' ],
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-button:hover',
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
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-button' => 'transition: all {{SIZE}}{{UNIT}} linear;'
                                            ]
                                        ),
                                        array(
                                            'name' => 'btn_hover_border',
                                            'type' => \Elementor\Group_Control_Border::get_type(),
                                            'separator' => 'before',
                                            'control_type' => 'group', 
                                            'selector' => '{{WRAPPER}} .pxl-post-custom .pxl-post-button:hover',
                                        ),
                                        array(
                                            'name'         => 'btn_hover_box_shadow',
                                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                            'control_type' => 'group',
                                            'selector'     => '{{WRAPPER}} .pxl-post-custom .pxl-post-button:hover',
                                        ),
                                        array(
                                            'name' => 'btn_hover_border_radius',
                                            'label' => esc_html__('Border Radius', 'agron' ),
                                            'type' => 'dimensions',
                                            'size_units' => [ 'px', 'custom' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                                '{{WRAPPER}} .pxl-post-custom .pxl-post-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        'selectors' => '{{WRAPPER}} .pxl-swiper .swiper-slide',
                    ]),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);