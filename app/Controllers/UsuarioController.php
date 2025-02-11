<?php

namespace app\Controllers;

use app\Models\Usuario;

require_once __DIR__ . '/../Models/Usuario.php';

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function validarLogin($email, $senha)
    {

    }

    public function cadastrarUsuario()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        //$this->validarLogin($data['email'], $data['senha']);
        echo json_encode(['success' => $this->usuarioModel->createUsuario($data), 'menssagem' => 'Usuário Cadastro realizado com sucesso!']);
    }

    public function listarUsuarios()
    {
        $usuarios = $this->usuarioModel->getUsuarios();
        echo json_encode( ['status' => 'success', 'data' => $usuarios], JSON_PRETTY_PRINT);
        exit;
    }

    public function buscarUsuario($id)
    {
        return json_encode($this->usuarioModel->getUsuario($id));
    }

    public function atualizarUsuario($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->validarLogin($data['email'], $data['senha']);
        $this->usuarioModel->updateUsuario($id, $data);
        return json_encode(['success' => $this->usuarioModel->getUsuario($id)]);
    }

    public function excluirUsuario($id)
    {
        $this->usuarioModel->deleteUsuario($id);
        return json_encode(['success' => $this->usuarioModel->getUsuario($id)]);
    }
}

?>