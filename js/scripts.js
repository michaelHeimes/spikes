jQuery( document ).ready(function($) {

	$("h1:contains('®')").html(function(_, html) {
		return html.replace(/(®)/g, '<span class="superscript">$1</span>');
	});

	$("h2:contains('®')").html(function(_, html) {
		return html.replace(/(®)/g, '<span class="superscript">$1</span>');
	});

	$("p:contains('®')").html(function(_, html) {
		return html.replace(/(®)/g, '<span class="superscript">$1</span>');
	});
	
	if($('.video-wrap').length) {
		var iframe = $('.video-wrap iframe');
					
		$('.video-wrap .poster-frame').on('click', function(ev) {
			$(iframe)[0].src += "&autoplay=1";
			$(iframe).addClass('show');
			ev.preventDefault();
			$('.video-wrap .mask').delay(300).fadeOut(300);
			$(this).delay(300).fadeOut(300);
		});
	};
	
});