<?php 
$sql['dsn'] = 'architypedb\architypesql';
$sql['username'] = 'sa';
$sql['password'] = '05014193';
$dbconf['database'] = 'HolmesStamp';
$dbconf['schema'] = 'dbo';

function db_connect() {
	global $sql;

	$conn = mssql_connect ($sql['dsn'], $sql['username'], $sql['password']);
	if ($conn === false) {
		echo "Could not connect to $dsn.\n";
	}
	return $conn;
};