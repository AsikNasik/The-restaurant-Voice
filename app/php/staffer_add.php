<?php
require_once 'connectiondb.php';

$telephone = $_POST['telephone_st'];
$fio = $_POST['fio_st'];
$birthday = $_POST['birthday'];
$type = $_POST['type_st'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];



if (
    isset($telephone) && $telephone &&
    isset($fio) && $fio &&
    isset($birthday) && $birthday &&
    isset($type) && $type &&
    isset($pass) && $pass &&
    isset($pass2) && $pass2
) {
    // add check of validation to all fildes

    if ($pass == $pass2) {
        $stid = oci_parse($conn, "INSERT INTO staff(fio_staff, telephone_st,birthday,typeworker) values($fio,$telephone,$birthday,$type))");
        $res = oci_execute($stid);

        $stid2 = oci_parse($conn, "INSERT INTO staff_auto(telephone_st, password_st) values($telephone,$pass))");
        $res2 = oci_execute($stid2);

        // data:answer -> 1
        // OPEN THE staff_watche.HTML

    }
} else {
    echo json_encode(array('success' => 0));
}

die;
