<?php
namespace App\util;
use DateTime;
use App\dal\ClienteDao;
use App\dal\Conn;
use App\model\Cliente;
use Exception;
use PDOException;

class Functions{

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
  
        $idade = $diferenca->y;
        return $idade >= 18;
    }
    
    public static function validarCpf($cpf){
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) != 11) {
            return false;
        }
        $cliente = ClienteDao::buscarPorCpf($cpf);
        if ($cliente !== false) {
            return false; 
        }
    
        return $cpf; 
    }
  

}