<?php
require '../../_assets/conn.php';
//print_r($_POST);
$id = $conn->real_escape_string($_POST['update_this_id']);
$enlace = $conn->real_escape_string($_POST['edit_Enlace']);
$nombre = $conn->real_escape_string($_POST['edit_Nombre']);
$siglas = $conn->real_escape_string($_POST['edit_Siglas']);
$idPais = $conn->real_escape_string($_POST['edit_idPais']);
$idInstrumento = $conn->real_escape_string($_POST['edit_idInstrumento']);
$idTipo = $conn->real_escape_string($_POST['edit_idTipo']);

$sql = "UPDATE `consorcio` SET `Siglas` = '$siglas', `Nombre` = '$nombre', `Enlace` = '$enlace', `id_tipo_consorcio` = '$idTipo', `id_procedencia` = '$idPais', `id_instrumento` = '$idInstrumento' WHERE `consorcio`.`id_consorcio` = '$id';";

//var_dump($sql);

if ($conn->query($sql)) {
    echo "Si";
    } else {
    echo "No";
    }
    mysqli_close($conn);
    header('Location: consorcio.php');
?>