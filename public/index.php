<?php
require_once '../config/config.php';
require_once '../controllers/LoginController.php';

$loginCtrl = new LoginController($pdo);

// Acciones
$action = $_GET['action'] ?? 'home';

if ($action === 'login_post' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = $loginCtrl->login($_POST['email'], $_POST['password']);
} elseif ($action === 'logout') {
    $loginCtrl->logout();
}

// Si no está logueado, mostramos login
if (!$loginCtrl->isLogged() && $action !== 'login_post') {
    include '../views/login.php';
    exit;
}

// Usuario logueado
include '../views/home.php';

case 'versiones':
    $id_curso = $_GET['id_curso'] ?? 0;
    $cursoCtrl->listarVersiones($id_curso);
    break;

case 'modulos':
    $id_version = $_GET['id_version'] ?? 0;
    $id_curso = $_GET['id_curso'] ?? 0;
    $cursoCtrl->listarModulos($id_version, $id_curso);
    break;

    case 'materiales':
    $id_modulo = $_GET['id_modulo'] ?? 0;
    $id_version = $_GET['id_version'] ?? 0;
    $id_curso = $_GET['id_curso'] ?? 0;
    $cursoCtrl->listarMateriales($id_modulo, $id_version, $id_curso);
    break;
