<?php
namespace App\model;

class Cliente {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $dataNascimento;

    public function iniciar($id, $nome, $cpf, $email, $senha, $dataNascimento) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->dataNascimento = $dataNascimento;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }
}
?>


