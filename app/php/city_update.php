<?php
require_once 'connectiondb.php';

$city = htmlspecialchars($_POST['name']);
$city_last = htmlspecialchars($_POST['name-last']);

if (
    isset($city) && $city
) {
    $stid = oci_parse($conn, "UPDATE TABLE City SET name_city = $city Where name_city= $city_last");
    $res = oci_execute($stid);

} else {
    echo json_encode(array('success' => 0));
}

die;