<?php
include('../../_assets/conn.php');
$query_tipos = "SELECT id_tipo_consorcio, tipo FROM consorcio_tipo";
$resultado_tipos = mysqli_query($conn, $query_tipos);
?>

<div class="container d-grid gap-2 mb-2"><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#crear_tipo">Agregar Tipo </button></div>

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

<!-- Modal WIP -->
<div class="modal fade" id="crear_tipo" tabindex="-1" aria-labelledby="crear_tipoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="crear_tipoLabel">Formulario para agregar tipos.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form id="crear_tipo_form" action="" method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <label class="visually-hidden" for="insert_tipos">Tipo</label>
        <div class="input-group col-9">
            <div class="input-group-text">Tipo:</div>
            <input type="text" class="form-control" id="insert_tipos" name="insert_tipos" placeholder="Escribe el tipo de consorcio a agregar...">
        </div>
        <div class="btn-group" role="group" aria-label="btn-group">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" onclick="enviarTipo()" data-bs-dismiss="modal">Enviar</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
    new DataTable('#tipos_tabla');

    function enviarTipo() {
  // Obtener el valor del input
  var tipo = document.getElementById('insert_tipos').value;

  // Verificar si el valor no está vacío
  if (tipo.trim() !== '') {
    // Enviar los datos mediante AJAX
    fetch('views/extra/procesar_formulario.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'insert_tipos=' + encodeURIComponent(tipo),
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en la solicitud AJAX: ' + response.statusText);
      }
      return response.json();
    })
    .then(data => {
      console.log(data);
    })
    .catch(error => {
      console.error('Error al enviar datos:', error);
    });
  } else {
    console.error('El campo tipo no puede estar vacío');
  }
  location.reload();
}

</script>