<?php 
/**
 * @Packge 	   : Eiser
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Eiser{

		
		// Theme Version
		private $eiser_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			$this->customizer_init();
			
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new eiser_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->eiser_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'eiser_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'eiser', EISER_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 40,
				'width'       => 140,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 200,
			) );
			
			// Support WooCommerce
			add_theme_support( 'eiser' );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
			
			// Latest post thumbnail Widget thumbnail size
			add_image_size( 'eiser_widget_post_thumb', 70, 70, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   => esc_html__( 'Primary Menu', 'eiser' ),
	            'social-menu'    => esc_html__( 'Social Menu', 'eiser' ),
	            'header_top_menu'=> esc_html__( 'Header Top Menu', 'eiser' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = EISER_DIR_CSS_URI;
			$jsPath  = EISER_DIR_JS_URI;
			$apiKey	 = eiser_opt('eiser_gmap_api_key');
			

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'eiser-theme-google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'eiser-theme-bootstrap',
						'file' 			=> $cssPath.'bootstrap.css',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-5',
					),
					array(
						'handler'		=> 'eiser-theme-font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '7.3.1-1',
					),
					array(
						'handler'		=> 'eiser-theme-themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'eiser-theme-flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0-s3',
					),
					array(
						'handler'		=> 'eiser-theme-owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'simpleLightbox',
						'file' 			=> $cssPath.'simpleLightbox.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'eiser-theme-nice-select',
						'file' 			=> $cssPath.'nice-select.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'eiser-theme-animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'eiser-theme-jquery-ui',
						'file' 			=> $cssPath.'jquery-ui.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'eiser-theme-default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> $this->eiser_version,
					),
					array(
						'handler'		=> 'eiser-theme-main',
						'file' 			=> $cssPath.'main.css',
						'dependency' 	=> array(),
						'version' 		=> $this->eiser_version . '-s3',
					),
					array(
						'handler'		=> 'eiser-theme-responsive',
						'file' 			=> $cssPath.'responsive.css',
						'dependency' 	=> array(),
						'version' 		=> $this->eiser_version,
					),
					array(
						'handler'		=> 'eiser-theme-eiser-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'eiser-theme-bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-4',
						'in_footer' 	=> true
					),
					
					array(
						'handler'		=> 'eiser-ui-js',
						'file' 			=> $jsPath . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'colorlib-ui.js' : 'colorlib-ui.min.js' ),
						'dependency' 	=> array(),
						'version' 		=> '3.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'eiser-theme-eiser-main',
						'file' 			=> $jsPath.'main.js',
						'dependency' 	=> array( 'imagesloaded', 'eiser-ui-js' ),
						'version' 		=> $this->eiser_version . '-s3',
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 



		// Google Font  
		private function google_font(){
			$font_url = '';

			/*
			 * The families this theme uses are bundled under
			 * assets/fonts/google, so nothing is fetched from Google and
			 * no request leaves the visitor's browser for a third party.
			 *
			 * Translators can still turn the fonts off for scripts these
			 * families do not cover.
			 */
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'eiser' ) ) {
				$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
			}

			return esc_url_raw( $font_url );
		} //End google_font method

		private function customizer_init(){

		
			

			
			// Instantiate eiser theme customizer
			$eiser_theme_customizer = new eiser_theme_customizer();
		}
	} // End Eiser Class

?>