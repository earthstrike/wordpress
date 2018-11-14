<?php

add_action('db_vb_jquery', 'db_vb_builder_data_retrieved', 9); // do before default priority jquery

function db_vb_builder_data_retrieved() {
	?>
	/* Trigger: db_vb_builder_data_retrieved - fired after ajax load of builder data */
	$(document).ajaxComplete(function(evt, xhr, options){ 
		if (("data" in options) && (options['data'].indexOf("action=et_fb_retrieve_builder_data") >= 0)) {
			$(document).trigger('db_vb_builder_data_retrieved');
		}
	});
	<?php
}
