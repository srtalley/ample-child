<?php

// Custom functions for Ample Child theme


/*  Register and load common JS
================================================== */
/*function amplechild_register_js() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
       // if (is_page_template('portfolio.php') ) 
       wp_register_script('colorbox', get_stylesheet_directory_uri() . '/colorbox/jquery.colorbox.js', 'jquery', '1.11.0', true);        
        // load custom script which shows on the contact page.
        //if (is_page_template('portfolio.php') ) 
        wp_enqueue_script('colorbox');
		
    }
}
add_action('wp_enqueue_scripts', 'amplechild_register_js');*/

/* Enqueue Colorbox - http://www.jacklmoore.com/colorbox/ */
add_action( 'wp_enqueue_scripts', 'enqueue_colorbox' );
function enqueue_colorbox() {
        wp_enqueue_style( 'colorbox-css', get_bloginfo( 'stylesheet_directory' ) . '/colorbox/colorbox.css', array(), CHILD_THEME_VERSION );
        wp_enqueue_script( 'colorbox', get_bloginfo( 'stylesheet_directory' ) . '/colorbox/jquery.colorbox.js', array( 'jquery' ), '1.5.13' );
        wp_enqueue_script( 'colorbox-init', get_stylesheet_directory_uri() . '/colorbox/colorbox-init.js', array( 'colorbox' ), '1.0.0', true );
}
/**************************************************************************************/
if ( ! function_exists( 'ample_portfolio_select()' ) ) :

	//Not Using 9/4/2015
	function ample_portfolio_select() {
	if ( 'post' == get_post_type() ) : ?>
		 <div class="entry-meta clearfix">
		 	<span class="portfolio-title"><?php the_title();?></span>
		 </div>
	<?php endif;
	}
endif;

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('portfolio', 600, 600, true); // Portfolio thumbnails 
}


function ample_portfolio_category_select( $wp_query_portfolio = array() ) {

	if ( $wp_query_portfolio->have_posts() ) { 
		$wrap_column = 1; 
		/* Start the Loop */
		$postnumber = $wp_query_portfolio->found_posts; 
			//Check if we need to print the extra div
			if ($postnumber % 2 == 0) {
				$print_extra_div = true;
			}
		//echo "<div class='portfolio-wrap'>"; 
		while ( $wp_query_portfolio->have_posts() ) : $wp_query_portfolio->the_post(); 
			if($wrap_column == 1) echo "<div class='portfolio-wrap'>"; 
			 echo "<div class='portfolio-inner'>";  
			echo "<ul class='portfolio-unorderedlist'>";
			echo "<li class='portfolio-item'>";
			get_template_part( 'content-portfolio', get_post_format() );
			echo "</li></ul>";
			echo "</div>";
			if($wrap_column == 3) {
				 echo "</div>"; 
				 $wrap_column = 1;
			} else {
			
				$wrap_column++;
			
			}
			//echo "</div>";
		endwhile;
		echo "</div>"; // portfolio-wrap
		//check to see if we need another div because of even number of posts
		//if (is_bool($print_extra_div) === true) { 
			//echo "</div>";
		//} 
	} else {

		  get_template_part( 'no-results', 'archive' );

	 }

} // end function ample_portfolio_category_select

?>