<?php
namespace App\controller;

use App\util\Functions as Util;
use App\model\Cliente;
use App\dal\ClienteDao;
use App\view\ClienteView;
use App\view\LoginView;
use App\View\RecuperarSenhaView;

use \Exception;

abstract class ClienteController {
    private static $msg = null;

    public static function cadastrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"])) {
            $nome = Util::prepararTexto($_POST["nome"]);
            $cpf = Util::prepararTexto($_POST["cpf"]);
            $email = Util::prepararTexto($_POST["email"]);
            $senha = Util::prepararTexto($_POST["senha"]);
            $dataNascimento = Util::prepararTexto($_POST["dataNascimento"]);

            try {
                // Validação de CPF
                if (!Util::validarCpf($cpf)) {
                    throw new Exception("Cpf inválido ou já existente");
                }

                // Validação de Email
                if (!Util::validarEmail($email)) {
                    throw new Exception("Email inválido");
                }

                // Validação de idade
                if (!Util::verificarIdade($dataNascimento)) {
                    throw new Exception("Você deve ter pelo menos 18 anos para se cadastrar");
                }

                // Se todas as validações passarem, tenta cadastrar o cliente
                $cliente = new Cliente();
                $cliente->iniciar("", $nome, Util::validarCpf($cpf), $email, $senha, $dataNascimento);

                ClienteDao::cadastrar($cliente);
                self::$msg = "Cadastro realizado com sucesso!";
            } catch (Exception $e) {
                self::$msg = "Erro ao cadastrar: " . $e->getMessage();
            }
        }
        ClienteView::formulario(self::$msg);
    }

    public static function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["senha"])) {
            $email = Util::prepararTexto($_POST["email"]);
            $senha = Util::prepararTexto($_POST["senha"]);

            try {
                // Busca o cliente pelo email
                $cliente = ClienteDao::buscarPorEmail($email);
                if ($cliente) {
                    // Verifica se a senha está correta
                    if ($cliente->senha === $senha) {
                        // Inicia a sessão do usuário
                        session_start();
                        $_SESSION["cliente_id"] = $cliente->id;
                        // Define mensagem de sucesso
                        self::$msg = "Login bem-sucedido!";
                        // Redireciona para a página inicial
                        header("Location: index.php");
                        exit();
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
        $msg = null;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cpf"]) && isset($_POST["dataNascimento"]) && isset($_POST["novaSenha"])) {
            // Remover os hífens do CPF e da data de nascimento
            $cpf = str_replace('-', '', Util::prepararTexto($_POST["cpf"]));
            $dataNascimento = str_replace('-', '', Util::prepararTexto($_POST["dataNascimento"]));
            $novaSenha = Util::prepararTexto($_POST["novaSenha"]);
    
            try {
                // Verifica se as informações fornecidas são válidas
                $cliente = ClienteDao::buscarPorCpfDataNascimento($cpf, $dataNascimento);
                if ($cliente) {
                    // Atualiza apenas a senha do cliente se o CPF e a data de nascimento existirem
                    $cliente->senha = $novaSenha;
                    ClienteDao::atualizarSenha($cpf, $novaSenha);
                    $msg = "Senha recuperada com sucesso!";
                } else {
                    throw new Exception("CPF ou data de nascimento inválidos.");
                }
            } catch (Exception $e) {
                $msg = "Erro ao recuperar a senha: " . $e->getMessage();
            }
        }
        RecuperarSenhaView::formularioRecuperarSenha($msg);
    }
    
}
?>
