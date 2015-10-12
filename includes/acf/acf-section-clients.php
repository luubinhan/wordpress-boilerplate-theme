<?php  
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_section-clients',
		'title' => 'Section Clients',
		'fields' => array (
			array (
				'key' => 'field_561b28a067f5d',
				'label' => 'Clients',
				'name' => 'repeater_clients',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_561b28af67f5e',
						'label' => 'Logo',
						'name' => 'client_logo',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_561b28ba67f5f',
						'label' => 'Name',
						'name' => 'client_name',
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
						'key' => 'field_561b28c967f60',
						'label' => 'Website',
						'name' => 'client_website',
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
				'button_label' => 'Add Client',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template/template-home.php',
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