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

// Image Crop Size
add_image_size( 'eiser_blog_750x375', 750, 375, true );
add_image_size( 'eiser_widget_post_thumb', 80, 80, true );
add_image_size( 'eiser_np_thumb', 60, 60, true );
add_image_size( 'eiser_latest_blog', 360, 250, true );


 // theme option callback
function eiser_opt( $id = null ){
	
	$opt = get_theme_mod( $id );
	
	$data = '';
	
	if( $opt ){
		$data = $opt;
	}
	
	return $data;
}



// custom meta id callback
function eiser_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_eiser_'.$id, true );
    
    return $value;
}
// Blog Date Permalink
function eiser_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}
// Blog Excerpt Length
if ( ! function_exists( 'eiser_excerpt_length' ) ) {
	function eiser_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = '<p>'.preg_replace('`\[[^\]]*\]`','',$excerpt).'</p>';
		return $excerpt;

	}
}
// Comment number and Link
if ( ! function_exists( 'eiser_posted_comments' ) ) :
    function eiser_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','eiser');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','eiser');
            } else {
                $comments = esc_html__( '1 Comment','eiser' );
            }
            $comments = '<a href="' . esc_url( get_comments_link() ) . '">'. $comments .'</a>';
        } else {
            $comments = esc_html__( 'Comments are closed', 'eiser' );
        }
        
        return $comments;
    }
endif;

//audio format iframe match 
function eiser_iframe_match(){   
    $audio_content = eiser_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}

//Post embedded media
function eiser_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
   
}
// WP post link pages
function eiser_link_pages(){
    
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'eiser' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'eiser' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}

// theme logo
function eiser_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt="'.esc_attr( eiser_image_alt( $imageUrl[0] ) ).'"></a>';
	}else{
		$siteLogo = '<h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2><span>'. esc_html( get_bloginfo('description') ) .'</span>';
	}
	
	return wp_kses_post( $siteLogo );
	
}

// Blog pull right class callback
function eiser_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}

// image alt tag
function eiser_image_alt( $url = '' ){

    if( $url != '' ){
        // attachment id by url 
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag 
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
    
            $alt = str_replace( '-', ' ', $filename['filename'] );
            
            return $alt;
        }
   
    }else{
       return; 
    }

}

// Flat Content wysiwyg output with meta key and post id
function eiser_get_textareahtml_output( $content ) {
    
	global $wp_embed;

	$content = $wp_embed->autoembed( $content );
	$content = $wp_embed->run_shortcode( $content );
	$content = wpautop( $content );
	$content = do_shortcode( $content );

	return $content;
}

// 


// html Style tag
function eiser_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}
// 
function eiser_featured_post_cat(){

        $categories = get_the_category(); 
        
        if( is_array( $categories ) && count( $categories ) > 0 ){
            $getCat = [];
            foreach ( $categories as $value ) {

                if( $value->slug != 'featured' ){
                    $getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'">'.esc_html( $value->name ).'</a>';
                }   
            }

            return implode( ', ', $getCat );
        }

         
}

//  customize sidebar option value return
function eiser_sidebar_opt(){

    $sidebarOpt = eiser_opt( 'eiser_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**==============================================
 * Themify Icon
 */
function eiser_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}

// Set contact form 7 default form template
function eiser_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:main_btn "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'eiser_contact7_form_content', 10, 2 );



// Pagination
function eiser_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'eiser' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'eiser' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


// Blog Single Post Navigation===========================
if( ! function_exists('eiser_blog_single_post_navigation') ) {
	function eiser_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'eiser_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'eiser' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'eiser' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'eiser_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


// Author Bio
function eiser_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}

// eiser comment template callback
function eiser_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user justify-content-between d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5><?php printf( __( '<span class="comment-author-name">%s</span> ', 'eiser' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'eiser'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'eiser' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'eiser' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}

// add class comment reply link
add_filter('comment_reply_link', 'eiser_replace_reply_link_class');
function eiser_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}


/*============================================
    Page nad Postb Meta Box
==============================================*/
function eiser_page_title_meta(){
	add_meta_box( 'eiser_page_title', esc_html__( 'Page Sub Title', 'eiser' ), 'page_subtitle_meta_markup', 'page', 'side', 'high', null );
	add_meta_box( 'eiser_post_subtitle', esc_html__( 'Post Sub Title', 'eiser' ), 'post_subtitle_meta_markup', 'post', 'side', 'high', null );
}
add_action( 'add_meta_boxes', 'eiser_page_title_meta' );

function page_subtitle_meta_markup( $post ){
	$subTitle = get_post_meta($post->ID, 'subtitle_input_meta', true);
	?>
	<label for="subtitle"><?php echo esc_html__( 'Page sub-title', 'eiser' ) ?></label>
	<textarea class="widefat" name="subtitle" id="subtitle" cols="30" rows="5"><?php echo $subTitle ?></textarea>
	<?php
}
// Post Subtitle markup
function post_subtitle_meta_markup( $post ){
	$postSubTitle = get_post_meta($post->ID, 'postSubtitle_input_meta', true);
	?>
	<label for="postsubtitle"><?php echo esc_html__( 'Post sub-title', 'eiser' ) ?></label>
	<textarea class="widefat" name="postsubtitle" id="postsubtitle" cols="30" rows="5"><?php echo $postSubTitle ?></textarea>
	<?php
}

function eiser_page_subtitle_save( $post_id ){
	$saveSubTitle = !empty( $_POST['subtitle'] ) ? $_POST['subtitle'] : '';
	$savePostSubTitle = !empty( $_POST['postsubtitle'] ) ? $_POST['postsubtitle'] : '';

	update_post_meta( $post_id, 'subtitle_input_meta', sanitize_textarea_field( $saveSubTitle ) );
	update_post_meta( $post_id, 'postSubtitle_input_meta', sanitize_textarea_field( $savePostSubTitle ) );
}
add_action( 'save_post', 'eiser_page_subtitle_save' );


/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function eiser_latest_blog( $post_num ){
    $lBlog = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => $post_num
    ) );


    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
	        $lBlog->the_post(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <?php
                    if( has_post_thumbnail() ){
                        echo '<div class="thumb">';
                        the_post_thumbnail( 'eiser_latest_blog' );
                        echo '</div>';
                    }
                    ?>
                    <div class="short_details">
                        <div class="meta-top d-flex">
                            <a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html__('By ', 'eiser'). esc_html( get_the_author() ); ?></a>
	                        <?php echo eiser_posted_comments(); ?>
                        </div>
                        <a class="d-block" href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                        <div class="text-wrap">
                            <?php echo wpautop( wp_trim_words( get_the_content(), 18, '' ) ); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
                    </div>
                </div>
            </div>

        <?php
        }

    }

}

// share button code
function eiser_social_sharing_buttons( $ulClass = '' ,$tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();

	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$facebookURL= 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $facebookURL ) . '" target="_blank"><i class="ti-facebook"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}