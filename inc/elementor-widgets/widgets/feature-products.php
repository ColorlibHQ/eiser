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
 * Eiser elementor counter section widget.
 *
 * @since 1.0
 */
class Eiser_Feature_Products extends Widget_Base {

	public function get_name() {
		return 'eiser-featured-products';
	}

	public function get_title() {
		return __( 'Featured Products', 'eiser' );
	}

	public function get_icon() {
		return 'eicon-product-images';
	}

	public function get_categories() {
		return [ 'eiser-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Counter content ------------------------------
		$this->start_controls_section(
			'featured_products',
			[
				'label' => __( 'Featured Products Settings', 'eiser' ),
			]
		);
        $this->add_control(
            'sectiontitle', [
                'label' => __( 'Section Title', 'eiser' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Featured product', 'eiser' )
            ]
        );
        $this->add_control(
            'section_subtitle', [
                'label' => __( 'Section Sub Title', 'eiser' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Bring called seed first of third give itself now ment', 'eiser' )
            ]
        );
        $this->add_control(
            'product_select', [
                'label' => __( 'Select product', 'eiser' ),
                'type'  => Controls_Manager::SELECT2,
                'multiple' => true,
                
                    
            ]
        );

        $this->add_control(
            'postlimit', [
                'label' => __( 'Post Limit', 'eiser' ),
                'type'  => Controls_Manager::NUMBER,
                'label_block' => true,
                'default'     => 6
            ]
        );
		$this->end_controls_section(); // End counter content


        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Section Title', 'eiser' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'  => __( 'Title Color', 'eiser' ),
                'type'   => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .newproduct h3.m-text5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .newproduct h3.m-text5',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name'      => 'text_shadow_title',
                'selector'  => '{{WRAPPER}} .newproduct h3.m-text5',
            ]
        );
        $this->add_control(
            'color_productprice', [
                'label'  => __( 'Product title and price color', 'eiser' ),
                'type'   => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .newproduct .block2 .s-text3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .newproduct .block2 .m-text6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_producttitlehov', [
                'label'  => __( 'Product title hover color', 'eiser' ),
                'type'   => Controls_Manager::COLOR,
                'default' => '#e65540',
                'selectors' => [
                    '{{WRAPPER}} .newproduct .block2 .s-text3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $secTitle = !empty( $settings['sectiontitle'] ) ? $settings['sectiontitle'] : '';
    $subTitle = !empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : '';

    //$product_IDs = !empty( $settings['product_select'] ) ? $settings['product_select'] : '';

    ?>

    <!-- New Product -->
    <section class="feature_product_area section_gap_bottom_custom">
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
                <?php

                // Featured products
                eiser_featured_products( $settings['postlimit'] );
                ?>
            </div>
        </div>
    </section>


    <?php

    }
	
}
