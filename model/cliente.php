<?php
namespace App\model;

class Cliente{
    private $id, $nome, $cpf, $email, $senha, $dataNascimento;

    private function __construct(){}

    public function iniciar($id = "", $nome = "", $cpf = "", $email = "", $senha = "", $dataNascimento = ""){
        $this->$id = $id;
        $this->$nome = $nome;
        $this->$cpf = $cpf;
        $this->$email = $email;
        $this->$senha = $senha;
        $this->$dataNascimento = $dataNascimento;     
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}