<?php if(!function_exists('agron_configs')){
    function agron_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'agron'), 
                    'value' => agron()->get_opt('primary_color', '#5B8C51')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'agron'), 
                    'value' => agron()->get_opt('secondary_color', '#EDDD5E')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'agron'), 
                    'value' => agron()->get_opt('third_color', '#0A2803')
                ],
                'body-bg'   => [
                    'title' => esc_html__('Body Background Color', 'agron'), 
                    'value' => agron()->get_page_opt('body_bg_color', '#fff')
                ],
            ],
            // 'link' => [
            //     'color' => agron()->get_opt('link_color', ['regular' => '#1F1F1F'])['regular'],
            //     'color-hover'   => agron()->get_opt('link_color', ['hover' => '#F14F44'])['hover'],
            //     'color-active'  => agron()->get_opt('link_color', ['active' => '#F14F44'])['active'],
            // ],
            // 'gradient' => [
            //     'from' => agron()->get_opt('color_gradient', ['from' => '#6000ff'])['from'],
            //     'to' => agron()->get_opt('color_gradient', ['to' => '#fe0054'])['to'],
            // ],
            'theme_typography' => [
                'primary' => [
                    'title' => esc_html__('Primary', 'agron'),
                    'value' => agron()->get_opt('primary_font', 'Nunito')
                ],
                'secondary' => [
                    'title' => esc_html__('Secondary', 'agron'),
                    'value' => agron()->get_opt('secondary_font', 'Nunito')
                ],
                'heading' => [
                    'title' => esc_html__('Heading', 'agron'),
                    'value' => agron()->get_opt('heading_font', 'Nunito')
                ],
            ]
        ];
        return $configs[$value];
    }
}
if(!function_exists('agron_inline_styles')) {
    function agron_inline_styles() {  
        
        $theme_colors      = agron_configs('theme_colors');
        // $color_gradient    = agron_configs('gradient');
        $theme_typography  = agron_configs('theme_typography');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--color-%1$s: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            // foreach ($link_color as $color => $value) {
            //     printf('--link-%1$s: %2$s;', $color, $value);
            // }
            // foreach ($color_gradient as $color => $value) {
            //     printf('--color-%1$s: %2$s;', $color, $value);
            // }
            foreach ($theme_typography as $font => $value) {
                $font_family = is_array($value['value']) ? $value['value']['font-family'] : $value['value'];
                printf('--font-%1$s: %2$s;', str_replace('#', '',$font),  $font_family);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 