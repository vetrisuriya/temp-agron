<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_countdown',
        'title' => esc_html__('Case Countdown', 'agron' ),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'agron-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'agron' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'agron' ),
                            'type' => 'text',
                            'label_block' => true,
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', 'agron'),
                        ),
                    ),
                ),
            ),
        ),
    ),
    agron_get_class_widget_path()
);