<?php
    $info_type = $widget->get_setting('info_type', 'custom');
    $info_custom = $widget->get_setting('info_custom', '');
    $post_type = get_post_type() === 'post' ? null : get_post_type().'-';
    $post_id   = get_the_ID();
    $label_type = $widget->get_setting('label_type', '');
?>
<div class="pxl-post-info">
    <div class="pxl-info-label">
        <?php if($label_type === 'text') : 
            $label_text = $widget->get_setting('label_text', ''); ?>
            <span class="pxl-label-text"><?php echo esc_html($label_text); ?></span>
        <?php else: ?>
                <?php \Elementor\Icons_Manager::render_icon( $settings['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
        <?php endif; ?>
    </div>
    <div class="pxl-info-content">
        <?php 
            switch($info_type) {
                case 'category' : 
                    the_terms($post_id, $post_type.'category', '', ', ');
                    break;
                case 'tags' : 
                    pxl_print_html(get_the_tag_list(', '));
                    break;
                case 'author' : 
                    $author_id = get_post_field('post_author', $post_id);
                    pxl_print_html('<a href="'.esc_url(get_author_posts_url($author_id)).'" class="pxl-author-link">'.esc_attr('BY '.get_the_author_meta('display_name', $author_id)).'</a>');
                    break;
                case 'date' : 
                    $date_format = $widget->get_setting('date_format', 'd F, Y');
                    echo get_the_date($date_format, $post_id);
                    break;
                default : 
                    $info_link = $widget->get_setting('info_link', '');
                    $link_attrs = agron_get_link_attributes($info_link);
                    $tag = !is_null($link_attrs) ? 'a' : 'span';
                    echo '<'.$tag.' class="pxl-info-custom "'.$link_attrs.'>';
                    echo esc_html($info_custom);
                    echo '</'.$tag.'>';
                    break;
            }
        ?>
    </div>
</div>