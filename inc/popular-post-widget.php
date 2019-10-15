<?php
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : Eiser
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

 
 
/**************************************
*Creating Blog Widget
***************************************/
 
class eiser_popular_post_widget extends WP_Widget {
    
    
function __construct() {

parent::__construct(
// Base ID of your widget
'eiser_popular_post_widget', 


// Widget name will appear in UI
esc_html__( '[ Eiser ] Popular Blog Post', 'eiser' ), 

// Widget description
array( 'description' => esc_html__( 'Show most popular blog post.', 'eiser' ), ) 
);

}

// This is where the action happens
public function widget( $args, $instance ) {
$title 			= apply_filters( 'eiser_blog_sectiontitle', $instance['sectiontitle'] );
$postnumber 	= apply_filters( 'eiser_blog_postnumber', $instance['postnumber'] );

// before and after widget arguments are defined by themes
echo wp_kses_post( $args['before_widget'] );
if ( ! empty( $title ) )
echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );

    
?>

<div class="block-1-2 block-m-full popular__posts">
    <?php 

    $postargs = array(
        'posts_per_page' => esc_html( $postnumber ), 
        'meta_key'       => 'eiser_post_views_count', 
        'orderby'        => 'meta_value_num', 
        'order'          => 'DESC'  
    );

    $popularpost = new WP_Query( $postargs );
    if( $popularpost->have_posts() ):
        while( $popularpost->have_posts() ): $popularpost->the_post();
    ?>
    <article class="col-block popular__post">
        <?php
        if( has_post_thumbnail() ):
        ?>
        <a href="<?php the_permalink(); ?>" class="popular__thumb">
            <?php the_post_thumbnail(); ?>
        </a>
        <?php
        endif;
        //
        the_title( sprintf( '<h5><a href="%s">', get_the_permalink() ), '</a></h5>' ); 
        ?>
        <section class="popular__meta">
            <span class="popular__author"><span><?php esc_html_e( 'By', 'eiser' ); ?></span> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
            <span class="popular__date"><span><?php esc_html_e( 'on', 'eiser' ); ?></span> <time datetime="<?php echo esc_attr( get_the_date() ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span>
        </section>
    </article>
    <?php 
        endwhile;
    endif;
    ?>
</div> <!-- end popular_posts -->

<?php

echo wp_kses_post( $args['after_widget'] );
}
		
// Widget Backend 
public function form( $instance ) {

// Section Title
if ( isset( $instance[ 'sectiontitle' ] ) ) {
	$sectiontitle = $instance[ 'sectiontitle' ];
}else {
	$sectiontitle = '';
}
//	Post Number
if ( isset( $instance[ 'postnumber' ] ) ) {
	$postnumber = $instance[ 'postnumber' ];
}else {
	$postnumber = '3';
}


// Widget admin form
?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'sectiontitle' ) ); ?>"><?php esc_html_e( 'Section Title:' ,'eiser'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sectiontitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sectiontitle' ) ); ?>" type="text" value="<?php echo esc_attr( $sectiontitle ); ?>" />
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'postnumber' ) ); ?>"><?php esc_html_e( 'Post Number:' ,'eiser'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'postnumber' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'postnumber' ) ); ?>" type="text" value="<?php echo esc_attr( $postnumber ); ?>" />
</p>

<?php 
}

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {

	
$instance = array();
$instance['sectiontitle'] 	 = ( ! empty( $new_instance['sectiontitle'] ) ) ? strip_tags( $new_instance['sectiontitle'] ) : '';
$instance['postnumber'] 	 = ( ! empty( $new_instance['postnumber'] ) ) ? strip_tags( $new_instance['postnumber'] ) : '';


return $instance;
}
} // Class eiser_bannervideo_widget ends here


// Register and load the widget
function eiser_popular_post_load_widget() {
	register_widget( 'eiser_popular_post_widget' );
}
add_action( 'widgets_init', 'eiser_popular_post_load_widget' );