<?php
namespace App\model;

class Cliente {
    private $id_cliente, $nome, $cpf, $email, $senha, $dataNascimento, $grupo;

    public function __construct(){}

    public function iniciar($id_cliente = "", $nome = "", $cpf = "", $email = "", $senha = "", $dataNascimento = "", $grupo = 0) {
        $this->id_cliente = $id_cliente;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->dataNascimento = $dataNascimento;
        $this->grupo = $grupo;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}


