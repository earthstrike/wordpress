<?php

// Hook - visual builder css
function db_vb_css() { ?>
	<style>
	<?php do_action('db_vb_css'); ?> 
	</style>
<?php	
}
add_action('db_vb_head', 'db_vb_css');