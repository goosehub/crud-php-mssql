<?php
require_once '../scripts/db_funcs.php';
require_once '../scripts/table.php';
require_once '../scripts/read_script.php';

$conn = db_connect();
if (isset($_POST['update'])) {
	echo '<pre>'; print_r($_POST); echo '</pre>';
	$query_string = "update $table_select SET ";
	$columns = array();
	foreach ($results[0] as $key => $value) {
		$column_name = $key;
		array_push($columns, $column_name);
	}

	echo '<pre>'; print_r($columns); echo '</pre>';

	foreach ($columns as $column) {
		if ($column != $id_field && $column != 'update') {
			if ($_POST[$column] != '') {
				$query_string = "{$query_string} {$column} = '".$_POST[$column]."',";
			}	
		}
	}

	$query_string = rtrim($query_string, ',');

	$query_string = "{$query_string} where " . $id_field . " = ".$_POST[$id_field];

	MSSQL_Query($query_string) or die("Couldn't update record in database: ");
}

mssql_close($conn);
header('Location: ' . '../read.php');