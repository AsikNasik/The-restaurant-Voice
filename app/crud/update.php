<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/connectiondb.php');

class Update
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


	public function update_staff()
	{
		$fio = htmlspecialchars($_POST['fio']);
		$tel = htmlspecialchars($_POST['telephone']);
		$birthday = htmlspecialchars($_POST['birthday']);
        $type = htmlspecialchars($_POST['type']);
		$pass = htmlspecialchars($_POST['pass']);
		$tel_past = htmlspecialchars($_POST['tel_past']);

		$birthday = date('d/m/Y',strtotime($birthday));
		if (!empty($fio) && !empty($tel) && !empty($birthday) && !empty($type)&& !empty($pass)) {
 
			global $conn;

			$stid = oci_parse($conn, "UPDATE Staff SET fio_staff = '{$fio}' , telephone_st = $tel ,
								 birthday = TO_DATE('{$birthday}', 'DD/MM/YY') , typeworker = '{$type}' where telephone_st = $tel_past");
            $res = oci_execute($stid);

			$stid2 = oci_parse($conn, "UPDATE STAFF_AUTO SET telephone_st = $tel_past , password_st = '{$pass}'
								 where telephone_st = $tel_past");
            $res2 = oci_execute($stid2);

			if (!$res && !$res2) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}

	public function update_user()
	{
		$tel = htmlspecialchars($_POST['tel']);
		$fio = htmlspecialchars($_POST['fio']);
		$pass = htmlspecialchars($_POST['pass']);
        $city = htmlspecialchars($_POST['city']);
		$tel_past = htmlspecialchars($_POST['tel_past']);

		if (!empty($tel) && !empty($fio) && !empty($pass) && !empty($city)&& !empty($tel_past)) {
 
			global $conn;
//
//			$sql = "UPDATE  Client SET  fio='{$fio}' , id_city=$city where telephone_cl = $tel_past";
//			var_dump($sql);die;

			$stid = oci_parse($conn, "UPDATE Client SET  fio='{$fio}' , id_city=$city where telephone_cl = $tel_past");
            $res = oci_execute($stid);

			$stid2 = oci_parse($conn, "UPDATE  Client_auto SET  password_cl = '{$pass}' where telephone_cl = $tel_past");
            $res2 = oci_execute($stid2);

			if (!$res && !$res2) {
				return false;
			}

			return ['success' => true];
		}
        return false;
		
	}

	public function update_service()
	{
		$datetime_past = htmlspecialchars($_POST['datetime_past']);
		$tel_cl_past = htmlspecialchars($_POST['tel_cl_past']);
		$num_st_past = htmlspecialchars($_POST['num_st_past']);
		$datetime = htmlspecialchars($_POST['datetime']);
		$tel = htmlspecialchars($_POST['tel']);
        $num = htmlspecialchars($_POST['num']);

		if (!empty($datetime_past) && !empty($tel_cl_past) && !empty($num_st_past) && 
			!empty($datetime) && !empty($tel) && !empty($num)) {

			global $conn;

			$stid = oci_parse($conn, "UPDATE  Service SET data= TO_TIMESTAMP('{$datetime}', 'YYYY-MM-DD HH24:MI:SS') , telephone_cl=$tel , id_staffer=$num
										 Where data = TO_TIMESTAMP('{$datetime_past}', 'YYYY-MM-DD HH24:MI:SS') and telephone_cl=$tel_cl_past and id_staffer=$num_st_past");
            $res = oci_execute($stid);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}

	public function update_city()
	{
		$city = htmlspecialchars($_POST['name']);
        $city_last = htmlspecialchars($_POST['name-last']);

		if (!empty($city) && !empty($city_last)) {

			global $conn;

			$stid = oci_parse($conn, "UPDATE City SET name_city = '{$city}' Where name_city= '{$city_last}'");
            $res = oci_execute($stid);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}

	public function update_type()
	{
		$type = htmlspecialchars($_POST['name']);
		$salary = htmlspecialchars($_POST['salary']);
        $type_last = htmlspecialchars($_POST['name-last']);

		if (!empty($type) && !empty($type_last) && !empty($salary)) {

			global $conn;

			$stid = oci_parse($conn, "UPDATE Typeworker SET typeworker = '{$type}', salary = $salary Where typeworker= '{$type_last}'");
            $res = oci_execute($stid);

			if (!$res) {
				return false;
			}

			return ['success' => true];
		}
        return false;
	}
}

$GLOBALS['update'] = new Update();
