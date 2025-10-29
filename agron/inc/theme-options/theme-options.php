<?php
add_action('after_setup_theme', 'theme_options_setup', 1);

function theme_options_setup() {
    if (!class_exists('ReduxFramework')) {
        return;
    }
    
    $opt_name = agron()->get_option_name();
    $version = agron()->get_version();
    
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => '', //$theme->get('Name'),
        // Name that appears at the top of your panel
        'display_version'      => $version,
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__('Theme Options', 'agron'),
        'page_title'           => esc_html__('Theme Options', 'agron'),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        'show_options_object' => false,
        // OPTIONAL -> Give you extra features
        'page_priority'        => 80,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'pxlart', //class_exists('Agron_Admin_Page') ? 'case' : '',
        // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'pxlart-theme-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
    
        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
    
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        ),
    );
    
    Redux::SetArgs($opt_name, $args);
    
    // Color
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Global Colors', 'agron'),
        'icon'       => 'el el-filter',
        'fields' => array(
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
            // array(
            //     'id'      => 'link_color',
            //     'type'    => 'link_color',
            //     'title'   => esc_html__('Link Colors', 'agron'),
            //     'default' => array(
            //         'regular' => '',
            //         'hover'   => '',
            //         'active'  => ''
            //     ),
            //     'output'  => array('a')
            // ),
            // array(
            //     'id'          => 'gradient_color',
            //     'type'        => 'color_gradient',
            //     'title'       => esc_html__('Gradient Color', 'agron'),
            //     'transparent' => false,
            //     'default'  => array(
            //         'from' => '',
            //         'to'   => '', 
            //     ),
            // ),
        )
    ));
    
    // Typography
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Typography', 'agron'),
        'icon'   => 'el-icon-text-width',
        'fields' => array(
            array(
                'id'          => 'primary_font',
                'type'        => 'typography',
                'title'       => esc_html__('Primary Font', 'agron'),
                'google'      => false,
                'font-backup' => false,
                'all_styles'  => false,
                'line-height'  => false,
                'font-size'  => false,
                'color'  => false,
                'font-style'  => false,
                'font-weight'  => false,
                'text-align'  => false,
            ),
            array(
                'id'          => 'secondary_font',
                'type'        => 'typography',
                'title'       => esc_html__('Secondary Font', 'agron'),
                'google'      => false,
                'font-backup' => false,
                'all_styles'  => false,
                'line-height'  => false,
                'font-size'  => false,
                'color'  => false,
                'font-style'  => false,
                'font-weight'  => false,
                'text-align'  => false,
            ),
            array(
                'id'          => 'heading_font',
                'type'        => 'typography',
                'title'       => esc_html__('Heading Font', 'agron'),
                'google'      => false,
                'font-backup' => false,
                'all_styles'  => false,
                'line-height'  => false,
                'font-size'  => false,
                'font-style'  => false,
                'font-weight'  => true,
                'text-align'  => false,
                'color' => true
            ),
            array(
                'id'          => 'font_heading_h1',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H1', 'agron'),
                'google'      => false,
                'font-backup' => false,
                'all_styles'  => true,
                'text-align'  => false,
                'line-height' => true,
                'font-size'   => true,
                'font-backup' => false,
                'font-style'  => false,
                'output'      => array('h1', '.h1'),
                'units'       => 'px',
                'font-family' => false,
                'color' => false
            ),
    
            array(
                'id'          => 'font_heading_h2',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H2', 'agron'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'line-height' => true,
                'font-size'   => true,
                'font-backup' => false,
                'font-style'  => false,
                'output'      => array('h2', '.h2'),
                'units'       => 'px',
                'font-family' => false,
                'color' => false
            ),
    
            array(
                'id'          => 'font_heading_h3',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H3', 'agron'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'line-height' => true,
                'font-size'   => true,
                'font-backup' => false,
                'font-style'  => false,
                'output'      => array('h3', '.h3'),
                'units'       => 'px',
                'font-family' => false,
                'color' => false
            ),
    
            array(
                'id'          => 'font_heading_h4',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H4', 'agron'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'line-height' => true,
                'font-size'   => true,
                'font-backup' => false,
                'font-style'  => false,
                'output'      => array('h4', '.h4'),
                'units'       => 'px',            
                'font-family' => false,
                'color' => false
            ),
    
            array(
                'id'          => 'font_heading_h5',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H5', 'agron'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'line-height' => true,
                'font-size'   => true,
                'font-backup' => false,
                'font-style'  => false,
                'output'      => array('h5', '.h5'),
                'units'       => 'px',
                'font-family' => false,
                'color' => false
            ),
    
            array(
                'id'          => 'font_heading_h6',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H6', 'agron'),
                'google'      => true,
                'font-backup' => true,
                'all_styles'  => true,
                'text-align'  => false,
                'line-height' => true,
                'font-size'   => true,
                'font-backup' => false,
                'font-style'  => false,
                'output'      => array('h6', '.h6'),
                'units'       => 'px',
                'font-family' => false,
                'color' => false
            ),
        )
    ));
    
    // General
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('General', 'agron'),
        'icon'   => 'el el-wrench',
        'fields' => array(
            array(
                'id'       => 'site_loader',
                'type'     => 'button_set',
                'title'    => esc_html__('Site Loader', 'agron'),
                'options'  => array(
                    'on' => esc_html__('On', 'agron'),
                    'off' => esc_html__('Off', 'agron'),
                ),
                'default'  => 'off',
            ),
            array(
                'id'       => 'mouse_move_animation',
                'type'     => 'button_set',
                'title'    => esc_html__('Mouse Move Animation', 'agron'),
                'options'  => array(
                    'on' => esc_html__('On', 'agron'),
                    'off' => esc_html__('Off', 'agron'),
                ),
                'default'  => 'off',
            ),
            array(
                'id'       => 'smooth_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Smooth Scroll', 'agron'),
                'options'  => array(
                    'on' => esc_html__('On', 'agron'),
                    'off' => esc_html__('Off', 'agron'),
                ),
                'default'  => 'off',
            ),
            array(
                'id'       => 'button_back_to_top',
                'type'     => 'switch',
                'title'    => esc_html__('Back to Top', 'agron'),
                'default'  => false,
            ),
        )
    ));
    
    // Header
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Header', 'agron'),
        'icon'   => 'el el-indent-left',
        'fields' => array_merge(
            array(
                array(
                    'id' => 'header_desktop_heading',
                    'title' => esc_html__('Header Desktop', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
            ),
            agron_header_opts(),
            array(
                array(
                    'id'       => 'header_sticky_show_on_scroll',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Sticky Scroll', 'agron'),
                    'options'  => array(
                        'scroll-up' => esc_html__('Scroll To Top', 'agron'),
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
            agron_header_mobile_opts(),
            array(
                array(
                    'id'       => 'header_mobile_logo',
                    'type'     => 'media',
                    'title'    => esc_html__('Mobile Logo', 'agron'),
                     'default' => array(
                        'url'=>get_template_directory_uri().'/assets/img/logo.png'
                    ),
                    'url'      => false,
                    'desc'    => sprintf(esc_html__('You can also choose a logo to apply to each Page. Please edit the page and you will see Page Options. %sView Now.%s','agron'),'<a class="pxl-admin-popup" href="' . esc_url( get_template_directory_uri() ) . '/inc/theme-options/instruct/logo_m_page.png">','</a>'),
                ),
            )
        ),
    ));
    
    // Footer
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Footer', 'agron'),
        'icon'   => 'el el-website',
        'fields' => array_merge(
            agron_footer_opts(),
        )
        
    ));

    // Pages Settings
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Pages', 'agron'),
        'icon'  => 'eicon-progress-tracker',
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('Page Title', 'agron'),
                    'type'  => 'section',
                    'id' => 'page_general_h',
                    'indent' => true,
                ),
            ),
            agron_page_title_options(),
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Search Result', 'agron'),
        'icon'       => 'eicon-search-results',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'id' => 'search_general_heading',
                    'title' => esc_html__('General', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                agron_sidebar_options(['prefix' => 'search']),
                array(
                    'id' => 'sg_search_title_h',
                    'title' => esc_html__('Search Title', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
            ),
            agron_post_title_opts('search'),
            array(
                array(
                    'id'       => 'search_title_custom',
                    'type'     => 'text',
                    'title'    => esc_html__('Post Title Custom', 'agron'),
                    'required' => array('search_title_mode', '!=', 'disable'),
                    'default'  => esc_html__('Search Results', 'agron'),
                ),
                array(
                    'id' => 'search_breadcrumb_heading',
                    'title' => esc_html__('Breadcrumb', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'search_breadcrumb',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Search Title', 'agron'),
                    'options'  => array(
                        'default' => esc_html__('Use Search Title', 'agron'),
                        'custom'  => esc_html__('Use Custom Title', 'agron'),
                    ),
                    'default'  => 'default',
                ),       
                array(
                    'id'      => 'search_breadcrumb_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Custom Search Title', 'agron'),
                    'default' => esc_html__('Search Results', 'agron'),
                    'required' => array( 0 => 'search_breadcrumb', 1 => 'equals', 2 => 'custom' ),
                ),     
            ),
        ),
    ));
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('404 Error', 'agron'),
        'icon'   => 'eicon-error-404',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'on_page_title_404',
                'type'     => 'switch',
                'title'    => esc_html__('Page Title', 'agron'),
                'default'  => true,
            ),
            array(
                'id'      => '404_page_title_custom',
                'type'    => 'text',
                'title'   => esc_html__('Page Title', 'agron'),
                'default' => esc_html__('404 Page', 'agron'),
                'required' => array( 0 => 'on_page_title_404', 1 => 'equals', 2 => true ),
            ),
            array(
                'id'       => '404_layout',
                'type'     => 'button_set',
                'title'    => esc_html__('Layout', 'agron'),
                'options'  => array(
                    'default' => esc_html__('Default', 'agron'),
                    'builder' => esc_html__('Builder', 'agron'),
                ),
                'default'  => 'default',
            ),
            agron_get_pages('404'),
        )
    ));
        
    // Standard
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Blog', 'agron'),
        'icon'  => 'eicon-post',
        'fields'     => array(
        )
    ));
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Blog Standard', 'agron'),
        'icon'  => 'eicon-archive-posts',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'blog_display_h',
                'title' => esc_html__('Display', 'agron'),
                'type'  => 'section',
                'indent' => true,
            ),
            agron_sidebar_options(),
            array(
                'id'       => 'blog_title_custom',
                'type'     => 'text',
                'title'    => esc_html__('Post Title Custom', 'agron'),
                'default'  => esc_html__('Our Blog & News', 'agron'),
            ),
            array(
                'id' => 'blog_breadcrumb_heading',
                'title' => esc_html__('Breadcrumb', 'agron'),
                'type'  => 'section',
                'indent' => true,
            ),
            array(
                'id'       => 'blog_breadcrumb',
                'type'     => 'button_set',
                'title'    => esc_html__('Breadcrumb', 'agron'),
                'options'  => array(
                    'default' => esc_html__('Default', 'agron'),
                    'custom'  => esc_html__('Custom', 'agron'),
                ),
                'default'  => 'default',
            ),            
            array(
                'id'      => 'blog_breadcrumb_text',
                'type'    => 'text',
                'title'   => esc_html__('Breadcrumb Text', 'agron'),
                'default' => esc_html__('Blog', 'agron'),
                'required' => array( 0 => 'blog_breadcrumb', 1 => 'equals', 2 => 'custom' ),
            ),
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Post', 'agron'),
        'icon'       => 'eicon-single-post',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'id' => 'single_post_general_heading',
                    'title' => esc_html__('General', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                agron_sidebar_options(['prefix' => 'post']),
                array(
                    'id' => 'single_post_title_heading',
                    'title' => esc_html__('Post Title', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
            ),
            agron_post_title_opts(),
            array(
                array(
                    'id'       => 'single_post_title_custom',
                    'type'     => 'text',
                    'title'    => esc_html__('Post Title Custom', 'agron'),
                    'required' => array('team_title_mode', '!=', 'disable'),
                ),
                array(
                    'id' => 'single_post_breadcrumb_heading',
                    'title' => esc_html__('Breadcrumb', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'single_post_breadcrumb',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Breadcrumb', 'agron'),
                    'options'  => array(
                        'default' => esc_html__('Default', 'agron'),
                        'custom'  => esc_html__('Custom', 'agron'),
                    ),
                    'default'  => 'default',
                ),            
                array(
                    'id'      => 'single_post_breadcrumb_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Breadcrumb Text', 'agron'),
                    'default' => esc_html__('Blog Details', 'agron'),
                    'required' => array( 0 => 'single_post_breadcrumb', 1 => 'equals', 2 => 'custom' ),
                ),
                array(
                    'id' => 'single_post_display_heading',
                    'title' => esc_html__('Display', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'single_post_author',
                    'title'    => esc_html__('Author', 'agron'),
                    'subtitle' => esc_html__('Display the Author for blog post.', 'agron'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'single_post_tags',
                    'title'    => esc_html__('Tags', 'agron'),
                    'subtitle' => esc_html__('Display the Tag for blog post.', 'agron'),
                    'type'     => 'switch',
                    'default'  => true
                ),
                array(
                    'id'       => 'single_post_social_share',
                    'title'    => esc_html__('Social Share', 'agron'),
                    'subtitle' => esc_html__('Display the Social Share for blog post.', 'agron'),
                    'type'     => 'switch',
                    'default'  => true,
                ),
                array(
                    'id'       => 'single_post_social_vimeo',
                    'title'    => esc_html__('Vimeo', 'agron'),
                    'type'     => 'switch',
                    'default'  => true,
                    'indent' => true,
                    'required' => array( 0 => 'single_post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'single_post_social_facebook',
                    'title'    => esc_html__('Facebook', 'agron'),
                    'type'     => 'switch',
                    'default'  => true,
                    'indent' => true,
                    'required' => array( 0 => 'single_post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'single_post_social_instagram',
                    'title'    => esc_html__('Instagram', 'agron'),
                    'type'     => 'switch',
                    'default'  => true,
                    'indent' => true,
                    'required' => array( 0 => 'single_post_social_share', 1 => 'equals', 2 => '1' ),
                ),
                array(
                    'id'       => 'single_post_social_twitter',
                    'title'    => esc_html__('Twitter', 'agron'),
                    'type'     => 'switch',
                    'default'  => true,
                    'indent' => true,
                    'required' => array( 0 => 'single_post_social_share', 1 => 'equals', 2 => '1' ),
                ),
            ),
        ),
    ));
    
    // Project Settings
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Project', 'agron'),
        'icon'  => 'eicon-post-content',
        'fields'     => array(
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Project Archive', 'agron'),
        'icon'       => 'eicon-archive-posts',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('General', 'agron'),
                    'type'  => 'section',
                    'id' => 'project_general_h',
                    'indent' => true,
                ),
                array(
                    'id'       => 'project_display',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Project', 'agron'),
                    'options'  => array(
                        'on' => esc_html__('On', 'agron'),
                        'off' => esc_html__('Off', 'agron'),
                    ),
                    'default'  => 'on',
                ),
                array(
                    'id'      => 'project_slug',
                    'type'    => 'text',
                    'title'   => esc_html__('Project Slug', 'agron'),
                    'default' => '',
                    'desc'     => 'Default: project',
                    'required' => array( 0 => 'project_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
                array(
                    'id'      => 'project_name',
                    'type'    => 'text',
                    'title'   => esc_html__('Project Name', 'agron'),
                    'default' => '',
                    'desc'     => 'Default: Project',
                    'required' => array( 0 => 'project_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
                array(
                    'id'    => 'archive_project_link',
                    'type'  => 'select',
                    'title' => esc_html__( 'Custom Archive Page Link', 'agron' ), 
                    'data'  => 'page',
                    'args'  => array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                    ),
                    'required' => array( 0 => 'project_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
    
            ),
        ),
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Project', 'agron'),
        'icon'       => 'eicon-single-post',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('Post Title', 'agron'),
                    'type'  => 'section',
                    'id' => 'project_title_heading',
                    'indent' => true,
                ),
            ),
            agron_post_title_opts('project'),
            array(
                array(
                    'id'       => 'single_project_title_custom',
                    'type'     => 'text',
                    'title'    => esc_html__('Post Title Custom', 'agron'),
                    'required' => array('project_title_mode', '!=', 'disable'),
                ),
                array(
                    'id' => 'single_project_breadcrumb_heading',
                    'title' => esc_html__('Breadcrumb', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'single_project_breadcrumb',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Post Title', 'agron'),
                    'options'  => array(
                        'default' => esc_html__('Default', 'agron'),
                        'custom'  => esc_html__('Custom', 'agron'),
                    ),
                    'default'  => 'default',
                ),            
                array(
                    'id'      => 'single_project_breadcrumb_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Breadcrumb Text', 'agron'),
                    'default' => esc_html__('Project Details', 'agron'),
                    'required' => array( 0 => 'single_project_breadcrumb', 1 => 'equals', 2 => 'custom' ),
                ),
            )
        ),
    ));

    // Service Settings
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Service', 'agron'),
        'icon'  => 'eicon-site-identity',
        'fields'     => array(
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Service Archive', 'agron'),
        'icon'       => 'eicon-archive-posts',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('General', 'agron'),
                    'type'  => 'section',
                    'id' => 'service_general_h',
                    'indent' => true,
                ),
                array(
                    'id'       => 'service_display',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Service', 'agron'),
                    'options'  => array(
                        'on' => esc_html__('On', 'agron'),
                        'off' => esc_html__('Off', 'agron'),
                    ),
                    'default'  => 'on',
                ),
                array(
                    'id'      => 'service_slug',
                    'type'    => 'text',
                    'title'   => esc_html__('Service Slug', 'agron'),
                    'default' => '',
                    'desc'     => 'Default: service',
                    'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
                array(
                    'id'      => 'service_name',
                    'type'    => 'text',
                    'title'   => esc_html__('Service Name', 'agron'),
                    'default' => '',
                    'desc'     => 'Default: Service',
                    'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
                array(
                    'id'    => 'archive_service_link',
                    'type'  => 'select',
                    'title' => esc_html__( 'Custom Archive Page Link', 'agron' ), 
                    'data'  => 'page',
                    'args'  => array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                    ),
                    'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
    
            ),
        ),
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Service', 'agron'),
        'icon'       => 'eicon-single-post',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('Post Title', 'agron'),
                    'type'  => 'section',
                    'id' => 'service_title_heading',
                    'indent' => true,
                ),
            ),
            agron_post_title_opts('service'),
            array(
                array(
                    'id'       => 'single_service_title_custom',
                    'type'     => 'text',
                    'title'    => esc_html__('Post Title Custom', 'agron'),
                    'required' => array('service_title_mode', '!=', 'disable'),
                ),
                array(
                    'id' => 'single_service_breadcrumb_heading',
                    'title' => esc_html__('Breadcrumb', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'single_service_breadcrumb',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Post Title', 'agron'),
                    'options'  => array(
                        'default' => esc_html__('Default', 'agron'),
                        'custom'  => esc_html__('Custom', 'agron'),
                    ),
                    'default'  => 'default',
                ),            
                array(
                    'id'      => 'single_service_breadcrumb_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Breadcrumb Text', 'agron'),
                    'default' => esc_html__('Service Details', 'agron'),
                    'required' => array( 0 => 'single_service_breadcrumb', 1 => 'equals', 2 => 'custom' ),
                ),
            )
        ),
    ));
    
    // Team Settings
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Team', 'agron'),
        'icon'  => 'eicon-person',
        'fields'     => array(
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Team Archive', 'agron'),
        'icon'       => 'eicon-archive-posts',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('General', 'agron'),
                    'type'  => 'section',
                    'id' => 'team_general_h',
                    'indent' => true,
                ),
                array(
                    'id'       => 'team_display',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Team', 'agron'),
                    'options'  => array(
                        'on' => esc_html__('On', 'agron'),
                        'off' => esc_html__('Off', 'agron'),
                    ),
                    'default'  => 'on',
                ),
                array(
                    'id'      => 'team_slug',
                    'type'    => 'text',
                    'title'   => esc_html__('Team Slug', 'agron'),
                    'default' => '',
                    'desc'     => 'Default: team',
                    'required' => array( 0 => 'team_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
                array(
                    'id'      => 'team_name',
                    'type'    => 'text',
                    'title'   => esc_html__('Team Name', 'agron'),
                    'default' => '',
                    'desc'     => 'Default: Team',
                    'required' => array( 0 => 'team_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
                array(
                    'id'    => 'archive_team_link',
                    'type'  => 'select',
                    'title' => esc_html__( 'Custom Archive Page Link', 'agron' ), 
                    'data'  => 'page',
                    'args'  => array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                    ),
                    'required' => array( 0 => 'team_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
    
            ),
        ),
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Team', 'agron'),
        'icon'       => 'eicon-single-post',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('Post Title', 'agron'),
                    'type'  => 'section',
                    'id' => 'team_title_heading',
                    'indent' => true,
                ),
            ),
            agron_post_title_opts('team'),
            array(
                array(
                    'id'       => 'single_team_title_custom',
                    'type'     => 'text',
                    'title'    => esc_html__('Post Title Custom', 'agron'),
                    'required' => array('team_title_mode', '!=', 'disable'),
                ),
                array(
                    'id' => 'single_team_breadcrumb_heading',
                    'title' => esc_html__('Breadcrumb', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'single_team_breadcrumb',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Post Title', 'agron'),
                    'options'  => array(
                        'default' => esc_html__('Default', 'agron'),
                        'custom'  => esc_html__('Custom', 'agron'),
                    ),
                    'default'  => 'default',
                ),            
                array(
                    'id'      => 'single_team_breadcrumb_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Breadcrumb Text', 'agron'),
                    'default' => esc_html__('Team Details', 'agron'),
                    'required' => array( 0 => 'single_team_breadcrumb', 1 => 'equals', 2 => 'custom' ),
                ),
            )
        ),
    ));
    
    // Shop Settings
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Shop', 'agron'),
        'icon'  => 'eicon-products-archive',
        'fields'     => array(
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Archive', 'agron'),
        'icon'       => 'eicon-archive-posts',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('General', 'agron'),
                    'type'  => 'section',
                    'id' => 'shop_general_h',
                    'indent' => true,
                ),
                array(
                    'id'       => 'shop_display',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Shop', 'agron'),
                    'options'  => array(
                        'on' => esc_html__('On', 'agron'),
                        'off' => esc_html__('Off', 'agron'),
                    ),
                    'default'  => 'on',
                ),
                array(
                    'id'      => 'shop_slug',
                    'type'    => 'text',
                    'title'   => esc_html__('Shop Slug', 'agron'),
                    'default' => '',
                    'desc'     => 'Default: shop',
                    'required' => array( 0 => 'shop_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
                array(
                    'id'      => 'shop_name',
                    'type'    => 'text',
                    'title'   => esc_html__('Shop Name', 'agron'),
                    'default' => '',
                    'desc'     => 'Default: Shop',
                    'required' => array( 0 => 'shop_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
                array(
                    'id'    => 'archive_shop_link',
                    'type'  => 'select',
                    'title' => esc_html__( 'Custom Archive Page Link', 'agron' ), 
                    'data'  => 'page',
                    'args'  => array(
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                    ),
                    'required' => array( 0 => 'shop_display', 1 => 'equals', 2 => 'on' ),
                    'force_output' => true
                ),
    
                array(
                    'title' => esc_html__('Display', 'agron'),
                    'type'  => 'section',
                    'id' => 'shop_display_h',
                    'indent' => true,
                ),

                array(
                    'id'            => 'shop_loop_image_max_height',
                    'type'          => 'slider',
                    'title'         => esc_html__( 'Featured Max Height', 'agron' ),
                    'min'           => 0,
                    'max'           => 1000,
                    'display_value' => 'text',
                    'output'        => array( '.woocommerce ul.products li.product .product-thumbnail img' => 'max-height' ),
                ),
            ),
        ),
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Product', 'agron'),
        'icon'       => 'eicon-single-post',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'title' => esc_html__('General', 'agron'),
                    'type'  => 'section',
                    'id' => 'shop_title_heading',
                    'indent' => true,
                ),
                array(
                    'id'        => 'product_columns',
                    'type'      => 'slider',
                    'title'     => esc_html__('Columns', 'agron'),
                    'desc'      => esc_html__('Number of related products displayed per row.', 'agron'),
                    "default"   => 3,
                    "min"       => 1,
                    "step"      => 1,
                    "max"       => 100,
                    'display_value' => 'label'
                ), 
                array(
                    'id'        => 'products_per_page',
                    'type'      => 'slider',
                    'title'     => esc_html__('Product Per Page', 'agron'),
                    'desc'      => esc_html__('Number of related products displayed on page.', 'agron'),
                    "default"   => 9,
                    "min"       => 1,
                    "step"      => 1,
                    "max"       => 100,
                    'display_value' => 'label'
                ), 
                array(
                    'title' => esc_html__('Post Title', 'agron'),
                    'type'  => 'section',
                    'id' => 'single_product_title_heading',
                    'indent' => true,
                ),
            ),
            agron_post_title_opts('product'),
            array(
                array(
                    'id'       => 'single_product_title_custom',
                    'type'     => 'text',
                    'title'    => esc_html__('Post Title Custom', 'agron'),
                ),
                array(
                    'id' => 'single_product_breadcrumb_heading',
                    'title' => esc_html__('Breadcrumb', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'       => 'single_product_breadcrumb',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Breadcrumb', 'agron'),
                    'options'  => array(
                        'default' => esc_html__('Default', 'agron'),
                        'custom'  => esc_html__('Custom', 'agron'),
                    ),
                    'default'  => 'default',
                ),            
                array(
                    'id'      => 'single_product_breadcrumb_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Breadcrumb Text', 'agron'),
                    'default' => esc_html__('Single Product', 'agron'),
                    'required' => array( 0 => 'single_product_breadcrumb', 1 => 'equals', 2 => 'custom' ),
                ),
                array(
                    'id' => 'related_product_heading',
                    'title' => esc_html__('Related Product', 'agron'),
                    'type'  => 'section',
                    'indent' => true,
                ),
                array(
                    'id'        => 'related_product_columns',
                    'type'      => 'slider',
                    'title'     => esc_html__('Columns', 'agron'),
                    'desc'      => esc_html__('Number of related products displayed per row.', 'agron'),
                    "default"   => 3,
                    "min"       => 1,
                    "step"      => 1,
                    "max"       => 10,
                    'display_value' => 'label'
                ), 
                array(
                    'id'        => 'related_products_per_page',
                    'type'      => 'slider',
                    'title'     => esc_html__('Product Per Page', 'agron'),
                    'desc'      => esc_html__('Number of related products displayed on page.', 'agron'),
                    "default"   => 4,
                    "min"       => 1,
                    "step"      => 1,
                    "max"       => 10,
                    'display_value' => 'label'
                ), 
            )
        ),
    ));
}