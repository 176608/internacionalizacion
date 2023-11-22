<?php
require '../../_assets/conn.php';
//print_r($_POST);

$id = $conn->real_escape_string($_POST['update_this_id']);
$Pais = $conn->real_escape_string($_POST['edit_pais']);

$sql = "UPDATE pais SET Pais ='$Pais' WHERE id_pais='$id'";


if ($conn->query($sql)) {
echo "Si";
} else {
echo "No";
}
// Cerrar la conexión a la base de datos
mysqli_close($conn);
header('Location: extra.php');
?>

