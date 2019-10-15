<?php
/**
 * Template Name: Cart page
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
	get_header();
?>

<section class="cart_area">
    <div class="container">
        <?php
            if( have_posts() ){
                while( have_posts() ){
                    the_post();
                    the_content();
                }

            }
        ?>
    </div>
</section>
	
<?php
	 // Call Footer
	 get_footer();
