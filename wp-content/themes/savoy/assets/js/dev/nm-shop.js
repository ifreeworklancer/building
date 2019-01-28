(function($) {
	
	'use strict';
	
	// Extend core script
	$.extend($.nmTheme, {
		
		/**
		 *	Initialize scripts
		 */
		shop_init: function() {
			var self = this;
			
			
			// Shop select config
			self.shopSelectConfig = {
				onOpen: function() {
                    var $this = $(this);
                    
                    $this.closest('tr').addClass('open');
                    
                    // Set options-menu width
                    var menuWidth = $this.closest('tr')[0].getBoundingClientRect().width; // Get menu-width including sub-pixel value (to avoid 1px gap)
                    $this.children('.sod_list_wrapper').css('width', menuWidth+'px');
                    
                    // Trigger "focusin" event on original select element to make sure WooCommerce updates the options
					$this.children('select').trigger('focusin');
				},
				onChange: function() {
                    $(this).closest('tr').removeClass('open');
				},
				onClose: function() {
                    $(this).closest('tr').removeClass('open');
				}
			};
			
			
			/* Shop */
			if (self.isShop) {
                // Shop vars and elements
				self.shopAjax = false;
				self.scrollOffsetDesktop = parseInt(nm_wp_vars.shopScrollOffset);
                self.scrollOffsetTablet = parseInt(nm_wp_vars.shopScrollOffsetTablet);
                self.scrollOffsetMobile = parseInt(nm_wp_vars.shopScrollOffsetMobile);
                self.infloadScroll = false;
				self.categoryClicked = false;
				self.shopLoaderSpeed = 300;
				self.shopScrollSpeed = 410;
				self.$shopBrowseWrap = $('#nm-shop-browse-wrap');
				self.imageLazyLoading = (nm_wp_vars.shopImageLazyLoad != '0') ? true : false;
				if (nm_wp_vars.shopFiltersAjax != '0') {
					// Check if AJAX should be disabled on mobile devices
					self.filtersEnableAjax = (self.isTouch && nm_wp_vars.shopFiltersAjax != '1') ? false : true;
				} else {
					self.filtersEnableAjax = false;
				}
				
				
                // Set page-scroll offset
                self.shopSetScrollOffset();
                // Set shop min-height (keep above "shopSetScrollOffset()")
				self.shopSetMinHeight();
				
				
				/* Bind: Window resize */
				var timer = null;
				self.$window.resize(function() {
					if (timer) { clearTimeout(timer); }
					timer = setTimeout(function() {
						// Set shop min-height
						self.shopSetMinHeight();
                        // Set page-scroll offset
                        self.shopSetScrollOffset();
					}, 250);
				});
				
				
				if (self.$pageIncludes.hasClass('banner-slider')) {
					// Wait for "banner-slider-loaded" event (banner slider changes height)
					self.$document.on('banner-slider-loaded', function() {
						self.shopUrlHashScroll();
					});
				} else {
					self.shopUrlHashScroll();
				}                                                
                
                
                // Lazyload: Add class to fade-in product images
                if (self.imageLazyLoading) {
                    setTimeout(function() {
                        self.$shopWrap.addClass('images-show');
                    }, 50);
                }
                
                
                if (self.filtersEnableAjax) {
                    /* Bind: Back button "popstate" event */
                    self.$window.on('popstate.nmshop', function(e) {
                        // Return if no "popstate" tag/id is set
                        if (!e.originalEvent.state) { return; }
                        
                        // Make sure the "popstate" event is ours (nmShop)
                        if (e.originalEvent.state.nmShop) {
                            // Load full page from saved "pushState" url
                            self.shopGetPage(window.location.href, true);
                        }
                    });
                }
				
				
				/* 
				 * Bind: Header main menu shop link 
				 * Note: "shop-link" class is added manually in WP admin
				 */
				$('#nm-main-menu-ul').children('.shop-link').find('> a').bind('click', function(e) {
					e.preventDefault();
					self.shopScrollToTop(); // Smooth-scroll to shop
				});
				
				
				if (self.filtersEnableAjax) {
                    /* Bind: Results bar - Filters reset link */
					self.$shopWrap.on('click', '#nm-shop-filters-reset', function(e) {
						e.preventDefault();
                        var resetUrl = location.href.replace(location.search, ''); // Get current URL without query-strings
                        self.shopGetPage(resetUrl);
					});
                    
                    /* Bind: Results bar - Search/taxonomy reset link */
					self.$shopWrap.on('click', '#nm-shop-search-taxonomy-reset', function(e) {
						e.preventDefault();
						
                        var $resetButton = $(this);
                        if ($resetButton.closest('.nm-shop-results-bar').hasClass('is-search')) {
                            // Search
                            var urlSearchParam = self.urlGetParameter('s'), // Check for the "s" parameter in the current page URL
                                // Search from external page: Get default/main shop URL (current URL may not be the default shop URL)
                                // Search from shop page: Get current URL without query-strings (current URL is a shop URL)
                                resetUrl = (urlSearchParam) ? $resetButton.data('shop-url') : location.href.replace(location.search, '');
                        } else {
                            // Category or tag
                            var resetUrl = $resetButton.data('shop-url'); // Get default/main shop URL
                        }
                        
                        self.shopGetPage(resetUrl);
					});
				}
			}
			
			
			/* 
			 * Variation selects - Bind: Product variations updated event - Triggered from "add-to-cart-variation.js"
			 * Note: See "self.shopSelectConfig" for related "focusin" event
			 */
			if (self.shopCustomSelect) {
                self.$document.on('woocommerce_update_variation_values', '#nm-variations-form', function() {
                    // Update select(s) in case options have been added/removed by WooCommerce
                    $('#nm-variations-form').find('select').each(function() {
                        $(this).selectOrDie('update');
                    });
                });
            }
			
			
			if (typeof wc_add_to_cart_params !== 'undefined' && wc_add_to_cart_params.cart_redirect_after_add !== 'yes') { // Only bind if add-to-cart redirect is disabled
				/* Add-to-cart event: Show mini cart with loader overlay */
                self.$body.on('adding_to_cart', function(event, $button, data) {
					// Is widget/cart panel enabled?
					if (self.$widgetPanel.length) {
                        if (!self.quickviewIsOpen()) {
							self.widgetPanelShow(true); // Args: showLoader
						}
					} else {
						// Show widget/cart panel overlay
                        self.$widgetPanelOverlay.addClass('nm-loader show');
					}
				});
				/* Add-to-cart event: Hide mini cart loader overlay */
                self.$body.on('added_to_cart', function(event, fragments, cartHash) {
					// Is widget/cart panel enabled?
					if (self.$widgetPanel.length) {
                        if (!self.quickviewIsOpen()) {    
							self.widgetPanelCartHideLoader();
						}
					} else {
						// Hide widget/cart panel overlay
                        self.$widgetPanelOverlay.trigger('click').removeClass('show nm-loader');
					}
				});
			} else {
				// Disable default WooCommerce AJAX add-to-cart event if redirect is enabled
				self.$document.off( 'click', '.add_to_cart_button' );
			}
			
			
			// Load extension scripts
			self.shopLoadExtension();
		},
		
		
		/**
		 *	Shop: Load extension scripts
		 */		
		shopLoadExtension: function() {
			var self = this;
			
			// Extension: Add to cart
			if ($.nmThemeExtensions.add_to_cart) {
				$.nmThemeExtensions.add_to_cart.call(self);
			}
			
			if (self.isShop) {
				// Extension: Infinite load
				if ($.nmThemeExtensions.infload) {
					$.nmThemeExtensions.infload.call(self);
				}
				
				// Extension: Filters
				if ($.nmThemeExtensions.filters) {
					$.nmThemeExtensions.filters.call(self);
				}
				
				// Extension: Search
				if (self.searchEnabled && $.nmThemeExtensions.search) {
					$.nmThemeExtensions.search.call(self);
				}
			}
			
			// Extension: Quickview
			if (self.$pageIncludes.hasClass('quickview')) {
				if ($.nmThemeExtensions.quickview) {
					$.nmThemeExtensions.quickview.call(self);
				}
			}
		},
		
		
		/**
		 *	Shop: Check for URL #hash and scroll/jump to shop if added
		 */
		shopUrlHashScroll: function() {
			var self = this;
			
			if (window.location.hash === '#shop') {
				self.shopScrollToTop(true); // Arg: (jumpTo)
			}
		},
		
		
		/**
		 *	Shop/Single-product: Toggle variation details
		 */
		/*shopToggleVariationDetails: function() {
			var $variationDetails = $('#nm-product-summary').find('.single_variation'),
				$variationDetailsChildren = $variationDetails.children(),
			    variationDetailsEmpty = true;
            
            // Show variation details container (if it's not empty)
			if ($variationDetailsChildren.length) {
                
                // WooCommerce v2.5: Make sure the variation details wrapper elements are not empty either
				for (var i = 0; i < $variationDetailsChildren.length; i++) {
					if ($.trim($variationDetailsChildren.eq(i).html()).length) {
						variationDetailsEmpty = false;
						break;
					}
				}
			}
            
            if (variationDetailsEmpty) {
				$variationDetails.removeClass('show');
			} else {
                $variationDetails.addClass('show');
            }
		},*/
        /**
		 *	Shop/Single-product: Check variation details (hide if empty)
		 */
		shopCheckVariationDetails: function($variationDetailsWrap) {
            var $variationDetailsChildren = $variationDetailsWrap.children(),
			    variationDetailsEmpty = true;
            
			if ($variationDetailsChildren.length) {
                // Check for variation detail elements
				for (var i = 0; i < $variationDetailsChildren.length; i++) {
                    if ($variationDetailsChildren.eq(i).children().length) {
						variationDetailsEmpty = false;
						break;
					}
				}
			}
            
            if (variationDetailsEmpty) {
				$variationDetailsWrap.hide();
			} else {
                $variationDetailsWrap.show();
            }
		},
		
        
        /**
		 *	Shop: Set page-scroll offset
		 */
		shopSetScrollOffset: function() {
			var self = this,
                pageWidth = self.$body.width();
            
            // Desktop
            if (pageWidth > 863) {
                self.scrollOffset = (self.$header.hasClass('static-on-scroll')) ? self.$header.outerHeight() : self.scrollOffsetDesktop;
            }
            // Tablet
            else if (pageWidth > 383) {
                self.scrollOffset = self.scrollOffsetTablet;
            } 
            // Mobile
            else {
                self.scrollOffset = self.scrollOffsetMobile;
            }
		},
        
		
		/**
		 *	Shop: Set shop min-height
		 */
		shopSetMinHeight: function() {
			var self = this,
				footerHeight = $('#nm-footer').outerHeight(true);
            
            self.$shopWrap.css('min-height', (self.$window.height() - (footerHeight + self.scrollOffset))+'px');
		},
		
		
		/**
		 *	Shop: Scroll to shop-top (directly below header)
         *        - Returns variable "to" with the smooth-scroll animation speed so "setTimeout()" can be used
		 */
		shopScrollToTop: function(setHeight, jumpTo) {
			var self = this,
                to = 0;
            
            if (self.$window.width() > 399) {
                var shopPosition = Math.round(self.$shopWrap.offset().top - self.scrollOffset);
            } else {
                var shopPosition = Math.round($('#nm-shop-products').offset().top - 24 - self.scrollOffset);
            }
			
            if (setHeight) {
                // Set shop min-height
                self.shopSetMinHeight();
            }
            
			if (jumpTo) {
				$('html, body').scrollTop(shopPosition);
			} else {
                to = self.shopScrollSpeed;
                
				$('html, body').animate({'scrollTop': shopPosition}, self.shopScrollSpeed);
			}
            
            return to;
		},
		
		
		/**
		 *	Shop: Remove any visible shop notices
		 */
		shopRemoveNotices: function() {
			$('#nm-shop-notices-wrap').empty();
		},
		
		
		/**
		 *	Shop: Show "loader" overlay
		 */
		shopShowLoader: function(disableAnimation) {
			var $shopLoader = $('#nm-shop-products-overlay');
			
			if (disableAnimation) {
				$shopLoader.addClass('no-anim');
			}
							
			$shopLoader.addClass('show');
		},
		
		
		/**
		 *	Shop: Hide "loader" overlay
		 */
		shopHideLoader: function(disableAnimation) {
			var self = this,
				$shopLoader = $('#nm-shop-products-overlay');
			
			if (!disableAnimation) {
				$shopLoader.removeClass('no-anim');
			}
			
			$shopLoader.removeClass('nm-loader').addClass('fade-out');
			setTimeout(function() {
				$shopLoader.removeClass('show fade-out').addClass('nm-loader'); 
			}, self.shopLoaderSpeed);
			
			if (self.infloadScroll) {
				self.infscrollLock = false; // "Unlock" infinite scroll
				self.$window.trigger('scroll'); // Load next page (if correct scroll position)
			}
		},
        
        
        /**
		 *	Single product: Variations
         *
         *  Note: This function is placed here so it's available to the Quick-view
		 */
		singleProductVariationsInit: function($variationsForm) {
			var self = this,
                $variationsWrap = $variationsForm.children('.variations'),
                $variationDetailsWrap = $variationsForm.children('.single_variation_wrap').children('.single_variation');
            
            
			// Custom select boxes
            if (self.shopCustomSelect) {
                var $selectBoxes = $variationsWrap.find('select'), $selectBox;
                for (var i = 0; i < $selectBoxes.length; i++) {
                    $selectBox = $selectBoxes.eq(i);
                    // Make sure the select-box isn't hidden
                    if (! $selectBox.parent().hasClass('nm-select-hidden')) {
                        $selectBox.selectOrDie(self.shopSelectConfig);
                    }
                }
            }
            
            
            // Custom variation controls: Bind
            var clickThrottle = null;
            $variationsWrap.find('.nm-variation-control').children('li').bind('click', function() {
                if (clickThrottle) { return; } // Prevent selection before variation-image has changed
                
                var $this = $(this),
                    $container = $this.parent(),
                    $select = $container.parent().children('.nm-select-hidden').find('select'),
                    value = $this.data('value');
                $container.children('.selected').removeClass('selected');
                $this.addClass('selected');
                $select.val(value).trigger('change'); // Change value and trigger "change" event on hidden select
                
                clickThrottle = setTimeout(function() { clickThrottle = null; }, 300);
            });
            
            
            // Variation details
            self.shopCheckVariationDetails($variationDetailsWrap);
            // Variation details: Bind WooCommerce "show_variation" event
			$variationDetailsWrap.on('show_variation', function() {
                self.shopCheckVariationDetails($(this));
            });
            // Variation details: Bind WooCommerce "hide_variation" event
			$variationDetailsWrap.on('hide_variation', function() {
                $variationDetailsWrap.css('display', 'none'); // Add "display:none" to skip default animation
            });
		},
		
		
		/**
		 *	Quick view: Check if quick view modal is open
		 */
		quickviewIsOpen: function() {
            return $('#nm-quickview').is(':visible');
		}
		
	});
	
	// Add extension so it can be called from $.nmThemeExtensions
	$.nmThemeExtensions.shop = $.nmTheme.shop_init;
	
})(jQuery);
