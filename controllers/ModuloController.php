<?php
require_once __DIR__ . '/../models/Modulo.php';

class ModuloController {

    private $moduloModel;

    public function __construct() {
        $this->moduloModel = new Modulo();
    }

    public function listarMateriales($id_modulo) {
        if (!isset($_SESSION['estudiante_id'])) {
            header("Location: /index.php?action=login");
            exit;
        }

        $materiales = $this->moduloModel->getMateriales($id_modulo);
        require_once __DIR__ . '/../views/materiales/listar.php';
    }
}
