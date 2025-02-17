<?php
namespace app\Controllers;
use app\Models\CategoriaWeb;

require_once __DIR__ . "/../Models/CategoriaWeb.php";

class CategoriasWebController {
    private $categoriaModel;

    public function __construct() {
        $this->categoriaModel = new CategoriaWeb();
    }

    public function listarCategorias() {
        return $this->categoriaModel->getTodasCategorias();
    }
}
?>
