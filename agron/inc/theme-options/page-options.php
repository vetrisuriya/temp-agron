<?php
 
add_action( 'pxl_post_metabox_register', 'agron_page_options_register' );
function agron_page_options_register( $metabox ) {
 
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'agron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Settings', 'agron' ),
					'icon'   => 'el el-cog',
					'fields' => array(
						array(
							'id' => 'post_layout_heading',
							'title' => esc_html__('Layout', 'agron'),
							'type'  => 'section',
							'indent' => true,
						),
						agron_sidebar_options(['prefix' => 'post', 'page_option' => true, 'default' => 'inherit']),
						array(
							'id'             => 'content_spacing',
							'type'           => 'spacing',
							'output'         => array( '#pxl-wrapper #pxl-main .container > .inner, #pxl-wrapper #pxl-main .elementor-container > .inner ' ),
							'right'          => false,
							'left'           => false,
							'mode'           => 'padding',
							'units'          => array( 'px' ),
							'units_extended' => 'false',
							'title'          => esc_html__( 'Spacing Top/Bottom', 'agron' ),
							'default'        => array(
								'padding-top'    => '',
								'padding-bottom' => '',
								'units'          => 'px',
							)
						),
						array(
							'id' => 'post_featured_heading',
							'title' => esc_html__('Featured', 'agron'),
							'type'  => 'section',
							'indent' => true,
						),
						array(
							'id'       => 'post_featured_type',
							'type'     => 'button_set',
							'title'    => esc_html__('Featured Type', 'agron'),
							'options'  => array(
								''     => esc_html__('Default', 'agron'),
								'video'  => esc_html__('Video', 'agron'),
								'carousel'  => esc_html__('Carousel', 'agron'),
							),
							'default'  => '',
						),
						array(
							'id'       => 'post_video_link',
							'type'     => 'text',
							'title'    => esc_html__('Video Link', 'agron'),
							'required' => array( 'post_featured_type', '=', 'video' ),
						),
						array(
							'id'       => 'post_gallery_images',
							'type'     => 'gallery',
							'title'    => esc_html__('Gallery Images', 'agron'),
							'required' => array( 'post_featured_type', '=', 'carousel' ),
						),
					),
				],
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'agron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'agron' ),
					'icon'   => 'eicon-header',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'agron'),
								'options'  => array(
									'show'  => esc_html__('Show', 'agron'),
									'hide'  => esc_html__('Hide', 'agron'),
								),
								'default'  => 'show',
							),
							array(
				                'id'       => 'primary_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Header Menu', 'agron' ),
				                'options'  => agron_get_nav_menu_slug(),
				                'default' => '',
				                'description' => 'When you select Custom Menu. The custom menu will apply to the entire layout when you use Case Nav Menu widget in Elementor and Menu on header layout in Mobile.'
				            ),
							array(
								'id' => 'header_desktop_heading',
								'title' => esc_html__('Header Desktop', 'agron'),
								'type'  => 'section',
								'indent' => true,
								'required'   => array('header_display', '=', 'show'),
							),
						),
						agron_header_opts([
							'default' => true, 
							'default_value' => '-1'
						]),
						array(
							array(
								'id'       => 'header_sticky_show_on_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'agron'),
								'options'  => array(
									'-1'         => esc_html__('Inherit', 'agron'),
									'scroll-up'  => esc_html__('Scroll To Top', 'agron'),
									'scroll-down'  => esc_html__('Scroll To Bottom', 'agron'),
								),
								'default'  => 'scroll-up',
								'required' => array( 0 => 'header_layout_sticky', 1 => '!=', 2 => '' ),
							),
							array(
								'id' => 'header_mobile_heading',
								'title' => esc_html__('Header Mobile', 'agron'),
								'type'  => 'section',
								'indent' => true,
							),
						),
						agron_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_mobile_logo',
								'type'     => 'media',
								'title'    => esc_html__('Mobile Logo', 'agron'),
								'url'      => false,
								'desc'    => sprintf(esc_html__('You can also choose a logo to apply to each Page. Please edit the page and you will see Page Options. %sView Now.%s','agron'),'<a class="pxl-admin-popup" href="' . esc_url( get_template_directory_uri() ) . '/inc/theme-options/instruct/logo_m_page.png">','</a>'),
							),
						)
					),
				],
				'layouts' => [
					'title'  => esc_html__( 'Layouts', 'agron' ),
					'icon'   => 'eicon-layout-settings',
					'fields' => array_merge(
						array(
							array(
								'id' => 'page_breadcrumb_heading',
								'title' => esc_html__('Breadcrumb', 'agron'),
								'type'  => 'section',
								'indent' => true,
							),
							array(
								'id'       => 'page_breadcrumb',
								'type'     => 'button_set',
								'title'    => esc_html__('Breadcrumb', 'agron'),
								'options'  => array(
									'default' => esc_html__('Default', 'agron'),
									'custom'  => esc_html__('Custom', 'agron'),
								),
								'default'  => 'default',
							),   
							array(
								'id'       => 'page_breadcrumb_text',
								'type'     => 'text',
								'title'    => esc_html__('Breadcrumb Text', 'agron'),
								'required' => array( 0 => 'page_breadcrumb', 1 => 'equals', 2 => 'custom' ),
							),
							array(
								'id' => 'page_title_heading',
								'title' => esc_html__('Page Title', 'agron'),
								'type'  => 'section',
								'indent' => true,
							),
						),
				        agron_page_title_options([
							'default'         => true,
							'default_value'   => 'inherit'
						]),
				        array(
							array(
								'id'       => 'page_title_custom',
								'type'     => 'text',
								'title'    => esc_html__('Page Title Custom', 'agron'),
							),
							array(
								'id' => 'sidebar_heading',
								'title' => esc_html__('Sidebar', 'agron'),
								'type'  => 'section',
								'indent' => true,
							),
							agron_sidebar_options([
								'prefix' => 'page', 
								'default' => 'disable'
							]),
							// array(
							// 	'id'       => 'container_max_width',
							// 	'type'     => 'text',
							// 	'title'    => esc_html__('Container Max Width', 'agron'),
							// 	'desc'     => 'Nhập max-width như 1300px, 100%, 80rem...',
							// 	'default'  => '1300px',
							// 	'output'   => array('#pxl-wrapper #pxl-main .container, #pxl-wrapper #pxl-main .elementor-container'),
							// 	'output_properties' => array('max-width') 
							// ),
					    ),
				    ),
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'agron' ),
					'icon'   => 'eicon-footer',
					'fields' => array(
						array(
							'id'       => 'footer_display',
							'type'     => 'button_set',
							'title'    => esc_html__('Footer Display', 'agron'),
							'options'  => array(
								'show' => esc_html__('Show', 'agron'),
								'hide'  => esc_html__('Hide', 'agron'),
							),
							'default'  => 'show',
						),
						array(
							'id'          => 'footer_layout',
							'type'        => 'select',
							'title'       => esc_html__('Footer Layout', 'agron'),
							'desc'        => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','agron'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
							'options'     => agron_get_templates_option('footer', true),
							'default'     => '-1',
							'required'   => array('footer_display', '=', 'show'),
						),
						array(
							'id'       => 'footer_fixed',
							'type'     => 'button_set',
							'title'    => esc_html__('Footer Fixed', 'agron'),
							'options'  => array(
								'inherit' => esc_html__('Inherit', 'agron'),
								'on' => esc_html__('On', 'agron'),
								'off' => esc_html__('Off', 'agron'),
							),
							'default'  => 'inherit',
							'required'   => array('footer_display', '=', 'show'),
						),
					)
				    
				],
				'appearance' => [
					'title'  => esc_html__( 'Appearance', 'agron' ),
					'icon'   => 'eicon-custom',
					'fields' => array(
						array(
							'id' => 'general_heading',
							'title' => esc_html__('General', 'agron'),
							'type'  => 'section',
							'indent' => true,
						),
						array(
							'id' => 'body_custom_class',
							'type' => 'text',
							'title' => esc_html__('Body Custom Class', 'agron'),
						), 
						array(
							'id' => 'colors_heading',
							'title' => esc_html__('Colors', 'agron'),
							'type'  => 'section',
							'indent' => true,
						),
						array(
							'id'        => 'body_background_color',
							'type'      => 'color',
							'title'     => esc_html__('Body Background Color', 'agron'),
							'default'   => '',
							'transparent' => false,
							'output'    => array(
								'background-color' => 'body',
							)
						),
						array(
							'id'          => 'primary_color',
							'type'        => 'color',
							'title'       => esc_html__('Primary Color', 'agron'),
							'transparent' => false,
							'default'     => ''
						),
						array(
							'id'          => 'secondary_color',
							'type'        => 'color',
							'title'       => esc_html__('Secondary Color', 'agron'),
							'transparent' => false,
							'default'     => ''
						),
						array(
							'id'          => 'third_color',
							'type'        => 'color',
							'title'       => esc_html__('Third Color', 'agron'),
							'transparent' => false,
							'default'     => ''
						),
					)
				],
			]
		],
		'project' => [
			'opt_name'            => 'pxl_project_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'agron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'agron' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'agron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'agron' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'agron'),
					            'validate' => 'url',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'service_svg',
					            'type'     => 'media',
					            'title'    => esc_html__('SVG Icon', 'agron'),
					            'default' => '',
				            	'force_output' => true
					        ),
						),
				    )
				],
			]
		],
		'team' => [
			'opt_name'            => 'pxl_team_options',
			'display_name'        => esc_html__( 'Options', 'agron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'info' => [
					'title'  => esc_html__( 'Info', 'agron' ),
					'icon'   => 'eicon-user-circle-o',
					'fields' => array(					
						array(
							'id'=> 'team_position',
							'type' => 'text',
							'title' => esc_html__('Position', 'agron'),
							'placeholder' => esc_html__('Formal Farmer', 'agron'),
						),
						array(
							'id' => 'team_socials_heading',
							'title' => esc_html__('Socials', 'agron'),
							'type'  => 'section',
							'indent' => true,
						),
						array(
							'id' => 'team_social',
							'type' => 'select',
							'multi' => true,
							'title' => __('Social Share', 'agron'),
							'options' => array(
								'_facebook'  => __('Facebook','agron'),
								'_dribbble'  => __('Dribbble', 'agron'),
								'_instagram' => __('Instagram','agron'), 
								'_x'         => __('X (Twitter)','agron'),
								'_pinterest' => __('Pinterest','agron'), 
								'_youtube'   => __('Youtube','agron'), 
								'_linkedin'  => __('Linkedin','agron'), 
								'_behance'   => __('Behance', 'agron'),
							), 
							'default'  => array('_facebook','_dribbble','_instagram', '_x'),
						), 
						array(
							'id'       => 'link_social_dribbble',
							'title'    => esc_html__('Link Dribbble', 'agron'),
							'type'     => 'text',
							'default'  => '#',
							'required' => array( 0 => 'team_social', 1 => 'equals', 2 => '_dribbble' ),
						),
						array(
							'id'       => 'link_social_facebook',
							'title'    => esc_html__('Link Facebook', 'agron'),
							'type'     => 'text',
							'default'  => '#',
							'required' => array( 0 => 'team_social', 1 => 'equals', 2 => '_facebook' ),
						),
						array(
							'id'       => 'link_social_instagram',
							'title'    => esc_html__('Link Instagram', 'agron'),
							'type'     => 'text',
							'default'  => '#',
							'required' => array( 0 => 'team_social', 1 => 'equals', 2 => '_instagram' ),
						),
						array(
							'id'       => 'link_social_x',
							'title'    => esc_html__('Link X (Twitter)', 'agron'),
							'type'     => 'text',
							'default'  => '#',
							'required' => array( 0 => 'team_social', 1 => 'equals', 2 => '_x' ),
						),
						array(
							'id'       => 'link_social_pinterest',
							'title'    => esc_html__('Link Pinterest', 'agron'),
							'type'     => 'text',
							'default'  => '#',
							'required' => array( 0 => 'team_social', 1 => 'equals', 2 => '_pinterest' ),
						),
						array(
							'id'       => 'link_social_youtube',
							'title'    => esc_html__('Link Youtube', 'agron'),
							'type'     => 'text',
							'default'  => '#',
							'required' => array( 0 => 'team_social', 1 => 'equals', 2 => '_youtube' ),
						),
						array(
							'id'       => 'link_social_linkedin',
							'title'    => esc_html__('Link Linkedin', 'agron'),
							'type'     => 'text',
							'default'  => '#',
							'required' => array( 0 => 'team_social', 1 => 'equals', 2 => '_linkedin' ),
						),
						array(
							'id'       => 'link_social_behance',
							'title'    => esc_html__('Link Behance', 'agron'),
							'type'     => 'text',
							'default'  => '#',
							'required' => array( 0 => 'team_social', 1 => 'equals', 2 => '_behance' ),
						),
					),
				],
				// 'layouts' => [
				// 	'title'  => esc_html__( 'Layouts', 'agron' ),
				// 	'icon'   => 'eicon-layout-settings',
				// 	'fields' => array_merge(
				// 		array(
				// 			array(
				// 				'id' => 'page_title_heading',
				// 				'title' => esc_html__('Page Title', 'agron'),
				// 				'type'  => 'section',
				// 				'indent' => true,
				// 			),
				// 		),
				//         array(
				// 			array(
				// 				'id'       => 'page_title_custom',
				// 				'type'     => 'text',
				// 				'title'    => esc_html__('Post Title Custom', 'agron'),
				// 			),
				// 			// array(
				// 			// 	'id' => 'sidebar_heading',
				// 			// 	'title' => esc_html__('Sidebar', 'agron'),
				// 			// 	'type'  => 'section',
				// 			// 	'indent' => true,
				// 			// ),
				// 			// agron_sidebar_options([
				// 			// 	'prefix' => 'page', 
				// 			// 	'default' => 'disable'
				// 			// ]),
				// 			// array(
				// 			// 	'id'       => 'container_max_width',
				// 			// 	'type'     => 'text',
				// 			// 	'title'    => esc_html__('Container Max Width', 'agron'),
				// 			// 	'desc'     => 'Nhập max-width như 1300px, 100%, 80rem...',
				// 			// 	'default'  => '1300px',
				// 			// 	'output'   => array('#pxl-wrapper #pxl-main .container, #pxl-wrapper #pxl-main .elementor-container'),
				// 			// 	'output_properties' => array('max-width') 
				// 			// ),

				// 	    ),
				//     ),
				// ],
				'appearance' => [
					'title'  => esc_html__( 'Appearance', 'agron' ),
					'icon'   => 'eicon-custom',
					'fields' => array(
						array(
							'id' => 'general_heading',
							'title' => esc_html__('General', 'agron'),
							'type'  => 'section',
							'indent' => true,
						),
						array(
							'id' => 'body_custom_class',
							'type' => 'text',
							'title' => esc_html__('Body Custom Class', 'agron'),
						),
						array(
							'id' => 'colors_heading',
							'title' => esc_html__('Colors', 'agron'),
							'type'  => 'section',
							'indent' => true,
						),
						array(
							'id'        => 'body_background_color',
							'type'      => 'color',
							'title'     => esc_html__('Body Background Color', 'agron'),
							'default'   => '',
							'transparent' => false,
							'output'    => array(
								'background-color' => 'body',
							)
						),
						array(
							'id'          => 'primary_color',
							'type'        => 'color',
							'title'       => esc_html__('Primary Color', 'agron'),
							'transparent' => false,
							'default'     => ''
						),
						array(
							'id'          => 'secondary_color',
							'type'        => 'color',
							'title'       => esc_html__('Secondary Color', 'agron'),
							'transparent' => false,
							'default'     => ''
						),
						array(
							'id'          => 'third_color',
							'type'        => 'color',
							'title'       => esc_html__('Third Color', 'agron'),
							'transparent' => false,
							'default'     => ''
						),
					)
				],
			],
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Options', 'agron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'info' => [
					'title'  => esc_html__( 'Info', 'agron' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
				        array(
							'id'    => 'product_excerpt',
							'type'  => 'textarea',
							'title' => esc_html__('Excerpt', 'agron'),
							'rows'  => 10,
				        ),
					),
				    
				],
			]
		],
		'pxl-template' => [
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Options', 'agron' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'agron' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'agron'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'agron'), 
								'header'       => esc_html__('Header Desktop', 'agron'),
								'header-mobile'=> esc_html__('Header Mobile', 'agron'),
								'footer'       => esc_html__('Footer', 'agron'), 
								'mega-menu'    => esc_html__('Mega Menu', 'agron'), 
								'page-title'   => esc_html__('Page Title', 'agron'), 
								'post-title'   => esc_html__('Post Title', 'agron'), 
								'dynamic-panel' => esc_html__('Dynamic Panel', 'agron'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'agron'),
				            'options' => [
				            	'pxl-header-default'       	   => esc_html__('Default', 'agron'), 
								'pxl-header-transparent'       => esc_html__('Transparent', 'agron'),
				            ],
				            'default' => 'pxl-header-default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),
						array(
							'id'        => 'template_background_overlay',
							'type'      => 'color',
							'title'     => esc_html__('Background Overlay', 'agron'),
							'default'   => '',
							'transparent' => false,
							'output'    => array(
								'background-color' => 'pxl-template-overlay',
							),
							'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'dynamic-panel' ),
						),
					),
				    
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 