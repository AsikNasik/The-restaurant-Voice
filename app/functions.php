<?php
function is_ajax(): bool {
	if ( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		return true;
	}

	return false;
}

function home_url(){
	if(isset($_SERVER['HTTPS'])){
		$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
	}
	else{
		$protocol = 'http';
	}
	return $protocol . "://" . $_SERVER['HTTP_HOST'];
}