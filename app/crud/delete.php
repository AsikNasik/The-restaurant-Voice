<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/connectiondb.php');

class Delete
{

	public function __construct($action = '')
	{
		if (is_ajax()) {
			if (!empty($_POST['action'])) {
				$action = $_POST['action'];
			} else {
				json_encode(['error' => 'Please send action']);
				die;
			}
		} else {
			if (empty($action)) {
				return false;
			}
		}


		$result = $this->$action();

		if (is_ajax()) {
			if ($result) {
				echo json_encode($result);
			} else {
				echo json_encode(['success' => false]);
			}
			die();
		} else {
			return $result;
		}
	}


	public function delete_staff()
	{
		$telephone = htmlspecialchars($_POST['telephone']);
		if (isset($telephone)) {

			global $conn;
	/*		$sql = "DELETE FROM Staff_auto Where telephone_st=$telephone";
			echo $sql;die;*/
			$stid = oci_parse($conn, "DELETE FROM Staff_auto Where telephone_st=$telephone");
			$res = oci_execute($stid);

			$stid2 = oci_parse($conn, "DELETE FROM Staff Where telephone_st=$telephone");
			$res2 = oci_execute($stid2);

			if (!$res && !$res2) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}

	public function delete_user()
	{
		$telephone = htmlspecialchars($_POST['telephone']);


		if (isset($telephone)) {
			global $conn;

			$stid = oci_parse($conn, "DELETE FROM Client Where telephone_cl=$telephone");
			$res = oci_execute($stid);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}

	public function delete_service()
	{
		$datetime = htmlspecialchars($_POST['datetime']);
		$tel_cl = htmlspecialchars($_POST['tel_cl']);
		$num_st = htmlspecialchars($_POST['num_st']);

		if (!empty($datetime) && !empty($tel_cl) && !empty($num_st)) {

			global $conn;
			$stid = oci_parse($conn, "DELETE FROM Service Where data = TO_TIMESTAMP('{$datetime}','YYYY-MM-DD HH24:MI:SS') and telephone_cl = $tel_cl and id_staffer=$num_st");
            $res = oci_execute($stid);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}

	public function delete_review()
	{
		$telephone = htmlspecialchars($_POST['telephone']);
		$note = htmlspecialchars($_POST['note']);
		$mark = htmlspecialchars($_POST['mark']);

		if (!empty($telephone) && !empty($note) && !empty($mark)) {

			global $conn;

			$stid = oci_parse($conn, "DELETE FROM Review Where telephone_cl = $telephone and note = '{$note}' and marks = $mark ");
			$res = oci_execute($stid);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}

	public function delete_city()
	{
		$city = htmlspecialchars($_POST['name']);

		if (!empty($city)) {

			global $conn;

			$stid = oci_parse($conn, "DELETE FROM  City  Where name_city= '{$city}'");
            $res = oci_execute($stid);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}

	public function delete_type()
	{
		$type = htmlspecialchars($_POST['name']);

		if (!empty($type)) {

			global $conn;

			$stid = oci_parse($conn, "DELETE FROM  typeworker  Where typeworker= '{$type}'");
            $res = oci_execute($stid);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}
}

$GLOBALS['delete'] = new Delete();
