<?php
//echo "Estoy en consorcio.php"; 
require '../../_assets/conn.php';
require '../header.php';
?>

<div class="container-fluid">
  <div class="container">
    <h2>Consorcios</h2>
    <div class="btn-group" role="group" aria-label="btn-group">
      <button type="button" class="btn btn-success">Agregar Consorcio</button>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch demo modal WIP</button>
    </div>
  </div>

  <div class="container-fluid mt-3">
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

<!-- Modal WIP -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
require '..//footer.php';
?>

<script>
new DataTable('#consorcios');
</script>
