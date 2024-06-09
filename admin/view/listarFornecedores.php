<?php

namespace App\admin\view;

use App\dal\FornecedorDao;
use App\admin\model\Fornecedor;
use \Exception;

class ListarFornecedores{
    public static function mostrarProdutos(){
        try {
            $fornecedores = FornecedorDao::listar();
            ?>
            <h1>Lista de Fornecedores</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade Solicitada</th>
                        <th>Quantidade Recebida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fornecedores as $fornecedor): ?>
                        <tr>
                            <td><?= $fornecedor->__get("id_fornecedor") ?></td>
                            <td><?= $fornecedor->__get("nome") ?></td>
                            <td><?= $fornecedor->__get("quantidade_solicitada") ?></td>
                            <td><?= $fornecedor->__get("quantidade_recebida") ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        } catch (Exception $e) {
            echo "Erro ao listar fornecedores: " . $e->getMessage();
        }
    }
}
