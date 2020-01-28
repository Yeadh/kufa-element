<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class kufa_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'Testimonials', 'kufa' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }
 
   public function get_categories() {
      return [ 'kufa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'testimonial_section',
         [
            'label' => esc_html__( 'Testimonials', 'kufa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'kufa' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src()
            ]
         ]
      );
      
      $repeater->add_control(
         'name',
         [
            'label' => __( 'Name', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Nancy pocker','kufa')
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Ui/Ux Designer & Product Designer','kufa')
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('An event is a message sent by an object to signal the occur rence of an action. The action can causd user interaction such as a button click, or it can result','kufa')
         ]
      );

      $this->add_control(
         'testimonial_list',
         [
            'label' => __( 'Testimonial List', 'kufa' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{name}}',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>


      <div class="testimonial-active">
          <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
          <div class="single-testimonial text-center">
              <div class="testi-avatar">
                  <img src="<?php echo esc_url( $testimonial_single['image']['url'] ); ?>" alt="<?php echo esc_attr($testimonial_single['name']); ?>">
              </div>
              <div class="testi-content">
                  <h4><?php echo esc_html($testimonial_single['testimonial']); ?></h4>
                  <div class="testi-avatar-info">
                      <h5><?php echo esc_html($testimonial_single['name']); ?></h5>
                      <span><?php echo esc_html($testimonial_single['designation']); ?></span>
                  </div>
              </div>
          </div>
          <?php endforeach; ?>
      </div>

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_Testimonials );