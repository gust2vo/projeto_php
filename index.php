<?php
//Validar cpf igual
//Validar idade maior que 100?
//Verificar crud
//Mudar Login 1 metodo so para buscar
//Criei Cadastro, Login, Recuperar Senha, Tabela Produtos, validações
//Necessario criar lista de produtos, arruma css, carrinho

namespace App;
require_once "./autoload.php";

use App\controller\ClienteController as cliente;
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
             "home"=> require_once("./view/home.php"),
             "carr"=> require_once("./view/carrinho.php"),
             "prod"=> require_once("./view/produto.php"),
             "log"=>  cliente::login(),
             "sob"=>  require_once("./view/sobre.php"),
             "cont"=> require_once("./view/contato.php"),
             "rec"=>  cliente::recuperarSenha(),
             "cad"=>  cliente::cadastrar(),
             default => require_once("./view/404.php"),
        };
        ?>
    </main>

    <footer>
        <?php require_once "./footer.php"; ?>
    </footer>
</body>

</html>
