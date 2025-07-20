<?php

include 'db.php';


$placa = $_POST['placa'];
$id_tipo_equipamento = $_POST['id_tipo_equipamento'];


try {
    // Cria uma nova conexão usando a extensão PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configura o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO EQUIPAMENTOS (placa, id_tipo_equipamento) VALUES ( :placa, :id_tipo_equipamento)";
    $stmt = $conn->prepare($sql);

    // Substitui os parâmetros na consulta preparada pelos valores reais
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':id_tipo_equipamento', $id_tipo_equipamento);
   
    
  
    // Executa a consulta preparada para inserir os dados no banco de dados
    $stmt->execute();

    //Redireciona a consulta preparada para inserir os dados no banco de dados
    header("Location: http://192.168.100.33/sgsti/equipamentos.php");

    echo "Dados gravados com sucesso!";
} catch(PDOException $e) {
    echo "Erro ao gravar os dados: " . $e->getMessage();
}

// Fecha a conexão com o banco de dados
$conn = null;
?>