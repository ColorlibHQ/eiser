<?php
/*
* WooCommerce  Support Function
*/

add_image_size( 'woo_product_gallery_thum', 60, 60, true );
add_image_size( 'gallery_images', 550, 600, true );
add_image_size( 'eiser_featured_product_thum', 360, 430, true );
add_image_size( 'eiser_out_product_thum', 500, 200, true );
add_image_size( 'eiser_out_product', 300, 300, true );


// Related Product Remove Hook
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );



// WooCommerce Shop Page Title Show/Hide
add_filter( 'woocommerce_show_page_title', 'eiser_hide_page_title' );
function eiser_hide_page_title( $title ) {

	if ( ! eiser_opt( 'eiser-woo-shoppage-title-settings' ) ) {
		$title = false;
	} else {
		$title = true;
	}

	return $title;
}


// Product Per Page
add_filter( 'loop_shop_per_page', 'eiser_loop_shop_per_page', 20 );
function eiser_loop_shop_per_page( $cols ) {

	// Return the number of products you wanna show per page.
	if ( eiser_opt( 'eiser_woo_product_perpage' ) ) {
		$num = eiser_opt( 'eiser_woo_product_perpage' );
	} else {
		$num = 10;
	}

	$cols = absint( $num );

	return $cols;
}

// related products number
add_filter( 'woocommerce_output_related_products_args', 'eiser_change_number_related_products', 9999 );

function eiser_change_number_related_products( $args ) {

	$number = 3;

	if ( eiser_opt( 'eiser_related_product_number' ) ) {
		$number = eiser_opt( 'eiser_related_product_number' );
	}

	$args['posts_per_page'] = absint( $number ); // # of related products

	return $args;
}


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
function eiser_single_product_meta() { 
   global $product;
   $availability = $product->get_stock_quantity();
   $stock = !empty( $availability ) ? $availability . esc_html__( ' In Stock', 'eiser' ) : esc_html__( 'Out Of Stock', 'eiser' );
   ?>
   <ul class="list">
      	<?php do_action( 'woocommerce_product_meta_start' ); ?>
		<li>
			<?php
			$cat_id = count( $product->get_category_ids() );
			$cat_label = $cat_id > 1 ? 'Categories' : 'Category';
			echo '<span>'.esc_html__( $cat_label, 'eiser' ).'</span>: ' . wc_get_product_category_list( $product->get_id() );       	
			?>
		</li>
		<li><span>Availibility</span>: <?php echo wp_kses_post( $stock ); ?></li>

		<?php
      do_action( 'woocommerce_product_meta_end' ); ?>
   	</ul>
<?php
};     
add_action( 'woocommerce_single_product_summary', 'eiser_single_product_meta', 10 );



/*==============================================
*  WooCommerce Comments Review Section
*/

function eiser_woocommerce_comments($comment, $args, $depth) {
	global $product;
   	$GLOBALS['comment'] = $comment;
   	extract($args, EXTR_SKIP);
   	?>
   	<div id="comment-<?php comment_ID() ?>" class="review_item">
      <div class="media">
         <?php 
         if(get_avatar($comment)) {
            echo '<div class="d-flex">';
            echo get_avatar($comment, 70);
            echo '</div>';
         } ?>

         <div class="media-body">
            <h4><?php comment_author(); ?></h4>
			<?php
			$starVal = get_comment_meta( $comment->comment_ID, 'rating', true );
            
            if (!empty( $starVal )) {
                  echo '<div class="star">';
                  for ($i = 1; $i <= 5; $i++) {

                     if ($starVal >= $i) {
                        echo '<span class="fa fa-star"></span>';
                     } else {
                        echo '<span class="fa fa-star-o"></span>';
                     }
                  }
                  echo '</div>';
			} 
			
			// echo '<pre>';
			// print_r( woocommerce_review_display_rating() );
			// echo '</pre>';
			 
            ?>
         </div>
      </div>
      <p><?php woocommerce_review_display_comment_text() ?></p>
   </div>

   <?php
}


/**====================================
 *  Home Page Our Product Section
 */

 function eiser_featured_products( $postnumber = '3' ){ 

   $args = array(
       'post_type' => 'product',
	   'posts_per_page' => absint( $postnumber )
	//    'post__in'	=>  array( $product_IDs ) 
    );
   $loop = new WP_Query( $args );

   if ( $loop->have_posts() ) {
              
      	while ( $loop->have_posts() ) {
			$loop->the_post(); 
			
			?>

				<div class="col-lg-4 col-md-6">
					<div class="single-product single-item-product">
						<div class="product-img">
						<?php echo woocommerce_get_product_thumbnail( 'eiser_featured_product_thum' ) ?>
							<div class="p_icon justify-content-center">
							<a href="<?php the_permalink(); ?>">
								<i class="ti-eye"></i>
							</a>
							<?php 
								// Wishlist ShortCode
								echo shortcode_exists('ti_wishlists_addtowishlist') ? do_shortcode('[ti_wishlists_addtowishlist]') : '';
								
								//Add To Cart Button
								woocommerce_template_loop_add_to_cart();
							?>
							</div>
						</div>
						<div class="product-btm">
							<a href="<?php the_permalink(); ?>" class="d-block">
							<h4><?php the_title(); ?></h4>
							</a>
							<div class="mt-3">
								<?php woocommerce_template_loop_price(); ?>
							
							</div>
						</div>
					</div>
				</div>

			<?php
      	}
		
  	wp_reset_postdata();

	}else {
		echo esc_html__( 'No feature product found', 'eiser' );
	}
}


// function product_list() {
// 	$all_ids = get_posts( array(
// 			'post_type' => 'product',
// 			'numberposts' => -1,
// 			'post_status' => 'publish',
			
// 	) );
// 	$p_id[] = '';
// 	foreach ( $all_ids as $key => $val ) {
// 		$key = $val->ID;

// 		// echo '<pre>';
// 		// print_r( $key );
// 		// echo '</pre>';

// 		$p_id[] .= '"'. $key .'" => "'. $val->post_title .'"';
		
	
// 	}

// 	return $p_id;

// }


    // Our Product section
    function eiser_our_product( $postnumber ){
       	  
		// setup query
		$args = array(
			'post_type'             => 'product',
			'post_status'           => 'publish',
			'posts_per_page'        => esc_html( $postnumber ),         

		);
		$loop = new WP_Query( $args );

      
	if ( $loop->have_posts() ) {
		$i = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
			if( $i == 0 ){ ?>
				<div class="col-lg-6">
					<div class="new_product">
						<h5 class="text-uppercase"><?php echo esc_html__( 'collection of ', 'eiser' ); the_time( 'Y' ) ?></h5>
						<h3 class="text-uppercase"><?php the_title(); ?></h3>
						<div class="product-img">
							<?php echo woocommerce_get_product_thumbnail( 'eiser_out_product_thum', array( 'class' => 'img-fluid' ) ) ?>
						</div>
						<h4><?php woocommerce_template_loop_price(); ?></h4>
						<a href="?add-to-cart=<?php echo get_the_ID() ?>" class="main_btn">
							<?php echo esc_html__( 'Add to cart', 'eiser' ); ?>
						</a>
						
					</div>
				</div>
				<?php
			}
			$i++;
		endwhile;
		wp_reset_query();
	}	?>
		<div class="col-lg-6 mt-5 mt-lg-0">
			<div class="row">
				<?php
				if( $loop->have_posts() ){
					$i = 0;
					while( $loop->have_posts() ){
						$loop->the_post();
						if( $i == 0 ){
							$i++;
							continue;
						} ?>
						<div class="col-lg-6 col-md-6">
							<div class="single-product single-item-product">
								<div class="product-img">
									<?php echo woocommerce_get_product_thumbnail( 'eiser_out_product', array( 'class' => 'img-fluid w-100' ) ) ?>
									<div class="p_icon justify-content-center">
										<a href="<?php the_permalink(); ?>"><i class="ti-eye"></i></a>
										<?php 
											// Wishlist ShortCode
											echo shortcode_exists('ti_wishlists_addtowishlist') ? do_shortcode('[ti_wishlists_addtowishlist]') : '';
											
											//Add To Cart Button
											woocommerce_template_loop_add_to_cart();
										?>
									</div>
								</div>
								<div class="product-btm">
									<a href="<?php the_permalink(); ?>" class="d-block">
										<h4><?php the_title(); ?></h4>
									</a>
									<div class="mt-3">
										<?php woocommerce_template_loop_price(); ?>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					}
					wp_reset_query();
				}
				?>											
			</div>
		</div>
      <?php

  }

  
// Popular Product section
function eiser_popular_product( $postnumber ){
		
	// setup query
	$args = array(
		'post_type' 		=> 'product',
        'post_status' 		=> 'publish',
        'ignore_sticky_posts'=> 1,
        'posts_per_page'     => esc_html( $postnumber ), 
        'fields' 			 => 'ids',
        'meta_key' 			 => 'total_sales',
        'orderby' 			 => 'meta_value_num',
        'meta_query' 		 => WC()->query->get_meta_query()	       

	);
	$loop = new WP_Query( $args );

      
	if ( $loop->have_posts() ) {
		while( $loop->have_posts() ){
			$loop->the_post(); ?>
				<div class="col-lg-3 col-md-6">
                <div class="single-product single-item-product">
                    <div class="product-img">
						<?php echo woocommerce_get_product_thumbnail( 'eiser_out_product', array( 'class' => 'img-fluid w-100' ) ) ?>
                        <div class="p_icon justify-content-center">
							<a href="<?php the_permalink(); ?>"><i class="ti-eye"></i></a>
							<?php 
								// Wishlist ShortCode
								echo shortcode_exists('ti_wishlists_addtowishlist') ? do_shortcode('[ti_wishlists_addtowishlist]') : '';
								
								//Add To Cart Button
								woocommerce_template_loop_add_to_cart();
							?>
						</div>
                    </div>
                    <div class="product-btm">
						<a href="<?php the_permalink(); ?>" class="d-block">
							<h4><?php the_title(); ?></h4>
						</a>
						<div class="mt-3">
							<?php woocommerce_template_loop_price(); ?>
						</div>
                    </div>
                </div>
            </div>
			<?php
		}
	}

}

//Remove Cross-sells hook from 'woocommerce_cart_collaterals'
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );