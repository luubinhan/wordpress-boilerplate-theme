<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet */
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
        array(
            'id'          => 'section_history',
            'title'       => __( 'History', 'theme-options' )
        ),
        array(
            'id'          => 'section_slider',
            'title'       => __( 'Slider', 'theme-options' )
        ),
        array(
            'id'          => 'section_contact',
            'title'       => __( 'Contact Info', 'theme-options' )
        ),
        array(
            'id'          => 'section_footer',
            'title'       => __( 'Footer', 'theme-options' )
        ),        
        array(
            'id'          => 'section_social',
            'title'       => __( 'Social Links', 'theme-options' )
        )
      
    ),
    'settings'        => array( 
      // ====== History ======
      array(
        'id'          => 'history_list_item',
        'label'       => __( 'History', 'theme-options' ),
        'desc'        => __(''),
        'type'        => 'list-item',
        'section'     => 'section_history',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'history_upload',
            'label'       => __( 'Upload', 'theme-options' ),  
            'desc'        => __(''),
            'type'        => 'upload',    
            'operator'    => 'and'
          ),
          array(
            'id'          => 'history_textarea',
            'label'       => __( '' ),     
            'type'        => 'textarea',              
            'operator'    => 'and'
          ),
        )
      ),
      // ====== SLIDE SHOW ======
      array(
        'id'          => 'slider_list_item',
        'label'       => __( 'Slider', 'theme-options' ),
        'desc'        => __(''),
        'type'        => 'list-item',
        'section'     => 'section_slider',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'slider_upload',
            'label'       => __( 'Upload', 'theme-options' ),  
            'desc'        => __(''),
            'type'        => 'upload',    
            'operator'    => 'and'
          ),
        )
      ),
      
      // ====== CONTACT ======
      array(
        'id'          => 'contact_adrress',
        'label'       => __( 'Adrress', 'theme-options' ),        
        'type'        => 'text',
        'section'     => 'section_contact',        
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_email',
        'label'       => __( 'Email', 'theme-options' ),        
        'type'        => 'text',
        'section'     => 'section_contact',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_phone',
        'label'       => __( 'Phone', 'theme-options' ),        
        'type'        => 'text',
        'section'     => 'section_contact',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_fax',
        'label'       => __( 'Fax', 'theme-options' ),        
        'type'        => 'text',
        'section'     => 'section_contact',
        'operator'    => 'and'
      ),
      // ====== FOOTER ======
      array(
        'id'          => 'footer_left',
        'label'       => __( 'Text on left side', 'theme-options' ),     
        'type'        => 'textarea',
        'section'     => 'section_footer',        
        'operator'    => 'and'
      ),   
      array(
        'id'          => 'footer_right',
        'label'       => __( 'Text on right side', 'theme-options' ),     
        'type'        => 'textarea',
        'section'     => 'section_footer',        
        'operator'    => 'and'
      ),   
      // ====== SOCIAL ======  
      array(
        'id'          => 'mystyle_social_links',
        'label'       => __( 'Social Links', 'theme-options' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'social-links',
        'section'     => 'section_social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}