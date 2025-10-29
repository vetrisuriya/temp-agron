<?php
/**
 * Helper functions for the theme
 *
 * @package Case -Themes
 */
  

/**
 * Google Fonts
*/
function agron_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';   

    if ( 'off' !== _x( 'on', 'Nunito font: on or off', 'agron' ) ) {
        $fonts[] = 'Nunito:ital,wght@0,200..1000;1,200..1000&display=swap';
    }

    if ( 'off' !== _x( 'on', 'DM Sans font: on or off', 'agron' ) ) {
        $fonts[] = 'DM+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $fonts ),
            'subset' => urlencode( $subsets ),
        ), '//fonts.googleapis.com/css2?' );
    }
    return $fonts_url;
}
/*
 * Get page ID by Slug
*/
function agron_get_id_by_slug($slug, $post_type){
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Show content by slug
 **/
function agron_content_by_slug($slug, $post_type){
    $content = agron_get_content_by_slug($slug, $post_type);

    $id = agron_get_id_by_slug($slug, $post_type);
    echo apply_filters('the_content',  $content);
}

/**
 * Get content by slug
 **/
function agron_get_content_by_slug($slug, $post_type){
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if(!empty($content))
        return $content[0]->post_content;
    else
        return;
}

 
/**
 * Custom Comment List
 */
function agron_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
	?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-box">
		<?php endif; ?>
		    <div class="comment-inner">
		        <?php if ($args['avatar_size'] != 0) : ?> 
                    <div class="comment-image">
                        <?php echo get_avatar($comment, 90); ?>
                    </div>
                <?php endif; ?>
		        <div class="comment-content">
                    <div class="comment-header">
                        <div class="comment-user">
                            <?php printf( '%s', get_comment_author_link() ); ?>
                        </div>
                        <span class="comment-date">
                            <?php echo get_comment_date('d F Y'); ?>
                        </span>
                    </div>
                    <div class="comment-text"><?php comment_text(); ?></div>
                    <div class="comment-reply">
                        <?php comment_reply_link( array_merge( $args, array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'reply_text' => '<svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.34999 11.3889L14.3487 18.3876C15.6609 19.6999 17.9355 18.7813 17.9355 16.9004V13.7947C23.097 14.0134 23.2282 15.1507 22.4846 17.7315C21.916 19.6124 24.0593 21.1433 25.6778 20.0498C27.9086 18.5188 29.1334 16.5942 29.1334 13.7947C29.1334 7.53967 23.5344 6.31491 17.9355 6.0962V2.9468C17.9355 1.0659 15.6609 0.147328 14.3487 1.45958L7.34999 8.45825C6.5189 9.2456 6.5189 10.6016 7.34999 11.3889ZM8.83721 9.90173L15.8359 2.90305V8.15206C21.0849 8.15206 27.0338 8.45825 27.0338 13.7947C27.0338 16.2443 25.7652 17.469 24.4967 18.3001C26.2901 12.3513 21.8285 11.6514 15.8359 11.6514V16.9004L8.83721 9.90173ZM1.75106 8.45825C0.919963 9.2456 0.919963 10.6016 1.75106 11.3889L8.74973 18.3876C9.62456 19.3062 10.9368 19.175 11.7242 18.3876L3.23827 9.90173L11.7242 1.45958C10.9368 0.672228 9.62456 0.541003 8.74973 1.45958L1.75106 8.45825Z" fill="currentcolor"/>
                                            </svg>',
                        ) ) ); ?>
                    </div>
		        </div>
		    </div>
		<?php if ( 'div' != $args['style'] ) : ?>
        </div>
	<?php endif;
}

add_filter( 'comment_form_fields', 'move_cookie_consent_before_submit' );
function move_cookie_consent_before_submit( $fields ) {
    if ( isset( $fields['cookies'] ) ) {
        $cookies = $fields['cookies'];
        unset( $fields['cookies'] );

        $new_fields = [];

        foreach ( $fields as $key => $value ) {
            $new_fields[ $key ] = $value;
            if ( $key === 'comment' ) {
                $new_fields['cookies'] = $cookies;
            }
        }
        return $new_fields;
    }
    return $fields;
}


/**
 * Paginate Links
 */
function agron_ajax_paginate_links($link){
    $parts = parse_url($link);
    if( !isset($parts['query']) ) return $link;
    parse_str($parts['query'], $query);
    if(isset($query['page']) && !empty($query['page'])){
        return '#' . $query['page'];
    }
    else{
        return '#1';
    }
}

/* Highlight Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function agron_text_highlight_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'text' => '',
        ), $atts));
        $output = !empty($text) ? '<span class="pxl-text-highlight">'.$text.'</span>' : '';
        return $output;
    }
    pxl_register_shortcode('highlight', 'agron_text_highlight_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function agron_image_highlight_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'id' => '',
        ), $atts));
        $image = agron_get_image_by_size([
            'img_id' => $id,
            'img_dimension' => 'full',
            'attr' => [
                'class' => 'pxl-image-highlight image-popup wow zoomIn', 
                'alt'   => get_the_title($id),
            ],
        ]);
        $output = !empty($image) ? $image : '';
        return $output;
    }
    pxl_register_shortcode('highlight_image', 'agron_image_highlight_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function agron_svg_highlight_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'id' => '',
        ), $atts));
        $svg = [
            'value' => [
                'url' => wp_get_attachment_url($id), 
                'id' => $id, 
            ],
            'library' => 'svg',
        ];
        $output = null;
        if (class_exists( '\Elementor\Icons_Manager' )) {
            ob_start(); ?>
            <div class="pxl-svg-highlight wow zoomIn"> 
                <?php \Elementor\Icons_Manager::render_icon( $svg, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
            </div> 
            <?php
            $output = ob_get_clean();
        }
        return $output;
    }
    pxl_register_shortcode('highlight_svg', 'agron_svg_highlight_shortcode');
}


/**
 * Custom Widget Archive - Count
 */
add_filter('get_archives_link', 'agron_wg_archive_count');
function agron_wg_archive_count($links) {
    $dir = '';
    $links = str_replace('</a>&nbsp;(', ' <span class="pxl-count '.$dir.'">', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}

/**
 * Custom Widget Product Categories 
 */
add_filter('wp_list_categories', 'agron_wc_cat_count_span');
function agron_wc_cat_count_span($links) {
    $dir = '';
    $links = str_replace('</a> <span class="count">(', ' <span class="pxl-count '.$dir.'">', $links);
    $links = str_replace(')</span>', '</span></a>', $links);
    return $links;
}

/**
 * Get mega menu builder ID
 */
function agron_get_mega_menu_builder_id(){
    $mn_id = [];
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    if ( is_array( $menus ) && ! empty( $menus ) ) {
        foreach ( $menus as $menu ) {
            if ( is_object( $menu )){
                $menu_obj = get_term( $menu->term_id, 'nav_menu' );
                $menu = wp_get_nav_menu_object( $menu_obj ) ;
                $menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );
                foreach ($menu_items as $menu_item) {
                    if( !empty($menu_item->pxl_megaprofile)){
                        $mn_id[] = (int)$menu_item->pxl_megaprofile;
                    }
                }  
            }
        }
    }
    return $mn_id;
}

/**
 * Get page popup builder ID
 */
function agron_get_page_popup_builder_id(){
    $pp_id = [];
    $page_popup = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    if ( is_array( $page_popup ) && ! empty( $page_popup ) ) {
        foreach ( $page_popup as $page ) {
            if ( is_object( $page )){
                $page_obj = get_term( $page->term_id, 'nav_menu' );
                $page = wp_get_nav_menu_object( $page_obj ) ;
                $page_items = wp_get_nav_menu_items( $page->term_id, array( 'update_post_term_cache' => false ) );
                foreach ($page_items as $page_item) {
                    if( !empty($page_item->pxl_page_popup)){
                        $pp_id[] = (int)$page_item->pxl_page_popup;
                    }
                }  
            }
        }
    }
    return $pp_id;
}

/* Mouse Move Animation */
function agron_mouse_move_animation() { 
    $mouse_move_animation = agron()->get_theme_opt('mouse_move_animation', 'off'); 
    if($mouse_move_animation == 'on') {
        wp_enqueue_script( 'agron-cursor', get_template_directory_uri() . '/assets/js/libraries/cursor.js', array( 'jquery' ), '1.0.0', true ); ?>  
        <div class="pxl-cursor pxl-js-cursor">
            <div class="pxl-cursor-wrapper">
                <div class="pxl-cursor--follower pxl-js-follower"></div>
                <div class="pxl-cursor--label pxl-js-label"></div>
                <div class="pxl-cursor--drap pxl-js-drap"></div>
                <div class="pxl-cursor--icon pxl-js-icon"></div>
            </div>
        </div>
    <?php }
}

// Search Form Mobile
function agron_mobile_search_form() { 
    ?>
        <div class="header-search-form pxl-hide-xl">
            <form class="form" role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input type="text" placeholder="<?php echo esc_attr('Search here...', 'agron') ?>" name="s" class="search-field" />
                <button type="submit" class="search-submit">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.8906 13.5742C14.0273 13.7109 14.0273 13.9297 13.8906 14.0391L13.2617 14.668C13.1523 14.8047 12.9336 14.8047 12.7969 14.668L9.48828 11.3594C9.43359 11.2773 9.40625 11.1953 9.40625 11.1133V10.7578C8.39453 11.6055 7.10938 12.125 5.6875 12.125C2.54297 12.125 0 9.58203 0 6.4375C0 3.32031 2.54297 0.75 5.6875 0.75C8.80469 0.75 11.375 3.32031 11.375 6.4375C11.375 7.85938 10.8281 9.17188 9.98047 10.1562H10.3359C10.418 10.1562 10.5 10.2109 10.582 10.2656L13.8906 13.5742ZM5.6875 10.8125C8.09375 10.8125 10.0625 8.87109 10.0625 6.4375C10.0625 4.03125 8.09375 2.0625 5.6875 2.0625C3.25391 2.0625 1.3125 4.03125 1.3125 6.4375C1.3125 8.87109 3.25391 10.8125 5.6875 10.8125Z" fill="currentcolor"/>
                    </svg>
                </button>
            </form>
        </div>
    <?php
}

/**
 * Start - User custom fields.
 */
add_action( 'show_user_profile', 'agron_user_fields' );
add_action( 'edit_user_profile', 'agron_user_fields' );
function agron_user_fields($user){

    $user_position = get_user_meta($user->ID, 'user_position', true);
    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_vimeo  = get_user_meta($user->ID, 'user_vimeo ', true);
    $user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);

    ?>
    <h3><?php esc_html_e('Agron User Info Custom', 'agron'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_position"><?php esc_html_e('Author Position', 'agron'); ?></label></th>
            <td>
                <input id="user_position" name="user_position" type="text" value="<?php echo esc_attr(isset($user_position) ? $user_position : ''); ?>" />
            </td>
        </tr>

        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'agron'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'agron'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_vimeo "><?php esc_html_e('Vimeo', 'agron'); ?></label></th>
            <td>
                <input id="user_vimeo " name="user_vimeo " type="text" value="<?php echo esc_attr(isset($user_vimeo ) ? $user_vimeo  : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'agron'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'agron_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'agron_save_user_custom_fields' );
function agron_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    if(isset($_POST['user_position']))
        update_user_meta( $user_id, 'user_position', $_POST['user_position'] );
    if(isset($_POST['user_facebook']))
        update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
    if(isset($_POST['user_twitter']))
        update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
    if(isset($_POST['user_vimeo ']))
        update_user_meta( $user_id, 'user_vimeo ', $_POST['user_vimeo '] );
    if(isset($_POST['user_pinterest']))
        update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
}

/* Author Social */
function agron_get_user_social($author_id) {
    $author_id = isset($author_id) ? $author_id : get_the_author_meta( 'ID' );
    $user_facebook = get_user_meta($author_id, 'user_facebook', true);
    $user_twitter = get_user_meta($author_id, 'user_twitter', true);
    $user_pinterest = get_user_meta($author_id, 'user_pinterest', true);
    $user_vimeo  = get_user_meta($author_id, 'user_vimeo ', true); ?>
    <div class="author-socials">
        <a href="<?php echo esc_url($user_facebook); ?>" class="social-link">
            <svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.23515 4.33719L6.02082 6.43287H4.32998V12.5294H1.82945V6.43287H0.567283V4.33719H1.80564V3.07502C1.80564 2.64636 1.84533 2.26532 1.92471 1.93192C2.01997 1.58264 2.17874 1.29686 2.401 1.07459C2.62327 0.836449 2.90111 0.653871 3.23451 0.52686C3.58379 0.399848 4.01246 0.336343 4.5205 0.336343H6.21133V2.43202H5.16349C4.9571 2.43202 4.79834 2.45584 4.6872 2.50347C4.57607 2.53522 4.48875 2.59079 4.42524 2.67017C4.37761 2.73368 4.34586 2.821 4.32998 2.93213C4.31411 3.02739 4.30617 3.14646 4.30617 3.28935V4.33719H6.21133H6.23515Z" fill="currentcolor"/>
            </svg>
        </a>
        <a href="<?php echo esc_url($user_twitter); ?>" class="social-link">
            <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.1463 2.95591C11.1463 2.98767 11.1463 3.01942 11.1463 3.05117C11.1622 3.06705 11.1622 3.09086 11.1463 3.12261C11.1463 3.15437 11.1463 3.18612 11.1463 3.21787C11.1622 3.23375 11.1622 3.25756 11.1463 3.28932C11.1622 4.09901 11.0114 4.93252 10.6938 5.78985C10.3763 6.64717 9.9159 7.41717 9.3126 8.09986C8.72518 8.76667 7.98692 9.32234 7.09785 9.76688C6.20877 10.1955 5.19268 10.4019 4.04958 10.3861C3.68443 10.4019 3.33515 10.3861 3.00174 10.3384C2.66834 10.2749 2.33493 10.2035 2.00153 10.1241C1.66813 10.0288 1.3506 9.90977 1.04895 9.76688C0.763173 9.60811 0.477398 9.44935 0.191623 9.29059C0.255128 9.27471 0.302758 9.27471 0.33451 9.29059C0.382139 9.30646 0.437707 9.3144 0.501212 9.3144C0.564718 9.29853 0.612347 9.29853 0.6441 9.3144C0.691729 9.3144 0.747296 9.30646 0.810802 9.29059C1.09658 9.30646 1.38235 9.29059 1.66813 9.24296C1.9539 9.17945 2.2238 9.10801 2.47782 9.02863C2.73184 8.94924 2.97793 8.83811 3.21607 8.69522C3.47009 8.55234 3.7003 8.40151 3.9067 8.24275C3.6368 8.22687 3.37484 8.17924 3.12081 8.09986C2.86679 8.02048 2.63658 7.9014 2.43019 7.74264C2.23968 7.568 2.06504 7.38542 1.90627 7.19491C1.76338 6.98851 1.66019 6.75037 1.59668 6.48047C1.61256 6.51222 1.64431 6.5281 1.69194 6.5281C1.73957 6.51222 1.77926 6.51222 1.81101 6.5281C1.84277 6.54397 1.88246 6.55191 1.93009 6.55191C1.97772 6.53604 2.00947 6.53604 2.02534 6.55191C2.10473 6.53604 2.16823 6.53604 2.21586 6.55191C2.26349 6.55191 2.31906 6.54397 2.38256 6.5281C2.44607 6.51222 2.50164 6.50428 2.54926 6.50428C2.59689 6.48841 2.65246 6.47253 2.71597 6.45665C2.41432 6.40902 2.14442 6.30583 1.90627 6.14706C1.66813 5.9883 1.45379 5.80572 1.26328 5.59933C1.08864 5.39294 0.953689 5.15479 0.858431 4.88489C0.763173 4.59912 0.707605 4.31334 0.691729 4.02757C0.707605 3.99582 0.707605 3.98788 0.691729 4.00375C0.707605 3.98788 0.707605 3.97994 0.691729 3.97994C0.691729 3.97994 0.699667 3.972 0.715543 3.95612C0.779049 4.01963 0.858431 4.06726 0.953689 4.09901C1.04895 4.13076 1.13627 4.16252 1.21565 4.19427C1.31091 4.22602 1.4141 4.24984 1.52524 4.26571C1.63637 4.26571 1.73163 4.28159 1.81101 4.31334C1.66813 4.18633 1.5173 4.05138 1.35854 3.9085C1.21565 3.76561 1.09658 3.59891 1.00132 3.40839C0.921936 3.21787 0.850493 3.02736 0.786987 2.83684C0.723482 2.64632 0.699667 2.43199 0.715543 2.19385C0.699667 2.09859 0.699667 1.99539 0.715543 1.88426C0.747296 1.75725 0.771111 1.64611 0.786987 1.55085C0.81874 1.4556 0.858431 1.3524 0.90606 1.24126C0.953689 1.13013 1.00132 1.03487 1.04895 0.955489C1.36647 1.32065 1.70782 1.66199 2.07297 1.97952C2.45401 2.29704 2.86679 2.56694 3.31133 2.78921C3.75587 3.01148 4.21628 3.19406 4.69258 3.33695C5.16887 3.46396 5.67691 3.5354 6.21671 3.55128C6.18496 3.51952 6.16908 3.47983 6.16908 3.4322C6.18496 3.3687 6.18496 3.32107 6.16908 3.28932C6.1532 3.24169 6.14526 3.19406 6.14526 3.14643C6.14526 3.08292 6.13733 3.03529 6.12145 3.00354C6.13733 2.63839 6.20877 2.31292 6.33578 2.02714C6.46279 1.72549 6.63743 1.46353 6.8597 1.24126C7.09785 1.00312 7.36775 0.82054 7.6694 0.693529C7.97105 0.566518 8.29651 0.495074 8.64579 0.479198C8.82043 0.495074 8.99507 0.518889 9.16971 0.550642C9.34435 0.582394 9.50312 0.637962 9.64601 0.717344C9.80477 0.780849 9.95559 0.860231 10.0985 0.955489C10.2414 1.05075 10.3604 1.16188 10.4557 1.28889C10.6145 1.25714 10.7574 1.22539 10.8844 1.19363C11.0114 1.16188 11.1463 1.11425 11.2892 1.05075C11.4321 0.987242 11.5591 0.931675 11.6702 0.884046C11.7973 0.82054 11.9322 0.749096 12.0751 0.669714C12.0116 0.828478 11.9481 0.971366 11.8846 1.09838C11.8211 1.22539 11.7337 1.3524 11.6226 1.47941C11.5274 1.59054 11.4242 1.69374 11.313 1.789C11.2178 1.88426 11.0987 1.97952 10.9558 2.07477C11.0828 2.04302 11.2019 2.01921 11.313 2.00333C11.44 1.98745 11.567 1.96364 11.6941 1.93189C11.8211 1.88426 11.9401 1.84457 12.0513 1.81281C12.1624 1.78106 12.2815 1.72549 12.4085 1.64611C12.3132 1.789 12.218 1.91601 12.1227 2.02714C12.0433 2.13828 11.9401 2.25735 11.8131 2.38436C11.702 2.4955 11.5909 2.59869 11.4797 2.69395C11.3845 2.77333 11.2654 2.86859 11.1225 2.97973L11.1463 2.95591Z" fill="currentcolor"/>
            </svg>
        </a>
        <a href="<?php echo esc_url($user_vimeo ); ?>" class="social-link">        
            <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.0003 0.979304C11.8891 0.852293 11.7542 0.757035 11.5954 0.693529C11.4525 0.614147 11.2938 0.55858 11.1191 0.526827C10.9445 0.495074 10.7698 0.487136 10.5952 0.503013C10.4206 0.503013 10.2539 0.510951 10.0951 0.526827C9.98395 0.542703 9.80138 0.606209 9.54735 0.717344C9.30921 0.828478 9.04725 0.987242 8.76147 1.19363C8.49157 1.40003 8.22961 1.66199 7.97559 1.97952C7.72157 2.28117 7.52312 2.65426 7.38023 3.0988C7.63425 3.08292 7.85652 3.08292 8.04704 3.0988C8.23755 3.11468 8.38838 3.16231 8.49951 3.24169C8.62652 3.32107 8.71384 3.44808 8.76147 3.62272C8.82498 3.78148 8.84085 3.99582 8.8091 4.26571C8.79323 4.37685 8.76941 4.49592 8.73766 4.62293C8.70591 4.73407 8.66621 4.85314 8.61859 4.98015C8.57096 5.10716 8.51539 5.23417 8.45188 5.36118C8.40425 5.47232 8.34869 5.59139 8.28518 5.7184C8.2058 5.86129 8.11054 6.02005 7.99941 6.19469C7.90415 6.36933 7.78508 6.52016 7.64219 6.64717C7.51518 6.77418 7.36435 6.84562 7.18971 6.8615C7.03095 6.87738 6.86425 6.78212 6.68961 6.57573C6.51497 6.40109 6.38002 6.19469 6.28476 5.95655C6.20538 5.70253 6.14187 5.44057 6.09424 5.17067C6.06249 4.90077 6.03074 4.63087 5.99898 4.36097C5.98311 4.0752 5.95929 3.82118 5.92754 3.59891C5.89579 3.47189 5.86403 3.34488 5.83228 3.21787C5.8164 3.07499 5.79259 2.9321 5.76084 2.78921C5.74496 2.64632 5.72115 2.50344 5.68939 2.36055C5.65764 2.21766 5.61795 2.07477 5.57032 1.93189C5.53857 1.82075 5.49094 1.70962 5.42743 1.59848C5.3798 1.47147 5.3163 1.36034 5.23692 1.26508C5.15754 1.16982 5.07022 1.0825 4.97496 1.00312C4.89557 0.923736 4.80825 0.868169 4.713 0.836416C4.60186 0.804664 4.48279 0.796725 4.35578 0.812602C4.24464 0.812602 4.12557 0.828478 3.99856 0.860231C3.88743 0.876107 3.77629 0.90786 3.66516 0.955489C3.5699 1.00312 3.48258 1.05075 3.4032 1.09838C3.16505 1.24126 2.93484 1.40003 2.71257 1.57467C2.50618 1.74931 2.29979 1.93189 2.09339 2.1224C1.887 2.29704 1.67267 2.47962 1.4504 2.67014C1.24401 2.84478 1.02174 3.01942 0.783594 3.19406V3.2655C0.862975 3.31313 0.918543 3.36076 0.950295 3.40839C0.997925 3.45602 1.02968 3.50365 1.04555 3.55128C1.07731 3.59891 1.10112 3.6386 1.117 3.67035C1.14875 3.7021 1.19638 3.72592 1.25988 3.74179C1.41865 3.75767 1.56947 3.74179 1.71236 3.69416C1.85525 3.64654 1.9902 3.60684 2.11721 3.57509C2.24422 3.54334 2.36329 3.54334 2.47443 3.57509C2.60144 3.59097 2.72051 3.67829 2.83165 3.83705C2.89515 3.94819 2.94278 4.05932 2.97453 4.17046C3.02216 4.26571 3.06185 4.36891 3.09361 4.48004C3.12536 4.59118 3.15711 4.70231 3.18886 4.81345C3.22062 4.92458 3.25237 5.03572 3.28412 5.14685C3.34763 5.28974 3.39526 5.44057 3.42701 5.59933C3.47464 5.74222 3.52227 5.89304 3.5699 6.05181C3.61753 6.21057 3.65722 6.37727 3.68897 6.55191C3.7366 6.71068 3.78423 6.86944 3.83186 7.0282C3.89536 7.31398 3.96681 7.63151 4.04619 7.98079C4.14145 8.31419 4.25258 8.63966 4.37959 8.95718C4.5066 9.25883 4.64949 9.53667 4.80825 9.79069C4.9829 10.0288 5.19723 10.1955 5.45125 10.2908C5.57826 10.3543 5.71321 10.3861 5.8561 10.3861C6.01486 10.3702 6.16569 10.3464 6.30857 10.3146C6.46734 10.2829 6.61022 10.2352 6.73723 10.1717C6.88012 10.1082 6.99919 10.0527 7.09445 10.005C7.34848 9.84626 7.58662 9.67956 7.80889 9.50492C8.04704 9.3144 8.2693 9.11595 8.4757 8.90955C8.69797 8.70316 8.89642 8.48883 9.07106 8.26656C9.26158 8.04429 9.44416 7.82202 9.6188 7.59975C10.0157 7.05996 10.365 6.52016 10.6666 5.98036C10.9842 5.42469 11.2461 4.90871 11.4525 4.43242C11.6748 3.94025 11.8494 3.51159 11.9764 3.14643C12.1034 2.78127 12.1828 2.51137 12.2146 2.33673C12.2305 2.20972 12.2384 2.09065 12.2384 1.97952C12.2543 1.8525 12.2543 1.73343 12.2384 1.6223C12.2384 1.51116 12.2146 1.40003 12.167 1.28889C12.1193 1.17776 12.0638 1.07456 12.0003 0.979304Z" fill="currentcolor"/>
            </svg>
        </a>
        <a href="<?php echo esc_url($user_pinterest); ?>" class="social-link">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.68058 4.78942C9.68058 5.47211 9.58532 6.10716 9.3948 6.69459C9.22016 7.28201 8.96614 7.79006 8.63274 8.21872C8.29933 8.63151 7.90242 8.96491 7.44201 9.21893C6.98159 9.45708 6.47355 9.56821 5.91787 9.55234C5.72736 9.56821 5.53684 9.55234 5.34633 9.50471C5.17168 9.4412 5.00498 9.3777 4.84622 9.31419C4.70333 9.23481 4.57632 9.13955 4.46519 9.02841C4.35405 8.91728 4.26673 8.81408 4.20323 8.71883C4.10797 9.09986 4.02859 9.41739 3.96508 9.67141C3.90157 9.92543 3.84601 10.1239 3.79838 10.2668C3.76663 10.3938 3.74281 10.489 3.72693 10.5525C3.72693 10.6002 3.72693 10.6161 3.72693 10.6002C3.67931 10.7431 3.63168 10.878 3.58405 11.005C3.53642 11.132 3.48085 11.267 3.41735 11.4099C3.35384 11.5369 3.2824 11.656 3.20301 11.7671C3.13951 11.8782 3.076 11.9894 3.0125 12.1005C2.82198 12.2275 2.67116 12.2831 2.56002 12.2672C2.46476 12.2672 2.38538 12.2275 2.32188 12.1481C2.27425 12.0687 2.24249 11.9894 2.22662 11.91C2.21074 11.8465 2.2028 11.8068 2.2028 11.7909C2.18693 11.6798 2.17899 11.5607 2.17899 11.4337C2.17899 11.2908 2.17899 11.1558 2.17899 11.0288C2.19486 10.886 2.21074 10.7431 2.22662 10.6002C2.25837 10.4573 2.29012 10.3303 2.32188 10.2191C2.32188 10.2033 2.32981 10.1556 2.34569 10.0763C2.37744 9.981 2.42507 9.79842 2.48858 9.52852C2.55208 9.24275 2.6394 8.85377 2.75054 8.36161C2.86167 7.86944 3.0125 7.21851 3.20301 6.40881C3.15539 6.31355 3.11569 6.19448 3.08394 6.05159C3.05219 5.90871 3.02837 5.78963 3.0125 5.69438C2.99662 5.58324 2.98868 5.48798 2.98868 5.4086C2.98868 5.32922 2.98868 5.29747 2.98868 5.31334C2.98868 5.04344 3.02044 4.8053 3.08394 4.59891C3.16332 4.37664 3.25858 4.18612 3.36972 4.02736C3.49673 3.85272 3.63961 3.72571 3.79838 3.64632C3.97302 3.55107 4.14766 3.4955 4.3223 3.47962C4.48106 3.4955 4.61601 3.52725 4.72715 3.57488C4.85416 3.62251 4.95735 3.70189 5.03674 3.81303C5.11612 3.92416 5.17168 4.04323 5.20344 4.17024C5.25107 4.28138 5.27488 4.41633 5.27488 4.57509C5.27488 4.71798 5.25107 4.89262 5.20344 5.09901C5.15581 5.28953 5.10024 5.48798 5.03674 5.69438C4.97323 5.90077 4.90179 6.12304 4.8224 6.36118C4.7589 6.58345 4.70333 6.79778 4.6557 7.00418C4.60807 7.21057 4.60014 7.39315 4.63189 7.55191C4.67952 7.6948 4.75096 7.83769 4.84622 7.98057C4.95735 8.10759 5.0923 8.20284 5.25107 8.26635C5.40983 8.32985 5.57653 8.36955 5.75117 8.38542C6.08458 8.36955 6.38623 8.26635 6.65613 8.07583C6.92602 7.88532 7.15623 7.61542 7.34675 7.26614C7.55314 6.91686 7.70397 6.52789 7.79923 6.09922C7.91036 5.65468 7.96593 5.17046 7.96593 4.64654C7.96593 4.28138 7.90242 3.9321 7.77541 3.59869C7.6484 3.26529 7.45788 2.98745 7.20386 2.76518C6.96572 2.52704 6.66406 2.33652 6.29891 2.19363C5.94963 2.05075 5.53684 1.98724 5.06055 2.00312C4.53663 1.98724 4.06034 2.07456 3.63168 2.26508C3.21889 2.4556 2.86167 2.70168 2.56002 3.00333C2.25837 3.30498 2.02816 3.6622 1.8694 4.07499C1.71063 4.47189 1.63125 4.88468 1.63125 5.31334C1.63125 5.48798 1.63919 5.63881 1.65507 5.76582C1.68682 5.87695 1.71857 5.99603 1.75033 6.12304C1.79796 6.23417 1.84558 6.33737 1.89321 6.43263C1.95672 6.51201 2.02816 6.60727 2.10754 6.7184C2.1393 6.73428 2.16311 6.76603 2.17899 6.81366C2.19486 6.84541 2.2028 6.86923 2.2028 6.8851C2.21868 6.90098 2.22662 6.93273 2.22662 6.98036C2.22662 7.01212 2.21868 7.04387 2.2028 7.07562C2.18693 7.12325 2.17105 7.17088 2.15517 7.21851C2.15517 7.25026 2.14724 7.29789 2.13136 7.3614C2.11548 7.4249 2.09961 7.48047 2.08373 7.5281C2.06785 7.55985 2.05992 7.59954 2.05992 7.64717C2.04404 7.67892 2.02022 7.71861 1.98847 7.76624C1.9726 7.798 1.94878 7.82181 1.91703 7.83769C1.88528 7.83769 1.85352 7.84562 1.82177 7.8615C1.79002 7.8615 1.75033 7.84562 1.7027 7.81387C1.46455 7.71861 1.25022 7.58366 1.0597 7.40902C0.885063 7.21851 0.742176 7.01212 0.631041 6.78985C0.519907 6.56758 0.432587 6.31355 0.369081 6.02778C0.305576 5.74201 0.273823 5.45623 0.273823 5.17046C0.273823 4.66241 0.377019 4.15437 0.583412 3.64632C0.805681 3.13828 1.12321 2.66993 1.53599 2.24126C1.94878 1.8126 2.46476 1.47126 3.08394 1.21724C3.70312 0.947339 4.4255 0.804452 5.25107 0.788576C5.91787 0.804452 6.52118 0.923525 7.06097 1.14579C7.61665 1.35219 8.085 1.6459 8.46603 2.02693C8.84707 2.40797 9.14078 2.83663 9.34717 3.31292C9.56944 3.77333 9.68058 4.2655 9.68058 4.78942Z" fill="currentcolor"/>
            </svg>
        </a>
    </div>
<?php } 

// Get Image By Size
if(!function_exists('agron_get_image_by_size')){
    function agron_get_image_by_size( $params = [], $post_id = null ) {
        $params = array_merge([
            'img_id' => '',
            'img_dimension' => 'thumbnail',
            'attr' => [],
        ], $params );        
        $params['img_id'] = !is_null($post_id) ? get_post_thumbnail_id($post_id) : ($params['img_id']  ?? '');
        $dimensions = $params['img_dimension'];

        if(!is_array($dimensions)) {
            $size = get_intermediate_image_sizes();
            foreach ($size as $s) {
                $dimensions = wp_get_additional_image_sizes()[$s] ?? [
                    'width'  => get_option("{$s}_size_w"),
                    'height' => get_option("{$s}_size_h"),
                ];
            }
        }

        $thumbnail = null;

        if ( empty($params['img_id']) ) 
            return $thumbnail;

        $img_id = apply_filters( 'pxl_object_id', $params['img_id'] );
        $img_dimension = isset($params['img_dimension']) ? $params['img_dimension'] : 'thumbnail';
        $img_attr = isset($params['attr']) ? $params['attr'] : [];
        $img_attr['class'] = isset($img_attr['class']) ? $img_attr['class'] : '';
        $img_attr['alt']   = isset($img_attr['alt']) ? $img_attr['alt'] : trim( wp_strip_all_tags(get_post_meta( $img_id, '_wp_attachment_image_alt', true )) );
        $img_attr['loading'] = 'lazy';
        global $_wp_additional_image_sizes;

        $post = get_post( $post_id );
        if(!empty($post)) {
            $post_title = trim(wp_strip_all_tags( $post->post_title, true));
            $post_excerpt = trim(wp_strip_all_tags( $post->post_excerpt, true));
            if(empty(trim($img_attr['alt']))) {
                $img_attr['alt'] = !empty($post_excerpt) ? $post_excerpt : $post_title;
            }
        }

        if ( !is_array($img_dimension) ) {
            $img_attr['class'] .= ' attachment-'.$img_dimension;
            $thumbnail = wp_get_attachment_image( $img_id, $img_dimension, false, $img_attr );
        }else {
            $img_w = $img_dimension['width'];
            $img_h = $img_dimension['height'];
            
            $img_crop = pxl_resize( $img_id, null, $img_w, $img_h, true );
            if (!isset($img_crop['url'])) return  ;
            $img_attr = pxl_stringify_attributes(
                array_merge(
                    [
                        'src' => $img_crop['url'],
                        'width' => $img_w,
                        'height' => $img_h,
                    ],
                    $img_attr,
                )
            );
            $thumbnail = '<img ' . $img_attr . ' />';
        } 
        return $thumbnail;
    }
}
