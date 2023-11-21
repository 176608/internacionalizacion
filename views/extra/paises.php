<?php
include('../../_assets/conn.php');
$query_paises = "SELECT id_pais, Pais FROM pais";
$resultado_paises = mysqli_query($conn, $query_paises); ?>

<div class="container d-grid gap-2 mb-2"><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Pais </button></div>

<?php
if ($resultado_paises) {
    // Iniciar la tabla HTML
    echo '<table class="table" id="paises_tabla" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Pais</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>';

    // Iterar sobre los resultados
    while ($fila = mysqli_fetch_assoc($resultado_paises)) {
        echo '<tr>
                <td>' . $fila['id_pais'] . '</td>
                <td>' . $fila['Pais'] . '</td>
                <td> <button onclick="editar(' . $fila['id_pais'] . ')">Editar</button> </td>
                <td> <button onclick="eliminar(' . $fila['id_pais'] . ')">Eliminar</button> </td>
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
    new DataTable('#paises_tabla');
</script>