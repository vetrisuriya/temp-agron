<?php 
/**
 * Get Post List 
*/
if(!function_exists('agron_list_post')){
    function agron_list_post($post_type = 'post', $default = false){
        $post_list = array();
        $posts = get_posts(array('post_type' => $post_type, 'orderby' => 'date', 'order' => 'ASC', 'posts_per_page' => '-1'));
        if($default){
        	$post_list[-1] = esc_html__( 'Inherit', 'agron' );
        }
        foreach($posts as $post){
            $post_list[$post->ID] = $post->post_title;
        }
        return $post_list;
    }
}

if(!function_exists('agron_get_templates_option')){
	function agron_get_templates_option($meta_value = 'df', $default = false){
        $post_list = array();
        if($default && !is_array($default)){
            $post_list[-1] = esc_html__('Inherit','agron');
        }
        if(is_array($default)){
        	$key = isset($default['key']) ? $default['key'] : '0';
        	$post_list[$key] = !empty($default['value']) ? $default['value'] : esc_html__('None','agron');
        }
        $args = array(
            'post_type' => 'pxl-template',
            'posts_per_page' => '-1',
            'orderby' => 'date',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key'       => 'template_type',
                    'value'     => $meta_value,
                    'compare'   => '='
                )
            )
        );

        $posts = get_posts($args);
        
        foreach($posts as $post){  
        	$template_type = get_post_meta( $post->ID, 'template_type', true );
        	if($template_type == 'df') continue;
            $post_list[$post->ID] = $post->post_title;
        }
         
        return $post_list;
    }
}

if(!function_exists('agron_get_templates_slug')){
    function agron_get_templates_slug($meta_value = 'df'){
        $post_list = array();
        $posts = get_posts(
        	array(
        		'post_type' => 'pxl-template', 
        		'orderby' => 'date', 
        		'order' => 'ASC', 
        		'posts_per_page' => '-1',
        		'meta_query' => array(
	                array(
	                    'key'       => 'template_type',
	                    'value'     => $meta_value,
	                    'compare'   => '='
	                )
	            )
        	)
        );
         
        foreach($posts as $post){
        	$template_type = get_post_meta( $post->ID, 'template_type', true );
        	if($template_type == 'df') continue;
        	$value_args = [
        		'post_id' => $post->ID, 
        		'title' => $post->post_title
        	];
        	$template_position = get_post_meta( $post->ID, 'template_position', true );
        	 
    		$value_args['position'] = !empty($template_position) ? $template_position : '';

            $post_list[$post->post_name] = $value_args;
        }
        return $post_list;
    }
}

if(!function_exists('agron_header_opts')){
	function agron_header_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => ''
		]);
		 
		$opts = array(
	        array(
				'id'      => 'header_layout',
				'type'    => 'select',
				'title'   => esc_html__('Header Layout', 'agron'),
				'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','agron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
				'options' => agron_get_templates_option('header',$args['default']),
				'default' => $args['default_value']  
	        ),
            array(
				'id'      => 'header_layout_sticky',
				'type'    => 'select',
				'title'   => esc_html__('Header Sticky', 'agron'),
				'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','agron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
				'options' => agron_get_templates_option('header',$args['default']),
				'default' => $args['default_value'],
	        )
	    );
 
		return $opts;
	}
}

if(!function_exists('agron_header_mobile_opts')){
	function agron_header_mobile_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => ''
		]);
		 
		$opts = array(
	        array(
				'id'      => 'header_mobile_layout',
				'type'    => 'select',
				'title'   => esc_html__('Header Layout', 'agron'),
				'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','agron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
				'options' => agron_get_templates_option('header-mobile',$args['default']),
				'default' => $args['default_value']  
	        ),
	    );
 
		return $opts;
	}
}

if(!function_exists('agron_page_title_options')){
	function agron_page_title_options($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			// 'default_value'   => '1'
		]);
		if($args['default']){
			$page_title_mode_options = [
				'inherit'   => esc_html__('Inherit', 'agron'),
	            'builder'   => esc_html__('Builder', 'agron'),
	            'disable'   => esc_html__('Disable', 'agron')
			];
			$page_title_default_value = 'inherit';
		}else{
			$page_title_mode_options = [
				'default'   => esc_html__('Default', 'agron'),
	            'builder'   => esc_html__('Builder', 'agron'),
	            'disable'   => esc_html__('Disable', 'agron')
			];
			$page_title_default_value = 'default';
		}
		$opts = array(
	        array(
	            'id'           => 'page_title_mode',
	            'type'         => 'button_set',
	            'title'        => esc_html__( 'Page Title', 'agron' ),
	            'options' => $page_title_mode_options, 
                'default' => $page_title_default_value
	        ),
	        array(
	            'id'       => 'page_title_layout',
	            'type'     => 'select',
	            'title'    => esc_html__('Page Title Layout', 'agron'),
	            'desc'     => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','agron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'  => agron_get_templates_option('page-title', false),
	            'default'  => $page_title_default_value,
	            'required' => array( 'page_title_mode', '=', 'builder' )
	        ),
	    );
 
		return $opts;
	}
}

if(!function_exists('agron_post_title_opts')){
	function agron_post_title_opts($post_type = 'post'){
		$opts = array(
	        array(
	            'id'           => $post_type.'_title_mode',
	            'type'         => 'button_set',
	            'title'        => esc_html__( 'Post Title Mode', 'agron' ),
	            'options' => [
					''         => esc_html__('Default', 'agron'),
					'builder'  => esc_html__('Builder', 'agron'),
					'disable'  => esc_html__('Disable', 'agron')
				], 
                'default' => ''
	        ),
	        array(
	            'id'       => $post_type.'_title_layout',
	            'type'     => 'select',
	            'title'    => esc_html__('Post Title Layout', 'agron'),
	            'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','agron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'  => agron_get_templates_option('post-title', false),
	            'default'  => 'default',
	            'required' => array( $post_type.'_title_mode', '=', 'builder' )
	        ),
	    );
 
		return $opts;
	}
}

if(!function_exists('agron_footer_opts')){
	function agron_footer_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'         => false,
			'default_value'   => ''
		]);
		 
		$opts = array(
	        array(
	            'id'          => 'footer_layout',
	            'type'        => 'select',
	            'title'       => esc_html__('Footer Layout', 'agron'),
	            'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','agron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
	            'options'     => agron_get_templates_option('footer', $args['default']),
	            'default'     => $args['default_value'],
	        )
	    );
 
		return $opts;
	}
}
if(!function_exists('agron_sidebar_options')){
	function agron_sidebar_options($args=[]){
		$args = wp_parse_args($args,[
			'prefix'        => 'blog',
			'page_option'   => false,
			'default'       => 'right'
		]);
		$prefix = isset($args['prefix']) ? $args['prefix'].'_' : null;
		if($args['page_option']){
			$options = [
				'inherit'    => esc_html__('Inherit','agron'),
				'left'       => esc_html__('Left','agron'),
				'right'      => esc_html__('Right','agron'),
				'disable'    => esc_html__('Disable','agron'),
			];
		} else {
			$options = [
				'left'      => esc_html__('Left','agron'),
				'right'     => esc_html__('Right','agron'),
				'disable'   => esc_html__('Disable','agron'),
			]; 
		}  
		$opts = [
			'id'       => $prefix.'sidebar',
			'type'     => 'button_set',
			'title'    => esc_html__('Sidebar', 'agron'),
			'options'  => $options,
			'default'  => $args['default'],
		];
		return $opts;
	}
}


/* Get list menu */
function agron_get_nav_menu_slug(){

    $menus = array(
        '-1' => esc_html__('Inherit', 'agron')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->slug] = $obj_menu->name;
    }
    return $menus;
}

function agron_get_menu_options() {
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	$pxl_menus = '';
	if ( is_array( $menus ) && ! empty( $menus ) ) {
		$pxl_menus = array(
			'' => esc_html__('Default', 'agron')
		);
		foreach ( $menus as $value ) {
			if ( is_object( $value ) && isset( $value->name, $value->slug ) ) {
				$pxl_menus[ $value->slug ] = $value->name;
			}
		}
	}
	return $pxl_menus;
}


// Get Page ID
function agron_get_pages($prefix) {
	$args = array(
		'post_type'      => 'page', 
		'meta_key'       => '_elementor_edit_mode',
		'meta_compare'   => 'EXISTS',
		'posts_per_page' => -1 
	);
	
	$query = new WP_Query($args);
	$options = [
		'' => esc_html__('Default', 'agron'),
	];
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$options[get_the_ID()] = get_the_title();
		}
		wp_reset_postdata();
	}
	return array(
		'id'       => $prefix.'_page_id',
		'type'     => 'select',
		'title'    => esc_html__('Set Page', 'agron'),
		'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','agron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-page' ) ) . '">','</a>'),
		'options'  => $options,
		'default'  => '',
	);
}