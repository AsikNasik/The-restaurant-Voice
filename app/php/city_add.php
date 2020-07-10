<?php
require_once 'connectiondb.php';

$name = $_POST['name'];



if (
    isset($name) && $name
) {
    // add check of validation to all fildes

    $stid = oci_parse($conn, "INSERT INTO city(name_city) values($name))");
    $res = oci_execute($stid);

} else {
    echo json_encode(array('success' => 0));
}

die;
