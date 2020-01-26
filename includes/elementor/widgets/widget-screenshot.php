<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Screenshot
class kufa_Widget_Screenshot extends Widget_Base {
 
   public function get_name() {
      return 'screenshot';
   }
 
   public function get_title() {
      return esc_html__( 'Screenshot', 'kufa' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-album';
   }
 
   public function get_categories() {
      return [ 'kufa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'screenshot_section',
         [
            'label' => esc_html__( 'screenshot', 'kufa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $screenshot = new \Elementor\Repeater();

      $screenshot->add_control(
         'image',
         [
            'label' => __( 'Upload an image', 'kufa' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );
      
      $this->add_control(
         'screenshot_list',
         [
            'label' => __( 'Screenshot List', 'kufa' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $screenshot->get_controls()
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="screenshot-wrap">
        <div class="screenshot-active">
         <?php foreach (  $settings['screenshot_list'] as $screenshot ): ?>
            <div class="single-screenshot">
                <a href="<?php echo wp_get_attachment_image_url( $screenshot['image']['id'], 'full' ); ?>" class="popup-image"><img src="<?php echo wp_get_attachment_image_url( $screenshot['image']['id'], 'full' ); ?>" alt="screenshot"></a>
            </div>
         <?php endforeach ?>
        </div>
     </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_Screenshot );