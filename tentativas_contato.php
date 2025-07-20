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

$sql = "SELECT COUNT(OS) AS total FROM ATENDIMENTOS WHERE situacao like '%tentativa'";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    // Buscar todos os resultados
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "Nenhum resultado encontrado.";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
   
    <table>
        <tr>
            <!-- Suponha que a view tenha colunas id, name e amount -->
            <th> 1ª OU 2ª TENTATIVA</th>
        </tr>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo $row['total']; ?></td>
                   
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Nenhum dado disponível.</td>
            </tr>
        <?php endif; ?>
    </table><BR>
</body>
</html>