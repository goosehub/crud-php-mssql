<?php
require_once '../scripts/db_funcs.php';
require_once '../scripts/table.php';
require_once '../scripts/read_script.php';
if (isset($_POST['create'])) {

	$conn = db_connect();

	$query_string = "insert into $table_select (";
	$columns = array();
	foreach ($results[0] as $key => $value) {
		$column_name = $key;
		if ($key === $id_field) { continue; }
		array_push($columns, $column_name);
	}

	$query_string = $query_string.implode(', ', $columns).')';
	$query_string = $query_string.' VALUES (';

	$values = array();
	foreach ($results[0] as $key => $value) {
		if ($key === $id_field) { continue; }
		array_push($values, "'".$_POST[$key]."'");
	}
	$query_string = $query_string.implode(', ', $values).')';

	MSSQL_Query($query_string) or die("Couldn't add record to database: ");
}

mssql_close($conn);
header('Location: ' . '../read.php');