<?php

namespace App\admin\controller;

use App\util\Functions as Util;
use App\dal\FornecedorDao;
use App\admin\model\Fornecedor;
use App\admin\view\CadastrarFornecedor;
use App\admin\view\AtualizarFornecedor;
use App\admin\view\DeletarFornecedor;
use App\admin\view\ListarFornecedores;

use \Exception;

abstract class FornecedorController{
    private static $msg = null;
    
    public static function cadastrarFornecedor(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"])) {
            $nome = Util::prepararTexto($_POST["nome"]);
            $quantidade_solicitada = Util::prepararTexto($_POST["quantidade_solicitada"]);
            $quantidade_recebida = Util::prepararTexto($_POST["quantidade_recebida"]);

            if ($quantidade_solicitada < 0 || $quantidade_recebida < 0) {
                self::$msg = "A quantidade solicitada e a quantidade recebida não podem ser negativos!";
                CadastrarFornecedor::formulario(self::$msg);
                return;
            }

            try {
                $fornecedor = new Fornecedor();
                $fornecedor->iniciar("", $nome, $quantidade_solicitada, $quantidade_recebida);

                FornecedorDao::cadastrar($fornecedor);
                self::$msg = "Cadastro do fornecedor realizado com sucesso";
            } catch (Exception $e) {
                self::$msg = "Erro ao cadastrar produto " . $e->getMessage();
            }
        }
        CadastrarFornecedor::formulario(self::$msg);
    }

    public static function listar(){
        $fornecedores = FornecedorDao::listar();
        ListarFornecedores::mostrarProdutos();
    }

    public static function atualizarFornecedor(){
        $id = $nome = $quantidade_solicitada = $quantidade_recebida = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["id"])) {

                $id = Util::prepararTexto($_POST["id"]);
                $nome = Util::prepararTexto($_POST["nome"]);
                $quantidade_solicitada = Util::prepararTexto($_POST["quantidade_solicitada"]);
                $quantidade_recebida = Util::prepararTexto($_POST["quantidade_recebida"]);

                if ($quantidade_solicitada < 0 || $quantidade_recebida < 0) {
                    self::$msg = "A quantidade solicitada e a quantidade recebida não podem ser negativos!";
                    AtualizarFornecedor::formulario($id, $nome, $quantidade_solicitada, $quantidade_recebida, self::$msg);
                    return;
                }

                try {
                    $fornecedor = new Fornecedor();
                    $fornecedor->iniciar($id, $nome, $quantidade_solicitada, $quantidade_recebida);

                    FornecedorDao::atualizar($fornecedor);
                    self::$msg = "Fornecedor atualizado com sucesso";
                } catch (Exception $e) {
                    self::$msg = "Erro ao atualizar fornecedor: " . $e->getMessage();
                }
            } else {
                self::$msg = "Erro ao receber os dados do formulário";
            }
        }
        AtualizarFornecedor::formulario($id, $nome, $quantidade_solicitada, $quantidade_recebida, self::$msg);
    }


    public static function deletarFornecedor(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
            $id = Util::prepararTexto($_POST["id"]);

            try {
                FornecedorDao::deletar($id);
                self::$msg = "Fornecedor deletado com sucesso!";
            } catch (Exception $e) {
                self::$msg = "Erro ao deletar fornecedor: " . $e->getMessage();
            }
        } 

        DeletarFornecedor::formulario(self::$msg);
    }

}

