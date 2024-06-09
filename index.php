<?php

session_start();
session_regenerate_id();

require_once "./autoload.php";

use App\controller\ClienteController as cliente;
use App\admin\controller\ProdutoController as produto;
use App\controller\CarrinhoController as carrinho;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Site</title>
    <link rel="stylesheet" href="./assets/styless.css">
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
        "home" => require_once("./view/client/homeView.php"),
        "carr" => require_once("./view/client/carrinhoView.php"),
        "log" => cliente::login(),
        "sob" => require_once("./view/client/sobreView.php"),
        "cont" => require_once("./view/client/contatoView.php"),
        "rec" => cliente::recuperarSenha(),
        "cad" => cliente::cadastrar(),
        "list" => produto::listarProdutosParaClientes(),
        "add_to_cart" => carrinho::adicionarAoCarrinho($_POST['id_produto'], $_POST['nome'], $_POST['preco'], $_POST['quantidade']),
        "remove_from_cart" => carrinho::removerDoCarrinho($_POST['id']),
        "finalizar" => carrinho::finalizarCompra(),
        default => require_once("./view/client/404.php"),
    };
    ?>
    </main>

    <footer>
        <?php require_once "./footer.php"; ?>
    </footer>
</body>
</html>
