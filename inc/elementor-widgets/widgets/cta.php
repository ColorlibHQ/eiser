<?php
namespace Eiserelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Eiser elementor few words section widget.
 *
 * @since 1.0
 */
class Eiser_Cta extends Widget_Base {

	public function get_name() {
		return 'eiser-cta';
	}

	public function get_title() {
		return __( 'Call to Action', 'eiser' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'eiser-elements' ];
	}

	protected function _register_controls() {

        // Single Column Call to Action Settings
        $this->start_controls_section(
            'single_cta_sec',
            [
                'label' => __( 'Call to Action', 'eiser' ),
            ]
        );
        $this->add_control(
            'cta_title',
            [
                'label'       => esc_html__( 'Title', 'eiser' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( "ALL MEN’S COLLECTION", "eiser" )
            ]
        );
        $this->add_control(
            'cta_offer',
            [
                'label'       => esc_html__( 'Offer description', 'eiser' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__( '50% Off', 'eiser' ),

            ]
        );
        $this->add_control(
            'cta_btn_label',
            [
                'label'       => esc_html__( 'Button Label', 'eiser' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Discover Now', 'eiser' )
            ]
        );
        $this->add_control(
            'cta_btn_url',
            [
                'label'       => esc_html__( 'Button URL', 'eiser' ),
                'label_block' => true,
                'type'        => Controls_Manager::URL,
                
            ]
        );
		$this->add_control(
			'short_desc',
			[
				'label'       => esc_html__( 'Short Description', 'eiser' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( "Limited Time Offer", "eiser" )
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'eiser' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .offer_area',

            ]
        );
        $this->end_controls_section();

        /*-------------Tab Style-----------------*/
        $this->start_controls_section(
	        'cta_style_tab', [
		        'label' => esc_html__( 'Style Call To Action', 'eiser' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
	        ]
        );

        $this->add_control(
	        'title_color', [
		        'label'     => esc_html__('Title Color', 'eiser'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#4a4a4a',
		        'selectors' => [
			        '{{WRAPPER}} .offer_content h3' => 'color: {{VALUE}};',
		        ],
	        ]
        );
        $this->add_control(
	        'off_color', [
		        'label'     => esc_html__('Offer Text Color', 'eiser'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2a2a2a',
		        'selectors' => [
			        '{{WRAPPER}} .offer_content h2' => 'color: {{VALUE}};',
		        ],
	        ]
        );
        $this->add_control(
	        'btn_label_color', [
		        'label'     => esc_html__('Button Label Color', 'eiser'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
		        'selectors' => [
			        '{{WRAPPER}} .offer_content .main_btn' => 'color: {{VALUE}};',
		        ],
	        ]
        );
		$this->add_control(
			'btn_hover_color', [
				'label'     => esc_html__('Button Hover Color', 'eiser'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .offer_content .main_btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
	        'btn_bg_color', [
		        'label'     => esc_html__('Button Background Color', 'eiser'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
		        'selectors' => [
			        '{{WRAPPER}} .offer_content .main_btn' => 'background: {{VALUE}};',
		        ],
	        ]
        );
        $this->add_control(
	        'btn_hover_bg_color', [
		        'label'     => esc_html__('Button Hover Background Color', 'eiser'),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'transparent',
		        'selectors' => [
			        '{{WRAPPER}} .offer_content .main_btn:hover' => 'background: {{VALUE}};',
		        ],
	        ]
        );
        $this->add_control(
	        'btn_hover_border_color', [
		        'label'     => esc_html__('Button Hover Border Color', 'eiser'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
		        'selectors' => [
			        '{{WRAPPER}} .offer_content .main_btn:hover' => 'border-color: {{VALUE}};',
		        ],
	        ]
        );


		$this->end_controls_section();




	}

	protected function render() {

        $settings   = $this->get_settings();
        $cta_title  = !empty( $settings['cta_title'] ) ? $settings['cta_title'] : '';
        $cta_offer  = !empty( $settings['cta_offer'] ) ? $settings['cta_offer'] : '';
        $cta_btn_label = !empty( $settings['cta_btn_label'] ) ? $settings['cta_btn_label'] : '';
        $btn_url    = !empty( $settings['cta_btn_url']['url'] ) ? $settings['cta_btn_url']['url'] : '';
		$short_desc = !empty( $settings['short_desc'] ) ? $settings['short_desc'] : '';
        ?>

        <section class="offer_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="offset-lg-4 col-lg-6 text-center">
                        <div class="offer_content">
                            <?php
                            //Title
                            if( $cta_title ){
                                echo '<h3 class="text-uppercase mb-40">'. esc_html( $cta_title ) .'</h3>';
                            }

                            // Offer text
                            if( $cta_offer ){
                                echo '<h2 class="text-uppercase">'. esc_html( $cta_offer ) .'</h2>';
                            }

                            //Button
                            if( $cta_btn_label ){
                                echo '<a href="'. esc_url( $btn_url ) .'" class="main_btn mb-20 mt-5">'. esc_html( $cta_btn_label ) .'</a>';
                            }

                            //Short description
                            if( $short_desc ){
	                            echo '<p>'. esc_html( $short_desc ) .'</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    }
	
}
