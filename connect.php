<!--Connect MYSQL with PHP-->
<?php
try {
    $servername = "basicbankingsystem";
    $username = "root";
    $password = "";
    $dbname = "bankingsystem";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<span class=\"error\">Connection Failed or data already exists</span>";
}