<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGSTI - ATENDIMENTOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            margin-right: 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .logout-btn {
            background-color: #dc3545;
            color: #ffffff !important;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        .main-content {
            margin-top: 2rem;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                <li class="nav-item">
                        <a class="nav-link" href="http://servidor/sgsti/index.php">..: HOME :..</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://servidor/sgsti/ind.php">..: INDICADORES :..</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://servidor/sgsti/consulta_os.php">..: PRODUÇÃO :..</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://servidor/sgsti/pesquisar.php">..: CLIENTES :..</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://servidor/sgsti/bc.php">..: BASE DE CONHECIMENTO :..</a>
                    </li>
                </ul>
                <a class="btn logout-btn" href="http://servidor/index.php">O</a>
            </div>
        </div>
    </nav>
    </div>

    <!-- Formulário de Consulta -->
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h7 class="mb-0">RELATORIO DE ATIVIDADES</h7>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-4">
                            <label for="data_consulta" class="form-label"></label>
                            <input type="date" name="data_consulta" id="data_consulta" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success w-45" type="submit">Buscar</button>
                            <button class="btn btn-danger w-45" type="reset">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Resultado -->
    <div class="container">
        <?php
        // Conexão com o banco de dados
        $servername = "192.168.100.33";
        $username = "root";
        $password = "12345678";
        $dbname = "atd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("<div class='alert alert-danger'>Conexão falhou: " . $conn->connect_error . "</div>");
        }

        // Processa o formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data_consulta = $_POST["data_consulta"];

            // Consulta ao banco de dados
            $sql = "SELECT os, dt_atd, uf, grupo, situacao, sla, observacao, inicio, fim FROM ATENDIMENTOS WHERE dt_atd = '$data_consulta'";
            $result = $conn->query($sql);

            // Exibe os resultados em uma tabela
            if ($result->num_rows > 0) {
                
                echo "<table class='table table-bordered mt-3'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>STATUS</th>";
                echo "<th>OS</th>";
                echo "<th>INICIO</th>";
                echo "<th>FIM</th>";
                
                echo "<th>ATIVIDADES REALIZADAS</th>";
                echo "<th>UF</th>";
               
              
                echo "<th>GRUPO</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["situacao"] . "</td>";
                    echo "<td>" . $row["os"] . "</td>";
                    echo "<td>" . $row["inicio"] . "</td>";
                    echo "<td>" . $row["fim"] . "</td>";
                    echo "<td>" . $row["observacao"] . "</td>";
                    echo "<td>" . $row["uf"] . "</td>";
                    echo "<td>" . $row["grupo"] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div class='alert alert-warning mt-4 text-center'>Nenhum resultado encontrado para a data selecionada.</div>";
            }
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            &copy; <?php echo date("Y"); ?> SGSTI - Todos os direitos reservados.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
