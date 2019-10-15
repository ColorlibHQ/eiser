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
 * Eiser elementor our product section widget.
 *
 * @since 1.0
 */
class Eiser_Our_Products extends Widget_Base {

    public function get_name() {
        return 'eiser-ourproduct';
    }

    public function get_title() {
        return __( 'Our Product', 'eiser' );
    }

    public function get_icon() {
        return 'eicon-product-tabs';
    }

    public function get_categories() {
        return [ 'eiser-elements' ];
    }

    protected function _register_controls() {

        $repeater = new \Elementor\Repeater();

        // ----------------------------------------  Our Product content ------------------------------
        $this->start_controls_section(
            'ourproduct_content',
            [
                'label' => __( 'Our Product', 'eiser' ),
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
       

        $this->end_controls_section(); // End Features content

    /**
     * Style Tab
     * ------------------------------ Style section title ------------------------------
     *
     */
        $this->start_controls_section(
            'style_sectiontitle', [
                'label' => __( 'Style Section Title', 'eiser' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => __( 'Title Color', 'eiser' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#2a2a2a',
                'selectors' => [
                    '{{WRAPPER}} .main_title h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .main_title h2',
            ]
        );
        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Sub Title Color', 'eiser' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .main_title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'selector' => '{{WRAPPER}} .main_title p',
            ]
        );
        $this->add_control(
            'border_color', [
                'label' => __( 'Border Color', 'eiser' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ebedee',
                'selectors' => [
                    '{{WRAPPER}} .main_title h2 span:after' => 'background: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();




    }

    protected function render() {

    $settings = $this->get_settings();
    $secTitle = !empty( $settings['product_secttitle'] ) ? $settings['product_secttitle'] : '';
    $subTitle = !empty( $settings['product_sect_subTitle'] ) ? $settings['product_sect_subTitle'] : '';
    $postnumber = !empty( $settings['ptoduct_limit'] ) ? $settings['ptoduct_limit'] : '5';

    
 
    ?>
    <!-- Our product -->
    <section class="new_product_area section_gap_top section_gap_bottom_custom">
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
                // Our Product
                eiser_our_product( esc_html( $postnumber ) );
                ?>

            </div>

        </div>
    </section>

    <?php
    }
}
