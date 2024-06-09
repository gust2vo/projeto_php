<?php

namespace App\admin\view;

use App\dal\ClienteDao;
use App\model\Cliente;
use \Exception;

class ListarClientes{
    public static function mostrarClientes(){
        try {
            $clientes = ClienteDao::listar();
?>
            <h1>Lista de Clientes</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Data Nascimento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente) : ?>
                        <tr>
                            <td><?= $cliente->__get('id_cliente') ?></td>
                            <td><?= $cliente->__get('nome') ?></td>
                            <td><?= $cliente->__get('cpf') ?></td>
                            <td><?= $cliente->__get('email') ?></td>
                            <td><?= $cliente->__get('dataNascimento') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
<?php
        } catch (Exception $e) {
            echo "Erro ao listar clientes: " . $e->getMessage();
        }
    }
}
