<?php
//conexão com banco de dados
$_SeverName = "localhost";
$userName = "root";
$passWord = "";
$dbName = "geocontext";

$connect = mysqli_connect($_SeverName, $userName, $passWord, $dbName);

if (!$connect) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
