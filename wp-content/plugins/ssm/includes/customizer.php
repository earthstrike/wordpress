<?php
function ssmAdvanced_customize_register( $wp_customize ) {
        $wp_customize->add_panel( 'ssm_advanced_panel', array(
	    'title' => __( 'SSM Advanced', 'Divi' ),
	    'priority' => 30,
	) );

	  $wp_customize->add_section( 'ssm_folded_corner_section', array(
           'title'		=> __( 'Folded Corner', 'Divi' ),
           'priority' => 6,
           'panel' => 'ssm_advanced_panel',
       ));
       
        
       $wp_customize->add_setting('ssm_fold_corner_1', array(
           'default' => '#1e1e1e',
           'transport' => 'refresh',
       )) ;
       
     
       $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_fold_corner_1_color_control', array(
           'label' => __('Corner 1 background colour', 'Divi'),
           'section' => 'ssm_folded_corner_section',
           'settings' => 'ssm_fold_corner_1',   
          ) ) );
          
       $wp_customize->add_setting('ssm_fold_corner_2', array(
           'default' => '#000',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_fold_corner_2_color_control', array(
           'label' => __('Corner 2 background colour', 'Divi'),
           'section' => 'ssm_folded_corner_section',
           'settings' => 'ssm_fold_corner_2',   
          ) ) );
          
          $wp_customize->add_setting('ssm_fold_corner_3', array(
           'default' => '#1e1e1e',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_fold_corner_3_color_control', array(
           'label' => __('Next section background colour', 'Divi'),
           'section' => 'ssm_folded_corner_section',
           'settings' => 'ssm_fold_corner_3',   
          ) ) );
          
        // Castle Section
        $wp_customize->add_section( 'ssm_castle_section', array(
           'title'		=> __( 'Castle', 'Divi' ),
           'priority' => 2,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_castle_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_castle_1_color_control', array(
           'label' => __('background colour', 'Divi'),
           'section' => 'ssm_castle_section',
           'settings' => 'ssm_castle_1',   
          ) ) );
          
          $wp_customize->add_setting('ssm_castle_2', array(
           'default' => '#1e1e1e',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_castle_2_color_control', array(
           'label' => __('previous section background colour', 'Divi'),
           'section' => 'ssm_castle_section',
           'settings' => 'ssm_castle_2',   
          ) ) );
          
         // Muiltiple triangle 
        $wp_customize->add_section( 'ssm_muiltiple_triangle_section', array(
           'title'		=> __( 'Muiltiple triangle ', 'Divi' ),
           'priority' => 8,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_muiltiple_triangle_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_muiltiple_triangle_1_color_control', array(
           'label' => __('Background Colour', 'Divi'),
           'section' => 'ssm_muiltiple_triangle_section',
           'settings' => 'ssm_muiltiple_triangle_1',   
          ) ) ); 
          
           // Round Edge
        $wp_customize->add_section( 'ssm_round_edge_section', array(
           'title'		=> __( 'Round Edge ', 'Divi' ),
           'priority' => 8,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_round_edge_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_round_edge_1_color_control', array(
           'label' => __('previous section background colour', 'Divi'),
           'section' => 'ssm_round_edge_section',
           'settings' => 'ssm_round_edge_1',   
          ) ) ); 
          
          // boxes
        $wp_customize->add_section( 'ssm_boxes_section', array(
           'title'		=> __( 'Boxes ', 'Divi' ),
           'priority' => 1,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_boxes_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_boxes_1_color_control', array(
           'label' => __('Background colour', 'Divi'),
           'section' => 'ssm_boxes_section',
           'settings' => 'ssm_boxes_1',   
          ) ) ); 
          
          $wp_customize->add_setting('ssm_boxes_2', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_boxes_2_color_control', array(
           'label' => __('Next section background colour', 'Divi'),
           'section' => 'ssm_boxes_section',
           'settings' => 'ssm_boxes_2',   
          ) ) ); 
          

          
          // Zig Zag
        $wp_customize->add_section( 'ssm_zigzag_section', array(
           'title'		=> __( 'Zig zag', 'Divi' ),
           'priority' => 14,
           'panel' => 'ssm_advanced_panel',
       ));
         

          
          $wp_customize->add_setting('ssm_zigzag_2', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_zigzag_2_color_control', array(
           'label' => __('Background colour 1', 'Divi'),
           'section' => 'ssm_zigzag_section',
           'settings' => 'ssm_zigzag_2',   
          ) ) ); 
          
          $wp_customize->add_setting('ssm_zigzag_3', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_zigzag_3_color_control', array(
           'label' => __('Background colour 2', 'Divi'),
           'section' => 'ssm_zigzag_section',
           'settings' => 'ssm_zigzag_3',   
          ) ) ); 
          
          
          // Slit
        $wp_customize->add_section( 'ssm_slit_section', array(
           'title'		=> __( 'Slit', 'Divi' ),
           'priority' => 10,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_slit_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_slit_1_color_control', array(
           'label' => __('Main Background colour', 'Divi'),
           'section' => 'ssm_slit_section',
           'settings' => 'ssm_slit_1',   
          ) ) ); 
          
          $wp_customize->add_setting('ssm_slit_2', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_slit_2_color_control', array(
           'label' => __('Second background colour', 'Divi'),
           'section' => 'ssm_slit_section',
           'settings' => 'ssm_slit_2',   
          ) ) ); 
          
          // Inczigzag
        $wp_customize->add_section( 'ssm_inczigzag_section', array(
           'title'		=> __( 'Inczigzag', 'Divi' ),
           'priority' => 7,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_inczigzag_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_inczigzag_1_color_control', array(
           'label' => __('Main background colour', 'Divi'),
           'section' => 'ssm_inczigzag_section',
           'settings' => 'ssm_inczigzag_1',   
          ) ) ); 
          
          $wp_customize->add_setting('ssm_inczigzag_2', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_inczigzag_2_color_control', array(
           'label' => __('previous section background colour', 'Divi'),
           'section' => 'ssm_inczigzag_section',
           'settings' => 'ssm_inczigzag_2',   
          ) ) ); 
          
          $wp_customize->add_setting('ssm_inczigzag_3', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_inczigzag_3_color_control', array(
           'label' => __('next section background colour', 'Divi'),
           'section' => 'ssm_inczigzag_section',
           'settings' => 'ssm_inczigzag_3',   
          ) ) ); 
          
          // Double Lines
        $wp_customize->add_section( 'ssm_double_lines_section', array(
           'title'		=> __( 'Double Lines', 'Divi' ),
           'priority' => 5,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_double_lines_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_double_lines_1_color_control', array(
           'label' => __('Bottom Line', 'Divi'),
           'section' => 'ssm_double_lines_section',
           'settings' => 'ssm_double_lines_1',   
          ) ) ); 
          
          $wp_customize->add_setting('ssm_double_lines_2', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_double_lines_2_color_control', array(
           'label' => __('Top line', 'Divi'),
           'section' => 'ssm_double_lines_section',
           'settings' => 'ssm_double_lines_2',   
          ) ) ); 
          
          // Dots
        $wp_customize->add_section( 'ssm_dots_section', array(
           'title'		=> __( 'dots', 'Divi' ),
           'priority' => 4,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_dots_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_dots_1_color_control', array(
           'label' => __('Middle dot colour', 'Divi'),
           'section' => 'ssm_dots_section',
           'settings' => 'ssm_dots_1',  
          ) ) ); 
          
          $wp_customize->add_setting('ssm_dots_2', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_dots_2_color_control', array(
           'label' => __('Before and After dots colour', 'Divi'),
           'section' => 'ssm_dots_section',
           'settings' => 'ssm_dots_2',  
          ) ) ); 
          
         // transparent big triangle
           $wp_customize->add_section( 'ssm_transparent_big_section', array(
           'title'		=> __( 'Transparnet big triangle', 'Divi' ),
           'priority' => 11,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_transparent_big_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_transparent_big_1_color_control', array(
           'label' => __('Transparent background colour', 'Divi'),
           'section' => 'ssm_transparent_big_section',
           'settings' => 'ssm_transparent_big_1',   
          ) ) );
          
          // transparent small triangle
           $wp_customize->add_section( 'ssm_transparent_small_section', array(
           'title'		=> __( 'Transparnet small triangle', 'Divi' ),
           'priority' => 12,
           'panel' => 'ssm_advanced_panel',
       ));
         
        $wp_customize->add_setting('ssm_transparent_small_1', array(
           'default' => '#1gbef1',
           'transport' => 'refresh',
       )) ;
       
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ssm_transparent_small_1_color_control', array(
           'label' => __('Transparent background colour', 'Divi'),
           'section' => 'ssm_transparent_small_section',
           'settings' => 'ssm_transparent_small_1',   
          ) ) );
          
         
          
    }
    
    add_action('customize_register', 'ssmAdvanced_customize_register');