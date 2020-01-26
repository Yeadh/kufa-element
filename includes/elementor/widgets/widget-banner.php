<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class kufa_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner_pop';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'kufa' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'kufa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'kufa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
      'banner_image',
        [
          'label' => __( 'Banner image', 'kufa' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Thinking Software High Quality','kufa')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dolor sit amet consectetur adipiscing elit proin leo leo ornare nec vulputate tempus velit nam id purus tellus','kufa')
         ]
      );

      $this->add_control(
         'btn_text', [
            'label' => __( 'Text', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('get started','kufa')
         ]
      );

      $this->add_control(
         'btn_url', [
            'label' => __( 'URL', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
        
      <section class="slider-area fix">
        <div class="container">
            <div class="s-slider-overflow">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="slider-content s-slider-content mt-60">
                            <h1 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $settings['title'] ?></h1>
                            <div class="row">
                              <div class="col-lg-10">
                                <p class="wow fadeInUp" data-wow-delay="0.4s"><?php echo esc_html( $settings['description'] ) ?></p>
                              </div>
                            </div>
                            <a href="<?php echo esc_url( $settings['btn_url'] ) ?>" class="btn wow fadeInUp" data-wow-delay="0.6s"><?php echo esc_html( $settings['btn_text'] ) ?></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block text-right">
                        <div class="s-slider-img position-relative wow fadeInRight" data-wow-delay="0.6s">
                            <img src="<?php echo esc_url( $settings['banner_image']['url'] ) ?>" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_Banner );