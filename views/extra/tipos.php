<?php
include('../../_assets/conn.php');
$query_tipos = "SELECT id_tipo_consorcio, tipo FROM consorcio_tipo";
$resultado_tipos = mysqli_query($conn, $query_tipos);
?>

<div class="container d-grid gap-2 mb-2"><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Tipo </button></div>

<?php

if ($resultado_tipos) {
    // Iniciar la tabla HTML
    echo '<table class="table" id="tipos_tabla" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>';

    // Iterar sobre los resultados
    while ($fila = mysqli_fetch_assoc($resultado_tipos)) {
        echo '<tr>
                <td>' . $fila['id_tipo_consorcio'] . '</td>
                <td>' . $fila['tipo'] . '</td>
                <td> <button onclick="editar(' . $fila['id_tipo_consorcio'] . ')">Editar</button> </td>
                <td> <button onclick="eliminar(' . $fila['id_tipo_consorcio'] . ')">Eliminar</button> </td>
            </tr>';
    }

    // Cerrar la tabla HTML
    echo '</tbody>
        </table>';
} else {
    // Manejar el caso en que la consulta no fue exitosa
    echo 'Error en la consulta: ' . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

<script>
    new DataTable('#tipos_tabla');
</script>