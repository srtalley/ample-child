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
               $wp_query_portfolio_illustration = new WP_Query( array(
               		'post_type'			=> 'post',
               		'posts_per_page' 	=> 100,
               		'cat'				=> 4,
               		'meta_key'			=> 'portfolio_order',
               		'orderby'			=> 'meta_value_num',
               		'order'				=> 'ASC'
               	)); 
               	
               	$wp_query_portfolio_logo = new WP_Query( array(
               		'post_type'			=> 'post',
               		'posts_per_page' 	=> 100,
               		'cat'				=> 3,
               		'meta_key'			=> 'portfolio_order',
               		'orderby'			=> 'meta_value_num',
               		'order'				=> 'ASC'
               	)); 
               	
               	?>
				<div class="portfolio-category-heading"><h2 class="portfolio-category-heading">Illustration</h2>
					<?php ample_portfolio_category_select($wp_query_portfolio_illustration); ?>
				</div><!-- .portfolio-category-heading -->
				<div class="portfolio-category-heading"><h2 class="portfolio-category-heading">Logo Design</h2>

					<?php ample_portfolio_category_select($wp_query_portfolio_logo);?>
				</div><!-- .portfolio-category-heading -->
            </div><!-- .content -->
            <?php ample_both_sidebar_select(); ?>
         </div><!-- .primary -->

         <?php ample_sidebar_select(); ?>
      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->

   <?php do_action( 'ample_after_body_content' );
get_footer(); ?>