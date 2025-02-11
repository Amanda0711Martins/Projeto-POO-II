<?php
namespace app\Controllers;
use app\Models\ClienteLogin;
require_once __DIR__ . "/../Models/ClienteLogin.php";

class ClientesLoginController {
    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new Clientelogin();
    }
    public function buscarClienteLogado() {
        if (isset($_SESSION['cliente_id'])) {
            $cliente = $this->clienteModel->getClienteById($_SESSION['cliente_id']);
            echo json_encode($cliente);
        } else {
            http_response_code(401);
            echo json_encode(["erro" => "Não autorizado"]);
        }
    }

    public function loginCliente() {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['email'], $data['senha'])) {
            $cliente = $this->clienteModel->verificarSenha($data['email'], $data['senha']);
            if ($cliente) {
                $_SESSION['cliente_id'] = $cliente['id'];
                echo json_encode(["sucesso" => true, "cliente" => $cliente]);
            } else {
                http_response_code(401);
                echo json_encode(["erro" => "Credenciais inválidas"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["erro" => "Dados inválidos"]);
        }
    }

    public function logoutCliente() {
        session_start();
        session_destroy();
        echo json_encode(["sucesso" => true, "mensagem" => "Logout realizado"]);
    }
}
?>
