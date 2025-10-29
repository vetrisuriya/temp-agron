<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Agron_Admin_Templates extends Agron_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'agron' ),
		    esc_html__( 'Templates', 'agron' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Agron_Admin_Templates;
