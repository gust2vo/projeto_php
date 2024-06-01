<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <header>
        <nav>
            <?php require_once("./menu.php"); ?>
        </nav>
    </header>

    <div class="container-cadastro">
        <h1>Cadastro de Usuário</h1>
        <form action="index.php?p=cad" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required pattern="\d{11}" title="Digite um CPF válido com 11 dígitos.">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="data_nascimento">Data Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
