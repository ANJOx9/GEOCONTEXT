<?php
$servername = "localhost"; // ou o endereço do seu servidor de banco de dados
$username = "root"; // seu usuário de banco de dados
$password = ""; // sua senha de banco de dados
$dbname = "my_database"; // nome da base de dados criada

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
