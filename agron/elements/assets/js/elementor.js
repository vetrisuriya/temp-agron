( function( $ ) {
    "use strict";

    function agronElAfterRender(){
        let _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter('pxl_element_container/after-render', function(ouput, settings) {
        });
    } 

    function agronElBeforeRender(){
        let _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        
        _elementor.hooks.addFilter( 'pxl_element_container/before-render', function( output, settings) {
            if(typeof settings.pxl_background_image != 'undefined' && settings.pxl_background_image.url != ''){
                output += '<div class="pxl-background"></div>';
            }
            return output;
        });
    } 

    function cursorSpotlight() {
        if(!$('.cursor-spotlight').length) return;
        $('.cursor-spotlight').on('mousemove', function(e) {
            const mouseX = e.offsetX;
            const mouseY = e.offsetY;    
            gsap.to(this, {
                '--pxl-translate-x': `${mouseX}px`,
                '--pxl-translate-y': `${mouseY}px`,
                '--pxl-box-size': '200px',
                duration: 0.3, 
                ease: 'power2.out', 
            });
        });
    
        $('.cursor-spotlight').on('mouseleave', function(e) {
            gsap.to(this, {
                '--pxl-box-size': '0px',
                duration: 0.5,
                ease: 'power2.out', 
            });
        });
    }

    function onScrollTranslateX() {
        let el = $('.scroll-marquee-animation .pxl-text-marquee-item');
        if (!el.length) return;
        let parent = el.closest('.elementor-element');
        let moveDistance = (el.outerWidth() > $(parent).width()) ? $(parent).width() - el.outerWidth() : 0;
        gsap.to(el, {
            x: moveDistance,
            ease: "none",
            duration: 5,
            scrollTrigger: {
                trigger: parent,
                start: "bottom bottom",
                end: `top center`,
                scrub: 2.5,
                pinSpacing: true,
                anticipatePin: 1,
                pinReparent: true,
            }
        });
    }

    function initCarouselFade() {
        let elements = $('.pxl-carousel');
        elements.each(function() {
            let navigationButtons = $(this).find('.navigation-button');
            let items = $(this).find('.carousel-item');
            navigationButtons.on('click', function(e) {
                e.preventDefault();
                let currentIndex = items.index($('.carousel-item.active'));
                if ($(this).hasClass('navigation-button-next')) {
                    let nextIndex = currentIndex + 1;
                    items.eq(currentIndex).removeClass('active');
                    if( nextIndex >= items.length) {
                        nextIndex = 0;
                    }
                    items.eq(nextIndex).addClass('active');
                } else {
                    let previousIndex = currentIndex - 1;
                    items.eq(currentIndex).removeClass('active'); 
                    if(previousIndex < 0) {
                        previousIndex = items.length - 1;
                    }
                    items.eq(previousIndex).addClass('active');
                }
            });
        });
    }

    function initScrollBasedParallax() {
        const els = $('[data-based-parallax]');
        if (!els.length || $(window).width() <= 991) return;
        els.each(function (i, el) {
            const params = $(el).data('based-parallax');
            let parent = $(el).closest('.e-con.elementor-element');
            $(parent).css({'overflow' : 'hidden', 'position' : 'relative'});
            const x = parseFloat(params.x) || 0;
            const y = parseFloat(params.y) || 0;
            const rotate = parseFloat(params.rotate) || 0;
            const scale = parseFloat(params.scale) || 1;
            if (x > 0) gsap.set(el, { left: -x });
            if (x < 0) gsap.set(el, { right: x });
            if (y > 0) gsap.set(el, { top: -y });
            if (y < 0) gsap.set(el, { bottom: y });     
            gsap.to(el, {
                x: x,
                y: y,
                rotate: rotate,
                scale: scale,
                ease: "none",
                duration: 0.25,
                scrollTrigger: {
                    trigger: parent,
                    start: "top 90%",
                    end: "bottom 10%",
                    scrub: true,
                },
            });
        });
        // ScrollTrigger.refresh();
    }

    $( window ).on( 'elementor/frontend/init', function() {
        agronElAfterRender();
        agronElBeforeRender()
        cursorSpotlight()
        onScrollTranslateX()
        initCarouselFade()
        initScrollBasedParallax()
    });


} )( jQuery );