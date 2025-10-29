<?php
/**
 * @package Case-Themes
 */
get_header(); 
$page_id = agron()->get_theme_opt('404_page_id', '');
if(!empty($page_id)) :
    echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display((int)$page_id);
else : ?>
<div class="container">
    <div class="inner">
        <h1 class="pxl-404-title">
            <?php echo esc_html__('Page Not Found!', 'agron'); ?>
        </h1>
    </div>
</div>
<?php endif;
get_footer();