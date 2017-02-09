<?php
require_once '../scripts/db_funcs.php';
require_once '../scripts/table.php';
$conn = db_connect();
if (isset($_POST['remove'])) {
	$delete_query = 'delete from '.$_POST['table_select'].' where ' . $id_field. ' = \''.$_POST['record_id'].'\';';
	MSSQL_Query($delete_query) or die ("Couldn't remove record from database: ");
}
mssql_close($conn);
header('Location: ' . '../read.php');