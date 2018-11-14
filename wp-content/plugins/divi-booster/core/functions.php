<?php // functions.php

function db_divi_version($version, $comparison) {
	if (defined('ET_CORE_VERSION') && version_compare(ET_CORE_VERSION, $version, $comparison)) {
		return true;
	}
	return false;
}