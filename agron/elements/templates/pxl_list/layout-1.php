<?php 
$items = $widget->get_setting('items', []);
if(!empty($items)) : 
    $icon  = $widget->get_setting('_icon', []);
    $entrance_anim = $widget->get_setting('entrance_anim', '');
    $anim_delay = $widget->get_setting('anim_delay', 0);
?>
    <ul class="pxl-list-wrapper">
        <?php foreach($items as $key => $item) : ?>
            <li class="pxl-list-item" <?php echo esc_attr($entrance_anim); ?> <?php if(!empty($entrance_anim)) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms'); ?>" <?php endif; ?>>
                <span class="pxl-item-icon">
                    <?php if(!empty($icon['value'])) : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                    <?php endif; ?>
                </span>
                <span class="pxl-item-text">
                    <?php echo esc_html($item['text']) ?>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; 