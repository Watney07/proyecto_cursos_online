<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - Cursos Online</title>
    <style>
        body{font-family:Arial,Helvetica,sans-serif;margin:40px}
        .err{color:red;}
    </style>
</head>
<body>
    <h1>Login Estudiante</h1>
    <?php if(isset($error)) echo "<p class='err'>$error</p>"; ?>
    <form method="post" action="index.php?action=login_post">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
