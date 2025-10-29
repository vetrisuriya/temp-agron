<?php
/**
 * @package Case-Themes
 */
get_header();
$sidebar = agron()->get_sidebar_value('post'); 
?>
<div class="container <?php echo esc_attr($sidebar['sidebar_class']); ?>">
    <div id="pxl-content-area" class="pxl-content-area">
        <?php while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/content/content-single', get_post_format() );
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        } ?>
    </div>
    <?php if($sidebar['is_sidebar'] == true) : ?>
        <aside id="pxl-sidebar-area" class="pxl-sidebar-area">
            <?php get_sidebar(); ?>
        </aside>
    <?php endif; ?>
</div>
<?php get_footer();
