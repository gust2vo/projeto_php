<?php

namespace App\admin\view;

class AtualizarProduto{
    public static function formulario($id, $nome, $preco, $quantidade, $msg = null){
        ?>
        <h1>Atualizar Produto</h1>
        <?php if ($msg) echo "<p>{$msg}</p>"; ?>
        <form action="?p=att" method="post">
            <label for="id">ID do Produto:</label>
            <input type="text" name="id" id="id" value="<?= $id ?>"><br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= $nome ?>"><br>
            <label for="preco">Preço:</label>
            <input type="text" name="preco" id="preco" value="<?= $preco ?>"><br>
            <label for="quantidade">Quantidade:</label>
            <input type="text" name="quantidade" id="quantidade" value="<?= $quantidade ?>"><br>
            <input type="submit" value="Atualizar">
        </form>
        <?php
    }
}
