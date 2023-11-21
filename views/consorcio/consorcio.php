<?php
//echo "Estoy en consorcio.php"; 
include('../../_assets/conn.php');
echo '';

?>

<div class="container-fluid">
  <div class="container">
    <h2>Sección 1</h2>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-primary">Registrar 1</button>
      <button type="button" class="btn btn-primary">Registrar 2</button>
    </div>
  </div>

  <div class="container-fluid mt-3">
    <h2>Sección 2</h2>

<?php
    $query = "SELECT id_consorcio, Siglas, Nombre, Enlace FROM consorcio";
    $resultado = mysqli_query($conn, $query);
    if ($resultado) {
    // Iniciar la tabla HTML
    echo '<table class="table" id="consorcios" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Siglas</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Enlace</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>';
    // Iterar sobre los resultados
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<tr>
                <td>' . $fila['id_consorcio'] . '</td>
                <td>' . $fila['Siglas'] . '</td>
                <td>' . $fila['Nombre'] . '</td>
                <td>' . $fila['Enlace'] . '</td>
                <td> boton para editar </td>
                <td> boton para borrar </td>
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

  </div>
</div>


<script>
new DataTable('#consorcios');
</script>
