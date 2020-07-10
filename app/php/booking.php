<?php
require_once 'connectiondb.php';

$date = $_POST['date'];
$time = $_POST['time'];
$telephone_cl = $_POST['telephone_cl'];
$number_st = $_POST['number_st'];



if (
    isset($date) && $date &&
    isset($time) && $time &&
    isset($telephone_cl) && $telephone_cl &&
    isset($number_st) && $number_st
) {
    // add check of validation to all fildes

    $stid = oci_parse($conn, `select telephone_cl from client where telephone_cl = $telephone_cl`);
    $stid2 = oci_parse($conn, `select id_staffer from staff where id_staffer = $number_st`);
    $res = oci_execute($stid);
    $res2 = oci_execute($stid2);

    if (oci_num_rows($res) == 1 && oci_num_rows($res2) == 1) {
        $stid3 = oci_parse($conn, `insert into service(data,id_staffer,telephone_cl) values(TO_TIMESTAMP('+$date + ' ' + $time+', 'YYYY-MM-DD HH24:MI:SS'),$number_st, $telephone_cl)`);
        $res3 = oci_execute($stid);
    }


    // data:answer -> 1 (if success)
    // OPEN THE tables_watch.HTML


} else {
    echo json_encode(array('success' => 0));
}

die;
