<?php
namespace App;
require_once("./autoload.php");
use App\controller\ClienteController as cliente;

?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <header>
        <nav>
            <?php require_once("./menu.php"); ?>
        </nav>
    </header>
    <main>
        <?php
        $page = $_GET["p"] ?? "home";
        match ($page) {
            "home" => require_once("./view/home.php"),
            "prod" => require_once("./view/produto.php"),
            "cad" => cliente::cadastrar(),
            "carr" => require_once("./view/carrinho.php"),
            "log" => require_once("./view/login.php"),
            "sob" => require_once("./view/sobre.php"),
            "cont" => require_once("./view/contato.php"),
            "rec" => require_once("./view/recuperarSenha.php"),
            default => require_once("./view/404.php"),
        }
        ?>
    </main>
    <footer>
        <?php require_once("./footer.php"); ?>
    </footer>
</body>

</html>


