<?php
namespace App\util;
use DateTime;
use App\dal\ClienteDao;
use App\dal\Conn;
use App\model\Cliente;
use Exception;
use PDOException;

class Functions{
    /*private static function validarDadosEntrega($dados) {
        if (empty($dados['cep']) || empty($dados['cidade']) || empty($dados['estado']) || empty($dados['rua']) || empty($dados['numero']) || empty($dados['bairro'])) {
            
        }
    }*/

    public static function prepararTexto($texto) {
        return htmlspecialchars(trim($texto));
    }

    public static function validarEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function verificarIdade($dataNascimento) {
        $hoje = new DateTime();
        $nascimento = new DateTime($dataNascimento);
        $diferenca = $hoje->diff($nascimento);
        
        // Calcula a idade da pessoa
        $idade = $diferenca->y;
        
        // Verifica se a pessoa tem mais de 18 anos
        return $idade >= 18;
    }
    
    
    public static function validarCpf($cpf){
        // Remove caracteres especiais do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verificar se o CPF já está cadastrado no banco de dados
        $cliente = ClienteDao::buscarPorCpf($cpf);
        if ($cliente !== false) {
            return false; // CPF já cadastrado
        }
    
        return $cpf; // CPF válido e não cadastrado
    }
    
    
    

    /*private static function validarDadosCliente($dados) {
        if (empty($dados['nome']) || empty($dados['cpf']) || empty($dados['email']) || empty($dados['senha']) || empty($dados['data_nascimento'])) {
            
        }

        if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            
        }

        $cpf = preg_replace('/[^0-9]/', '', $dados['cpf']);
        if (strlen($cpf) !== 11) {
           
        }

        $dataNascimento = \DateTime::createFromFormat('Y-m-d', $dados['data_nascimento']);
        if (!$dataNascimento || $dataNascimento > new \DateTime()) {
            
        }

        $idade = $dataNascimento->diff(new \DateTime())->y;
        if ($idade < 18) {
            
        }

        if (strlen($dados['senha']) < 6) {
            
        }
    }*/

}