<?php
// models/Curso.php

class Curso
{
    private PDO $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    // Obtener todos los cursos
    public function getAll(): array
    {
        $sql = "SELECT * FROM CURSO ORDER BY id_curso DESC";
        return $this->db->query($sql)->fetchAll();
    }

    // Obtener 1 curso
    public function getById(int $id): ?array
    {
        $sql = "SELECT * FROM CURSO WHERE id_curso = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data ?: null;
    }

    // Crear curso
    public function create(string $nombre, string $descripcion): bool
    {
        $sql = "INSERT INTO CURSO (nombre, descripcion) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $descripcion]);
    }

    // Actualizar curso
    public function update(int $id, string $nombre, string $descripcion): bool
    {
        $sql = "UPDATE CURSO SET nombre = ?, descripcion = ? WHERE id_curso = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $descripcion, $id]);
    }

    // Borrar curso
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM CURSO WHERE id_curso = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
