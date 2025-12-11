<?php
require_once __DIR__ . '/../models/Estudiante.php';

class UsuarioController {

    private $estudianteModel;

    public function __construct() {
        $this->estudianteModel = new Estudiante();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->estudianteModel->login($email, $password);

            if ($user) {
                $_SESSION['estudiante_id'] = $user['id_estudiante'];
                $_SESSION['nombre'] = $user['nombre'];
                header("Location: /index.php?action=mis_modulos");
                exit;
            } else {
                $error = "Email o contraseña incorrectos";
            }
        }
        require_once __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: /index.php?action=login");
        exit;
    }

    public function misModulos() {
        if (!isset($_SESSION['estudiante_id'])) {
            header("Location: /index.php?action=login");
            exit;
        }
        $modulos = $this->estudianteModel->getModulos($_SESSION['estudiante_id']);
        require_once __DIR__ . '/../views/modulos/listar.php';
    }
}

