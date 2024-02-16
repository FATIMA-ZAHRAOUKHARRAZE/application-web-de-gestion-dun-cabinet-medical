'use strict';

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchToggler').addEventListener('click', (e) => {
        e.preventDefault();
        this.querySelectorAll('.fa-search, .fa-times').forEach(function (el) {
            el.classList.toggle('d-none');
        });
        document.getElementById('search').classList.toggle('active');
    });
});

$(window).on('scroll', function () {
		//.Scroll to a Specific Div
		if ($('#back-to-top').length) {
			var scrollToTop = $('#back-to-top'),
				scroll = $(window).scrollTop();
			if (scroll >= 200) {
				scrollToTop.fadeIn(200);
			} else {
				scrollToTop.fadeOut(100);
			}
		}
	});
	if ($('#back-to-top').length) {
		$('#back-to-top').on('click', function () {
			$('body,html').animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	}
$('.hero-slider').slick({
		slidesToShow: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		infinite: true,
		speed: 300,
		dots: true,
		arrows: true,
		fade: true,
		responsive: [{
			breakpoint: 600,
			settings: {
				arrows: false
			}
		}]
	});
	$('.hero-slider').slickAnimation();
$(window).on('load', function () {
		// add your functions
		(function ($) {
			datepicker();
		})(jQuery);
	});
