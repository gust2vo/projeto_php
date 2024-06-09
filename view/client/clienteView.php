<?php
namespace App\View\client;

class ClienteView {
    public static function formulario($msg = null) {

        ?>
        <?php if (isset($msg)): ?>
            <div class="sucesso">
                <?= $msg ?>
                <span class="close" onclick="this.parentElement.style.display='none'">&times;</span>        
            </div>
        <?php endif; ?>
        <form action="?p=cad" method="post">

            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" name="dataNascimento" id="dataNascimento" required>

            <button type="submit">Cadastrar</button>
        </form>
        <?php
    }
}
?>
