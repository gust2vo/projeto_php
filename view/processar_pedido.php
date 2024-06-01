<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Carrinho de Compras</h2>
        <?php
        session_start();
        if (isset($_SESSION['msg'])) {
            echo "<p>" . $_SESSION['msg'] . "</p>";
            unset($_SESSION['msg']);
        }
        if (isset($_SESSION['msgErro'])) {
            echo "<p>" . $_SESSION['msgErro'] . "</p>";
            unset($_SESSION['msgErro']);
        }
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            echo "<h2>Produtos no Carrinho:</h2>";
            foreach ($_SESSION['cart'] as $produto) {
                echo "<p>" . $produto['name'] . " - Tamanho: " . $produto['size'] . "</p>";
            }
        } else {
            echo "<p>O carrinho está vazio.</p>";
        }
        ?>
        <div class="order-summary">
            <h2>Resumo do Pedido</h2>
            <!-- Resumo do pedido, como subtotal, taxa de entrega, total, etc. -->
        </div>
        <div class="checkout">
            <h2>Checkout</h2>
            <form action="/view/processar_pedido.php" method="post">
                <!-- Campos para os dados cadastrais do cliente -->
                <label for="endereco">Endereço de Entrega:</label>
                <input type="text" id="cep" name="cep" placeholder="CEP" required pattern="\d{5}-\d{3}" title="Digite um CEP válido no formato 12345-678.">
                <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
                <input type="text" id="estado" name="estado" placeholder="Estado" required>
                <input type="text" id="rua" name="rua" placeholder="Rua" required>
                <input type="text" id="numero" name="numero" placeholder="Número" required>
                <input type="text" id="complemento" name="complemento" placeholder="Complemento">
                <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
                
                <!-- Campo para seleção do método de pagamento -->
                <label for="pagamento">Método de Pagamento:</label>
                <select name="pagamento" id="pagamento" required>
                    <option value="pix">PIX</option>
                    <option value="cartao">Cartão de Crédito</option>
                </select>

                <!-- Se o método de pagamento selecionado for cartão de crédito, exibir campos adicionais -->
                <div id="cartao-credito" style="display: none;">
                    <label for="nome-cartao">Nome Completo no Cartão:</label>
                    <input type="text" id="nome-cartao" name="nome-cartao">
                    <label for="numero-cartao">Número do Cartão:</label>
                    <input type="text" id="numero-cartao" name="numero-cartao" pattern="\d{16}" title="Digite um número de cartão válido com 16 dígitos.">
                    <label for="mes">Mês de Validade:</label>
                    <input type="text" id="mes" name="mes" placeholder="MM" pattern="\d{2}" title="Digite um mês válido no formato MM.">
                    <label for="ano">Ano de Validade:</label>
                    <input type="text" id="ano" name="ano" placeholder="AAAA" pattern="\d{4}" title="Digite um ano válido no formato AAAA.">
                    <label for="codigo-seguranca">Código de Segurança:</label>
                    <input type="text" id="codigo-seguranca" name="codigo-seguranca" pattern="\d{3}" title="Digite um código de segurança válido com 3 dígitos.">
                    <label for="parcelas">Número de Parcelas:</label>
                    <input type="text" id="parcelas" name="parcelas" pattern="\d+" title="Digite um número válido de parcelas.">
                    <!-- Outros campos do cartão de crédito -->
                </div>

                <!-- Botão de submit -->
                <button type="submit">Finalizar Pedido</button>
            </form>
        </div>
    </div>

    <!-- Script para mostrar/ocultar campos do cartão de crédito -->
    <script>
        document.getElementById('pagamento').addEventListener('change', function() {
            var cartaoCredito = document.getElementById('cartao-credito');
            if (this.value === 'cartao') {
                cartaoCredito.style.display = 'block';
            } else {
                cartaoCredito.style.display = 'none';
            }
        });
    </script>
</body>
</html>




