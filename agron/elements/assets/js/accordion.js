( function( $ ) {
    "use strict";
    const accordionHandle = function($scope) {
        const els = $scope.find('.pxl-accordion');
        if (!els.length) return;
        els.each(function() {
            const el = $(this);
            let items = el.find('.pxl-accordion-item');
            items.each(function() {
                const $item = $(this);
                if ($item.hasClass('active')) {
                    const content = $item.find('.pxl-accordion-content')[0];
                    gsap.set(content, { height: content.scrollHeight });
                }
            });

            items.on('click', function(e) {
                const currentItem = $(this);
                if (currentItem.hasClass('active')) return;
                else e.preventDefault();
                items = el.find('.pxl-accordion-item');
                let contents = el.find('.pxl-accordion-content');
                const currentContent = currentItem.find('.pxl-accordion-content')[0];
                items.removeClass('active');
                gsap.to(contents, { height: 0, duration: 0.5 });
                currentItem.addClass('active');
                gsap.to(currentContent, {
                    height: 'auto',
                    duration: 0.5,
                });
            });
        });
    };   

    
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_accordion.default`, function( $scope ) {
            accordionHandle($scope);
        });
    });
} )( jQuery );