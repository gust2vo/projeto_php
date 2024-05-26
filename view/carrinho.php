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
        <div class="product-details">
            <h2>Produto</h2>
            <!-- Detalhes do produto, como nome, preço, quantidade, etc. -->
        </div>
        <div class="order-summary">
            <h2>Resumo do Pedido</h2>
            <!-- Resumo do pedido, como subtotal, taxa de entrega, total, etc. -->
        </div>
        <div class="checkout">
            <h2>Checkout</h2>
            <form action="processar_pedido.php" method="post">
                <!-- Campos para os dados cadastrais do cliente -->
                <label for="endereco">Endereço de Entrega:</label>
                <input type="text" id="cep" name="cep" placeholder="CEP">
                <input type="text" id="cidade" name="cidade" placeholder="Cidade">
                <input type="text" id="estado" name="estado" placeholder="Estado">
                <input type="text" id="rua" name="rua" placeholder="Rua">
                <input type="text" id="numero" name="numero" placeholder="Número">
                <input type="text" id="complemento" name="complemento" placeholder="Complemento">
                <input type="text" id="bairro" name="bairro" placeholder="Bairro">
                
                <!-- Campo para seleção do método de pagamento -->
                <label for="pagamento">Método de Pagamento:</label>
                <select name="pagamento" id="pagamento">
                    <option value="pix">PIX</option>
                    <option value="cartao">Cartão de Crédito</option>
                </select>

                <!-- Se o método de pagamento selecionado for cartão de crédito, exibir campos adicionais -->
                <div id="cartao-credito" style="display: none;">
                    <label for="nome-cartao">Nome Completo no Cartão:</label>
                    <input type="text" id="nome-cartao" name="nome-cartao">
                    <label for="numero-cartao">Número do Cartão:</label>
                    <input type="text" id="numero-cartao" name="numero-cartao">
                    <label for="mes">Mês de Validade:</label>
                    <input type="text" id="mes" name="mes" placeholder="MM">
                    <label for="ano">Ano de Validade:</label>
                    <input type="text" id="ano" name="ano" placeholder="AAAA">
                    <label for="codigo-seguranca">Código de Segurança:</label>
                    <input type="text" id="codigo-seguranca" name="codigo-seguranca">
                    <label for="parcelas">Número de Parcelas:</label>
                    <input type="text" id="parcelas" name="parcelas">
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



