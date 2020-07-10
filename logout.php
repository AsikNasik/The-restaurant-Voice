<?php
session_start();
if( ! empty($_SESSION['user']) ){
	$_SESSION = [];
	header("location: http://".$_SERVER['HTTP_HOST']);
	exit;
}

header("location: http://".$_SERVER['HTTP_HOST']);
exit;
