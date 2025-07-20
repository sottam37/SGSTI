<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGSTI - CLIENTES</title>
     
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- FontAwesome para Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
    
        <a class="navbar-brand" href="#"><i class="fas fa-server"></i> SGSTI - CRM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="http://servidor/sgsti/index.php"><i class="fas fa-house"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" href="http://servidor/sgsti/ind.php"><i class="fas fa-chart-line"></i> Indicadores</a></li>
                <li class="nav-item"><a class="nav-link" href="http://servidor/sgsti/consulta_os.php"><i class="fas fa-tools"></i> Produção</a></li>
                <li class="nav-item"><a class="nav-link" href="http://servidor/sgsti/pesquisar.php"><i class="fas fa-user"></i> Clientes</a></li>
               
            </ul>
            <a class="btn btn-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </div>
    
</nav>

    </div>
    </div>
     <!-- Formulário de Consulta -->
     <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h7 class="mb-0">CLIENTES</h7>
<!-- Formulário de Consulta -->

                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-4">
                            <label for="unidade" class="form-label">Pesquisar Cliente</label>
                            <input type="text" name="search" id="search" class="form-control" required>
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



</div>
<?php
// Conexão com o banco de dados MariaDB
$servername = "192.168.100.33";
$username = "root";
$password = "12345678";
$dbname = "atd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Processa a pesquisa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["search"];

    // Consulta para obter os dados da tabela filtrados pelo termo de pesquisa
    $tableName = "CLIENTES";
    $searchTerm = $conn->real_escape_string($searchTerm); // Protege contra SQL Injection
    $searchTerm = strtoupper($searchTerm); // Converte o termo de pesquisa para maiúsculas
    $searchTerm = str_replace(" ", "%", $searchTerm); // Substitui espaços por '%'
    $searchTerm = str_replace("'", "''", $searchTerm); // Protege contra aspas simples
    $searchTerm = str_replace("´", "", $searchTerm); // Remove acentos agudos
    $searchTerm = str_replace("`", "", $searchTerm); // Remove acentos graves
    $searchTerm = str_replace("~", "", $searchTerm); // Remove til
    $searchTerm = str_replace("!", "", $searchTerm); // Remove ponto de exclamação
    $searchTerm = str_replace("@", "", $searchTerm); // Remove arroba
    $searchTerm = str_replace("#", "", $searchTerm); // Remove cerquilha
    $searchTerm = str_replace("$", "", $searchTerm); // Remove cifrão
    $dataQuery = "SELECT id_cli as 'ID', empresa as 'Empresa', endereco AS 'Endereço', cidade as 'Cidade', uf AS 'Estado', telefone AS 'Contato', CONCAT(nome, ' ',sobrenome) AS 'Responsável',email as 'E-mail' FROM $tableName WHERE nome LIKE '%$searchTerm%' OR cidade LIKE '%$searchTerm%' OR uf LIKE  '%$searchTerm%' OR empresa LIKE '%$searchTerm%' OR estado LIKE '%$searchTerm%'";
    $dataResult = $conn->query($dataQuery);

    // Exibe os dados na tabela
    if ($dataResult->num_rows > 0) {
        echo "<div class='container mt-4'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered text-center'>";
        echo "<thead class='table-dark'>";

        // Exibe os cabeçalhos da tabela
        $headers = $dataResult->fetch_fields();
        echo "<tr>";
        foreach ($headers as $header) {
            echo "<th>" . $header->name . "</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Exibe os dados na tabela
        while ($row = $dataResult->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-warning text-center'>Nenhum resultado encontrado para o termo pesquisado.</div>";
        echo "</div>";
    }
}

// Fecha a conexão
$conn->close();
?>
<footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            &copy; <?php echo date("Y"); ?> SGSTI - Todos os direitos reservados.
        </div>
    </footer>
</body>
</html>