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

$img_dimension = $widget->get_setting('img_dimension', 'custom');
if($img_dimension === 'custom') {
    $custom_img_dimension = $widget->get_setting('custom_img_dimension', []);
    $img_dimension = (!empty($custom_img_dimension['width']) && !empty($custom_img_dimension['height'])) ? $custom_img_dimension : ['width' => 500, 'height' => 480];
}
$title_tag = $widget->get_setting('title_tag', 'h6');
$title_hover_style    = $widget->get_setting('title_hover_style', '');

?>
<div class="pxl-post-list post-list-layout2">
    <?php foreach($posts as $key => $post) : 
        $featured_image = agron_get_image_by_size([
            'img_dimension' => $img_dimension,
            'attr' => [
                'class' => 'pxl-image',
            ]
        ], $post->ID);
    ?>
        <div class="pxl-post-item">
            <div class="pxl-post-featured">
                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                    <?php pxl_print_html($featured_image); ?>
                </a>
            </div>
            <div class="pxl-post-content">
                <div class="pxl-post-date">
                    <?php echo get_the_date('d F, Y', $post->ID); ?>
                </div>
                    <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                            <?php echo esc_html(get_the_title($post->ID)); ?>
                        </a>
                    </<?php echo esc_attr($title_tag); ?>>
            </div>
        </div>
    <?php 
    endforeach; 
    ?>
</div>
