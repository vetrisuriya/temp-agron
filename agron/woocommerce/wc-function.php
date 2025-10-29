<?php

//Custom products layout on archive page
add_filter( 'loop_shop_columns', 'agron_loop_shop_columns', 20 ); 
function agron_loop_shop_columns() {
	$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : agron()->get_theme_opt('product_columns', 3);
	return $columns;
}
 
// Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'agron_loop_shop_per_page', 20 );
function agron_loop_shop_per_page( $limit ) {
	$limit = agron()->get_theme_opt('products_per_page', 9);
	return $limit;
}

/* Remove result count & product ordering & item product category..... */
function agron_cwoocommerce_remove_function() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
	remove_action( 'woocommerce_single_product_summary', 'woosc_add_button', 20);
	remove_action( 'woocommerce_single_product_summary', 'woosw_add_button', 35);
	add_filter('woocommerce_show_page_title', '__return_false');
}
add_action( 'init', 'agron_cwoocommerce_remove_function' );

/* Product Category */
add_action( 'woocommerce_before_shop_loop', 'agron_woocommerce_nav_top', 2 );
function agron_woocommerce_nav_top() { ?>
	<div class="woocommerce-topbar">
		<?php woocommerce_result_count(); ?>
		<?php woocommerce_catalog_ordering(); ?>
	</div>
<?php }

// Custom HTML Search Form Widget
add_filter( 'get_product_search_form', 'custom_product_search_form' );
function custom_product_search_form( $form ) {
    $form = '
    <form role="search" method="get" class="woocommerce-product-search custom-search-form" action="' . esc_url( home_url( '/' ) ) . '">
        <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="' . esc_attr__( 'Search', 'agron' ) . '" value="' . get_search_query() . '" name="s" />
        <button class="search-submit" type="submit" value="' . esc_attr_x( 'Search', 'submit button', 'agron' ) . '">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
				<path d="M16.5271 15.2321L20.4529 19.1579L19.1566 20.4542L15.2308 16.5284C13.8192 17.6578 12.029 18.3333 10.082 18.3333C5.52803 18.3333 1.83203 14.6373 1.83203 10.0833C1.83203 5.52934 5.52803 1.83334 10.082 1.83334C14.636 1.83334 18.332 5.52934 18.332 10.0833C18.332 12.0303 17.6564 13.8205 16.5271 15.2321ZM14.688 14.5519C15.8089 13.3967 16.4987 11.821 16.4987 10.0833C16.4987 6.53813 13.6272 3.66668 10.082 3.66668C6.53682 3.66668 3.66536 6.53813 3.66536 10.0833C3.66536 13.6286 6.53682 16.5 10.082 16.5C11.8197 16.5 13.3954 15.8102 14.5506 14.6893L14.688 14.5519Z" fill="currentcolor"/>
			</svg>
        </button>
        <input type="hidden" name="post_type" value="product" />
    </form>';
    return $form;
}

add_filter( 'woocommerce_before_shop_loop_item', 'agron_woocommerce_product' );
function agron_woocommerce_product() {
	global $product;
	$rating = $product->get_average_rating();
	?>
	<div class="product-box">
		<?php if($product->is_on_sale()) : ?>
			<span class="onsale percentage">
				<?php echo esc_html__('Sale', 'agron'); ?>
			</span>
		<?php endif; ?>
		<div class="product-action">
			<?php woocommerce_template_loop_add_to_cart(); ?>
			<?php if ( class_exists( 'WPCleverWoosq' ) ) : ?>
				<a href="#" class="woo-btn woosq-btn" data-id="<?php echo esc_attr( $product->get_id() ); ?>">
					<svg width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M10.2176 0C15.3102 0 19.5469 3.66422 20.4352 8.5C19.5469 13.3357 15.3102 17 10.2176 17C5.12501 17 0.888259 13.3357 0 8.5C0.888259 3.66422 5.12501 0 10.2176 0ZM10.2176 15.1111C14.2179 15.1111 17.641 12.3269 18.5074 8.5C17.641 4.67314 14.2179 1.88889 10.2176 1.88889C6.21724 1.88889 2.79421 4.67314 1.92774 8.5C2.79421 12.3269 6.21724 15.1111 10.2176 15.1111ZM10.2176 12.75C7.87038 12.75 5.96759 10.8472 5.96759 8.5C5.96759 6.15279 7.87038 4.25 10.2176 4.25C12.5648 4.25 14.4676 6.15279 14.4676 8.5C14.4676 10.8472 12.5648 12.75 10.2176 12.75ZM10.2176 10.8611C11.5216 10.8611 12.5787 9.80399 12.5787 8.5C12.5787 7.19601 11.5216 6.13889 10.2176 6.13889C8.91363 6.13889 7.85647 7.19601 7.85647 8.5C7.85647 9.80399 8.91363 10.8611 10.2176 10.8611Z" fill="currentcolor"/>
					</svg>
				</a>
			<?php endif; ?>
			<?php
				if ( class_exists( 'WPCleverWoosw' ) ) {
					echo do_shortcode( '[woosw_btn id="' . esc_attr( $product->get_id() ) . '" class="woosw-btn"]' );
				}
			?>
		</div>
		<a class="product-thumbnail" href="<?php echo get_permalink( $product->get_id() ); ?>">
			<?php pxl_print_html($product->get_image('full')); ?>
		</a>
		<div class="product-content">
			<?php if($rating > 0) : ?>
				<div class="product-rating">
					<?php for($i=0; $i<5; $i++) : ?>
						<?php if($i < $rating) : ?>
							<svg class="star-fill" width="16" height="15" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.14894 0.92705C9.4483 0.00573921 10.7517 0.00573969 11.0511 0.92705L12.5921 5.66991C12.726 6.08193 13.1099 6.36089 13.5432 6.36089L18.5301 6.3609C19.4988 6.3609 19.9016 7.60051 19.1179 8.16991L15.0834 11.1012C14.7329 11.3558 14.5862 11.8072 14.7201 12.2192L16.2611 16.9621C16.5605 17.8834 15.506 18.6495 14.7223 18.0801L10.6878 15.1488C10.3373 14.8942 9.8627 14.8942 9.51221 15.1488L5.4777 18.0801C4.69398 18.6495 3.6395 17.8834 3.93885 16.9621L5.4799 12.2192C5.61378 11.8072 5.46712 11.3558 5.11663 11.1012L1.08211 8.16991C0.2984 7.60051 0.701176 6.3609 1.6699 6.3609L6.65684 6.36089C7.09007 6.36089 7.47402 6.08193 7.60789 5.66991L9.14894 0.92705Z" stroke="var(--color-secondary)" stroke-width="1" fill="var(--color-secondary)"/>
							</svg>
						<?php else : ?>
							<svg class="star-stroke" width="16" height="15" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.14894 0.92705C9.4483 0.00573921 10.7517 0.00573969 11.0511 0.92705L12.5921 5.66991C12.726 6.08193 13.1099 6.36089 13.5432 6.36089L18.5301 6.3609C19.4988 6.3609 19.9016 7.60051 19.1179 8.16991L15.0834 11.1012C14.7329 11.3558 14.5862 11.8072 14.7201 12.2192L16.2611 16.9621C16.5605 17.8834 15.506 18.6495 14.7223 18.0801L10.6878 15.1488C10.3373 14.8942 9.8627 14.8942 9.51221 15.1488L5.4777 18.0801C4.69398 18.6495 3.6395 17.8834 3.93885 16.9621L5.4799 12.2192C5.61378 11.8072 5.46712 11.3558 5.11663 11.1012L1.08211 8.16991C0.2984 7.60051 0.701176 6.3609 1.6699 6.3609L6.65684 6.36089C7.09007 6.36089 7.47402 6.08193 7.60789 5.66991L9.14894 0.92705Z" stroke="var(--color-secondary)" stroke-width="1" fill="transparent"/>
							</svg>
						<?php endif; ?>
					<?php endfor; ?>
				</div>
			<?php endif; ?>
			<h6 class="product-title">
				<a href="<?php echo get_permalink( $product->get_id() ); ?>">
					<?php echo esc_html($product->get_name()); ?>
				</a>
			</h6>
			<div class="product-price">
				<?php woocommerce_template_loop_price(); ?>
			</div>
		</div>
	</div>
	<?php
}



/* Replace text Onsale */
add_filter('woocommerce_sale_flash', 'agron_custom_sale_text', 10, 3);
function agron_custom_sale_text($text, $post, $_product)
{
	$regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
	$sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
	$product_sale = '';
	if(!empty($sale_price)) {
		$product_sale = intval( ( (intval($regular_price) - intval($sale_price)) / intval($regular_price) ) * 100);
		return '<span class="onsale">' .$product_sale. '%</span>';
	}
}

/* WPC AJAX Add to Cart */
add_action('woosq_after_add_to_cart', function($product) {
	// woocommerce_template_loop_add_to_cart();
});


/* Single Product */
add_action( 'woocommerce_before_single_product_summary', 'insert_html_custom_before_single_product_summary', 0 );
function insert_html_custom_before_single_product_summary() { ?>
	<?php echo '<div class="product-details">'; ?>
<?php }

add_action( 'woocommerce_single_product_summary', 'custom_html_product_summary', 5 );
function custom_html_product_summary() { 
	woocommerce_template_single_rating();
	woocommerce_template_single_title(); 
	woocommerce_template_single_price();
	woocommerce_template_single_excerpt();
}
add_action('woocommerce_after_add_to_cart_quantity', 'add_wishlist_compare_buttons', 30);
function add_wishlist_compare_buttons() {
	global $product;
	woocommerce_template_loop_add_to_cart(); ?>
	<?php if ( class_exists( 'WPCleverWoosw' ) ) : 
		pxl_print_html(do_shortcode('[woosw id="'.esc_attr($product->get_id()).'"]'));
	endif; 
}
add_action( 'woocommerce_single_product_summary', 'agron_woocommerce_sg_social_share', 40 );
function agron_woocommerce_sg_social_share() { 
	?>
		<div class="woocommerce-social-share">
			<label class="woocommerce-social-label"><?php echo esc_html__('Share:', 'agron'); ?></label>
			<div>				
				<a class="fb-social woocomerce-social-item" title="<?php echo esc_attr__('Facebook', 'agron'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
						<path d="M4.71438 9.6369H6.67572V17.7114C6.67572 17.8708 6.80489 18 6.96431 18H10.2898C10.4493 18 10.5784 17.8708 10.5784 17.7114V9.67493H12.8332C12.9798 9.67493 13.1031 9.56492 13.1198 9.41929L13.4623 6.44666C13.4717 6.36487 13.4458 6.28297 13.3911 6.22162C13.3363 6.1602 13.2579 6.12505 13.1757 6.12505H10.5785V4.26166C10.5785 3.69994 10.881 3.4151 11.4776 3.4151C11.5626 3.4151 13.1757 3.4151 13.1757 3.4151C13.3351 3.4151 13.4643 3.28587 13.4643 3.1265V0.397907C13.4643 0.238488 13.3351 0.109313 13.1757 0.109313H10.8355C10.8189 0.108505 10.7823 0.107178 10.7283 0.107178C10.3222 0.107178 8.91082 0.186887 7.79592 1.21255C6.56063 2.34915 6.73234 3.71004 6.77338 3.946V6.125H4.71438C4.55496 6.125 4.42578 6.25417 4.42578 6.41359V9.34824C4.42578 9.50766 4.55496 9.6369 4.71438 9.6369Z" fill="currentcolor"/>
					</svg>
				</a>
				<a class="tw-social woocomerce-social-item" title="<?php echo esc_attr__('Twitter', 'agron'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20">
					<svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
						<path d="M6.6328 1.49109H1.41406L7.57282 9.70278L1.74952 16.4017H3.7252L8.48791 10.9228L12.5971 16.4018H17.8158L11.398 7.84476L16.9212 1.49109H14.9456L10.483 6.62467L6.6328 1.49109ZM13.3426 14.9107L4.3962 2.98216H5.88727L14.8337 14.9107H13.3426Z" fill="currentcolor"/>
					</svg>
				</a>
				<a class="pin-social woocomerce-social-item" title="<?php echo esc_attr__('Pinterest', 'agron'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>%20">
					<svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M9.28291 17.2544C13.8121 17.2544 17.4838 13.5827 17.4838 9.05354C17.4838 4.52432 13.8121 0.852661 9.28291 0.852661C4.75369 0.852661 1.08203 4.52432 1.08203 9.05354C1.08203 13.5827 4.75369 17.2544 9.28291 17.2544ZM4.17142 13.3926C3.17772 12.2232 2.57819 10.7084 2.57819 9.05354V9.0519C5.26677 9.02506 7.47549 8.66869 9.46348 7.99331C9.63092 8.35311 9.79337 8.72058 9.95061 9.09559C9.69705 9.17961 9.44767 9.2734 9.20224 9.37673C7.22655 10.2083 5.55925 11.634 4.17142 13.3926ZM5.2616 14.4189C6.38191 15.26 7.77421 15.7583 9.28291 15.7583C10.1916 15.7583 11.0579 15.5775 11.8482 15.25C11.4948 13.5542 11.0364 11.9663 10.4955 10.4862C10.2523 10.5643 10.0141 10.6528 9.7807 10.751C8.05725 11.4764 6.55308 12.755 5.2616 14.4189ZM11.9612 10.1543C12.4499 11.5152 12.8711 12.9601 13.2096 14.4886C14.5374 13.5277 15.4992 12.0921 15.846 10.4308C14.4378 10.0666 13.1463 9.99321 11.9612 10.1543ZM11.4133 8.73012C12.8272 8.48783 14.3522 8.53666 15.9865 8.92918C15.9613 7.5432 15.5155 6.25995 14.7715 5.20166C13.4846 6.11099 12.2111 6.86292 10.8568 7.45361C11.0489 7.8697 11.2345 8.29525 11.4133 8.73012ZM8.7951 6.64431C7.04432 7.21527 5.10081 7.52119 2.74547 7.55859C3.21221 5.50901 4.61805 3.81664 6.48645 2.95806C7.3068 4.06787 8.08506 5.29652 8.7951 6.64431ZM10.2001 6.11332C11.4357 5.58048 12.598 4.90158 13.7771 4.07802C12.5881 3.0033 11.0119 2.34882 9.28291 2.34882C8.83663 2.34882 8.40057 2.39242 7.97867 2.4756C8.76871 3.58383 9.51618 4.79648 10.2001 6.11332Z" fill="currentcolor"/>
					</svg>
				</a>
				<a class="lin-social woocomerce-social-item" title="<?php echo esc_attr__('LinkedIn', 'agron'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M8.94977 13.5267C11.4202 13.5267 13.423 11.524 13.423 9.05353C13.423 6.58304 11.4202 4.58032 8.94977 4.58032C6.47928 4.58032 4.47656 6.58304 4.47656 9.05353C4.47656 11.524 6.47928 13.5267 8.94977 13.5267ZM8.94977 12.0357C10.5967 12.0357 11.9319 10.7005 11.9319 9.05353C11.9319 7.40654 10.5967 6.07139 8.94977 6.07139C7.30278 6.07139 5.96763 7.40654 5.96763 9.05353C5.96763 10.7005 7.30278 12.0357 8.94977 12.0357Z" fill="currentcolor"/>
						<path d="M13.4213 3.83484C13.0096 3.83484 12.6758 4.16863 12.6758 4.58037C12.6758 4.99212 13.0096 5.32591 13.4213 5.32591C13.8331 5.32591 14.1668 4.99212 14.1668 4.58037C14.1668 4.16863 13.8331 3.83484 13.4213 3.83484Z" fill="currentcolor"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M1.23755 3.29508C0.75 4.25195 0.75 5.50456 0.75 8.00979V10.0973C0.75 12.6025 0.75 13.8551 1.23755 14.812C1.66641 15.6537 2.35072 16.338 3.19241 16.7668C4.14928 17.2544 5.4019 17.2544 7.90713 17.2544H9.99462C12.4998 17.2544 13.7525 17.2544 14.7093 16.7668C15.551 16.338 16.2353 15.6537 16.6642 14.812C17.1517 13.8551 17.1517 12.6025 17.1517 10.0973V8.00979C17.1517 5.50456 17.1517 4.25195 16.6642 3.29508C16.2353 2.45338 15.551 1.76907 14.7093 1.34021C13.7525 0.852661 12.4998 0.852661 9.99462 0.852661H7.90713C5.4019 0.852661 4.14928 0.852661 3.19241 1.34021C2.35072 1.76907 1.66641 2.45338 1.23755 3.29508ZM9.99462 2.34373H7.90713C6.62991 2.34373 5.76167 2.34489 5.09056 2.39972C4.43684 2.45313 4.10255 2.54994 3.86934 2.66876C3.30822 2.95467 2.85201 3.41088 2.5661 3.97201C2.44728 4.20521 2.35047 4.53951 2.29706 5.19322C2.24223 5.86433 2.24107 6.73257 2.24107 8.00979V10.0973C2.24107 11.3745 2.24223 12.2427 2.29706 12.9138C2.35047 13.5676 2.44728 13.9019 2.5661 14.1351C2.85201 14.6962 3.30822 15.1524 3.86934 15.4383C4.10255 15.5571 4.43684 15.654 5.09056 15.7074C5.76167 15.7621 6.62991 15.7633 7.90713 15.7633H9.99462C11.2719 15.7633 12.14 15.7621 12.8112 15.7074C13.4649 15.654 13.7992 15.5571 14.0324 15.4383C14.5935 15.1524 15.0497 14.6962 15.3356 14.1351C15.4545 13.9019 15.5513 13.5676 15.6047 12.9138C15.6595 12.2427 15.6607 11.3745 15.6607 10.0973V8.00979C15.6607 6.73257 15.6595 5.86433 15.6047 5.19322C15.5513 4.53951 15.4545 4.20521 15.3356 3.97201C15.0497 3.41088 14.5935 2.95467 14.0324 2.66876C13.7992 2.54994 13.4649 2.45313 12.8112 2.39972C12.14 2.34489 11.2719 2.34373 9.99462 2.34373Z" fill="currentcolor"/>
					</svg>
				</a>
			</div>
		</div>
	<?php 
}
// Related Product
add_filter( 'woocommerce_output_related_products_args', 'agron_related_products_args', 20 );
  function agron_related_products_args( $args ) {
	$related_product_columns = agron()->get_theme_opt('related_product_columns', 4);
	$related_products_per_page = agron()->get_theme_opt('related_products_per_page', 4);
	$args['posts_per_page'] = $related_products_per_page;
	$args['columns'] = $related_product_columns;
	return $args;
}
add_action( 'woocommerce_product_related_products_heading', function() {
    return pxl_print_html('<div class="releted-heading"><span class="heading-subtitle"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
    <path d="M2.88168 15.397L3.29246 15.8323C6.83128 15.7357 9.1423 16.2738 11.745 15.6502C15.5036 14.7495 17.6248 11.765 18.5174 8.85015C18.7603 7.89312 18.8933 6.92449 18.9522 5.99332C19.1094 3.50832 19.9979 0.0796472 19.9979 0.0796472C19.9979 0.0796472 11.6604 -0.714337 6.55992 2.71144C1.92941 5.82156 2.51808 10.4616 2.88168 12.6629C3.16402 14.3721 2.88168 15.397 2.88168 15.397Z" fill="#9EC63D"/>
    <path d="M11.7495 15.2985C9.08949 16.0955 7.50031 14.9074 3.29688 15.8322L3.78543 16.3499C8.07977 15.6796 8.88914 16.8814 11.7495 16.0244C15.8825 14.786 17.7536 11.8763 18.5218 8.8501C17.5082 11.6077 15.4518 14.1892 11.7495 15.2985Z" fill="#93B230"/>
    <path d="M5.75529 13.0038C5.69638 13.0038 5.63685 12.9866 5.58459 12.9508C5.44681 12.8564 5.4117 12.6681 5.50615 12.5303C7.16302 10.1131 6.52474 5.49656 6.5181 5.45023C6.49443 5.28492 6.6092 5.13163 6.77451 5.10796C6.93982 5.08425 7.09302 5.19894 7.11681 5.36425C7.14537 5.56292 7.79588 10.2597 6.00506 12.8724C5.94642 12.9578 5.8517 13.0038 5.75529 13.0038Z" fill="#B7E546"/>
    <path d="M9.64591 9.04516C9.59099 9.04516 9.53544 9.03024 9.48552 8.99887C9.34404 8.91012 9.30126 8.72344 9.39001 8.58196C9.83216 7.87708 10.0858 6.7393 10.1236 5.29169C10.1527 4.17942 10.0429 3.27977 10.0418 3.27079C10.0213 3.10505 10.139 2.95399 10.3047 2.93341C10.4705 2.91325 10.6215 3.03055 10.6421 3.1963C10.6612 3.35063 11.0976 6.99801 9.9024 8.90337C9.84497 8.99493 9.74658 9.04516 9.64591 9.04516Z" fill="#B7E546"/>
    <path d="M9.84932 9.0452C9.72065 9.0452 9.60135 8.96242 9.5608 8.83313C9.51084 8.67375 9.59955 8.50403 9.75893 8.4541C12.3911 7.62899 15.195 8.33637 15.3131 8.36684C15.4748 8.40863 15.572 8.57364 15.5302 8.73535C15.4884 8.89703 15.3233 8.99414 15.1619 8.95254C15.1346 8.94551 12.4035 8.25895 9.9399 9.03125C9.90975 9.04071 9.87928 9.0452 9.84932 9.0452Z" fill="#B7E546"/>
    <path d="M6.35315 12.7576C6.22252 12.7576 6.10209 12.6723 6.06323 12.5407C6.01596 12.3805 6.10745 12.2123 6.26764 12.165C9.90163 11.0923 13.6376 12.1197 13.7949 12.164C13.9556 12.2092 14.0493 12.3763 14.004 12.5371C13.9588 12.6978 13.7919 12.7914 13.6312 12.7463C13.5942 12.7359 9.90159 11.7229 6.43889 12.7452C6.41034 12.7536 6.38147 12.7576 6.35315 12.7576Z" fill="#B7E546"/>
    <path d="M0.511332 19.9719L1.23313 19.4306C3.22985 16.7072 8.60852 10.3716 13.4586 4.88501C10.0091 7.72622 4.93246 12.4358 0.139808 18.8699C-0.0958557 19.1863 -0.0262463 19.6347 0.293285 19.866C0.361254 19.9153 0.43516 19.9499 0.511332 19.9719Z" fill="#B7E546"/>
    <path d="M17.1022 5.2153C17.0248 5.19803 15.5405 4.87471 13.9979 5.07037L13.3576 5.30604L13.1914 5.85334C14.8654 5.34854 16.9492 5.80088 16.9707 5.80565C17.1335 5.8419 17.2952 5.73924 17.3315 5.57627C17.3679 5.41334 17.2652 5.25166 17.1022 5.2153Z" fill="#B7E546"/>
    <path d="M12.8438 5.39571L13.3562 5.30614L13.7049 4.68172C13.7833 4.33247 13.8463 3.93395 13.8933 3.48711C13.984 2.627 13.9814 1.91024 13.9812 1.88012C13.9804 1.7136 13.8452 1.57922 13.6789 1.57922C13.6783 1.57922 13.6778 1.57922 13.6773 1.57922C13.5102 1.58008 13.3755 1.71618 13.3764 1.88317C13.38 2.58594 13.2862 4.45168 12.8438 5.39571Z" fill="#B7E546"/>
    <path d="M16.7915 2.31261C16.0579 2.83667 14.9004 3.69792 13.459 4.88511C6.98383 11.2551 2.13738 17.6969 0.511719 19.972C0.794258 20.054 1.1098 19.9539 1.2884 19.6987C2.77207 17.5783 8.26098 10.0892 16.8698 2.41136C16.9295 2.35819 16.8565 2.2662 16.7915 2.31261Z" fill="#ABD641"/>
</svg><span class="subtitle-text">Related Products</span></span><h2 class="heading-title">Related Products for You</h2></div>');
});
// Comment Form
add_filter('comment_form_defaults', 'custom_comment_submit_button');
function custom_comment_submit_button($defaults) {
    $defaults['submit_button'] = '<button type="submit" class="pxl-button button-submit">
        <span class="pxl-button-text">
            <span class="pxl-button-icon icon-duplicated">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                    <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentColor"/>
                </svg>
            </span>
            Submit
            <span class="pxl-button-icon icon-main">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                    <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentColor"/>
                </svg>
            </span>
        </span>
    </button>';
    return $defaults;
}



// Checkout Page
add_filter('woocommerce_checkout_fields', 'agron_custom_checkout_placeholders');
function agron_custom_checkout_placeholders($fields) {
	$fields['billing']['billing_first_name']['placeholder'] = 'First Name';
	$fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
	$fields['billing']['billing_company']['placeholder'] = 'Company name (optional)';
	$fields['billing']['billing_city']['placeholder'] = 'Town / City *';
	$fields['billing']['billing_postcode']['placeholder'] = 'Postcode *';
	$fields['billing']['billing_phone']['placeholder'] = 'Phone number';
	$fields['billing']['billing_email']['placeholder'] = 'Your email';
	$fields['billing']['billing_first_name']['priority'] = 10;
	$fields['billing']['billing_last_name']['priority']  = 20;
	$fields['billing']['billing_company']['priority']     = 30;
	$fields['billing']['billing_address_1']['priority']   = 40;
	$fields['billing']['billing_country']['priority']     = 50;
	$fields['billing']['billing_address_2']['priority']   = 60;
	$fields['billing']['billing_city']['priority']        = 70;
	$fields['billing']['billing_state']['priority']       = 80;
	$fields['billing']['billing_postcode']['priority']    = 90;
	$fields['billing']['billing_phone']['priority']       = 100;
	$fields['billing']['billing_email']['priority']       = 110;
	return $fields;
}

add_action('woocommerce_checkout_after_customer_details', function() {
	?>
	<div class="woocomerce-order">
	<?php
});

add_action('woocommerce_review_order_after_submit', function() {
	?>
	</div>
	<?php
});

add_filter('woocommerce_order_button_html', 'custom_place_order_button_html');
function custom_place_order_button_html($button) {
    $custom_button = '<button type="submit" class="button alt custom-place-order-btn" name="woocommerce_checkout_place_order" id="place_order" value="Place order">
		<span class="pxl-button-text">
			<span class="pxl-button-icon icon-duplicated">
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
					<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
				</svg>
			</span>
			Place Your Order
			<span class="pxl-button-icon icon-main">
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
					<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
				</svg>
			</span>
		</span>

    </button>';
    return $custom_button;
}

add_action('wp_footer', 'agron_custom_login_placeholders');
function agron_custom_login_placeholders() {
	if (is_account_page()) {
		?>
		<script>
			jQuery(document).ready(function($) {
				$('#customer_login #username').attr("placeholder", "Username or email address");
				$('#customer_login #password').attr("placeholder", "Password");
				$('#customer_login #reg_email').attr("placeholder", "Email address");
				$('#customer_login #reg_username').attr("placeholder", "Username");
				$('#customer_login #reg_password').attr("placeholder", "Password");
				$('.lost_reset_password #user_login').attr("placeholder", "Username or email");
			});
		</script>
		<?php
	}
}


/* Ajax update cart item */
add_filter('woocommerce_add_to_cart_fragments', 'agron_woo_mini_cart_item_fragment');
function agron_woo_mini_cart_item_fragment( $fragments ) {
	global $woocommerce;
	$product_subtitle = agron()->get_page_opt( 'product_subtitle' );
    ob_start();
    ?>
    <div class="widget_shopping_cart">
    	<div class="widget_shopping_head">
    		<div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
	    	<div class="widget_shopping_title">
	    		<?php echo esc_html__( 'Cart', 'agron' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'agron' ), WC()->cart->cart_contents_count ); ?>)</span>
	    	</div>
	    </div>
        <div class="widget_shopping_cart_content">
            <?php
            	$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
            ?>
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
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
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
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="pxl-button btn-shop wc-forward pxl-button-default">
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
    <?php
    $fragments['div.widget_shopping_cart'] = ob_get_clean();
    return $fragments;
}

/* Ajax update cart total number */
add_filter( 'woocommerce_add_to_cart_fragments', 'agron_woocommerce_sidebar_cart_count_number' );
function agron_woocommerce_sidebar_cart_count_number( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter">(<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'agron' ), WC()->cart->cart_contents_count ); ?>)</span>
	<?php
	
	$fragments['span.widget_cart_counter'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'agron_woocommerce_sidebar_cart_count_number_header' );
function agron_woocommerce_sidebar_cart_count_number_header( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter_header"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'agron' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.widget_cart_counter_header'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'agron_woocommerce_sidebar_cart_count_number_sidebar' );
function agron_woocommerce_sidebar_cart_count_number_sidebar( $fragments ) {
	ob_start();
	?>
	<span class="ct-cart-count-sidebar"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'agron' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.ct-cart-count-sidebar'] = ob_get_clean();
	
	return $fragments;
}


/* Pagination Args */
function agron_filter_woocommerce_pagination_args( $array ) { 
	$array['end_size'] = 1;
	$array['mid_size'] = 1;
    return $array; 
}; 
add_filter( 'woocommerce_pagination_args', 'agron_filter_woocommerce_pagination_args', 10, 1 ); 

/* Flex Slider Arrow */
add_filter( 'woocommerce_single_product_carousel_options', 'agron_update_woo_flexslider_options' );
function agron_update_woo_flexslider_options( $options ) {
$options['directionNav'] = true;
	return $options;
}

/* Single Thumbnail Size */
$single_img_size = agron()->get_theme_opt('single_img_size');
if(!empty($single_img_size['width']) && !empty($single_img_size['height'])) {
	add_filter('woocommerce_get_image_size_single', function ($size) {
		$single_img_size = agron()->get_theme_opt('single_img_size');
		$single_img_size_width = preg_replace('/[^0-9]/', '', $single_img_size['width']);
		$single_img_size_height = preg_replace('/[^0-9]/', '', $single_img_size['height']);
		$size['width'] = $single_img_size_width;
	    $size['height'] = $single_img_size_height;
	    $size['crop'] = 1;
	    return $size;
	});
}
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    $size['width'] = 300;
    $size['height'] = 300;
    $size['crop'] = 1;
    return $size;
});

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
    $size['width'] = 600;
    $size['height'] = 506;
    $size['crop'] = 1;
    return $size;
});

// Pagination Link
add_filter('woocommerce_pagination_args', 'agron_woocommerce_pagination_args');
function agron_woocommerce_pagination_args($default){
	$default = array_merge($default, [
		'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
							<g transform="scale(-1,1) translate(-16,0)">
								<path d="M12.1716 6.77822L6.8076 1.41421L8.2218 0L16 7.77822L8.2218 15.5563L6.8076 14.1421L12.1716 8.77822H0V6.77822H12.1716Z" fill="currentcolor"/>
							</g>
						</svg>
					',
		'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
							<path d="M12.1716 6.77822L6.8076 1.41421L8.2218 0L16 7.77822L8.2218 15.5563L6.8076 14.1421L12.1716 8.77822H0V6.77822H12.1716Z" fill="currentcolor"/>
						</svg>',
		'type'      => 'plain',
	]);
	return $default;
}

// Custom Button Add to Cart 
add_filter('woocommerce_loop_add_to_cart_link', 'agron_woocommerce_loop_add_to_cart_link', 10, 3);
function agron_woocommerce_loop_add_to_cart_link($button, $product, $args){
	global $woocommerce_loop;
	if ( is_shop() || is_product_category() || is_product_tag() || (isset($woocommerce_loop['name']) && $woocommerce_loop['name'] == 'related') ) { 
		return sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'woo-btn' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			'<svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.366 0L16.577 5.38395L20 5.38412V7.32012L18.833 7.31993L18.0764 16.1124C18.0332 16.6141 17.5999 17 17.0798 17H2.92014C2.40005 17 1.96678 16.6141 1.92359 16.1124L1.166 7.31993L0 7.32012V5.38412L3.422 5.38395L6.63398 0L8.36602 0.967988L5.732 5.38395H14.267L11.634 0.967988L13.366 0ZM16.826 7.31993L3.173 7.32012L3.84 15.064H16.159L16.826 7.31993ZM11 9.2561V13.128H9.00002V9.2561H11ZM7 9.2561V13.128H5V9.2561H7ZM15 9.2561V13.128H13V9.2561H15Z" fill="currentcolor"/></svg>'
		);
	}
	if(is_product()) {
		$args['class'] .= ' single_add_to_cart_button';
	}
	return sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'woo-btn pxl-button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		'<span class="pxl-button-text">
			<span class="pxl-button-icon icon-duplicated">
			<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
					<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
				</svg>                                    
			</span>
			Add to cart
			<span class="pxl-button-icon icon-main">
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
					<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
				</svg>                                    
			</span>
		</span>'
	);
}

// Custom Wishlist Button
add_filter( 'woosw_button_text', function( $text ) {
	if(is_singular('product')) {
		$btn_content = '<span class="pxl-button-text"><span class="pxl-button-icon icon-duplicated"><i class="flaticon flaticon-heart"></i></span>Wishlist<span class="pxl-button-icon icon-main"><i class="flaticon flaticon-heart"></i></span></span>';
		return $btn_content; 
	}
    return '';
});

add_filter( 'woosw_button_text_added', function( $text ) {
	if(is_singular('product')) {
		$btn_content = '<span class="pxl-button-text"><span class="pxl-button-icon icon-duplicated">
				<i class="flaticon flaticon-like"></i>
			</span>
			Wishlist
			<span class="pxl-button-icon icon-main">
				<i class="flaticon flaticon-like"></i>
			</span>
		</span>'; 
		return $btn_content;
	}
    return '';
});

function get_best_selling_products( $limit ) {
    $args = array(
        'post_type'     => 'product',
        'post_status'   => 'publish',
        'meta_key'      => 'total_sales',
        'orderby'       => 'meta_value_num',
        'order'         => 'DESC',
        'posts_per_page'=> $limit
    );
    $products = wc_get_products( $args );
    return $products;
}


add_filter('woocommerce_product_get_rating_html', function($html, $rating) {
	$star_fill = '<svg class="star-fill" width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M7.04894 0.92705C7.3483 0.00573921 8.6517 0.00573969 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58778 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z" fill="currentcolor" />
	</svg>';
	$haft_star = '<svg class="haft-star" width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path class="main" d="M7.04894 0.92705C7.3483 0.00573921 8.6517 0.00573969 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58778 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z" fill="currentcolor" stroke="currentcolor" stroke-width="1"/>
	<path class="copy" d="M7.04894 0.92705C7.3483 0.00573921 8.6517 0.00573969 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58778 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z" stroke="currentcolor" stroke-width="1"/>

	</svg>';
	$star_stroke = '<svg class="star-stroke" width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M7.04894 0.92705C7.3483 0.00573921 8.6517 0.00573969 8.95106 0.92705L10.0206 4.21885C10.1545 4.63087 10.5385 4.90983 10.9717 4.90983H14.4329C15.4016 4.90983 15.8044 6.14945 15.0207 6.71885L12.2205 8.75329C11.87 9.00793 11.7234 9.4593 11.8572 9.87132L12.9268 13.1631C13.2261 14.0844 12.1717 14.8506 11.388 14.2812L8.58778 12.2467C8.2373 11.9921 7.7627 11.9921 7.41221 12.2467L4.61204 14.2812C3.82833 14.8506 2.77385 14.0844 3.0732 13.1631L4.14277 9.87132C4.27665 9.4593 4.12999 9.00793 3.7795 8.75329L0.979333 6.71885C0.195619 6.14945 0.598395 4.90983 1.56712 4.90983H5.02832C5.46154 4.90983 5.8455 4.63087 5.97937 4.21885L7.04894 0.92705Z" stroke="currentcolor" stroke-width="1"/>
	</svg>';
	$rating_int = floor($rating);
	$has_haft = ($rating - $rating_int) === 0.5; 
	$html = '<div class="rating-star">';
	for($i=1; $i<=5; $i++) {
		if($i <= $rating_int) $html .= $star_fill;
		else {
			if($has_haft) {
				if($i == ($rating_int + 1)) {
					$html .= $haft_star;
				}else {
					$html .= $star_stroke;
				}
			}else {
				$html .= $star_stroke;
			}
		}
	}
	$html .= '</div>';
	return $html;
}, 10, 2);

function get_product_sale_percent( $product ) {
	if ( $product->is_on_sale() ) {
		$regular_price = (float) $product->get_regular_price();
		$sale_price    = (float) $product->get_sale_price();

		if ( $regular_price > 0 ) {
			return round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
		}
	}
	return 0;
}

// Update cart count via AJAX fragments
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    ob_start();
    ?>
    <span class="pxl-count cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();
    return $fragments;
});

//WPC Wishlist
add_filter('woosw_button_position_single', '__return_false');
add_filter('woosw_button_position_archive', '__return_false');
add_filter('woosc_button_position_single', '__return_false');
add_filter('woosc_button_position_archive', '__return_false');


//WPC Compare
add_filter('woosc_button_position_single', '__return_false');
add_filter('woosc_button_position_archive', '__return_false');

// add_filter('woosc_button_attrs', function($attrs, $original_attrs) {
// 	$svg = 'ccc';
//     $attrs['text'] = $svg;
//     $attrs['text_added'] = $svg;
//     return $attrs;
// }, 10, 2);
