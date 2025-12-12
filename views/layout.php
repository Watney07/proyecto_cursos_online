<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Cursos Online' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-200 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-gray-800 border-b border-gray-700 p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Cursos Online</h1>

        <?php if (!empty($_SESSION['estudiante_id'])): ?>
            <div class="flex items-center gap-4">
                <span class="text-gray-300">👋 <?= htmlspecialchars($_SESSION['estudiante_nombre']) ?></span>
                <a href="/proyecto_cursos_online/public/index.php?action=logout"
                   class="text-red-400 hover:text-red-300 transition">
                    Cerrar sesión
                </a>
            </div>
        <?php endif; ?>
    </nav>

    <!-- CONTENIDO -->
    <div class="container mx-auto px-6 py-10">
        <?= $content ?>
    </div>

</body>
</html>

