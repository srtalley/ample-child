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

               <?php if ( $wp_query_portfolio->have_posts() ) : ?>

				<!--Begin the wrap for the posts-->
				  <div class="portfolio-wrap1"> 
				    <!--Begin the logic to make the columns-->
					<?php $wrap_column = 1; ?> 
					<?php /* Start the Loop */ ?>
					<?php $postnumber = $wp_query_portfolio->found_posts; 
						if ($postnumber % 2 != 0) {
							$print_extra_div = true;
						}
					?>
					  <?php while ( $wp_query_portfolio->have_posts() ) : $wp_query_portfolio->the_post(); ?>
					  	<!--<?php if($wrap_column == 1) echo "<div class='row'>"; ?>-->
						<!--<div class="portfolio-column-<?php echo $wrap_column ?>">-->
						 <?php if($wrap_column == 1) echo "<div class='portfolio-wrap'>"; ?>
						 <?php get_template_part( 'content-portfolio', get_post_format() ); ?>

						<?php (($wrap_column==1)?$wrap_column=2:$wrap_column=1); ?>
						<?php if($wrap_column == 1) echo "</div>"; ?><!--</div>-->
						<!--<?php if($wrap_column == 1) echo "</div>"; ?>-->
					  <?php endwhile; ?>
					<?php
	
					//check to see if we need another div because of even number of posts
					if (is_bool($print_extra_div) === true) { 
						echo "</div>";
					}
					?>
					  <?php //get_template_part( 'navigation', 'archive' ); ?>

				   <?php else : ?>

					  <?php get_template_part( 'no-results', 'archive' ); ?>

				   <?php endif; ?>
				   
				</div>
            </div>
            <?php ample_both_sidebar_select(); ?>
         </div>

         <?php ample_sidebar_select(); ?>
      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->

   <?php do_action( 'ample_after_body_content' );
get_footer(); ?>