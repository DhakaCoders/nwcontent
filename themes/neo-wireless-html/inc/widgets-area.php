<?php 

function deploy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar widget one', 'demula' ),
		'id'            => 'sidebar-widget-one',
		'description'   => __( 'Add widgets here to appear in your job single page.', 'demula' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Navigation', 'demula' ),
		'id'            => 'footer-widget-nav',
		'description'   => __( 'Add widgets here to appear in your footer navigation.', 'demula' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'deploy_widgets_init' );
