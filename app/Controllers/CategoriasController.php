<?php
namespace app\Controllers;
use app\Models\Categoria;

require_once __DIR__ . "/../Models/Categoria.php";

class CategoriasController {
    private $categoriaModel;

    public function __construct() {
        $this->categoriaModel = new Categoria();
    }

    public function listarCategorias() {
        echo json_encode( $this->categoriaModel->getCategorias());
        exit;
    }

    public function buscarCategoria($id) {
        $categoria = $this->categoriaModel->getCategoriaById($id);
        if ($categoria) {
            echo json_encode($categoria);
            exit;
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Categoria não encontrado"]);
            exit;
        }
    }
}
?>
