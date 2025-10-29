<?php
/**
 * @package Case-Themes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php 
        wp_body_open(); 
        $smooth_scroll = agron()->get_opt('smooth_scroll', 'off'); 
        $on_page_title_404 = (bool)agron()->get_theme_opt('on_page_title_404', '1')
    ?>
    <div id="pxl-wrapper" class="pxl-wrapper">
    <?php agron()->page->get_site_loader();
    if($smooth_scroll === 'on') : ?>
        <div id="smooth-wrapper">
            <div id="smooth-content">
    <?php endif; ?>
        <?php 
            agron()->header->getHeader();
            if((!is_single() && !is_search())) {
                agron()->page->get_page_title();
            }elseif(is_404() && $on_page_title_404) {
                agron()->page->get_page_title();
            }
            elseif(!is_404()) {
                agron()->page->get_post_title();
            }
        ?>
        <main id="pxl-main">
