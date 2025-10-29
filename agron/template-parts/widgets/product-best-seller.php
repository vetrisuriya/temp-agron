<?php defined( 'ABSPATH' ) or exit( -1 );
/**
 * Product Best Seller widgets
 * @package Case-Themes
 */

class Agron_Product_Best_Seller_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'pxl_product_best_seller',
            esc_html__( 'Agron Product Best Seller', 'agron' ),
            array(
                'description' => esc_html__( 'Your site’s most popular products.', 'agron' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    function widget( $args, $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => '',
            'number'        => 3,
            'post_in'        => '',
        ) );

        $title = $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo wp_kses_post($args['before_widget']);

        echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']);

        $number = absint( $instance['number'] );
        if ( $number <= 0 || $number > 10)
        {
            $number = 4;
        }
        $r = new WP_Query( array(
            'post_type' => 'product',
            'posts_per_page' => $number,
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => '_stock_status',
                    'value' => 'instock'
                )
            ),
            'post__not_in' => [get_the_ID()],
        ));
        $i = 0;

        if ( $r->have_posts() ) : ?>
            <div class="product-list">
                <?php while ( $r->have_posts() ) :
                    $r->the_post();
                    global $product; 
                    $thumbnail = agron_get_image_by_size([
                        'img_dimension' => 'full' ,
                        'attr' => [
                            'class' => 'pxl-image'
                        ]
                    ], $product->get_id());
                    $rating = $product->get_average_rating();
                ?>
                    <div class="product-item">
                        <div class="product-featured">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                        <div class="product-content">
                            <?php if($rating > 0) : ?>
                                <div class="product-rating">
                                    <?php for($i=0; $i<5; $i++) : ?>
                                        <?php if($i < $rating) : ?>
                                            <svg class="star-fill" width="14" height="13" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.14894 0.92705C9.4483 0.00573921 10.7517 0.00573969 11.0511 0.92705L12.5921 5.66991C12.726 6.08193 13.1099 6.36089 13.5432 6.36089L18.5301 6.3609C19.4988 6.3609 19.9016 7.60051 19.1179 8.16991L15.0834 11.1012C14.7329 11.3558 14.5862 11.8072 14.7201 12.2192L16.2611 16.9621C16.5605 17.8834 15.506 18.6495 14.7223 18.0801L10.6878 15.1488C10.3373 14.8942 9.8627 14.8942 9.51221 15.1488L5.4777 18.0801C4.69398 18.6495 3.6395 17.8834 3.93885 16.9621L5.4799 12.2192C5.61378 11.8072 5.46712 11.3558 5.11663 11.1012L1.08211 8.16991C0.2984 7.60051 0.701176 6.3609 1.6699 6.3609L6.65684 6.36089C7.09007 6.36089 7.47402 6.08193 7.60789 5.66991L9.14894 0.92705Z" stroke="#EDCA74" stroke-width="1" fill="#EDCA74"/>
                                            </svg>
                                        <?php else : ?>
                                            <svg class="star-stroke" width="14" height="13" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.14894 0.92705C9.4483 0.00573921 10.7517 0.00573969 11.0511 0.92705L12.5921 5.66991C12.726 6.08193 13.1099 6.36089 13.5432 6.36089L18.5301 6.3609C19.4988 6.3609 19.9016 7.60051 19.1179 8.16991L15.0834 11.1012C14.7329 11.3558 14.5862 11.8072 14.7201 12.2192L16.2611 16.9621C16.5605 17.8834 15.506 18.6495 14.7223 18.0801L10.6878 15.1488C10.3373 14.8942 9.8627 14.8942 9.51221 15.1488L5.4777 18.0801C4.69398 18.6495 3.6395 17.8834 3.93885 16.9621L5.4799 12.2192C5.61378 11.8072 5.46712 11.3558 5.11663 11.1012L1.08211 8.16991C0.2984 7.60051 0.701176 6.3609 1.6699 6.3609L6.65684 6.36089C7.09007 6.36089 7.47402 6.08193 7.60789 5.66991L9.14894 0.92705Z" stroke="#EDCA74" stroke-width="1" fill="transparent"/>
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
                <?php endwhile; ?>
            </div>
        <?php endif;

        wp_reset_postdata();
        wp_reset_query();

        echo wp_kses_post($args['after_widget']);
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title']         = sanitize_text_field( $new_instance['title'] );
        $instance['number']        = absint( $new_instance['number'] );
        return $instance;
    }

    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'Best Seller', 'agron' ),
            'number'        => 3,
        ) );

        $title         = $instance['title'];
        $number        = absint( $instance['number'] );

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'agron' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'agron' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>

        <?php
    }
}
add_action( 'widgets_init', 'agron_register_product_best_seller_widget' );
function agron_register_product_best_seller_widget(){
    if(function_exists('pxl_register_wp_widget')){
        pxl_register_wp_widget( 'Agron_Product_Best_Seller_Widget' );
    }
}