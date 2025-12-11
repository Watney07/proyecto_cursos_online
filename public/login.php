<?php
session_start();
require_once "../models/db.php";

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM ESTUDIANTE WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Mantener nombres consistentes con controllers
        $_SESSION['estudiante_id'] = $user['id_estudiante'];
        $_SESSION['estudiante_nombre'] = $user['nombre'];

        header("Location: /proyecto_cursos_online/public/index.php?action=mis_modulos");

        exit;
    } else {
        $error = "Email o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Cursos Online</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
