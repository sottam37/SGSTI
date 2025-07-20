<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoramento do Servidor Apache</title>
    <!-- Meta tag para recarregar a página a cada 60 segundos -->
    <meta http-equiv="refresh" content="60">
    <style>
        body { font-family: Arial, sans-serif; }
        .status-online { color: green; }
        .status-offline { color: red; }
    </style>
</head>
<body>
    <h1>Monitoramento do Servidor Apache</h1>

    <?php
    // URL do servidor Apache que será monitorado
    $url = 'http://192.168.100.33';

    // Define o tempo limite para a resposta do servidor (em segundos)
    $timeout = 2;

    // Função para monitorar o servidor Apache
    function monitorApache($url, $timeout) {
        // Inicializa uma sessão cURL
        $ch = curl_init($url);
        
        // Configurações da solicitação cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        
        // Executa a solicitação e captura a resposta HTTP
        curl_exec($ch);
        
        // Verifica o código de resposta HTTP
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        // Fecha a sessão cURL
        curl_close($ch);

        // Exibe o status do servidor baseado no código de resposta
        if ($http_code >= 200 && $http_code < 400) {
            echo "<p>Status: <span class='status-online'>Online</span></p>";
            echo "<p>O servidor Apache respondeu com o código HTTP: $http_code</p>";
        } else {
            echo "<p>Status: <span class='status-offline'>Offline</span></p>";
            echo "<p>Falha na conexão ou resposta inesperada do servidor.</p>";
        }
    }

    // Executa o monitoramento
    monitorApache($url, $timeout);
    ?>
</body>
</html>
