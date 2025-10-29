<?php 
    $content = $widget->get_setting('content', '');
    $image   = $widget->get_setting('image', []);
    $name    = $widget->get_setting('name', '');
    $title   = $widget->get_setting('title', '');
    $rating  = $widget->get_setting('rating', );
    $link    = $widget->get_setting('link', '');
    $link_attrs = agron_get_link_attributes($link);
    $get_image = agron_get_image_by_size([
        'img_id' => $image['id'],
        'img_dimension' => 'full',
        'attr' => [
            'class' => 'pxl-user-image',
        ]
    ]);
?>
<div class="pxl-testimonial">
    <span class="pxl-testimonial-icon">
        <?php \Elementor\Icons_Manager::render_icon( $settings['_icon'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon' ], 'i' ); ?>
    </span>
    <div class="pxl-testimonial-rating">
        <?php for($i=0; $i<$rating; $i++) : ?>
            <svg class="star-icon" width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.14894 0.92705C9.4483 0.00573921 10.7517 0.00573969 11.0511 0.92705L12.5921 5.66991C12.726 6.08193 13.1099 6.36089 13.5432 6.36089L18.5301 6.3609C19.4988 6.3609 19.9016 7.60051 19.1179 8.16991L15.0834 11.1012C14.7329 11.3558 14.5862 11.8072 14.7201 12.2192L16.2611 16.9621C16.5605 17.8834 15.506 18.6495 14.7223 18.0801L10.6878 15.1488C10.3373 14.8942 9.8627 14.8942 9.51221 15.1488L5.4777 18.0801C4.69398 18.6495 3.6395 17.8834 3.93885 16.9621L5.4799 12.2192C5.61378 11.8072 5.46712 11.3558 5.11663 11.1012L1.08211 8.16991C0.2984 7.60051 0.701176 6.3609 1.6699 6.3609L6.65684 6.36089C7.09007 6.36089 7.47402 6.08193 7.60789 5.66991L9.14894 0.92705Z" fill="currentcolor"/>
            </svg>
        <?php endfor; ?>
    </div>
    <p class="pxl-testimonial-content">
        <?php echo esc_html($content); ?>
    </p>
    <div class="pxl-testimonial-user">
        <?php pxl_print_html($get_image); ?>
        <div class="pxl-user-content">
            <div class="pxl-user-title">
                <?php echo esc_html($title); ?>
            </div>
            <div class="pxl-user-name">
                <?php echo esc_html($name); ?>
            </div>
        </div>
    </div>
</div>