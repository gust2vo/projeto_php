<?php
$current_page = isset($_GET["p"]) ? $_GET["p"] : "home";
?>

<ul class="menu">
    
        <li class="home"><a href="?p=home">Home</a></li>

        <li class="prod"><a href="?p=prod">Produtos</a></li>
    <li><a href="?p=cad">Cadastrar</a></li>
    <li><a href="?p=log">Login</a></li>
    <li><a href="?p=carr">Carrinho</a></li>
</ul>