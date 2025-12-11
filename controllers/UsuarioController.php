<?php
require_once __DIR__ . "/../models/db.php";

class UsuarioController {

    private $conn;

    public function __construct() {
        $this->conn = Database::getConexion();
    }

    public function listarCursos() {
        $stmt = $this->conn->query("SELECT * FROM CURSO");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verCurso($id) {
        $stmt = $this->conn->prepare("SELECT * FROM CURSO WHERE id_curso = ?");
        $stmt->execute([$id]);
        $curso = $stmt->fetch(PDO::FETCH_ASSOC);

        $modulosStmt = $this->conn->prepare("SELECT * FROM MODULO WHERE id_version IN (SELECT id_version FROM VERSION_CURSO WHERE id_curso = ?)");
        $modulosStmt->execute([$id]);
        $modulos = $modulosStmt->fetchAll(PDO::FETCH_ASSOC);

        return ['curso' => $curso, 'modulos' => $modulos];
    }

    public function listarMaterialesModulo($id_modulo) {
        $stmt = $this->conn->prepare("SELECT * FROM MATERIAL WHERE id_modulo = ?");
        $stmt->execute([$id_modulo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
