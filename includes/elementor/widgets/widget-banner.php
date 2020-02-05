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
         'subtitle',
         [
            'label' => __( 'Sub title', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('HELLO!','kufa')
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
            'label' => __( 'Button', 'kufa' ),
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


      $social = new \Elementor\Repeater();

      $social->add_control(
         'social_icon', [
            'label' => __( 'Icon', 'kufa' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
              'value' => 'fab fa-react'
            ],
         ]
      );

      $social->add_control(
         'social_url', [
            'label' => __( 'URL', 'kufa' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'social',
         [
            'label' => __( 'Repeater List', 'kufa' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $social->get_controls(),
            'default' => [
               [
                  'social_icon' => 'fa fa-facebook',
                  'social_url' => '#'
               ],
               [
                  'social_icon' => 'fa fa-twitter',
                  'social_url' => '#'
               ],
               [
                  'social_icon' => 'fa fa-linkedin',
                  'social_url' => '#'
               ]
            ]
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>


      <!-- banner-area -->
      <section id="home" class="banner-area banner-bg fix">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-xl-7 col-lg-6">
                      <div class="banner-content">
                          <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $settings['subtitle'] ?></h6>
                          <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?php echo $settings['title'] ?></h2>
                          <p class="wow fadeInUp" data-wow-delay="0.6s"><?php echo esc_html( $settings['description'] ) ?></p>
                          <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                              <ul>
                                 <?php 
                                    foreach (  $settings['social'] as $index => $social_profile ) { ?>
                                    <li class="list-inline-item">
                                      <a href="<?php echo esc_url( $social_profile['social_url'] ) ?>">
                                        <?php \Elementor\Icons_Manager::render_icon( $social_profile['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                      </a>
                                    </li>
                                 <?php 
                                 } ?>
                              </ul>
                          </div>
                          <a href="<?php echo esc_url( $settings['btn_url'] ) ?>" class="btn wow fadeInUp" data-wow-delay="1s"><?php echo esc_html( $settings['btn_text'] ) ?></a>
                      </div>
                  </div>
                  <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                      <div class="banner-img text-right">
                          <img src="<?php echo esc_url( $settings['banner_image']['url'] ) ?>" alt="img">
                      </div>
                  </div>
              </div>
          </div>
          <div class="banner-shape"><img class="rotateme" src="<?php echo get_template_directory_uri() ?>/images/dot_circle.png" alt="img"></div>
      </section>
      <!-- banner-area-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_Banner );