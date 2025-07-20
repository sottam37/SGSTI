<?php
$host = '192.168.100.33';
$db = 'atd';
$user = 'root'; // Altere conforme necessário
$pass = '12345678';     // Altere conforme necessário

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
