<?php
namespace App\admin\view;

class CadastrarProduto{
    public static function formulario($msg = null){
        if (isset($msg)): ?>
            <div class="sucesso"> 
            <?= $msg ?>
            <span class="close" onclick="this.parentElement.style.display='none'">&times;</span> 
            </div>
        <?php endif; ?>
        <form action="?p=cad" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required>

            <label for="preco">Preço:</label>
            <input type="text" name="preco" id="preco" required>

            <label for="quantidade">Quantidade:</label>
            <input type="text" name="quantidade" id="quantidade" required>

            <button type="submit">Cadastrar</button>
        </form>
        <?php
    }
}

?>