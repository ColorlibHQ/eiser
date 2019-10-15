<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package eiser
 */

get_header();

$categories     = get_the_category();
$count          = count( $categories );

?>
    <section <?php post_class( 'blog_area single-post-area section_gap' ) ?> >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <?php
                        if( has_post_thumbnail() ){ ?>
                            <div class="feature-img">
                                <?php the_post_thumbnail( 'eiser_blog_750x375', array( 'class' => 'img-fluid' ) ); ?>
                            </div>
                            <?php
                        } ?>
                        <div class="blog_details">
                            <h2><?php the_title(); ?></h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <?php if( has_category() ) {
                                    echo '<li><i class="ti-tag"></i>';
                                    the_category( ', ' );
                                    echo '</li>';
                                }
                                if( have_comments() ){
                                    echo '<li>';
	                                eiser_posted_comments();
	                                echo '</li>';
                                }
                                ?>
                            </ul>
	                        <?php
	                        if( have_posts() ) :
		                        while( have_posts() ) : the_post();
			                        the_content();
		                        endwhile;
	                        endif;
	                        ?>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <?php
                            if( eiser_opt( 'eiser_like_btn' ) == 1 ){
                                echo get_simple_likes_button( get_the_ID() );
                                
                            }

                            if( eiser_opt( 'eiser_blog_share' ) == 1 ){
                                echo eiser_social_sharing_buttons( 'social-icons' );
                            }
                            ?>
                        </div>

                        <?php eiser_blog_single_post_navigation(); ?>
                    </div>


                    <?php
                    if( !empty( get_the_author_meta( 'description' ) ) ) {
	                    eiser_author_bio();
                    }


                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
	                    comments_template();
                    } ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>

<?php
get_footer();