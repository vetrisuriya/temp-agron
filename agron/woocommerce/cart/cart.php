<?php

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	<div class="cart-table shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<div class="cart-table-header">
			<div class="table-title product-remove"><span class="screen-reader-text"><?php esc_html_e( 'Remove item', 'agron' ); ?></span></div>
			<div class="table-title product-info"><?php esc_html_e( 'Product', 'agron' ); ?></div>
			<div class="table-title product-price"><?php esc_html_e( 'Price', 'agron' ); ?></div>
			<div class="table-title product-quantity"><?php esc_html_e( 'Quantity', 'agron' ); ?></div>
			<div class="table-title product-subtotal"><?php esc_html_e( 'Subtotal', 'agron' ); ?></div>
		</div>
		<div class="cart-table-content">
			<?php do_action( 'woocommerce_before_cart_contents' ); 
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				/**
				 * Filter the product name.
				 *
				 * @since 2.1.0
				 * @param string $product_name Name of the product in the cart.
				 * @param array $cart_item The product in the cart.
				 * @param string $cart_item_key Key for the product in the cart.
				 */
				$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="cart-table-item woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">	
						<div class="product-remove">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										/* translators: %s is the product name */
										esc_attr( sprintf( __( 'Remove %s from cart', 'agron' ), wp_strip_all_tags( $product_name ) ) ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</div>
						<div class="product-info" data-title="<?php esc_attr_e( 'Products', 'agron' ); ?>">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('full'), $cart_item, $cart_item_key );
							if ( ! $product_permalink ) {
								echo wp_kses_post($thumbnail); // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
							if ( ! $product_permalink ) {
								echo wp_kses_post( $product_name . '&nbsp;' );
							} else {
								/**
								 * This filter is documented above.
								 *
								 * @since 2.1.0
								 */
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
							}
							do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

							// Backorder notification.
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'agron' ) . '</p>', $product_id ) );
							}
						?>
						</div>
						<div class="product-price" data-title="<?php esc_attr_e( 'Price', 'agron' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</div>
						<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'agron' ); ?>">
						<?php
							if ( $_product->is_sold_individually() ) {
								$min_quantity = 1;
								$max_quantity = 1;
							} else {
								$min_quantity = 0;
								$max_quantity = $_product->get_max_purchase_quantity();
							}
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $max_quantity,
									'min_value'    => $min_quantity,
									'product_name' => $product_name,
								),
								$_product,
								false
							);
							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</div>

						<div class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'agron' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</div>
					</div>
					<?php
				}
			}
			?>
			<?php do_action( 'woocommerce_cart_contents' ); ?>
			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</div>
		<div class="actions cart-tabel-actions">
			<?php if ( wc_coupons_enabled() ) { ?>
				<div class="coupon">
					<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'agron' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'agron' ); ?>" /> 
					<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'agron' ); ?>">
						<span class="screen-reader-text"><?php esc_html_e('Apply coupon', 'agron'); ?></span>
						<span class="pxl-button-text">
							<span class="pxl-button-icon icon-duplicated">
								<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
									<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
								</svg>                                    
							</span>
							<?php esc_html_e('Apply coupon', 'agron'); ?>
							<span class="pxl-button-icon icon-main">
								<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
									<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
								</svg>                                    
							</span>
						</span>
					</button>
					<?php do_action( 'woocommerce_cart_coupon' ); ?>
				</div>
			<?php } ?>

			<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'agron' ); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Update cart', 'agron' ); ?></span>
				<span class="pxl-button-text">
					<span class="pxl-button-icon icon-duplicated">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
							<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
						</svg>                                    
					</span>
					<?php esc_html_e( 'Update cart', 'agron' ); ?>
					<span class="pxl-button-icon icon-main">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
							<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
						</svg>                                    
					</span>
				</span>
			</button>

			<?php do_action( 'woocommerce_cart_actions' ); ?>

			<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
