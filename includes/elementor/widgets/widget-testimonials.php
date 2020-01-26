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
            'default' => __('nancy pocker','kufa')
            
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
         'rating',
         [
            'label' => __( 'Rating', 'kufa' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
              'range' => [
                '%' => [
                  'min' => 1,
                  'max' => 5,
                  'step' => 1,
                ]
              ],
              'default' => [
                'unit' => '%',
                'size' => 5,
              ],
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Awesome Product highly recomended Lorem ipsum dolor alamet, nsectetur mayalipol tempor eiusmod tempor  recomended Lorem ipsum dolor alamet, nsec tetur mayalipol tempor eiusmod tempor incubto ectetur alasiqua enim ad nim veniam, quis nostrud ullam consectetur mayalipol','kufa')
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

      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 col-md-4">
              <div class="testimonial-active">
                <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
                  <div class="testimonial-img">
                      <img src="<?php echo esc_url( $testimonial_single['image']['url'] ); ?>" alt="icon">
                  </div>
                <?php endforeach; ?>
              </div>
          </div>
          <div class="col-lg-7 col-md-8">
              <div class="testimonial-nav">
                <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
                  <div class="testimonial-content">
                      <i class="fa fa-qoute"></i>
                      <p><?php echo esc_html($testimonial_single['testimonial']); ?></p>
                      <div class="testi-bottom">
                      <div class="client-info">
                          <h4><?php echo esc_html($testimonial_single['name']); ?></h4>
                          <span><?php echo esc_html($testimonial_single['designation']); ?></span>
                      </div>
                    
                      <ul class="list-inline">
                       <?php for ($i=0; $i < $testimonial_single['rating']['size']; $i++) { ?>
                         <li class="list-inline-item"><i class="fa fa-star"></i></li>
                       <?php } ?>
                      </ul>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
          </div>
        </div>
      </div>

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_Testimonials );