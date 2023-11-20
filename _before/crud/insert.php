<html>
    <body>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Iphone / Samsung">
            <input type="text" name="precio" placeholder="4999.24">
            <input type="text" name="imagen" placeholder="imagen.jpg">
            <input type="submit" name="submit" value="Subir">
        </form> 
    </body>
</html>

<?php

include_once 'functions.php';
// Verifica si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar los datos del formulario

    // Aquí puedes acceder a los datos del formulario usando $_POST
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    insert($nombre, $precio, $imagen);
    
    
}
?>