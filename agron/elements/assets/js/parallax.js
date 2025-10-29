( function( $ ) {
  "use strict"

  function hoverButtonParallax($scope) {
    const els = $scope.find('.hover-button-parallax');
    if (!els.length) return;

    $(els).on({
        mousemove(e) {
          const rect = this.getBoundingClientRect();
          const x = e.clientX - rect.left;
          const y = e.clientY - rect.top;
          const moveX = (x - rect.width / 2) * 0.25;
          const moveY = (y - rect.height / 2) * 0.25;
          gsap.to(this, {
              x: moveX,
              y: moveY,
              duration: 0.25,
              ease: "power4.out",
          });
          const elText = $(this).find('.pxl-button-text');
          const elIcon = $(this).find('.pxl-button-icon');
          if (elText.length) {
              gsap.to(elText, {
                  x: moveX / 2,
                  y: moveY / 2,
                  duration: 0.25,
                  ease: "power4.out",
              });
          }
          if (elIcon.length) {
              gsap.to(elIcon, {
                  x: moveX / 2,
                  y: moveY / 2,
                  duration: 0.25,
                  ease: "power4.out",
              });
          }
        },
        mouseleave() {
          gsap.to(this, {
              x: 0,
              y: 0,
              duration: 0.25,
              ease: "power1.out",
          });
          const elText = $(this).find('.pxl-button-text');
          const elIcon = $(this).find('.pxl-button-icon');
          if (elText.length) {
              gsap.to(elText, {
                  x: 0,
                  y: 0,
                  duration: 0.25,
                  ease: "back.out",
              });
          }
          if (elIcon.length) {
              gsap.to(elIcon, {
                  x: 0,
                  y: 0,
                  duration: 0.25,
                  ease: "back.out",
              });
          }
        },
    });
  }
  function hoverImageParallax($scope) {
    const els = $scope.find('.hover-image-parallax');
    if (!els.length) return;
    $(els).on({
      mousemove(e) {
      const img = $(this).find('img');
      if (!img.length) return;
      const rect = this.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const moveX = (x - rect.width / 2) * 0.125;
      const moveY = (y - rect.height / 2) * 0.125;
      gsap.to(img, {
        x: moveX,
        y: moveY,
        scale: 1.15,
        duration: 0.25,
        ease: "none",
      });
      },
      mouseleave() {
      const img = $(this).find('img');
      if (!img.length) return;
      gsap.to(img, {
        x: 0,
        y: 0,
        scale: 1,
        duration: 0.25,
        ease: "none",
      });
      },
    });
  }

  $( window ).on( 'elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_image.default`, function( $scope ) {
      hoverImageParallax($scope);
    });
    elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_project.default`, function( $scope ) {
      hoverImageParallax($scope);
    });
    elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_team.default`, function( $scope ) {
      hoverImageParallax($scope);
    });
    elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_service.default`, function( $scope ) {
      hoverImageParallax($scope);
    });
    elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_post.default`, function( $scope ) {
      hoverImageParallax($scope);
    });
    elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_button.default`, function( $scope ) {
      hoverButtonParallax($scope);
    });
    elementorFrontend.hooks.addAction( `frontend/element_ready/pxl_button_play.default`, function( $scope ) {
      hoverButtonParallax($scope);
    });   
  });
} )( jQuery );