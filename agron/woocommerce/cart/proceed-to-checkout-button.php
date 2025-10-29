<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
	<span class="pxl-button-text">
		<span class="pxl-button-icon icon-duplicated">
			<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
				<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
			</svg>
		</span>
		<?php echo esc_html__( 'Proceed to checkout', 'agron' ); ?>
		<span class="pxl-button-icon icon-main">
			<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
				<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
			</svg>
		</span>
	</span>	
</a>
