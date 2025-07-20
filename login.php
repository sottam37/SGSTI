<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGSTI - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://192.168.100.33/estilo.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        .login-card img {
            display: block;
            margin: 0 auto 20px;
        }

        .login-card .form-control {
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .login-card button {
            background-color: #007bff;
            color: white;
            font-size: 1.2rem;
            padding: 12px 0;
            border-radius: 5px;
            border: none;
        }

        .login-card button:hover {
            background-color: #0056b3;
        }

        .footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <form method="post" action="logon.php">
                <center><img src="./login_icon.png" width="100" alt="Login Icon"></center>
                <h3 class="text-center mb-4">Sistema de Gestão de TI</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn w-100">Entrar</button>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> SGSTI - Todos os direitos reservados.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
