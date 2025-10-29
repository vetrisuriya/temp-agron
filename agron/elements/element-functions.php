<?php 

/**
 * Swipper Lib
*/
if(!function_exists('agron_elements_scripts')){
    add_action( 'wp_enqueue_scripts', 'agron_elements_scripts');
    function agron_elements_scripts() {  
        $theme = wp_get_theme( get_template() );
        wp_register_script('agron-animated', get_template_directory_uri() . '/elements/assets/js/animated.js', [ 'jquery' ], $theme->get( 'Version' ), true);

        // wp_register_script( 'pxl-nice-scroll', get_template_directory_uri() . '/assets/js/libs/nice-scroll.min.js', array( 'jquery' ), '3.7.6', true );
        wp_register_script( 'agron-layout', get_template_directory_uri() . '/elements/assets/js/layout.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true );
        wp_register_script('agron-counter', get_template_directory_uri() . '/elements/assets/js/counter.js', [ 'jquery'], $theme->get( 'Version' ), true);

        wp_register_script('pxl-post-grid', get_template_directory_uri() . '/elements/assets/js/grid.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
        wp_localize_script('pxl-post-grid', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'wpnonce' => wp_create_nonce( '_ajax_nonce' ) ) );
        wp_register_script('agron-accordion', get_template_directory_uri() . '/elements/assets/js/accordion.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('agron-tabs', get_template_directory_uri() . '/elements/assets/js/tabs.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('agron-countdown', get_template_directory_uri() . '/elements/assets/js/countdown.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_enqueue_script('agron-elementor', get_template_directory_uri() . '/elements/assets/js/elementor.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        // New add
        wp_register_script('agron-pie-chart', get_template_directory_uri() . '/elements/assets/js/pie-chart.js', [ 'jquery', 'easy-pie-chart' ], $theme->get( 'Version' ), true);
        wp_register_script('agron-parallax', get_template_directory_uri() . '/elements/assets/js/parallax.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('agron-effects', get_template_directory_uri() . '/elements/assets/js/effects.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('agron-swiper', get_template_directory_uri() . '/elements/assets/js/swiper.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    }
}

/**
 * Get class widget path
*/
if(!function_exists('agron_get_class_widget_path')){
    function agron_get_class_widget_path(){
        $upload_dir = wp_upload_dir();
        $cls_path = $upload_dir['basedir'].'/elementor-widget/';
        if(!is_dir($cls_path)) {
            wp_mkdir_p( $cls_path );
        }
        return $cls_path;
    }
}

/**
 * Get post type options
*/
function agron_get_post_type_options($pt_supports=[]){
    $post_types = get_post_types([
        'public'   => true,
    ], 'objects');
    $excluded_post_type = [
        'page',
        'attachment',
        'revision',
        'nav_menu_item',
        'custom_css',
        'customize_changeset',
        'oembed_cache',
        'e-landing-page',
        'header',
        'footer',
        'mega-menu',
        'elementor_library'
    ];

    $result_some = [];
    $result_any = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $post_type) {
        if (!$post_type instanceof WP_Post_Type)
            continue;
        if (in_array($post_type->name, $excluded_post_type))
            continue;

        if(!empty($pt_supports) && in_array($post_type->name, $pt_supports)){
            $result_some[$post_type->name] = $post_type->labels->singular_name;
        }else{
            $result_any[$post_type->name] = $post_type->labels->singular_name;
        }
    }

    if(!empty($pt_supports))
        return $result_some;
    else   
        return $result_any;
}

// 
function agron_get_post_layout($pt_supports = [], $condition = []) {
    $post_types  = agron_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $condition['post_type'] = [$name];
        $result[] = array(
            'name'     => 'layout_'.$name,
            'label'    => sprintf(esc_html__( 'Select Template of %s', 'agron' ), $label),
            'type'     => 'layoutcontrol',
            'default' => $name.'-1',
            'options'  => agron_get_layout_options($name),
            'condition' => $condition,
        );
    }
    return $result;  
}
function agron_get_layout_options($post_type){
    $option_layouts = [];
    switch ($post_type) {
        case 'project':
            $option_layouts = [
                'project-1' => [
                    'label' => esc_html__( 'Project 1', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/project-1.webp'
                ],
                'project-2' => [
                    'label' => esc_html__( 'Project 2', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/project-2.webp'
                ],
                'project-3' => [
                    'label' => esc_html__( 'Project 3', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/project-3.webp'
                ]
            ];
            break;
        case 'post':  
            $option_layouts = [
                'post-1' => [
                    'label' => esc_html__( 'Post 1', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-1.webp'
                ],
                'post-2' => [
                    'label' => esc_html__( 'Post 2', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-2.webp'
                ],
                'post-3' => [
                    'label' => esc_html__( 'Post 3', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-3.webp'
                ],
                'post-4' => [
                    'label' => esc_html__( 'Post 4', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-4.webp'
                ],
                'post-5' => [
                    'label' => esc_html__( 'Post 5', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-5.webp'
                ],
                'post-6' => [
                    'label' => esc_html__( 'Post 6', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-6.webp'
                ],
                'post-7' => [
                    'label' => esc_html__( 'Post 7', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/post-7.webp'
                ],
            ];
            break;
        case 'service':
            $option_layouts = [
                'service-1' => [
                    'label' => esc_html__( 'Service 1', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/service-1.webp'
                ],
                'service-2' => [
                    'label' => esc_html__( 'Service 2', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/service-2.webp'
                ],
                'service-3' => [
                    'label' => esc_html__( 'Service 3', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/service-3.webp'
                ],
                'service-4' => [
                    'label' => esc_html__( 'Service 4', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/service-4.webp'
                ],
                'service-5' => [
                    'label' => esc_html__( 'Service 5', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/service-5.webp'
                ],
                'service-6' => [
                    'label' => esc_html__( 'Service 6', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/service-6.webp'
                ],
                'service-7' => [
                    'label' => esc_html__( 'Service 7', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/service-7.webp'
                ],
                'service-8' => [
                    'label' => esc_html__( 'Service 8', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/service-8.webp'
                ],
            ];
            break;
        case 'team':
            $option_layouts = [
                'team-1' => [
                    'label' => esc_html__( 'Team 1', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/team-1.webp'
                ],
                'team-2' => [
                    'label' => esc_html__( 'Team 2', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/team-2.webp'
                ],
            ];
            break;
        case 'product':
            $option_layouts = [
                'product-1' => [
                    'label' => esc_html__( 'Product 1', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/product-1.webp'
                ],
                'product-2' => [
                    'label' => esc_html__( 'Product 2', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/product-2.webp'
                ],
                'product-3' => [
                    'label' => esc_html__( 'Product 3', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/product-3.webp'
                ],
                'product-4' => [
                    'label' => esc_html__( 'Product 4', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/product-4.webp'
                ],
                'product-5' => [
                    'label' => esc_html__( 'Product 5', 'agron' ),
                    'image' => get_template_directory_uri() . '/elements/assets/img-layouts/product-5.webp'
                ],
            ];
            break;

    }
    return $option_layouts;
}

function agron_get_term_by_post_type($pt_supports = [], $args=[]){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]); 
    $post_types  = agron_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
         
        $taxonomy = get_object_taxonomies($name, 'names');
        
        if($name == 'post') $taxonomy = ['category'];

        $result[] = array(
            'name'     => 'source_'.$name,
            'label'    => sprintf(esc_html__( 'Select Term of %s', 'agron' ), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'  => pxl_get_grid_term_options($name,$taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }
    return $result;
}

function agron_get_ids_by_post_type($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = agron_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $posts = agron_list_post($name, false);
 
        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'agron'), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }
    return $result;
}

function agron_get_term_by_post_type_custom($pt_supports = [], $args = []) {
    $args = wp_parse_args($args, ['condition' => 'post_type_custom', 'custom_condition' => []]); 
    $post_types  = agron_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $taxonomy = ($name == 'post') ? ['category'] : get_object_taxonomies($name, 'names');
        $result[] = array(
            'name'     => 'source_'.$name,
            'label'    => sprintf(esc_html__( 'Select Term of %s', 'agron' ), $label),
            'type'     => 'select2',
            'multiple' => true,
            'options'  => pxl_get_grid_term_options($name,$taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }
    return $result;
}

function agron_get_ids_by_post_type_custom($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type_custom', 'custom_condition' => []]);
    $post_types = agron_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        if($name === 'current') {
            $posts = agron_list_post(get_post_type(), false);
        }else {
            $posts = agron_list_post($name, false);
        }
 
        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'agron'), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }
    return $result;
}
/**
 * Animation List
*/
function agron_entrance_anim($type = 'normal') {
    $options =  [
        [
            'label' => esc_html__( 'None', 'agron' ),
            'options' => [
                '' => esc_html__( 'None', 'agron' ),
            ],
        ],
        [
            'label' => esc_html__( 'Fading', 'agron' ),
            'options' => [
                'wow fadeIn'       => esc_html__( 'Fade In', 'agron' ),
                'wow fadeInUp'     => esc_html__( 'Fade In Up', 'agron' ),
                'wow fadeInRight'  => esc_html__( 'Fade In Right', 'agron' ),
                'wow fadeInDown'   => esc_html__( 'Fade In Down', 'agron' ),
                'wow fadeInLeft'   => esc_html__( 'Fade In Left', 'agron' ),
            ],
        ],
        [
            'label' => esc_html__( 'Zooming', 'agron' ),
            'options' => [
                'wow zoomIn'       => esc_html__( 'Zoom In', 'agron' ),
                'wow zoomInUp'     => esc_html__( 'Zoom In Up', 'agron' ),
                'wow zoomInRight'  => esc_html__( 'Zoom In Right', 'agron' ),
                'wow zoomInDown'   => esc_html__( 'Zoom In Down', 'agron' ),
                'wow zoomInLeft'   => esc_html__( 'Zoom In Left', 'agron' ),
                'wow zoomInUpLeft' => esc_html__( 'Zoom In Up Left', 'agron' ),
                'wow zoomInUpRight'=> esc_html__( 'Zoom In Up Right', 'agron' ),
                'wow zoomInDownLeft'=> esc_html__( 'Zoom In Down Left', 'agron' ),
                'wow zoomInDownRight'=> esc_html__( 'Zoom In Down Right', 'agron' ),
            ],
        ],
        [
            'label' => esc_html__( 'Bouncing', 'agron' ),
            'options' => [
                'wow bounceIn'       => esc_html__( 'Bounce In', 'agron' ),
                'wow bounceInUp'     => esc_html__( 'Bounce In Up', 'agron' ),
                'wow bounceInRight'  => esc_html__( 'Bounce In Right', 'agron' ),
                'wow bounceInDown'   => esc_html__( 'Bounce In Down', 'agron' ),
                'wow bounceInLeft'   => esc_html__( 'Bounce In Left', 'agron' ),
            ],
        ],
        [
            'label' => esc_html__( 'Reveal', 'agron' ),
            'options' => [
                'wow revealIn'       => esc_html__( 'Reveal In', 'agron' ),
                'wow revealInUp'     => esc_html__( 'Reveal In Up', 'agron' ),
                'wow revealInRight'  => esc_html__( 'Reveal In Right', 'agron' ),
                'wow revealInDown'   => esc_html__( 'Reveal In Down', 'agron' ),
                'wow revealInLeft'   => esc_html__( 'Reveal In Left', 'agron' ),
                'wow revealInVertical' => esc_html__('Reveal In Vertical', 'agron'),
                'wow revealInHorizontal' => esc_html__('Reveal In Horizontal', 'agron'),
                'wow revealCircle'   => esc_html__('Reveal Circle', 'agron')
            ],
        ],
    ];
    if($type === 'image') {
        $options = array_merge(
            $options, 
            [
                [
                    'label' => esc_html__( 'Reveal Image', 'agron' ),
                    'options' => [
                        'wow revealImageIn'       => esc_html__( 'Reveal In', 'agron' ),
                        'wow revealImageInUp'     => esc_html__( 'Reveal In Up', 'agron' ),
                        'wow revealImageInRight'  => esc_html__( 'Reveal In Right', 'agron' ),
                        'wow revealImageInDown'   => esc_html__( 'Reveal In Down', 'agron' ),
                        'wow revealImageInLeft'   => esc_html__( 'Reveal In Left', 'agron' ),
                        'wow revealImageInVertical' => esc_html__('Reveal In Vertical', 'agron'),
                        'wow revealImageInHorizontal' => esc_html__('Reveal In Horizontal', 'agron'),
                        'wow revealImageCircle'   => esc_html__('Reveal Circle', 'agron')
                    ],
                ],
            ],
        );
    }
    if($type === 'text') {
        $options = array_merge(
            $options, 
            [
                [
                    'label' => esc_html__( 'Gsap Animate', 'agron' ),
                    'options' => [
                        'text-animated text-fade-in'       => esc_html__('Fade In', 'agron'),
                        'text-animated text-fade-in-up'    => esc_html__('Fade In Up', 'agron'),
                        'text-animated text-fade-in-right' => esc_html__('Fade In Right', 'agron'),
                        'text-animated text-fade-in-down'  => esc_html__('Fade In Down', 'agron'),
                        'text-animated text-fade-in-left'  => esc_html__('Fade In Left', 'agron'),
                        'text-animated text-explosion'     => esc_html__('Explosion', 'agron'),
                        'text-animated text-zigzag-zoom'   => esc_html__('Zigzag Zoom', 'agron'),
                        'text-animated text-flip-x'        => esc_html__('Flip X', 'agron'),
                        'text-animated text-flip-y'        => esc_html__('Flip Y', 'agron'),
                        'text-animated text-zoom-in'        => esc_html__('Zoom In', 'agron'),
                    ],
                ],
            ],
        );
    }
    if($type === 'slider') {
        $options = array_merge(
            $options, 
            [
                [
                    'label' => esc_html__( 'Gsap Animate', 'agron' ),
                    'options' => [
                        'text1'       => esc_html__('Effect 1', 'agron'),
                        'text2'       => esc_html__('Effect 2', 'agron'),
                        'text3'       => esc_html__('Effect 3', 'agron'),
                        'text4'       => esc_html__('Effect 4', 'agron'),
                    ],
                ],
            ],
        );
    }
    return $options;
}
function agron_exit_animation() {
    $options = [
        '' => 'None',
    ];
    return $options;
}

// Custom New
// Render link to elementor option
if(!function_exists('agron_get_link_attributes')){
    function agron_get_link_attributes($link) {
        $ouput = null;
        if (isset($link['url']) && !empty($link['url'])) {
            $ouput = 'href="' . esc_url($link['url']) . '"';
            if ($link['is_external']) {
                $ouput .= ' target="_blank"';
            }
            if ($link['nofollow']) {
                $ouput .= ' rel="nofollow"';
            }
            if (!empty($link['custom_attributes'])) {
                $custom_attributes = explode(',', $link["custom_attributes"]);
                foreach ($custom_attributes as $attr) {
                    list($key, $value) = explode('|', $attr);
                    $ouput .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
                }
            }
        }
        return $ouput;
    }
}

if (!function_exists('agron_get_animation_options')) {
    function agron_get_animation_options($args = []) {
        $prefix    = isset($args['prefix'])     ? $args['prefix'] . '_' : '';
        $condition = isset($args['condition'])  ? $args['condition']  : [];
        $selectors = isset($args['selectors'])  ? $args['selectors'] : null;
        $type      = isset($args['type'])       ? $args['type'] : 'normal';
        $options = [
            array(
                'name' => $prefix.'entrance_anim',
                'label' => esc_html__('Entrance Animation', 'agron'),
                'type' => 'select',
                'groups' => agron_entrance_anim($type),
                'default' => '',
                'condition' => $condition,
            ),
            array(
                'name' => $prefix.'anim_duration',
                'label' => esc_html__('Animation Duration(ms)', 'agron'),
                'type' => 'number',
                'default' => 1000,
                'selectors' => [
                    $selectors => 'animation-duration: {{VALUE}}ms;-webkit-animation-duration: {{VALUE}}ms;',
                ],
                'control_type' => 'responsive',
                'condition' => array_merge(
                    $condition,
                    [
                        $prefix.'entrance_anim!' => ['text-animated', '']
                    ]
                ),
            ),
            array(
                'name' => $prefix.'anim_delay',
                'label' => esc_html__('Animation Delay(ms)', 'agron'),
                'type' => 'number',
                'control_type' => 'responsive',
                'default' => 0,
                'selectors' => [
                    $selectors => 'animation-delay: {{VALUE}}ms;-webkit-animation-delay: {{VALUE}}ms;',
                ],
                'condition' => array_merge(
                    $condition,
                    [
                        $prefix.'entrance_anim!' => ['text-animated', '']
                    ]
                ),
            ), 
        ];
        if($type === 'text') {
            $options = array_merge(
                $options, 
                [
                    [
                        'name' => $prefix . 'split_type',
                        'label' => esc_html__('Animation On', 'agron'),
                        'type' => 'select',
                        'options' => [
                            'lines' => esc_html__('Lines', 'agron'),
                            'words' => esc_html__('Words', 'agron'),
                            'chars' => esc_html__('Chars', 'agron'),
                        ],
                        'default' => 'chars',
                        'condition' => $condition,
                        'description' => esc_html__('This option only applies to gsap animate', 'agron'),
                    ],
                ],
            );
        }
        return $options;
    }
}


if (!function_exists('agron_get_additional_animation_options')) {
    function agron_get_additional_animation_options($args=[]) {
        $prefix    = isset($args['prefix'])    ? $args['prefix'] . '_' : '';
        $condition = isset($args['condition']) ? $args['condition']    : [];
        $options = [
            [
                'name' => $prefix . 'text_split_type',
                'label' => esc_html__('Animation On', 'agron'),
                'type' => 'select',
                'options' => [
                    'lines' => esc_html__('Lines', 'agron'),
                    'words' => esc_html__('Words', 'agron'),
                    'chars' => esc_html__('Chars', 'agron'),
                ],
                'default' => 'lines',
                'condition' => $condition,
            ],
            [
                'name' => $prefix . 'text_entrance_anim',
                'label' => esc_html__('Text Animation', 'agron'),
                'type' => 'select',
                'options' => [
                    '' => esc_html__('None', 'agron'),
                    'text-animated text-fade-in'       => esc_html__('Fade In', 'agron'),
                    'text-animated text-fade-in-up'    => esc_html__('Fade In Up', 'agron'),
                    'text-animated text-fade-in-right' => esc_html__('Fade In Right', 'agron'),
                    'text-animated text-fade-in-down'  => esc_html__('Fade In Down', 'agron'),
                    'text-animated text-fade-in-left'  => esc_html__('Fade In Left', 'agron'),
                    'text-animated text-explosion'     => esc_html__('Explosion', 'agron'),
                    'text-animated text-zigzag-zoom'   => esc_html__('Zigzag Zoom', 'agron'),
                    'text-animated text-flip-x'        => esc_html__('Flip X', 'agron'),
                    'text-animated text-flip-x'        => esc_html__('Flip X', 'agron'),
                    'text-animated text-flip-y'        => esc_html__('Flip Y', 'agron'),
                ],
                'default' => '',
                'condition' => $condition,
            ],
        ];

        return $options;
    }
}

// Element Position Options
if(!function_exists('agron_position_options')) {
    function agron_position_options($args = []) {
        $prefix = isset($args['prefix']) ? $args['prefix'].'_' : '';
        $condition = isset($args['condition']) ? $args['condition'] : [];
        $selector = isset($args['selector']) ? $args['selector'] : '';
        $options = [
            [
                'name' => $prefix.'popover_toggle_position',
                'label' => esc_html__( 'Position', 'agron' ),
                'type' => 'popover_toggle',
                'default' => '',
                'condition' => $condition,
            ],
            [
                'name' => $prefix.'pxl_start_popover',
                'type' => 'pxl_start_popover',
            ],
            [
                'name' => $prefix.'offset_t',
                'label' => esc_html__('Top', 'agron' ),
                'type' => 'slider',
                'size_units' => [ 'px', 'custom' ],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    $selector => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => $condition,
            ],
            [
                'name' => $prefix.'offset_r' ,
                'label' => esc_html__('Right', 'agron' ),
                'type' => 'slider',
                'size_units' => [ 'px', 'custom' ],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    $selector => 'right: {{SIZE}}{{UNIT}};',
                ],
                'condition' => $condition,
            ],
            [
                'name' => $prefix.'offset_b' ,
                'label' => esc_html__('Bottom', 'agron' ),
                'type' => 'slider',
                'size_units' => [ 'px', 'custom' ],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    $selector => 'bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => $condition,
            ],
            [
                'name' => $prefix.'offset_l' ,
                'label' => esc_html__('Left', 'agron' ),
                'type' => 'slider',
                'size_units' => [ 'px', 'custom' ],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    $selector => 'left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => $condition,
            ],
            [
                'name' => $prefix.'pxl_end_popover',
                'type' => 'pxl_end_popover',
            ],
        ];
        return $options;
    }
}

// Get Icon Service
function agron_get_service_icon($post_id) {
    global $wp_filesystem;
    if(!isset($post_id) || empty($post_id)) return;
    $icon_content = '';
    $svg = get_post_meta($post_id, 'service_svg', true); 

    if (empty($svg)) return;
    
    if((pathinfo($svg['url'], PATHINFO_EXTENSION) === 'svg')) {
        $icon_urls = explode('uploads', $svg['url']);
        $upload_dir = wp_upload_dir();
        $icon_path = $upload_dir['basedir']. $icon_urls[1] ;
        $icon_content = $wp_filesystem->get_contents( $icon_path );
    }else {
        $icon_content = agron_get_image_by_size([
            'img_id' => $svg['id'] ?? 0,
            'img_dimension' => 'full',
            'attr' => [
                'class' => 'service-icon',
            ],
        ]);
    }
    return $icon_content;
}

// Get SVG Content
function agron_get_svg( $id_or_url ) {
    $svg = '';
    if ( is_numeric( $id_or_url ) ) {
        $file_path = get_attached_file( $id_or_url );
        if ( $file_path && file_exists( $file_path ) ) {
            $svg = file_get_contents( $file_path );
        }
    } else {
        $file_path = str_replace( wp_get_upload_dir()['baseurl'], wp_get_upload_dir()['basedir'], $id_or_url );
        if ( $file_path && file_exists( $file_path ) ) {
            $svg = file_get_contents( $file_path );
        } else {
            $svg = @file_get_contents( $id_or_url );
        }
    }
    return $svg ? $svg : '';
}


// Get team social 
function agron_get_team_social($post_id = null, $class = null) {
    if(is_null($post_id)) return;
    $social = get_post_meta($post_id, 'team_social', true);
    $output = null;
    if(!empty($social) && is_array($social)) {
        foreach($social as $key => $value) {
            switch($value) {
                case '_facebook' :
                    $output .= '<span class="pxl-social-item" >
                                    <a class="pxl-social-link '.$class.'" href="'.get_post_meta($post_id, 'link_social_facebook', true).'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <g clip-path="url(#clip0_129_26496)">
                                            <path d="M5.67774 10.5965H7.68215V18.8483C7.68215 19.0112 7.81416 19.1433 7.97708 19.1433H11.3756C11.5385 19.1433 11.6706 19.0112 11.6706 18.8483V10.6354H13.9748C14.1246 10.6354 14.2507 10.523 14.2678 10.3741L14.6177 7.33623C14.6274 7.25265 14.6009 7.16895 14.545 7.10625C14.489 7.04348 14.4089 7.00756 14.3248 7.00756H11.6707V5.10325C11.6707 4.5292 11.9798 4.2381 12.5894 4.2381C12.6763 4.2381 14.3248 4.2381 14.3248 4.2381C14.4877 4.2381 14.6197 4.10603 14.6197 3.94317V1.15466C14.6197 0.991738 14.4877 0.859726 14.3248 0.859726H11.9332C11.9164 0.858901 11.8789 0.857544 11.8237 0.857544C11.4087 0.857544 9.96633 0.939004 8.82695 1.98719C7.56453 3.14874 7.74002 4.53952 7.78196 4.78066V7.0075H5.67774C5.51482 7.0075 5.38281 7.13951 5.38281 7.30243V10.3015C5.38281 10.4644 5.51482 10.5965 5.67774 10.5965Z" fill="currentcolor"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_129_26496">
                                            <rect width="18.2857" height="18.2857" fill="currentcolor" transform="translate(0.857422 0.857544)"/>
                                            </clipPath>
                                        </defs>
                                        </svg>
                                    </a>
                                </span>';
                    break;
                case '_x' :
                    $output .= '<span class="pxl-social-item">
                                    <a class="pxl-social-link '.$class.'" href="'.get_post_meta($post_id, 'link_social_x', true).'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M6.95247 2.38098H1.61914L7.91313 10.773L1.96196 17.619H3.98103L8.84832 12.0198L13.0477 17.6191H18.381L11.8223 8.87416L17.4668 2.38098H15.4478L10.8872 7.62729L6.95247 2.38098ZM13.8096 16.0953L4.66676 3.90479H6.19057L15.3334 16.0953H13.8096Z" fill="currentcolor"/>
                                        </svg>
                                    </a>
                                </span>';
                    break;
                case '_instagram' :
                    $output .= '<span class="pxl-social-item">
                                    <a class="pxl-social-link '.$class.'" href="'.get_post_meta($post_id, 'link_social_instagram', true).'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0011 14.5718C12.5258 14.5718 14.5725 12.5251 14.5725 10.0004C14.5725 7.47565 12.5258 5.42896 10.0011 5.42896C7.47638 5.42896 5.42969 7.47565 5.42969 10.0004C5.42969 12.5251 7.47638 14.5718 10.0011 14.5718ZM10.0011 13.048C11.6842 13.048 13.0487 11.6835 13.0487 10.0004C13.0487 8.31723 11.6842 6.95276 10.0011 6.95276C8.31796 6.95276 6.9535 8.31723 6.9535 10.0004C6.9535 11.6835 8.31796 13.048 10.0011 13.048Z" fill="currentcolor"/>
                                            <path d="M14.5705 4.66711C14.1497 4.66711 13.8086 5.00823 13.8086 5.42902C13.8086 5.8498 14.1497 6.19092 14.5705 6.19092C14.9913 6.19092 15.3324 5.8498 15.3324 5.42902C15.3324 5.00823 14.9913 4.66711 14.5705 4.66711Z" fill="currentcolor"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.11935 4.11629C1.62109 5.09417 1.62109 6.37429 1.62109 8.93453V11.0679C1.62109 13.6281 1.62109 14.9082 2.11935 15.8861C2.55763 16.7463 3.25696 17.4456 4.11714 17.8839C5.09502 18.3821 6.37514 18.3821 8.93538 18.3821H11.0687C13.6289 18.3821 14.9091 18.3821 15.8869 17.8839C16.7471 17.4456 17.4465 16.7463 17.8847 15.8861C18.383 14.9082 18.383 13.6281 18.383 11.0679V8.93453C18.383 6.37429 18.383 5.09417 17.8847 4.11629C17.4465 3.25611 16.7471 2.55677 15.8869 2.11849C14.9091 1.62024 13.6289 1.62024 11.0687 1.62024H8.93538C6.37514 1.62024 5.09502 1.62024 4.11714 2.11849C3.25696 2.55677 2.55763 3.25611 2.11935 4.11629ZM11.0687 3.14405H8.93538C7.63011 3.14405 6.74281 3.14524 6.05696 3.20127C5.38889 3.25585 5.04726 3.35478 4.80893 3.47622C4.23548 3.76841 3.76926 4.23463 3.47707 4.80808C3.35564 5.0464 3.2567 5.38804 3.20212 6.05611C3.14609 6.74195 3.1449 7.62926 3.1449 8.93453V11.0679C3.1449 12.3732 3.14609 13.2604 3.20212 13.9463C3.2567 14.6144 3.35564 14.956 3.47707 15.1943C3.76926 15.7677 4.23548 16.234 4.80893 16.5261C5.04726 16.6476 5.38889 16.7466 6.05696 16.8011C6.74281 16.8571 7.63011 16.8583 8.93538 16.8583H11.0687C12.374 16.8583 13.2612 16.8571 13.9471 16.8011C14.6152 16.7466 14.9569 16.6476 15.1952 16.5261C15.7686 16.234 16.2348 15.7677 16.527 15.1943C16.6484 14.956 16.7474 14.6144 16.802 13.9463C16.858 13.2604 16.8592 12.3732 16.8592 11.0679V8.93453C16.8592 7.62926 16.858 6.74195 16.802 6.05611C16.7474 5.38804 16.6484 5.0464 16.527 4.80808C16.2348 4.23463 15.7686 3.76841 15.1952 3.47622C14.9569 3.35478 14.6152 3.25585 13.9471 3.20127C13.2612 3.14524 12.374 3.14405 11.0687 3.14405Z" fill="currentcolor"/>
                                        </svg>
                                    </a>
                                </span>';
                    break;
                case '_pinterest' :
                    $output .= '<span class="pxl-social-item">
                                    <a class="pxl-social-link '.$class.'" href="'.get_post_meta($post_id, 'link_social_pinterest', true).'">
                                        <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.92789 0.801032C12.5998 0.801032 15.9591 3.34009 15.9591 7.20728C15.9591 10.8401 14.0841 14.9026 9.94352 14.9026C8.92789 14.9026 7.71695 14.3948 7.20914 13.4963C6.34977 17.012 6.38883 17.5588 4.43571 20.2541C4.24039 20.3323 4.27946 20.3323 4.16227 20.176C4.08414 19.4338 4.00602 18.7307 4.00602 17.9885C4.00602 15.6057 5.09977 12.1292 5.64664 9.82447C5.33414 9.19947 5.25602 8.49634 5.25602 7.83228C5.25602 4.70728 8.92789 4.23853 8.92789 6.81665C8.92789 8.34009 7.8732 9.7854 7.8732 11.2698C7.8732 12.2463 8.73258 12.9495 9.70914 12.9495C12.4045 12.9495 13.2248 9.08228 13.2248 7.01197C13.2248 4.23853 11.2716 2.71509 8.57633 2.71509C5.49039 2.71509 3.10758 4.94166 3.10758 8.06665C3.10758 9.59009 4.04508 10.3713 4.04508 10.7229C4.04508 11.0354 3.81071 12.0901 3.42008 12.0901C2.48258 12.0901 0.959145 10.5276 0.959145 7.79322C0.959145 3.45728 4.90446 0.801032 8.92789 0.801032Z" fill="currentcolor"/>
                                        </svg>
                                    </a>
                                </span>';
                    break;
                case '_youtube' :
                    $output .= '<span class="pxl-social-item">
                                    <a class="pxl-social-link '.$class.'" href="'.get_post_meta($post_id, 'link_social_pinterest', true).'">
                                        <svg width="23" height="17" viewBox="0 0 23 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.4302 2.80839C22.9302 4.55839 22.9302 8.30839 22.9302 8.30839C22.9302 8.30839 22.9302 12.0167 22.4302 13.8084C22.1802 14.8084 21.3885 15.5584 20.4302 15.8084C18.6385 16.2667 11.5552 16.2667 11.5552 16.2667C11.5552 16.2667 4.43018 16.2667 2.63851 15.8084C1.68018 15.5584 0.888509 14.8084 0.638509 13.8084C0.138509 12.0167 0.138509 8.30839 0.138509 8.30839C0.138509 8.30839 0.138509 4.55839 0.638509 2.80839C0.888509 1.80839 1.68018 1.01672 2.63851 0.766723C4.43018 0.266723 11.5552 0.266723 11.5552 0.266723C11.5552 0.266723 18.6385 0.266723 20.4302 0.766723C21.3885 1.01672 22.1802 1.80839 22.4302 2.80839ZM9.22184 11.6834L15.1385 8.30839L9.22184 4.93339V11.6834Z" fill="currentcolor"/>
                                        </svg>
                                    </a>
                                </span>';
                    break;
                case '_linkedin' :
                    break;
                case '_dribbble' :
                    $output .= '<span class="pxl-social-item">
                        <a class="pxl-social-link '.$class.'" href="'.get_post_meta($post_id, 'link_social_pinterest', true).'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.002 18.3821C14.6307 18.3821 18.383 14.6298 18.383 10.0012C18.383 5.37252 14.6307 1.62024 10.002 1.62024C5.37337 1.62024 1.62109 5.37252 1.62109 10.0012C1.62109 14.6298 5.37337 18.3821 10.002 18.3821ZM4.77832 14.4356C3.7628 13.2404 3.15011 11.6924 3.15011 10.0012V9.99952C5.89772 9.97209 8.15493 9.6079 10.1866 8.91769C10.3577 9.28538 10.5237 9.66093 10.6844 10.0442C10.4253 10.13 10.1704 10.2259 9.9196 10.3315C7.90053 11.1813 6.19662 12.6383 4.77832 14.4356ZM5.89244 15.4844C7.03735 16.3439 8.46022 16.8532 10.002 16.8532C10.9307 16.8532 11.8161 16.6684 12.6237 16.3337C12.2625 14.6007 11.794 12.978 11.2413 11.4653C10.9927 11.5451 10.7492 11.6356 10.5108 11.7359C8.74947 12.4773 7.21228 13.784 5.89244 15.4844ZM12.7391 11.1261C13.2385 12.5169 13.669 13.9935 14.015 15.5556C15.3719 14.5736 16.3548 13.1065 16.7092 11.4087C15.2701 11.0365 13.9503 10.9615 12.7391 11.1261ZM12.1792 9.67068C13.6241 9.42306 15.1827 9.47296 16.8529 9.87411C16.827 8.45769 16.3715 7.14627 15.6111 6.06473C14.296 6.99403 12.9945 7.76247 11.6105 8.36613C11.8068 8.79136 11.9965 9.22626 12.1792 9.67068ZM9.50353 7.53907C7.7143 8.12256 5.72812 8.4352 3.32105 8.47342C3.79804 6.37883 5.23476 4.64931 7.14418 3.77187C7.98255 4.90605 8.77789 6.16168 9.50353 7.53907ZM10.9393 6.99642C12.2021 6.45187 13.3899 5.75806 14.595 4.91642C13.3798 3.8181 11.7691 3.14925 10.002 3.14925C9.54597 3.14925 9.10033 3.19381 8.66917 3.27881C9.47656 4.41138 10.2404 5.65065 10.9393 6.99642Z" fill="currentcolor"/>
                            </svg>
                        </a>
                    </span>';
                    break;
                case '_behance' :
                    break;
                    
            }
        }
    }
    return $output;
}
// Image Dimension Options
if(!function_exists('image_dimension_options')) {
    function image_dimension_options($args = []) {
        $condition = isset($args['condition']) ? $args['condition'] : [];
        $options = [
            array(
                'name' => 'img_dimension',
                'label' => esc_html__('Image Dimension', 'agron'),
                'type' => 'select',
                'options' => [
                    ''              => esc_html__('Default', 'agron'),
                    'thumbnail'     => esc_html__('Thumbnail', 'agron'),
                    'thumb'         => esc_html__('Thumb (Alias of Thumbnail)', 'agron'),
                    'medium'        => esc_html__('Medium', 'agron'),
                    'medium_large'  => esc_html__('Medium Large', 'agron'),
                    'large'         => esc_html__('Large', 'agron'),
                    'full'          => esc_html__('Full (Original)', 'agron'),
                    'custom'        => esc_html__('Custom', 'agron'),
                ],
                'default' => '',
                'condition' => $condition,
            ),
            array(
                'name' => 'custom_img_dimension',
                'label' => esc_html__( 'Dimension Custom', 'agron' ),
                'type' => 'image_dimensions',
                'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'agron' ),
                'condition' => array_merge(
                    [
                        'img_dimension' => 'custom',
                    ],
                    $condition
                ),
            ),
        ];
        return $options;
    }
}

// Grid Options
function grid_controls_options($args = []) {
    $filter = isset($args['filter']) ? $args['filter'] : false;
    $condition = isset($args['condition']) ? $args['condition'] : [];
    $selectors = isset($args['selectors']) ? $args['selectors'] : null;
    $options = [];
    $options = 
    array(
        'name' => 'grid_controls',
        'control_type' => 'tab',
        'tabs' => [
            [
                'name' => 'grid_options',
                'label' => esc_html__('Options', 'agron' ),
                'type' => 'tab',
                'controls' => array(
                    array(
                        'name' => 'grid_justify_content',
                        'label' => esc_html__('Justify Content', 'agron'),
                        'type' => 'choose',
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
                            '{{WRAPPER}} .grid .grid-inner' => 'justify-content: {{VALUE}};'
                        ],
                    ),
                    array(
                        'name' => 'grid_spacing_inline',
                        'label' => esc_html__('Column Spacing(px)', 'agron' ),
                        'type' => 'slider',
                        'control_type' => 'responsive',
                        'size_units' => ['px'],
                        'selectors' => [
                            '{{WRAPPER}} .grid .grid-inner' => '--pxl-spacing-inline: {{SIZE}}{{UNIT}};',
                        ],
                    ),
                    array(
                        'name' => 'grid_spacing_block',
                        'label' => esc_html__('Row Spacing(px)', 'agron' ),
                        'type' => 'slider',
                        'control_type' => 'responsive',
                        'size_units' => ['px'],
                        'selectors' => [
                            '{{WRAPPER}} .grid .grid-inner' => '--pxl-spacing-block: {{SIZE}}{{UNIT}};',
                        ],
                    ),
                    array(
                        'name' => 'grid_pagination',
                        'label' => esc_html__('Pagination', 'agron' ),
                        'type' => 'select',
                        'separator' => 'before',
                        'default' => '',
                        'options' => [
                            ''     => esc_html__('Disable', 'agron' ),
                            'pagination' => esc_html__('Pagination', 'agron' ),
                            'loadmore'  => esc_html__('Loadmore', 'agron' ),
                        ],
                    ),
                    array(
                        'name' => 'grid_pagination_justify_content',
                        'label' => esc_html__('Justify Content', 'agron'),
                        'type' => 'choose',
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
                            '{{WRAPPER}} .grid .grid-pagination' => 'justify-content: {{VALUE}};'
                        ],
                        'condition' => [
                            'grid_pagination' => 'pagination',
                        ],
                    ),
                    array(
                        'name' => 'grid_pagination_gap',
                        'label' => esc_html__('Gap', 'agron'),
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
                            '{{WRAPPER}} .grid .grid-pagination' => "gap: {{SIZE}}{{UNIT}};",
                        ],
                        'condition' => [
                            'grid_pagination' => 'pagination',
                        ],
                    ),
                    array(
                        'name' => 'grid_pagination_spacing_top',
                        'label' => esc_html__('Spacing Top', 'agron'),
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
                            '{{WRAPPER}} .pxl-grid .pxl-grid-pagination' => "margin-top: {{SIZE}}{{UNIT}};",
                        ],
                        'condition' => [
                            'grid_pagination' => 'pagination',
                        ],
                    ),
                    array(
                        'name' => 'load_more_style',
                        'label' => esc_html__('Load More Style', 'agron'),
                        'type' => 'select',
                        'options' => [
                            'load-more-button-default' => esc_html__('Default', 'agron'),
                            'pxl-btn-split'            => esc_html__('Split Button', 'agron'),
                        ],
                        'default' => 'load-more-button-default',
                        'condition' => [
                            'grid_pagination' => 'loadmore',
                        ],                            
                    ),
                    array(
                        'name' => 'btn_load_more_justify_content',
                        'label' => esc_html__('Justify Content', 'agron'),
                        'type' => 'choose',
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
                        'condition' => [
                            'grid_pagination' => 'loadmore',
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-button-wrapper' => 'justify-content: {{VALUE}};'
                        ],
                    ),
                    array(
                        'name' => 'load_more_icon',
                        'label' => esc_html__('Load More Icon', 'agron'),
                        'type' => 'icons',
                        'fa4compatibility' => 'icon',
                        'default' => [
                            'value' => [
                                'url' => content_url('/uploads/2025/02/arrow-long-down.svg'),
                                'id'  => 10135
                            ],
                            'library' => 'svg',
                        ],
                        'condition' => [
                            'grid_pagination' => 'loadmore',
                        ],
                    ),
                    array(
                        'name' => 'load_more_text',
                        'type' => 'text',
                        'label' => esc_html__('Load More Text', 'agron'),
                        'condition' => [
                            'grid_pagination' => 'loadmore',
                            'loadmore_style'  => 'pxl-btn-split',
                        ],
                    ),
                    array(
                        'name' => 'loadmore_spacing',
                        'label' => esc_html__('Load More Spacing', 'agron' ),
                        'type' => 'slider',
                        'control_type' => 'responsive',
                        'size_units' => ['px', 'custom'],
                        'range' => [
                            'px' => [
                                'max' => 1000,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-grid .pxl-load-more-wrapper' => 'margin-top: {{SIZE}}{{UNIT}};',
                        ],
                        'condition' => [
                            'grid_pagination' => 'loadmore',
                        ],
                    ),
                ),
            ],
            [
                'name' => 'grid_responsive',
                'label' => esc_html__('Responsive', 'agron' ),
                'type' => 'tab',
                'condition' => [
                    'layout_type' => 'grid',
                ],
                'controls' => [
                    array(
                        'name' => 'columns',
                        'label' => esc_html__('Columns', 'agron' ),
                        'type' => 'select',
                        'control_type' => 'responsive',
                        'default' => '',
                        'options' => [
                            ''  => 'Default',
                            '100%' => '1',
                            '50%' => '2',
                            '33.3333333%' => '3',
                            '25%' => '4',
                            '20%' => '5',
                            '16.666666666%' => '6',
                        ],
                        'default' => '',
                        'selectors' => [
                            '{{WRAPPER}} .grid .grid-inner .grid-item' => '--pxl-width: {{VALUE}};'
                        ]
                    ),
                    array(
                        'name' => 'grid_items',
                        'label' => esc_html__('Columns Custom', 'agron' ),
                        'type' => 'repeater',
                        'controls' => array(
                            array(
                                'name' => 'grid_item_width',
                                'label' => esc_html__('Width', 'agron'),
                                'type' => 'slider',
                                'control_type' => 'responsive',
                                'size_units' => ['%', 'custom'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'default' => [
                                    'unit' => '%',
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .grid .grid-inner .grid-item{{CURRENT_ITEM}}' => '--pxl-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'grid_item_height',
                                'label' => esc_html__('Height', 'agron'),
                                'type' => 'slider',
                                'control_type' => 'responsive',
                                'size_units' => ['px', 'custom'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .grid .grid-inner .grid-item{{CURRENT_ITEM}}' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'grid_item_img_dimension',
                                'label' => esc_html__('Image Dimension', 'agron'),
                                'type' => 'select',
                                'options' => [
                                    ''              => esc_html__('Default', 'agron'),
                                    'thumbnail'     => esc_html__('Thumbnail', 'agron'),
                                    'thumb'         => esc_html__('Thumb (Alias of Thumbnail)', 'agron'),
                                    'medium'        => esc_html__('Medium', 'agron'),
                                    'medium_large'  => esc_html__('Medium Large', 'agron'),
                                    'large'         => esc_html__('Large', 'agron'),
                                    'full'          => esc_html__('Full (Original)', 'agron'),
                                    'custom'        => esc_html__('Custom', 'agron'),
                                ],
                                'default' => '',
                            ),
                            array(
                                'name' => 'grid_item_img_dimension_custom',
                                'label' => esc_html__( 'Image Dimension Custom', 'agron' ),
                                'type' => 'image_dimensions',
                                'separator' => 'before',
                                'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'agron' ),
                                'condition' => [
                                    'grid_item_img_dimension' => 'custom',
                                ],
                            ),
                        ),
                    ),
                ],
            ],
        ],
    );

    return $options;
}

// Get Sidebar
function agron_get_sidebar() {
    global $wp_registered_sidebars;
    $options = [];
    $args = [];
    if ( !$wp_registered_sidebars ) {
        $options[''] = esc_html__( 'No sidebars', 'agron' );
    } else {
        $options[''] = esc_html__( 'Choose Sidebar', 'agron' );
        foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar ) {
            $options[ $sidebar_id ] = $sidebar['name'];
        }
    }
    $default_key = array_keys( $options );
    $default_key = array_shift( $default_key );
    $args = [
        'default' => $default_key,
        'options' => $options,
    ];
    return $args;
}

// Swiper Options
function swiper_controls_options($args = []) {
    $condition = isset($args['condition']) ? $args['condition'] : [];
    return array(
        'name' => 'swiper_controls',
        'control_type' => 'tab',
        'tabs' => [
            [
                'name' => 'swiper_options',
                'label' => esc_html__('Options', 'agron' ),
                'type' => 'tab',
                'condition' => [
                    'layout_type' => 'carousel',
                ],
                'controls' => [  
                    array(
                        'name' => 'slide_boxshadow',
                        'label' => esc_html__('Slide with Box Shadow', 'agron' ),
                        'type' => 'select',
                        'options' => array(
                            ''            => esc_html__('Default', 'agron' ),
                            'swiper-normal' => esc_html__('No', 'agron' ),
                            'swiper-boxshadow' => esc_html__('Yes', 'agron' ),
                        ),
                        'default' => '',
                    ),
                    array(
                        'name' => 'effect',
                        'label' => esc_html__('Effect', 'agron' ),
                        'type' => 'select',
                        'options' => array(
                            'slide' => esc_html__('Slide', 'agron' ),
                            'fade' => esc_html__('Fade', 'agron' ),
                        ),
                        'default' => 'slide',
                    ),
                    array(
                        'name' => 'swiper_divider',
                        'type' => 'divider',
                    ),
                    array(
                        'name' => 'allow_touch_move',
                        'label' => esc_html__('Allow Touch Move', 'agron'),
                        'type' => 'switcher',
                        'default' => 'true',
                    ),
                    array(
                        'name' => 'autoplay',
                        'label' => esc_html__('Autoplay', 'agron'),
                        'type' => 'switcher',
                        'default' => '',
                    ),
                    array(
                        'name' => 'disable_on_interaction',
                        'label' => esc_html__('Pause on Interaction', 'agron'),
                        'type' => 'switcher',
                        'default' => '',
                        'condition' => [
                            'autoplay!' => '',
                        ],
                    ),
                    array(
                        'name' => 'delay',
                        'label' => esc_html__('Delay', 'agron'),
                        'type' => 'number',
                        'default' => 3000,
                        'condition' => [
                            'autoplay!' => '',
                        ],
                    ),
                    array(
                        'name' => 'loop',
                        'label' => esc_html__('Infinite Loop', 'agron'),
                        'type' => 'switcher',
                        'default' => '',
                    ),
                    array(
                        'name' => 'speed',
                        'label' => esc_html__('Animation Speed', 'agron'),
                        'type' => 'number',
                        'default' => 300,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper .swiper-inner .swiper-container-fade' => '--pxl-spacing-inline: {{VALUE}}ms;'
                            ]
                    ),
                    array(
                        'name' => 'space_between',
                        'label' => esc_html__('Space Between(px)', 'agron'),
                        'type' => 'number',
                        'control_type' => 'responsive',
                        'condition' => [
                            'effect!' => 'fade',
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-swiper .swiper-inner' => '--pxl-spacing-inline: {{VALUE}}px;'
                        ]
                    ),
                    array(
                        'name' => 'swiper_pagination',
                        'type' => 'select',
                        'label' => esc_html__('Pagination', 'agron'),
                        'separator' => 'before',
                        'options' => [
                            ''            => esc_html__('None', 'agron'),
                            'bullets'     => esc_html__('Bullets', 'agron'),
                            'progressbar' => esc_html__('Progressbar', 'agron'),
                            'fraction'    => esc_html__('Fraction', 'agron'),
                        ],
                    ),
                    array(
                        'name' => 'swiper_navigation',
                        'label' => esc_html__('Navigation', 'agron'),
                        'type' => 'switcher',
                        'default' => '',
                    ),
                    array(
                        'name' => 'use_swiper_nav_widget',
                        'label' => esc_html__('Use Navigation Widget', 'agron'),
                        'type' => 'switcher',
                        'default' => '',
                        'condition' => [
                            'swiper_navigation!' => '',
                        ],
                    ),
                    array(
                        'name' => 'nav_widget_id',
                        'type' => 'text',
                        'label' => esc_html__('Enter ID Your Widget Navigation', 'agron'),
                        'condition' => [
                            'swiper_navigation!' => '',
                            'use_swiper_nav_widget!' => ''
                        ],
                        'label_block' => true,
                        'description' => esc_html__('You need to enter the unique ID you created from the navigation carousel widget, and the navigation with this ID will function as a navigation carousel.', 'agron'),
                    ),
                    array(
                        'name' => 'nav_btn_icon_prev',
                        'label' => esc_html__('Button Icon Prev', 'agron' ),
                        'type' => 'icons',
                        'fa4compatibility' => 'icon',
                        'default' => [
                            'value' => [
                                'url' => content_url('/uploads/2025/06/arrow-left.svg'),
                                'id' => 3614,
                            ],
                            'library' => 'svg',
                        ],
                        'condition' => [
                            'swiper_navigation!' => '',
                            'use_swiper_nav_widget' => ''
                        ],
                    ),
                    array(
                        'name' => 'nav_btn_icon_next',
                        'label' => esc_html__('Button Icon Next', 'agron' ),
                        'type' => 'icons',
                        'fa4compatibility' => 'icon',
                        'default' => [
                            'value' => [
                                'url' => content_url('/uploads/2025/06/arrow-right.svg'),
                                'id' => 3615,
                            ],
                            'library' => 'svg',
                        ],
                        'condition' => [
                            'swiper_navigation!' => '',
                            'use_swiper_nav_widget' => ''
                        ],
                    ),
                    array(
                        'name' => 'nav_spacing_top',
                        'label' => esc_html__('Spacing Top', 'agron'),
                        'type' => 'slider',
                        'control_type' => 'responsive',
                        'size_units' => ['px', 'custom'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-swiper .swiper-navigation' => 'marrgin-top: {{SIZE}}{{UNIT}};',
                        ],
                        'condition' => [
                            'swiper_navigation!' => '',
                            'use_swiper_nav_widget' => ''
                        ],
                    ),
                ],
            ],
            [
                'name' => 'swiper_responsive',
                'label' => esc_html__('Responsive', 'agron' ),
                'type' => 'tab',
                'controls' => [
                    array(
                        'name' => 'custom_slides',
                        'label' => esc_html__('Custom Slides', 'agron' ),
                        'type' => 'switcher',
                        'default' => '',
                    ),
                    array(
                        'name' => 'slides_per_view_xs',
                        'label' => esc_html__('Slides Per View(<576px)', 'agron' ),
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            ''  => 'Default',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '6' => '6',
                        ],
                    ),
                    array(
                        'name' => 'slides_per_view_sm',
                        'label' => esc_html__('Slides Per View(≥576px)', 'agron' ),
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            ''  => 'Default',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '6' => '6',
                        ],
                    ),
                    array(
                        'name' => 'slides_per_view_md',
                        'label' => esc_html__('Slides Per View(≥768px)', 'agron' ),
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            ''  => 'Default',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '6' => '6',
                        ],
                    ),
                    array(
                        'name' => 'slides_per_view_lg',
                        'label' => esc_html__('Slides Per View(≥992px)', 'agron' ),
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            ''  => 'Default',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '6' => '6',
                        ],
                    ),
                    array(
                        'name' => 'slides_per_view_xl',
                        'label' => esc_html__('Slides Per View(≥1200px)', 'agron' ),
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            ''  => 'Default',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                        ],
                    ),
                    array(
                        'name' => 'slides_per_view_xxl',
                        'label' => esc_html__('Slides Per View(≥1400px)', 'agron' ),
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            ''  => 'Default',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6',
                        ],
                    ),
                    array(
                        'name' => 'slides',
                        'label' => esc_html__('Slides Per View Custom', 'agron' ),
                        'type' => 'repeater',
                        'condition' => [
                            'custom_slides!' => '',
                        ],
                        'controls' => array(
                            array(
                                'name' => 'slide_width',
                                'label' => esc_html__('Width', 'agron'),
                                'type' => 'slider',
                                'control_type' => 'responsive',
                                'size_units' => ['%', 'custom'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'default' => [
                                    'unit' => '%',
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-inner .swiper-slide{{CURRENT_ITEM}}' => 'flex: 0 1 {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'slide_height',
                                'label' => esc_html__('Height', 'agron'),
                                'type' => 'slider',
                                'control_type' => 'responsive',
                                'size_units' => ['px', 'custom'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-inner .swiper-slide{{CURRENT_ITEM}}' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'slide_img_dimension',
                                'label' => esc_html__('Image Dimension', 'agron'),
                                'type' => 'select',
                                'options' => [
                                    ''              => esc_html__('Default', 'agron'),
                                    'thumbnail'     => esc_html__('Thumbnail', 'agron'),
                                    'thumb'         => esc_html__('Thumb (Alias of Thumbnail)', 'agron'),
                                    'medium'        => esc_html__('Medium', 'agron'),
                                    'medium_large'  => esc_html__('Medium Large', 'agron'),
                                    'large'         => esc_html__('Large', 'agron'),
                                    'full'          => esc_html__('Full (Original)', 'agron'),
                                    'custom'        => esc_html__('Custom', 'agron'),
                                ],
                                'default' => '',
                            ),
                            array(
                                'name' => 'slide_img_dimension_custom',
                                'label' => esc_html__( 'Image Dimension Custom', 'agron' ),
                                'type' => 'image_dimensions',
                                'separator' => 'before',
                                'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'agron' ),
                                'condition' => [
                                    'slide_img_dimension' => 'custom',
                                ],
                            ),
                        ),
                    ),
                ],
            ],
        ],
    );
}

// Swiper Navigation Style Options
function swiper_navigation_style_options() {
    $options = array_merge(
        array(
            array(
                'name' => 'swiper_nav_layout_h',
                'label' => esc_html__('Layout', 'agron'),
                'type' => 'heading',
            ),
            array(
                'name' => 'swiper_nav_justify_content',
                'label' => esc_html__('Justify Content', 'agron'),
                'type' => 'choose',
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
                    '{{WRAPPER}} .swiper-navigation' => 'justify-content: {{VALUE}};'
                ],
            ),
            array(
                'name' => 'nav_gap',
                'label' => esc_html__('Gap', 'agron' ),
                'type' => 'slider',
                'control_type' => 'responsive',
                'size_units' => [ 'px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-swiper .swiper-navigation' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'swiper_nav_position',
                'label' => esc_html__('Position', 'agron'),
                'type' => 'select',
                'options' => [
                    '' => esc_html__('Default', 'agron'),
                    'relative' => esc_html__('Relative', 'agron'),
                    'absolute' => esc_html__('Absolute', 'agron'),
                    'static' => esc_html__('Static', 'agron'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-swiper .swiper-navigation' => 'position: {{VALUE}};',
                ],
            ),
        ),
        agron_position_options([
            'prefix' => 'swiper_nav',
            'selector' => '{{WRAPPER}} .pxl-swiper .swiper-navigation',
            'condition' => [
                'swiper_nav_position' => 'absolute'
            ]
        ]),
        array(
            array(
                'name' => 'divider1',
                'type' => 'divider',
            ),
            array(
                'name' => 'swiper_nav_btn_h',
                'label' => esc_html__('Button', 'agron'),
                'type' => 'heading',
            ),
            array(
                'name' => 'swiper_btn_box_sz',
                'label' => esc_html__('Box Size', 'agron' ),
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
                    '{{WRAPPER}} .swiper-navigation .pxl-swiper-button' => '--pxl-box-size: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'swiper_btn_typography',
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .swiper-navigation .pxl-swiper-button',
            ),
            array(
                'name' => 'swiper_btn_text_shadow',
                'label' => esc_html__('Text Shadow', 'agron' ),
                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .swiper-navigation .pxl-swiper-button',
            ),
            array(
                'name' => 'swiper_btn_controls',
                'control_type' => 'tab',
                'tabs' => [
                    [
                        'name' => 'swiper_btn_normal',
                        'label' => esc_html__('Normal', 'agron' ),
                        'type' => 'tab',
                        'controls' => [  
                            array(
                                'name' => 'swiper_btn_color',
                                'label' => esc_html__('Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .swiper-navigation .pxl-swiper-button' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'swiper_btn_bg',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .swiper-navigation .pxl-swiper-button',
                            ),
                            array(
                                'name' => 'swiper_btn_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .swiper-navigation .pxl-swiper-button',
                            ),
                            array(
                                'name'         => 'swiper_btn_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .swiper-navigation .pxl-swiper-button',
                            ),
                            array(
                                'name' => 'swiper_btn_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .swiper-navigation .pxl-swiper-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'swiper_btn_padding',
                                'label' => esc_html__('Padding', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'control_type' => 'responsive',
                                'separator' => 'before',
                                'selectors' => [
                                    '{{WRAPPER}} .swiper-navigation .pxl-swiper-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                    [
                        'name' => 'swiper_btn_hover',
                        'label' => esc_html__('Hover', 'agron' ),
                        'type' => 'tabs',
                        'controls' => [
                            array(
                                'name' => 'swiper_btn_hover_style',
                                'label' => esc_html__('Hover Style', 'agron' ),
                                'type' => 'select',
                                'options' => [
                                    'hover-button-default' => esc_html__('Default', 'agron'),
                                    'hover-scaley-fill' => esc_html__('Grow Height', 'agron'),
                                ],
                                'default' => 'hover-default',
                            ),
                            array(
                                'name' => 'swiper_btn_hove_color',
                                'label' => esc_html__('Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .swiper-navigation .pxl-swiper-button:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'swiper_btn_hover_bg',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .swiper-navigation .pxl-swiper-button:hover',
                            ),
                            array(
                                'name' => '_swiper_btn_hover_border_color',
                                'label' => esc_html__('Border Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .swiper-navigation .pxl-swiper-button:hover' => 'border-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'swiper_btn_hover_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .swiper-navigation .pxl-swiper-button:hover',
                            ),
                            array(
                                'name'         => 'swiper_btn_hover_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .swiper-navigation .pxl-swiper-button:hover',
                            ),
                            array(
                                'name' => 'swiper_btn_hover_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .swiper-navigation .pxl-swiper-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'swiper_btn_hover_padding',
                                'label' => esc_html__('Padding', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'control_type' => 'responsive',
                                'separator' => 'before',
                                'selectors' => [
                                    '{{WRAPPER}} .swiper-navigation .pxl-swiper-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                ],
            ),
        ),
    );
    return [
        'name' => 'tab_swiper_navigation_style',
        'tab' => 'style',
        'label' => esc_html__('Navigation', 'agron'), 
        'controls' => $options,
        'condition' => [
            'swiper_navigation!' => '',
            'use_swiper_nav_widget' => ''
        ],
    ];
}

// Source Post Settings
function agron_source_post_settings($post_type) {
    return array(
        'name' => 'tab_source',
        'label' => esc_html__('Source', 'agron' ),
        'tab' => 'settings',
        'controls' => array_merge(
            array(
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
                ) 
            ),
            agron_get_term_by_post_type($post_type, ['custom_condition' => ['select_post_by' => 'term_selected']]),
            agron_get_ids_by_post_type($post_type, ['custom_condition' => ['select_post_by' => 'post_selected']]),
            array(
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
                    'name' => 'order',
                    'label' => esc_html__('Sort Order', 'agron' ),
                    'type' => 'select',
                    'default' => 'desc',
                    'options' => [
                        'desc' => esc_html__('Descending', 'agron' ),
                        'asc' => esc_html__('Ascending', 'agron' ),
                    ],
                ),
                array(
                    'name' => 'limit',
                    'label' => esc_html__('View Posts', 'agron' ),
                    'type' => 'number',
                    'default' => 6,
                ),
            ),
        ),
    );
}

// Parallax Params
if(!function_exists('agron_parallax_options')) {
    function agron_parallax_options($args = []) {
        $prefix = isset($args['prefix']) ? $args['prefix'].'_' : '';
        $condition = isset($args['condition']) ? $args['condition'] : [];
        $options = [
            [
                'name' => $prefix.'popover_toggle_parallax',
                'label' => esc_html__( 'Parallax Params', 'agron' ),
                'type' => 'popover_toggle',
                'default' => '',
                'condition' => $condition,
            ],
            [
                'name' => $prefix.'pxl_start_popover',
                'type' => 'pxl_start_popover',
            ],
            [
                'name' => $prefix.'parallax_x',
                'label' => esc_html__('X', 'agron' ),
                'control_type' => 'responsive',
                'type' => 'number',
            ],
            [
                'name' => $prefix.'parallax_y',
                'label' => esc_html__('Y', 'agron' ),
                'control_type' => 'responsive',
                'type' => 'number',
            ],
            [
                'name' => $prefix.'parallax_opacity',
                'label' => esc_html__('Opacity', 'agron' ),
                'control_type' => 'responsive',
                'type' => 'number',
                'min' => 0,
                'max' => 1,
                'step' => 0.01,
            ],
            [
                'name' => $prefix.'parallax_rotate',
                'label' => esc_html__('Rotate', 'agron' ),
                'control_type' => 'responsive',
                'type' => 'number',
            ],
            [
                'name' => $prefix.'parallax_scale',
                'label' => esc_html__('Scale', 'agron' ),
                'control_type' => 'responsive',
                'type' => 'number',
            ],
            [
                'name' => $prefix.'pxl_start_popover',
                'type' => 'pxl_end_popover',
            ],
        ];
        return $options;
    }
}

// Grid Pagination Options Style  
function grid_pagination_style_options() {
    return [
        'name' => 'tab_grid_pagination_style',
        'label' => esc_html__('Pagination', 'agron'),
        'tab' => 'style',
        'condition' => [
            'grid_pagination' => 'pagination',
        ],
        'controls' => [
            array(
                'name' => 'pagination_box_sz',
                'label' => esc_html__('Box Size', 'agron' ),
                'type' => 'slider',
                'size_units' => ['px', 'custom'],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .grid .grid-pagination .page-numbers' => '--pxl-box-size: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'pagination_typography',
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .grid .grid-pagination .page-numbers',
            ),
            array(
                'name' => 'divider_pagination_1',
                'type' => 'divider',
            ),
            array(
                'name' => 'pagination_controls',
                'control_type' => 'tab',
                'tabs' => [
                    [
                        'name' => 'pagination_normal',
                        'label' => esc_html__('Normal', 'agron' ),
                        'type' => 'tab',
                        'controls' => [  
                            array(
                                'name' => 'pagination_color',
                                'label' => esc_html__('Text Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .grid .grid-pagination .page-numbers' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'pagination_bg',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .grid .grid-pagination .page-numbers',
                            ),
                            array(
                                'name' => 'pagination_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .grid .grid-pagination .page-numbers',
                            ),
                            array(
                                'name'         => 'pagination_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .grid .grid-pagination .page-numbers',
                            ),
                            array(
                                'name' => 'pagination_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .grid .grid-pagination .page-numbers' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                    [
                        'name' => 'pagination_hover',
                        'label' => esc_html__('Hover/Current', 'agron' ),
                        'type' => 'tabs',
                        'controls' => [
                            array(
                                'name' => 'pagination_hove_color',
                                'label' => esc_html__('Text Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .grid .grid-pagination .page-numbers:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => '_pagination_hover_border_color',
                                'label' => esc_html__('Border Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .grid .grid-pagination .page-numbers:hover' => 'border-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'pagination_hover_bg',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .grid .grid-pagination .page-numbers:hover',
                            ),
                            array(
                                'name' => 'pagination_hover_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .grid .grid-pagination .page-numbers:hover'
                            ),
                            array(
                                'name'         => 'pagination_hover_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .grid .grid-pagination .page-numbers:hover'
                            ),
                            array(
                                'name' => 'pagination_hover_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .grid .grid-pagination .page-numbers:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                ],
            ),
        ],
    ];
}

// Bullets Pagination Carousel Style Options
function swiper_bullets_pagination_style_options() {
    return [
        'name' => 'tab_swiper_bullets_pagination_style',
        'label' => esc_html__('Pagination Bullets', 'agron'),
        'tab' => 'style',
        'condition' => [
            'swiper_pagination' => 'bullets',
        ],
        'controls' => [
            array(
                'name' => 'bullet_size',
                'label' => esc_html__('Bullet Size', 'agron' ),
                'type' => 'slider',
                'size_units' => ['px', 'custom'],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'bullet_dot_size',
                'label' => esc_html__('Dot Inset', 'agron' ),
                'type' => 'slider',
                'size_units' => ['px', 'custom'],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:before' => 'inset: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'divider_bullet_1',
                'type' => 'divider',
            ),
            array(
                'name' => 'bullet_controls',
                'control_type' => 'tab',
                'tabs' => [
                    [
                        'name' => 'bullet_normal',
                        'label' => esc_html__('Normal', 'agron' ),
                        'type' => 'tab',
                        'controls' => [  
                            array(
                                'name' => 'bullet_color',
                                'label' => esc_html__('Bullet Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'bullet_background',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet',
                            ),
                            array(
                                'name' => 'bullet_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet',
                            ),
                            array(
                                'name'         => 'bullet_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet',
                            ),
                            array(
                                'name' => 'bullet_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                    [
                        'name' => 'bullet_hover',
                        'label' => esc_html__('Hover/Active', 'agron' ),
                        'type' => 'tabs',
                        'controls' => [
                            array(
                                'name' => 'bullet_hove_color',
                                'label' => esc_html__('Bullet Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => '_bullet_hover_border_color',
                                'label' => esc_html__('Border Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'border-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'bullet_hover_background',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover',
                            ),
                            array(
                                'name' => 'bullet_hover_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover'
                            ),
                            array(
                                'name'         => 'bullet_hover_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover'
                            ),
                            array(
                                'name' => 'bullet_hover_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-pagination.swiper-pagination-bullets .swiper-pagination-bullet:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                ],
            ),
        ],
    ];
}

// Swiper Navigation Carousel Style Options
function swiper_navigation_button_style_options() {
    $options = [
        'name' => 'tab_swiper_nav_btn_style',
        'tab' => 'style',
        'label' => esc_html__('Navigation Button', 'agron'),
        'condition' => [
            'swiper_navigation!' => '',
        ],
        'controls' => [
            array(
                'name' => 'nav_btn_box_size',
                'label' => esc_html__('Box Size', 'agron' ),
                'type' => 'slider',
                'size_units' => ['px' , 'custom'],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button, 
                    {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'nav_btn_icon_size',
                'label' => esc_html__('Icon Size', 'agron'),
                'type' => 'slider',
                'control_type' => 'responsive' ,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0, 
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button,
                    {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button svg,
                    {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button svg' => 'width: {{SIZE}}{{UNIT}}; height : auto;',
                ],
            ),
            array(
                'name' => 'nav_btn_controls',
                'control_type' => 'tab',
                'tabs' => [
                    [
                        'name' => 'nav_btn_normal',
                        'label' => esc_html__('Normal', 'agron' ),
                        'type' => 'tab',
                        'controls' => [  
                            array(
                                'name' => 'nav_btn_color',
                                'label' => esc_html__('Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'nav_btn_background',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button',
                            ),
                            array(
                                'name' => 'nav_btn_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button',
                            ),
                            array(
                                'name'         => 'nav_btn_box_shadow',
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button',
                            ),
                            array(
                                'name' => 'nav_btn_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'nav_btn_padding',
                                'label' => esc_html__('Padding', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'control_type' => 'responsive',
                                'separator' => 'before',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                    [
                        'name' => 'nav_btn_hover',
                        'label' => esc_html__('Hover', 'agron' ),
                        'type' => 'tabs',
                        'controls' => [
                            array(
                                'name' => 'nav_btn_hover_color',
                                'label' => esc_html__('Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button:hover, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => '_nav_btn_hover_border_color',
                                'label' => esc_html__('Border Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button:hover, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button:hover' => 'border-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'nav_btn_hover_background',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button:hover, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button:hover',
                            ),
                            array(
                                'name' => 'nav_btn_hover_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button:hover, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button:hover',
                            ),
                            array(
                                'name'         => 'nav_btn_hover_box_shadow',
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button:hover, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button:hover',
                            ),
                            array(
                                'name' => 'nav_btn_hover_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button:hover, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'nav_btn_hover_padding',
                                'label' => esc_html__('Padding', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'control_type' => 'responsive',
                                'separator' => 'before',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper .swiper-navigation .pxl-swiper-button:hover, {{WRAPPER}} .pxl-slider .swiper-navigation .pxl-swiper-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                ],
            ),
        ]
    ];
    return $options;
}

// Load More Button Style Options
function load_more_button_style_options() {
    $options = [
        'name' => 'tab_load_more_btn_style',
        'tab' => 'style',
        'label' => esc_html__('Load More', 'agron'),
        'condition' => [
            'grid_pagination' => 'loadmore',
        ],
        'controls' => [
            array(
                'name' => 'btn_load_more_icon_translate_y',
                'label' => esc_html__('Icon Translate Y', 'agron'),
                'type' => 'slider',
                'control_type' => 'responsive' ,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0, 
                        'max' => 1000
                    ],
                ],
                'condition' => [
                    'load_more_style' => ['load-more-button-default'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button' => '--pxl-translate-y: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'btn_load_more_icon_sz',
                'label' => esc_html__('Icon Size', 'agron'),
                'type' => 'slider',
                'control_type' => 'responsive' ,
                'size_units' => ['px', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0, 
                        'max' => 1000
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button .pxl-btn-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button .pxl-btn-icon svg' => 'height: {{SIZE}}{{UNIT}}; width : auto;',
                ],
            ),
            array(
                'name' => 'btn_load_more_h',
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
                'condition' => [
                    'load_more_style' => ['pxl-btn-split'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button' => 'height: {{SIZE}}{{UNIT}};--pxl-height: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'btn_load_more_box_size',
                'label' => esc_html__('Box Size', 'agron' ),
                'type' => 'slider',
                'size_units' => ['px' , 'custom'],
                'control_type' => 'responsive',
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'condition' => [
                    'load_more_style' => ['load-more-button-default'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button' => '--pxl-box-size: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'btn_load_more_divider2',
                'type' => 'divider',
            ),
            array(
                'name' => 'btn_load_more_typography',
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button',
            ),
            array(
                'name' => 'btn_load_more_text_shadow',
                'label' => esc_html__('Text Shadow', 'agron' ),
                'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button',
            ),
            array(
                'name' => 'btn_load_more_controls',
                'control_type' => 'tab',
                'tabs' => [
                    [
                        'name' => 'btn_load_more_normal',
                        'label' => esc_html__('Normal', 'agron' ),
                        'type' => 'tab',
                        'controls' => [  
                            array(
                                'name' => 'btn_load_more_color',
                                'label' => esc_html__('Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_icon_border_style',
                                'label' => esc_html__( 'Border Style', 'agron' ),
                                'type' => 'select',
                                'default' => '',
                                'options' => [
                                    '' => esc_html__( 'Default', 'agron' ),
                                    'none' => esc_html__( 'None', 'agron' ),
                                    'solid'  => esc_html__( 'Solid', 'agron' ),
                                    'dashed' => esc_html__( 'Dashed', 'agron' ),
                                    'dotted' => esc_html__( 'Dotted', 'agron' ),
                                    'double' => esc_html__( 'Double', 'agron' ),
                                ],
                                'condition' => [
                                    'load_more_style' => ['load-more-button-default'],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button' => 'border-style: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_border_color',
                                'label' => esc_html__('Border Color', 'agron' ),
                                'type' => 'color',
                                'condition' => [
                                    'load_more_style' => ['load-more-button-default'],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button' => 'border-top-color: {{VALUE}};border-right-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_border_inner_color',
                                'label' => esc_html__('Border Inner Color', 'agron' ),
                                'type' => 'color',
                                'condition' => [
                                    'load_more_style' => ['load-more-button-default'],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:before' => 'border-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_bg',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:not(.pxl-btn-split),
                                {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-icon, 
                                {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-text',

                            ),
                            array(
                                'name' => '_btn_load_more_border',
                                'type' => \Elementor\Group_Control_Border::get_type(),
                                'separator' => 'before',
                                'control_type' => 'group', 
                                'selector' => '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:not(.pxl-btn-split),
                                {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-icon, 
                                {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-text',                            ),
                            array(
                                'name'         => 'btn_load_more_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:not(.pxl-btn-split),
                                {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-icon, 
                                {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-text',                            ),
                            array(
                                'name' => 'btn_load_more_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:not(.pxl-btn-split),
                                    {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-icon, 
                                    {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_padding',
                                'label' => esc_html__('Padding', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'control_type' => 'responsive',
                                'separator' => 'before',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:not(.pxl-btn-split),
                                    {{WRAPPER}} .pxl-load-more-wrapper .btn.pxl-btn-split .pxl-btn-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                    [
                        'name' => 'btn_load_more_hover',
                        'label' => esc_html__('Hover', 'agron' ),
                        'type' => 'tabs',
                        'controls' => [
                            array(
                                'name' => 'btn_load_more_hover_color',
                                'label' => esc_html__('Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_hover_border_color',
                                'label' => esc_html__('Border Color', 'agron' ),
                                'type' => 'color',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .load-more-button-default:hover' => 'border-top-color: {{VALUE}};border-right-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_hover_border_inner_color',
                                'label' => esc_html__('Border Inner Color', 'agron' ),
                                'type' => 'color',
                                'condition' => [
                                    'load_more_style' => ['load-more-button-default'],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:hover:before' => 'border-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_hover_bg',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:hover',
                            ),
                            array(
                                'name'         => 'btn_load_more_hover_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'agron' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:hover',
                            ),
                            array(
                                'name' => 'btn_load_more_hover_border_radius',
                                'label' => esc_html__('Border Radius', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_load_more_hover_padding',
                                'label' => esc_html__('Padding', 'agron' ),
                                'type' => 'dimensions',
                                'size_units' => [ 'px', 'custom' ],
                                'control_type' => 'responsive',
                                'separator' => 'before',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-load-more-wrapper .pxl-load-more-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        ],
                    ],
                ],
            ),
        ]

    ];
    return $options;
}

// Button Compare
function agron_button_compare($product) {
    if(!class_exists('WPCleverWoosc') || !is_a( $product, 'WC_Product' )) {
        return;
    }
    return '<button class="pxl-button pxl-button-compare woosc-item-add" data-id="'. esc_attr($product->get_id()) .'">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
            <path d="M6.07747 13.1668C6.22 13.3093 6.40813 13.3806 6.59436 13.3806C6.7806 13.3806 6.96873 13.3093 7.11125 13.1668C7.3944 12.8818 7.3944 12.42 7.11125 12.1349L3.49123 8.51573H23.1349C23.5378 8.51573 23.8646 8.18887 23.8646 7.786C23.8646 7.38313 23.5378 7.05627 23.1349 7.05627H3.49123L7.11125 3.43708C7.3944 3.15203 7.3944 2.69025 7.11125 2.40519C6.8262 2.12014 6.36252 2.12014 6.07747 2.40519L1.21261 7.27006C0.929457 7.55511 0.929457 8.01689 1.21261 8.30194L6.07747 13.1668Z" fill="currentcolor"/>
            <path d="M18.7872 12.1347C18.5021 11.8496 18.0384 11.8496 17.7534 12.1347C17.4702 12.4197 17.4702 12.8815 17.7534 13.1666L21.3734 16.7858H1.72973C1.32686 16.7858 1 17.1126 1 17.5155C1 17.9184 1.32686 18.2452 1.72973 18.2452H21.3734L17.7534 21.8644C17.4702 22.1495 17.4702 22.6113 17.7534 22.8963C17.8959 23.0388 18.084 23.1101 18.2703 23.1101C18.4565 23.1101 18.6446 23.0388 18.7872 22.8963L23.652 18.0314C23.9352 17.7464 23.9352 17.2846 23.652 16.9996L18.7872 12.1347Z" fill="currentcolor"/>
        </svg>
    </button>';
}