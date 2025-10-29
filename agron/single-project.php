<?php
/**
 * @package Case-Themes
 */
get_header();
?>

<?php while ( have_posts() ) {
    the_post(); ?>
    <article id="pxl-post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links">',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) ); ?>
    </article><!-- #post -->
    <?php if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
} ?>

<?php get_footer();
