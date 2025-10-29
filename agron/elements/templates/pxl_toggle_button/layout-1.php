<?php
    $btn_icon = $widget->get_setting('btn_icon', []);
    $template_id = $widget->get_setting('template', 0);
    $template_html_id = '#';
    if($template_id > 0) {
        if(!has_action( 'pxl_anchor_target_template_'.$template_id)){
            add_action( 'pxl_anchor_target_template_'.$template_id, 'agron_hook_anchor_dynamic_panel' );
        }
        $template_html_id .= 'template-'.$template_id;
    }
    // var_dump(!empty($btn_icon['value']));
    $btn_class = empty($btn_icon['value']) ? ' icon-default' : '';
?>
<a class="pxl-button pxl-toggle-button<?php echo esc_attr($btn_class); ?>" href="<?php echo esc_attr($template_html_id); ?>">
    <?php if(!empty($btn_icon['value'])) : 
        \Elementor\Icons_Manager::render_icon( $btn_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
    <?php else: ?>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
    <?php endif; ?>
</a>
