<?php
function ssmAdvanced_customize_css(){ ?>
        <style type="text/css">
             
.ssm-fc::before {
	right: 0;
	background-image: -webkit-linear-gradient(top left, <?php echo get_theme_mod('ssm_fold_corner_3'); ?> 50%, <?php echo get_theme_mod('ssm_fold_corner_2'); ?> 50%);
	background-image: linear-gradient(315deg, <?php echo get_theme_mod('ssm_fold_corner_3'); ?> 50%, <?php echo get_theme_mod('ssm_fold_corner_2'); ?> 50%);
}

.ssm-fc::after {
	right: 100px;
	background-image: -webkit-linear-gradient(top left, transparent 50%, <?php echo get_theme_mod('ssm_fold_corner_1'); ?> 50%);
	background-image: linear-gradient(315deg, <?php echo get_theme_mod('ssm_fold_corner_1'); ?> 50%, transparent 50%);
}

/* Castle */
.ssm-cse:before {
	background-image: -webkit-linear-gradient(40deg, <?php echo get_theme_mod('ssm_castle_1'); ?> 50%, <?php echo get_theme_mod('ssm_castle_2'); ?> 50%);
	background-image: linear-gradient(40deg, <?php echo get_theme_mod('ssm_castle_1'); ?> 50%, <?php echo get_theme_mod('ssm_castle_2'); ?> 50%);
}

/* Muiltiple triangle */

.ssm-mt::before{
	box-shadow: -50px 50px 0 <?php echo get_theme_mod('ssm_muiltiple_triangle_1'); ?>, 50px -50px 0 <?php echo get_theme_mod('ssm_muiltiple_triangle_1'); ?>;
}
.ssm-mt::after {
	box-shadow: -50px 50px 0 <?php echo get_theme_mod('ssm_muiltiple_triangle_1'); ?>, 50px -50px 0 <?php echo get_theme_mod('ssm_muiltiple_triangle_1'); ?>;
 }


/* Boxes */
.ssm-bxs::before {
	background-image: -webkit-gradient(linear, 100% 0, 0 100%, color-stop(0.5, <?php echo get_theme_mod('ssm_boxes_1'); ?>), color-stop(0.5, <?php echo get_theme_mod('ssm_boxes_2'); ?>));
	background-image: linear-gradient(to right, <?php echo get_theme_mod('ssm_boxes_1'); ?> 50%, <?php echo get_theme_mod('ssm_boxes_2'); ?> 50%);
}
/* ZigZag */
.ssm-zz::before {
	background-image: -webkit-gradient(linear, 0 0, 300% 100%, color-stop(0.25, transparent), color-stop(0.25, <?php echo get_theme_mod('ssm_zigzag_3'); ?>));
	background-image:
		linear-gradient(315deg, <?php echo get_theme_mod('ssm_zigzag_2'); ?> 25%, transparent 25%),
		linear-gradient( 45deg, <?php echo get_theme_mod('ssm_zigzag_3'); ?> 25%, transparent 25%);
}

.ssm-zz::after {
	background-image: -webkit-gradient(linear, 0 0, 300% 100%, color-stop(0.25, transparent), <?php echo get_theme_mod('ssm_zigzag_2'); ?>), color-stop(0.25, <?php echo get_theme_mod('ssm_zigzag_3'); ?>));
	background-image: 
		linear-gradient(135deg, <?php echo get_theme_mod('ssm_zigzag_2'); ?> 25%, transparent 25%),
		linear-gradient(225deg, <?php echo get_theme_mod('ssm_zigzag_3'); ?> 25%, transparent 25%);
}


.ssm-slit::before, 
.ssm-slit::after {
	background:  <?php echo get_theme_mod('ssm_slit_1'); ?>;
}

.ssm-slit::before {
	box-shadow: -10px -20px <?php echo get_theme_mod('ssm_slit_2'); ?>;
}

.ssm-slit::after {
	box-shadow: 10px -20px  <?php echo get_theme_mod('ssm_slit_2'); ?>;
  
}
.ssm-irnd::before,
.ssm-irnd::after {
	background: <?php echo get_theme_mod('ssm_round_edge_1'); ?>;
}
.ssm-rnde::before,
.ssm-rnde::after {

	background: <?php echo get_theme_mod('ssm_round_edge_1'); ?>;

}
.ssm-inczigzag::before {
	top: 0;
	background-image: -webkit-gradient(linear, 0 0, 10% 100%, color-stop(0.5, <?php echo get_theme_mod('ssm_castle_1'); ?>), color-stop(0.5, <?php echo get_theme_mod('ssm_castle_2'); ?>));
	background-image: linear-gradient(15deg, <?php echo get_theme_mod('ssm_inczigzag_1'); ?> 50%, <?php echo get_theme_mod('ssm_inczigzag_2'); ?> 50%);
}
.ssm-inczigzag::after {
	bottom: 0;
	background-image: -webkit-gradient(linear, 0 0, 10% 100%, color-stop(0.5, <?php echo get_theme_mod('ssm_castle_3'); ?>), color-stop(0.5, <?php echo get_theme_mod('ssm_castle_1'); ?>));
	background-image: linear-gradient(15deg, <?php echo get_theme_mod('ssm_inczigzag_3'); ?> 50%, <?php echo get_theme_mod('ssm_inczigzag_1'); ?> 50%);
}


.ssm-double-lines::before {
	background: <?php echo get_theme_mod('ssm_double_lines_1'); ?>;
	box-shadow: 0 30px 0 <?php echo get_theme_mod('ssm_double_lines_2'); ?>;
}

.ssm-dots::before {
	background: <?php echo get_theme_mod('ssm_dots_1'); ?>;
	box-shadow: 30px 0 <?php echo get_theme_mod('ssm_dots_2'); ?>, -30px 0 <?php echo get_theme_mod('ssm_dots_2'); ?>;
}

.ssm-ttb:after,.ssm-ttb:before {
    border-bottom:50px solid <?php echo get_theme_mod('ssm_transparent_big_1'); ?>;
    }

.ssm-tts:after,.ssm-tts:before {
    border-bottom:50px solid <?php echo get_theme_mod('ssm_transparent_small_1'); ?>;
    }
        </style>
        
   <?php }
    
    add_action('wp_head', 'ssmAdvanced_customize_css');