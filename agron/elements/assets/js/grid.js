( function( $ ) {
    "use strict";
    
    $( window ).on( 'elementor/frontend/init', function() {
        setTimeout(function(){
            $('.grid').each(function(index, element) { 
                var $grid_scope = $(this);
                const masonry = $grid_scope.find('.masonry');
                var isoOptions = {
                    layoutMode : 'masonry',
                    percentPosition: true,
                    itemSelector: '.grid-item',
                    masonry: {
                        columnWidth: '.grid-sizer',
                    },
                };
                if(masonry.lenght) {
                    var $grid_isotope = $(masonry).isotope(isoOptions);
                }
                 
                // Filter
                $(document).on('click', '.pxl-grid-filter .filter-item, .pxl-filter-widget .filter-item', function(e) {
                    e.preventDefault()
                    let filterItemCurrent = $(this);
                    let term_slug = filterItemCurrent.attr('data-filter');  
                    let filterWrap = filterItemCurrent.parent('.pxl-grid-filter');
                    $('.pxl-filter-widget .filter-item').removeClass('active');        
                    $(this).addClass('active');
                    if( $(filterWrap).hasClass('ajax') ){
                        let loadmore = $grid_scope.data('loadmore');
                        loadmore.term_slug = term_slug;
                        agron_grid_ajax_handler( filterItemCurrent, $grid_scope, $grid_isotope, 
                            { action: 'agron_load_more_post_grid', loadmore: loadmore, iso_options: isoOptions, handler_click: 'filter', scrolltop: 0 }
                        );
                    }else{
                        $grid_isotope.isotope({ filter: term_slug });
                    }
                });

                // Pagination
                $grid_scope.on('click', '.grid-pagination.ajax a.page-numbers', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    var $this = $(this);
                    var loadmore = $grid_scope.data('loadmore');
                    var paged = $this.attr('href');
                    paged = paged.replace('#', '');
                    loadmore.paged = parseInt(paged);
                    agron_grid_ajax_handler( $this, $grid_scope, $grid_isotope, 
                        { 
                            action: 'agron_load_more_post_grid', 
                            loadmore: loadmore, 
                            iso_options: isoOptions, 
                            handler_click: 'pagination', 
                            scrolltop: 0,
                            wpnonce: main_data.wpnonce 
                        }
                    );
                });

                // Load More
                $grid_scope.on('click', '.pxl-load-more-button', function(e) {
                    e.preventDefault();
                    var $this = $(this);
                    var loadmore = $grid_scope.data('loadmore');
                    loadmore.paged = parseInt($grid_scope.data('start-page')) + 1; 
                    agron_grid_ajax_handler( $this, $grid_scope, $grid_isotope, 
                        { action: 'agron_load_more_post_grid', loadmore: loadmore, iso_options: isoOptions, handler_click: 'loadmore', scrolltop: 0, wpnonce: main_data.wpnonce }
                    );
                });
            });
        }, 300);

        function agron_grid_ajax_handler($this, $grid_scope, $grid_isotope, args = {}){
            var settings = $.extend( true, {}, {
                action: '',
                loadmore: '',
                iso_options: {},
                handler_click: '',
                scrollTop: 0,
                wpnonce: ''
            }, args );
            $.ajax({
                url: main_data.ajax_url,
                type: 'POST',
                data: {
                    action: settings.action,
                    settings: settings.loadmore,
                    handler_click: settings.handler_click,
                    wpnonce: settings.wpnonce
                },
                beforeSend: function() {  
                    settings.scrollTop = $(window).scrollTop();
                    $grid_scope.find('.pxl-grid-loader').addClass('loading');
                },
                success: function( res ) {   
                    console.log(settings)
                    if(res.status == false) return; 
                    if( settings.handler_click == 'loadmore' ){
                        $grid_scope.find('.grid-inner').append(res.data.html)
                        if(res.data.paged >= res.data.max){
                            $grid_scope.find('.pxl-load-more-wrapper').hide()
                        }
                    }else{
                        $grid_scope.find(".grid-pagination").html(res.data.pagin_html);
                        $grid_scope.find('.grid-inner .grid-item').remove();
                        $grid_scope.find('.grid-inner').append(res.data.html);
                    }
                    // if( settings.iso_options){
                    //     $grid_isotope.isotope('destroy');
                    //     $grid_isotope.isotope(settings.iso_options);
                    // }
                    if( $grid_scope.find('.pxl-grid-filter').hasClass('pxl-animate') ){
                        var $animate_el = $grid_scope.find('.pxl-grid-filter'),
                            data = $animate_el.data('settings');  
                        if(typeof data != 'undefined' && typeof data['animation'] != 'undefined'){
                            setTimeout(function () {
                                $animate_el.removeClass('pxl-invisible').addClass('animated ' + data['animation']);
                            }, data['anim_delay']);
                        }else{
                            setTimeout(function () {
                                $animate_el.removeClass('pxl-invisible').addClass('animated fadeInUp');
                            }, 300);
                        }
                    } 
                    $grid_scope.data('start-page', res.data.paged);
                },
                complete: function() {
                    $(window).scrollTop(settings.scrollTop);
                    $grid_scope.find('.grid-item').addClass('pxl-invisible');
                    $grid_scope.find('.pxl-grid-loader').removeClass('loading');
                }
            });
        }
    });
     
} )( jQuery );