<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuarios'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuarios']; ?></h2>
    <p>Contenido de la página de inicio.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
