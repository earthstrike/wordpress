<?php

// Hook - visual builder jquery
function db_vb_jquery() { ?>	
	<?php do_action('db_vb_jquery'); ?> 
<?php	
}
add_action('db_user_jquery', 'db_vb_jquery', 1000); // add after user jquery