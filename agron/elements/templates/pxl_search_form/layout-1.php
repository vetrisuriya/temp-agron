<?php
$search_icon = $widget->get_setting('search_icon', []);
?>
<div class="search-form-wrap">
	<button class="pxl-button-popup">
		<div class="pxl-button-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
				<path d="M16.5281 15.2321L20.4539 19.1579L19.1575 20.4542L15.2317 16.5284C13.8202 17.6578 12.03 18.3333 10.083 18.3333C5.52901 18.3333 1.83301 14.6373 1.83301 10.0833C1.83301 5.52934 5.52901 1.83334 10.083 1.83334C14.637 1.83334 18.333 5.52934 18.333 10.0833C18.333 12.0303 17.6574 13.8205 16.5281 15.2321ZM14.689 14.5519C15.8099 13.3967 16.4997 11.821 16.4997 10.0833C16.4997 6.53813 13.6282 3.66668 10.083 3.66668C6.5378 3.66668 3.66634 6.53813 3.66634 10.0833C3.66634 13.6286 6.5378 16.5 10.083 16.5C11.8206 16.5 13.3964 15.8102 14.5516 14.6893L14.689 14.5519Z" fill="currentcolor"/>
			</svg>
		</div>
	</button>
	<form role="search" method="get" class="pxl-search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
		<div class="search-form-control">
			<input autocomplete="off" type="text" placeholder="<?php echo esc_html__('Search anything...', 'agron'); ?>" name="s" class="search-field" />
			<button type="submit" class="search-submit">
				<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
					<path d="M16.5281 15.2321L20.4539 19.1579L19.1575 20.4542L15.2317 16.5284C13.8202 17.6578 12.03 18.3333 10.083 18.3333C5.52901 18.3333 1.83301 14.6373 1.83301 10.0833C1.83301 5.52934 5.52901 1.83334 10.083 1.83334C14.637 1.83334 18.333 5.52934 18.333 10.0833C18.333 12.0303 17.6574 13.8205 16.5281 15.2321ZM14.689 14.5519C15.8099 13.3967 16.4997 11.821 16.4997 10.0833C16.4997 6.53813 13.6282 3.66668 10.083 3.66668C6.5378 3.66668 3.66634 6.53813 3.66634 10.0833C3.66634 13.6286 6.5378 16.5 10.083 16.5C11.8206 16.5 13.3964 15.8102 14.5516 14.6893L14.689 14.5519Z" fill="currentcolor"/>
				</svg>
			</button>
		</div>
	</form>
</div>
