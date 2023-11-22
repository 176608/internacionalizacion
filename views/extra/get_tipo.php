<?php 
require '../../_assets/conn.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT id_pais, Pais FROM pais WHERE id_pais=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$pais_consulta = [];

if ($rows > 0) {
    $pais_consulta = $resultado->fetch_array();
}

echo json_encode($pais_consulta);

?>


