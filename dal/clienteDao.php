<?php
namespace App\dal;

use \PDO;
use App\model\Cliente;
use \Exception;

abstract class ClienteDao {
    private static $connection;

    private static function connect() {
        if (!isset(self::$connection)) {
            $dsn = 'mysql:host=127.0.0.1:3307;dbname=projeto;charset=utf8mb4';
            $username = 'root';
            $password = '';

            try {
                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                throw new Exception("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function cadastrar(Cliente $cliente) {
        $sql = "INSERT INTO cliente (nome, cpf, email, senha, dataNascimento) VALUES (:nome, :cpf, :email, :senha, :dataNascimento)";

        try {
            $stmt = self::connect()->prepare($sql);

            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':cpf', $cliente->getCpf());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':senha', $cliente->getSenha());
            $stmt->bindValue(':dataNascimento', $cliente->getDataNascimento());

            $stmt->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastrar cliente: " . $e->getMessage());
        }
    }
}
?>



