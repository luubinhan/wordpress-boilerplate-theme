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
            'id'          => 'section_general',
            'title'       => __( 'General'  )
        ),      
        array(
            'id'          => 'section_contact',
            'title'       => __( 'Contact Info'  )
        ),
        array(
            'id'          => 'section_blog',
            'title'       => __( 'Blog'  )
        ),
        array(
            'id'          => 'section_footer',
            'title'       => __( 'Footer'  )
        ),        
        array(
            'id'          => 'section_social',
            'title'       => __( 'Social Links'  )
        ),
        array(
            'id'          => 'section_others',
            'title'       => __( 'Others'  )
        )
      
    ),
    'settings'        => array( 
      // ====== History ======
      array(
        'id'          => 'google_analytics_id',
        'label'       => 'Google Analytics ID',
        'desc'        => 'asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet change the UA-XXXXX-X to be your site\'s ID',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'section_general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'site_logo',
        'label'       => __( 'Logo'  ),
        'desc'        => sprintf(''),
        'type'        => 'upload',
        'section'     => 'section_general',
        'operator'    => 'and'
      ),    
      array(
        'id'          => 'site_favicon',
        'label'       => __('Favicon'),
        'desc'        => sprintf(''),
        'type'        => 'upload',
        'section'     => 'section_general',
        'operator'    => 'and'
      ),   
      // ====== CONTACT ======
      array(
        'id'          => 'contact_adrress',
        'label'       => __( 'Adrress'  ),        
        'type'        => 'text',
        'section'     => 'section_contact',        
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_email',
        'label'       => __( 'Email'  ),        
        'type'        => 'text',
        'section'     => 'section_contact',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_phone',
        'label'       => __( 'Phone'  ),        
        'type'        => 'text',
        'section'     => 'section_contact',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'contact_fax',
        'label'       => __( 'Fax'  ),        
        'type'        => 'text',
        'section'     => 'section_contact',
        'operator'    => 'and'
      ),
      // ====== BLOG ====== 
      array(
        'id'          => 'thumbnail_on_off',
        'label'       => __( 'Thumbnail Preview' ),
        'desc'        => __( 'Display thumbnail preview for posts' ) ,
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'section_blog',     
        'operator'    => 'and'
      ),
      array(
        'id'          => 'columns_blog',
        'label'       => __( 'Columns' ),
        'desc'        => __( 'Set how many columns to display' ),     
        'std'         => '1',    
        'type'        => 'numeric-slider',
        'section'     => 'section_blog',        
        'min_max_step'=> '1,4,1',        
        'operator'    => 'and'
      ),
      array(
        'id'          => 'excerpt_length',
        'label'       => __( 'Excerpt Length' ),
        'desc'        => __( 'Set the excerpt length' ),    
        'std'         => '150',    
        'type'        => 'numeric-slider',
        'section'     => 'section_blog',        
        'min_max_step'=> '100,400,20',        
        'operator'    => 'and'
      ),
      // ====== FOOTER ======
      array(
        'id'          => 'footer_left',
        'label'       => __( 'Text on left side'  ),     
        'type'        => 'textarea',
        'section'     => 'section_footer',        
        'operator'    => 'and'
      ),   
      array(
        'id'          => 'footer_right',
        'label'       => __( 'Text on right side'  ),     
        'type'        => 'textarea',
        'section'     => 'section_footer',        
        'operator'    => 'and'
      ),   
      
      // ====== SOCIAL ======  
      array(
        'id'          => 'mystyle_social_links',
        'label'       => __( 'Social Links'  ),
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
      ),
      // ====== Others ======  
      array(
        'id'          => 'logo_login',
        'label'       => __( 'Logo'  ),
        'desc'        => sprintf('Logo display at login page'),
        'type'        => 'upload',
        'section'     => 'section_others',
        'operator'    => 'and'
      ),  
      array(
        'id'          => 'background_login',
        'label'       => __( 'Background image'),
        'desc'        => sprintf('Background for login page'),
        'type'        => 'upload',
        'section'     => 'section_others',
        'operator'    => 'and'
      ),  
      array(
        'id'          => 'login_colorpicker',
        'label'       => 'Background color',
        'desc'        => sprintf('Background for login page'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'section_others',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_admin_on_off',
        'label'       => 'Show admin bar',
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'section_others',   
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_update_available',
        'label'       => 'Show update available',
        'desc'        => '',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'section_others',   
        'operator'    => 'and'
      ),
      
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