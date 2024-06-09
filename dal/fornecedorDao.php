<?php
namespace App\dal;

use App\admin\model\Fornecedor;
use Exception;
use PDOException;
use \PDO;

abstract class FornecedorDao {
    public static function cadastrar(Fornecedor $fornecedor) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("INSERT INTO fornecedores VALUES (null, ?,?,?)");
            $sql->execute([$fornecedor->__get("nome"), $fornecedor->__get("quantidade_solicitada"), $fornecedor->__get("quantidade_recebida")]);
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar no banco de dados");
        }
    }

    public static function buscarPorId(int $id) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM fornecedores WHERE id_fornecedor = ?");
            $sql->execute(array($id));
            return $sql->fetchObject(Fornecedor::class); 
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    public static function listar(){
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM fornecedores");
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_CLASS, Fornecedor::class);
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

    public static function deletar(int $id) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("DELETE FROM fornecedores WHERE id_fornecedor=?");
            $sql->execute([$id]);

            if ($sql->rowCount() !== 1) {
                throw new Exception("Erro ao deletar o fornecedor.");
            }
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

    public static function atualizar(Fornecedor $fornecedor) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("UPDATE fornecedores SET nome=?, quantidade_solicitada=?, quantidade_recebida=? WHERE id_fornecedor=?");
            $sql->execute([$fornecedor->__get("nome"), $fornecedor->__get("quantidade_solicitada"), $fornecedor->__get("quantidade_recebida"), $fornecedor->__get("id")]);

            if ($sql->rowCount() !== 1) {
                throw new Exception("Erro ao atualizar o fornecedor.");
            }
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
}
?>
