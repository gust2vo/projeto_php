<?php

namespace App\admin\view;

class CadastrarFornecedor{
    public static function formulario($msg = null){
        if (isset($msg)): ?>
            <div class="sucesso"> 
            <?= $msg ?>
            <span class="close" onclick="this.parentElement.style.display='none'">&times;</span> 
            </div>
        <?php endif; ?>
        <form action="?p=cadf" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required>

            <label for="quantidade_solicitada">Quantidade Solicitada:</label>
            <input type="text" name="quantidade_solicitada" id="quantidade_solicitada" required>

            <label for="quantidade_recebida">Quantidade Recebida:</label>
            <input type="text" name="quantidade_recebida" id="quantidade_recebida" required>

            <button type="submit">Cadastrar</button>
        </form>
        <?php
    }
}

?>