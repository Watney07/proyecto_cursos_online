<?php
require_once __DIR__.'/../models/Estudiante.php';
session_start();

class LoginController {
    private $model;

    public function __construct($pdo) {
        $this->model = new Estudiante($pdo);
    }

    public function login($email, $password) {
        $user = $this->model->login($email, $password);
        if ($user) {
            $_SESSION['estudiante_id'] = $user['id_estudiante'];
            $_SESSION['estudiante_nombre'] = $user['nombre'];
            header("Location: index.php");
            exit;
        } else {
            return "Email o contraseña incorrectos.";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit;
    }

    public function isLogged() {
        return isset($_SESSION['estudiante_id']);
    }
}
