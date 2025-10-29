<?php  
$footer_display = agron()->get_page_opt('footer_display', 'show'); 
if($footer_display === 'show') :
?>
    <footer id="pxl-footer-default" class="pxl-footer"> 
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php echo wp_kses_post(''.esc_attr(date("Y")).' &copy; All rights reserved by <a target="_blank" rel="nofollow" href="https://themeforest.net/user/case-themes/portfolio">Case-Themes</a>'); ?>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>