<?php
require_once 'connectiondb.php';

$telephone = $_POST['telephone'];

if (
    isset($telephone) && $telephone
) {
    $stid = oci_parse($conn, "DELETE FROM Staff Where id_staffer=$telephone");
    $res = oci_execute($stid);

} else {
    echo json_encode(array('success' => 0));
}

die;
