<?php
require_once "conexion.php";

// Obtener todos los cursos
function curso_listar() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM CURSO ORDER BY id_curso DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Insertar un curso
function curso_crear($nombre, $descripcion) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO CURSO (nombre, descripcion) VALUES (?, ?)");
    return $stmt->execute([$nombre, $descripcion]);
}

// Obtener un curso por ID
function curso_obtener($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM CURSO WHERE id_curso = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Editar curso
function curso_editar($id, $nombre, $descripcion) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE CURSO SET nombre=?, descripcion=? WHERE id_curso=?");
    return $stmt->execute([$nombre, $descripcion, $id]);
}

// Eliminar curso
function curso_eliminar($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM CURSO WHERE id_curso=?");
    return $stmt->execute([$id]);
}
