<?php
	
	// VC element: nm_social_profiles
	vc_map( array(
	   'name'			=> __( 'Social Profiles', 'nm-framework-admin' ),
	   'category'		=> __( 'Social', 'nm-framework-admin' ),
	   'description'	=> __( 'Social media profile icons', 'nm-framework-admin' ),
	   'base'			=> 'nm_social_profiles',
	   'icon'			=> 'nm_social_profiles',
	   'params'			=> array(
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Facebook',
				'param_name' 	=> 'social_profile_facebook',
				'description'	=> __( 'Enter your Facebook profile URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Instagram',
				'param_name' 	=> 'social_profile_instagram',
				'description'	=> __( 'Enter your Instagram profile URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Twitter',
				'param_name' 	=> 'social_profile_twitter',
				'description'	=> __( 'Enter your Twitter profile URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Google+',
				'param_name' 	=> 'social_profile_googleplus',
				'description'	=> __( 'Enter your Google+ profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Flickr',
				'param_name' 	=> 'social_profile_flickr',
				'description'	=> __( 'Enter your Flickr profile URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'LinedIn',
				'param_name' 	=> 'social_profile_linkedin',
				'description'	=> __( 'Enter your LinedIn profile URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Pinterest',
				'param_name' 	=> 'social_profile_pinterest',
				'description'	=> __( 'Enter your Pinterest profile URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'RSS',
				'param_name' 	=> 'social_profile_rss',
				'description'	=> __( 'Enter your RSS feed URL.', 'nm-framework-admin' )
            ),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Snapchat',
				'param_name' 	=> 'social_profile_snapchat',
				'description'	=> __( 'Enter your Snapchat profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Behance',
				'param_name' 	=> 'social_profile_behance',
				'description'	=> __( 'Enter your Behance profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Dribbble',
				'param_name' 	=> 'social_profile_dribbble',
				'description'	=> __( 'Enter your Dribbble profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'SoundCloud',
				'param_name' 	=> 'social_profile_soundcloud',
				'description'	=> __( 'Enter your SoundCloud profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Telegram',
				'param_name' 	=> 'social_profile_telegram',
				'description'	=> __( 'Enter your Telegram URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Tumblr',
				'param_name' 	=> 'social_profile_tumblr',
				'description'	=> __( 'Enter your Tumblr profile URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Vimeo',
				'param_name' 	=> 'social_profile_vimeo',
				'description'	=> __( 'Enter your Vimeo profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'VK',
				'param_name' 	=> 'social_profile_vk',
				'description'	=> __( 'Enter your VK profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Weibo',
				'param_name' 	=> 'social_profile_weibo',
				'description'	=> __( 'Enter your Weibo profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'WhatsApp',
				'param_name' 	=> 'social_profile_whatsapp',
				'description'	=> __( 'Enter your WhatsApp profile URL.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> 'YouTube',
				'param_name' 	=> 'social_profile_youtube',
				'description'	=> __( 'Enter your YouTube profile URL.', 'nm-framework-admin' )
			),
            array(
				'type' 			=> 'textfield',
				'heading' 		=> 'Email',
				'param_name' 	=> 'social_profile_email',
				'description'	=> __( 'Enter your Email address.', 'nm-framework-admin' )
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> __( 'Icon Size', 'nm-framework-admin' ),
				'param_name' 	=> 'icon_size',
				'description'	=> __( 'Select icon size.', 'nm-framework-admin' ),
				'value' 		=> array(
					'Small'		=> 'small',
					'Medium'	=> 'medium',
					'Large'		=> 'large'
				),
				'std' 			=> 'medium'
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> __( 'Icon Alignment', 'nm-framework-admin' ),
				'param_name' 	=> 'alignment',
				'description'	=> __( 'Select icon alignment.', 'nm-framework-admin' ),
				'value' 		=> array(
					'center'	=> 'center',
					'Left'		=> 'left',
					'Right'		=> 'right'
				),
				'std' 			=> 'center'
			)
	   )
	) );
	