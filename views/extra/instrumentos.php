<?php
include('../../_assets/conn.php');
    $query_instrumentos = "SELECT id_instrumento, instrumento FROM consorcio_instrumento";
    $resultado_instrumentos = mysqli_query($conn, $query_instrumentos);

    ?>

    <div class="container d-grid gap-2 mb-2"><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Instrumento </button></div>
    
    <?php

    if ($resultado_instrumentos) {
        // Iniciar la tabla HTML
        echo '<table class="table" id="instrumentos_tabla" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">instrumento</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>';

        // Iterar sobre los resultados
        while ($fila = mysqli_fetch_assoc($resultado_instrumentos)) {
            echo '<tr>
                    <td>' . $fila['id_instrumento'] . '</td>
                    <td>' . $fila['instrumento'] . '</td>
                    <td> <button onclick="editar(' . $fila['id_instrumento'] . ')">Editar</button> </td>
                    <td> <button onclick="eliminar(' . $fila['id_instrumento'] . ')">Eliminar</button> </td>
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
    new DataTable('#instrumentos_tabla');
</script>