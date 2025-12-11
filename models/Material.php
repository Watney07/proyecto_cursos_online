<?php
require_once __DIR__ . '/db.php';

class Material {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Solo devuelve los materiales del módulo a los que el estudiante tiene acceso
    public function getByModuloYEstudiante($id_modulo, $id_estudiante) {
        $stmt = $this->db->prepare("
            SELECT m.*
            FROM MATERIAL m
            JOIN MODULO mod ON m.id_modulo = mod.id_modulo
            JOIN ACCESO_MODULO am ON mod.id_modulo = am.id_modulo
            WHERE m.id_modulo = :id_modulo AND am.id_estudiante = :id_estudiante
        ");
        $stmt->execute([
            ':id_modulo' => $id_modulo,
            ':id_estudiante' => $id_estudiante
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
