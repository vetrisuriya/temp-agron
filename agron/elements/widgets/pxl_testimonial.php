<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial',
        'title' => esc_html__('Case Testimonial', 'agron'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_testimonial_content',
                    'label' => esc_html__('Testimonial', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'content',
                            'label' => esc_html__('Content', 'agron'),
                            'type' => 'textarea',
                            'rows' => 10,
                            'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'agron'),
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'agron' ),
                            'type' => 'media',
                        ),
                        array(
                            'name' => 'name',
                            'label' => esc_html__('Name', 'agron'),
                            'type' => 'text',
                            'default' => esc_html__('Name here', 'agron'),
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'agron'),
                            'type' => 'text',
                            'default' => esc_html__('Position/City...', 'agron')
                        ),
                        array(
                            'name' => 'rating',
                            'label' => esc_html__('Rating', 'agron'),
                            'type' => 'number',
                            'min' => 0,
                            'max' => 10,
                            'default' => 5,
                        ),
                        array(
                            'name' => '_icon',
                            'label' => esc_html__('Icon', 'agron' ),
                            'type' => 'icons',
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => [
                                    'url' => content_url('/uploads/2025/05/chat-bubble.svg'), 
                                    'id' => 600, 
                                ],
                                'library' => 'svg',
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link URL', 'agron' ),
                            'type' => 'url',
                        ),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);