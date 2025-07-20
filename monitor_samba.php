<?php
$host = '127.0.0.1'; // IP do servidor 
$port = 445; // Porta 

$connection = @fsockopen($host, $port, $errno, $errstr, 2);

if ($connection) {
    echo 'status-online'; // Verde
    fclose($connection);
} else {
    echo 'status-offline'; // Vermelho
}
?>
