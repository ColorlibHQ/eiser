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

	//  Call Header

    get_header( 'shop' );



if ( have_posts() ) {
    // Woocommerce Content
    woocommerce_content();
}


    // Call Footer
	 get_footer( 'shop' );