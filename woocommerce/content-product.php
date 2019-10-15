<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}


?>
<div class="col-lg-4 col-md-6">
	<div class="single-product single-item-product">
		<div class="product-img">
		<?php
		if( is_shop() ){
			woocommerce_template_loop_product_thumbnail();
		}else {
			echo woocommerce_get_product_thumbnail( 'eiser_featured_product_thum' );
		}
		 ?>
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