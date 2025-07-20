<?php
// Configurar parâmetros seguros para sessões
ini_set('session.use_only_cookies', 1); // Apenas cookies (evita ataques via URL)
ini_set('session.cookie_httponly', 1);  // Impede acesso via JavaScript (protege contra XSS)
ini_set('session.cookie_secure', isset($_SERVER['HTTPS'])); // Apenas HTTPS (se disponível)
ini_set('session.use_trans_sid', 0); // Desativa IDs de sessão na URL

session_set_cookie_params([
    'lifetime' => 0, // Sessão dura até o navegador fechar
    'path' => '/',
    'domain' => '',  // Substitua pelo domínio, se necessário
    'secure' => isset($_SERVER['HTTPS']), 
    'httponly' => true,
    'samesite' => 'Strict' // Protege contra CSRF
]);

session_start();
session_regenerate_id(true); // Evita Session Fixation
