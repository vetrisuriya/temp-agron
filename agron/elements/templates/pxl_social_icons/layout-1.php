<?php 
    $items = $widget->get_setting('items', []);
    $hover_animation = $widget->get_setting('hover_animation', '');
    $hover_animation_class = (!empty($hover_animation)) ? 'elementor-animation-'.$hover_animation : null;
    if(!empty($items)) :
?>
        <div class="pxl-social-icons">
            <?php foreach($items as $item) : 
                $social_link_attrs = agron_get_link_attributes($item['social_link']); 
                $elementor_item_class = 'elementor-repeater-item-'.$item['_id'];
            ?>
                <a <?php pxl_print_html($social_link_attrs); ?> class="pxl-social-item <?php echo esc_attr(trim($elementor_item_class.' '.$hover_animation_class)); ?>">
                    <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                </a>
            <?php endforeach; ?>
        </div>
<?php 
    endif;
    