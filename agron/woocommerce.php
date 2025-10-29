<?php 
get_header();
$sidebar = agron()->get_sidebar_value('page'); 
?>
<div class="container <?php echo esc_attr($sidebar['sidebar_class']); ?>">
    <div id="pxl-content-area" class="pxl-content-area">
        <main id="pxl-content-main">
            <?php woocommerce_content(); ?>
        </main>
    </div>

    <?php if($sidebar['is_sidebar'] == true) : ?>
        <aside id="pxl-sidebar-area" class="pxl-sidebar-area">
            <div class="pxl-sidebar-content">
                <?php get_sidebar(); ?>
            </div>
        </aside>
    <?php endif; ?>
</div>
<?php get_footer();