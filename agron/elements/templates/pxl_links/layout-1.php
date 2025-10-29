<?php 
    $links = $widget->get_setting('links', []);
    $use_common_icon = (bool)$widget->get_setting('use_common_icon', '');
    $link_icon = $widget->get_setting('common_icon', []);
    $link_hover_style = $widget->get_setting('link_hover_style', '');
?>

<?php if(!empty($links)) : ?>
    <ul class="pxl-links-wrapper">
        <?php foreach($links as $key => $link) : 
            $link_attrs = agron_get_link_attributes($link['link_url']);
            $link_icon = $use_common_icon ? $link_icon : $link['link_icon'];
            $elementor_item_class = 'elementor-repeater-item-'.$link['_id'];
        ?>
            <li class="pxl-link-item <?php echo esc_attr($elementor_item_class); ?>">
                <a class="pxl-link <?php echo esc_attr($link_hover_style); ?>" <?php pxl_print_html($link_attrs); ?>>
                    <?php \Elementor\Icons_Manager::render_icon( $link_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-link-icon' ], 'i' ); ?>
                    <span class="pxl-link-text" >
                        <?php echo esc_html($link['link_text']); ?>
                    </span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>