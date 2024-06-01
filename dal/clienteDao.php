<?php
namespace App\dal;


use App\model\Cliente;
use Exception;
use PDOException;
use \PDO;

abstract class ClienteDao {
 
    public static function cadastrar(Cliente $cliente) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?,?,?,?,?)");
            $sql-> execute([$cliente->__get("nome"), $cliente->__get("cpf"), $cliente->__get("email"), $cliente->__get("senha"), $cliente->__get("dataNascimento")]);
        }catch (PDOException $e) {
            throw new Exception("Erro ao salvar no banco de dados");
        }catch (Exception $e){
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

   public static function buscarPorId(int $id){
    try {
        $pdo = Conn::getConn();
        $sql = $pdo->prepare("SELECT * FROM clientes WHERE id=?");
        $sql->execute(array($id));
        
        return $sql->fetchObject(Cliente::class);

    } catch (PDOException $e) {
        throw new Exception("Ocorreu um erro inesperado" . $e->getMessage() . $e->getCode());
    }
   }

   public static function buscarPorCpf($cpf){
    try {
        $pdo = Conn::getConn();
        $sql = $pdo->prepare("SELECT * FROM clientes WHERE cpf=?");
        $sql->execute([$cpf]);
        
        return $sql->fetchObject(Cliente::class);

    } catch (PDOException $e) {
        throw new Exception("Ocorreu um erro inesperado" . $e->getMessage() . $e->getCode());
     }
    }

    public static function buscarPorEmail($email){
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM clientes WHERE email=?");
            $sql->execute([$email]);
            
            return $sql->fetchObject(Cliente::class);

        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

    public static function buscarPorSenha($senha){
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM clientes WHERE senha=?");
            $sql->execute([$senha]);

            return $sql->fetchObject($senha);
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

    public static function buscarPorCpfDataNascimento($cpf, $dataNascimento) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM clientes WHERE cpf=? AND dataNascimento=?");
            $sql->execute([$cpf, $dataNascimento]);
    
            return $sql->fetchObject(Cliente::class);
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    

    public static function atualizarSenha($cpf, $novaSenha) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("UPDATE clientes SET senha=? WHERE cpf=?");
            $sql->execute([$novaSenha, $cpf]);
    
            if ($sql->rowCount() !== 1) {
                throw new Exception("Erro ao atualizar a senha.");
            }
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado: " . $e->getMessage() . $e->getCode());
        }
    }
    
    
    
}

