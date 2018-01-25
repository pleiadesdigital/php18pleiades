<?php

// URL REDIRECTS
function url_for($script_path) {
	// add the leading '/' if not present
	if ($script_path[0] != '/') {
		$script_path = '/' . $script_path;
	}
	return WWW_ROOT . $script_path;
}


// URL ENCODE (after the ? link query)
function u($string="") {
	return urlencode($string);
}

// RAW URL ENCODE (before the ? link query)
function raw_u($string="") {
	return rawurlencode($string);
}

// HTML SPECIAL CHARACTERS
function h($string="") {
	return htmlspecialchars($string);
}






