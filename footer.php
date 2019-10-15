<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'eiser' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( eiser_opt( 'eiser_footer_copyright_text' ) ) ? eiser_opt( 'eiser_footer_copyright_text' ) : $copyText;
    
    $footerWidget = eiser_opt( 'eiser_footer_widget_toggle' );
    $footerClass = $footerWidget == 1 ? 'section_gap' : 'no-widget';

?>
<footer class="footer-area <?php echo esc_attr( $footerClass ) ?>">
    <div class="container">
        <?php
        if( $footerWidget ) {
            ?>
            <div class="row">
                <?php
                // Footer Widget 1
                if (is_active_sidebar('footer-1')) {
                    echo '<div class="col-lg-2 col-md-6 single-footer-widget">';
                    dynamic_sidebar('footer-1');
                    echo '</div>';
                }
                // Footer Widget 2
                if (is_active_sidebar('footer-2')) {
                    echo '<div class="col-lg-2 col-md-6 single-footer-widget">';
                    dynamic_sidebar('footer-2');
                    echo '</div>';
                }
                // Footer Widget 3
                if (is_active_sidebar('footer-3')) {
                    echo '<div class="col-lg-2 col-md-6 single-footer-widget">';
                    dynamic_sidebar('footer-3');
                    echo '</div>';
                }
                // Footer Widget 4
                if (is_active_sidebar('footer-4')) {
                    echo '<div class="col-lg-2 col-md-6 single-footer-widget">';
                    dynamic_sidebar('footer-4');
                    echo '</div>';
                }
                // Footer Widget 5
                if (is_active_sidebar('footer-5')) {
                    echo '<div class="col-lg-4 col-md-6 single-footer-widget">';
                    dynamic_sidebar('footer-5');
                    echo '</div>';
                }
                ?>
            </div>
            <?php
        } ?>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12"><?php echo wp_kses_post( $copyRight ); ?></p>

            <div class="col-lg-4 col-md-12 footer-social">
	            <?php
                $social_opt = eiser_opt('eiser_footer_social');
                if( is_array( $social_opt ) && count( $social_opt ) > 0 ){
                    foreach ($social_opt as $value) {
                        echo '<a href="'. $value['social_url'] .'"><i class="'. $value['social_icon'] .'"></i></a>';
                    }
                }          
    
            ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>