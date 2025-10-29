<?php
/**
 * @package Case-Themes
 */
$smooth_scroll = agron()->get_opt('smooth_scroll', 'off');  
// Back To Top
$button_back_to_top = agron()->get_theme_opt('button_back_to_top', true);
?>
		</main><!-- #main -->
		<?php agron()->footer->getFooter(); ?>
		<?php if($smooth_scroll === 'on') : ?>
			</div>
				</div>
		<?php endif; 
		if ($button_back_to_top) : ?>
			<a class="back-to-top-button" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
					<path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
				</svg>
			</a>
		<?php endif; 
		do_action( 'pxl_anchor_target') ?>
		</div><!-- #wapper -->
	<?php wp_footer(); ?>
	</body>
</html>
