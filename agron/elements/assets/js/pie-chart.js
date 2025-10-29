( function( $ ) {
    function initPieChart( $scope ) {
        let elements = $scope.find('.pxl-pie-chart > .pxl-chart');
        if (!elements.length) return;
        elements.each(function (index, element) {
            const params = $(element).data('pie-chart'); 
            $(element).easyPieChart({
                size: params.chartSize,
                barColor: params.barColor,
                scaleLength: 0,
                lineWidth: params.lineWidth,
                trackColor: params.trackColor,
                lineCap: params.lineCap,
                animate: 1500,
                rotate: params.rotate,
                // percent: params.percent
            });
        });
    }
    
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_pie_chart.default`, function( $scope ) {
            initPieChart($scope);
        });
    } );
} )( jQuery );