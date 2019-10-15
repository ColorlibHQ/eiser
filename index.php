<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eiser
 */

get_header();
// $opt          = get_option('eiser_opt');
// $blog_layout  = isset( $opt['blog_layout'] ) ? $opt['blog_layout'] : 'right';
// $main_content = $blog_layout == 'full' ? '12' : '8';
// $blog_column  = is_active_sidebar( 'sidebar_widgets' ) ? $main_content : '12';

?>
    <section class="blog_area section_gap">
        <div class="container">
            <div class="row">
	           
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

	                    <?php
	                    if (have_posts()) :
		                    while (have_posts()) : the_post();
			                    get_template_part('templates/content', get_post_format());
		                    endwhile;
	                    endif;

	                    //Pagination
	                    eiser_blog_pagination();
	                    ?>
                    </div>
                </div>
	            <?php
		            get_sidebar();
	            
	            ?>
            </div>
        </div>
    </section>


<?php
get_footer();