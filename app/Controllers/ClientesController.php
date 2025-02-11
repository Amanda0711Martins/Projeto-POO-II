<?php

namespace app\Controllers;
use app\Models\Cliente;

require_once __DIR__ . '/../Models/Cliente.php';

class ClientesController {
    private $ClienteModel;

    public function __construct() {
        $this->ClienteModel = new Cliente();
    }

    public function listarUsuarios()
    {
        $clientes = $this->ClienteModel->getClientes();
        return $clientes;
    }
}
?>
