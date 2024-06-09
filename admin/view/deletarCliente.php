<?php

namespace App\admin\view;

class DeletarCliente{
    public static function formulario($msg = null){
        ?>
        <h1>Deletar Cliente</h1>
        <?php if ($msg) echo "<p>{$msg}</p>"; ?>
        <form action="?p=delc" method="post">
            <label for="id">ID do Cliente:</label>
            <input type="text" name="id" id="id" required>
            <input type="submit" value="Deletar Cliente">
        </form>
        <?php
    }
}
?>
