<?php

namespace App\admin\view;

class AtualizarFornecedor{
    public static function formulario($id, $nome, $quantidade_solicitada, $quantidade_recebida, $msg = null){
        ?>
        <h1>Atualizar Fornecedor</h1>
        <?php if ($msg) echo "<p>{$msg}</p>"; ?>
        <form action="?p=attf" method="post">
            <label for="id">ID do Fornecedor:</label>
            <input type="text" name="id" id="id" value="<?= $id ?>"><br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= $nome ?>"><br>
            <label for="quantidade_solicitada">Quantidade Solicitada:</label>
            <input type="text" name="quantidade_solicitada" id="quantidade_solicitada" value="<?= $quantidade_solicitada ?>"><br>
            <label for="quantidade_recebida">Quantidade Recebida:</label>
            <input type="text" name="quantidade_recebida" id="quantidade_recebida" value="<?= $quantidade_recebida ?>"><br>
            <input type="submit" value="Atualizar">
        </form>
        <?php
    }
}
