

<div class="container-contato">

            <h1>Entre em Contato</h1>
            <form action="enviar_contato.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </div>