/*include /libs/jquery.core.js*/
/*include /libs/slick.js*/
/*include /libs/smoothscroll.js*/
/*include /libs/move.js*/


jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.touchmove = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.wheel = {
    setup: function( _, ns, handle ){
        this.addEventListener("wheel", handle, { passive: true });
    }
};
jQuery.event.special.mousewheel = {
    setup: function( _, ns, handle ){
        this.addEventListener("mousewheel", handle, { passive: true });
    }
};

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
			

			/////////////////// SMOOTHSCROLL ///////////////////
			CBO_Smoothscroll.init();

			/////////////////// HALO ///////////////////
			window.addEventListener('scroll', function() {
				var scrollTop = window.scrollY;
				var halo = document.querySelector('.halo');
				var posX = (scrollTop / (document.body.scrollHeight - window.innerHeight)) * 100;
			
				// Définir maxTranslateX en fonction de la largeur de l'écran
				var maxTranslateX;
				if (window.innerWidth > 767) {
					maxTranslateX = 100;
				} else {
					maxTranslateX = 40;
				}
				var range = maxTranslateX * 2;
				var progress = (scrollTop / (document.body.scrollHeight - window.innerHeight)) % 1;
			
				if (progress > 0.5) {
					progress = 1 - progress;
				}
			
				var accelerationFactor = 2; // Augmenter cette valeur pour accélérer davantage
				var translateX = progress * range * accelerationFactor;
				halo.style.transform = 'translateX(calc(-50% + ' + translateX + '%))';
			
				// Calculer la nouvelle couleur et l'opacité en fonction du défilement
				var colorProgress = (scrollTop / (document.body.scrollHeight - window.innerHeight));
				var color1 = { r: 155, g: 177, b: 214, a: 0.6 };
				var color2 = { r: 145, g: 189, b: 242, a: 0.8 };
				var color3 = { r: 167, g: 236, b: 248, a: 0.9 };
			
				var currentColor;
				if (colorProgress < 0.25) {
					currentColor = interpolateColor(color1, color2, colorProgress / 0.25);
				} else if (colorProgress < 0.5) {
					currentColor = interpolateColor(color2, color3, (colorProgress - 0.25) / 0.25);
				} else if (colorProgress < 0.75) {
					currentColor = interpolateColor(color3, color2, (colorProgress - 0.5) / 0.25);
				} else {
					currentColor = interpolateColor(color2, color1, (colorProgress - 0.75) / 0.25);
				}
				halo.style.backgroundColor = 'rgba(' + currentColor.r + ', ' + currentColor.g + ', ' + currentColor.b + ', ' + currentColor.a + ')';
			
				var scaleProgress = progress;
				var scale = 0.6 + (1 - 0.6) * (Math.sin(scaleProgress * Math.PI) * 2);
				halo.style.transform += ' scale(' + scale + ')';
			});
			
			function interpolateColor(color1, color2, factor) {
				var result = {
					r: Math.round(color1.r + factor * (color2.r - color1.r)),
					g: Math.round(color1.g + factor * (color2.g - color1.g)),
					b: Math.round(color1.b + factor * (color2.b - color1.b)),
					a: color1.a + factor * (color2.a - color1.a)
				};
				return result;
			}

			//////////////// ACCORDION ////////////////
			$(".toggle").click(function (e) {
				e.preventDefault();
				var $this = $(this);
				if ($this.next().hasClass("show")) {
					$this.next().removeClass("show");
					$this.next().slideUp(350);
				} else {
					$this.next().toggleClass("show");
					$this.next().slideToggle(350);
				}
			});
			$(".content-question .el-title, .archive-faq .faq-list .el-inner").click(function () {
				$(this).toggleClass("title--open");
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
				$('header').toggleClass('header--active');
				$('.header-nav').toggleClass('nav--open');
				$('.burger-menu').toggleClass('burger-menu-cross');
				$('body').toggleClass('body--menuopen');
				$('html').toggleClass('html--hidden');
			});

			// Smartphone submenu
			$('header .menu-item-has-children > a').on('click', function(e) {
				if (window.innerWidth <= 1284) {
					e.preventDefault();

					var $this = $(this);
					var $submenu = $this.next('.sub-menu');

					$this.parent().siblings().find('.sub-menu').slideUp().removeClass('sub-menu_open');
					$this.parent().siblings().removeClass('active');

					$submenu.slideToggle().toggleClass('sub-menu_open');
					$this.parent().toggleClass('active');
				}
			});

			// Add class to .overlay-menu on hover
			var $overlayMenu = $('.overlay-menu');
			$('header .menu-item-has-children').hover(
				function() {
					$overlayMenu.addClass('active');
				},
				function() {
					$overlayMenu.removeClass('active');
				}
			);

			// Add div under .sub-menu
			var subMenus = document.querySelectorAll('header ul.sub-menu');
			subMenus.forEach(function(subMenu) {
				var submenuInner = document.createElement('span');
				submenuInner.className = 'submenu-inner';
				while (subMenu.firstChild) {
					submenuInner.appendChild(subMenu.firstChild);
				}
				subMenu.appendChild(submenuInner);
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
			});

			$('.cbo-modale .modale-close, .cbo-modale .modale-overlay').on('click', function() {
				$('.cbo-modale').removeClass('modale--open');
			});

			/////////////////// MODALE VIDEO ///////////////////
			 $('.team-list .video-play').on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				var targetId = $(this).data('target');
				var targetModal = $('#' + targetId);
				$('.video-modale').removeClass('modale--open');
				targetModal.addClass('modale--open');
			});

			$('.modale-close, .modale-overlay').on('click', function() {
				$('.video-modale').removeClass('modale--open');
			});


			//////////////// MODALE INFOS COOKIES ////////////////
			(function($) {
				function getCookie(name) {
					var setPos = document.cookie.indexOf(name + '='), stopPos = document.cookie.indexOf(';', setPos);
					return ~setPos ? document.cookie.substring(setPos, ~stopPos ? stopPos : undefined).split('=')[1] : null;
				}

				function setCookie(name, val, days, path) {
					var cookie = name + "=" + escape(val) + "";
					if (days) {
						var date = new Date();
						date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
						cookie += ";expires=" + date.toGMTString();
					}
					cookie += ";" + (path || "path=/");
					document.cookie = cookie;
				}
				$(document).ready(function(){
					var bandeauCookie = getCookie("bandeauCookie");
					$("#myModal").hide();
					if (!bandeauCookie) {
						setTimeout(function() {
							$('body').addClass('body-modale-open');
							$('#myModal').addClass('infos--open').show();
						}, 5000);

						$("#myModal-close").click(function(){
							setCookie("bandeauCookie", 1, 1);
							$("#myModal").fadeOut('fast', function() {
								$('body').removeClass('body-modale-open');
							});
						});
					}
				});
			})(jQuery);
			

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
				$(".el--video .content-video, .list-el .content-video").on("click", function() {
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


			/////////////////// SEARCH ///////////////////
			$('header .buttons-search .search-button').on('click', function(e) {
				e.stopPropagation();
				$('.buttons-search').toggleClass('active');
			});
			 			$(document).on('click', function(e) {
				if (!$(e.target).closest('.buttons-search').length) {
					$('.buttons-search').removeClass('active');
				}
			});
			

			/////////////////// ANCRE ///////////////////
			document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
				anchor.addEventListener('click', function (e) {
					e.preventDefault();
			
					var targetId = this.getAttribute('href');
					var targetElement = document.querySelector(targetId);
			
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

			///////////////////// SOMMAIRE ///////////////////
			var headers = document.querySelectorAll("h2, h3, h4, h5");
			var tocLists = document.getElementsByClassName("sommaire-list");

			if (tocLists.length > 0) {
				var tocList = tocLists[0];
				headers.forEach(function(header, index) {
					if (header.closest(".cbo-relation")) {
						return; 
					}
					var id = "header-" + index;
					header.id = id;
					var li = document.createElement("li");
					var level = parseInt(header.tagName.substring(1)) - 1;
					li.style.marginLeft = level * 20 + "px"; 

					if (level > 1) {
						li.classList.add('sub-level');
					}

					var a = document.createElement("a");
					a.href = "#" + id;
					a.textContent = header.textContent;
					li.appendChild(a);
					tocList.appendChild(li);
				});
			}
			$('.cbo-sommaire').on('click', function(e) {
				e.stopPropagation();
				$('.cbo-sommaire').toggleClass('sommaire--open');
			});


			/////////////////// SOCIAL SHARE ///////////////////
			var shareButton = document.getElementById('linkedin-share-button');
            if (shareButton) {
                shareButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    var pageUrl = window.location.href;
                    var pageTitle = document.title;
                    var linkedinUrl = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(pageUrl) + '&title=' + encodeURIComponent(pageTitle);
                    window.open(linkedinUrl, 'linkedin-share-dialog', 'width=800,height=600');
                    return false;
                });
            }

			var twitterShareButton = document.getElementById('twitter-share-button');
			if (twitterShareButton) {
				twitterShareButton.addEventListener('click', function(event) {
					event.preventDefault();
					var pageUrl = window.location.href;
					var pageTitle = document.title;
					var twitterUrl = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(pageUrl) + '&text=' + encodeURIComponent(pageTitle);
					window.open(twitterUrl, 'twitter-share-dialog', 'width=800,height=600');
					return false;
				});
			}


			//////////////// PRICES - ACCORDION ////////////////
			if ($('body .cbo-prices').length > 0){
				document.querySelectorAll(".el-title").forEach(function (title) {
					title.addEventListener("click", function () {
						this.closest(".list-el").classList.toggle("active");
					});
				});

				var toggleCheckbox = document.querySelector(".button-checkbox");
				var pricesContainer = document.querySelector(".prices-list");
			}


			//////////////// PRICES - TOGGLE ////////////////
			if ($('body .cbo-prices').length > 0){
				toggleCheckbox.addEventListener("change", function () {
					pricesContainer.classList.toggle("annual-active", this.checked);
				});
						
				var toggleCheckbox = document.querySelector(".button-checkbox");
				var toggleContainer = document.querySelector(".prices-toggle");

				toggleCheckbox.addEventListener("change", function () {
					toggleContainer.classList.toggle("annual-active", this.checked);
				}); 
			

				// Annual / Mensual label change
				var toggleCheckbox = document.querySelector(".button-checkbox");
				var pricesContainer = document.querySelector(".prices-list");
				var topTagElements = document.querySelectorAll(".top-tag");

				function updatePricingText() {
					var isChecked = toggleCheckbox.checked;
					pricesContainer.classList.toggle("annual-active", isChecked);
					topTagElements.forEach(function (tag) {
						tag.textContent = isChecked ? "Facturé annuellement" : "Facturé mensuellement";
					});
				}
				updatePricingText();
				toggleCheckbox.addEventListener("change", updatePricingText);
			}


			/////////////////// ADD CHECK TO ACCEPTANCE ///////////////////
			var cbo_forms = {
				init: function () {
				  this.bind_checked();
				  this.check_checked();
				},
				
				bind_checked: function () {
				  $(".contact-form")
					.find('input[type="radio"], input[type="checkbox"]')
					.on("change", function () {
					  cbo_forms.check_checked();
					});
				},
				
				check_checked: function () {
				  $(".cbo-form")
					.find('input[type="radio"], input[type="checkbox"]')
					.each(function () {
					  if ($(this).is(":checked")) {
						$(this).closest(".form-field").find(".field-inner").addClass("checked");
					  } else {
						$(this).closest(".form-field").find(".field-inner").removeClass("checked");
					  }
					});
				},
			};
			cbo_forms.init()


			//////////////// FORM INPUT FILE ////////////////
			var fileInput = document.querySelector('.wpcf7-file');
			var fileReturn = document.querySelector('.file-return');

			if (fileInput && fileReturn) {
				fileInput.addEventListener('change', function() {
					if (fileInput.files.length > 0) {
						var fileName = fileInput.files[0].name;
						fileReturn.textContent = fileName;
					} else {
						fileReturn.textContent = '';
					}
				});
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