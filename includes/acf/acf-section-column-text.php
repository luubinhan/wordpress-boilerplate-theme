<?php  
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_section-column-text',
		'title' => 'Section Column Text',
		'fields' => array (
			array (
				'key' => 'field_5610eca538d16',
				'label' => 'Number of columns',
				'name' => 'number_of_columns',
				'type' => 'select',
				'choices' => array (
					2 => 2,
					3 => 3,
					4 => 4,
					6 => 6,
					'' => '',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5610ed6e38d17',
				'label' => 'Columns',
				'name' => 'columns',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5610edb838d18',
						'label' => 'Icon',
						'name' => 'column_icon',
						'type' => 'text',
						'column_width' => 5,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5610edcb38d19',
						'label' => 'Title',
						'name' => 'column_title',
						'type' => 'text',
						'column_width' => 30,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5610edeb38d1a',
						'label' => 'Description',
						'name' => 'column_description',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'br',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Column',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
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