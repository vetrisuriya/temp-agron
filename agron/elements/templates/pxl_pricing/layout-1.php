<?php
    $active_class = !empty($settings['active']) ? 'active' : '';
    $icon  = $widget->get_setting('_icon', []);
    $title = $widget->get_setting('title', '');
    $title_tag = $widget->get_setting('title_tag', '');
    $price = $widget->get_setting('price', '');
    $unit  = $widget->get_setting('unit', '');
    $description  = $widget->get_setting('description', '');
    $feature_icon = $widget->get_setting('feature_icon', '');
    $show_divider = (bool)$widget->get_setting('show_divider', '');
    $link_attrs = agron_get_link_attributes($settings['link_url']);
    $features  = $widget->get_setting('features', []);
    $btn_style = $widget->get_setting('btn_style', 'default');
    $btn_text = $widget->get_setting('btn_text', '');
    $btn_icon = $widget->get_setting('btn_icon', []);
?>

<div class="pxl-pricing <?php echo esc_attr($active_class); ?>">
    <div class="pxl-pricing-header">
        <div class="pxl-pricing-heading">
            <div class="pxl-heading-icon">
                <?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
            </div>
            <div class="pxl-heading-title">
                <?php echo esc_html($title); ?>
            </div>
        </div>
        <div class="pxl-pricing-price">
            <<?php echo esc_attr($title_tag); ?> class="pxl-price-text">
                <?php echo esc_html($price) ?>
            </<?php echo esc_attr($title_tag); ?>>
            <div class="pxl-price-separator"><?php echo esc_html__('/', 'agron'); ?></div>
            <div class="pxl-price-unit"><?php echo esc_html($unit); ?></div>
        </div>
        <p class="pxl-pricing-description">
            <?php echo esc_html($description); ?>
        </p>
        <?php if($show_divider) : ?>
            <span class="pxl-pricing-divider"></span>
        <?php endif; ?>
        <?php if(!empty($features)) : ?>
            <ul class="pxl-pricing-features">
                <?php foreach($features as $feature) : ?>
                    <li class="pxl-feature-item">
                        <?php \Elementor\Icons_Manager::render_icon( $feature_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>

                        <?php echo esc_html($feature['feature_text']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <span class="pxl-pricing-button pxl-button <?php echo esc_attr($btn_style); ?>">
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
                    <?php if(!empty($btn_icon)) : ?>
                        <span class="pxl-button-icon">
                            <?php \Elementor\Icons_Manager::render_icon( $btn_icon, [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </span>
        <?php if(!is_null($link_attrs)) : ?>
            <a <?php pxl_print_html($link_attrs); ?> class="pxl-box-link"></a>
        <?php endif; ?>
    </div>
</div>