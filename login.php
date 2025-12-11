<?php
session_start();
require "db.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM ESTUDIANTE WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();

        if ($user["password"] === $pass) {
            $_SESSION["user_id"] = $user["id_estudiante"];
            $_SESSION["user_name"] = $user["nombre"];
            header("Location: dashboard.php");
            exit;
        } else {
            $msg = "Contraseña incorrecta.";
        }
    } else {
        $msg = "Correo no encontrado.";
    }
}
?>

<h2>Iniciar sesión</h2>

<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Contraseña: <input type="password" name="password" required><br><br>
    <button type="submit">Entrar</button>
</form>

<p style="color:red;"><?= $msg ?></p>
