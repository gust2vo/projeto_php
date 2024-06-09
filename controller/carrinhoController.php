<?php
namespace App\controller;
require_once("./config.php");
use App\dal\ProdutoDao;
use App\view\client\Obrigado;

class CarrinhoController {
    public static function adicionarAoCarrinho($id, $nome, $preco, $quantidade) {
        $carrinho = self::listarCarrinho();
    
        $produtoEncontrado = false;
    
        foreach ($carrinho as &$item) {
            if ($item['id'] === $id && $item['nome'] === $nome) {
                $item['quantidade'] += $quantidade;
                $produtoEncontrado = true;
                break;
            }
        }

        if (!$produtoEncontrado) {
            $produto = [
                'id' => $id,
                'nome' => $nome,
                'preco' => $preco,
                'quantidade' => $quantidade 
            ];
            $carrinho[] = $produto;

            ProdutoDao::atualizarQuantidadeAdicionarCarrinho($id, $quantidade);
        }
    
        $_SESSION['carrinho'] = $carrinho;
    }
    

    public static function listarCarrinho() {
        verificarPermissaoAdmin();
        if (isset($_SESSION['carrinho'])) {
            return $_SESSION['carrinho'];
        }
        return [];
    }

    public static function removerDoCarrinho($id_produto) {
        if (isset($_SESSION['carrinho'])) {
            $carrinho = $_SESSION['carrinho'];
            foreach ($carrinho as $key => $item) {
                if ($item['id'] === $id_produto) {
                    unset($carrinho[$key]);
                    ProdutoDao::atualizarQuantidadeRemoverCarrinho($id_produto, $item['quantidade']);
                    break;
                }
            }
            $_SESSION['carrinho'] = $carrinho;
        }
    }
  
    public static function finalizarCompra() {
        verificarPermissaoAdmin();
        $nomeUsuario = isset($_COOKIE['nome_usuario']) ? $_COOKIE['nome_usuario'] : "";

        unset($_SESSION['carrinho']);

        Obrigado::obrigado($nomeUsuario);
    }
    
}
?>
