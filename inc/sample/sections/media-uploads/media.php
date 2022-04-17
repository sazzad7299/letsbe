<?php
/**
 * Redux Framework media config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Logo/Favicon', 'letsbe' ),
		'id'         => 'media-media',
		'desc'       => esc_html__( 'Customse your logo : ', 'letsbe' ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'           => 'header-logo-light',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Light Header Logo/ URL', 'letsbe' ),
				'compiler'     => 'true',
				'desc'         => esc_html__( 'Basic media uploader with disabled URL input field.', 'letsbe' ),
				'subtitle'     => esc_html__( 'Upload any media using the WordPress native uploader', 'letsbe' ),
				'preview_size' => 'full',
				'default'      => array(
					'url'  	   =>'http://localhost/themedev/wp-content/uploads/2022/03/logo_light.png'
				),
			),
			array(
				'id'           => 'header-logo-dark',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Dark Header Logo/ URL', 'letsbe' ),
				'compiler'     => 'true',
				'desc'         => esc_html__( 'Basic media uploader with disabled URL input field.', 'letsbe' ),
				'subtitle'     => esc_html__( 'Upload any media using the WordPress native uploader', 'letsbe' ),
				'preview_size' => 'full',
				'default'      => array(
					'url'  	   =>'http://localhost/themedev/wp-content/uploads/2022/03/logo_dark.png'
				),
			),
			array(
				'id'       => 'media-no-url',
				'type'     => 'media',
				'title'    => esc_html__( 'Media w/o URL', 'letsbe' ),
				'desc'     => esc_html__( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'letsbe' ),
				'subtitle' => esc_html__( 'Upload any media using the WordPress native uploader', 'letsbe' ),
				'url'      => false,
				'preview'  => true,
			),
			array(
				'id'       => 'media-no-preview',
				'type'     => 'media',
				'preview'  => false,
				'title'    => esc_html__( 'Media No Preview', 'letsbe' ),
				'desc'     => esc_html__( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'letsbe' ),
				'subtitle' => esc_html__( 'Upload any media using the WordPress native uploader', 'letsbe' ),
				'hint'     => array(
					'title'   => esc_html__( 'Test Hint', 'letsbe' ),
					'content' => wp_kses_post( 'This is a <b>hint</b> tool-tip for the webFonts field.<br/><br/>Add any HTML based text you like here.' ),
				),
			),
			array(
				'id'         => 'opt-random-upload',
				'type'       => 'media',
				'title'      => esc_html__( 'Upload Anything - Disabled Mode', 'letsbe' ),
				'full_width' => true,

				// Can be set to false to allow any media type, or can also be set to any mime type.
				'mode'       => false,

				'desc'       => esc_html__( 'Basic media uploader with disabled URL input field.', 'letsbe' ),
				'subtitle'   => esc_html__( 'Upload any media using the WordPress native uploader', 'letsbe' ),
			),
			array(
				'id'           => 'opt-media-filter',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Media w/ URL', 'letsbe' ),
				'compiler'     => true,
				'desc'         => esc_html__( 'Basic media uploader with disabled URL input field.', 'letsbe' ),
				'subtitle'     => esc_html__( 'Upload any media using the WordPress native uploader', 'letsbe' ),
				'preview_size' => 'full',
				'default'      => array(
					'url'    => 'https://s.wordpress.org/style/images/codeispoetry.png',
					'filter' => array(
						'grayscale' => array(
							'checked' => true,
							'value'   => 50,
						),
					),
				),
				'preview_size' => 'full',
				'filter'       => array(
					'grayscale'  => true,
					'blur'       => true,
					'sepia'      => true,
					'saturate'   => true,
					'opacity'    => true,
					'brightness' => true,
					'contrast'   => true,
					'hue-rotate' => true,
					'invert'     => true,
				),
				'output'       => array( '.header-image img, .site-logo, .wp-block-site-logo' ),
			),
			array(
				'id'           => 'media-no-url-filter',
				'type'         => 'media',
				'title'        => esc_html__( 'Media w/o URL', 'letsbe' ),
				'desc'         => esc_html__( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'letsbe' ),
				'subtitle'     => esc_html__( 'Upload any media using the WordPress native uploader', 'letsbe' ),
				'url'          => false,
				'filter'       => array(
					'grayscale' => true,
					'blur'      => true,
				),
				'preview'      => true,
				'preview_size' => 'full',
			),
		),
	)
);
