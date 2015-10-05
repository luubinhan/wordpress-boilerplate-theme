<?php  
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_section-hero',
		'title' => 'Section Hero',
		'fields' => array (
			array (
				'key' => 'field_5610eaaddc8db',
				'label' => 'Section Hero',
				'name' => 'section_hero',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5610eaccdc8dc',
						'label' => 'Hero Image',
						'name' => 'hero_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5610eaeedc8dd',
						'label' => 'Hero Caption',
						'name' => 'hero_caption',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5610eafadc8de',
						'label' => 'Hero Subcaption',
						'name' => 'hero_subcaption',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Image',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template/template-home.php',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>