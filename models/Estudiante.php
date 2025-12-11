<?php
require_once __DIR__.'/../config/config.php';

class Estudiante {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM ESTUDIANTE WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM ESTUDIANTE WHERE id_estudiante = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
