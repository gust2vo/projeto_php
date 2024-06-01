<?php
namespace App\View;

class RecuperarSenhaView {
    public static function formularioRecuperarSenha($msg = null) {
        ?>
        <?php if (isset($msg)) : ?>
            <div class="mensagem">
                <?= $msg ?>
                <span class="close" onclick="this.parentElement.style.display='none'">&times;</span>
            </div>
        <?php endif; ?>
        <div class="container-recuperar-senha">
            <h1>Recuperar Senha</h1>
            <form action="?p=rec" method="POST">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required>
                
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" id="dataNascimento" name="dataNascimento" required>
                
                <label for="novaSenha">Nova Senha:</label>
                <input type="password" id="novaSenha" name="novaSenha" required>
                
                <input type="submit" value="Recuperar Senha">
            </form>
        </div>
        <?php
    }
}
?>
