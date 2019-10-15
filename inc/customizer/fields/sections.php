<?php 
/**
 * @Packge     : Eiser
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'eiser_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'eiser' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'eiser_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'eiser' ),
            'panel'    => 'eiser_theme_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'eiser_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'eiser' ),
            'panel'    => 'eiser_theme_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'eiser_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'eiser' ),
            'panel'    => 'eiser_theme_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * About Page Section
     */
    array(
        'id'   => 'eiser_about_section',
        'args' => array(
            'title'    => esc_html__( 'About Page', 'eiser' ),
            'panel'    => 'eiser_theme_options_panel',
            'priority' => 4,
        ),
    ),
    /**
     * Contact Page Section
     */
    array(
        'id'   => 'eiser_contact_section',
        'args' => array(
            'title'    => esc_html__( 'Contact Page', 'eiser' ),
            'panel'    => 'eiser_theme_options_panel',
            'priority' => 5,
        ),
    ),
    /**
     * 404 Page Section
     */
    array(
        'id'   => 'eiser_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'eiser' ),
            'panel'    => 'eiser_theme_options_panel',
            'priority' => 6,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'eiser_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'eiser' ),
            'panel'    => 'eiser_theme_options_panel',
            'priority' => 7,
        ),
    ),

    /**
	 * WooCommerce Section
	 */
	array(
		'id'   => 'eiser_woocommerce_options_section',
		'args' => array(
			'title'    => esc_html__( 'WooCommerce', 'eiser' ),
			'panel'    => 'eiser_theme_options_panel',
			'priority' => 8,
		),
	),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>