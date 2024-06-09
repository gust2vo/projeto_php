<?php

namespace App\admin\view;

class DeletarProduto{
    public static function formulario($msg = null){
        ?>
        <h1>Deletar Produto</h1>
        <?php if ($msg) echo "<p>{$msg}</p>"; ?>
        <form action="?p=del" method="post">
            <label for="id">ID do Produto:</label>
            <input type="text" name="id" id="id" required>
            <input type="submit" value="Deletar Produto">
        </form>
        <?php
    }
}
?>
