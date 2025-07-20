<?php
header('Content-Type: application/json');

// Conexão com o banco de dados (substitua com suas configurações)
$servername = "192.168.100.33";
$username = "root";
$password = "12345678";
$dbname = "atd";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexão falhou: " . $conn->connect_error]));
}

// Verifica se a data foi enviada
if (isset($_GET["data_consulta"])) {
    $data_consulta = $_GET["data_consulta"];

    // Consulta segura com prepared statement para evitar SQL Injection
    $stmt = $conn->prepare("SELECT os, dt_atd, uf, grupo, situacao, sla, observacao FROM ATENDIMENTOS WHERE dt_atd = $data_consulta");
    $stmt->bind_param("s", $data_consulta);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Retorna os dados em formato JSON
    echo json_encode($data);
    $stmt->close();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
