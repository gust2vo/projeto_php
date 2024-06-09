<?php

namespace App\admin\view;

use App\dal\ProdutoDao;
use App\admin\model\Produto;
use \Exception;

class ListarProdutos{
    public static function mostrarProdutos(){
        try {
            $produtos = ProdutoDao::listar();
            ?>
            <h1>Lista de Produtos</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= $produto->__get("id_produto") ?></td>
                            <td><?= $produto->__get("nome") ?></td>
                            <td><?= $produto->__get("preco") ?></td>
                            <td><?= $produto->__get("quantidade") ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        } catch (Exception $e) {
            echo "Erro ao listar produtos: " . $e->getMessage();
        }
    }
}
