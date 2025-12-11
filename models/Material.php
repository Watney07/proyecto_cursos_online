<?php
require_once 'db.php';

class Material {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getByModulo($id_modulo) {
        $sql = "SELECT m.id_material, m.titulo, m.tipo, m.url
                FROM MATERIAL m
                JOIN ACCESO_MODULO am ON am.id_modulo = m.id_modulo
                WHERE m.id_modulo = ? AND am.id_estudiante = ?
                ORDER BY m.id_material ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $id_modulo, $_SESSION['estudiante_id']);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
