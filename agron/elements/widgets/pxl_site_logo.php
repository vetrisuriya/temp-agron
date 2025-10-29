<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_site_logo',
        'title' => esc_html__('Case Site Logo', 'agron' ),
        'icon' => 'eicon-site-logo',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_logo_content',
                    'label' => esc_html__('Site Logo', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'logo_img',
                            'label' => esc_html__('Logo', 'agron' ),
                            'type' => 'media',
                        ),
                        array(
                            'name' => 'logo_link',
                            'label' => esc_html__('Link', 'agron' ),
                            'type' => 'url',
                            'default' => [
                                'url' => home_url('/'),
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
                                '{{WRAPPER}} .elementor-widget-container' => 'justify-content: {{VALUE}};'
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_logo_style',
                    'label' => esc_html__('Logo', 'agron' ),
                    'tab' => 'style',
                    'controls' => array(
                        array(
                            'name' => 'logo_width',
                            'label' => esc_html__('Width', 'agron' ),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-site-logo img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'logo_max_width',
                            'label' => esc_html__('Max Width', 'agron' ),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-site-logo img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'logo_height',
                            'label' => esc_html__('Height', 'agron' ),
                            'type' => 'slider',
                            'size_units' => ['px', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-site-logo img' => 'height: {{SIZE}}{{UNIT}}; width: auto;',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);