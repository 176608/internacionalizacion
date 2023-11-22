<?php 
require '../../_assets/conn.php';
print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enlace = $_POST['input_Enlace'];
    $nombre = $_POST['input_Nombre'];
    $siglas = $_POST['input_Siglas'];
    $id_tipo = $_POST['input_idTipo'];
    $id_instrumento = $_POST['input_idInstrumento'];
    $id_pais = $_POST['input_idPais'];

    $sql_insert = "INSERT INTO `consorcio` (`id_consorcio`, `Siglas`, `Nombre`, `Enlace`, `id_tipo_consorcio`, `id_procedencia`, `id_instrumento`) VALUES (NULL, '$siglas', '$nombre', '$enlace', '$id_tipo', '$id_pais', '$id_instrumento');";

    //echo $sql_insert;
    // Ejecutar la consulta
    if (mysqli_query($conn, $sql_insert)) {
        //echo "Si";
    } else {
        //echo "No";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
    header('Location: consorcio.php');
}


?>