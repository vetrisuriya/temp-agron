<?php
    $items = $widget->get_setting('items', []);
    $item_active = $widget->get_setting('active', 0);
    $title_tag = $widget->get_setting('title_tag', 'h4');
    $entrnce_anim = $widget->get_setting('entrance_anim', '');
?>
<?php if(!empty($items)) : ?>
    <div class="pxl-accordion">
        <?php foreach($items as $key => $item) : ?>
            <?php 
                $content = $widget->parse_text_editor( $item['content'] ?? '' );   
                $active_class = $item_active === ($key + 1) ? 'active' : ''; 
            ?>
            <div class="pxl-accordion-item <?php echo esc_attr($active_class.' '.$entrnce_anim); ?>">
                <div class="pxl-accordion-header">
                    <<?php echo esc_attr($title_tag); ?> class="pxl-accordion-title">
                        <span class="pxl-title-text">
                            <?php echo esc_html($item['title']); ?>
                        </span>
                    </<?php echo esc_attr($title_tag); ?>>
                    <svg class="pxl-accordion-icon" xmlns="http://www.w3.org/2000/svg" width="9" height="5" viewBox="0 0 9 5" fill="none">
                        <path d="M4.09079 1.81822L0.908955 5L-0.000121196 4.09092L4.09079 3.57634e-07L8.18164 4.09092L7.27256 5L4.09079 1.81822Z" fill="currentColor"/>
                    </svg>
                </div>
                <div class="pxl-accordion-content ">
                    <?php pxl_print_html($content); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="pxl-notification"><?php echo esc_html__('Accordion Item\'s Not Found', 'agron'); ?></div>
<?php endif; ?>