<?php

namespace App\admin\controller;

use App\util\Functions as Util;
use App\dal\ProdutoDao;
use App\admin\model\Produto;
use App\admin\view\CadastrarProduto;
use App\admin\view\AtualizarProduto;
use App\admin\view\DeletarProduto;
use App\view\client\ProdutoView;
use App\admin\view\ListarProdutos;
use App\admin\view\ProdutoListar;
use \Exception;

abstract class ProdutoController{
    private static $msg = null;
   

    public static function cadastrarProduto(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"])) {
            $nome = Util::prepararTexto($_POST["nome"]);
            $preco = Util::prepararTexto($_POST["preco"]);
            $quantidade = Util::prepararTexto($_POST["quantidade"]);

            if ($preco < 0 || $quantidade < 0) {
                self::$msg = "O preço e a quantidade não podem ser negativos!";
                CadastrarProduto::formulario(self::$msg);
                return;
            }

            try {
                $produto = new Produto();
                $produto->iniciar("", $nome, $preco, $quantidade);

                ProdutoDao::cadastrar($produto);
                self::$msg = "Cadastro do produto realizado com sucesso";
            } catch (Exception $e) {
                self::$msg = "Erro ao cadastrar produto " . $e->getMessage();
            }
        }
        CadastrarProduto::formulario(self::$msg);
    }


    public static function listar(){
        $produtos = ProdutoDao::listar();
        ListarProdutos::mostrarProdutos();
    }

    public static function atualizarProduto(){
        $id = ''; 
        $nome ='';  
        $preco = ''; 
        $quantidade = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["id"])) {
                $id = Util::prepararTexto($_POST["id"]);
                $nome = Util::prepararTexto($_POST["nome"]);
                $preco = Util::prepararTexto($_POST["preco"]);
                $quantidade = Util::prepararTexto($_POST["quantidade"]);

                if ($preco < 0 || $quantidade < 0) {
                    self::$msg = "O preço e a quantidade não podem ser negativos!";
                    AtualizarProduto::formulario($id, $nome, $preco, $quantidade, self::$msg);
                    return;
                }
                try {
                    $produto = new Produto();
                    $produto->iniciar($id, $nome, $preco, $quantidade);

                    ProdutoDao::atualizar($produto);
                    self::$msg = "Produto atualizado com sucesso";
                } catch (Exception $e) {
                    self::$msg = "Erro ao atualizar produto: " . $e->getMessage();
                }
            } else {
                self::$msg = "Erro ao receber os dados do formulário";
            }
        }
        AtualizarProduto::formulario($id, $nome, $preco, $quantidade, self::$msg);
    }


    public static function deletarProduto(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
            $id = Util::prepararTexto($_POST["id"]);

            try {
                ProdutoDao::deletar($id);
                self::$msg = "Produto deletado com sucesso!";
            } catch (Exception $e) {
                self::$msg = "Erro ao deletar produto: " . $e->getMessage();
            }
        } 
        DeletarProduto::formulario(self::$msg);
    }

    public static function listarProdutosParaClientes(){
        $produtos = ProdutoDao::listar();
        ProdutoView::listarNaHome($produtos);
    }

    
}

