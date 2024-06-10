<?php
function verificarPermissaoAdmin() {
    if (!isset($_SESSION['grupo']) || $_SESSION['grupo'] != 0) {
        header("Location: ./index.php");
        exit();
    }
    
}   

function gerarHashSenha($senha) {
    return password_hash($senha, PASSWORD_DEFAULT);
}

function verificarSenha($senhaDigitadaPeloUsuario, $hashSenhaArmazenada) {
    return password_verify($senhaDigitadaPeloUsuario, $hashSenhaArmazenada);
}


function gerarTokenCSRF() {
    $token = bin2hex(random_bytes(32)); 
    $_SESSION['csrf_token'] = $token; 
    return $token;
}


function verificarTokenCSRF($token) {
    return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;
}



?>