<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Case-Themes
 */
$post_id = get_the_ID();
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl-single-post'); ?>>
    <?php
        the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links">',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
    ?>
    <div class="pxl-post-footer">
        <?php 
            agron()->blog->get_tags();
            agron()->blog->get_socials_share(); 
        ?>
    </div>
    <div class="pxl-divider"></div>
</article><!-- #post -->