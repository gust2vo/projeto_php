<?php
namespace App\model;

class Cliente {
    private $id, $nome, $cpf, $email, $senha, $dataNascimento;

    public function __construct(){}

    public function iniciar($id = "", $nome = "", $cpf = "", $email = "", $senha = "", $dataNascimento = "") {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->dataNascimento = $dataNascimento;
    }

    public static function pegarCliente($id = null, $nome = null, $sobrenome = null, $ddd = null, $telefone = null){
        $novoCliente = new static();
        $novoCliente->id = $id;
        $novoCliente->nome = $nome;
        $novoCliente->sobrenome = $sobrenome;
        $novoCliente->ddd = $ddd;
        $novoCliente->telefone = $telefone;
        return $novoCliente;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    
}

