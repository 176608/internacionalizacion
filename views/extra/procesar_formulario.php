<?php
include('../../_assets/conn.php');

// Verificar si se envió alguna variable por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Insertar país ************************************************************************
    if (isset($_POST['insert_pais'])) {
        // Obtener los datos del formulario
        $pais = $_POST['insert_pais'];

        // Validar y realizar la inserción en la base de datos
        if (!empty($pais)) {

            // Preparar la consulta SQL de inserción
            $sql = "INSERT INTO pais (Pais) VALUES ('$pais')";

            // Ejecutar la consulta
            if (mysqli_query($conn, $sql)) {
                $response = ['success' => true, 'message' => 'Inserción exitosa'];
            } else {
                $response = ['success' => false, 'message' => 'Error en la inserción: ' . mysqli_error($conn)];
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conn);

        } else {
            $response = ['success' => false, 'message' => 'El campo del país no puede estar vacío'];
        }

    // Devolver la respuesta al cliente en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    } else {
        echo 'La variable insert_pais no está definida.';
    }

    // Insertar instrumento ************************************************************************
    if (isset($_POST['insert_instrumento'])) {
        // Obtener los datos del formulario
        $instrumento = $_POST['insert_instrumento'];

        // Validar y realizar la inserción en la base de datos
        if (!empty($instrumento)) {

            // Preparar la consulta SQL de inserción
            $sql = "INSERT INTO consorcio_instrumento (instrumento) VALUES ('$instrumento')";

            // Ejecutar la consulta
            if (mysqli_query($conn, $sql)) {
                $response = ['success' => true, 'message' => 'Inserción exitosa'];
            } else {
                $response = ['success' => false, 'message' => 'Error en la inserción: ' . mysqli_error($conn)];
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conn);

        } else {
            $response = ['success' => false, 'message' => 'El campo de instrumento no puede estar vacío'];
        }

        // Devolver la respuesta al cliente en formato JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        } else {
            echo 'La variable insert_instrumento no está definida.';
    }

    // Insertar tipo ************************************************************************
    if (isset($_POST['insert_tipos'])) {
        // Obtener el valor del tipo
        $tipo = $_POST['insert_tipos'];

        // Validar y realizar la inserción en la base de datos
        if (!empty($tipo)) {

            // Verificar la conexión
            if (!$conn) {
                die('Error en la conexión a la base de datos: ' . mysqli_connect_error());
            }

            // Escapar el valor para prevenir inyección SQL
            $tipo = mysqli_real_escape_string($conn, $tipo);

            // Preparar la consulta SQL de inserción
            $sql = "INSERT INTO consorcio_tipo (tipo) VALUES ('$tipo')";

            // Ejecutar la consulta
            if (mysqli_query($conn, $sql)) {
                $response = ['success' => true, 'message' => 'Inserción exitosa'];
            } else {
                $response = ['success' => false, 'message' => 'Error en la inserción: ' . mysqli_error($conn)];
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
        } else {
            $response = ['success' => false, 'message' => 'El campo del tipo no puede estar vacío'];
        }

        // Devolver la respuesta al cliente en formato JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        echo 'La variable insert_tipos no está definida.';
    }
} else {
    // Manejar el caso en que no se envió ninguna variable por POST
    echo 'No se enviaron datos por POST.';
}

?>

