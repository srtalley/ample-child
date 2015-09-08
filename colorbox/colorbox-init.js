/* http://www.jacklmoore.com/colorbox/ http://code.tutsplus.com/articles/quick-tip-integrating-colorbox-into-the-native-gallery-shortcode--wp-25658 */

jQuery(function( $ ){
 $("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").colorbox({
	scalePhotos: true,
    maxHeight: '96%',
	maxWidth: '100%',
	transition:'none',
	//title: 'test',
 /* rel: 'gallery', Makes all images on the page/post connect to each other */
 });

$('gallery').colorbox({
	scalePhotos: true,
    maxHeight: '96%',
	maxWidth: '100%',
	rel:'gallery'

});

// Initialize the Lightbox for any links with the 'colorbox' class
   // $(".colorbox").colorbox();
 
    // Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
   // $("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").colorbox();
 
    // Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using [gallery link="file"] so that a Lightbox Gallery exists
   // $(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').colorbox();
 
    
 
});