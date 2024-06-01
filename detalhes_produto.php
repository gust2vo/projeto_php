<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function adicionarAoCarrinho() {
            const productName = document.getElementById('product-name').innerText;
            const productDetails = document.getElementById('product-details').innerText;
            const productSize = document.getElementById('tamanho').value;

            const product = {
                name: productName,
                details: productDetails,
                size: productSize
            };

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "index.php?action=adicionar_carrinho", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    alert('Produto adicionado ao carrinho!');
                    document.getElementById('navigate-buttons').style.display = 'block';
                }
            };
            xhr.send(JSON.stringify(product));
        }
    </script>
</head>
<body>
    <h1 id="product-name">Produto A</h1>
    <p id="product-details">Detalhes do Produto A</p>
    <label for="tamanho">Tamanho:</label>
    <select id="tamanho">
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
    </select>
    <button onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>

    <div id="navigate-buttons" style="display:none;">
        <button onclick="window.location.href='index.php?p=carr'">Ir para o Carrinho</button>
        <button onclick="window.location.href='index.php?p=prod'">Voltar para Produtos</button>
        <button onclick="window.location.href='index.php?p=home'">Voltar para Home</button>
    </div>
</body>
</html>
