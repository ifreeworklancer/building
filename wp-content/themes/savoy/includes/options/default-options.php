<?php
	/*
	 *	Default theme options
	 *	
	 *	Note: To re-generate default options use "var_export($nm_theme_options)" on -unchanged- options
	 */
	
	$default_options = array (
        'full_width_layout' => 0,
        'page_load_transition' => 0,
        'wp_gallery_popup' => 1,
        'font_awesome' => 0,
        'font_awesome_version' => '4',
		'wp_admin_bar' => 1,
        'vcomp_enable_frontend' => 0,
        'vcomp_stock' => 0,
		'top_bar' => 0,
		'top_bar_text' => 'Welcome to our shop!',
		'top_bar_left_column_size' => 6,
		'top_bar_social_icons' => '0',
		'header_layout' => 'centered',
        'header_layout_mobile' => 'alt',
		'header_fixed' => 1,
		'header_transparency' => 0,
        'header_transparency_homepage' => '0',
        'header_transparency_shop' => '0',
        'header_transparency_shop_categories' => '0',
        'header_spacing_top' => 17,
        'header_spacing_top_alt' => 10,
		'logo_spacing_bottom' => 0,
        'header_spacing_bottom' => 17,
        'header_spacing_bottom_alt' => 10,
		'header_border' => 1,
		'home_header_border' => 1,
		'shop_header_border' => 1,
        'logo_height' => 16,
		'logo_height_tablet' => 16,
		'logo_height_mobile' => 16,
        'alt_logo' => 0,
        'alt_logo_visibility' =>
            array(
                'alt-logo-home' => '0',
                'alt-logo-fixed' => '0',
                'alt-logo-tablet' => '0',
                'alt-logo-mobile' => '0',
                'alt-logo-header-transparency-light' => '0',
                'alt-logo-header-transparency-dark' => '0'
            ),
		'menu_height' => 50,
        'menu_height_tablet' => 50,
        'menu_height_mobile' => 50,
        'menu_login' => 1,
		'menu_login_popup' => 0,
		'menu_login_icon' => 0,
        'menu_login_icon_html' => '<i class="nm-myaccount-icon nm-font nm-font-user"></i>',
		'menu_cart' => '1',
		'menu_cart_icon' => 0,
        'menu_cart_icon_html' => '<i class="nm-menu-cart-icon nm-font nm-font-shopping-cart"></i>',
		'widget_panel_color' => 'dark',
        'cart_panel_quantity_arrows' => 1,
		'footer_sticky' => 1,
		'footer_widgets_layout' => 'boxed',
		'footer_widgets_border' => 1,
		'footer_widgets_columns' => 2,
		'footer_bar_text_cr_year' => 0,
		'footer_bar_content' => 'copyright_text',
		'main_font_color' => '#777777',
		'highlight_color' => '#dc9814',
        'heading_color' => '#282828',
		'button_font_color' => '#ffffff',
		'button_background_color' => '#282828',
		'main_background_color' => '#ffffff',
		'main_background_image' =>
			array (
				'url' => '',
				'id' => '',
				'height' => '',
				'width' => '',
				'thumbnail' => ''
			),
		'main_background_image_type' => 'fixed',
		'top_bar_font_color' => '#eeeeee',
		'top_bar_background_color' => '#282828',
		'header_navigation_color' => '#707070',
		'header_navigation_highlight_color' => '#282828',
		'header_background_color' => '#ffffff',
		'header_home_background_color' => '#ffffff',
		'header_float_background_color' => '#ffffff',
		'header_slide_menu_open_background_color' => '#ffffff',
        'header_transparency_light_navigation_color' => '#ffffff',
        'header_transparency_light_navigation_highlight_color' => '#dcdcdc',
        'header_transparency_dark_navigation_color' => '#282828',
        'header_transparency_dark_navigation_highlight_color' => '#707070',
		'dropdown_menu_font_color' => '#a0a0a0',
		'dropdown_menu_font_highlight_color' => '#eeeeee',
		'dropdown_menu_background_color' => '#282828',
        'slide_menu_font_color' => '#555555',
        'slide_menu_font_highlight_color' => '#282828',
        'slide_menu_border_color' => '#eeeeee',
        'slide_menu_background_color' => '#ffffff',
		'footer_widgets_font_color' => '#777777',
		'footer_widgets_title_font_color' => '#282828',
		'footer_widgets_highlight_font_color' => '#dc9814',
		'footer_widgets_background_color' => '#ffffff',
		'footer_bar_font_color' => '#aaaaaa',
		'footer_bar_highlight_font_color' => '#eeeeee',
		'footer_bar_menu_border_color' => '#3a3a3a',
		'footer_bar_background_color' => '#282828',
        'shop_taxonomy_header_heading_color' => '#282828',
        'shop_taxonomy_header_description_color' => '#777777',
        'sale_flash_font_color' => '#373737',
		'sale_flash_background_color' => '#ffffff',
		'single_product_background_color' => '#eeeeee',
		'featured_video_icon_color' => '#282828',
		'featured_video_background_color' => '#ffffff',	
		'main_font_source' => '1',
		'main_font' => 
			array (
				'font-family' => 'Roboto',
				'subsets' => ''
			),
		'main_font_typekit_kit_id' => '',
		'main_typekit_font' => '',
		'main_font_custom_css' => '',
        'secondary_font_source' => '0',
		'secondary_font' => 
			array (
				'font-family' => 'Roboto',
				'subsets' => ''
			),
		'secondary_font_typekit_kit_id' => '',
		'secondary_typekit_font' => '',
        'font_size_large' => 18,
        'font_size_medium' => 16,
        'font_size_small' => 14,
        'font_size_xsmall' => 12,
        'font_weight_body' => 'normal',
        'font_weight_h1' => 'normal',
        'font_weight_h2' => 'normal',
        'font_weight_h3' => 'normal',
        'font_weight_h456' => 'normal',
		'shop_content_home' => 1,
        'shop_content_taxonomy' => 'shop_page',
        'shop_category_description' => 0,
        'shop_default_description' => '',
        'shop_description_layout' => 'clean',
        'shop_taxonomy_header_text_alignment' => 'center',
        'shop_taxonomy_header_text_max_width' => '',
        'shop_taxonomy_header_image_height' => '370',
        'shop_taxonomy_header_image_height_tablet' => '370',
        'shop_taxonomy_header_image_height_mobile' => '210',
		'shop_columns' => 4,
		'shop_columns_mobile' => 1,
		'products_per_page' => 16,
		'product_sale_flash' => 'pct',
		'product_image_lazy_loading' => 1,
		'product_hover_image_global' => 1,
        'product_rating' => 0,
		'product_action_link' => 'action-link-hide',
		'shop_infinite_load' => 'button',
		'shop_scroll_offset' => 70,
        'shop_scroll_offset_tablet' => 70,
        'shop_scroll_offset_mobile' => 70,
        'product_quickview' => 1,
		'product_quickview_links' => 'detail',
        'product_quickview_summary_layout' => 'align-bottom',
		'product_quickview_atc' => 1,
		'product_quickview_details_button' => 0,
		'cart_show_item_price' => 0,
        'checkout_inline_notices' => 1,
        'checkout_tac_lightbox' => 1,
        'shop_header' => 1,
		'shop_filters_enable_ajax' => '1',
		'shop_ajax_update_title' => '1',
        'shop_categories' => 1,
		'shop_categories_hide_empty' => '1',
		'shop_categories_top_level' => '1',
		'shop_categories_back_link' => '1st',
		'shop_categories_layout' => 'list_sep',
		'shop_categories_orderby' => 'slug',
		'shop_categories_order' => 'asc',
		'shop_filters' => 'disabled',
        'shop_filters_custom_controls' => 1,
		'shop_filters_sidebar_position' => 'left',
        'shop_filters_columns' => 4,
        'shop_filters_scrollbar' => 0,
		'shop_filters_height' => '145',
        'shop_search' => 'shop',
		'shop_search_ajax' => 1,
        'shop_search_auto_close' => 1,
		'shop_search_min_char' => 2,
		'shop_search_by_titles' => 0,
        'product_layout' => 'default',
        'product_navigation_same_term' => 0,
        'product_redirect_scroll' => 1,
        'single_product_sale_flash' => '0',
        'product_image_column_size' => 6,
		'product_image_zoom' => 1,
		'product_image_hover_zoom' => 0,
        'product_image_max_size' => 500,
        'product_thumbnails_slider' => 0,
        'product_image_pagination' => 0,
        'product_ajax_atc' => 1,
        'qty_arrows' => 1,
        'qty_arrows_grouped' => 0,
        'product_share_buttons' => 1,
        'product_custom_select' => 1,
        'product_custom_controls' => 0,
        'product_select_hide_labels' => 0,
        'product_description_layout' => 'boxed',
		'product_reviews' => 1,
        'product_upsell_related_columns' => 4,
        'product_upsell_related_per_page' => 4,
        'myaccount_profile_image' => 1,
        'myaccount_dashboard_text' => '',
        'wishlist_page_id' => '',
        'wishlist_show_variations' => 0,
        'wishlist_share' => 0,
        'wishlist_share_title' => 'My Wishlist',
        'wishlist_share_text' => '',
        'wishlist_share_image_url' => '',
        'blog_static_page' => 0,
		'blog_static_page_id' => '',
		'blog_categories' => '1',
        'blog_categories_hide_empty' => 0,
        'blog_categories_layout' => 'list',
		'blog_categories_columns' => 4,
		'blog_categories_toggle' => 0,
		'blog_categories_orderby' => 'name',
		'blog_categories_order' => 'asc',
		'blog_layout' => 'grid',
        //'blog_grid_preloader' => 0,
        'blog_grid_columns' => '3',
        'blog_grid_masonry' => 1,
		'blog_sidebar' => 'none',
        'blog_show_full_posts' => 0,
        'blog_infinite_load' => 0,
		'blog_gallery' => 0,
		'single_post_sidebar' => 'none',
		'single_post_display_featured_image' => 0,
        'single_post_related' => 0,
        'single_post_related_per_page' => 4,
        'single_post_related_columns' => 4,
        'portfolio_page_layout' => 'boxed',
        'portfolio_categories' => 1,
        'portfolio_categories_alignment' => 'left',
        'portfolio_categories_js' => '1',
        'portfolio_layout' => 'overlay',
        'portfolio_packery' => 1,
        'portfolio_items' => '',
        'portfolio_columns' => '2',
        //'portfolio_category' => '',
        //'portfolio_ids' => '',
        'portfolio_order_by' => 'date',
        'portfolio_order' => 'desc',
        'portfolio_permalink' => 'portfolio',
        'portfolio_category_permalink' => 'portfolio-category',
        'social_profiles' => array(
            'facebook'      => '',
            'instagram'     => '',
            'twitter'       => '',
            'googleplus'    => '',
            'flickr'        => '',
            'linkedin'      => '',
            'pinterest'     => '',
            'rss'           => '',
            'snapchat'      => '',
            'behance'       => '',
            'dribbble'      => '',
            'line'          => '',
            'soundcloud'    => '',
            'telegram'      => '',
            'tumblr'        => '',
            'vimeo'         => '',
            'vk'            => '',
            'weibo'         => '',
            'whatsapp'      => '',
            'youtube'       => '',
            'email'         => ''
        ),
		'custom_css' => '',
		'custom_js' => '',
	);
	
	// Set the options global
	global $nm_theme_options;
	$nm_theme_options = $default_options;
	
	// Save default options to the database
	update_option( 'nm_theme_options', $default_options );
	