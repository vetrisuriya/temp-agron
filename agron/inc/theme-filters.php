<?php
/**
 * Filters hook for the theme
 *
 * @package Case-Themes
 */

/* Custom Classs - Body */
function agron_body_classes( $classes ) {   

	$classes[] = '';
    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';
		$sidebar = isset($_GET['sidebar']) ? sanitize_text_field($_GET['sidebar']) : null;

		$body_custom_class = agron()->get_page_opt('body_custom_class');
		if(!empty($body_custom_class)) {
			$classes[] .= ' '.$body_custom_class;
		}
    }


    return $classes;
}
add_filter( 'body_class', 'agron_body_classes' );

/* Post Type Support */
function agron_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'project', 'service', 'team', 'footer', 'pxl-template' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'project', $cpt_support ) ) {
        $cpt_support[] = 'project';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'service', $cpt_support ) ) {
        $cpt_support[] = 'service';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

	else if( ! in_array( 'team', $cpt_support ) ) {
        $cpt_support[] = 'team';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'pxl-template', $cpt_support ) ) {
        $cpt_support[] = 'pxl-template';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

}
add_action( 'after_switch_theme', 'agron_add_cpt_support');

add_filter( 'pxl_support_default_cpt', 'agron_support_default_cpt' );
function agron_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'agron_add_post_type' );
function agron_add_post_type( $postypes ) {
	$project_display = agron()->get_theme_opt('project_display', 'on');
	$project_slug = agron()->get_theme_opt('project_slug', 'project');
	$project_name = agron()->get_theme_opt('project_name', 'Projects');
	$service_display = agron()->get_theme_opt('service_display', 'on');
	$service_slug = agron()->get_theme_opt('service_slug', 'service');
	$service_name = agron()->get_theme_opt('service_name', 'Services');
	$team_display = agron()->get_theme_opt('team_display', 'on');
	$team_slug = agron()->get_theme_opt('team_slug', 'team');
	$team_name = agron()->get_theme_opt('team_name', 'Team');
	if($project_display == 'on') {
		$project_status = true;
	} else {
		$project_status = false;
	}
	if($service_display == 'on') {
		$service_status = true;
	} else {
		$service_status = false;
	}

	$postypes['project'] = array(
		'status' => $project_status,
		'item_name'  => $project_name,
		'items_name' => $project_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $project_slug,
 		 	),
		),
	);

	$postypes['service'] = array(
		'status' => $service_status,
		'item_name'  => $service_name,
		'items_name' => $service_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $service_slug,
 		 	),
		),
	);

	$postypes['team'] = array(
		'status' => $team_display == 'on' || false,
		'item_name'  => $team_name,
		'items_name' => $team_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $team_slug,
 		 	),
		),
	);
  
	return $postypes;
}

add_filter( 'pxl_extra_taxonomies', 'agron_add_tax' );
function agron_add_tax( $taxonomies ) {

	$taxonomies['project-category'] = array(
		'status'     => true,
		'post_type'  => array( 'project' ),
		'taxonomy'   => 'Project Categories',
		'taxonomies' => 'Project Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'project-category'
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['team-category'] = array(
		'status'     => true,
		'post_type'  => array( 'team' ),
		'taxonomy'   => 'Team Categories',
		'taxonomies' => 'Team Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'team-category'
 		 	),
		),
		'labels'     => array()
	);
	
	return $taxonomies;
}

/* Custom Archive Post Type Link */
add_filter( 'post_type_archive_link', 'agron_get_post_type_archive_link', 10, 2 );
function agron_get_post_type_archive_link($link, $post_type){

	if( $post_type == 'project'){
		$port_archive_link = agron()->get_theme_opt('archive_project_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

	if( $post_type == 'service'){
		$port_archive_link = agron()->get_theme_opt('archive_service_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

	if( $post_type == 'team'){
		$port_archive_link = agron()->get_theme_opt('archive_team_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

  return $link;
}

add_filter( 'pxl_theme_builder_post_types', 'agron_theme_builder_post_type' );
function agron_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'agron_theme_builder_layout_id' );
function agron_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)agron()->get_opt('header_layout');
	$header_sticky        = (int)agron()->get_opt('header_sticky');
	$footer_layout        = (int)agron()->get_opt('footer_layout');
	$page_title_layout        = (int)agron()->get_opt('page_title_layout');
	$product_bottom_content        = (int)agron()->get_opt('product_bottom_content');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky > 0) 
		$layout_ids[] = $header_sticky;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $page_title_layout > 0) 
		$layout_ids[] = $page_title_layout;
	if( $product_bottom_content > 0) 
		$layout_ids[] = $product_bottom_content;

	$slider_template = agron_get_templates_option('slider');
	if( count($slider_template) > 0){
		foreach ($slider_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}

	$tab_template = agron_get_templates_option('tab');
	if( count($tab_template) > 0){
		foreach ($tab_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}
	
	$mega_menu_id = agron_get_mega_menu_builder_id();
	if(!empty($mega_menu_id))
		$layout_ids = array_merge($layout_ids, $mega_menu_id);

	$page_popup_id = agron_get_page_popup_builder_id();
	if(!empty($page_popup_id))
		$layout_ids = array_merge($layout_ids, $page_popup_id);

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'agron_wg_get_source_builder' );
function agron_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  $wg_datas['slides'] = ['control_name' => 'slides', 'source_name' => 'slide_template'];
  return $wg_datas;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'agron_add_editor_preview_style' );
function agron_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', agron_editor_preview_inline_styles() );
}
function agron_editor_preview_inline_styles(){
    $theme_colors = agron_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active {';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}
 
add_filter( 'get_the_archive_title', 'agron_archive_title_remove_label' );
function agron_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'agron_comment_reply_text' );
function agron_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'agron').'', $link );
	return $link;
}
add_filter( 'pxl_enable_pagepopup', 'agron_enable_pagepopup' );
function agron_enable_pagepopup() {
	return false;
}
add_filter( 'pxl_enable_megamenu', 'agron_enable_megamenu' );
function agron_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'agron_enable_onepage' );
function agron_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'agron_support_awesome_pro' );
function agron_support_awesome_pro() {
	return false;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'agron_add_icons_to_pxl_iconpicker_field' );
function agron_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "agron_add_icons_to_megamenu");
function agron_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'agron_comment_field_to_bottom' );
function agron_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/* ------ Export Settings ---- */
add_filter( 'pxl_export_wp_settings', 'agron_export_wp_settings' );
function agron_export_wp_settings($wp_options){
  $wp_options[] = 'mc4wp_default_form_id';
  return $wp_options;
}

/* ------ Theme Info ---- */
add_filter( 'pxl_server_info', 'agron_add_server_info');
function agron_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.casethemes.net/',
    'docs_url' => 'https://doc.casethemes.net/agron/',
    'plugin_url' => 'https://api.casethemes.net/plugins/',
    'demo_url' => 'https://agron.casethemes.net/',
    'support_url' => 'https://casethemes.ticksy.com/',
    'help_url' => 'https://doc.casethemes.net/agron',
    'email_support' => 'casethemesagency@gmail.com',
    'video_url' => '#'
  ];
  
  return $infos;
}

/* ------ Template Filter ---- */
add_filter( 'pxl_template_type_support', 'agron_template_type_support' );
function agron_template_type_support($type) {
	$extra_type = [
		'header'          => esc_html__('Header Desktop', 'agron'),
		'header-mobile'   => esc_html__('Header Mobile', 'agron'),
        'footer'          => esc_html__('Footer', 'agron'), 
        'mega-menu'       => esc_html__('Mega Menu', 'agron') ,
		'page-title'      => esc_html__('Page Title', 'agron'), 
		'post-title'      => esc_html__('Post Title', 'agron'), 
		'dynamic-panel'   => esc_html__('Dynamic Panel', 'agron'),
		'archive'         => esc_html__('Archive', 'agron')
	];
	return $extra_type;
}

/* Search Result  */
function agron_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'project', 'service', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'agron_custom_post_types_in_search_results' );

/* Add Custom Font Face */
add_filter( 'elementor/fonts/groups', 'agron_update_elementor_font_groups_control' );
function agron_update_elementor_font_groups_control($font_groups){
  $pxlfonts_group = array( 'pxlfonts' => esc_html__( 'Agron Fonts', 'agron' ) );
  return array_merge( $pxlfonts_group, $font_groups );
}

add_filter( 'elementor/fonts/additional_fonts', 'agron_update_elementor_font_control' );
function agron_update_elementor_font_control($additional_fonts){
  $additional_fonts['Julietta-Messie'] = 'pxlfonts';
  $additional_fonts['Glittery Snowfall'] = 'pxlfonts';
  return $additional_fonts;
}

// add custom font to redux
add_filter( 'redux/'.agron()->get_option_name().'/field/typography/custom_fonts', 'agron_add_redux_option_typo_customfont', 10, 1 ); 
function agron_add_redux_option_typo_customfont($fonts){
	$fonts = [
		'Theme Custom Fonts' => [
			'Glittery-Snowfall' => 'Glittery Snowfall',
		]
	];
	return $fonts;
}