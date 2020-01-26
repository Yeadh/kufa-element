<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Newsletter
class kufa_Widget_newsletter extends Widget_Base {
 
   public function get_name() {
      return 'newsletter';
   }
 
   public function get_title() {
      return esc_html__( 'Newsletter', 'kufa' );
   }
 
   public function get_icon() { 
        return 'eicon-envelope';
   }
 
   public function get_categories() {
      return [ 'kufa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'newsletter_section',
         [
            'label' => esc_html__( 'Newsletter', 'kufa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title', [
            'label' => __( 'Title', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Get reguler updates', 'kufa' ),
         ]
      );

      $this->add_control(
         'text', [
            'label' => __( 'Text', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over', 'kufa' ),
         ]
      );

      $this->add_control(
         'shortcode', [
            'label' => __( 'Mailchimp Shortcode', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'placeholder' => __( '[mc4wp_form id="123"]', 'kufa' ),
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="newsletter-area">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-10">
                  <div class="section-title text-center border-none mb-50">
                      <h2><?php echo $settings['title']; ?></h2>
                      <p><?php echo $settings['text']; ?></p>
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-xl-7">
                <div class="newsletter-form">  
                  <?php echo do_shortcode( $settings['shortcode'] ); ?>
                </div>
              </div>
          </div>
          </div>
      </div>

<?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_newsletter );