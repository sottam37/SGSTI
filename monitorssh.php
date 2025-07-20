<?php
$service = shell_exec("systemctl is-active ssh");

if (trim($service) == "active") {
    echo 'status-online'; // Verde
} else {
    echo 'status-offline'; // Vermelho
}
?>
