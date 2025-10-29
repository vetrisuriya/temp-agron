<?php
/**
 * @package Case-Themes
 */
get_header();
if(class_exists('\Elementor\Plugin')){
    $id = get_the_ID();
    if ( is_singular() && \Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor() ) {
        $classes = 'elementor-container';
    } else {
        $classes = 'container';
    }
}
?>
<div class="<?php echo esc_attr($classes); ?>">
    <?php while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content/content', 'page' );
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    } ?>
    <?php get_footer(); ?>
</div>