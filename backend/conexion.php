<?php
// backend/conexion.php

$host = "localhost";
$db   = "cursos_online";
$user = "root";      // cambia si tienes password
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Error al conectar: " . $e->getMessage());
}
