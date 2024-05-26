<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="product-details">
            <h2>Detalhes do Produto</h2>
            <div>
                <img src="./imgs/produto.jpg" alt="Imagem do Produto">
                <h3 id="product-name">Nome do Produto</h3>
                <p id="product-details">Especificações/Detalhes do Produto</p>
                <label for="tamanho">Tamanho:</label>
                <select name="tamanho" id="tamanho">
                    <option value="p">P</option>
                    <option value="m">M</option>
                    <option value="g">G</option>
                    <option value="gg">GG</option>
                </select>
                <button onclick="adicionarAoCarrinho()">Comprar</button>
            </div>
        </div>
    </div>

    <script>
        function adicionarAoCarrinho() {
            // Recuperar os detalhes do produto
            const productName = document.getElementById('product-name').innerText;
            const productDetails = document.getElementById('product-details').innerText;
            const productSize = document.getElementById('tamanho').value;

            // Criar o objeto do produto
            const product = {
                name: productName,
                details: productDetails,
                size: productSize
            };

            // Recuperar o carrinho do localStorage (ou criar um novo se não existir)
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Adicionar o produto ao carrinho
            cart.push(product);

            // Armazenar o carrinho atualizado no localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Exibir mensagem de confirmação
            alert("Produto adicionado ao carrinho!");

            // Atualizar visualmente o carrinho (opcional)
            // updateCartUI();
        }

        // Função opcional para atualizar visualmente o carrinho
        // function updateCartUI() {
        //     // Lógica para atualizar a interface do carrinho
        // }
    </script>
</body>
</html>