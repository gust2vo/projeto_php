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
        isset($_GET["p"]) ? $page = $_GET["p"] : $page = "home";
        match ($page) {
            "home" => require_once("./view/home.php"),
            "prod" => require_once("./view/produto.php"),
            "cad" => require_once("./view/cadastrar.php"),
            "carr" => require_once("./view/carrinho.php"),
            "log" => require_once("./view/login.php"),
            "sob" => require_once("./view/sobre.php"),
            "cont" => require_once("./view/contato.php"),
            default => require_once("./view/404.php"),
        }
        ?>
    </main>
    <footer>
        <?php require_once("./footer.php"); ?>
    </footer>
</body>

</html>
