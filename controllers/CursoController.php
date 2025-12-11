<?php
require_once __DIR__.'/../config/config.php';

class CursoController {
    private $pdo;
    private $estudiante_id;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        session_start();
        $this->estudiante_id = $_SESSION['estudiante_id'] ?? null;
    }

    public function listarVersiones($id_curso) {
        $stmt = $this->pdo->prepare("SELECT * FROM VERSION_CURSO WHERE id_curso = ?");
        $stmt->execute([$id_curso]);
        $versiones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__.'/../views/versiones/listar.php';
    }

    public function listarModulos($id_version, $id_curso) {
        $stmt = $this->pdo->prepare("
            SELECT m.* 
            FROM MODULO m
            INNER JOIN ACCESO_MODULO am ON m.id_modulo = am.id_modulo
            WHERE m.id_version = ? AND am.id_estudiante = ?
        ");
        $stmt->execute([$id_version, $this->estudiante_id]);
        $modulos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__.'/../views/modulos/listar.php';
    }

    public function listarMateriales($id_modulo, $id_version, $id_curso) {
    $stmt = $this->pdo->prepare("
        SELECT mat.*, i.nombre AS instructor
        FROM MATERIAL mat
        INNER JOIN INSTRUCTOR_MATERIAL im ON mat.id_material = im.id_material
        INNER JOIN INSTRUCTOR i ON im.id_instructor = i.id_instructor
        WHERE mat.id_modulo = ?
    ");
    $stmt->execute([$id_modulo]);
    $materiales = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include __DIR__.'/../views/materiales/listar.php';
}

