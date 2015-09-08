<?php*
 * The template used for displaying Single Post content.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-article'); ?>>
   <?php do_action( 'ample_before_post_content' ); ?>

   <?php //ample_portfolio_select(); ?>

   <div class="entry-content">
   <?php //the_post_thumbnail('portfolio'); ?>
     <!-- <?php // the_content(); ?>-->
	 <?php
		if ( has_post_thumbnail()) {
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
			echo '<a href="' . $large_image_url[0] . '" rel="portfolio-gallery" class="portfolio-image" title="' . the_title_attribute('echo=0') . '" >';
			the_post_thumbnail('portfolio');
			echo '</a>';
		}
		?>
	 
   </div>

   <?php
   $ample_tag_list = get_the_tag_list( '', '&nbsp;&nbsp;&nbsp;&nbsp;', '' );
   if( !empty( $ample_tag_list ) ) { ?>
      <div class="tags">
         <?php _e( 'Tagged on: ', 'ample' ); echo $ample_tag_list; ?>
      </div>
   <?php }

  /* wp_link_pages( array(
   'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'ample' ),
   'after'             => '</div>',
   'link_before'       => '<span>',
   'link_after'        => '</span>'
   ) ); */

   //edit_post_link( __( 'Edit', 'ample' ), '<span class="edit-link">', '</span>' );

   do_action( 'ample_after_post_content' ); ?>
</article>