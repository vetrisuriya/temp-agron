( function( $ ) {
    "use strict";
    $( window ).on( 'elementor/frontend/init', function() {
        const widgets = [ 'pxl_timeline_carousel', 'pxl_post', 'pxl_product', 'pxl_service', 'pxl_project', 'pxl_team', 'pxl_testimonial_carousel', 'pxl_slider', 'pxl_post_custom', 'pxl_icon_text_carousel', 'pxl_image_gallery', 'pxl_step_carousel' ];
        widgets.forEach(widget => {               
            elementorFrontend.hooks.addAction( `frontend/element_ready/${widget}.default`, function( $scope ) {
                swiperHandle($scope);
            });
        });
    });

    const textAnimatedIn = (slide, delay = 0) => {
        const texts = $(slide).find('.heading-title .title-text, .subtitle-text');
        if (!texts.length) return;

        texts.each(function (_, el) {
            let splitText;
            const $el = $(el);

            if (!$el.hasClass('split-initialized')) {
                splitText = new SplitText(el, {
                    type: "lines, chars",
                    linesClass: 'pxl-line',
                    charsClass: 'pxl-char',
                    tag: 'div',
                });
                $el.addClass('split-initialized');
            } else {
                splitText = {
                    lines: $el.find('.pxl-line'),
                    chars: $el.find('.pxl-char')
                };
            }

            if ($el.hasClass('text1')) {
                gsap.set(splitText.chars, { scaleX: 0, opacity: 0 });
                gsap.to(splitText.chars, {
                    opacity: 1,
                    scaleX: 1,
                    ease: 'power2.out',
                    duration: 1,
                    stagger: 0.05,
                });
            } else if ($el.hasClass('text2')) {
                gsap.set(splitText.lines, { css: { overflow: 'hidden' } });
                gsap.set(splitText.chars, { y: '100%' });
                gsap.to(splitText.chars, {
                    y: 0,
                    duration: 1,
                    ease: 'power2.out',
                    stagger: 0.015,
                    delay: delay / 1000
                });
            } else if ($el.hasClass('text3')) {
                gsap.set(splitText.lines, { opacity: 0, x: 100 });
                gsap.to(splitText.lines, {
                    opacity: 1,
                    x: 0,
                    duration: 1,
                    ease: 'power2.out',
                    stagger: 0.15,
                    delay: delay / 1000
                });
            }

            $el.removeClass('visibility-hidden');
        });
    };


    function swiperHandle($scope){
        let swipers = $scope.find('.pxl-swiper, .pxl-slider'); 
        if (!swipers.length) return; 
        swipers.each(function () {
            let _this = $(this);
            let swiper;
            const thisClasses = _this.attr('class');
            const container = _this.find('.swiper-container');
            if (!container.length) return;
            const params = $(container).data().swiper || {};
            let navigation = {
                nextEl: _this.find('.swiper-button-next')[0],
                prevEl: _this.find('.swiper-button-prev')[0],
            }
            if(_this.parent('.pxl-testimonial-carousel4').length) {
                navigation = {
                    nextEl: _this.parent('.pxl-testimonial-carousel4').find('.swiper-button-next')[0],
                    prevEl: _this.parent('.pxl-testimonial-carousel4').find('.swiper-button-prev')[0],
                }
            }
            const navigationWrap = _this.find('.swiper-navigation').first();
            let alternativeNavigation = $(navigationWrap).data('navigation-id');
            if(alternativeNavigation !== '' && alternativeNavigation !== undefined) {
                navigation = {
                    nextEl: $('#'+alternativeNavigation).find('.swiper-button-next')[0],
                    prevEl: $('#'+alternativeNavigation).find('.swiper-button-prev')[0],
                }
            }
            const settings = {
                effect: params['effect'],
                fadeEffect: {
                    crossFade: params['effect'] == 'fade' ? true : false
                },
                allowTouchMove: params['allow_touch_move'] ?? true,
                direction: params['direction'] ?? 'horizontal',
                loop: params['loop'],
                autoplay: (params['autoplay'] === true) ? {
                    delay: params['delay'],
                    disableOnInteraction: params['disable_on_interaction']
                } : false,
                mousewheel: false,
                wrapperClass: 'swiper-wrapper',
                slideClass:'swiper-slide',
                slidesPerView: 'auto', 
                slidesPerGroup: 1,
                spaceBetween: 0, 
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                // loopAdditionalSlides: 10,
                observer: true,
                observeParents: true,
                speed: params['speed'],
                pagination: (params['pagination'] !== '' && params['pagination'] !== 'none') ? {
                    el: _this.find('.swiper-pagination')[0],
                    clickable: true,
                    type: params['pagination']
                } : false,
                navigation: params['navigation'] == true ? navigation : false,
                parallax: false,
                centeredSlides: params['centered_slides'] ?? false,
                breakpoints: {
                    0: {
                        slidesPerView: params['slides_per_view_xs'] ?? 1,
                    },
                    576: {
                        slidesPerView: params['slides_per_view_sm'] ?? 1,
                    },
                    768: {
                        slidesPerView: params['slides_per_view_md'] ?? 2,
                    },
                    992: {
                        slidesPerView: params['slides_per_view_lg'] ?? 2,
                    },
                    1200: {
                        slidesPerView: params['slides_per_view_xl'] ?? 3,
                    },
                    1400: {
                        slidesPerView: params['slides_per_view_xxl'] ?? 3,
                    },
                },
                on : {
                    init: function() {
                        const swiper = this;
                        const slides = swiper.slides;
                        const activeIndex = swiper.activeIndex;
                        let realIndex = swiper.realIndex;
                        let index = params['loop'] == true ? activeIndex : realIndex;
                        if(thisClasses.includes('slider-layout1') || thisClasses.includes('slider-layout2') || thisClasses.includes('slider-layout3') || thisClasses.includes('slider-layout4')) {
                            textAnimatedIn(slides[index], params['speed']);
                        }
                        if(thisClasses.includes('testimonial-thumbs') && _this.parent('.pxl-testimonial-carousel4').length) {
                            let swiperMain = _this.siblings('.testimonial-main').find('.swiper-container');
                            $(slides).on('click', function() {
                                slides.removeClass('active');
                                $(this).addClass('active');
                                index = $(this).index()
                                swiper.slideTo(index)
                                swiperMain.get(0).swiper.slideTo(index)
                            })
                        }
                    },
                    slideChange: function() {
                        const swiper = this;
                        const slides = swiper.slides;
                        const activeIndex = swiper.activeIndex;
                        let realIndex = swiper.realIndex;
                        let index = params['loop'] == true ? activeIndex : realIndex;
                        let nextBtn = navigation.nextEl;
                        let prevBtn = navigation.prevEl;   
                        if(thisClasses.includes('pxl-slider')) {
                            $(slides[index]).find('.wow').addClass('animated');
                        }else {
                            $(slides).find('.wow').addClass('pxl-invisible').removeClass('animated');
                            $(slides).find('.wow.pxl-post-item').addClass('pxl-invisible').removeClass('animated');
                        }
                        if(thisClasses.includes('pxl-testimonial-carousel1') || thisClasses.includes('pxl-testimonial-carousel3') || thisClasses.includes('pxl-testimonial-carousel8')) {
                            const images = _this.find('.testimonial-images > img');
                            images.removeClass('active');
                            $(images[realIndex]).addClass('active');
                            images.css({'transition': '.3s linear .3s'});
                            $(images[realIndex]).css({'transition': '.3s linear'});
                        }
                        if(thisClasses.includes('testimonial-main') && _this.parent('.pxl-testimonial-carousel4').length) {
                            let swiperThumbs = _this.siblings('.testimonial-thumbs').find('.swiper-container');
                            let slidesThumb = swiperThumbs.get(0).swiper.slides;
                            $(slidesThumb).removeClass('active');
                            $(slidesThumb[index]).addClass('active');
                            swiperThumbs.get(0).swiper.slideTo(index)
                        }
                        if(thisClasses.includes('slider-layout1') || thisClasses.includes('slider-layout2') || thisClasses.includes('slider-layout3') || thisClasses.includes('slider-layout4')) {
                            textAnimatedIn(slides[index], params['speed']);
                        }
                        if(thisClasses.includes('pxl-slider')) {
                            const backgrounds = _this.find('.slide-background');
                            backgrounds.css({'transition' : `all var(--pxl-transition-duration) ease-in-out var(--pxl-transition-duration)`})
                            $(backgrounds[index]).css({'transition' : `all var(--pxl-transition-duration) ease-in-out`})
                        }
                    },
                    slidePrevTransitionStart: function (speed) {  
                        const swiper = this;
                        const slides = swiper.slides;
                        let activeIndex = swiper.activeIndex;
                        let realIndex = swiper.realIndex;
                        let index = params['loop'] == true ? activeIndex : realIndex;
                        if(thisClasses.includes('pxl-testimonial-carousel1') || thisClasses.includes('pxl-testimonial-carousel3') || thisClasses.includes('slider-layout4')) {
                            const images = _this.find('.testimonial-images > img');
                            images.css({'transition': '.3s linear 0s'});
                            $(images[realIndex]).css({'transition': '0s linear 0s'});
                        }
                        if(thisClasses.includes('pxl-slider')) {
                            const backgrounds = _this.find('.slide-background');
                            backgrounds.css({'transition' : `all var(--pxl-transition-duration) ease-in-out 0s`})
                            $(backgrounds[index]).css({'transition' : `all 0s ease-in-out 0s`})
                        }
                        if(thisClasses.includes('pxl-testimonial-carousel7')) {
                            let $imageNext = $(slides[index + 1]).find('.pxl-user-image');
                            let target = $imageNext.data('target');
                            let $imageTmp = $('.elementor-repeater-item-'+target);
                            if($imageTmp.length) {
                                let imgNextSrc = $imageNext.attr('src');
                                $imageTmp.addClass('animated');
                                $imageTmp.attr('src', imgNextSrc);
                            }
                        }
                    },
                    slideNextTransitionStart: function (speed) {  
                        const swiper = this;
                        const slides = swiper.slides;
                        let activeIndex = swiper.activeIndex;
                        let realIndex = swiper.realIndex;
                        let index = params['loop'] == true ? activeIndex : realIndex;
                        if(thisClasses.includes('pxl-testimonial-carousel7')) {
                            let $imagePrev = $(slides[index - 1]).find('.pxl-user-image');
                            let $imageActive = $(slides[index]).find('.pxl-user-image');
                            let target = $imageActive.data('target');
                            let $imageTmp = $('.elementor-repeater-item-'+target);
                            if($imageTmp.length) {
                                $imageActive.attr('data-target', '');
                                $imagePrev.attr('data-target', target);
                                let imgPrevSrc = $imagePrev.attr('src');
                                $imageTmp.addClass('animated');
                                $imageTmp.attr('src', imgPrevSrc);
                            }
                        }
                    },
                }
            };
            if(!container.hasClass('swiper-container-initialized')) {
                swiper = new Swiper(container[0], settings);
            }
        });
    };
} )( jQuery );