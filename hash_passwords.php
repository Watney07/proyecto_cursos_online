<?php
require_once "models/db.php";

$stmt = $pdo->query("SELECT id_estudiante, password FROM ESTUDIANTE");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    // Ignora si ya es hash
    if (!preg_match('/^\$2y\$/', $user['password'])) {
        $hashed = password_hash($user['password'], PASSWORD_DEFAULT);
        $update = $pdo->prepare("UPDATE ESTUDIANTE SET password = ? WHERE id_estudiante = ?");
        $update->execute([$hashed, $user['id_estudiante']]);
        echo "Contraseña del usuario {$user['id_estudiante']} actualizada.<br>";
    }
}
echo "Todas las contraseñas ahora están hasheadas.";
