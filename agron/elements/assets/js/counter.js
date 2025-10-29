// ;(function ($) {
// 	'use strict';
// 	function initCounter($scope) {
// 		gsap.registerPlugin(ScrollTrigger);
// 		let $elements = $scope.find('.number-value.counter');
// 		if (!$elements.length) return;
// 		$elements.each(function () {
// 			let $el = $(this);
// 			let delimiter = $el.attr('data-delimiter') || '';
// 			let rawText = $.trim($el.text());
// 			let numberOnly = rawText.replace(/[^0-9.,]/g, '');
// 			let normalized = numberOnly.replace(/,/g, '.');
// 			let targetValue = parseFloat(normalized);
// 			let decimalPlace = countDecimals(targetValue);
// 			if (isNaN(targetValue)) {
// 				console.warn('Counter: Invalid number format in');
// 				return;
// 			}
// 			console.log(this)
// 			gsap.fromTo(
// 				this,
// 				{ innerText: 0 },
// 				{
// 					innerText: targetValue,
// 					duration: 1.2,
// 					scrollTrigger: {
// 						trigger: $el[0],
// 						start: 'top 95%',
// 						toggleActions: 'play reset play reset'
// 					},
// 					snap: { innerText: 1 },
// 					onUpdate: function () {
// 						let raw = $el[0].innerText.replace(/[^0-9.,]/g, '');
// 						let normalized = raw.replace(/,/g, '.');
// 						let current = parseFloat(normalized);
// 						if (!isNaN(current)) {
// 							$el[0].innerText = formatNumber(current, decimalPlace, delimiter);
// 						}
// 					}
// 				}
// 			);
// 		});

// 		function countDecimals(val) {
// 			if (Math.floor(val) === val) return 0;
// 			let parts = val.toString().split('.');
// 			return parts[1] ? parts[1].length : 0;
// 		}

// 		function formatNumber(value, decimals, delimiter) {
// 			if (delimiter === '') return parseFloat(value).toFixed(decimals);

// 			let locale = 'en-US';
// 			let options = {
// 				minimumFractionDigits: decimals,
// 				maximumFractionDigits: decimals,
// 				useGrouping: true
// 			};

// 			if (delimiter === '.') {
// 				locale = 'de-DE'; // 1.234,56
// 			} else if (delimiter === ' ') {
// 				locale = 'fr-FR'; // 1 234,56
// 			}

// 			return new Intl.NumberFormat(locale, options).format(value);
// 		}
// 	}
// 	$(window).on('elementor/frontend/init', function () {
// 		const init = function ($scope) {
// 			setTimeout(() => {
// 				initCounter($scope);
// 				ScrollTrigger.refresh();
// 			}, 300);
// 		};

// 		elementorFrontend.hooks.addAction('frontend/element_ready/pxl_counter.default', init);
// 		elementorFrontend.hooks.addAction('frontend/element_ready/pxl_counter_box.default', init);
// 	});
		
// })(jQuery);
