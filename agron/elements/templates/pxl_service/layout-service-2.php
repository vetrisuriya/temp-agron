<?php
$post_type = $widget->get_setting('post_type', ['service']);
$tax = ['service-category'];
$layout = $widget->get_setting('layout_'.$post_type, 'service-1');
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

$title_tag = $widget->get_setting('title_tag', 'div');
$img_dimension = $widget->get_setting('img_dimension', 'custom');
if($img_dimension === 'custom') {
    $custom_img_dimension = $widget->get_setting('custom_img_dimension', []);
    $img_dimension = (!empty($custom_img_dimension['width']) && !empty($custom_img_dimension['height'])) ? $custom_img_dimension : ['width' => 767, 'height' => 517];
}
$entrance_anim = $widget->get_setting('entrance_anim', '');
$title_hover_style    = $widget->get_setting('title_hover_style', '');
$featured_hover_style = $widget->get_setting('featured_hover_style', 'hover-image-default');

$show_icon = (bool)$widget->get_setting('show_icon', '');
$show_excerpt = (bool)$widget->get_setting('show_excerpt', '');
$num_of_words = $widget->get_setting('num_of_words', 31 );
$show_button = (bool)$widget->get_setting('show_button', '');
$button_text = $widget->get_setting('button_text', 'View Details');

$layout_type = $widget->get_setting('layout_type', 'grid');
    $load_more = array(
        'layout_type'     => $layout_type,
        'tax'             => $tax,
        'post_type'       => $post_type,   
        'layout'          => $layout,
        'title_tag'       => $title_tag,
        'show_icon'      => $show_icon,
        'show_excerpt'    => $show_excerpt,
        'num_of_words'    => $num_of_words,
        'show_button'     => $show_button,
        'button_text'     => $button_text,
        'img_dimension'   => $img_dimension,
        'title_hover_style' => $title_hover_style,
        'featured_hover_style' => $featured_hover_style,
    );
    wp_enqueue_script('agron-tabs');
?>
<div class="grid pxl-service pxl-service-grid pxl-service-layout2 tab-custom">
    <div class="tab-buttons button-group <?php echo esc_attr($entrance_anim); ?>">
        <?php if(is_array($posts)) : ?>
            <?php foreach($posts as $key => $post) : 
                $active_class = ($key === 0) ? 'active' : null;
            ?>
                <button class="tab-button <?php echo esc_attr($active_class); ?>">
                    <?php echo esc_html(get_the_title($post->ID)); ?>
                </button>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="grid-inner tab-contents <?php echo esc_attr($entrance_anim); ?>">
        <?php agron_get_post_template($posts, $load_more); ?>
    </div>
</div>
