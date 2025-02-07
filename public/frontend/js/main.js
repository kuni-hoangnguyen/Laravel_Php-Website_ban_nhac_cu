/*  ---------------------------------------------------
	Template Name: Ogani
	Description:  Ogani eCommerce  HTML Template
	Author: Colorlib
	Author URI: https://colorlib.com
	Version: 1.0
	Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

	/*------------------
		Preloader
	--------------------*/
	$(window).on('load', function () {
		$(".loader").fadeOut();
		$("#preloder").delay(200).fadeOut("slow");

		/*------------------
			Gallery filter
		--------------------*/
		$('.featured__controls li').on('click', function () {
			$('.featured__controls li').removeClass('active');
			$(this).addClass('active');
		});
		if ($('.featured__filter').length > 0) {
			var containerEl = document.querySelector('.featured__filter');
			var mixer = mixitup(containerEl);
		}
	});

	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function () {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});

	//Humberger Menu
	$(".humberger__open").on('click', function () {
		$(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
		$(".humberger__menu__overlay").addClass("active");
		$("body").addClass("over_hid");
	});

	$(".humberger__menu__overlay").on('click', function () {
		$(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
		$(".humberger__menu__overlay").removeClass("active");
		$("body").removeClass("over_hid");
	});

	/*------------------
		Navigation
	--------------------*/
	$(".mobile-menu").slicknav({
		prependTo: '#mobile-menu-wrap',
		allowParentLinks: true
	});

	/*-----------------------
		Categories Slider
	------------------------*/
	$(".categories__slider").owlCarousel({
		loop: true,
		margin: 0,
		items: 4,
		dots: false,
		nav: true,
		navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		smartSpeed: 1200,
		autoHeight: false,
		autoplay: true,
		responsive: {

			0: {
				items: 1,
			},

			480: {
				items: 2,
			},

			768: {
				items: 3,
			},

			992: {
				items: 4,
			}
		}
	});


	$('.hero__categories__all').on('click', function () {
		$('.hero__categories ul').slideToggle(400);
	});

	/*--------------------------
		Latest Product Slider
	----------------------------*/
	$(".latest-product__slider").owlCarousel({
		loop: true,
		margin: 0,
		items: 1,
		dots: false,
		nav: true,
		navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
		smartSpeed: 1200,
		autoHeight: false,
		autoplay: true
	});

	/*-----------------------------
		Product Discount Slider
	-------------------------------*/
	$(".product__discount__slider").owlCarousel({
		loop: true,
		margin: 0,
		items: 3,
		dots: true,
		smartSpeed: 1200,
		autoHeight: false,
		autoplay: true,
		responsive: {

			320: {
				items: 1,
			},

			480: {
				items: 2,
			},

			768: {
				items: 2,
			},

			992: {
				items: 3,
			}
		}
	});

	/*---------------------------------
		Product Details Pic Slider
	----------------------------------*/
	$(".product__details__pic__slider").owlCarousel({
		loop: true,
		margin: 20,
		items: 4,
		dots: true,
		smartSpeed: 1200,
		autoHeight: false,
		autoplay: true
	});

	/*-----------------------
		Price Range Slider
	------------------------ */
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max'),
		step = rangeSlider.data('step'); // Get the step value from data attribute

	// Function to format numbers with commas
	function formatNumber(number) {
		return new Intl.NumberFormat().format(number);
	}

	rangeSlider.slider({
		range: true,
		min: minPrice,
		max: maxPrice,
		step: step,
		values: [
			minamount.val() ? parseInt(minamount.val().replace(/\D/g, '')) : minPrice,
			maxamount.val() ? parseInt(maxamount.val().replace(/\D/g, '')) : maxPrice
		],
		slide: function (event, ui) {
			minamount.val(formatNumber(ui.values[0]) + "đ");
			maxamount.val(formatNumber(ui.values[1]) + "đ");
		},
		stop: function () {
			// Automatically submit the form when slider is adjusted
			document.getElementById("price-filter-form").submit();
		}
	});

	// Initialize the values with formatted numbers
	minamount.val(formatNumber(rangeSlider.slider("values", 0)) + "đ");
	maxamount.val(formatNumber(rangeSlider.slider("values", 1)) + "đ");


	/*--------------------------
		Select
	----------------------------*/
	$("select").niceSelect();

	/*------------------
		Single Product
	--------------------*/
	$('.product__details__pic__slider img').on('click', function () {

		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product__details__pic__item--large').attr('src');
		if (imgurl != bigImg) {
			$('.product__details__pic__item--large').attr({
				src: imgurl
			});
		}
	});

	/*-------------------
		Quantity change
	--------------------- */
	var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');

	$(document).ready(function () {
		$('.pro-qty').each(function () {
			var $input = $(this).find('input');
			var max = $input.attr('max');

			if (max == 0) {
				$input.val(max);
			}
		});
	});


	// Handle click on increment and decrement buttons
	proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var $input = $button.parent().find('input');
		var oldValue = parseFloat($input.val());
		var min = parseFloat($input.attr('min'));
		var max = parseFloat($input.attr('max'));
		var newVal;

		if ($button.hasClass('inc')) {
			if (oldValue < max) {
				newVal = oldValue + 1;
			} else {
				newVal = max;
			}
		} else {
			// Decrement and check against min
			if (max == 0) {
				newVal = max;
			} else
				if (oldValue > min) {
					newVal = oldValue - 1;
				} else {
					newVal = min;
				}
		}
		$input.val(newVal);
	});

	// Validate input when user finishes typing or changes the value
	proQty.on('blur change', 'input', function () {
		var $input = $(this);
		var value = parseFloat($input.val());
		var min = parseFloat($input.attr('min'));
		var max = parseFloat($input.attr('max'));

		// Ensure value is within min and max range
		if (value < min) {
			$input.val(min);
		} else if (value > max) {
			$input.val(max);
		}
	});




})(jQuery);
