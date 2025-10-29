<?php
    $image = $widget->get_setting('image', []);
    $coming_soon = (bool)$widget->get_setting('coming_soon', '');
    $thumbnail = agron_get_image_by_size([
        'img_id' => $image['id'],
        'img_dimension' => 'full',
        'attr' => [
            'class' => 'pxl-image',
        ]
    ]);
    $title = $widget->get_setting('title', '');
    $buttons = $widget->get_setting('buttons', []);
    $coming_soon = (bool)$widget->get_setting('coming_soon', '');
    $coming_soon_class = $coming_soon ? 'comming-soon' : '';
    $layout_style = 'show-case-'.$widget->get_setting('layout_style', 'default');
    $entrance_anim = $widget->get_setting('entrance_anim', '');
?>
<div class="pxl-show-case <?php echo esc_attr($coming_soon_class.' '.$layout_style.' '.$entrance_anim); ?>">
    <div class="pxl-show-case-inner">
        <div class="pxl-show-case-image">
            <div class="pxl-show-case-overlay"></div>
            <?php pxl_print_html($thumbnail); ?>
            <?php if(!empty($buttons) && !$coming_soon) : ?>
                <div class="pxl-show-case-buttons">
                    <?php foreach($buttons as $key => $button) : 
                        $button_text = $button['button_text'] ?? '';
                        $button_link = $button['button_link'] ?? [];   
                        $link_attrs = agron_get_link_attributes($button_link);
                        $elementor_repeater_class = 'elementor-repeater-item-' . $button['_id'];
                    ?>
                        <a class="pxl-button pxl-show-case-button <?php echo esc_attr($elementor_repeater_class); ?>" <?php pxl_print_html($link_attrs); ?>>
                            <span class="pxl-button-text">
                                <span class="pxl-button-icon icon-duplicated">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                        <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                    </svg>                                    
                                </span>
                                <?php echo esc_html($button_text); ?>
                                <span class="pxl-button-icon icon-main">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                        <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                    </svg>                                    
                                </span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php elseif($coming_soon): ?>
                <div class="pxl-show-case-comming-soon">
                    <div class="pxl-comming-soon-text">
                        <?php echo esc_html__('Coming Soon', 'agron'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="pxl-show-case-title">
        <div class="pxl-title-text">
            <?php echo esc_html($title); ?>
        </div>
    </div>
</div>