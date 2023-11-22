<?php 
//print_r($_POST);
require '../../_assets/conn.php';

$id = $conn->real_escape_string($_POST['update_this_id']);
$nuevo_instrumento = $conn->real_escape_string($_POST['edit_instrumento']);

$sql = "UPDATE `consorcio_instrumento` SET `instrumento` ='$nuevo_instrumento' WHERE `id_instrumento`='$id'";

//print_r($sql);

if ($conn->query($sql)) {
echo "Si";
} else {
echo "No";
}
// Cerrar la conexión a la base de datos
mysqli_close($conn);
header('Location: extra.php');
