<?php
// Conexão com banco de dados (MySQLi)
$host = '192.168.100.33';
$user = 'root';
$pass = '12345678';
$db   = 'atd'; // Substitua pelo seu nome de banco

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Erro na conexão: ' . $conn->connect_error);
}

// Consultas
$total_os       = $conn->query("SELECT COUNT(*) FROM ATENDIMENTOS")->fetch_row()[0];
$diagnosticos   = $conn->query("SELECT COUNT(*) FROM ATENDIMENTOS WHERE status = 'diagnostico'")->fetch_row()[0];
$devolvidos     = $conn->query("SELECT COUNT(*) FROM ATENDIMENTOS WHERE status = 'devolvido'")->fetch_row()[0];
$trabalhados    = $conn->query("SELECT COUNT(*) FROM ATENDIMENTOS WHERE status = 'trabalhado'")->fetch_row()[0];
$improcedentes  = $conn->query("SELECT COUNT(*) FROM ATENDIMENTOS WHERE status = 'improdutivo'")->fetch_row()[0];

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>SGSTI - Indicadores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .chart-container {
            max-width: 800px;
            margin: 50px auto;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fas fa-server"></i> SGSTI - KPI</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-house"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-chart-line"></i> Indicadores</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-tools"></i> Produção</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user"></i> Clientes</a></li>
            </ul>
            <a class="btn btn-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </div>
    </div>
</nav>

<!-- Conteúdo -->
<div class="container text-center mt-5">
    <h2>Indicadores de Desempenho</h2>
    <div class="chart-container">
        <canvas id="kpiChart"></canvas>
    </div>
</div>

<!-- Footer -->
<footer>
    &copy; <?= date("Y") ?> SGSTI - Todos os direitos reservados.
</footer>

<!-- Script para Chart.js -->
<script>
const ctx = document.getElementById('kpiChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Total OS', 'Diagnósticos', 'Devolvidos', 'Trabalhados', 'Improcedentes'],
        datasets: [{
            label: 'Quantidade',
            data: [
                <?= $total_os ?>,
                <?= $diagnosticos ?>,
                <?= $devolvidos ?>,
                <?= $trabalhados ?>,
                <?= $improcedentes ?>
            ],
            backgroundColor: [
                '#007bff',
                '#28a745',
                '#ffc107',
                '#dc3545',
                '#17a2b8'
            ],
            borderColor: '#343a40',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 10
                }
            }
        }
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
