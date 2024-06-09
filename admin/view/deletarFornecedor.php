<?php

namespace App\admin\view;

class DeletarFornecedor{
    public static function formulario($msg = null){
        ?>
        <h1>Deletar Fornecedor</h1>
        <?php if ($msg) echo "<p>{$msg}</p>"; ?>
        <form action="?p=delf" method="post">
            <label for="id">ID do Fornecedor:</label>
            <input type="text" name="id" id="id" required>
            <input type="submit" value="Deletar Fornecedor">
        </form>
        <?php
    }
}
?>
