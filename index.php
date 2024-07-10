<?php 

    $serverName = "sqlsvrphp.database.windows.net";
    $connectionOptions = array(
        "Database" => "account",
        "Uid" => "sqladmin",
        "PWD" => "P@ssw0rd123!"
    );

    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql = "SELECT firstName, lastName FROM dbo.employees";
    $getResults = sqlsrv_query ($conn, $tsql);
    echo ("Reading data from table" . PHP_EOL);
    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)){
        echo ($row['firstName'] . " " . $row['lastName'] . PHP_EOL);
    }
    sqlsrv_free_stmt($getResults);
    

?>