<?php 
/**
 * @Packge     : Eiser
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/
// Header top background color
Epsilon_Customizer::add_field(
    'eiser_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_general_section',
        'default'     => '#71cd14',
    )
);

/***********************************
 * Header Section Fields =====================================
 ***********************************/
//Header Top
Epsilon_Customizer::add_field(
    'header_top_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Top', 'eiser' ),
        'section'     => 'eiser_header_section',
        
    )
);
// Header top phone number
Epsilon_Customizer::add_field(
    'eiser_top_phone',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Phone Number', 'eiser' ),
        'description' => esc_html__( 'Empty field would be display none', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => esc_html__( '+0123 456 789', 'eiser' ),
    )
);
// Header top email
Epsilon_Customizer::add_field(
    'eiser_top_email',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Email Address', 'eiser' ),
        'description' => esc_html__( 'Empty field would be display none', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => esc_html__( 'info@eiser.com', 'eiser' ),
    )
);
// Header top background color
Epsilon_Customizer::add_field(
    'eiser_top_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Top Background Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#f6f6f6',
    )
);
// Header top background color
Epsilon_Customizer::add_field(
    'eiser_top_header_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Top Text Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#4a4a4a',
    )
);

// Header navbar============================================
Epsilon_Customizer::add_field(
    'header_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Navbar', 'eiser' ),
        'section'     => 'eiser_header_section',
        
    )
);

// Header search form toggle field
Epsilon_Customizer::add_field(
    'eiser_hsearchform_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Show header search form', 'eiser' ),
        'description' => esc_html__( 'Toggle to show header search form.', 'eiser' ),
        'section'     => 'eiser_header_section',
        'default'     => true,
    )
);

// Header background color field
Epsilon_Customizer::add_field(
    'eiser_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'eiser' ),
        'description' => esc_html__( 'Select the header background color.', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#fff',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'eiser_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#2a2a2a',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'eiser_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#71cd14',
    )
);
// Header menu dropdown background color field
Epsilon_Customizer::add_field(
    'eiser_header_menu_dropbg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu dropdown background color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#fff',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'eiser_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#2a2a2a',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'eiser_drop_menu_item_hover_bg',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu item hover background', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#71cd14',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'eiser_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_header_section',
        'default'     => '#ffffff',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'eiser_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'eiser' ),
        'description' => esc_html__( 'Set post excerpt length.', 'eiser' ),
        'section'     => 'eiser_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'eiser_blog_layout',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'eiser' ),
        'section'  => 'eiser_blog_section',
        'description' => esc_html__( 'Select the option to set blog page layout.', 'eiser' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
// Blog single page like button
Epsilon_Customizer::add_field(
    'eiser_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single page link button', 'eiser' ),
        'section'     => 'eiser_blog_section',
        'default'     => false
    )
);
// Blog single page social share icon
Epsilon_Customizer::add_field(
    'eiser_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog post social share icon', 'eiser' ),
        'section'     => 'eiser_blog_section',
        'default'     => false
    )
);



/***********************************
 * About Section Fields
 ***********************************/

// About page top title field
Epsilon_Customizer::add_field(
    'eiser_about_top_title',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'About page top title', 'eiser' ),
        'section'           => 'eiser_about_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Learn More About Us.', 'eiser' )
    )
);
// About info block content field
Epsilon_Customizer::add_field(
    'eiser_about_infoblock',
    array(
        'type'         => 'epsilon-repeater',
        'section'      => 'eiser_about_section',
        'label'        => esc_html__( 'About info block content', 'eiser' ),
        'button_label' => esc_html__( 'Add new block', 'eiser' ),
        'row_label'    => array(
            'type'  => 'field',
            'field' => 'info_title',
            ),
        'fields'       => array(
            'info_title'       => array(
                'label'             => esc_html__( 'Title', 'eiser' ),
                'type'              => 'text',
                'default'           => esc_html__( 'Who We Are.', 'eiser' ),
            ),
            'info_desc'        => array(
                'label'             => esc_html__( 'Descriptions', 'eiser' ),
                'type'              => 'epsilon-text-editor',
                'default'           => 'Write something....',
            ),
        ),
    )
);

/***********************************
 * Contact Section Fields
 ***********************************/

// Contact page top title field
Epsilon_Customizer::add_field(
    'eiser_contact_top_title',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Contact page top title', 'eiser' ),
        'section'           => 'eiser_contact_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Feel Free To Contact Us.', 'eiser' )
    )
);

// Google map marker
$wp_customize->add_setting( 'eiser_map_marker' , array(
    'default'               =>  esc_url( EISER_DIR_URI . '/img/icon-location@2x.png' ),
    'transport'             => 'refresh', // refresh or postMessage
    'capability'            => 'edit_theme_options',
    'sanitize_callback'     => 'eiser_theme_customizer::eiser_sanitize_image'
) );

$wp_customize->add_control(
   new WP_Customize_Image_Control( $wp_customize, 'google_map_marker_img',
       array(
           'label'      => esc_html__( 'Upload map marker image', 'eiser' ),
           'section'    => 'eiser_contact_section',
           'settings'   => 'eiser_map_marker'
       )
   )
);

// Map latitude  field
Epsilon_Customizer::add_field(
    'eiser_contact_latitude',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Latitude', 'eiser' ),
        'section'           => 'eiser_contact_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '37.422424'
    )
);
// Map longitude  field
Epsilon_Customizer::add_field(
    'eiser_contact_longitude',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Longitude', 'eiser' ),
        'section'           => 'eiser_contact_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '-122.085661'
    )
);

//  Contact info block field
Epsilon_Customizer::add_field(
    'eiser_contact_infoblock',
    array(
        'type'         => 'epsilon-repeater',
        'section'      => 'eiser_contact_section',
        'label'        => esc_html__( 'Contact info block content', 'eiser' ),
        'button_label' => esc_html__( 'Add new block', 'eiser' ),
        'row_label'    => array(
            'type'  => 'field',
            'field' => 'info_title',
            ),
        'fields'       => array(
            'info_title'       => array(
                'label'             => esc_html__( 'Title', 'eiser' ),
                'type'              => 'text',
                'default'           => esc_html__( 'Where to Find Us', 'eiser' ),
            ),
            'contact_info'        => array(
                'label'             => esc_html__( 'Information', 'eiser' ),
                'type'              => 'epsilon-text-editor',
                'default'           => 'Write something....',
            ),
        ),
    )
);
// contact form title field
Epsilon_Customizer::add_field(
    'eiser_contact_formtitle',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Form Title', 'eiser' ),
        'section'           => 'eiser_contact_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// contact Form 7 shortcode field

$options = eiser_contact_form7_shortcode(); // This function create in support-functions.php

Epsilon_Customizer::add_field(
    'eiser_contact_formshortcode',
    array(
        'type'              => 'select',
        'label'             => esc_html__( 'Contact Form', 'eiser' ),
        'section'           => 'eiser_contact_section',
        'description'       => $options[1],
        'default'           => 'cs',
        'choices'           => $options[0] 
    )
);
// Custom contact form shortcode field
Epsilon_Customizer::add_field(
    'eiser_contact_custom_formshortcode',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Set custom contact form shortcode', 'eiser' ),
        'section'     => 'eiser_contact_section',
        'default'     => '',
    )
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'eiser_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'eiser' ),
        'section'           => 'eiser_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'eiser_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'eiser' ),
        'section'           => 'eiser_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'eiser_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'eiser_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'eiser_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'eiser_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'eiser' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'eiser' ),
        'section'     => 'eiser_footer_section',
        'default'     => true,
    )
);
// Footer copyright text field
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'eiser' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'eiser_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'eiser' ),
        'section'     => 'eiser_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'eiser_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_footer_section',
        'default'     => '#19191b',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'eiser_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_footer_section',
        'default'     => '#FFFFFF',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'eiser_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_footer_section',
        'default'     => '#FFFFFF',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'eiser_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_footer_section',
        'default'     => '#888888',
    )
);
// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'eiser_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'eiser' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'eiser_footer_section',
        'default'     => '#888888',
    )
);

// Footer Social profile
Epsilon_Customizer::add_field(
    'footer_social',
    array(
        'type'        => 'epsilon-separator',
        'section'     => 'eiser_footer_section',
        
    )
);
Epsilon_Customizer::add_field(
	'eiser_footer_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'eiser_footer_section',
		'label'        => esc_html__( 'Social Profile', 'eiser' ),
		'button_label' => esc_html__( 'Add new social link', 'eiser' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'eiser' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'eiser' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'eiser' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),
			
		),
	)
);


/*============================================
 *WooCommerce Section
 */

// Shop page settings separator
Epsilon_Customizer::add_field(
	'eiser-woo-shop-separator',
	array(
		'type'    => 'epsilon-separator',
		'label'   => esc_html__( 'Shop page settings', 'eiser' ),
		'section' => 'eiser_woocommerce_options_section',
	)
);

// WooCommerce shop title show/hide option field
Epsilon_Customizer::add_field(
	'eiser-woo-shoppage-title-settings',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Shop Title Show/Hide', 'eiser' ),
		'description' => esc_html__( 'Toggle the shop page title show or hide.', 'eiser' ),
		'section'     => 'eiser_woocommerce_options_section',
		'default'     => false,
	)
);

// Product per page number field
Epsilon_Customizer::add_field(
	'eiser_woo_product_perpage',
	array(
		'type'              => 'epsilon-slider',
		'label'             => esc_html__( 'Shop product per page', 'eiser' ),
		'description'       => esc_html__( 'Set shop product per page ( Default 10 ).', 'eiser' ),
		'section'           => 'eiser_woocommerce_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'choices'           => array(
			'min'  => 1,
			'max'  => 30,
			'step' => 1,
		),
		'default'           => '10',
	)
);
// Details page settings separator
Epsilon_Customizer::add_field(
	'eiser-woo-details-separator',
	array(
		'type'        => 'epsilon-separator',
		'label'       => esc_html__( 'Product details page settings', 'eiser' ),
		'description' => esc_html__( 'To see setting taking effect click on product to go product details.', 'eiser' ),
		'section'     => 'eiser_woocommerce_options_section',
	)
);
// Related Product Show hide
Epsilon_Customizer::add_field(
	'eiser-woo-related-product-settings',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Related Product Show/Hide', 'eiser' ),
		'description' => esc_html__( 'Toggle the related product show or hide in product details page.', 'eiser' ),
		'section'     => 'eiser_woocommerce_options_section',
		'default'     => false,
	)
);
// Related Product number field
Epsilon_Customizer::add_field(
	'eiser_related_product_number',
	array(
		'type'              => 'epsilon-slider',
		'label'             => esc_html__( 'Related product per section', 'eiser' ),
		'description'       => esc_html__( 'Set single page related product per section ( Default 4 ).', 'eiser' ),
		'section'           => 'eiser_woocommerce_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'choices'           => array(
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		),
		'default'           => '4',
	)
);
