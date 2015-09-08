jQuery(function($) {

	$('.portfolio-wrap .item:nth-child(3n - 1)').addClass('portfolio-wrap-col2');
	$('.portfolio-wrap .item:nth-child(3n)').addClass('portfolio-wrap-col3');

	$('.portfolio-wrap-col2').appendTo('.portfolio-wrap').removeClass('portfolio-wrap-col2');
	$('.portfolio-wrap-col3').appendTo('.portfolio-wrap').removeClass('portfolio-wrap-col3');
});





