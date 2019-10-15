<?php
namespace Eiserelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Eiser elementor product categories section widget.
 *
 * @since 1.0
 */
class Eiser_Popular_Product extends Widget_Base {

	public function get_name() {
		return 'eiser-popular-product';
	}

	public function get_title() {
		return __( 'Popular Product', 'eiser' );
	}

	public function get_icon() {
		return 'eicon-product-upsell';
	}

	public function get_categories() {
		return [ 'eiser-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Product Category content ------------------------------
		$this->start_controls_section(
			'product_content',
			[
				'label' => __( 'Product Category Content', 'eiser' ),

			]
		);
        $this->add_control(
            'product_secttitle',
            [
                'label' => esc_html__( 'Section Title', 'eiser' ),
                'type' => Controls_Manager::TEXT,
                'label_block' =>  true,
                'default'   => esc_html__( 'new products', 'eiser' )
            ]
        );
        $this->add_control(
            'product_sect_subTitle',
            [
                'label' => esc_html__( 'Section Sub Title', 'eiser' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' =>  true,
                'default'   => esc_html__( 'Bring called seed first of third give itself now ment', 'eiser' )
            ]
        );
        $this->add_control(
            'ptoduct_limit',
            [
                'label' => esc_html__( 'Product Limit', 'eiser' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 5
            ]
        );
		$this->end_controls_section(); // End Hero content

    
        

	}

	protected function render() {

    $settings = $this->get_settings();
    $secTitle = !empty( $settings['product_secttitle'] ) ? $settings['product_secttitle'] : '';
    $subTitle = !empty( $settings['product_sect_subTitle'] ) ? $settings['product_sect_subTitle'] : '';
    $postnumber = !empty( $settings['ptoduct_limit'] ) ? $settings['ptoduct_limit'] : '5'; 

    ?>
    <section class="inspired_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <?php
                        if( $secTitle ){
                            echo '<h2><span>'. esc_html( $secTitle ) .'</span></h2>';
                        }
                        if( $subTitle ){
                            echo '<p>'. esc_html( $subTitle ) .'</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

        <div class="row">
            <?php eiser_popular_product( $postnumber ); ?>
        </div>
        </div>
    </section>

    <?php
    }
}
