<?php
namespace App\controller;
require_once("./config.php");

use App\util\Functions as Util;
use App\model\Cliente;
use App\dal\ClienteDao;
use App\view\client\ClienteView;
use App\view\client\LoginView;
use App\View\client\RecuperarSenhaView;
use App\admin\view\listarClientes;
use App\admin\view\DeletarCliente;

use \Exception;

abstract class ClienteController {
    private static $msg = null;

    public static function cadastrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && verificarTokenCSRF($_POST["csrf_token"]) && isset($_POST["nome"])) {
            $nome = Util::prepararTexto($_POST["nome"]);
            $cpf = Util::prepararTexto($_POST["cpf"]);
            $email = Util::prepararTexto($_POST["email"]);
            $senha = Util::prepararTexto($_POST["senha"]);
            $dataNascimento = Util::prepararTexto($_POST["dataNascimento"]);
            $grupo = 0;
    
            try {
                $clienteExistente = ClienteDao::buscarPorEmail($email);
                if ($clienteExistente) {
                    throw new Exception("Este email já está cadastrado.");
                }

                if (!Util::validarCpf($cpf)) {
                    throw new Exception("Cpf inválido ou já existente");
                }

                if (!Util::validarEmail($email)) {
                    throw new Exception("Email inválido");
                }

                if (!Util::verificarIdade($dataNascimento)) {
                    throw new Exception("Você deve ter pelo menos 18 anos para se cadastrar");
                }

                $senhaCriptografada = gerarHashSenha($senha);
    
                $cliente = new Cliente();
                $cliente->iniciar("", $nome, Util::validarCpf($cpf), $email, $senhaCriptografada, $dataNascimento, $grupo);
    
                ClienteDao::cadastrar($cliente);
                self::$msg = "Cadastro realizado com sucesso!";
            } catch (Exception $e) {
                self::$msg = "Erro ao cadastrar: " . $e->getMessage();
            }
        }
        ClienteView::formulario(self::$msg);
    }

    public static function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && verificarTokenCSRF($_POST["csrf_token"]) && isset($_POST["email"]) && isset($_POST["senha"])) {
        
            $email = Util::prepararTexto($_POST["email"]);
            $senha = Util::prepararTexto($_POST["senha"]);
        
            try {
                $cliente = ClienteDao::buscarPorEmail($email);
        
                if ($cliente) {
                    if (verificarSenha($senha, $cliente->senha)) {
                        $_SESSION['user'] = $cliente->email;
                        $_SESSION['grupo'] = $cliente->grupo;
                        setcookie("nome_usuario", $cliente->nome, time() + 3600, "/");
        
                        if ($cliente->grupo == 1) {
                            header("Location: ./admin/index.php");
                            exit();
                            } else {
                            header("Location: ./index.php");
                            exit();
                            }
                        } else {
                            throw new Exception("Senha incorreta");
                        }
                    } else {
                        throw new Exception("Email não encontrado");
                    }
                } catch (Exception $e) {
                    self::$msg = "Erro ao fazer login: " . $e->getMessage();
                }
            }
            LoginView::formularioLogin(self::$msg);
        }

    public static function recuperarSenha() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && verificarTokenCSRF($_POST["csrf_token"]) && isset($_POST["cpf"]) && isset($_POST["dataNascimento"]) && isset($_POST["novaSenha"])) {
            $cpf = str_replace('-', '', Util::prepararTexto($_POST["cpf"]));
            $dataNascimento = str_replace('-', '', Util::prepararTexto($_POST["dataNascimento"]));
            $novaSenha = Util::prepararTexto($_POST["novaSenha"]);
        
            try {
                $cliente = ClienteDao::buscarPorCpfDataNascimento($cpf, $dataNascimento);
                if ($cliente) {
                    $novaSenhaCriptografada = gerarHashSenha($novaSenha);
                    $cliente->senha = $novaSenhaCriptografada;
                    ClienteDao::atualizarSenha($cliente->cpf, $cliente->senha);
                    self::$msg = "Senha atualizada com sucesso!";
                } else {
                    throw new Exception("CPF ou Data de Nascimento inválidos");
                }
            } catch (Exception $e) {
                self::$msg = "Erro ao recuperar senha: " . $e->getMessage();
            }
        }
        RecuperarSenhaView::formularioRecuperarSenha(self::$msg);
    }

    public static function deletarCliente(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
            $id = Util::prepararTexto($_POST["id"]);
            try {
                ClienteDao::deletar($id);
                self::$msg = "Cliente deletado com sucesso!";
            } catch (Exception $e) {
                self::$msg = "Erro ao deletar Cliente: " . $e->getMessage();
            }
        } 
        DeletarCliente::formulario(self::$msg);
    }

    public static function listar(){
        $clientes = ClienteDao::listar();
        ListarClientes::mostrarClientes();
    }
}
?>
