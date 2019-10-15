<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<?php 
			$a = 0;
			foreach ( $tabs as $key => $tab ) :
				
				$active = $a === 0 ? ' active' : '';
				$a++;
				?>
			<li class="nav-item">
				<a
				class="nav-link <?php echo esc_attr( $key ) . esc_attr( $active ) ?>"
				id="<?php echo esc_attr( $key ); ?>"
				data-toggle="tab"
				href="#tab_<?php echo esc_attr( $key ); ?>"
				role="tab"
				aria-controls="<?php echo esc_attr( $key ); ?>"
				aria-selected="true"
				><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
		<div class="tab-content" id="myTabContent">
			<?php 
			$b = 0;
			foreach ( $tabs as $key => $tab ) : 
			$active = $b === 0 ? ' active show' : '';
			$b++; ?>
			<div
			class="tab-pane fade <?php echo esc_attr( $active ) ?>"
			id="tab_<?php echo esc_attr( $key ); ?>"
			role="tabpanel"
			aria-labelledby="home-tab">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
			</div>
			
			<?php endforeach; ?>
		</div>

<?php endif; ?>
