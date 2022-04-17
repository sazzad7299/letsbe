<?php
/**
 * Redux Framework textarea config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Textarea1', 'your-textdomain-here' ),
		'id'         => 'basic-textarea1',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'your-textdomain-here' ) . '<a href="https://devs.redux.io/core-fields/textarea.html" target="_blank">https://devs.redux.io/core-fields/textarea.html</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'opt-textarea1',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Textarea Option - HTML Validated Custom', 'your-textdomain-here' ),
				'subtitle' => esc_html__( 'Subtitle', 'your-textdomain-here' ),
				'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'your-textdomain-here' ),
				'default'  => 'Default Text',
			),
		),
	)
);
