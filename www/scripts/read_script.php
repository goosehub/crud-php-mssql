<?php
$conn = db_connect();

$query_string="select * from $table_select";    
$res = MSSQL_Query ($query_string);

$results = array();
while ($subRow = @MSSQL_Fetch_Assoc($res)) {
    $results[] = $subRow;
}

mssql_close($conn);