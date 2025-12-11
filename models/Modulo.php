<?php
require_once __DIR__ . '/db.php';

class Modulo {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getMateriales($id_modulo) {
        $stmt = $this->pdo->prepare("
            SELECT ma.titulo, ma.tipo, ma.url
            FROM MATERIAL ma
            WHERE ma.id_modulo = ?
        ");
        $stmt->execute([$id_modulo]);
        return $stmt->fetchAll();
    }
}
