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

?>