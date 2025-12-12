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

        // CAPTURAR LA VISTA
        ob_start();
        require __DIR__ . '/../views/materiales/listar.php';
        $contenido = ob_get_clean();

        // MOSTRAR DENTRO DEL LAYOUT
        require __DIR__ . '/../views/layout.php';
    }
}
