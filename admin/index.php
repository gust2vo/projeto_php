<?php

session_start();
session_regenerate_id();
require_once("./config.php");
verificarPermissaoAdmin();

require_once "../autoload.php";

use App\admin\controller\ProdutoController as ProdutoController;
use App\controller\ClienteController as cliente;
use App\admin\controller\FornecedorController as fornecedor;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Site</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <header>
        <nav>
            <?php require_once "./menu.php"; ?>
        </nav>
    </header>
    <main>
        <?php
        $page = $_GET["p"] ?? "home";
        match ($page) {
            "cad" => ProdutoController::cadastrarProduto(),
            "home" => require_once("./view/homeAdmin.php"),
            "att" => ProdutoController::atualizarProduto(),
            "del" => ProdutoController::deletarProduto(),
            "listar" => ProdutoController::listar(),
            "cadf" => fornecedor::cadastrarFornecedor(),
            "attf" => fornecedor::atualizarFornecedor(),
            "delf" => fornecedor::deletarFornecedor(),
            "listarf" => fornecedor::listar(),
            "delc" => cliente::deletarCliente(),
            "listarc" => cliente::listar(),
            default => require_once("./view/erro404.php"),
        };
        ?>
    </main>
    <footer>
        <?php require_once "./footer.php"; ?>
    </footer>
</body>

</html>