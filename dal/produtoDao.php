<?php
namespace App\dal;

use App\admin\model\Produto;
use Exception;
use PDOException;
use \PDO;

abstract class ProdutoDao {
    public static function cadastrar(Produto $produto) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("INSERT INTO produtos VALUES (null, ?,?,?)");
            $sql->execute([$produto->__get("nome"), $produto->__get("preco"), $produto->__get("quantidade")]);
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar no banco de dados");
        }
    }

    public static function buscarPorId(int $id){
        try{
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM produtos WHERE id_produto=?");
            $sql->execute(array($id));
            return $sql->fetchObject(Produto::class);
        }catch(PDOException $e){
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    

    public static function atualizarQuantidadeAdicionarCarrinho($id, $quantidade) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("UPDATE produtos SET quantidade = quantidade - ? WHERE id_produto = ?");
            $sql->execute([$quantidade, $id]);
            if ($sql->rowCount() !== 1) {
                throw new Exception("Erro ao atualizar a quantidade.");
            }
            return true;
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado: " . $e->getMessage());
        }
    }

    public static function atualizarQuantidadeRemoverCarrinho($id, $quantidade) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("UPDATE produtos SET quantidade = quantidade + ? WHERE id_produto = ?");
            $sql->execute([$quantidade, $id]);
            if ($sql->rowCount() !== 1) {
                throw new Exception("Erro ao atualizar a quantidade.");
            }
            return true;
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado: " . $e->getMessage());
        }
    }

    public static function listar(){
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM produtos");
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_CLASS, Produto::class);
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

    public static function deletar(int $id) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("DELETE FROM produtos WHERE id_produto=?");
            $sql->execute([$id]);

            if ($sql->rowCount() !== 1) {
                throw new Exception("Erro ao deletar o produto.");
            }
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

    public static function atualizar(Produto $produto) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("UPDATE produtos SET nome=?, preco=?, quantidade=? WHERE id_produto=?");
            $sql->execute([$produto->__get("nome"), $produto->__get("preco"), $produto->__get("quantidade"), $produto->__get("id")]);

            if ($sql->rowCount() !== 1) {
                throw new Exception("Erro ao atualizar o produto.");
            }
        } catch (PDOException $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
}
?>
