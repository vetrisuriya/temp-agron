( function( $ ) {

    function hoverScaleSpotlight( $scope ) {
        let els = $scope.find('.hover-spotlight-scale');
        if(!els.length) return;
        const update = (e, isMouseenter) => {
            let item = $(e.currentTarget).find('.item-spotlight').first();
            if (isMouseenter && !item.length) {
                item = $('<span class="item-spotlight"></span>');
                $(e.currentTarget).prepend(item);
            }
            const { left, top, width, height } = e.currentTarget.getBoundingClientRect();
            const mouseX = e.clientX - left;
            const mouseY = e.clientY - top;
            const distToCorners = [
                Math.hypot(mouseX, mouseY), 
                Math.hypot(mouseX - width, mouseY), 
                Math.hypot(mouseX, mouseY - height),
                Math.hypot(mouseX - width, mouseY - height) 
            ];
            const maxRadius = Math.max(...distToCorners);
    
            gsap.to(item, {
                x: mouseX,
                y: mouseY,
                ease: "none",
                duration: 0.3,
                scale: isMouseenter ? (maxRadius / 10) + 0.2 : 0, 
            });
        };
        els.each(function(i, el) {
            $(el).on('mouseenter', (e) => update(e, true));
            $(el).on('mouseleave', (e) => update(e, false));
        })
    }

    function onHoverCatter($scope) {
        let els = $scope.find('.grid.pxl-team-layout1 .pxl-post-socials');
        if (els.length === 0) return;
        els.each(function (i, el) {
            const $el = $(el);
            const $socialItems = $el.find('.pxl-social-item');
            const $socialIcon = $el.find('.pxl-social-icon');

            const iconOffset = $socialIcon.offset();
            const iconWidth  = $socialIcon.outerWidth();
            const iconHeight = $socialIcon.outerHeight();

            let hideTimeout;

            $socialItems.each(function (j, item) {
                const $item = $(item);
                const itemOffset = $item.offset();
                const itemWidth = $item.outerWidth();
                const itemHeight = $item.outerHeight();

                const dx = (iconOffset.left + iconWidth / 2) - (itemOffset.left + itemWidth / 2);
                const dy = (iconOffset.top + iconHeight / 2) - (itemOffset.top + itemHeight / 2);

                gsap.set(item, {
                    x: dx,
                    y: dy,
                    opacity: 0,
                });
            });

            $el.on('mouseenter', function () {
                clearTimeout(hideTimeout);
                $el.css({'pointer-events': 'visible'});
                $socialItems.each(function (j, item) {
                    gsap.to(item, {
                        x: 0,
                        y: 0,
                        opacity: 1,
                        duration: 0.4,
                        ease: "power2.out",
                    });
                });
            });

            $el.on('mouseleave', function (e) {
                const toEl = e.relatedTarget;
                if ($(toEl).closest('.pxl-social-item').length > 0) return;
                hideTimeout = setTimeout(() => {
                    $el.css({'pointer-events': 'none'});
                    $socialItems.each(function (j, item) {
                        const $item = $(item);
                        const itemOffset = $item.offset();
                        const itemWidth = $item.outerWidth();
                        const itemHeight = $item.outerHeight();

                        const dx = (iconOffset.left + iconWidth / 2) - (itemOffset.left + itemWidth / 2);
                        const dy = (iconOffset.top + iconHeight / 2) - (itemOffset.top + itemHeight / 2);

                        gsap.to(item, {
                            x: dx,
                            y: dy,
                            opacity: 0,
                            duration: 0.4,
                            ease: "power2.in",
                        });
                    });
                }, 50); 
            });

            // Thêm sự kiện mouseleave cho social item để ẩn khi rời luôn
            $socialItems.on('mouseleave', function () {
                hideTimeout = setTimeout(() => {
                    $socialItems.each(function (j, item) {
                        const $item = $(item);
                        const itemOffset = $item.offset();
                        const itemWidth = $item.outerWidth();
                        const itemHeight = $item.outerHeight();

                        const dx = (iconOffset.left + iconWidth / 2) - (itemOffset.left + itemWidth / 2);
                        const dy = (iconOffset.top + iconHeight / 2) - (itemOffset.top + itemHeight / 2);

                        gsap.to(item, {
                            x: dx,
                            y: dy,
                            opacity: 0,
                            duration: 0.4,
                            ease: "power2.in",
                        });
                    });
                }, 50);
            });

            // Nếu chuột quay lại icon nhanh thì huỷ ẩn
            $socialItems.on('mouseenter', function () {
                clearTimeout(hideTimeout);
            });
        });

    }
    
    function hoverTilt($scope) {
        const els = $scope.find(".hover-tilt");
        if(!els.length) return;
        const tilt = $(els).tilt({
            reverse: false,
            max: 10,
            speed: 250,
            perspective: 1000,
            transition: true,
            gyroscope: true,
            gyroscopeMinAngleX: -15,
            gyroscopeMaxAngleX: 15,
            gyroscopeMinAngleY: -15,
            gyroscopeMaxAngleY: 15,
            easing: "cubic-bezier(.03,.98,.52,.99)",    
        });

        tilt.on('change', function(e, transforms) {
            let tiltX = transforms.tiltX;
            let tiltY = transforms.tiltY;
            let tiltItems = $(this).find('.tilt-item');
            tiltItems.each(function() {
                let depth = 50;
                $(this).css({
                    'transform' : `translateZ(${depth}px) translateX(${tiltX * (depth / 50)}px) translateY(${tiltY * (depth / 50)}px)`,
                })
            }) 
        }); 
    }

    function hoverImageDistortionTransition( $scope ) {
        let els = $scope.find('.hover-image-distortion-transition');
        if(!els.length) return;
        els.each(function() {
            const img = $(this).find('img')
            let src = $(img).attr('src');
            let currentEl = $(this);
            let width = parseInt($(img).attr('width')) ?? 1;
            let height = parseInt($(img).attr('height')) ?? 1;
            let myAnimation = new hoverEffect({
                parent: $(this)[0],
                intensity: 0.3,
                image1: src,
                image2: src,
                displacementImage: currentEl.attr('data-displacement') ?? 'http://agron.local/wp-content/uploads/2025/01/displacement-1.webp',
                imagesRatio: height/width,
            });
        })
    }

    
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_button.default`, function( $scope ) {
            hoverScaleSpotlight($scope);
        });
        elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_button_play.default`, function( $scope ) {
            hoverScaleSpotlight($scope);
        });
        elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_team.default`, function($scope) {
            onHoverCatter($scope);
        });
    });
} )( jQuery );

