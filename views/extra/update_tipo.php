<?php
// update_pais.php
require '../../_assets/conn.php';

$id = $conn->real_escape_string($_POST['id_to_edit']);
$Pais = $conn->real_escape_string($_POST['inputPais']);

$sql = "UPDATE pais SET Pais ='$Pais' WHERE id_pais='$id'";

var_dump($sql);

if ($conn->query($sql)) {
echo "Si";
} else {
echo "No";
}
// Cerrar la conexión a la base de datos
mysqli_close($conn);
header('Location: ../../crud.php');
?>

