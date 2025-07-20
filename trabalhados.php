<?php
$servername = "192.168.100.33";
$username = "root";
$password = "12345678";
$dbname = "atd";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS total
FROM (
    SELECT DISTINCT a.os
    FROM atd.ATENDIMENTOS a 
    WHERE a.situacao = 'TRABALHADO'
) AS subquery;";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // Buscar todos os resultados
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = [];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Trabalhados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .table-container {
            margin-top: 50px;
        }

        .table-header {
            background-color: #343a40;
            color: white;
            font-weight: bold;
        }

        .alert-warning {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <?php if (!empty($data)): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead class="table-header">
                        <tr>
                            <th>TRABALHADOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row): ?>
                            <tr>
                                <td><?php echo $row['total']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                Nenhum dado disponível.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
