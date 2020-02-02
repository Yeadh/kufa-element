<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// skils
class kufa_Widget_skils extends Widget_Base {
 
   public function get_name() {
      return 'skils';
   }
 
   public function get_title() {
      return esc_html__( 'Skils', 'kufa' );
   }
 
   public function get_icon() {
        return 'eicon-featured-image';
   }
 
   public function get_categories() {
      return [ 'kufa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'skils',
         [
            'label' => esc_html__( 'skils', 'kufa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );



      $this->add_control(
         'skil_year', [
            'label' => __( 'Skil Year', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '2020',
         ]
      );

      $this->add_control(
         'skil_title', [
            'label' => __( 'Skil Title', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'PHD of Interaction Design & Animation',
         ]
      );


      $this->add_control(
         'skil_value', [
            'label' => __( 'Skil Value', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '56',
         ]
      );


      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
      
      <!-- Education Item -->
      <div class="education">
          <div class="year"><?php echo esc_html( $settings['skil_year'] ) ?></div>
          <div class="line"></div>
          <div class="location">
              <span><?php echo esc_html( $settings['skil_title'] ) ?></span>
              <div class="progressWrapper">
                  <div class="progress">
                      <div class="progress-bar" style="width: <?php echo esc_attr( $settings['skil_value'] ) ?>%;" aria-valuenow="<?php echo esc_attr( $settings['skil_value'] ) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Education Item -->

    <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_skils );