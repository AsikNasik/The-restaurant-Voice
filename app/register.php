<?php
require_once 'connectiondb.php';

$username   = $_POST['register_name'];
$user_fio   = $_POST['register_fio'];
$user_city  = $_POST['register_city'];
$user_pass  = $_POST['register_pass'];
$user_pass2 = $_POST['register_pass2'];


if ( isset( $username ) && $username && isset( $user_fio ) && $user_fio && isset( $user_city ) && $user_city &&
     isset( $user_pass ) && $user_pass && isset( $user_pass2 ) && $user_pass2 ) {
	// add check of validation to all fildes

	if ( $user_pass == $user_pass2 ) {

		$stid2 = oci_parse( $conn, "INSERT INTO client(telephone_cl, fio, sale, id_city) values($username,$user_fio,0,$id_city))" );
		$res   = oci_execute( $stid2 );

		$stid3 = oci_parse( $conn, "INSERT INTO client_auto(telephone_cl, password_cl) values($username,$user_pass))" );
		$res2  = oci_execute( $stid3 );
		// data:answer -> 1
		// gretting:welcome, $username
		// OPEN THE USER.HTML
	}

} else {
	echo json_encode( array( 'success' => 0 ) );
}

die;
