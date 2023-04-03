(function ($) {
	"user strict";
	$(window).on("load", () => {
		$("#landing-loader").fadeOut(1000);
		var img = $(".bg__img");
		img.css("background-image", function () {
			var bg = "url(" + $(this).data("img") + ")";
			var bg = `url(${$(this).data("img")})`;
			return bg;
		});
	});
	$(document).ready(function () {
		$(".accordion-title").on("click", function (e) {
			var element = $(this).parent(".accordion-item");
			if (element.hasClass("open")) {
				element.removeClass("open");
				element.find(".accordion-content").removeClass("open");
				element.find(".accordion-content").slideUp(200, "swing");
			} else {
				element.addClass("open");
				element.children(".accordion-content").slideDown(200, "swing");
				element
					.siblings(".accordion-item")
					.children(".accordion-content")
					.slideUp(200, "swing");
				element.siblings(".accordion-item").removeClass("open");
				element
					.siblings(".accordion-item")
					.find(".accordion-title")
					.removeClass("open");
				element
					.siblings(".accordion-item")
					.find(".accordion-content")
					.slideUp(200, "swing");
			}
		});

		$(".counter__item").each(function () {
			$(this).isInViewport(function (e) {
				if ("entered" === e)
					for (
						var i = 0;
						i < document.querySelectorAll(".odometer").length;
						i++
					) {
						var n = document.querySelectorAll(".odometer")[i];
						n.innerHTML = n.getAttribute("data-odometer-final");
					}
			});
		});
		var fixed_top = $(".navbar-bottom");
		$(window).on("scroll", function () {
			if ($(this).scrollTop() > 110) {
				fixed_top.addClass("active");
			} else {
				fixed_top.removeClass("active");
			}
		});

		$(".owl-prev").html('<i class="fas fa-angle-left">');
		$(".owl-next").html('<i class="fas fa-angle-right">');

		if ($(".wow").length) {
			var wow = new WOW({
				boxClass: "wow",
				animateClass: "animated",
				offset: 0,
				mobile: true,
				live: true,
			});
			wow.init();
		}

		$(".mode--toggle").on("click", function () {
			setTheme(localStorage.getItem("theme"));
		});
		if (localStorage.getItem("theme") == "light-theme") {
			localStorage.setItem("theme", "dark-theme");
		} else {
			localStorage.setItem("theme", "light-theme");
		}
		setTheme(localStorage.getItem("theme"));
		function setTheme(theme) {
			if (theme == "dark-theme") {
				localStorage.setItem("theme", "light-theme");
				$("html").addClass(theme);
				$(".mode--toggle").find("img").attr("src", "./img/moon.png");
			} else {
				localStorage.setItem("theme", "dark-theme");
				$("html").removeClass("dark-theme");
				$(".mode--toggle").find("img").attr("src", "./img/sun.png");
			}
		}
		// Active Menu
		var current = location.pathname;
		$(".menu li a").each(function () {
			var $this = $(this);
			if ($this.attr("href").indexOf(current) !== -1) {
				$this.addClass("active");
			}
		});
		//Header Bar
		$(".nav-toggle").on("click", () => {
			$(".nav-toggle").toggleClass("active");
			$(".menu").toggleClass("active");
			$(".navbar-bottom-wrapper").toggleClass("rounded-0");
		});

		/* Testimonial Slider */
		var testimonial = $(".testimonial-slider")
			.on("initialized.owl.carousel changed.owl.carousel", function (e) {
				if (!e.namespace) {
					return;
				}
				var carousel = e.relatedTarget;
				$(".slider-counter").text(
					carousel.relative(carousel.current()) +
						1 +
						" / " +
						carousel.items().length
				);
			})
			.owlCarousel({
				items: 1,
				loop: true,
				margin: 0,
				nav: false,
				mouseDrag: true,
				touchDrag: true,
				center: true,
				autoplay: true,
				speed: 1000,
				navSpeed: 1000,
				autoplaySpeed: 1000,
				smartSpeed: 1000,
				fluidSpeed: 1000,
				responsive: {
					768: {
						items: 3,
					},
				},
			});
		$(".testimonial-owl-prev").on("click", function () {
			testimonial.trigger("prev.owl.carousel");
		});
		$(".testimonial-owl-next").on("click", function () {
			testimonial.trigger("next.owl.carousel");
		});

		/* App Slider */
		var app = $(".app-slider")
			.on("initialized.owl.carousel changed.owl.carousel", function (e) {
				if (!e.namespace) {
					return;
				}
				var carousel = e.relatedTarget;
				$(".app-counter").text(
					carousel.relative(carousel.current()) +
						1 +
						" / " +
						carousel.items().length
				);
			})
			.owlCarousel({
				items: 1,
				loop: true,
				margin: 0,
				nav: false,
				mouseDrag: false,
				touchDrag: false,
				autoplay: true,
				autoplayTimeout: 2500,
				speed: 1000,
				autoplaySpeed: 1000,
				smartSpeed: 1000,
				fluidSpeed: 1000,
			});
		$(".app-owl-prev").on("click", function () {
			app.trigger("prev.owl.carousel");
			$(".owl-stage").css("transition", "all 0.3s ease 1s !important");
		});
		$(".app-owl-next").on("click", function () {
			app.trigger("next.owl.carousel");
		});
		/* Service Slider */
		var owl = $(".service-slider").owlCarousel({
			loop: true,
			margin: 0,
			responsiveClass: true,
			nav: false,
			dots: false,
			loop: false,
			autoplay: true,
			autoplayTimeout: 1500,
			autoplayHoverPause: true,
			mouseDrag: true,
			touchDrag: true,
			responsive: {
				0: {
					items: 1,
				},
				500: {
					items: 2,
				},
				768: {
					items: 3,
				},
				992: {
					items: 3,
				},
				1200: {
					items: 4,
				},
			},
		});
		/*Slider Trigger*/
		$(".service-slide-prev").on("click", function () {
			owl.trigger("prev.owl.carousel");
		});
		$(".service-slide-next").on("click", function () {
			owl.trigger("next.owl.carousel");
		});

		$(".service-inner-slider").owlCarousel({
			loop: true,
			margin: 0,
			responsiveClass: true,
			nav: false,
			dots: false,
			loop: false,
			autoplay: true,
			autoplayTimeout: 1500,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 3,
					margin: 10,
				},
				500: {
					items: 4,
					margin: 10,
				},
				576: {
					items: 3,
					margin: 10,
				},
				768: {
					items: 5,
					margin: 20,
				},
				992: {
					items: 6,
					margin: 30,
				},
				1200: {
					items: 6,
					margin: 40,
				},
			},
		});
		$("[data-target]").on("click", function () {
			const slide = $(this).data("target");
			$(".service__item-popup").each(function () {
				if ($(this).data("slide") === slide) {
					$(this).addClass("active");
				} else {
					$(this).removeClass("active");
				}
			});
		});
		$(".close__popup").on("click", function () {
			$(".service__item-popup").removeClass("active");
		});
	});
})(jQuery);
