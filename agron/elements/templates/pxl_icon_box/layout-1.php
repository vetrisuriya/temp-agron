<?php 
$link_attrs = agron_get_link_attributes($settings['link_url']);
$title_tag = $widget->get_setting('title_tag', 'h6');
$title = $widget->get_setting('title', '');
$description = $widget->get_setting('description', '');
$icon_box_style = $widget->get_setting('icon_box_style', 'icon-box-default');
$entrance_anim = $widget->get_setting('entrance_anim', '');

$hover_title_style = $widget->get_setting('title_hover_style', '');
$hover_icon_animation = $widget->get_setting('icon_hover_animation', '');
?>
<div class="pxl-icon-box-wrapper <?php echo esc_attr($icon_box_style.' '.$entrance_anim); ?>">
    <div class="pxl-icon-box-icon <?php echo esc_attr($hover_icon_animation); ?>">
        <?php \Elementor\Icons_Manager::render_icon( $settings['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
    </div>
    <div class="pxl-icon-box-content">
        <<?php echo esc_attr($title_tag); ?> class="pxl-icon-box-title <?php echo esc_attr($hover_title_style); ?>">
            <?php if(!is_null($link_attrs)) : ?>
                <a <?php pxl_print_html($link_attrs); ?> class="pxl-title-link">
            <?php endif; ?>
                <span class="pxl-title-text">
                    <?php echo esc_html($title); ?>
                </span>
            <?php if(!is_null($link_attrs)) : ?>
                </a>
            <?php endif; ?>
        </<?php echo esc_attr($title_tag); ?>>
        <p class="pxl-icon-box-description">
            <?php echo esc_html($description); ?>
        </p>
    </div>
</div>