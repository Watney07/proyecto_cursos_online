<?php
require_once __DIR__ . "/../controllers/UsuarioController.php";

$action = $_GET['action'] ?? 'listar_cursos';
$controller = new UsuarioController();

switch ($action) {
    case 'listar_cursos':
        $cursos = $controller->listarCursos();
        include __DIR__ . "/../views/cursos/listar.php";
        break;

    case 'ver_curso':
        $id = $_GET['id'] ?? 0;
        $data = $controller->verCurso($id);
        include __DIR__ . "/../views/cursos/ver.php";
        break;

    case 'listar_materiales':
        $id_modulo = $_GET['id_modulo'] ?? 0;
        $materiales = $controller->listarMaterialesModulo($id_modulo);
        include __DIR__ . "/../views/materiales/listar.php";
        break;

    default:
        echo "Acción no reconocida";
}
