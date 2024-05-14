/*include /libs/jquery.core.js*/
/*include /libs/slick.js*/
/*include /libs/smoothscroll.js*/
/*include /libs/move.js*/

var Master = {
    onready : function(){
        cg_Move.init_wavy();
    },
    onscroll : function(){
        cg_Move.scroll_slides();
    },
};

$(window).on( 'scroll', function(){
    Master.onscroll();
});


(function($) { 
	var Master = {
		onready : function(){

			/////////////////// SMOOTHSCOLL ///////////////////
			CBO_Smoothscroll.init();

			window.addEventListener('scroll', function() {
				var scrollTop = window.scrollY;
				var halo = document.querySelector('.halo');
				var posX = (scrollTop / (document.body.scrollHeight - window.innerHeight)) * 100;
				
				var maxTranslateX = 200;
				var range = maxTranslateX * 2;
				var progress = (scrollTop / (document.body.scrollHeight - window.innerHeight)) % 1;
				
				if (progress > 0.5) {
					progress = 1 - progress; 
				}
				
				var translateX = progress * range;
				halo.style.transform = 'translateX(calc(-50% + ' + translateX + '%))';
				halo.style.backgroundPosition = posX + '%';
			});

			//////////////// STICKY ////////////////
			$(window).scroll(function(){
				if($(window).scrollTop()>80){
					$("header").addClass('header-scroll');
				}else{
					$("header").removeClass('header-scroll');
				}
			})
			.scroll();

			/////////////////// SMARTPHONE NAVIGATION ///////////////////
			$('header .burger-menu').on('click', function(){
				$('.header-nav').toggleClass('nav--open');
				$('.burger-menu').toggleClass('burger-menu-cross');
				$('body').toggleClass('body--menuopen');
				$('html').toggleClass('html--hidden');
			});

			$('header .menu-item-has-children').on('click', function(e){
				var $this = $(this);
				$this.siblings().removeClass('active');
				$this.toggleClass('active');
			});

			$('header .menu-item-has-children').on('click', function(e){
				$(this).find('.sub-menu').toggleClass('sub-menu_open');
				e.stopPropagation();
			});

			/////////////////// HEADER - CLOSE MENU WHEN CLICKING OUTSIDE ///////////////////
			$(document).on('click', function(e) {
				var $target = $(e.target);
				if (!$target.closest('header .menu-item-has-children').length) {
					$('header .menu-item-has-children').removeClass('active');
					$('header .sub-menu').removeClass('sub-menu_open');
				}
			});

			/////////////////// HEADER - NO SCROLL ON CLICK ON AN EMPTY LINK ///////////////////
			$('header .menu-item-has-children a[href="#"]').click(function(event) {
				event.preventDefault();
			});

			/////////////////// EMPÊCHE LE SCROLL LORSQU'UNE POPIN EST OUVERTE ///////////////////
			$('body .popin-button').on('click', function(e) {
				e.stopPropagation();
				$('body').addClass('body-modale-open');
			});

			/////////////////// MODALE ///////////////////
			$('.button-modale').on('click', function(e) {
				e.stopPropagation();
				$('.cbo-modale').toggleClass('modale--open');
				$('body').addClass('body-modale-open');
				$('html').addClass('html--hidden');
			});

			$('.cbo-modale .modale-close, .cbo-modale .modale-overlay').on('click', function() {
				$('.cbo-modale').removeClass('modale--open');
				$('body').removeClass('body-modale-open');
				$('html').removeClass('html--hidden');
			});
			

			/////////////////// SLIDER ARTICLES ///////////////////
			$('.cbo-relation .articles-list').slick({
				arrows : false,
				dots: false,
				speed: 300,
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: false,
				adaptiveHeight: true,
				responsive: [
					{
						breakpoint: 1283,
						settings: {
							arrows : false,
							dots: true,
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 767,
						settings: {
							arrows : false,
							dots: true,
							slidesToShow: 1,
							slidesToScroll: 1,
						}
					},
				]
			});

			/////////////////// SLIDER PARTNERS ///////////////////
			$('.partners-list').slick({
				arrows : false,
				dots: false,
				infinite: true,
				slidesToShow: 6,
				slidesToScroll: 6,
				speed: 8000,
				autoplay: true,
				autoplaySpeed: 0,
				cssEase: 'linear',  
				responsive: [
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 5,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					}
				]
			});

			//////////////////// TESTIMONIALS VIDÉO ////////////////////
			(function() {
				$(".el--video .content-video").on("click", function() {
					var $this = $(this);
					var videoId = $this.find(".video-cover").data("video-id");
					$this.addClass("video--open");
					$this.find(".video-cover").html(
						'<iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/' +videoId +'?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>'
					);
				});
			})();

			//////////////////// CONTEXT VIDÉO ////////////////////
			(function() {
				$(".cbo-context .content-video").on("click", function() {
					var $this = $(this);
					var videoId = $this.find(".video-cover").data("video-id");
					$this.addClass("video--open");
					$this.find(".video-cover").html(
						'<iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/' +videoId +'?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>'
					);
				});
			})();

			/////////////////// FILTER ///////////////////
			$('.cbo-filters .filters-menu').on('click', function(){
				$('.filters-list').toggleClass('list--open');
				$('.filters-menu').toggleClass('filters-menu-click');
			});
			$('.cbo-filters .filters-inner a').filter(function(){
				return this.href === location.href;
			}).addClass('el--active');

			/////////////////// ANCRE ///////////////////
			document.querySelectorAll('a[href^="#"]').forEach(anchor => {
				anchor.addEventListener('click', function (e) {
					e.preventDefault();
			
					const targetId = this.getAttribute('href');
					const targetElement = document.querySelector(targetId);
			
					if (targetElement) {
						targetElement.scrollIntoView({
							behavior: 'smooth'
						});
					} else {
						console.error('Target element not found');
					}
				});
			});

			///////////////////// PARALLAXE HERO ///////////////////
			var parallaxeHero = document.querySelector('.cbo-herorich .picture-main img');
			if (parallaxeHero) {
				function parallaxScrollHero() {
					var scrolled = window.pageYOffset;
					parallaxeHero.style.transform = 'translateY(' + scrolled * 0.2 + 'px)';
				}
				window.addEventListener('scroll', parallaxScrollHero);
			}

			//////////////// SCROLL ANIMATIONS ////////////////
			var scroll = window.requestAnimationFrame || function(callback){ window.setTimeout(callback, 1000/60)};
			var elementsToShow = document.querySelectorAll('.slide-up, .slide-up, .slide-right, .slide-left, .scale-up, .scale-down'); 

			function loop() {
				Array.prototype.forEach.call(elementsToShow, function(element){
					if (isElementInViewport(element)) {
						element.classList.add('anim-scroll');
					} else {
						element.classList.remove('anim-scroll');
					}
				});
				scroll(loop);
			}	

			loop();
			function isElementInViewport(el) {
				if (typeof jQuery === "function" && el instanceof jQuery) {
					el = el[0];
				}
				var rect = el.getBoundingClientRect();
				return (
					(rect.top <= 0&& rect.bottom >= 0)||(rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) && rect.top <= (window.innerHeight || document.documentElement.clientHeight))||(rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
				);
			}
		},
		
		onload : function(){

		},

		onresize : function(){

		},

		onscroll : function(){

		},
	
	};

	$(document).ready( function(){
		Master.onready();
		
	});

	$(window).load( function(){
		Master.onload();
	});

	$(window).resize( function(){
		Master.onresize();
	});

	$(window).on('scroll', function(){
		Master.onscroll();
	});

})(jQuery);