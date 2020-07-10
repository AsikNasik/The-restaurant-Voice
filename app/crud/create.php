<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/connectiondb.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/crud/read.php');

class Сreate extends Read
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

	public function create_staff()
	{
		$telephone = htmlspecialchars($_POST['telephone']);
		$fio = htmlspecialchars($_POST['fio']);
		$birthday = htmlspecialchars($_POST['birthday']);
		$type = htmlspecialchars($_POST['type']);
		$pass = htmlspecialchars($_POST['pass']);
		$pass2 = htmlspecialchars($_POST['pass2']);

		if ($pass !== $pass2) {
			return false;
		} else if (strlen($pass) < 4) {
			return false;
		} else if (strlen($telephone) < 9) {
			return false;
		}

		$birthday = date('d/m/Y',strtotime($birthday));

		if (!empty($telephone) && !empty($fio) && !empty($birthday) && !empty($type) && !empty($pass) && !empty($pass2)) {

			global $conn;

			$stid = oci_parse($conn, "INSERT INTO staff(fio_staff, telephone_st,birthday,typeworker) values('{$fio}',$telephone,TO_DATE('{$birthday}', 'DD/MM/YY'),'{$type}')");
			$res = oci_execute($stid);

			$stid2 = oci_parse($conn, "INSERT INTO staff_auto(telephone_st, password_st) values($telephone,'{$pass}')");
			$res2 = oci_execute($stid2);

			if (!$res && !$res2) {
				return false;
			}
			ob_start();
			global $read;
			require_once($_SERVER['DOCUMENT_ROOT'].'/templates/table_staffs.php');
			$table_staffs = ob_get_clean();

			return ['success' => true, 'tableStaffs' => $table_staffs];
		}
		return false;
	}

	public function create_user()
	{
		$username   = htmlspecialchars($_POST['username']);
		$user_fio   = htmlspecialchars($_POST['fio']);
		$user_city  = htmlspecialchars($_POST['city']);
		$user_pass  = htmlspecialchars($_POST['pass']);
		$user_pass2 = htmlspecialchars($_POST['pass2']);

		if ($user_pass !== $user_pass2) {
			return false;
		} else if (strlen($user_pass) < 4) {
			return false;
		} else if (strlen($username) < 9) {
			return false;
		}

		if (!empty($username) && !empty($user_fio) && !empty($user_city) && !empty($user_pass) && !empty($user_pass2)) {

			global $conn;

			$stid = oci_parse($conn, "INSERT INTO client(telephone_cl, fio, sale, id_city) values($username,'{$user_fio}',0,$user_city)");
			$res  = oci_execute($stid);

			$stid2 = oci_parse($conn, sprintf("INSERT INTO client_auto(telephone_cl, password_cl) values(%s,'%s')", $username, $user_pass));
			$res2  = oci_execute($stid2);

			if (!$res && !$res2) {
				return false;
			}

			session_start();
			$_SESSION['user'] = $username;
			$_SESSION['user_status'] = 'user';

			return ['success' => true];
		}

		return false;
	}

	public function create_review()
	{

		// get the telephone from cookie session

		$tel   = htmlspecialchars($_POST['telephone']);
		$note   = htmlspecialchars($_POST['note']);
		$mark  = htmlspecialchars($_POST['mark']);

		if (strlen($tel) < 0) {
			return false;
		} else if ($note == null) {
			return false;
		} else if ($mark < 0 || $mark > 5) {
			return false;
		}

		if (!empty($tel) && !empty($note) && !empty($mark)) {

			global $conn;
			$stid = oci_parse($conn, "INSERT INTO review(telephone_cl,note,marks) values($tel,'{$note}',$mark)");
			$res  = oci_execute($stid);

			if (!$res) {
				return false;
			}
			ob_start();
			global $read;
			require_once($_SERVER['DOCUMENT_ROOT'].'/templates/reviews.php');
			$reviews = ob_get_clean();

			return ['success' => true,'reviews'=>$reviews];
		}

		return false;
	}

	public function create_city()
	{
		$city_name = htmlspecialchars($_POST['name']);

		if (!empty($city_name)) {

			global $conn;

			$stmt = oci_parse($conn, "INSERT into city(name_city) values ('{$city_name}')");
			$res = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
		return false;
	}

	public function create_service()
	{
		$datetime = htmlspecialchars($_POST['datetime']);
		$telephone_cl = htmlspecialchars($_POST['telephone_cl']);
		$number_st = htmlspecialchars($_POST['number_staff']);

		if (!empty($datetime) && !empty($telephone_cl) && !empty($number_st)) {

			global $conn;

			$stmt = oci_parse($conn, "INSERT into service(data,id_staffer,telephone_cl) values(TO_TIMESTAMP('{$datetime}', 'YYYY-MM-DD HH24:MI:SS'),$number_st, $telephone_cl)");
			$res = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
		return false;
	}

	public function create_type()
	{
		$type = htmlspecialchars($_POST['name']);
		$salary = htmlspecialchars($_POST['salary']);

		if (!empty($type) && !empty($salary)) {

			global $conn;

			$stmt = oci_parse($conn, "INSERT into typeworker(typeworker, salary) values ('{$type}', $salary)");
			$res = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
		return false;
	}
}

$GLOBALS['create'] = new Сreate();
