<?php
/**
 * @package Case -Themes
 */

get_header();
$sidebar = agron()->get_sidebar_value('blog'); 
?>
<div class="container <?php echo esc_attr($sidebar['sidebar_class']); ?>">
    <div id="pxl-content-area" class="pxl-content-area">
        <main id="pxl-content-main">
            <?php if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/archive/standard' );
                }
                agron()->page->get_pagination();
            } else {
                get_template_part( 'template-parts/content/content', 'none' );
            } ?>
        </main>
    </div>
    <?php if($sidebar['is_sidebar'] == true) : ?>
        <div id="pxl-sidebar-area" class="pxl-sidebar-area">
            <div class="pxl-sidebar-content">
                <?php get_sidebar(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php get_footer();
