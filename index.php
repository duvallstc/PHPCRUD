<?php 

try {
    $conn = new PDO("sqlsrv:server = tcp:sqlsvrphp.database.windows.net,1433; Database = account", "sqladmin", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "sqladmin", "pwd" => "{your_password_here}", "Database" => "account", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:sqlsvrphp.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
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