<?php
require_once __DIR__ . '/db.php';

class Estudiante {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM ESTUDIANTE WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getModulos($id_estudiante) {
        $stmt = $this->pdo->prepare("
            SELECT m.id_modulo, m.titulo, m.descripcion, c.nombre AS curso_nombre, vc.numero_version
            FROM ACCESO_MODULO am
            JOIN MODULO m ON am.id_modulo = m.id_modulo
            JOIN VERSION_CURSO vc ON m.id_version = vc.id_version
            JOIN CURSO c ON vc.id_curso = c.id_curso
            WHERE am.id_estudiante = ?
        ");
        $stmt->execute([$id_estudiante]);
        return $stmt->fetchAll();
    }
}
