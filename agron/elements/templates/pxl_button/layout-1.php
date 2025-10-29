<?php
    $btn_text = $widget->get_setting('btn_text', '');
    $btn_icon = $widget->get_setting('btn_icon', []);
    $btn_style = $widget->get_setting('btn_style', 'pxl-button-default');
    $btn_type =  $widget->get_setting('btn_type', '');
    $link_attrs = agron_get_link_attributes($settings['btn_link']);
    $entrance_anim = $widget->get_setting('entrance_anim', '');
    $attrs = [
        'class' => 'pxl-button '.$btn_style.' '.$btn_type.' '.$entrance_anim,
    ];
    if($btn_type === 'pxl-atc-submit') {
        $attrs['data-wpcf7-id'] = $widget->get_setting('submit_to_contact_form_id', '');
    }
    $widget->add_render_attribute( 'attrs', $attrs);

    $offset_top = $widget->get_setting('scroll_offset_top', 0);

?>
<a <?php pxl_print_html($link_attrs); pxl_print_html($widget->get_render_attribute_string('attrs')); ?> <?php if($btn_type === 'pxl-atc-anchor') : ?> data-target-offset="<?php echo esc_attr($offset_top); ?>" <?php endif; ?>>
    <?php if($btn_style === 'pxl-button-default') :  ?>
        <?php if(!empty($btn_text)) : ?>
            <span class="pxl-button-text">
                <?php if(!empty($btn_icon)) : ?>
                    <span class="pxl-button-icon icon-duplicated">
                        <?php \Elementor\Icons_Manager::render_icon( $btn_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                    </span>
                <?php endif; ?>
                <?php echo esc_html($btn_text); ?>
                <?php if(!empty($btn_icon)) : ?>
                    <span class="pxl-button-icon icon-main">
                        <?php \Elementor\Icons_Manager::render_icon( $btn_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                    </span>
                <?php endif; ?>
            </span>
        <?php endif; ?>
    <?php else: ?>
        <?php if(!empty($btn_text)) : ?>
            <span class="pxl-button-text">
                <?php echo esc_html($btn_text); ?>
            </span>
        <?php endif; ?>
        <?php if(!empty($btn_icon)) : ?>
            <span class="pxl-button-icon">
                <?php \Elementor\Icons_Manager::render_icon( $btn_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
            </span>
        <?php endif; ?>
    <?php endif; ?>
</a>
