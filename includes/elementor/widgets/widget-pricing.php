<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class kufa_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'kufa' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'kufa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'kufa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard Plan'
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'condition' => ['style' => 'style2']
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'icon', 'kufa' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $this->add_control(
         'price',
         [
            'label' => __( 'Price', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '70'
         ]
      );
      
      $this->add_control(
         'package',
         [
            'label' => __( 'Package', 'kufa' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'Yealry',
            'options' => [
               'Daily'  => __( 'Daily', 'kufa' ),
               'Weekly'  => __( 'Weekly', 'kufa' ),
               'Monthly' => __( 'Monthly', 'kufa' ),
               'Yealry' => __( 'Yealry', 'kufa' ),
               'none' => __( 'None', 'kufa' )
            ],
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature',
         [
            'label' => __( 'Feature', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'kufa' )
         ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'Feature List', 'kufa' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'default' => [
               [
                  'feature' => __( '5GB Storage Space', 'kufa' )
               ],
               [
                  'feature' => __( '20GB Monthly Bandwidth', 'kufa' )
               ],
               [
                  'feature' => __( 'My SQL Databases', 'kufa' )
               ],
               [
                  'feature' => __( '100 Email Account', 'kufa' )
               ],
               [
                  'feature' => __( '10 Free Domain Names', 'kufa' )
               ]
            ],
            'title_field' => '{{{ feature }}}',
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'button text', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'subscribe',
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'button URL', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'recommended',
         [
            'label' => __( 'Recommended', 'kufa' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'kufa' ),
            'label_off' => __( 'Off', 'kufa' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
      

      <div class="single-pricing <?php if ( 'on' == $settings['recommended'] ){ echo"active"; }?> text-center">
         <div class="pricing-head mb-30">
             <span><?php echo esc_html( $settings['title'] ); ?></span>
             <h2>$<?php echo esc_html( $settings['price'] ); ?><span>/<?php echo esc_html( $settings['package'] ); ?></span></h2>
         </div>
         <div class="pricing-list mb-35">
             <ul>
               <?php foreach( $settings['feature_list'] as $index => $feature ) { ?>
                  <li><?php echo $feature['feature'] ?></li>
               <?php } ?>
             </ul>
         </div>
         <div class="pricing-btn">
            <a href="<?php echo esc_attr( $settings['btn_url'] ) ?>" class="btn"><?php echo esc_html( $settings['btn_text'] ) ?></a>
         </div>
      </div>

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_Pricing );