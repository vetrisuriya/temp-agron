<?php

$items       = $widget->get_setting('items', []);
$item_active = $widget->get_setting('item_active', 1);
if(!empty($items)) : ?>
    <div class="pxl-language-switcher">
        <div class="pxl-language-selector">
            <?php foreach($items as $key => $item) : ?>
                <?php if($item_active === ($key + 1)) : 
                    $code     = $item['code'] ?? '';
                    $flag_image  = agron_get_image_by_size( array(
                        'img_id'        => $item['flag_img']['id'],
                        'img_dimension' => 'full',
                        'attr' => [
                            'class' => 'pxl-flag-image',
                        ],
                    ));
                ?>
                    <div class="pxl-language-control">
                        <?php pxl_print_html($flag_image); ?>
                        <div class="pxl-language-code">
                            <?php echo esc_html($code); ?>
                        </div>
                    </div>
                    <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" width="7" height="4" viewBox="0 0 7 4" fill="none">
                        <path d="M3.49998 2.54543L6.22223 0L7 0.727267L3.49998 4L0 0.727267L0.777776 0L3.49998 2.54543Z" fill="currentcolor"/>
                    </svg>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <div class="pxl-language-options">
            <?php foreach($items as $key => $item) : 
                $language = $item['language'] ?? '';
                $code     = $item['code'] ?? '';
                $flag_img = agron_get_image_by_size([
                    'img_id' => $item['flag_img']['id'],
                    'img_dimension' => 'full',
                    'attr' => [
                        'class' => 'pxl-flag-image',
                    ],
                ]);
                $language_active = ($item_active === ($key + 1)) ? 'active' : '';
            ?>
            <div class="option <?php echo esc_attr($language_active); ?>" data-code="<?php echo esc_attr($code); ?>">
                <?php pxl_print_html($flag_img); ?>
                <div class="pxl-language-text">
                    <?php echo esc_html($language); ?>
                </div>
            </div>
    
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; 