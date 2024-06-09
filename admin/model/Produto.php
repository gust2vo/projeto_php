<?php
namespace App\admin\model;

class Produto {
    private $id, $nome, $preco, $quantidade;

    public function __construct(){}

    public function iniciar($id = "", $nome = "", $preco = "", $quantidade = "") {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }
    
    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}
?>