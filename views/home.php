<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home - Cursos Online</title>
    <style>
        body{font-family:Arial,Helvetica,sans-serif;margin:40px}
        a{margin-right:10px;}
    </style>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['estudiante_nombre']); ?></h1>
    <a href="index.php?action=logout">Cerrar sesión</a>

    <h2>Cursos disponibles</h2>
    <?php
    $stmt = $pdo->query("SELECT * FROM CURSO");
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($cursos) === 0) {
        echo "<p>No hay cursos aún.</p>";
    } else {
        echo "<ul>";
        foreach($cursos as $c) {
            echo "<li>".htmlspecialchars($c['nombre'])." - <a href='#'>Ver versiones</a></li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
