<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/app/connectiondb.php');

$username      = $_POST['username'];
$user_password = $_POST['password'];

if ( strlen($username) < 9){
	return false;
}
else if( strlen($user_password) < 4  ) {
	return false;
}

if ( ! empty( $username ) && ! empty( $user_password ) ) {

	global $conn;

	$stid  = oci_parse( $conn, "SELECT * from client_auto where telephone_cl = $username and password_cl = '{$user_password}'" );
	$res   = oci_execute( $stid );
	oci_fetch_all($stid, $users,null,null, OCI_FETCHSTATEMENT_BY_ROW);

	$stid2 = oci_parse( $conn, "SELECT * from staff_auto where telephone_st = $username and password_st = '{$user_password}'" );
	$res2  = oci_execute( $stid2 );
	oci_fetch_all($stid2, $admin,null,null, OCI_FETCHSTATEMENT_BY_ROW);


	if( ! $res && ! $res2){
		return false;
	}


	if ( count($users) == 1 ) {

		// OPEN SESSION FOR USER

		session_start();
		$_SESSION['user'] = $username;
		$_SESSION['user_status'] = 'user';

		echo ( json_encode( [ 'success' => true ]));

	} else if ( count($admin) ==1 ) {

		// OPEN SESSION FOR ADMIN
		
		session_start();
		$_SESSION['user'] = $username;
		$_SESSION['user_status'] = 'admin';

		echo ( json_encode( [ 'success' => true ]));
	} else {
		
		// NOT AUTHORIZATED USER/ADMIN

		echo ( json_encode( [ 'success' => false ]));
	}
} else {
	return false;
}

die;
