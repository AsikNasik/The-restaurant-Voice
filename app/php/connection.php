<?php
$conn = oci_connect('student', '1111', 'localhost/xe');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

/*
 * CREATE TABLE
 *
 * $stmt = oci_parse($conn, "create table hallo (test varchar2(64))");
oci_execute($stmt);
echo "Created table<br>\n";*/

$stid = oci_parse($conn, 'SELECT * FROM typeWorker');
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_BOTH))) {
	// Используйте название полей в верхнем регистре для ассоциативных индексов
	var_dump($row);
//	echo $row["TYPEWORKER"];
	echo '<br>';
	echo '<br>';
	echo '<br>';
}