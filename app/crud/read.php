<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/app/functions.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/app/connectiondb.php');
//
global $conn;

class Read {

	public function __construct( $action = '' ) {
		if ( $action == 'noreply' ) {
			return true;
		}

		if ( is_ajax() ) {
			if ( ! empty( $_POST['action'] ) ) {
				$action = $_POST['action'];
			} else {
				return true;
			}
		} else{
			if(empty($action)){
				return false;
			}
		}

		if ( method_exists( $this, $action ) ) {
			$result = $this->$action();
			if ( is_ajax() ) {
				echo json_encode( $result );
				die();
			}
		}

		return true;

	}

	public function get_id_staffers()
	{
		global $conn;

		$stid  = oci_parse( $conn, 'select fio_staff, id_staffer from staff' );
		oci_execute( $stid );

		oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

		return $res;
	}


	public function get_cities() {
		global $conn;

		$stid  = oci_parse( $conn, 'select * from city order by name_city ' );
		oci_execute( $stid );

		oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

		return $res;
	}

	public function get_types() {
		global $conn;

		$stid  = oci_parse( $conn, 'select typeworker from typeworker order by typeworker' );
		oci_execute( $stid );

		oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

		return $res;
	}

	public function get_types_all() {
		global $conn;

		$stid  = oci_parse( $conn, 'select * from typeworker order by typeworker' );
		oci_execute( $stid );

		oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

		return $res;
	}

	public function get_reviews_user() {
		global $conn;

		$stid  = oci_parse( $conn, 'select fio, note, marks from review r inner join Client cl on r.telephone_cl=cl.telephone_cl order by fio desc' );
		oci_execute( $stid );

		oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

		return $res;
	}

	public function get_reviews_admin() {
	global $conn;

	$stid  = oci_parse( $conn, 'select telephone_cl, note, marks from review order by marks desc' );
	oci_execute( $stid );

	oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

	return $res;
	}

	public function get_services() {
		global $conn;

		$stid  = oci_parse( $conn, 'select data, telephone_cl, s.id_staffer, fio_staff from service s inner join staff st on st.id_staffer=s.id_staffer order by data desc' );
		oci_execute( $stid );

		oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

		return $res;
	}

	public function get_users() {
		global $conn;

		$stid  = oci_parse( $conn, 'select cl.telephone_cl, fio, sale, name_city,password_cl, c.id_city from (client cl inner join client_auto ca on 
											cl.telephone_cl=ca.telephone_cl) inner join city c on c.id_city=cl.id_city order by fio' );
		oci_execute( $stid );

		oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

		return $res;
	}

	public function get_staffers() {
		global $conn;

		$stid  = oci_parse( $conn, 'select fio_staff, st.telephone_st, birthday,typeworker,password_st from staff st inner join staff_auto sa on st.telephone_st=sa.telephone_st order by fio_staff' );
		oci_execute( $stid );

		oci_fetch_all($stid, $res,null,null, OCI_FETCHSTATEMENT_BY_ROW);

		return $res;
	}


}

$GLOBALS['read'] = new Read();
