<?php
include 'db_bc.php';
session_start();

// Verifique se o usuário já está logado
if (isset($_SESSION['usuario'])) {
    header("Location: 192.168.100.33/sgsti/");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecte-se ao banco de dados (use o código de conexão fornecido anteriormente)

    // Recupere as credenciais do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar as credenciais
    $sql = "SELECT idusuario, usuario, senha FROM usuario WHERE usuario ='$usuario' AND senha ='$senha'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        // Login bem-sucedido, redirecione para a página do dashboard
        $usuario = $resultado->fetch_assoc();
        echo 'login bem sucedido';
        header("Location: http://192.168.100.33/bc/bc.php");
        exit();
    } else {
        // Login falhou
        $erro_login = "Credenciais inválidas. Tente novamente.";
        
        header("Location: http://192.168.100.33/sgsti/login_bc.php");
    }
}

// HTML da página de login
?>

