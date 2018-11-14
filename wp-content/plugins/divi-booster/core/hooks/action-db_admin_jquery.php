<?php

// Hook - admin jquery
function db_admin_jquery() { ?>
	<script>
	jQuery(function($){
		<?php do_action('db_admin_jquery'); ?> 
	});
	</script>
<?php	
}
add_action('admin_head', 'db_admin_jquery');