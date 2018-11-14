<?php

// Hook - admin css
function db_admin_css() { ?>
	<style>
	<?php do_action('db_admin_css'); ?> 
	</style>
<?php	
}
add_action('admin_head', 'db_admin_css');