<?php
require_once 'connectiondb.php';

$telephone = $_POST['telephone'];
$note = $_POST['note'];
$mark = $_POST['mark'];

if (
    isset($telephone) && $telephone &&
    isset($note) && $note &&
    isset($mark) && $mark
) {
    $stid = oci_parse($conn, "DELETE FROM Review Where telephone_cl = $telephone and note = $note and marks = $mark ");
    $res = oci_execute($stid);

} else {
    echo json_encode(array('success' => 0));
}

die;
