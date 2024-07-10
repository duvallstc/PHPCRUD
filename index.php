<?php
try {
    $serverName = "tcp:sqlsvrphp.database.windows.net,1433"; // Replace with your server name
    $database = "account"; // Replace with your database name
    $username = "sqladmin"; // Replace with your username
    $password = "P@ssw0rd123!"; // Replace with your password

    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tsql = "SELECT firstName, lastName FROM dbo.employees";
    $stmt = $conn->query($tsql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo ($row['firstName'] . " " . $row['lastName'] . PHP_EOL);
    }
} catch (PDOException $e) {
    echo "Error connecting to SQL Server.";
    echo $e->getMessage();
}
?>