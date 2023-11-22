<?php
require '../../_assets/conn.php';
//print_r($_POST);

$id = $conn->real_escape_string($_POST['update_this_id']);
$tipo = $conn->real_escape_string($_POST['edit_tipo']);

$sql = "UPDATE consorcio_tipo SET tipo ='$tipo' WHERE id_tipo_consorcio='$id'";

var_dump($sql);

if ($conn->query($sql)) {
echo "Si";
} else {
echo "No";
}
// Cerrar la conexión a la base de datos
mysqli_close($conn);
header('Location: extra.php');
?>

