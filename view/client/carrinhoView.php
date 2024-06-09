<body>
    <header>
        <h1>Carrinho</h1>
    </header>

    <main>
        <?php
        if (empty($_SESSION['carrinho'])) {
            echo "<p>Seu carrinho está vazio.</p>";
        } else {
            echo "<ul>";
            foreach ($_SESSION['carrinho'] as $produto) {
                echo "<li>
                        {$produto['nome']} - R$ {$produto['preco']} x {$produto['quantidade']}
                        <form action='index.php?p=remove_from_cart' method='post' style='display:inline;'>
                        <input type='hidden' name='id' value='{$produto['id']}'>
                        <button type='submit'>Remover</button>
                        </form>
                    </li>";
            }
            echo "</ul>";
            echo "<p><a href='index.php?p=finalizar'>Finalizar Compra</a></p>";
        }
        ?>
    </main>

</body>