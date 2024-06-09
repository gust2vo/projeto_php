<?php
namespace App\admin\model;

class Fornecedor {
    private $id, $nome, $quantidade_solicitada, $quantidade_recebida;

    public function __construct(){}

    public function iniciar($id = "", $nome = "", $quantidade_solicitada = "", $quantidade_recebida = "") {
        $this->id = $id;
        $this->nome = $nome;
        $this->quantidade_solicitada = $quantidade_solicitada;
        $this->quantidade_recebida = $quantidade_recebida;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}
?>