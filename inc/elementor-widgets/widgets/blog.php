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
 * Eiser elementor few words section widget.
 *
 * @since 1.0
 */

class Eiser_Blog extends Widget_Base {

	public function get_name() {
		return 'eiser-blog';
	}

	public function get_title() {
		return __( 'Blog', 'eiser' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'eiser-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Post', 'eiser' ),
            ]
        );
        $this->add_control(
            'blog_sectiontitle',
            [
                'label'       => esc_html__( 'Section Title', 'eiser' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Latest Blog', 'eiser' )
            ]
        );
        $this->add_control(
            'blog_sectionsubtitle',
            [
                'label'       => esc_html__( 'Section Sub Title', 'eiser' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Bring called seed first of third give itself now ment', 'eiser' )
            ]
        );
        $this->add_control(
            'blog_limit',
            [
                'label'     => esc_html__( 'Post Limit', 'eiser' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 10,
                'step'      => 1,
                'default'   => 3
            ]
        );

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'eiser' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'eiser' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2a2a2a',
                'selectors' => [
                    '{{WRAPPER}} .main_title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'eiser' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .main_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style text ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'eiser' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_blogtitle', [
                'label'     => __( 'Blog Title Color', 'eiser' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtitlehov', [
                'label'     => __( 'Blog Title Hover Color', 'eiser' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtext', [
                'label'     => __( 'Blog Content Color', 'eiser' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .single-blog p'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'blog_meta_color', [
                'label'     => __( 'Blog Meta Color', 'eiser' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .single-blog .meta-top a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'blog_btn_color', [
                'label'     => __( 'Read More Color', 'eiser' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog .blog_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Read More Hover Color', 'eiser' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single-blog:hover .blog_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings  = $this->get_settings();
    $post_num  = !empty( $settings['blog_limit'] ) ? $settings['blog_limit'] : '3';
    $sec_title = !empty( $settings['blog_sectiontitle'] ) ? $settings['blog_sectiontitle'] : '';
    $sec_sbutitle = !empty( $settings['blog_sectionsubtitle'] ) ? $settings['blog_sectionsubtitle'] : '';
    ?>
        <section class="blog-area section-gap">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="main_title">
                            <?php
                            if( $sec_title ){
                                echo '<h2><span>'. esc_html( $sec_title ) .'</span></h2>';
                            }

                            if( $sec_sbutitle ){
                                echo '<p>'. esc_html( $sec_sbutitle ) .'</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    eiser_latest_blog( $post_num );
                    ?>
                </div>
            </div>
        </section>

    <?php
	}
}
