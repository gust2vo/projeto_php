<?php

namespace App\view\client;

use App\admin\model\Produto;

class ProdutoView
{
    public static function listarNaHome($produtos)
    {
        echo "<div class='table-container'>";
        echo "<table>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Opções</th>
                </tr>";

        foreach ($produtos as $produto) {
            echo "<tr>
                    <td>{$produto->__get('nome')}</td>
                    <td>{$produto->__get('preco')}</td>
                    <td>{$produto->__get('quantidade')}</td>
                    <td class='tdb'>
                        <form action='index.php?p=add_to_cart' method='post'>
                        <input type='hidden' name='id_produto' value='{$produto->__get('id_produto')}'>
                        <input type='hidden' name='nome' value='{$produto->__get('nome')}'>
                        <input type='hidden' name='preco' value='{$produto->__get('preco')}'>
                        <input type='number' name='quantidade' value='1' min='1' max='{$produto->__get('quantidade')}'>
                        <button type='submit'>Adicionar ao Carrinho</button>
                        </form>
                    </td>
                  </tr>";
        }

        echo "</table>";
        echo "</div>";
    }
}
