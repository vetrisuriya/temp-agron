<?php 
 
if(!function_exists('agron_get_post_template')){
    function agron_get_post_template($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                agron_get_post_layout1($posts, $settings);
                break;
            case 'post-2':
                agron_get_post_layout2($posts, $settings);
                break;
            case 'post-3':
                agron_get_post_layout3($posts, $settings);
                break;
            case 'post-4':
                agron_get_post_layout4($posts, $settings);
                break;
            case 'post-5':
                agron_get_post_layout5($posts, $settings);
                break;
            case 'post-6':
                agron_get_post_layout6($posts, $settings);
                break;
            case 'post-7':
                agron_get_post_layout7($posts, $settings);
                break;
            case 'service-1':
                agron_get_service_layout1($posts, $settings);
                break;
            case 'service-2':
                agron_get_service_layout2($posts, $settings);
                break;
            case 'service-3':
                agron_get_service_layout3($posts, $settings);
                break;
            case 'service-4':
                agron_get_service_layout4($posts, $settings);
                break;
            case 'service-5':
                agron_get_service_layout5($posts, $settings);
                break;
            case 'service-6':
                agron_get_service_layout6($posts, $settings);
                break;
            case 'service-7':
                agron_get_service_layout7($posts, $settings);
                break;
            case 'service-8':
                agron_get_service_layout8($posts, $settings);
                break;
            case 'project-1':
                agron_get_project_layout1($posts, $settings);
                break;
            case 'project-2':
                agron_get_project_layout2($posts, $settings);
                break;
            case 'project-3':
                agron_get_project_layout3($posts, $settings);
                break;
            case 'team-1':
                agron_get_team_layout1($posts, $settings);
                break;
            case 'team-2':
                agron_get_team_layout2($posts, $settings);
                break;
            case 'product-1':
                agron_get_product_layout1($posts, $settings);
                break;
            case 'product-2':
                agron_get_product_layout2($posts, $settings);
                break;
            case 'product-3':
                agron_get_product_layout3($posts, $settings);
                break;
            case 'product-4':
                agron_get_product_layout4($posts, $settings);
                break;
            case 'product-5':
                agron_get_product_layout5($posts, $settings);
                break;
            default:
                return false;
                break;
        }
    }
}

// Post
function agron_get_post_layout1($posts = [], $settings = []){ 
    extract($settings);
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $author_id = get_post_field ('post_author', $post->ID);
            $comment_count = (get_comments_number() < 10 && get_comments_number() != 0) ? '0'.get_comments_number() : get_comments_number();
            $post_content = get_post_field('post_content', get_the_ID());
            $word_count = str_word_count(strip_tags($post_content));
            $reading_time = ceil($word_count / 200);
            $post_featured_type = get_post_meta($post->ID, 'post_featured_type', true);
        ?>
            <div class="grid-item <?php echo esc_attr($entrance_anim.' '.$filter_class); ?>">
                <div class="pxl-post-item">
                    <?php if($post_featured_type == 'video') : 
                        $video_link = get_post_meta($post->ID, 'post_video_link', true);
                    ?>
                        <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url($video_link); ?>" class="pxl-featured-link pxl-action-popup">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                            <a href="<?php echo esc_url($video_link); ?>" class="pxl-button-play-video pxl-action-popup">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 20 24">
                                    <path d="M19.4806 11.1317C20.1524 11.5156 20.1524 12.4843 19.4806 12.8682L1.49614 23.1451C0.829484 23.526 9.00035e-07 23.0446 9.33598e-07 22.2768L1.83203e-06 1.72318C1.86559e-06 0.955355 0.829485 0.473988 1.49614 0.854934L19.4806 11.1317Z" fill="currentcolor"/>
                                </svg>
                            </a>
                        </div>
                    <?php elseif($post_featured_type == 'carousel') : 
                        $gallery_images = get_post_meta($post->ID, 'post_gallery_images', true);
                        if(!empty($gallery_images)) :
                            $image_arr = explode(',', $gallery_images);
                    ?>
                        <div class="pxl-carousel pxl-post-featured">
                            <div class="carousel-inner">
                                <div class="carousel-item item-featured active">
                                    <?php echo wp_kses_post($featured_image); ?>
                                </div>
                                <?php foreach($image_arr as $image_id) : 
                                    $gallery_image = agron_get_image_by_size([
                                        'img_id' => $image_id,
                                        'img_dimension' => $img_dimension ,
                                        'attr' => [
                                            'class' => 'pxl-image',
                                        ],
                                    ]);
                                ?>
                                    <div class="carousel-item">
                                        <?php echo wp_kses_post($gallery_image); ?>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                            <div class="carousel-navigation">
                                <div class="navigation-button navigation-button-prev">
                                    <svg width="37" height="37" viewBox="0 0 37 37" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.24454 19.093L8.65344 27.502C8.9555 27.8547 9.48636 27.8958 9.83908 27.5937C10.1918 27.2916 10.2329 26.7607 9.93078 26.408C9.9026 26.3751 9.87196 26.3444 9.83908 26.3163L2.8681 19.3369L36.1591 19.3369C36.6235 19.3369 37 18.9604 37 18.4959C37 18.0315 36.6235 17.6551 36.1591 17.6551L2.8681 17.6551L9.83908 10.6841C10.1918 10.382 10.2329 9.85117 9.93078 9.49844C9.62864 9.14572 9.09786 9.1046 8.74514 9.40674C8.71226 9.43492 8.68155 9.46556 8.65344 9.49844L0.244468 17.9074C-0.0815171 18.2353 -0.0815171 18.765 0.24454 19.093Z" fill="currentcolor"/>
                                    </svg>
                                </div>
                                <div class="navigation-button navigation-button-next">
                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M36.7555 17.907L28.3466 9.49805C28.0445 9.14532 27.5136 9.10421 27.1609 9.40634C26.8082 9.70841 26.7671 10.2393 27.0692 10.592C27.0974 10.6249 27.128 10.6556 27.1609 10.6837L34.1319 17.6631H0.840868C0.376497 17.6631 0 18.0396 0 18.5041C0 18.9685 0.376497 19.3449 0.840868 19.3449H34.1319L27.1609 26.3159C26.8082 26.618 26.7671 27.1488 27.0692 27.5016C27.3714 27.8543 27.9021 27.8954 28.2549 27.5933C28.2877 27.5651 28.3185 27.5344 28.3466 27.5016L36.7555 19.0926C37.0815 18.7647 37.0815 18.235 36.7555 17.907Z" fill="currentcolor"/>
                                    </svg>
                                </div>
                            </div>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-box-link"></a>
                        </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-post-meta">
                        <?php if($show_author == 'true') : ?>
                            <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="pxl-post-author meta-info">
                                <svg class="meta-icon" width="14" height="17" viewBox="0 0 14 17" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 10.2381C11.5312 10.2381 14 12.7068 14 15.7381C14 16.3006 13.5312 16.7381 13 16.7381H1C0.4375 16.7381 0 16.3006 0 15.7381C0 12.7068 2.4375 10.2381 5.5 10.2381H8.5ZM1.5 15.2381H12.4688C12.2188 13.2693 10.5312 11.7381 8.5 11.7381H5.5C3.4375 11.7381 1.75 13.2693 1.5 15.2381ZM7 8.7381C4.78125 8.7381 3 6.95685 3 4.7381C3 2.5506 4.78125 0.738098 7 0.738098C9.1875 0.738098 11 2.5506 11 4.7381C11 6.95685 9.1875 8.7381 7 8.7381ZM7 2.2381C5.59375 2.2381 4.5 3.3631 4.5 4.7381C4.5 6.14435 5.59375 7.2381 7 7.2381C8.375 7.2381 9.5 6.14435 9.5 4.7381C9.5 3.3631 8.375 2.2381 7 2.2381Z" fill="currentcolor"/>
                                </svg>
                                <span class="pxl-author-name meta-text">
                                    <?php echo esc_attr(get_the_author_meta('display_name', $author_id)); ?>
                                </span>
                            </a>
                        <?php endif; ?>
                        <?php if($show_comment == 'true') : ?>
                            <span class="pxl-post-comment meta-info">
                                <svg class="meta-icon" width="19" height="16" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1289 2.74068C9.24249 2.39409 8.28938 2.2208 7.26962 2.2208C6.24986 2.2208 5.29675 2.39409 4.41029 2.74068C3.52383 3.08726 2.81733 3.55715 2.29079 4.15035C1.77091 4.74354 1.51097 5.38006 1.51097 6.0599C1.51097 6.60644 1.6876 7.13298 2.04085 7.63953C2.3941 8.14608 2.89065 8.58597 3.5305 8.95922L4.50027 9.51909L4.15035 10.3589C4.37696 10.2256 4.58358 10.0956 4.77021 9.96898L5.2101 9.65906L5.73998 9.75903C6.25986 9.85234 6.76974 9.899 7.26962 9.899C8.28938 9.899 9.24249 9.72571 10.1289 9.37912C11.0154 9.03254 11.7186 8.56265 12.2385 7.96945C12.765 7.37626 13.0283 6.73974 13.0283 6.0599C13.0283 5.38006 12.765 4.74354 12.2385 4.15035C11.7186 3.55715 11.0154 3.08726 10.1289 2.74068ZM3.73045 1.63094C4.81686 1.17105 5.99658 0.941102 7.26962 0.941102C8.54265 0.941102 9.71904 1.17105 10.7988 1.63094C11.8852 2.08417 12.7417 2.70402 13.3682 3.4905C13.9947 4.27699 14.308 5.13345 14.308 6.0599C14.308 6.98635 13.9947 7.84282 13.3682 8.6293C12.7417 9.41578 11.8852 10.039 10.7988 10.4989C9.71904 10.9521 8.54265 11.1787 7.26962 11.1787C6.69642 11.1787 6.10989 11.1254 5.51003 11.0187C4.68356 11.6053 3.75711 12.0318 2.73068 12.2984C2.49074 12.3584 2.20414 12.4117 1.87089 12.4584H1.84089C1.76758 12.4584 1.69759 12.4317 1.63094 12.3784C1.57096 12.3251 1.5343 12.2551 1.52097 12.1685C1.5143 12.1485 1.51097 12.1285 1.51097 12.1085C1.51097 12.0818 1.51097 12.0585 1.51097 12.0385C1.51764 12.0185 1.5243 11.9985 1.53097 11.9785C1.5443 11.9585 1.55429 11.9419 1.56096 11.9285C1.56762 11.9152 1.57762 11.8985 1.59095 11.8785C1.61095 11.8519 1.62428 11.8352 1.63094 11.8285C1.64427 11.8152 1.66093 11.7986 1.68093 11.7786C1.70093 11.7519 1.71426 11.7352 1.72092 11.7286C1.75425 11.6886 1.83089 11.6053 1.95087 11.4786C2.07084 11.352 2.15748 11.2553 2.21081 11.1887C2.26413 11.1154 2.33744 11.0187 2.43075 10.8988C2.53073 10.7721 2.61404 10.6422 2.6807 10.5089C2.75401 10.3756 2.824 10.2289 2.89065 10.069C2.06417 9.58907 1.41433 8.99921 0.941104 8.29937C0.467881 7.59954 0.23127 6.85305 0.23127 6.0599C0.23127 5.13345 0.54453 4.27699 1.17105 3.4905C1.79757 2.70402 2.6507 2.08417 3.73045 1.63094ZM15.4877 12.6284C15.5543 12.7883 15.621 12.935 15.6876 13.0683C15.761 13.2016 15.8443 13.3315 15.9376 13.4582C16.0376 13.5781 16.1142 13.6714 16.1675 13.7381C16.2209 13.8114 16.3075 13.9114 16.4275 14.038C16.5474 14.1647 16.6241 14.248 16.6574 14.288C16.6641 14.2946 16.6774 14.308 16.6974 14.328C16.7174 14.3546 16.7307 14.3713 16.7374 14.3779C16.7507 14.3913 16.7641 14.4079 16.7774 14.4279C16.7974 14.4546 16.8107 14.4746 16.8174 14.4879C16.824 14.5013 16.8307 14.5179 16.8374 14.5379C16.8507 14.5579 16.8574 14.5779 16.8574 14.5979C16.864 14.6179 16.8674 14.6379 16.8674 14.6579C16.8674 14.6845 16.864 14.7079 16.8574 14.7279C16.8374 14.8212 16.794 14.8945 16.7274 14.9478C16.6607 15.0011 16.5874 15.0245 16.5075 15.0178C16.1742 14.9711 15.8876 14.9178 15.6477 14.8578C14.6212 14.5912 13.6948 14.1647 12.8683 13.5781C12.2684 13.6848 11.6819 13.7381 11.1087 13.7381C9.30247 13.7381 7.72951 13.2982 6.38983 12.4184C6.7764 12.4451 7.06967 12.4584 7.26962 12.4584C8.3427 12.4584 9.37246 12.3084 10.3589 12.0085C11.3453 11.7086 12.2251 11.2787 12.9983 10.7188C13.8314 10.1056 14.4713 9.39912 14.9178 8.5993C15.3644 7.79949 15.5877 6.95302 15.5877 6.0599C15.5877 5.54669 15.511 5.04014 15.3577 4.54026C16.2175 5.01348 16.8974 5.60667 17.3972 6.31984C17.8971 7.03301 18.1471 7.79949 18.1471 8.6193C18.1471 9.41911 17.9105 10.1689 17.4372 10.8688C16.964 11.5619 16.3142 12.1485 15.4877 12.6284Z" fill="currentcolor"/>
                                </svg>
                                <div class="pxl-comment-count meta-text">
                                    <?php echo esc_html('Coments ('.$comment_count.')'); ?>
                                </div>
                            </span>
                        <?php endif; ?>
                        <?php if($show_reading_time == 'true') : ?>
                            <span class="pxl-post-reading-time meta-info">
                                <svg class="meta-icon" width="14" height="15" viewBox="0 0 14 15" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.19727 0.96875C10.9434 0.96875 13.9785 4.00391 13.9785 7.75C13.9785 11.4961 10.9434 14.5312 7.19727 14.5312C3.45117 14.5312 0.416016 11.4961 0.416016 7.75C0.416016 4.00391 3.45117 0.96875 7.19727 0.96875ZM7.19727 13.2188C10.2051 13.2188 12.666 10.7852 12.666 7.75C12.666 4.74219 10.2051 2.28125 7.19727 2.28125C4.16211 2.28125 1.72852 4.74219 1.72852 7.75C1.72852 10.7852 4.16211 13.2188 7.19727 13.2188ZM8.86523 10.375L6.54102 8.67969C6.45898 8.625 6.43164 8.51562 6.43164 8.43359V3.92188C6.43164 3.75781 6.56836 3.59375 6.75977 3.59375H7.63477C7.79883 3.59375 7.96289 3.75781 7.96289 3.92188V7.80469L9.76758 9.14453C9.93164 9.25391 9.95898 9.44531 9.84961 9.60938L9.33008 10.293C9.2207 10.457 9.0293 10.4844 8.86523 10.375Z" fill="currentcolor"/>
                                </svg>
                                <div class="pxl-estimated-reading-time meta-text">
                                    <?php echo esc_html($reading_time . ' Min read'); ?>
                                </div>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="pxl-post-content">
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                        <?php if($show_excerpt == 'true') : ?>
                            <p class="pxl-post-excerpt">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                            </p>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button pxl-button-default">
                                <span class="pxl-button-text">
                                    <span class="pxl-button-icon icon-duplicated">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                    <?php echo esc_html($button_text); ?>
                                    <span class="pxl-button-icon icon-main">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_post_layout2($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                    <div class="pxl-post-content ">
                        <?php if($show_date == 'true') : ?>
                            <div class="pxl-post-date">
                                <span class="pxl-day">
                                    <?php echo get_the_date('d', $post->ID); ?>
                                </span>
                                <span class="pxl-month">
                                    <?php echo get_the_date('M', $post->ID); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        <?php if($show_category == 'true') : ?>
                            <div class="pxl-post-category">
                                <?php the_terms( $post->ID, 'category', '', $category_separator ); ?>
                            </div>
                        <?php endif; ?>
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                        <?php if($show_excerpt == 'true') : ?>
                            <p class="pxl-post-excerpt">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                            </p>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button pxl-button-default <?php echo esc_attr($button_hover_style); ?>">
                                <span class="pxl-button-text">
                                    <span class="pxl-button-icon icon-duplicated">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                    <?php echo esc_html($button_text); ?>
                                    <span class="pxl-button-icon icon-main">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_post_layout3($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $author_id = get_post_field ('post_author', $post->ID);
            $comment_count = (get_comments_number() < 10 && get_comments_number() != 0) ? '0'.get_comments_number() : get_comments_number();
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                    <div class="pxl-post-meta">
                        <?php if($show_author == 'true') : ?>
                            <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="pxl-post-author meta-info">
                                <svg class="meta-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <path d="M16.6668 18.333H15.0002V16.6663C15.0002 15.2856 13.8809 14.1663 12.5002 14.1663H7.50016C6.11945 14.1663 5.00016 15.2856 5.00016 16.6663V18.333H3.3335V16.6663C3.3335 14.3652 5.19898 12.4997 7.50016 12.4997H12.5002C14.8013 12.4997 16.6668 14.3652 16.6668 16.6663V18.333ZM10.0002 10.833C7.23874 10.833 5.00016 8.59442 5.00016 5.83301C5.00016 3.07158 7.23874 0.833008 10.0002 0.833008C12.7616 0.833008 15.0002 3.07158 15.0002 5.83301C15.0002 8.59442 12.7616 10.833 10.0002 10.833ZM10.0002 9.16634C11.8411 9.16634 13.3335 7.67396 13.3335 5.83301C13.3335 3.99206 11.8411 2.49967 10.0002 2.49967C8.15921 2.49967 6.66683 3.99206 6.66683 5.83301C6.66683 7.67396 8.15921 9.16634 10.0002 9.16634Z" fill="currentcolor"/>
                                </svg>
                                <span class="pxl-author-name meta-text">
                                    <?php echo esc_attr(get_the_author_meta('display_name', $author_id)); ?>
                                </span>
                            </a>
                        <?php endif; ?>
                        <?php if($show_comment == 'true') : ?>
                            <span class="pxl-post-comment meta-info">
                                <svg class="meta-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <path d="M5.37863 15.8333L1.6665 18.75V3.33333C1.6665 2.8731 2.0396 2.5 2.49984 2.5H17.4998C17.9601 2.5 18.3332 2.8731 18.3332 3.33333V15C18.3332 15.4602 17.9601 15.8333 17.4998 15.8333H5.37863ZM4.80219 14.1667H16.6665V4.16667H3.33317V15.3209L4.80219 14.1667ZM6.6665 8.33333H13.3332V10H6.6665V8.33333Z" fill="currentcolor"/>
                                </svg>
                                <div class="pxl-comment-count meta-text">
                                    <?php echo esc_html($comment_count.' Coments'); ?>
                                </div>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="pxl-post-content">
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                        <?php if($show_button == 'true') : ?>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button pxl-button-default <?php echo esc_attr($button_hover_style); ?>">
                                <span class="pxl-button-text">
                                    <span class="pxl-button-icon icon-duplicated">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                    <?php echo esc_html($button_text); ?>
                                    <span class="pxl-button-icon icon-main">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_post_layout4($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $author_id = get_post_field ('post_author', $post->ID);
            $comment_count = (get_comments_number() < 10 && get_comments_number() != 0) ? '0'.get_comments_number() : get_comments_number();
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                    <div class="pxl-post-content">
                        <?php if($show_date == 'true') : ?>
                            <div class="pxl-post-date">
                                <span class="pxl-day"><?php echo get_the_date('d', $post->ID); ?></span>
                                <span class="pxl-month-year"><?php echo get_the_date('M, Y', $post->ID); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-post-meta">
                            <?php if($show_category == 'true') : ?>
                                <div class="pxl-post-category">
                                    <?php the_terms($post->ID, 'category', '', $category_separator); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($show_comment == 'true') : ?>
                                <svg class="pxl-meta-separator" xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7">
                                    <circle cx="3" cy="3.5" r="3" fill="currentcolor"/>
                                </svg>
                                <span class="pxl-post-comment meta-info">
                                    <div class="pxl-comment-count meta-text">
                                        <?php echo esc_html($comment_count.' Coments'); ?>
                                    </div>
                                </span>
                            <?php endif; ?>
                        </div>
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                        <?php if($show_button == 'true') : ?>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button pxl-button-default <?php echo esc_attr($button_hover_style); ?>">
                                <span class="pxl-button-text">
                                    <span class="pxl-button-icon icon-duplicated">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                    <?php echo esc_html($button_text); ?>
                                    <span class="pxl-button-icon icon-main">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_post_layout5($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $show_meta = $show_category == 'true' || $show_date == 'true';
        ?>
            <?php if($key === 0 && $layout_type == 'grid') : 
                $featured_image = agron_get_image_by_size([
                    'img_dimension' => 'full',
                    'attr' => [
                        'class' => 'pxl-image no-lazyload',
                    ],
                ], $post->ID);
            ?>
                <div class="pxl-item-feature wow fadeIn">
                    <div class="pxl-item-inner">
                        <div class="pxl-item-featured">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                        </div>
                        <div class="pxl-item-content">
                            <?php if($show_date == 'true') : ?>
                                <div class="pxl-item-date">
                                    <div class="pxl-day"><?php echo get_the_date('d', $post->ID); ?></div>
                                    <div class="pxl-month"><?php echo get_the_date('F', $post->ID); ?></div>
                                </div>
                            <?php endif; ?>
                            <h3 class="pxl-item-title <?php echo esc_attr($feature_title_hover_style); ?>">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                </a>
                            </h3>
                            <?php if($show_button == 'true') : ?>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-item-button pxl-button-default <?php echo esc_attr($feature_btn_hover_style); ?>">
                                    <span class="pxl-button-text">
                                        <span class="pxl-button-icon icon-duplicated">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                            </svg>                                    
                                        </span>
                                        <?php echo esc_html($button_text); ?>
                                        <span class="pxl-button-icon icon-main">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                            </svg>                                    
                                        </span>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php elseif($layout_type == 'carousel' && $key != 0) : ?>
                <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>" 
                <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                    <div class="pxl-post-item">
                        <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                        </div>
                        <div class="pxl-post-content">
                            <?php if($show_meta == 'true') : ?>
                                <div class="pxl-post-meta">
                                    <?php if($show_category == 'true') : ?>
                                        <div class="pxl-post-category">
                                            <?php the_terms($post->ID, 'category', '', $category_separator); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($show_date == 'true') : ?>
                                        <svg class="pxl-post-separator" xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7">
                                            <circle cx="3" cy="3.5" r="3" fill="currentColor" />
                                        </svg>
                                        <div class="pxl-post-date">
                                            <?php echo get_the_date('d F, Y', $post->ID); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                </a>
                            </<?php echo esc_attr($title_tag); ?>>
                            <?php if($show_excerpt == 'true') : ?>
                                <p class="pxl-post-excerpt">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                                </p>
                            <?php endif; ?>
                            <?php if($show_button == 'true') : ?>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button pxl-button-default <?php echo esc_attr($button_hover_style); ?>">
                                    <span class="pxl-button-text">
                                        <span class="pxl-button-icon icon-duplicated">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                            </svg>                                    
                                        </span>
                                        <?php echo esc_html($button_text); ?>
                                        <span class="pxl-button-icon icon-main">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                            </svg>                                    
                                        </span>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif;
        endforeach;
    endif;
}
function agron_get_post_layout6($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $author_id = get_post_field ('post_author', $post->ID);
            $comment_count = (get_comments_number() < 10 && get_comments_number() != 0) ? '0'.get_comments_number() : get_comments_number();

        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                    <div class="pxl-post-content">
                        <?php if($show_author == 'true') : ?>
                            <div class="author-box">
                                <div class="pxl-post-author">
                                    <div class="author-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M20.4853 15.5147C19.1783 14.2077 17.6226 13.2402 15.9253 12.6545C17.7432 11.4024 18.9375 9.30694 18.9375 6.9375C18.9375 3.11217 15.8253 0 12 0C8.17467 0 5.0625 3.11217 5.0625 6.9375C5.0625 9.30694 6.25683 11.4024 8.07478 12.6545C6.37744 13.2402 4.82175 14.2077 3.51473 15.5147C1.24823 17.7812 0 20.7947 0 24H1.875C1.875 18.417 6.41705 13.875 12 13.875C17.583 13.875 22.125 18.417 22.125 24H24C24 20.7947 22.7518 17.7812 20.4853 15.5147ZM12 12C9.20855 12 6.9375 9.729 6.9375 6.9375C6.9375 4.146 9.20855 1.875 12 1.875C14.7915 1.875 17.0625 4.146 17.0625 6.9375C17.0625 9.729 14.7915 12 12 12Z" fill="currentcolor"/>
                                        </svg>
                                    </div>
                                    <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
                                        <?php echo esc_html__('Posted by:', 'agron'); ?>
                                        <span class="author-name">
                                            <?php echo esc_attr(get_the_author_meta('display_name', $author_id)); ?>
                                        </span>
                                    </a>
                                </div>
                                <?php if($show_button == 'true') : ?>
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button">
                                        <?php pxl_print_html(agron_get_svg(content_url('/uploads/2025/05/arrow-up-right.svg'))); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_category == 'true') : ?>
                            <div class="pxl-post-category">
                                <?php the_terms($post->ID, 'category', '', $category_separator); ?>
                            </div>
                        <?php endif; ?>
                        <div class="divider"></div>
                        <?php if($show_date == 'true' || $show_comment == 'true') : ?>
                            <ul class="pxl-post-meta">
                                <?php if($show_date == 'true') : ?>
                                    <li class="pxl-post-date">
                                        <?php echo get_the_date('F d, Y', $post->ID); ?>
                                    </li>
                                    <li class="separator"></li>
                                <?php endif; ?>
                                <?php if($show_comment == 'true') : ?>
                                    <li>
                                        <?php echo esc_html('Comments '.$comment_count); ?>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_post_layout7($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $comment_count = (get_comments_number() < 10 && get_comments_number() != 0) ? '0'.get_comments_number() : get_comments_number();
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                    <div class="pxl-post-content">
                        <?php if($show_date == 'true') : ?>
                            <div class="pxl-post-date">
                                <span class="pxl-day"><?php echo get_the_date('d', $post->ID); ?></span>
                                <span class="pxl-month"><?php echo get_the_date('M', $post->ID); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if($show_category == 'true' || $show_comment == 'true') : ?>
                            <ul class="pxl-post-meta">                                
                                <?php if($show_category == 'true') : ?>
                                    <li class="pxl-post-category">
                                        <?php the_terms($post->ID, 'category', '', $category_separator); ?>
                                    </li>
                                    <li class="separator"></li>
                                <?php endif; ?>
                                <?php if($show_comment == 'true') : ?>
                                    <li>
                                        <?php echo esc_html('Comments '.$comment_count); ?>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                        <a class="pxl-button pxl-post-button pxl-button-default" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                            <span class="pxl-button-text">
                                <span class="pxl-button-icon icon-duplicated">
                                    <?php pxl_print_html(agron_get_svg(content_url('/uploads/2025/05/arrow-up-right.svg'))); ?>
                                </span>
                                <?php echo esc_html($button_text); ?>
                                <span class="pxl-button-icon icon-main">
                                    <?php pxl_print_html(agron_get_svg(content_url('/uploads/2025/05/arrow-up-right.svg'))); ?>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
// Project
function agron_get_project_layout1($posts = [], $settings = []){ 
    extract($settings);
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $img_dimension_tmp = $img_dimension;
            if(isset($grid_items[$key])) {
                $grid_item = $grid_items[$key];
                $item_class .= ' elementor-repeater-item-'.$grid_item['_id'];
                $grid_item_img_dimension = $grid_item['grid_item_img_dimension'];
                if($grid_item_img_dimension != '') {
                    $img_dimension_tmp = $grid_item_img_dimension;
                    if($grid_item_img_dimension === 'custom') {
                        $grid_item_img_dimension_custom = $grid_item['grid_item_img_dimension_custom'];
                        $img_dimension_tmp = (!empty($grid_item_img_dimension_custom['width']) && !empty($grid_item_img_dimension_custom['height'])) ? $grid_item_img_dimension_custom : 'full';
                    }
                }
            } 
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension_tmp ,
                'attr' => [
                    'class' => 'pxl-image no-lazyload',
                ],
            ], $post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item <?php echo esc_attr($featured_hover_style); ?>">
                    <?php if(!is_null($featured_image)) : ?>
                        <div class="pxl-post-featured">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                            <?php if($layout_style == 'layout-style2') : ?>
                                <div class="pxl-post-content view">
                                    <?php if($show_category == 'true') : ?>
                                        <div class="pxl-post-category">
                                            <?php the_terms( $post->ID, 'project-category', '', ', ' ); ?>
                                    </div>
                                    <?php endif; ?>
                                    <<?php echo esc_attr($title_tag); ?> class="pxl-post-title">
                                        <?php echo esc_html(get_the_title($post->ID)); ?>
                                    </<?php echo esc_attr($title_tag); ?>>
                                </div>
                            <?php endif; ?>
                            <div class="pxl-post-content">
                                <?php if($show_category == 'true') : ?>
                                    <div class="pxl-post-category">
                                        <?php the_terms( $post->ID, 'project-category', '', ', ' ); ?>
                                    </div>
                                <?php endif; ?>
                                <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                        <?php echo esc_html(get_the_title($post->ID)); ?>
                                    </a>
                                </<?php echo esc_attr($title_tag); ?>>
                                <?php if($show_excerpt == 'true') : ?>
                                    <p class="pxl-post-excerpt">
                                        <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button">
                                        <div class="pxl-button-icon">
                                            <svg class="copy" width="15" height="13" viewBox="0 0 15 13" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.1976 7.01861C14.4905 6.72572 14.4905 6.25085 14.1976 5.95795L9.42468 1.18498C9.13178 0.892088 8.65691 0.892088 8.36402 1.18498C8.07112 1.47787 8.07112 1.95275 8.36402 2.24564L12.6067 6.48828L8.36402 10.7309C8.07112 11.0238 8.07112 11.4987 8.36402 11.7916C8.65691 12.0845 9.13178 12.0845 9.42468 11.7916L14.1976 7.01861ZM0.333984 7.23828L13.6673 7.23828L13.6673 5.73828L0.333984 5.73828L0.333984 7.23828Z" fill="currentcolor"/>
                                            </svg>
                                            <svg class="main" width="15" height="13" viewBox="0 0 15 13" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.1976 7.01861C14.4905 6.72572 14.4905 6.25085 14.1976 5.95795L9.42468 1.18498C9.13178 0.892088 8.65691 0.892088 8.36402 1.18498C8.07112 1.47787 8.07112 1.95275 8.36402 2.24564L12.6067 6.48828L8.36402 10.7309C8.07112 11.0238 8.07112 11.4987 8.36402 11.7916C8.65691 12.0845 9.13178 12.0845 9.42468 11.7916L14.1976 7.01861ZM0.333984 7.23828L13.6673 7.23828L13.6673 5.73828L0.333984 5.73828L0.333984 7.23828Z" fill="currentcolor"/>
                                            </svg>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_project_layout2($posts = [], $settings = []){ 
    extract($settings);
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $img_dimension_tmp = $img_dimension;
            if(isset($grid_items[$key])) {
                $grid_item = $grid_items[$key];
                $item_class .= ' elementor-repeater-item-'.$grid_item['_id'];
                $grid_item_img_dimension = $grid_item['grid_item_img_dimension'];
                if($grid_item_img_dimension != '') {
                    $img_dimension_tmp = $grid_item_img_dimension;
                    if($grid_item_img_dimension === 'custom') {
                        $grid_item_img_dimension_custom = $grid_item['grid_item_img_dimension_custom'];
                        $img_dimension_tmp = (!empty($grid_item_img_dimension_custom['width']) && !empty($grid_item_img_dimension_custom['height'])) ? $grid_item_img_dimension_custom : 'full';
                    }
                }
            } 
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension_tmp ,
                'attr' => [
                    'class' => 'pxl-image no-lazyload',
                ],
            ], $post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item <?php echo esc_attr($featured_hover_style); ?>">
                    <div class="pxl-post-featured">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                    <div class="pxl-post-content">
                        <div class="group">
                            <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </<?php echo esc_attr($title_tag); ?>>
                            <?php if($show_excerpt == 'true') : ?>
                                <p class="pxl-post-excerpt">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <?php if($show_button == 'true') : ?>
                            <div class="pxl-button-wrap">
                                <svg class="shape" width="104" height="103" viewBox="0 0 104 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M83 21C95.5 21 104 9 104 0.5V103H0.5C12.9 103 22 90.5 22 83V41C22 33 29 21 45.5 21H83Z" fill="currentcolor"/>
                                </svg>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button">
                                    <?php pxl_print_html(agron_get_svg(content_url('/uploads/2025/10/border-circle-dash.svg'))); ?>
                                    <span class="pxl-button-icon">
                                        <?php pxl_print_html(agron_get_svg(content_url('/uploads/2025/10/arrow-right-2.svg'))); ?>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_project_layout3($posts = [], $settings = []){ 
    extract($settings);
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $img_dimension_tmp = $img_dimension;
            if(isset($grid_items[$key])) {
                $grid_item = $grid_items[$key];
                $item_class .= ' elementor-repeater-item-'.$grid_item['_id'];
                $grid_item_img_dimension = $grid_item['grid_item_img_dimension'];
                if($grid_item_img_dimension != '') {
                    $img_dimension_tmp = $grid_item_img_dimension;
                    if($grid_item_img_dimension === 'custom') {
                        $grid_item_img_dimension_custom = $grid_item['grid_item_img_dimension_custom'];
                        $img_dimension_tmp = (!empty($grid_item_img_dimension_custom['width']) && !empty($grid_item_img_dimension_custom['height'])) ? $grid_item_img_dimension_custom : 'full';
                    }
                }
            } 
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension_tmp ,
                'attr' => [
                    'class' => 'pxl-image no-lazyload',
                ],
            ], $post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item <?php echo esc_attr($featured_hover_style); ?>">
                    <?php if(!is_null($featured_image)) : ?>
                        <div class="pxl-post-featured">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                        </div>
                        <div class="pxl-post-content">
                            <?php if($show_button == 'true') : ?>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button">
                                    <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 27.499C15.1369 27.499 14.4375 26.7996 14.4375 25.9365V6.06396C14.4375 5.20084 15.1369 4.50146 16 4.50146C16.8631 4.50146 17.5625 5.20084 17.5625 6.06396V25.9365C17.5625 26.7996 16.8631 27.499 16 27.499Z" fill="currentcolor"/>
                                        <path d="M25.9362 17.5625H6.06372C5.2006 17.5625 4.50122 16.8631 4.50122 16C4.50122 15.1369 5.2006 14.4375 6.06372 14.4375H25.9362C26.7993 14.4375 27.4987 15.1369 27.4987 16C27.4987 16.8631 26.7993 17.5625 25.9362 17.5625Z" fill="currentcolor"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if($show_category == 'true') : ?>
                                <div class="pxl-post-category">
                                    <?php the_terms( $post->ID, 'project-category', '', ', ' ); ?>
                                </div>
                            <?php endif; ?>
                            <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                </a>
                            </<?php echo esc_attr($title_tag); ?>>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach;
    endif;
}
// Service
function agron_get_service_layout1($posts = [], $settings = []) {
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $service_icon = agron_get_service_icon($post->ID);
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $link_href = !empty($service_external_link) ? $service_external_link : get_permalink($post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-featured">
                        <a href="<?php echo esc_url($link_href); ?>" class="pxl-featured-link">
                            <?php pxl_print_html($featured_image); ?>
                        </a>
                    </div>
                    <span class="pxl-post-icon">
                        <?php pxl_print_html($service_icon); ?>
                    </span>
                    <div class="pxl-post-content">
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                        <a href="<?php echo esc_url($link_href); ?>" class="pxl-title-link">
                            <?php echo esc_html(get_the_title($post->ID)); ?>
                        </a>
                    </<?php echo esc_attr($title_tag); ?>>
                    <?php if($show_excerpt == 'true') : ?>
                        <p class="pxl-post-excerpt">
                            <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                        </p>
                    <?php endif; ?>
                    </div>
                    <?php if($show_button == 'true') : ?>
                        <a href="<?php echo esc_url($link_href); ?>" class="button pxl-post-button pxl-button-default">
                            <span class="pxl-button-text">
                                <span class="pxl-button-icon icon-duplicated">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                        <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                    </svg>                                    
                                </span>
                                <?php echo esc_html($button_text); ?>
                                <span class="pxl-button-icon icon-main">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                        <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                    </svg>                                    
                                </span>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_service_layout2($posts = [], $settings = []) {
    extract($settings);
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $service_icon = agron_get_service_icon($post->ID);
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $link_href = !empty($service_external_link) ? $service_external_link : get_permalink($post->ID);
            $active_class = ($key === 0) ? 'active' : null;
        ?>
            <div class="<?php echo esc_attr('tab-content grid-item '.$active_class); ?>">
                <div class="pxl-post-item content-inner">
                    <div class="group">
                        <?php if($show_icon == 'true') : ?>
                            <span class="pxl-post-icon">
                                <?php pxl_print_html($service_icon); ?>
                            </span>
                        <?php endif; ?>
                        <div class="pxl-post-content">
                            <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                                <a href="<?php echo esc_url($link_href); ?>" class="pxl-title-link">
                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                </a>
                            </<?php echo esc_attr($title_tag); ?>>
                            <?php if($show_excerpt == 'true') : ?>
                                <p class="pxl-post-excerpt">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                                </p>
                            <?php endif; ?>
                            <?php if($show_button == 'true') : ?>
                                <a href="<?php echo esc_url($link_href); ?>" class="button pxl-post-button pxl-button-default">
                                    <span class="pxl-button-text">
                                        <span class="pxl-button-icon icon-duplicated">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                            </svg>                                    
                                        </span>
                                        <?php echo esc_html($button_text); ?>
                                        <span class="pxl-button-icon icon-main">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                            </svg>                                    
                                        </span>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url($link_href); ?>" class="pxl-featured-link">
                            <?php pxl_print_html($featured_image); ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_service_layout3($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-content">
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                        <?php if($show_excerpt == 'true') : ?>
                            <p class="pxl-post-excerpt">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                            </p>
                        <?php endif; ?>
                        <?php if($show_category == 'true') : ?>
                            <div class="pxl-post-category">
                                <?php the_terms( $post->ID, 'service-category', '', '' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_service_layout4($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $service_icon = agron_get_service_icon($post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="featured-wrap">
                        <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                        </div>
                    </div>
                    <div class="pxl-post-content">
                        <div class="pxl-post-icon">
                            <?php pxl_print_html($service_icon); ?>
                        </div>
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                        <?php if($show_excerpt == 'true') : ?>
                            <p class="pxl-post-excerpt">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                            </p>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button pxl-button-default <?php echo esc_attr($button_hover_style); ?>">
                                <span class="pxl-button-text">
                                    <span class="pxl-button-icon icon-duplicated">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                    <?php echo esc_html($button_text); ?>
                                    <span class="pxl-button-icon icon-main">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_service_layout5($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                    <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                            <?php echo esc_html(get_the_title($post->ID)); ?>
                        </a>
                    </<?php echo esc_attr($title_tag); ?>>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_service_layout6($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $service_icon = agron_get_service_icon($post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-content">
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                        <?php if($show_excerpt == 'true') : ?>
                            <p class="pxl-post-excerpt">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                            </p>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="button pxl-post-button pxl-button-default <?php echo esc_attr($button_hover_style); ?>">
                                <span class="pxl-button-text">
                                    <span class="pxl-button-icon icon-duplicated">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                    <?php echo esc_html($button_text); ?>
                                    <span class="pxl-button-icon icon-main">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                            <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                                        </svg>                                    
                                    </span>
                                </span>
                            </a>
                        <?php endif; ?>
                        <div class="pxl-post-icon">
                            <?php pxl_print_html($service_icon); ?>
                        </div>
                    </div>
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_service_layout7($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $featured_image = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image',
                ],
            ], $post->ID);
            $service_icon = agron_get_service_icon($post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <div class="pxl-post-featured <?php echo esc_attr($featured_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                            <?php echo wp_kses_post($featured_image); ?>
                        </a>
                    </div>
                    <div class="pxl-post-icon">
                        <?php 
                        pxl_print_html(agron_get_svg(content_url('/uploads/2025/10/border-circle-dash.svg')));
                        pxl_print_html($service_icon); 
                        ?>
                    </div>
                    <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                            <?php echo esc_html(get_the_title($post->ID)); ?>
                        </a>
                    </<?php echo esc_attr($title_tag); ?>>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function agron_get_service_layout8($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($post->ID, array_unique($tax)) : '';
            $service_icon = agron_get_service_icon($post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                <div class="pxl-post-item">
                    <svg class="pxl-shape" xmlns="http://www.w3.org/2000/svg" width="424" height="127" viewBox="0 0 424 127">
                        <path d="M207.182 102.026C112.745 151.478 29.7121 116.229 0 92.4235V0.000976562H424V114.029C413.159 79.8204 325.227 40.2109 207.182 102.026Z" fill="currentcolor"/>
                    </svg>
                    <div class="pxl-post-header">
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title">
                            <?php echo esc_html(get_the_title($post->ID)); ?>
                        </<?php echo esc_attr($title_tag); ?>>
                        <div class="pxl-post-icon">
                            <?php pxl_print_html($service_icon); ?>
                        </div>
                    </div>
                    <div class="pxl-divider"></div>
                    <p class="pxl-post-excerpt">
                        <?php echo wp_trim_words( $post->post_excerpt, $num_of_words, $more = null); ?>
                    </p>
                    <?php 
                    $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                <path d="M12.5657 6.56569C12.8781 6.25327 12.8781 5.74673 12.5657 5.43431L7.47452 0.343146C7.1621 0.0307264 6.65557 0.0307264 6.34315 0.343146C6.03073 0.655565 6.03073 1.1621 6.34315 1.47452L10.8686 6L6.34315 10.5255C6.03073 10.8379 6.03073 11.3444 6.34315 11.6569C6.65557 11.9693 7.1621 11.9693 7.47452 11.6569L12.5657 6.56569ZM0 6V6.8H12V6V5.2H0V6Z" fill="currentColor"/>
                                </svg>';
                    ?>
                    <div class="pxl-button pxl-post-button">
                        <span class="pxl-button-text">
                            <?php echo esc_html($button_text); ?>
                        </span>
                        <span class="pxl-button-icon">
                            <?php pxl_print_html($svg_icon); ?>
                        </span>
                    </div>
                    <a class="pxl-box-link" href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link"></a>
                </div>
            </div>
        <?php endforeach;
    endif;
}
// Team
function agron_get_team_layout1($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $position = get_post_meta($post->ID, 'team_position', true);
            $thumbnail = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                // 'attr' => [
                //     'class' => 'pxl-image no-lazyload' ,
                // ]
            ], $post->ID);
            $social_share_html = agron_get_team_social($post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>                
                <div class="pxl-post-item">
                    <div class="pxl-post-featured">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link <?php echo esc_attr($featured_hover_style); ?>">
                            <?php pxl_print_html($thumbnail); ?>
                        </a>
                        <?php if($show_social == 'true') : ?>
                            <div class="pxl-post-socials">
                                <ul class="pxl-social-list">
                                    <?php pxl_print_html($social_share_html); ?>
                                </ul>
                                <div class="pxl-social-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                                        <path d="M14.0427 18.0458L8.93256 15.2584C8.29992 15.8864 7.42867 16.2744 6.4668 16.2744C4.5338 16.2744 2.9668 14.7074 2.9668 12.7744C2.9668 10.8414 4.5338 9.27441 6.4668 9.27441C7.42861 9.27441 8.29981 9.66237 8.93244 10.2903L14.0427 7.50296C13.993 7.26795 13.9668 7.02424 13.9668 6.77441C13.9668 4.84141 15.5338 3.27441 17.4668 3.27441C19.3998 3.27441 20.9668 4.84141 20.9668 6.77441C20.9668 8.70741 19.3998 10.2744 17.4668 10.2744C16.5049 10.2744 15.6337 9.88642 15.0011 9.2584L9.89084 12.0457C9.94062 12.2808 9.9668 12.5245 9.9668 12.7744C9.9668 13.0242 9.94063 13.2679 9.89088 13.5029L15.0011 16.2904C15.6338 15.6624 16.505 15.2744 17.4668 15.2744C19.3998 15.2744 20.9668 16.8414 20.9668 18.7744C20.9668 20.7074 19.3998 22.2744 17.4668 22.2744C15.5338 22.2744 13.9668 20.7074 13.9668 18.7744C13.9668 18.5246 13.993 18.2808 14.0427 18.0458Z" fill="currentcolor"/>
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="pxl-post-content">
                        <?php if($show_position == 'true') : ?>
                            <span class="pxl-post-position">
                                <?php pxl_print_html($position); ?>
                            </span>
                        <?php endif; ?>
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}

function agron_get_team_layout2($posts = [], $settings = []){ 
    extract($settings);
    $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $position = get_post_meta($post->ID, 'team_position', true);
            $thumbnail = agron_get_image_by_size([
                'img_dimension' => $img_dimension ,
                'attr' => [
                    'class' => 'pxl-image no-lazyload' ,
                ]
            ], $post->ID);
            $social_share_html = agron_get_team_social($post->ID);
        ?>
            <div class="<?php echo esc_attr($item_class); ?>"
            <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>                
                <div class="pxl-post-item">
                    <div class="pxl-post-featured">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link <?php echo esc_attr($featured_hover_style); ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                        <?php if($show_social == 'true') : ?>
                            <div class="pxl-post-socials">
                                <ul class="pxl-social-list">
                                    <?php pxl_print_html($social_share_html); ?>
                                </ul>
                                <div class="pxl-social-text">
                                    <?php echo esc_html__('Follow me', 'agron'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="pxl-post-content">
                        <?php if($show_position == 'true') : ?>
                            <span class="pxl-post-position">
                                <?php pxl_print_html($position); ?>
                            </span>
                        <?php endif; ?>
                        <<?php echo esc_attr($title_tag); ?> class="pxl-post-title <?php echo esc_attr($title_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-title-link">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </<?php echo esc_attr($title_tag); ?>>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}

// Product
if ( class_exists( 'WooCommerce' ) ) {
    function agron_get_product_layout1($posts = [], $settings = []){ 
        extract($settings);
        $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
        if (is_array($posts)):
            foreach ($posts as $key => $product) :
                $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($product->ID, array_unique($tax)) : '';
                $product_obj = wc_get_product($product->ID);
                $featured_image = agron_get_image_by_size([
                    'img_dimension' => $img_dimension ,
                    'attr' => [
                        'class' => 'pxl-image',
                    ],
                ], $product->ID);
            ?>
                <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
                <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                    <div class="pxl-product-item">
                        <div class="pxl-product-actions">
                            <?php 
                            $btn_inner = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                            <path d="M13.366 0L16.577 5.38395L20 5.38412V7.32012L18.833 7.31993L18.0764 16.1124C18.0332 16.6141 17.5999 17 17.0798 17H2.92014C2.40005 17 1.96678 16.6141 1.92359 16.1124L1.166 7.31993L0 7.32012V5.38412L3.422 5.38395L6.63398 0L8.36602 0.967988L5.732 5.38395H14.267L11.634 0.967988L13.366 0ZM16.826 7.31993L3.173 7.32012L3.84 15.064H16.159L16.826 7.31993ZM11 9.2561V13.128H9.00002V9.2561H11ZM7 9.2561V13.128H5V9.2561H7ZM15 9.2561V13.128H13V9.2561H15Z" fill="currentcolor"/>
                                            </svg>';
                            echo sprintf(
                                '<a href="%1$s"
                                    data-product_id="%2$s"
                                    data-product_sku="%3$s"
                                    data-quantity="1"
                                    class="button pxl-button-default add_to_cart_button ajax_add_to_cart product_type_%6$s pxl-add-btn"
                                    rel="nofollow">%5$s</a>',
                                esc_url( $product_obj->add_to_cart_url() ),
                                esc_attr( $product_obj->get_id() ),
                                esc_attr( $product_obj->get_sku() ),
                                1,
                                $btn_inner,
                                esc_attr( $product_obj->get_type() )    
                                );
                            ?>
                            <?php if ( class_exists( 'WPCleverWoosq' ) ) : ?>
                                <a href="#" class="woo-btn woosq-btn" data-id="<?php echo esc_attr( $product->ID ); ?>">
                                    <svg width="21" height="17" viewBox="0 0 21 17" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.2176 0C15.3102 0 19.5469 3.66422 20.4352 8.5C19.5469 13.3357 15.3102 17 10.2176 17C5.12501 17 0.888259 13.3357 0 8.5C0.888259 3.66422 5.12501 0 10.2176 0ZM10.2176 15.1111C14.2179 15.1111 17.641 12.3269 18.5074 8.5C17.641 4.67314 14.2179 1.88889 10.2176 1.88889C6.21724 1.88889 2.79421 4.67314 1.92774 8.5C2.79421 12.3269 6.21724 15.1111 10.2176 15.1111ZM10.2176 12.75C7.87038 12.75 5.96759 10.8472 5.96759 8.5C5.96759 6.15279 7.87038 4.25 10.2176 4.25C12.5648 4.25 14.4676 6.15279 14.4676 8.5C14.4676 10.8472 12.5648 12.75 10.2176 12.75ZM10.2176 10.8611C11.5216 10.8611 12.5787 9.80399 12.5787 8.5C12.5787 7.19601 11.5216 6.13889 10.2176 6.13889C8.91363 6.13889 7.85647 7.19601 7.85647 8.5C7.85647 9.80399 8.91363 10.8611 10.2176 10.8611Z" fill="currentcolor"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php
                                if ( class_exists( 'WPCleverWoosw' ) ) {
                                    echo do_shortcode( '[woosw_btn id="' . esc_attr( $product->ID ) . '" class="woosw-btn"]' );
                                }
                            ?>
                        </div>
                        <?php if($product_obj && $product_obj->is_on_sale()) : ?>
                            <div class="pxl-product-sale">
                                <div class="pxl-sale-badge"><?php echo esc_html__('Sale', 'agron'); ?></div>
                                <div class="pxl-sale-percent"><?php pxl_print_html(get_product_sale_percent($product_obj).'%'); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-product-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                        </div>
                        <div class="pxl-product-rating">
                            <?php 
                                if ($product_obj && $product_obj->get_average_rating()) {
                                    pxl_print_html(wc_get_rating_html($product_obj->get_average_rating()));
                                }
                            ?>
                        </div>
                        <div class="pxl-product-content">
                            <<?php echo esc_attr($title_tag); ?> class="pxl-product-name <?php echo esc_attr($title_hover_style); ?>">
                                <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-title-link">
                                    <?php echo esc_html($product_obj->get_name()); ?>
                                </a>
                            </<?php echo esc_attr($title_tag); ?>>
                            <div class="pxl-product-price">
                                <?php pxl_print_html($product_obj->get_price_html()); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif;
    }
    function agron_get_product_layout2($posts = [], $settings = []){ 
        extract($settings);
        $item_class = "swiper-slide {$entrance_anim}";
        if (is_array($posts)):
            foreach ($posts as $key => $product):
                $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($product->ID, array_unique($tax)) : '';
                $product_obj = wc_get_product($product->ID);
                $featured_image = agron_get_image_by_size([
                    'img_dimension' => $img_dimension ,
                    'attr' => [
                        'class' => 'pxl-image',
                    ],
                ], $product->ID);
                $product_excerpt = get_post_meta($product->ID, 'product_excerpt', true);
            ?>
                <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
                <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                    <div class="pxl-product-item">
                        <?php if($product_obj->is_on_sale()) : ?>
                            <div class="pxl-product-sale">
                                <div class="pxl-sale-percent"><?php pxl_print_html('-'.get_product_sale_percent($product_obj).'%'); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-product-content">
                            <?php  if ($product_obj && $product_obj->get_average_rating() && $show_rating == 'true') : ?>
                                <div class="pxl-product-rating">
                                    <?php pxl_print_html(wc_get_rating_html($product_obj->get_average_rating())); ?>
                                </div>
                            <?php endif; ?>
                            <<?php echo esc_attr($title_tag); ?> class="pxl-product-name <?php echo esc_attr($title_hover_style); ?>">
                                <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-title-link">
                                    <?php echo esc_html($product_obj->get_name()); ?>
                                </a>
                            </<?php echo esc_attr($title_tag); ?>>
                            <div class="pxl-product-price">
                                <?php pxl_print_html($product_obj->get_price_html()); ?>
                            </div>
                            <?php if($show_excerpt == 'true') : ?>
                                <p class="pxl-product-excerpt">
                                    <?php echo wp_trim_words( $product_excerpt, $num_of_words, $more = null ); ?>
                                </p>
                            <?php endif; ?>
                            <?php 
                                $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentColor"/>
                                </svg>';

                                $btn_inner = '
                                <span class="pxl-button-text">
                                <span class="pxl-button-icon icon-duplicated">'.$svg_icon.'</span>
                                '.esc_html__('Add to Cart', 'agron').'
                                <span class="pxl-button-icon icon-main">'.$svg_icon.'</span>
                                </span>';

                                echo sprintf(
                                '<a href="%1$s"
                                    data-product_id="%2$s"
                                    data-product_sku="%3$s"
                                    data-quantity="1"
                                    class="button pxl-button-default add_to_cart_button ajax_add_to_cart product_type_%6$s pxl-add-btn"
                                    rel="nofollow">%5$s</a>',
                                esc_url( $product_obj->add_to_cart_url() ),
                                esc_attr( $product_obj->get_id() ),
                                esc_attr( $product_obj->get_sku() ),
                                1,
                                $btn_inner,
                                esc_attr( $product_obj->get_type() )    
                                );
                            ?>
                            <div class="pxl-product-actions">
                                <?php if ( class_exists( 'WPCleverWoosq' ) ) : ?>
                                    <a href="#" class="woo-btn woosq-btn" data-id="<?php echo esc_attr( $product->ID ); ?>">
                                        <svg width="21" height="17" viewBox="0 0 21 17" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.2176 0C15.3102 0 19.5469 3.66422 20.4352 8.5C19.5469 13.3357 15.3102 17 10.2176 17C5.12501 17 0.888259 13.3357 0 8.5C0.888259 3.66422 5.12501 0 10.2176 0ZM10.2176 15.1111C14.2179 15.1111 17.641 12.3269 18.5074 8.5C17.641 4.67314 14.2179 1.88889 10.2176 1.88889C6.21724 1.88889 2.79421 4.67314 1.92774 8.5C2.79421 12.3269 6.21724 15.1111 10.2176 15.1111ZM10.2176 12.75C7.87038 12.75 5.96759 10.8472 5.96759 8.5C5.96759 6.15279 7.87038 4.25 10.2176 4.25C12.5648 4.25 14.4676 6.15279 14.4676 8.5C14.4676 10.8472 12.5648 12.75 10.2176 12.75ZM10.2176 10.8611C11.5216 10.8611 12.5787 9.80399 12.5787 8.5C12.5787 7.19601 11.5216 6.13889 10.2176 6.13889C8.91363 6.13889 7.85647 7.19601 7.85647 8.5C7.85647 9.80399 8.91363 10.8611 10.2176 10.8611Z" fill="currentcolor"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php
                                    if ( class_exists( 'WPCleverWoosw' ) ) {
                                        echo do_shortcode( '[woosw_btn id="' . esc_attr( $product->ID ) . '" class="woosw-btn"]' );
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="pxl-product-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif;
    }
    function agron_get_product_layout3($posts = [], $settings = []){ 
        extract($settings);
        $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
        if (is_array($posts)):
            foreach ($posts as $key => $product) :
                $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($product->ID, array_unique($tax)) : '';
                $product_obj = wc_get_product($product->ID);
                $featured_image = agron_get_image_by_size([
                    'img_dimension' => $img_dimension ,
                    'attr' => [
                        'class' => 'pxl-image',
                    ],
                ], $product->ID);
            ?>
                <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
                <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                    <div class="pxl-product-item">
                        <?php if($product_obj && $product_obj->is_on_sale()) : ?>
                            <div class="pxl-product-sale">
                                <div class="pxl-sale-percent"><?php pxl_print_html('-'.get_product_sale_percent($product_obj).'%'); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-product-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                            <?php 
                                $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="19" height="17" viewBox="0 0 19 17">
                                                <path d="M12.6977 0L15.7482 5.38395L19 5.38412V7.32012L17.8914 7.31993L17.1726 16.1124C17.1315 16.6141 16.7199 17 16.2258 17H2.77413C2.28005 17 1.86844 16.6141 1.82741 16.1124L1.1077 7.31993L0 7.32012V5.38412L3.2509 5.38395L6.30227 0L7.94771 0.967988L5.44539 5.38395H13.5537L11.0523 0.967988L12.6977 0ZM15.9847 7.31993L3.01435 7.32012L3.648 15.064H15.3511L15.9847 7.31993ZM10.45 9.2561V13.128H8.55001V9.2561H10.45ZM6.64999 9.2561V13.128H4.75V9.2561H6.64999ZM14.25 9.2561V13.128H12.35V9.2561H14.25Z" fill="currentcolor"/>
                                            </svg>';
                                $btn_inner = '<span class="pxl-button-text">
                                <span class="pxl-button-icon icon-duplicated">'.$svg_icon.'</span>
                                '.esc_html__('Add To Cart', 'agron').'
                                <span class="pxl-button-icon icon-main">'.$svg_icon.'</span>
                                </span>';
                                echo sprintf(
                                    '<a href="%1$s"
                                        data-product_id="%2$s"
                                        data-product_sku="%3$s"
                                        data-quantity="1"
                                        class="button pxl-button-default add_to_cart_button ajax_add_to_cart product_type_%6$s pxl-add-btn"
                                        rel="nofollow">%5$s</a>',
                                    esc_url( $product_obj->add_to_cart_url() ),
                                    esc_attr( $product_obj->get_id() ),
                                    esc_attr( $product_obj->get_sku() ),
                                    1,
                                    $btn_inner,
                                    esc_attr( $product_obj->get_type() )    
                                    );
                                ?>
                        </div>
                        <div class="pxl-product-content">
                            <div class="pxl-product-price">
                                <?php pxl_print_html($product_obj->get_price_html()); ?>
                            </div>
                            <<?php echo esc_attr($title_tag); ?> class="pxl-product-name <?php echo esc_attr($title_hover_style); ?>">
                                <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-title-link">
                                    <?php echo esc_html($product_obj->get_name()); ?>
                                </a>
                            </<?php echo esc_attr($title_tag); ?>>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif;
    }
    function agron_get_product_layout4($posts = [], $settings = []){ 
        extract($settings);
        $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
        if (is_array($posts)):
            foreach ($posts as $key => $product) :
                $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($product->ID, array_unique($tax)) : '';
                $product_obj = wc_get_product($product->ID);
                $featured_image = agron_get_image_by_size([
                    'img_dimension' => $img_dimension ,
                    'attr' => [
                        'class' => 'pxl-image',
                    ],
                ], $product->ID);
            ?>
                <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
                <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                    <div class="pxl-product-item">
                        <?php if($product_obj && $product_obj->is_on_sale()) : ?>
                            <div class="pxl-product-sale">
                                <div class="pxl-sale-percent"><?php pxl_print_html('-'.get_product_sale_percent($product_obj).'%'); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-product-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                        </div>
                        <div class="pxl-product-content">
                            <div class="pxl-product-category">
                                <?php the_terms($product->ID, 'product_cat', '', ', '); ?>
                            </div>
                            <<?php echo esc_attr($title_tag); ?> class="pxl-product-name <?php echo esc_attr($title_hover_style); ?>">
                                <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-title-link">
                                    <?php echo esc_html($product_obj->get_name()); ?>
                                </a>
                            </<?php echo esc_attr($title_tag); ?>>
                            <div class="pxl-product-price">
                                <?php pxl_print_html($product_obj->get_price_html()); ?>
                            </div>
                            <?php 
                            $svg_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18">
                                            <path d="M13.366 0L16.577 5.562L20 5.56218V7.5622L18.833 7.562L18.0764 16.6452C18.0332 17.1635 17.5999 17.5622 17.0798 17.5622H2.92014C2.40005 17.5622 1.96678 17.1635 1.92359 16.6452L1.166 7.562L0 7.5622V5.56218L3.422 5.562L6.63398 0L8.36602 1L5.732 5.562H14.267L11.634 1L13.366 0ZM16.826 7.562L3.173 7.5622L3.84 15.5622H16.159L16.826 7.562ZM11 9.5622V13.5622H9.00002V9.5622H11ZM7 9.5622V13.5622H5V9.5622H7ZM15 9.5622V13.5622H13V9.5622H15Z" fill="currentcolor"/>
                                        </svg>';

                            $btn_inner = '<span class="pxl-button-text">
                                <span class="pxl-button-icon icon-duplicated">'.$svg_icon.'</span>
                                '.esc_html__('Add to Cart', 'agron').'
                                <span class="pxl-button-icon icon-main">'.$svg_icon.'</span>
                                </span>';
                            echo sprintf(
                                '<a href="%1$s"
                                    data-product_id="%2$s"
                                    data-product_sku="%3$s"
                                    data-quantity="1"
                                    class="button pxl-button-default add_to_cart_button ajax_add_to_cart product_type_%6$s pxl-add-btn"
                                    rel="nofollow">%5$s</a>',
                                esc_url( $product_obj->add_to_cart_url() ),
                                esc_attr( $product_obj->get_id() ),
                                esc_attr( $product_obj->get_sku() ),
                                1,
                                $btn_inner,
                                esc_attr( $product_obj->get_type() )    
                                );
                            ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif;
    }
    function agron_get_product_layout5($posts = [], $settings = []){ 
        extract($settings);
        $item_class = ($layout_type == 'grid') ? "grid-item {$entrance_anim}" : "swiper-slide {$entrance_anim}";
        if (is_array($posts)):
            foreach ($posts as $key => $product) :
                $filter_class = !empty($tax) ? pxl_get_term_of_post_to_class($product->ID, array_unique($tax)) : '';
                $product_obj = wc_get_product($product->ID);
                $featured_image = agron_get_image_by_size([
                    'img_dimension' => $img_dimension ,
                    'attr' => [
                        'class' => 'pxl-image',
                    ],
                ], $product->ID);
            ?>
                <div class="<?php echo esc_attr($item_class.' '.$filter_class); ?>"
                <?php if($anim_delay != 0) : ?> data-wow-delay="<?php echo esc_attr(($key * $anim_delay).'ms') ?>" <?php endif; ?>>
                    <div class="pxl-product-item">
                        <?php if($product_obj && $product_obj->is_on_sale()) : ?>
                            <div class="pxl-product-sale">
                                <div class="pxl-sale-percent"><?php pxl_print_html('-'.get_product_sale_percent($product_obj).'%'); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-product-featured <?php echo esc_attr($featured_hover_style); ?>">
                            <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($featured_image); ?>
                            </a>
                            <div class="pxl-product-actions">
                                <?php if ( class_exists( 'WPCleverWoosq' ) ) : ?>
                                    <a href="#" class="woo-btn woosq-btn" data-id="<?php echo esc_attr( $product->ID ); ?>">
                                        <i class="flaticon flaticon-loupe"></i>
                                    </a>
                                <?php endif; ?>
                                <?php
                                    if ( class_exists( 'WPCleverWoosw' ) ) {
                                        echo do_shortcode( '[woosw_btn id="' . esc_attr( $product->ID ) . '" class="woosw-btn"]' );
                                    }
                                    if ( class_exists( 'WPCleverWoosc' ) ) {
                                        echo do_shortcode( '[woosc_btn id="' . esc_attr( $product->ID ) . '" class="woosc-btn"]' );
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="pxl-product-content">
                            <div class="pxl-product-rating">
                                <?php pxl_print_html(wc_get_rating_html($product_obj->get_average_rating())); ?>
                            </div>
                            <<?php echo esc_attr($title_tag); ?> class="pxl-product-name <?php echo esc_attr($title_hover_style); ?>">
                                <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="pxl-title-link">
                                    <?php echo esc_html($product_obj->get_name()); ?>
                                </a>
                            </<?php echo esc_attr($title_tag); ?>>
                            <div class="pxl-product-price">
                                <?php pxl_print_html($product_obj->get_price_html()); ?>
                            </div>
                            <?php 
                            if($show_add_to_cart == 'true') {
                                $svg_icon = agron_get_svg(content_url('/uploads/2025/06/arrow-short-right.svg'));
    
                                $btn_inner = '<span class="pxl-button-text">
                                    '.esc_html__('Add to Cart', 'agron').'
                                    </span>
                                    <span class="pxl-button-icon icon-main">'.$svg_icon.'</span>';
                                echo sprintf(
                                    '<a href="%1$s"
                                        data-product_id="%2$s"
                                        data-product_sku="%3$s"
                                        data-quantity="1"
                                        class="button add_to_cart_button ajax_add_to_cart product_type_%6$s pxl-add-btn"
                                        rel="nofollow">%5$s</a>',
                                    esc_url( $product_obj->add_to_cart_url() ),
                                    esc_attr( $product_obj->get_id() ),
                                    esc_attr( $product_obj->get_sku() ),
                                    1,
                                    $btn_inner,
                                    esc_attr( $product_obj->get_type() )    
                                );
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif;
    }
}


// Ajax Posts
add_action( 'wp_ajax_agron_load_more_post_grid', 'agron_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_agron_load_more_post_grid', 'agron_load_more_post_grid' );
function agron_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'agron'));
        }
    
        $settings = isset($_POST['settings']) ? $_POST['settings'] : null;
       
        $source = isset($settings['source']) ? $settings['source'] : '';
        $term_slug = isset($settings['term_slug']) ? $settings['term_slug'] : '';
        if( !empty($term_slug) && $term_slug !='*'){
            $term_slug = str_replace('.', '', $term_slug);
            $source = [$term_slug.'|'.$settings['tax'][0]]; 
        }
        if( isset($_POST['handler_click']) && sanitize_text_field(wp_unslash( $_POST[ 'handler_click' ] )) == 'filter'){
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        }else{
            set_query_var('paged', $settings['paged']);
        }
        extract(pxl_get_posts_of_grid($settings['post_type'], [
                'source' => $source,
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => isset($settings['post_ids'])?$settings['post_ids']: [],
                'post_not_in' => isset($settings['post_not_in'])?$settings['post_not_in']: [],
            ],
            $settings['tax']
        ));

        ob_start();
            agron_get_post_template($posts, $settings);
        $html = ob_get_clean();

        $pagin_html = '';
        if( isset($settings['pagination']) && $settings['pagination'] == 'pagination' ){ 
            ob_start();
            agron()->page->get_pagination( $query,  true );
            $pagin_html = ob_get_clean();
        }
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'agron'),
                'data' => array(
                    'html' => $html,
                    'pagin_html' => $pagin_html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}