<html>
    <body>
        <form action="" method="post">
        <input type="text" name="siglas" placeholder="siglas">
            <input type="text" name="nombre" placeholder="nombre">
            <input type="text" name="enlace" placeholder="enlace">
            <input type="text" name="tipo" placeholder="tipo">
            <input type="text" name="procedencia" placeholder="procedencia">
            <input type="text" name="instrumento" placeholder="instrumento">
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
    $siglas = $_POST['siglas'];
    $nombre = $_POST['nombre'];
    $enlace = $_POST['enlace'];
    $tipo = $_POST['tipo'];
    $procedencia = $_POST['procedencia'];
    $instrumento = $_POST['instrumento'];

    insert($siglas, $nombre, $enlace, $tipo, $procedencia, $instrumento);
    
    
}
?>