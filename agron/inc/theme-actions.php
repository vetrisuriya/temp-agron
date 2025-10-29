<?php 
/**
 * Actions Hook for the theme
 *
 * @package Case-Themes
 */
add_action('after_setup_theme', 'agron_setup');
function agron_setup(){

    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'agron_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'agron', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 1170, 710 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Desktop', 'agron' ),
        'primary-mobile' => esc_html__( 'Primary Mobile', 'agron' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'post-formats', array (
        '',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'agron_widgets_position' );
function agron_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'agron' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'agron' ),
			'id'            => 'sidebar-page',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'agron' ),
			'id'            => 'sidebar-shop',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'agron_scripts' );
function agron_scripts() {  
    $agron_version = wp_get_theme( get_template() );

    // Gsap
    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/assets/js/gsap/gsap.min.js', array( 'jquery' ), '3.12.5', true );
    wp_enqueue_script( 'scroll-trigger', get_template_directory_uri() . '/assets/js/gsap/ScrollTrigger.min.js', array( 'jquery' ), '3.12.5', true );
    wp_enqueue_script( 'split-text', get_template_directory_uri() . '/assets/js/gsap/SplitText.min.js', array( 'jquery' ), '3.12.5', true );
    $smooth_scroll = agron()->get_theme_opt('smooth_scroll', 'off');
    if($smooth_scroll === 'on') {
        wp_enqueue_script( 'scroll-smoother', get_template_directory_uri() . '/assets/js/gsap/ScrollSmoother.min.js', array( 'jquery' ), '3.12.5', true );
    }

    // Swiper
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/libs/swiper.min.js', array( 'jquery' ), '11.2.1', true );
    wp_enqueue_style(  'swiper', get_template_directory_uri() . '/assets/css/libs/swiper.min.css', array(), '11.2.1');

    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );

    // Pie Chart
    wp_register_script('easy-pie-chart', get_template_directory_uri() . '/assets/js/libs/easy-pie-chart.min.js', array('jquery'), '2.1.7' , true);
    
    wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/libs/animate.min.css', array(), '1.1.0');
    wp_enqueue_script( 'wow-animate', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/libs/nice-select.min.js', array( 'jquery' ), 'all', true );

    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/libs/modernizr.min.js', array( 'jquery' ), 'all', true );

    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' , array(), $agron_version->get( 'Version' ));

    // wp_register_script( 'pxl-easing', get_template_directory_uri() . '/assets/js/libs/easing.js', array( 'jquery' ), '1.3.0', true );

    /* Woocommerce */
    wp_enqueue_script( 'pxl-woocommerce', get_template_directory_uri() . '/woocommerce/js/woocommerce.js', array( 'jquery' ), $agron_version->get( 'Version' ), true );

    /* Cookie */
    wp_register_script( 'pxl-cookie', get_template_directory_uri() . '/assets/js/libs/cookie.js', array( 'jquery' ), '1.4.1', true );

    $r = rand();
    wp_enqueue_style( 'pxl-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), $agron_version->get( 'Version' ) );
	wp_enqueue_style( 'pxl-caseicon', get_template_directory_uri() . '/assets/css/caseicon.css', array(), $agron_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), $agron_version->get( 'Version' ) );
	wp_enqueue_style( 'pxl-style', get_template_directory_uri() . '/assets/css/style.css', array(), $r );
	wp_add_inline_style( 'pxl-style', agron_inline_styles() );
    wp_enqueue_style( 'pxl-base', get_template_directory_uri() . '/style.css', array(), $agron_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-google-fonts', agron_fonts_url(), array(), null );
	wp_enqueue_script( 'pxl-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $agron_version->get( 'Version' ), true );
    wp_enqueue_script( 'pxl-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), $agron_version->get( 'Version' ), true );

    wp_localize_script( 'pxl-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    do_action( 'agron_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'agron_admin_style');
function agron_admin_style() {
    $theme = wp_get_theme( get_template() );
    wp_enqueue_style( 'agron-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );

    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'agron-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
} );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'agron_pingback_header' );
function agron_pingback_header(){
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
// Dynamic Panel
add_action( 'pxl_anchor_target', 'agron_hook_anchor_templates_dynamic_panel');
function agron_hook_anchor_templates_dynamic_panel(){
    $templates = agron_get_templates_slug('dynamic-panel');
    if(empty($templates)) return;

    foreach ($templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id']
        ];
        if( did_action('pxl_anchor_target_template_'.$values['post_id']) <= 0){  
            do_action( 'pxl_anchor_target_template_'.$values['post_id'], $args );  
        }
    } 
}
if(!function_exists('agron_hook_anchor_dynamic_panel')){
    function agron_hook_anchor_dynamic_panel($args){ ?>
        <div id="<?php echo esc_attr('template-'.$args['post_id'])?>" class="pxl-template">
            <div class="pxl-template-overlay"></div>
            <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
        </div>
    <?php }
}

/* Cart Sidebar */
if(!function_exists('agron_hook_anchor_cart')){
    function agron_hook_anchor_cart(){
        if(class_exists('Woocommerce')) :
            global $woocommerce; ?>
            <div id="pxl-cart-sidebar" class="pxl-popup-wrap">
                <div class="pxl-popup--overlay pxl-cursor--cta"></div>
                <div class="pxl-popup--close2 pxl-cursor--cta"></div>
                <div class="pxl-popup--conent pxl-widget-cart-sidebar">
                    <div class="widget_shopping_cart">
                        <div class="widget_shopping_head">
                            <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
                            <div class="widget_shopping_title">
                                <?php echo esc_html__( 'Cart', 'agron' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'agron' ), WC()->cart->cart_contents_count ); ?>)</span>
                            </div>
                        </div>
                        <div class="widget_shopping_cart_content">
                            <?php $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
                            <ul class="cart_list product_list_widget">

                            <?php if ( ! WC()->cart->is_empty() ) : ?>

                                <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                            $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                            $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                            $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                            ?>
                                            <li>
                                                <?php if(!empty($thumbnail)) : ?>
                                                    <div class="cart-product-image">
                                                        <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                                            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="cart-product-meta">
                                                    <h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
                                                    <?php
                                                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                            '<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
                                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                            esc_attr__( 'Remove this item', 'agron' ),
                                                            esc_attr( $product_id ),
                                                            esc_attr( $cart_item_key ),
                                                            esc_attr( $_product->get_sku() )
                                                        ), $cart_item_key );
                                                    ?>
                                                </div>  
                                            </li>
                                            <?php
                                        }
                                    }
                                ?>

                            <?php else : ?>

                                <li class="empty">
                                    <i class="caseicon-shopping-cart-alt"></i>
                                    <span><?php esc_html_e( 'Your cart is empty', 'agron' ); ?></span>
                                    <a class="pxl-button btn-shop" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
                                        <span class="pxl-button-text">
                                            <span class="pxl-button-icon icon-duplicated">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                                </svg>                                    
                                            </span>
                                            <?php echo esc_html__('Browse Shop', 'agron'); ?>
                                            <span class="pxl-button-icon icon-main">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                                </svg>                                    
                                            </span>
                                        </span>
                                    </a>
                                </li>

                            <?php endif; ?>

                            </ul><!-- end product list -->
                        </div>
                        <?php if ( ! WC()->cart->is_empty() ) : ?>
                            <div class="widget_shopping_cart_footer">
                                <p class="total"><strong><?php esc_html_e( 'Subtotal', 'agron' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

                                <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

                                <p class="buttons">
                                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="pxl-button btn-shop wc-forward">
                                        <span class="pxl-button-text">
                                            <span class="pxl-button-icon icon-duplicated">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                                </svg>                                    
                                            </span>
                                            <?php esc_html_e( 'View Cart', 'agron' ); ?>
                                            <span class="pxl-button-icon icon-main">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                                </svg>                                    
                                            </span>
                                        </span>
                                    </a>
                                    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="pxl-button checkout wc-forward">
                                        <span class="pxl-button-text">
                                            <span class="pxl-button-icon icon-duplicated">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                                </svg>                                    
                                            </span>
                                            <?php esc_html_e( 'Checkout', 'agron' ); ?>
                                            <span class="pxl-button-icon icon-main">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                                </svg>                                    
                                            </span>
                                        </span>
                                    </a>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php }
}

/** Show Cart Sidebar Hidden */
add_action('wp_ajax_nopriv_item_added', 'agron_addedtocart_sweet_message');
add_action('wp_ajax_item_added', 'agron_addedtocart_sweet_message');
function agron_addedtocart_sweet_message() {
    echo isset($_POST['id']) && $_POST['id'] > 0 ? (int) esc_attr($_POST['id']) : false;
    die();
}
add_action('wp_footer', 'agron_cart_hidden_sidebar');
function agron_cart_hidden_sidebar() {
    if (class_exists('Woocommerce') && is_checkout())
        return;
    ?>
    <script type="text/javascript">
        jQuery( function($) {
            if ( typeof wc_add_to_cart_params === 'undefined' )
                return false;

            $(document.body).on( 'added_to_cart', function( event, fragments, cart_hash, $button ) {
                var $pid = $button.data('product_id');

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        'action': 'item_added',
                        'id'    : $pid
                    },
                    success: function (response) {
                        $('#pxl-cart-sidebar').addClass('active');
                        $("#pxl-cart-sidebar").on('click', '.widget_shopping_head .pxl-item--close', function () {
                            $('body').removeClass('body-overflow');
                            $('#pxl-cart-sidebar').removeClass('active');
                        });
                    }
                });
            });
        });
    </script>
    <?php
}