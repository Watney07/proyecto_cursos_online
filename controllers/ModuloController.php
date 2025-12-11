<?php
require_once __DIR__ . '/../models/Material.php';

class ModuloController {

    public function listarMateriales($id_modulo) {
        session_start();
        if (!isset($_SESSION['estudiante_id'])) {
            header("Location: /index.php?action=login");
            exit;
        }

        $materialModel = new Material();
        $materiales = $materialModel->getByModulo($id_modulo);

        require_once __DIR__ . '/../views/materiales/listar.php';
    }
}
?>
