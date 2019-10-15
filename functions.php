<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'EISER_DIR_URI' ) )
		define( 'EISER_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'EISER_DIR_ASSETS_URI' ) )
		define( 'EISER_DIR_ASSETS_URI', EISER_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'EISER_DIR_CSS_URI' ) )
		define( 'EISER_DIR_CSS_URI', EISER_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'EISER_DIR_JS_URI' ) )
		define( 'EISER_DIR_JS_URI', EISER_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('EISER_DIR_ICON_IMG_URI') )
		define( 'EISER_DIR_ICON_IMG_URI', EISER_DIR_URI.'img/core-img/' );
	
	//DIR inc
	if( !defined( 'EISER_DIR_INC' ) )
		define( 'EISER_DIR_INC', EISER_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'EISER_DIR_ELEMENTOR' ) )
		define( 'EISER_DIR_ELEMENTOR', EISER_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'EISER_DIR_PATH' ) )
		define( 'EISER_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'EISER_DIR_PATH_INC' ) )
		define( 'EISER_DIR_PATH_INC', EISER_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'EISER_DIR_PATH_LIB' ) )
		define( 'EISER_DIR_PATH_LIB', EISER_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'EISER_DIR_PATH_CLASSES' ) )
		define( 'EISER_DIR_PATH_CLASSES', EISER_DIR_PATH_INC.'classes/' );
	
	//Hooks Folder Directory
	if( !defined( 'EISER_DIR_PATH_HOOKS' ) )
		define( 'EISER_DIR_PATH_HOOKS', EISER_DIR_PATH_INC.'hooks/' );
	
	//Widgets Folder Directory
	if( !defined( 'EISER_DIR_PATH_WIDGET' ) )
		define( 'EISER_DIR_PATH_WIDGET', EISER_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'EISER_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'EISER_DIR_PATH_ELEMENTOR_WIDGETS', EISER_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( EISER_DIR_PATH_INC . 'eiser-breadcrumbs.php' );
	// Sidebar register file include
	require_once( EISER_DIR_PATH_INC . 'eiser-widgets-reg.php' );
	// Post widget file include
	require_once( EISER_DIR_PATH_INC . 'popular-post-widget.php' );
	// News letter widget file include
	require_once( EISER_DIR_PATH_INC . 'eiser-newsletter-widget.php' );
	// Nav walker file include
	require_once( EISER_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( EISER_DIR_PATH_INC . 'eiser-functions.php' );
	// Inline css file include
	require_once( EISER_DIR_PATH_INC . 'eiser-commoncss.php' );
	// Post Like
	require_once( EISER_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( EISER_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( EISER_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( EISER_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( EISER_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( EISER_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	require_once( EISER_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( EISER_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( EISER_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class eiser dashboard
	require_once( EISER_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


	if( class_exists( 'WooCommerce' ) ){
		// WooCommerce Function
		require_once( EISER_DIR_PATH_INC . 'eiser_woocommerce_function.php' );
	}
	

	// Admin Enqueue Script
	function eiser_admin_script(){
		wp_enqueue_style( 'eiser-admin', get_template_directory_uri().'/assets/css/eiser_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'eiser_admin', get_template_directory_uri().'/assets/js/eiser_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'eiser_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );




	/**
	 * Instantiate Eiser object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Eiser Dashboard .
	 *
	 */
	
	$Eiser = new Eiser();
	
