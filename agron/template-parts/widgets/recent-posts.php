<?php defined( 'ABSPATH' ) or exit( -1 );
/**
 * Recent Posts widgets
 * @package Case-Themes
 */

class Agron_Recent_Posts_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'pxl_recent_posts',
            esc_html__( 'Agron Recent Posts', 'agron' ),
            array(
                'description' => esc_html__( 'Your site’s most recent Posts.', 'agron' ),
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
        $post_in = $instance['post_in'];
        $sticky = '';
        if($post_in == 'featured') {
            $sticky = get_option( 'sticky_posts' );
        }
        $r = new WP_Query( array(
            'post_type'           => 'post',
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'post__in'  => $sticky,
            'post__not_in' => [get_the_ID()],
        ) );
        $i = 0;

        if ( $r->have_posts() ) : ?>
            <div class="pxl-post-list">
                <?php while ( $r->have_posts() ) :
                    $r->the_post();
                    global $post; 
                    $thumbnail = agron_get_image_by_size([
                        'img_dimension' => [
                            'width' => 767,
                            'height' => 632,
                        ] ,
                        'attr' => [
                            'class' => 'pxl-image'
                        ]
                    ], $post->ID);
                    ?>
                    <div class="pxl-post-item">
                        <div class="pxl-post-featured">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                        <div class="pxl-post-content">
                            <div class="pxl-post-date">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path d="M2.75065 20.1663H19.2507C19.4938 20.1663 19.7269 20.0698 19.8988 19.8979C20.0707 19.7259 20.1673 19.4928 20.1673 19.2497V5.49967C20.1673 5.25656 20.0707 5.0234 19.8988 4.85149C19.7269 4.67959 19.4938 4.58301 19.2507 4.58301H15.584V2.74967C15.584 2.50656 15.4874 2.2734 15.3155 2.10149C15.1436 1.92958 14.9104 1.83301 14.6673 1.83301C14.4242 1.83301 14.191 1.92958 14.0191 2.10149C13.8472 2.2734 13.7507 2.50656 13.7507 2.74967V4.58301H8.25065V2.74967C8.25065 2.50656 8.15407 2.2734 7.98217 2.10149C7.81026 1.92958 7.5771 1.83301 7.33398 1.83301C7.09087 1.83301 6.85771 1.92958 6.6858 2.10149C6.5139 2.2734 6.41732 2.50656 6.41732 2.74967V4.58301H2.75065C2.50754 4.58301 2.27438 4.67959 2.10247 4.85149C1.93056 5.0234 1.83398 5.25656 1.83398 5.49967V19.2497C1.83398 19.4928 1.93056 19.7259 2.10247 19.8979C2.27438 20.0698 2.50754 20.1663 2.75065 20.1663ZM3.66732 6.41634H18.334V9.16634H3.66732V6.41634ZM3.66732 10.9997H18.334V18.333H3.66732V10.9997Z" fill="currentcolor"/>
                                </svg>
                                <?php echo get_the_date('d F, Y'); ?>
                            </div>
                            <?php printf(
                                '<h5 class="pxl-post-title"><a href="%1$s" title="%2$s">%3$s</a></h5>',
                                esc_url( get_permalink() ),
                                esc_attr( get_the_title() ),
                                get_the_title()
                            ); ?>
                        </div>
                    </div>
                <?php  $i++; endwhile; ?>
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
        $instance['post_in'] = strip_tags($new_instance['post_in']);
        return $instance;
    }

    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'Recent Posts', 'agron' ),
            'number'        => 4,
        ) );

        $title         = $instance['title'];
        $number        = absint( $instance['number'] );
        $post_in = isset($instance['post_in']) ? esc_attr($instance['post_in']) : '';

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'agron' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p><label for="<?php echo esc_url($this->get_field_id('post_in')); ?>"><?php esc_html_e( 'Post in', 'agron' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_in') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_in') ); ?>">
                <option value="recent"<?php if( $post_in == 'recent' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Recent', 'agron'); ?></option>
                <option value="featured"<?php if( $post_in == 'featured' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Featured', 'agron'); ?></option>
                <option value="best-seller"<?php if( $post_in == 'best-seller' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Best Seller', 'agron'); ?></option>

            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'agron' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>

        <?php
    }
}
add_action( 'widgets_init', 'agron_register_recent_widget' );
function agron_register_recent_widget(){
    if(function_exists('pxl_register_wp_widget')){
        pxl_register_wp_widget( 'Agron_Recent_Posts_Widget' );
    }
}