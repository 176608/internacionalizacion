<?php

include_once 'functions.php';

$id = $_GET['id'];

edit($id);


// Verifica si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar los datos del formulario

    // Aquí puedes acceder a los datos del formulario usando $_POST
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    update($id, $nombre, $precio, $imagen);
    
    
}
?>