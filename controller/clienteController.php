<?php
require_once 'App/dal/ClienteDao.php';
require_once 'App/model/Cliente.php';
require_once 'App/util/Functions.php';

use App\util\Functions as util;
use App\model\Cliente;
use App\dal\ClienteDao;


abstract class ClienteController {
    private static $msg = null;

    public static function cadastrar() {
        try {
            // Validar os dados do cliente
            self::validarDadosCliente($_POST);

            // Criar um novo objeto Cliente com os dados do formulário
            $cliente = new Cliente();
            $cliente->iniciar(
                null, // id será gerado automaticamente
                $_POST['nome'],
                $_POST['cpf'],
                $_POST['email'],
                $_POST['senha'],
                $_POST['data_nascimento']
            );

            // Chamar o método de cadastro do ClienteDao
            ClienteDao::cadastrar($cliente);

            // Definir mensagem de sucesso
            self::$msg = "Cliente cadastrado com sucesso!";
        } catch (Exception $e) {
            // Em caso de erro, definir mensagem de erro
            self::$msg = "Erro ao cadastrar cliente: " . $e->getMessage();
        }
        // Redirecionar para a página principal com a mensagem
        header("Location: index.php?msg=" . urlencode(self::$msg));
    }

    // Método para validar os dados do cliente
    private static function validarDadosCliente($dados) {
        // Verificar se todos os campos foram preenchidos
        if (empty($dados['nome']) || empty($dados['cpf']) || empty($dados['email']) || empty($dados['senha']) || empty($dados['data_nascimento'])) {
            throw new Exception("Todos os campos são obrigatórios.");
        }

        // Validar formato de email
        if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Formato de email inválido.");
        }

        // Remover caracteres especiais do CPF e verificar se possui 11 dígitos
        $cpf = preg_replace('/[^0-9]/', '', $dados['cpf']);
        if (strlen($cpf) !== 11) {
            throw new Exception("CPF inválido.");
        }

        // Verificar se a data de nascimento é uma data válida
        $dataNascimento = \DateTime::createFromFormat('Y-m-d', $dados['data_nascimento']);
        if (!$dataNascimento) {
            throw new Exception("Data de nascimento inválida.");
        }

        // Verificar se a senha tem pelo menos 6 caracteres
        if (strlen($dados['senha']) < 6) {
            throw new Exception("A senha deve ter pelo menos 6 caracteres.");
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'cadastrar') {
    ClienteController::cadastrar();
}
?>


