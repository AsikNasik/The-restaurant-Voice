<?php
require_once 'connectiondb.php';

$city = $_POST['city'];

if (
    isset($city) && $city
) {
    $stid = oci_parse($conn, "DELETE FROM City Where name_city=$city");
    $res = oci_execute($stid);

} else {
    echo json_encode(array('success' => 0));
}

die;
