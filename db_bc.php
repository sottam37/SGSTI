<?php
$servername = "192.168.100.33";
$username = "root";
$password = "12345678";
$dbname = "bc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
