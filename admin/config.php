<?php

function verificarPermissaoAdmin() {
    if (!isset($_SESSION['grupo']) || $_SESSION['grupo'] != 1) {

        header("Location: ../index.php");

        exit();
    }
}

?>