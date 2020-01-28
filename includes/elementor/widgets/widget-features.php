<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Features
class kufa_Widget_Features extends Widget_Base {
 
   public function get_name() {
      return 'features';
   }
 
   public function get_title() {
      return esc_html__( 'Features', 'kufa' );
   }
 
   public function get_icon() {
        return 'eicon-featured-image';
   }
 
   public function get_categories() {
      return [ 'kufa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'features',
         [
            'label' => esc_html__( 'Features', 'kufa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
        'feature_icon',
        [
          'label' => __( 'Feature Icon', 'kufa' ),
          'type' => \Elementor\Controls_Manager::ICONS,
          'default' => [
            'value' => 'fab fa-react'
          ],
        ]
      );
      
      $this->add_control(
         'feature_title', [
            'label' => __( 'Feature Title', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Creative Design',
         ]
      );

      $this->add_control(
         'feature_text', [
            'label' => __( 'Feature Text', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum indust.',
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="icon_box_01">
        <?php \Elementor\Icons_Manager::render_icon( $settings['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        <h3><?php echo esc_html( $settings['feature_title'] ) ?></h3>
        <p><?php echo esc_html( $settings['feature_text'] ) ?></p>
      </div>

    <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_Features );