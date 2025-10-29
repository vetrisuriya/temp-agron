( function( $ ) {
    "use strict";

    function mansoryLayout( $scope ) { 
        let masonrys = $scope.find('.masonry');
        if(!masonrys.length) return;
        masonrys.each(function () {  
            const masonry = $(this);
            masonry.isotope({
                itemSelector: '.grid-item',
                layoutMode: 'masonry',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer',
                },
            });
        })
    }

    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_image_gallery.default`, function( $scope ) {
            mansoryLayout($scope);
        });
    });


} )( jQuery );