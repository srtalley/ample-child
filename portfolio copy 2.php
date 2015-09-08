<?php
/**
 * The template for displaying Portfolio page.
 *
 * @package ThemeGrill
 * @subpackage Ample-Child
 * @since Ample 0.1
 * Template Name: Portfolio
 */
?>

<?php get_header();

   do_action( 'ample_before_body_content' ); ?>

   <div class="single-page clearfix">
      <div class="inner-wrap">
         <div id="primary">
            <div id="content">

               <?php 
               //global $wp_query_portfolio;
               //query
               $wp_query_portfolio = new WP_Query( array(
               		'post_type'			=> 'post',
               		'posts_per_page' 	=> 100,
               		'cat'				=> 2,
               		'meta_key'			=> 'portfolio_order',
               		'orderby'			=> 'meta_value_num',
               		'order'				=> 'ASC'
               	)); ?>

               <?php if ( $wp_query_portfolio->have_posts() ) { 
					$wrap_column = 1; 
					/* Start the Loop */
					$postnumber = $wp_query_portfolio->found_posts; 
						//Check if we need to print the extra div
						if ($postnumber % 2 == 0) {
							$print_extra_div = true;
						}
					while ( $wp_query_portfolio->have_posts() ) : $wp_query_portfolio->the_post(); 
					
						if($wrap_column == 1) echo "<div class='portfolio-wrap'>"; 
						
						get_template_part( 'content-portfolio', get_post_format() );
						
						
						if($wrap_column == 3) {
							 echo "</div>"; 
							 $wrap_column = 1;
						} else {
						
							$wrap_column++;
						
						}
					endwhile; 
					
					//check to see if we need another div because of even number of posts
					if (is_bool($print_extra_div) === true) { 
						echo "</div>";
					} 
				} else {

					  get_template_part( 'no-results', 'archive' );

				 }  ?>
				   
				</div>
            </div>
            <?php ample_both_sidebar_select(); ?>
         </div>

         <?php ample_sidebar_select(); ?>
      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->

   <?php do_action( 'ample_after_body_content' );
get_footer(); ?>