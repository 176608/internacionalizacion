<?php
require '../../_assets/conn.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idTipo = $_GET['id'];

    // Preparar la consulta SQL para eliminar el Tipo de consorcio por ID
    $sql = "DELETE FROM consorcio_tipo WHERE id_tipo_consorcio = $idTipo";

    // Ejecutar la consulta
    if (mysqli_query($conn, $sql)) {
        // Éxito en la eliminación
        $response = ['success' => true, 'message' => 'Eliminación exitosa'];
    } else {
        // Error en la eliminación
        $response = ['success' => false, 'message' => 'Error al eliminar Tipo de consorcio: ' . mysqli_error($conn)];
    }

    // Devolver la respuesta al cliente en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // ID no proporcionado o no válido
    $response = ['success' => false, 'message' => 'ID de Tipo de consorcio no válido'];
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>