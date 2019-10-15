<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <!-- Theme Option opt -->
    <?php 
    global $woocommerce; ?>

    <!-- start Header Area -->
    <header class="header_area">
        <?php
        $phone = !empty( eiser_opt( 'eiser_top_phone' ) ) ? eiser_opt( 'eiser_top_phone' ) : '';
        $email = !empty( eiser_opt( 'eiser_top_email' ) ) ? eiser_opt( 'eiser_top_email' ) : '';

        if( $phone || $email ){
        ?>
        <div class="top_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="float-left">
                            <?php
                            $phone = !empty( eiser_opt( 'eiser_top_phone' ) ) ? eiser_opt( 'eiser_top_phone' ) : '';
                            $email = !empty( eiser_opt( 'eiser_top_email' ) ) ? eiser_opt( 'eiser_top_email' ) : '';
                            if( $phone ){
                                echo '<p>Phone: <a href="tel:'. $phone .'">'.esc_html( $phone ).'</a></p>';
                            }
                            
                            if( $email ){
                                echo '<p>email: <a href="mailto:'. $email .'">'.esc_html( $email ).'</a></p>';
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-lg-5">
                        <div class="float-right">
                            <?php
                            if(has_nav_menu('header_top_menu')) {
                                wp_nav_menu( array(
                                    'theme_location'    => 'header_top_menu',
                                    'menu_class'        => 'right_side'
                                ) );
                            }
                            ?>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
        <?php
        } ?>
        <div class="primary-menu">
            <div class="container primary_menu_container">
                <nav class="navbar navbar-expand-lg navbar-light w-100">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="logo_wrap">
                        <?php
                        echo eiser_theme_logo( 'navbar-brand logo_h' );
                        ?>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                        <div class="row w-100 mr-0">
                            <div class="col-lg-10 pr-0">
	                            <?php
	                            if(has_nav_menu('primary-menu')) {
		                            wp_nav_menu(array(
			                            'menu' => 'primary-menu',
			                            'theme_location' => 'primary-menu',
			                            'menu_id'   => 'menu-main-menu',
			                            'menu_class' => 'nav navbar-nav center_nav pull-right',
			                            'walker'    => new eiser_bootstrap_navwalker,
			                            'depth' => 3
		                            ));
	                            }
	                            ?>
                            </div>

                            <div class="col-lg-2 pr-0">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                    <?php
                                    $searchIcon = eiser_opt( 'eiser_hsearchform_toggle' );
                                    if( $searchIcon == 1 ){ ?>
                                        <li class="nav-item">
                                            <a href="#" class="search_icon icons">
                                                <i class="ti-search" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                     
                                    if(class_exists('WooCommerce')) { ?>
                                        <li class="nav-item dropdown show">
                                            <a class="dropdown-toggle icons" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-shopping-cart"></i>    
                                                <span class="cart">
                                                    <?php echo esc_html($woocommerce->cart->cart_contents_count); ?>
                                                </span>
                                            
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <?php
                                                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                                                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                                                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                                                        ?>
                                                        <li class="cart-single-item clearfix">
                                                            <div class="cart-img">
                                                                <?php
                                                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                                                if (!$product_permalink) {
                                                                    echo wp_kses_post($thumbnail);
                                                                } else {
                                                                    printf('<a href="%s">%s</a>', esc_url($product_permalink), wp_kses_post($thumbnail));
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="cart-content text-left">
                                                                <p class="cart-title">
                                                                    <?php
                                                                    if (!$product_permalink) {
                                                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                                                    } else {
                                                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                                                    }

                                                                    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                                                    // Meta data.
                                                                    echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                                                                    // Backorder notification.
                                                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'eiser') . '</p>'));
                                                                    }
                                                                    ?>
                                                                </p>
                                                                <p> <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
                                                                    <?php if (!empty($cart_item['quantity'])) : ?>
                                                                        <span class="item-qty"> x <?php echo esc_html($cart_item['quantity']) ?> </span>
                                                                    <?php endif; ?>
                                                                </p>
                                                            </div>
                                                            <div class="cart-remove">
                                                                <?php
                                                                // @codingStandardsIgnoreLine
                                                                echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                                    '<a href="%s" class="remove action" aria-label="%s" data-product_id="%s" data-product_sku="%s"><span class="ti-close"></span></a>',
                                                                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                                    esc_html__('Remove this item', 'eiser'),
                                                                    esc_attr($product_id),
                                                                    esc_attr($_product->get_sku())
                                                                ), $cart_item_key);
                                                                ?>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <li class="cart_f">
                                                    <div class="cart-pricing">
                                                        <p class="total">
                                                            <?php esc_html_e('Subtotal :', 'eiser') ?>
                                                            <span class="p-total text-right"> <?php wc_cart_totals_order_total_html(); ?> </span>
                                                        </p>
                                                    </div>
                                                    <div class="cart-button text-center">
                                                        <a href="<?php echo wc_get_cart_url() ?>"
                                                        class="view_cart_btn"> <?php esc_html_e('View Cart', 'eiser') ?> </a>
                                                        <a href="<?php echo wc_get_checkout_url() ?>"
                                                        class="main_btn check_out_btn"> <?php esc_html_e('Checkout', 'eiser') ?> </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                    } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <?php
                if( $searchIcon == 1 ){ ?>
                    <div class="header_search">
                        <div class="col-lg-12">
                            <?php
                            get_search_form();
                            ?>
                        </div>
                        
                    </div>
                    <?php 
                } ?>
            </div>
        </div>
    </header>

    <?php
    if(! is_page_template( 'template-builder.php') ) {
	    ?>
        <section class="banner_area global-page-title">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
						    <?php
						    $subTitle     = get_post_meta( get_the_ID(), 'subtitle_input_meta', true );
						    $postSubTitle = get_post_meta( get_the_ID(), 'postSubtitle_input_meta', true );
						    $postSubT     = ! empty( $postSubTitle ) ? '<p>' . esc_html( $postSubTitle ) . '</p>' : '';

						    if ( is_category() ) {
							    single_cat_title( '<h2>Category: ', '</h2>' );
						    } elseif ( is_tag() ) {
							    single_tag_title( '<h2>Tag Archive for &quot;' );
							    echo '&quot</h2>';

						    } elseif ( is_archive() ) {
							    echo '<h2>' . get_the_archive_title() . '</h2>';

						    } elseif ( is_page() ) {
							    echo '<h2>' . get_the_title() . '</h2>';
							    echo '<p>' . esc_html( $subTitle ) . '</p>';

						    } elseif ( is_search() ) {
							    echo '<h2>' . esc_html__( 'Search for: ', 'eiser' ) . get_search_query() . '</h2>';

						    } elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
							    echo '<h2>' . get_the_title() . '</h2>';
							    echo wp_kses_post( $postSubT );

						    } elseif ( is_home() ) {
							    echo '<h2>' . esc_html__( 'Blog', 'eiser' ) . '</h2>';

						    } elseif ( is_404() ) {
							    echo esc_html__( '404 error', 'eiser' );

						    }

						    ?>

                        </div>

            

                        <div class="page_link">
                        <?php
                        if( function_exists( 'eiser_breadcrumbs' ) ){
                            eiser_breadcrumbs();
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	    <?php
    }
