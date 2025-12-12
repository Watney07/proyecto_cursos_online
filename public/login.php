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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Cursos Online</title>

    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">

    <div class="bg-gray-800 p-10 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700">

        <h1 class="text-3xl font-bold text-center mb-8">Iniciar Sesión</h1>

        <?php if ($error): ?>
            <p class="bg-red-600 text-white px-4 py-2 rounded text-center mb-5">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>

        <form method="POST" class="space-y-5">

            <div>
                <label class="block mb-1">Email:</label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label class="block mb-1">Contraseña:</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition py-2 rounded font-semibold"
            >
                Entrar
            </button>

        </form>

    </div>

</body>
</html>
