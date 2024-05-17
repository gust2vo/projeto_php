<?php
$current_page = isset($_GET["p"]) ? $_GET["p"] : "home";
?>

<ul class="menu">
    <?php if ($current_page == "prod"): ?>
        <li class="prod"><a href="?p=home">Home</a></li>
    <?php else: ?>
        <li class="prod"><a href="?p=prod">Produtos</a></li>
    <?php endif; ?>
    <li><a href="?p=cad">Cadastrar</a></li>
    <li><a href="?p=log">Login</a></li>
    <li><a href="?p=carr">Carrinho</a></li>
</ul>