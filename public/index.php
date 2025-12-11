<?php
session_start();

require_once __DIR__ . '/../controllers/UsuarioController.php';
require_once __DIR__ . '/../controllers/ModuloController.php';

$action = $_GET['action'] ?? 'home';

switch($action) {
    case 'login':
        $controller = new UsuarioController();
        $controller->login();
        break;
    case 'logout':
        $controller = new UsuarioController();
        $controller->logout();
        break;
    case 'mis_modulos':
        $controller = new UsuarioController();
        $controller->misModulos();
        break;
    case 'ver_materiales':
        $id_modulo = $_GET['id_modulo'] ?? 0;
        $controller = new ModuloController();
        $controller->listarMateriales($id_modulo);
        break;
    default:
        echo "Acción no definida.";
}
