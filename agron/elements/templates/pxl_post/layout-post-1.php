<?php
    $post_type = $widget->get_setting('post_type', ['post']);
    $tax = ['category'];
    $layout = $widget->get_setting('layout_'.$post_type, 'post-1');
    $select_post_by = $widget->get_setting('select_post_by', '');
    $post_ids = ($select_post_by === 'post_selected') ? $widget->get_setting('source_'.$post_type.'_post_ids', '') : [];
    $source = ($select_post_by === 'term_selected') ? $widget->get_setting('source_'.$post_type , '') : [];
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 6);
    extract(pxl_get_posts_of_grid(
        $post_type, 
        [
            'source' => $source, 
            'orderby' => $orderby, 
            'order' => $order, 
            'limit' => $limit, 
            'post_ids' => $post_ids
        ],
    ));

    if( count($posts) <= 0) : ?>
        <div class="pxl-notification"><?php echo esc_html__( 'No Post Found', 'agron' ); ?></div>;
        <?php return; ?>
    <?php endif;
    
    $title_tag = $widget->get_setting('title_tag', 'h4');
    $img_dimension = $widget->get_setting('img_dimension', 'custom');
    if($img_dimension === 'custom') {
        $custom_img_dimension = $widget->get_setting('custom_img_dimension', []);
        $img_dimension = (!empty($custom_img_dimension['width']) && !empty($custom_img_dimension['height'])) ? $custom_img_dimension : ['width' => 869, 'height' => 462];
    }
    $entrance_anim = $widget->get_setting('entrance_anim', '');
    $anim_delay    = $widget->get_setting('anim_delay', 0);
    $featured_hover_style = $widget->get_setting('featured_hover_style', 'hover-image-default');
    $title_hover_style    = $widget->get_setting('title_hover_style', 'hover-text-default');

    $show_author = (bool)$widget->get_setting('show_author', '');
    $show_comment = (bool)$widget->get_setting('show_comment', '');
    $show_reading_time = (bool)$widget->get_setting('show_reading_time', '');
    $show_excerpt = (bool)$widget->get_setting('show_excerpt', '');
    $num_of_words = $widget->get_setting('num_of_words', 50 );
    $show_button = (bool)$widget->get_setting('show_button', '');
    $button_text = $widget->get_setting('button_text', 'More Details');

    $pagination = $widget->get_setting('grid_pagination', '');

    $load_more = array(
        'tax'             => $tax,
        'post_type'       => $post_type,   
        'layout'          => $layout,
        'startPage'       => $paged,
        'maxPages'        => $max,
        'total'           => $total,
        'perpage'         => $limit,
        'nextLink'        => $next_link,
        'source'          => $source,
        'orderby'         => $orderby,
        'order'           => $order,
        'limit'           => $limit,
        'post_ids'        => $post_ids,
        'pagination'      => $pagination,
        'title_tag'       => $title_tag,
        'show_author'     => $show_author,
        'show_comment'    => $show_comment,
        'show_reading_time' => $show_reading_time,
        'show_excerpt'    => $show_excerpt,
        'num_of_words'    => $num_of_words,
        'show_button'     => $show_button,
        'button_text'     => $button_text,
        'img_dimension'   => $img_dimension,
        'featured_hover_style' => $featured_hover_style,
        'title_hover_style'    => $title_hover_style,
        'entrance_anim'   => $entrance_anim,
    );
    $wrap_attrs = [
        'class'            => 'grid pxl-post pxl-post-grid pxl-post-layout1',
        'data-start-page'  => $paged,
        'data-max-pages'   => $max,
        'data-total'       => $total,
        'data-perpage'     => $limit,
        'data-next-link'   => $next_link,
        
    ];
    if (!empty($pagination)){
        $wrap_attrs['data-loadmore'] = json_encode($load_more);
    }
    $widget->add_render_attribute( 'wrapper', $wrap_attrs );
    ?>
    <div <?php pxl_print_html($widget->get_render_attribute_string('wrapper')) ?>>
        <div class="grid-inner">
            <?php agron_get_post_template($posts, $load_more); ?>
        </div>
        <?php if ($pagination == 'pagination') : ?>
            <?php agron()->page->get_pagination($query, true); ?>
        <?php endif; 
        if (!empty($next_link) && $pagination === 'loadmore') : ?>
            <div class="grid-load-more ">
                <button type="button" class="button pxl-load-more-button <?php echo esc_attr($load_more_style); ?>">
                    <div class="pxl-button-text"></div>
                </button>
            </div>
        <?php endif; ?>
    </div>
