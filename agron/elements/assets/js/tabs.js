( function( $ ) {
    "use strict";
    
    var initTabs = function( $scope ) {
    };

    const handleTabsServiceLayout = function ( $scope ) {  
        let elements = $scope.find('.tab-custom');
        if(!elements.length) return;
        elements.each(function () {
            const element = $(this);
            let tabButtons = element.find('.tab-button');
            let tabContents = element.find('.tab-content');
            if(!tabButtons.length || !tabContents.length) return;
            tabButtons.on('click', function() {
                let buttonIndex = $(this).index();
                tabButtons.removeClass('active');
                tabContents.removeClass('active');
                $(this).addClass('active');
                $(tabContents[buttonIndex]).addClass('active');
                $(tabContents[buttonIndex]).css({'position': 'absolute'});
                $(tabContents[buttonIndex]).parent('.tab-contents').css({'height': `${$(tabContents[buttonIndex]).outerHeight()}px`})
            })
        })
    }

    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_service.default', function ($scope) {  
            handleTabsServiceLayout($scope)
        });
    } );

} )( jQuery );