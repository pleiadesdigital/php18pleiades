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

// TESTING HEADERS MODIFICATION

function error_404() {
	header($_SERVER["SERVER_PROTOCOL" . " 404 Not Found"]);
	exit();
}

function error_500() {
	header($_SERVER["SERVER_PROTOCOL" . " 500 Internal Server Error"]);
	exit();
}

// HEADER REDIRECT
function redirect_to($location) {
	header('Location: ' . url_for($location));
	exit();
}

// CHECK IF SUBMIT FORM IS POST REQUEST
function is_post_request() {
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

// CHECK IF SUBMIT FORM IS GET REQUEST
function is_get_request() {
	return $_SERVER['REQUEST_METHOD'] == 'GET';
}


