<?php
namespace App\view;

class LoginView {
    public static function formularioLogin($msg = null) {
        ?>
        <?php if (isset($msg)) : ?>
            <div class="mensagem">
                <?=  $msg ?>
                <span class="close" onclick="this.parentElement.style.display='none'">&times;</span>
            </div>
        <?php endif; ?>
        <div class="container-login">
            <h1>Login</h1>
            <form action="?p=log" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <label for="recuperar"><a href="?p=rec">Recuperar Senha</a></label>

                <input type="submit" value="Entrar">
            </form>
        </div>
        <?php
    }
}
?>
