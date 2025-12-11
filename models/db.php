<?php
// models/db.php
$host = "localhost";
$dbname = "cursos_online";
$user = "root";      // tu usuario MySQL
$pass = "";          // tu contraseña MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

