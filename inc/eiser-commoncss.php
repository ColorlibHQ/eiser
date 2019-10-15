<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : Eiser
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function eiser_common_custom_css(){
    
    wp_enqueue_style( 'eiser-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = eiser_opt( 'eiser_theme_color' );

		$headerTop_bg     		  = eiser_opt( 'eiser_top_header_bg_color' );
		$headerTop_col     		  = eiser_opt( 'eiser_top_header_color' );

		$headerBg          		  = eiser_opt( 'eiser_header_bg_color' );
		$menuColor          	  = eiser_opt( 'eiser_header_menu_color' );
		$menuHoverColor           = eiser_opt( 'eiser_header_menu_hover_color' );

		$dropMenuBgColor          = eiser_opt( 'eiser_header_menu_dropbg_color' );
		$dropMenuColor            = eiser_opt( 'eiser_header_drop_menu_color' );
		$dropMenuHovColor         = eiser_opt( 'eiser_header_drop_menu_hover_color' );
		$dropMenuHovItemBg        = eiser_opt( 'eiser_drop_menu_item_hover_bg' );

		$geadertopColor           = eiser_opt( 'eiser_header_top_color' );

		$footerwbgColor     	  = eiser_opt('eiser_footer_widget_bdcolor');
		$footerwTextColor   	  = eiser_opt('eiser_footer_widget_textcolor');
		$footerwanchorcolor 	  = eiser_opt('eiser_footer_widget_anchorcolor');
		$footerwanchorhovcolor    = eiser_opt('eiser_footer_widget_anchorhovcolor');
		$widgettitlecolor  		  = eiser_opt('eiser_footer_widget_titlecolor');

		$preloaderbgcolor  	      = eiser_opt('eiser_preloader_bg_color');
		$preloaderbordercolor  	  = eiser_opt('eiser_preloader_color');

		$bttopbgcolor  	      = eiser_opt('eiser_backtotop_btn_bg_color');
		$bttophovbgcolor  	  = eiser_opt('eiser_backtotop_btn_hover_bg_color');

		$fofbg  	  		  = eiser_opt('eiser_fof_bg_color');
		$foftonecolor  	  	  = eiser_opt('eiser_fof_textone_color');
		$fofttwocolor  	  	  = eiser_opt('eiser_fof_texttwo_color');


		$customcss ="
			.global-page-title{
				{$header_bg_img}
			}
			.top_menu{
				background: {$headerTop_bg}
			}
			.top_menu .right_side li a,
			.top_menu .float-left p,
			.top_menu .float-left p a{
				color: {$headerTop_col}
			}

			.header_area .primary-menu {
			   background-color: {$headerBg};
			}
			.header_area .navbar .nav .nav-item .nav-link {
			   color: {$menuColor};
			}
			.header_area .navbar .nav .nav-item:hover .nav-link {
			   color: {$menuHoverColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul {
			   background: {$dropMenuBgColor};
			}
			.header_area .navbar .nav .nav-item.submenu > ul li a {
			   color: {$dropMenuColor};
			}
			.header_area .navbar .nav .nav-item.submenu > ul li:hover a,
			.header_area .navbar .nav .nav-item.submenu > ul li:focus a{
			   color: {$dropMenuHovColor};
			}
			.header_area .navbar .nav .nav-item.submenu > ul li:hover a{
				background: {$dropMenuHovItemBg}
			}

			.active,
			.header_area .navbar .icons:hover,
			.header_area .navbar .nav .nav-item:hover .nav-link,
			.header_area .navbar .nav .nav-item.active .nav-link,
			.top_menu .right_side li:hover a,
			.home_banner_area .banner_inner .banner_content h3 span,
			.banner_area .banner_inner .banner_content .page_link a:hover,
			.single-blog .meta-top a:hover,
			.single-blog:hover h4,
			.single-blog:hover .blog_btn,
			.l_blog_item .l_blog_text h4:hover,
			.causes_item .causes_text h4:hover,
			.blog_right_sidebar .post_category_widget .cat-list li:hover a,
			.blog_right_sidebar .widget_eiser_recent_widget .post_item .media-body h3:hover,
			.single-post-area .navigation-top .social-icons li:hover i,
			.single-post-area .navigation-top .social-icons li:hover span,
			.comments-area .btn-reply:hover,
			.wpcf7-form label,
			.sample-text-area p b,
			.sample-text-area p i,
			.sample-text-area p sup,
			.sample-text-area p u,
			.link-border,
			.main_btn:hover,
			.main_btn2:hover,
			.submit_btn:hover,
			.single-product:hover .product-btm h4,
			.s_product_text h2,
			.s_product_text .list li a.active,
			.product_description_area .tab-content .total_rate .box_total h4,
			.check_title h2 a,
			.billing_details .contact_form .form-group .creat_account a,
			.order_box .creat_account a,
			.footer-area .footer-bottom a,
			.footer-area .footer-bottom span,
			.widget_price_filter .price_slider_amount button.button:hover,
			.blog_right_sidebar .widget_categories ul li:hover a,
			.blog_right_sidebar .widget_rss ul li:hover a,
			.blog_right_sidebar .widget_recent_entries ul li:hover a,
			.blog_right_sidebar .widget_recent_comments ul li:hover a,
			.blog_right_sidebar .widget_archive ul li:hover a,
			.blog_right_sidebar .widget_meta ul li:hover a
			{
				color: {$themeColor}
			}			

			.header_area .navbar .nav .nav-item.submenu ul .nav-item:hover > .nav-link,
			.top_menu .ac_btn:hover,
			.top_menu .dn_btn,
			.causes_slider .owl-dots .owl-dot.active,
			.causes_item .causes_img .c_parcent span,
			.causes_item .causes_img .c_parcent span:before,
			.causes_item .causes_bottom a,
			.tags .tag_btn:before,
			.blog_item_img .blog_item_date,
			.blog_right_sidebar .tag_cloud_widget ul li a:hover,
			.link-border:before,
			.main_btn,
			.main_btn2,
			.submit_btn,
			.white_bg_btn:hover,
			.single-product .product-img .p_icon a:hover,
			.l_w_title h3::after,
			.p_filter_widgets ul li.active a:before,
			.p_filter_widgets ul li:hover a:before,
			.p_filter_widgets .range_item .ui-slider .ui-slider-handle,
			.product_description_area .nav.nav-tabs li a.active,
			.review_item .media .media-body .reply_btn:hover,
			.cart_inner .table tbody tr.shipping_area .shipping_box .list li a:after,
			.tp_btn:hover,
			.order_box .payment_item.active h4:before,
			.radion_btn input[type='radio']:checked ~ .check,
			.footer-area .single-footer-widget .click-btn,
			.footer-area .footer-bottom .footer-social a:hover,
			.widget_price_filter .ui-slider .ui-slider-handle,
			.widget_price_filter .price_slider_amount button.button,
			.nav-item.dropdown .icons .cart,
			.single-product .product-img .p_icon:before
			{
				background: {$themeColor}
			}

			.top_menu .ac_btn:hover,
			.top_menu .dn_btn,
			.top_menu .dn_btn:hover,
			.causes_item .causes_bottom a,
			.single-post-area .quotes,
			.link-border,
			.main_btn,
			.main_btn2,
			.submit_btn,
			.white_bg_btn:hover,
			.p_filter_widgets ul li.active a:before,
			.p_filter_widgets ul li:hover a:before,
			.product_description_area .nav.nav-tabs li a.active,
			.review_item .media .media-body .reply_btn:hover,
			.tp_btn:hover,
			.order_box .payment_item.active h4:before,
			.radion_btn input[type='radio']:checked ~ .check,
			.widget_price_filter .price_slider_amount button.button
			{
				border-color: {$themeColor}
			}





			.header__search-trigger::before,
			.header__social a {
			    color: {$geadertopColor};
			}
			#preloader {
				background-color: {$preloaderbgcolor}
    		}
			.line-scale > div {
			   background-color: {$preloaderbordercolor};
			}
			.go-top a, 
			.go-top a:visited {
			   background-color: {$bttopbgcolor};
			}
			.go-top a:hover, 
			.go-top a:focus {
			   background-color: {$bttophovbgcolor};
			}
			.s-footer {
				background-color: {$footerwbgColor};
			}
			.s-footer,
			abbr {
				color: {$footerwTextColor}
			}
			.s-footer__main h4 {
				color: {$widgettitlecolor}
			}
			footer a {
			   color: {$footerwanchorcolor};
			}
			footer a:hover {
			   color: {$footerwanchorhovcolor};
			}
			#f0f {
			   background-color: {$fofbg};
			}
			.f0f-content .h1 {
			   color: {$foftonecolor};
			}
			.f0f-content p {
			   color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'eiser-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'eiser_common_custom_css', 50 );