<?php

include 'db.php';


$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

try {
    // Cria uma nova conexão usando a extensão PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configura o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO PESSOA (nome, sobrenome, cpf, email, telefone) VALUES ( :nome, :sobrenome, :cpf, :email, :telefone)";
    $stmt = $conn->prepare($sql);

    // Substitui os parâmetros na consulta preparada pelos valores reais
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
   
    
  
    // Executa a consulta preparada para inserir os dados no banco de dados
    $stmt->execute();

    //Redireciona a consulta preparada para inserir os dados no banco de dados
    header("Location: http://192.168.100.33/sgsti/pessoas.php");

    echo "Dados gravados com sucesso!";
} catch(PDOException $e) {
    echo "Erro ao gravar os dados: " . $e->getMessage();
}

// Fecha a conexão com o banco de dados
$conn = null;
?>