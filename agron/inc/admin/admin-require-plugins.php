<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'agron_register_required_plugins' );
function agron_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.casethemes.net/plugins/'] ) ; 
    $default_path = $pxl_server_info['plugin_url'];  
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins';
    $plugins = array(

        array(
            'name'               => esc_html__('Redux Framework', 'agron'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'agron' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'agron'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs and advanced capabilities', 'agron' ),
        ),

        array(
            'name'               => esc_html__('Case Addons', 'agron'),
            'slug'               => 'case-addons',
            'source'             => 'case-addons.zip',
            'required'           => true,
            'logo'        => $images . '/case-addons.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for Agron WordPress Theme.', 'agron' ),
        ),

        array(
            'name'               => esc_html__('Contact Form 7', 'agron'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'agron' ),
        ), 


        array(
            'name'               => esc_html__('WooCommerce', 'agron'),
            'slug'               => "woocommerce",
            'required'           => true,
            'logo'        => $images . '/woo.png',
            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'agron' ),
        ),

        array(
            'name'               => esc_html__('WPC Smart Quick View for WooCommerce', 'agron'),
            'slug'               => "woo-smart-quick-view",
            'required'           => false,
            'logo'        => $images . '/woo-smart-quickview.png',
            'description' => esc_html__( 'WPC Smart Quick View allows users to get a quick look of products without opening the product page.', 'agron' ),
        ),

        array(
            'name'               => esc_html__('WPC Smart Wishlist for WooCommerce', 'agron'),
            'slug'               => "woo-smart-wishlist",
            'required'           => false,
            'logo'        => $images . '/woo-smart-wishlist.png',
            'description' => esc_html__( 'WPC Smart Wishlist is a simple but powerful tool that can help your customer save products for buying later.', 'agron' ),

        ),

        array(
            'name'               => esc_html__('WPC AJAX Add to Cart for WooCommerce', 'agron'),
            'slug'               => "wpc-ajax-add-to-cart",
            'required'           => false,
            'logo'        => $images . '/woo-ajax-add-to-cart.png',
            'description' => esc_html__( 'It is a highly effective plugin for helping online stores cut down the site’s loading time, improve the user experience, and increase sales.', 'agron' ),
        ),

        array(
            'name'               => esc_html__('WPC Smart Compare for WooCommerce', 'agron'),
            'slug'               => "woo-smart-compare",
            'required'           => false,
            'logo'        => $images . '/woo-smart-compare.png',
            'description' => esc_html__( 'WPC Smart Compare is an optimal solution that brings about beyond-expectation features for improving user experience and enhance the sales strategy on your online WooCommerce shop.', 'agron' ),

        ),
    );

    $config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );

}