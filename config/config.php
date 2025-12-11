<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'cursos_online');
define('DB_USER', 'root'); // Cambia si tu usuario es otro
define('DB_PASS', '');     // Cambia si tienes contraseña

try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
