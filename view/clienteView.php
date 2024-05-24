<?php
namespace App\view;

class ClienteView{
    public static function formulario($msg = null){
        if (isset($msg)): ?>
        <div class="sucesso">
            <?= $msg ?>
            <span class="close" onclick="this.parentElement.style.display='none'">&times;</span>        
        </div>
        <?php endif; ?>
            <form action="?p=cad" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome">

            <label for="cpf">Cpf:</label>
            <input type="text" name="cpf" id="cpf">

            <label for="email">Email:</label>
            <input type="text" name="email" id="email">

            <label for="senha">Senha:</label>
            <input type="text" name="senha" id="senha" >

            <label for="dataNascimento">Datanascimento:</label>
            <input type="date" name="dataNascimento" id="dataNascimento" >

            <button type="submit">Salvar</button>
            </form>
        <?php
    }

}