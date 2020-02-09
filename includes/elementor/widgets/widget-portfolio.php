<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// portfolio
class kufa_Widget_portfolio extends Widget_Base {
 
   public function get_name() {
      return 'portfolio';
   }
 
   public function get_title() {
      return esc_html__( 'Portfolio', 'kufa' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-album';
   }
 
   public function get_categories() {
      return [ 'kufa-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'portfolio_section',
         [
            'label' => esc_html__( 'portfolio', 'kufa' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="row">
      <?php
      $blog = new \WP_Query( array( 
         'post_type' => 'portfolio',
         'posts_per_page' => -1,
         'ignore_sticky_posts' => true,
      ));
      /* Start the Loop */
      while ( $blog->have_posts() ) : $blog->the_post();
      ?>
         <div class="col-lg-4 col-md-6 pitem">
             <div class="speaker-box">
               <div class="speaker-thumb">
                  <?php the_post_thumbnail('kufa-400x570') ?>
               </div>
               <div class="speaker-overlay">
                  <span><?php echo get_the_category() ?></span>
                  <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                  <a href="<?php the_permalink() ?>" class="arrow-btn"><?php echo esc_html__( 'More information', 'kufa' ) ?> <span></span></a>
               </div>
            </div>
         </div>   

         <?php 
         endwhile; 
      wp_reset_postdata();
      ?>
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new kufa_Widget_portfolio );