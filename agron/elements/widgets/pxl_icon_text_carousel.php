<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_text_carousel',
        'title' => esc_html__('Case Icon Text Carousel', 'agron' ),
        'icon' => 'eicon-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'agron-swiper',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_icon_text_carousel_content',
                    'label' => esc_html__('Icon Text Carousel', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'agron' ),
                            'type' => 'repeater',
                            'controls' => array(
                                array(
                                    'name' => 'layout_style',
                                    'label' => esc_html__('Layout Style', 'agron'),
                                    'type' => 'select',
                                    'options' => [
                                        ''  => esc_html__('Default', 'agron'),
                                        'style1'  => esc_html__('Style 1', 'agron'),
                                    ],
                                    'default' => 'default',
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
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'agron'),
                                    'type' => 'text',
                                    'label_block' => true,
                                ),
                                array( 
                                    'name' => 'link_url',
                                    'label' => esc_html__('Link URL', 'agron' ),
                                    'type' => 'url',
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{text}}}',
                            'default' => [
                                [
                                    '_icon' =>  [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/06/blueberry.svg'), 
                                            'id' => 4237, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'text' => esc_html__('Blueberry', 'agron')
                                ],
                                [
                                    '_icon' =>  [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/06/strawberry.svg'), 
                                            'id' => 4241, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'text' => esc_html__('Blueberry', 'agron')
                                ],
                                [
                                    '_icon' =>  [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/06/cabbage-1.svg'), 
                                            'id' => 4238, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'text' => esc_html__('Blueberry', 'agron')
                                ],
                                [
                                    '_icon' =>  [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/06/ogange.svg'), 
                                            'id' => 4240, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'text' => esc_html__('Blueberry', 'agron')
                                ],
                                [
                                    '_icon' =>  [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/06/apples.svg'), 
                                            'id' => 4235, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'text' => esc_html__('Blueberry', 'agron')
                                ],
                                [
                                    '_icon' =>  [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/06/banana.svg'), 
                                            'id' => 4236, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'text' => esc_html__('Blueberry', 'agron')
                                ],
                                [
                                    '_icon' =>  [
                                        'value' => [
                                            'url' => content_url('/uploads/2025/06/eggplant.svg'), 
                                            'id' => 4239, 
                                        ],
                                        'library' => 'svg',
                                    ],
                                    'text' => esc_html__('Blueberry', 'agron')
                                ]
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_swiper_additional_opts',
                    'label' => esc_html__('Additional Options', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        swiper_controls_options(),
                    )
                ),
            ),
        ),
    ),
    agron_get_class_widget_path(),
);