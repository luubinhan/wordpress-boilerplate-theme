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
            'id'          => 'section_contact',
            'title'       => __( 'Contact Info', 'theme-options' )
        ),
        array(
            'id'          => 'section_home',
            'title'       => __( 'Home layout', 'theme-options' )
        ),
        array(
            'id'          => 'section_social',
            'title'       => __( 'Social Links', 'theme-options' )
        )
      
    ),
    'settings'        => array( 
      
      array(
        'id'          => 'contact_adrress',
        'label'       => __( 'Adrress', 'theme-options' ),        
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
      array(
        'id'          => 'home_layout',
        'label'       => __( 'Home layout', 'theme-options' ),        
        'type'        => 'text',
        'section'     => 'section_home',
        'operator'    => 'and'
      ),
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