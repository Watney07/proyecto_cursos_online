<?php
// models/VersionCurso.php

class VersionCurso
{
    private PDO $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getAll(): array
    {
        $sql = "SELECT v.*, c.nombre AS curso_nombre
                FROM VERSION_CURSO v
                JOIN CURSO c ON c.id_curso = v.id_curso
                ORDER BY v.id_version DESC";
        return $this->db->query($sql)->fetchAll();
    }

    public function getById(int $id): ?array
    {
        $sql = "SELECT v.*, c.nombre AS curso_nombre
                FROM VERSION_CURSO v
                JOIN CURSO c ON c.id_curso = v.id_curso
                WHERE id_version = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        return $data ?: null;
    }

    public function getByCurso(int $id_curso): array
    {
        $sql = "SELECT *
                FROM VERSION_CURSO
                WHERE id_curso = ?
                ORDER BY id_version DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_curso]);
        return $stmt->fetchAll();
    }

    public function create(int $id_curso, $fecha_inicio, $fecha_fin, $numero_version): bool
    {
        $sql = "INSERT INTO VERSION_CURSO (id_curso, fecha_inicio, fecha_fin, numero_version)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_curso, $fecha_inicio, $fecha_fin, $numero_version]);
    }

    public function update(int $id, int $id_curso, $fecha_inicio, $fecha_fin, $numero_version): bool
    {
        $sql = "UPDATE VERSION_CURSO
                SET id_curso = ?, fecha_inicio = ?, fecha_fin = ?, numero_version = ?
                WHERE id_version = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_curso, $fecha_inicio, $fecha_fin, $numero_version, $id]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM VERSION_CURSO WHERE id_version = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}

<?php
class VersionCurso {
    private $conn;
    private $table = "VERSION_CURSO";

    public $id_version;
    public $id_curso;
    public $fecha_inicio;
    public $fecha_fin;
    public $numero_version;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todas las versiones de un curso
    public function getByCurso($id_curso) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_curso = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id_curso]);
        return $stmt;
    }

    // Obtener una versión por ID
    public function getById($id_version) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_version = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id_version]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear versión
    public function create() {
        $query = "INSERT INTO " . $this->table . " 
            (id_curso, fecha_inicio, fecha_fin, numero_version)
            VALUES (:id_curso, :fecha_inicio, :fecha_fin, :numero_version)";
        
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ":id_curso" => $this->id_curso,
            ":fecha_inicio" => $this->fecha_inicio,
            ":fecha_fin" => $this->fecha_fin,
            ":numero_version" => $this->numero_version
        ]);
    }

    // Actualizar versión
    public function update() {
        $query = "UPDATE " . $this->table . "
            SET fecha_inicio = :fecha_inicio,
                fecha_fin = :fecha_fin,
                numero_version = :numero_version
            WHERE id_version = :id_version";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ":fecha_inicio" => $this->fecha_inicio,
            ":fecha_fin" => $this->fecha_fin,
            ":numero_version" => $this->numero_version,
            ":id_version" => $this->id_version
        ]);
    }

    // Eliminar versión
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id_version = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id_version]);
    }
}
