<?php 
$filter_by = $widget->get_setting('filter_by', 'recent');
$post_type = get_post_type();
$posts = null;

$order = $widget->get_setting('order', 'DESC');
$orderby = $widget->get_setting('orderby', 'date');
$limit = $widget->get_setting('limit', 6);

if($filter_by === 'custom') {
    $post_type = $widget->get_setting('post_type_custom', [$post_type]);
    $select_post_by = $widget->get_setting('select_post_by', '');
    $post_ids = ($select_post_by === 'post_selected') ? $widget->get_setting('source_'.$post_type.'_post_ids', '') : [];
    $source = ($select_post_by === 'term_selected') ? $widget->get_setting('source_'.$post_type , '') : [];
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
}else {
    $taxonomy = $post_type === 'post' ? 'category' : $post_type.'category';
    $term_ids = [];
    $current_id = get_the_ID();
    $query_args  = [
        'post_type'           => $post_type,
        'posts_per_page'      => $limit,
        'no_found_rows'       => true,
        'order'               => $order,
        'orderby'             => $orderby, 
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'post__not_in'        => [$current_id], 
    ];
    if($filter_by === 'related') {
        $categories = get_the_terms($current_id, $taxonomy);
        if(!empty($categories)) {
            foreach($categories as $category) {
                $term_ids[] = $category->term_id;
            }
        }
        if (!empty($term_ids)) {
            $query_args['tax_query'] = [
                'relation' => 'AND',                     
                array(
                    'taxonomy' => $taxonomy,             
                    'field' => 'id',                  
                    'terms' => $term_ids,  
                    'include_children' => false,           
                    'operator' => 'IN'                
                ),
            ];
        }
    }
    $posts = get_posts($query_args);
}



if (is_null($posts) || count($posts) <= 0) : ?>
    <div class="pxl-notification">
        <?php echo esc_html__('Post Not Found', 'agron'); ?>
    </div>
    <?php return; 
endif; 
$title_tag = $widget->get_setting('title_tag', 'h4');
$show_divider = !empty($settings['show_divider']) ? 'has-divider' : null;
?>
<div class="pxl-post-list">
    <?php foreach($posts as $key => $post) : 
        $post_id = $post->ID;   
    ?>
        <div class="pxl-post-item">
            <a class="pxl-post-link <?php echo esc_attr('pxl-post-'.$post_id); ?>" href="<?php echo esc_url(get_permalink($post_id)); ?>">
                <div class="pxl-post-title">
                    <?php echo esc_html(get_the_title($post_id)); ?>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                    <path d="M9.16984 3.12428L1.29412 11L0 9.70589L7.87573 1.83016H0.934133V0H11V10.0659H9.16984V3.12428Z" fill="currentcolor"/>
                </svg>
            </a>
        </div>
    <?php 
    endforeach; 
    // wp_reset_postdata();
    ?>
</div>
