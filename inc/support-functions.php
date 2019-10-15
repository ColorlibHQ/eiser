<?php 
/**
 * @Packge     : Eiser
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }


// Post Category
function eiser_post_cats( $args = array() ){
    
    
    $default = array(
        'wrp_start'         => '',
        'wrp_end'           => '',
        'before_tag_start'  => '',
        'before_tag_end'    => '',
        'label'             => '',
        'tag'               => '',
        'tag_class'         => '',
        'link'              => true,
    );

    $args = wp_parse_args( $args, $default );

	$cats = get_the_category();
	$categories = '';
    if( $cats ){
        // Wrapper 
        $wrpStart = $wrpEnd = '';

        if( !empty( $args['wrp_start'] ) ){
            $wrpStart = $args['wrp_start'];
            $wrpEnd   = $args['wrp_end'];
        }

        // Before tag
        $btagStart =  $btagEnd = '';
        if( !empty( $args['before_tag_start'] ) ){

            $btagStart  = $args['before_tag_start'];
            $btagEnd    = $args['before_tag_end'];
        }
        $categories .= $wrpStart;
        $categories .= !empty( $args['label'] ) ? $args['label'] : '';
        // Category loop
        foreach( $cats as $cat ){

            $tagStart = $tagEnd = $href = '';

            // link 
            if( !empty( $args['link'] ) ){

                $href = ' href="'.esc_url( get_category_link( $cat->term_id ) ).'"';
            }

            // Tag
            if( !empty( $args['tag'] ) ){   
                $tag = $args['tag'];
                $tagStart = '<'.esc_attr( $tag ).$href.( !empty( $args['tag_class'] ) ? ' class="'.esc_attr( $args['tag_class'] ).'"' : ''  ).'>';
                $tagEnd   = '</'.esc_attr( $tag ).'>';
            }

            $categories .= $btagStart.$tagStart.esc_html( $cat->name ).$tagEnd.$btagEnd;

        }

        $categories .= $wrpEnd;
    }
	
	return $categories;
	
}

// Post Tags
function eiser_post_tags(){
    
    $tags = get_the_tags();
    
    $getTags = '';
    
    if( $tags ){

        foreach( $tags as $tag ){
            $getTags .= '<a href="'.esc_url( get_tag_link( $tag->term_id ) ).'" class="tag-item">'.esc_html( $tag->name ).'</a>';
        }
    
    }
    
    return $getTags;
    
}

// get Tags
function eiser_tags_list(){
	
	$tags = get_the_tags();
	
	$getTags = '';
	
	if( $tags ){

		foreach( $tags as $tag ){
			$getTags .= '<a href="'.esc_url( get_tag_link( $tag->term_id ) ).'" class="tag-item">'.esc_html( $tag->name ).'</a>';
		}
	
	}
	
	return $getTags;
	
}


// social media
if ( ! function_exists( 'eiser_social' ) ) {
	function eiser_social( $args = array()  ){
		
		$default = array(
			'wrapper_start' => '',
			'wrapper_end'   => '',
			'class'   		=> 'topbar-social',
		);
		
		$args = wp_parse_args( $args, $default );
		
		
		$url = eiser_opt('eiser_social_url');
		if( is_array( $url ) && count( $url ) > 0 ):
		
		echo wp_kses_post( $args['wrapper_start'] );
		
			echo '<div class="'.esc_attr( $args['class'] ).'">';
		
			// Facebook
			if( !empty( $url['facebook_url'] ) ){
				echo '<a href="'.esc_url( $url['facebook_url'] ).'" class="topbar-social-item fa fa-facebook"></a>';
			}
			// Twitter
			if( !empty( $url['twitter_url'] ) ){
				echo '<a href="'.esc_url( $url['twitter_url'] ).'" class="topbar-social-item fa fa-twitter"></a>';
			}
			// Google
			if( !empty( $url['google_url'] ) ){
				echo '<a href="'.esc_url( $url['google_url'] ).'" class="topbar-social-item fa fa-google-plus"></a>';
			}
			// Instagram
			if( !empty( $url['instagram_url'] ) ){
				echo '<a href="'.esc_url( $url['instagram_url'] ).'" class="topbar-social-item fa fa-instagram"></a>';
			}
			// Pinterest
			if( !empty( $url['pinterest_url'] ) ){
				echo '<a href="'.esc_url( $url['pinterest_url'] ).'" class="topbar-social-item fa fa-pinterest-p"></a>';
			}
			// Snapchat
			if( !empty( $url['snapchat_url'] ) ){
				echo '<a href="'.esc_url( $url['snapchat_url'] ).'" class="topbar-social-item fa fa-snapchat-ghost"></a>';
			}
			// Youtube
			if( !empty( $url['youtube_url'] ) ){
				echo '<a href="'.esc_url( $url['youtube_url'] ).'" class="topbar-social-item fa fa-youtube-play"></a>';
			}
			
		
			echo '</div>';
		echo wp_kses_post( $args['wrapper_end'] );

		endif;
	}
}

//  contact form 7 Shortcode list
function eiser_contact_form7_shortcode(){

    // contact form list
    $getforms['cs'] = __( 'Custom Shortcode', 'eiser' );
    // Instruction
    $Instruction = ''; 

    if( defined('WPCF7_VERSION') ){
        $args = array(
            'post_type'      => 'wpcf7_contact_form',
            'post_per_pages' => '-1'
        );

        $loop = new WP_Query( $args );

        if( $loop->have_posts() ){
            while( $loop->have_posts() ){
                $loop->the_post();

                $getforms[ get_the_ID() ] = get_the_title();

            }

        }else{
            $Instruction = __( 'Contact form not found.', 'eiser' );
        }
    }else{
        $url = admin_url( 'plugins.php' );
        
        $Instruction = sprintf( __( 'If you want to use contact form 7, Please install and active contact form 7 plugin. %s Click here to install %s  ' , 'eiser' ), '<a target="_blank" href="'.esc_url( $url ).'">', '</a>'  );
    }

    $data = [ $getforms, $Instruction ];

    return $data;

}


// Popular post count
function eiser_set_post_views($postID) {
    $count_key = 'eiser_post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

// blog post categoty 
function eiser_get_post_cat(){
    $cats = get_categories();

    $categories = array( 'na' => esc_html__( 'Select post category', 'eiser' ) );
    foreach ( $cats as $value ) {
        
        $categories[$value->slug] = $value->name;

    }

    return $categories;
}
?>