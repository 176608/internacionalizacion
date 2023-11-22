<?php
//echo "Estoy en consorcio.php"; 
require '../../_assets/conn.php';
require '../header.php';
?>

<div class="container-fluid">
  <div class="container">
    <h2>Consorcios</h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Agregar_consorcio_modal">Agregar
      Consorcio... <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
        class="bi bi-plus-circle" viewBox="0 0 20 20">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
      </svg></button>
  </div>

  <div class="container-fluid mt-3">
<?php
$query = "SELECT c.id_consorcio, c.Siglas, c.Nombre, c.Enlace,
            ct.id_tipo_consorcio, ct.tipo,
            p.id_pais, p.Pais,
            ci.id_instrumento, ci.instrumento
        FROM consorcio c
        LEFT JOIN consorcio_tipo ct ON c.id_tipo_consorcio = ct.id_tipo_consorcio
        LEFT JOIN pais p ON c.id_procedencia = p.id_pais
        LEFT JOIN consorcio_instrumento ci ON c.id_instrumento = ci.id_instrumento;
        ";

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
                    <th scope="col">Tipo</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col">Instrumento</th>
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

                <td><a href="' . $fila['Enlace'] . '" target="_blank" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                  <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                  </svg></a>
                </td>

                <td>' . $fila['tipo'] . '</td> 
                <td>' . $fila['Pais'] . '</td> 
                <td>' . $fila['instrumento'] . '</td>

                <td><a class="btn btn-info btn-editar-consorcio" data-bs-toggle="modal" data-bs-target="#modal_editar_consorcio" data-bs-id="' . $fila['id_consorcio'] . '">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a>
                </td>

                <td><a class="btn btn-danger" onclick="baja_consorcio(' . $fila['id_consorcio'] . ')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg></a>
                </td>

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
//mysqli_close($conn);
?>

  </div>
</div>
<?php
$sqlPaises = "SELECT `id_pais`, `Pais` FROM `pais`;";
$Sel_Paises = $conn->query($sqlPaises);

$sqlInstrumentos = "SELECT `id_instrumento`, `instrumento` FROM `consorcio_instrumento`;";
$Sel_Instrumentos = $conn->query($sqlInstrumentos);

$sqlTipos = "SELECT `id_tipo_consorcio`, `tipo` FROM `consorcio_tipo`;";
$Sel_Tipos = $conn->query($sqlTipos);
?>
<!-- Modal add consorcio -->
<div class="modal fade" id="Agregar_consorcio_modal" tabindex="-1" aria-labelledby="Agregar_consorcio_modalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Agregar_consorcio_modalLabel">Dar alta a consorcio:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!---->
        <form class="row g-3" action="alta_consorcio.php" method="post" enctype="multipart/form-data">
          <div class="col-12">
            <label for="input_Enlace" class="form-label">Enlace:</label>
            <input type="text" class="form-control" name="input_Enlace" placeholder="https://getbootstrap.com/">
          </div>
          <div class="col-12">
            <label for="input_Nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="input_Nombre" placeholder="Nombre del consorcio...">
          </div>
          <div class="col-md-6">
            <label for="input_Siglas" class="form-label">Siglas:</label>
            <input type="text" class="form-control" name="input_Siglas" placeholder="Siglas del consorcio...">
          </div>
          <div class="col-6">
            <label for="input_idPais" class="form-label">Pais:</label>
            <?php
            if ($Sel_Paises) {
              echo '<select name="input_idPais" class="form-select">';
                        // Iterar sobre los resultados
                while ($e = $Sel_Paises->fetch_assoc()) {
                  // Imprimir cada opción
                  echo '<option value="' . $e['id_pais'] . '">' . $e['Pais'] . '</option>';
              }
              echo '</select>';
            } else {
              // Manejar el caso en que la consulta no fue exitosa
              echo 'Error: ' . $conn->error;
            }
          ?>
          </div>
          <div class="col-6">
            <label for="input_idInstrumento" class="form-label">Intrumento:</label>
            <?php
            if ($Sel_Instrumentos) {
              echo '<select name="input_idInstrumento" class="form-select">';
                        // Iterar sobre los resultados
                while ($i = $Sel_Instrumentos->fetch_assoc()) {
                  // Imprimir cada opción
                  echo '<option value="' . $i['id_instrumento'] . '">' . $i['instrumento'] . '</option>';
              }
              echo '</select>';
            } else {
              // Manejar el caso en que la consulta no fue exitosa
              echo 'Error: ' . $conn->error;
            }
          ?>
          </div>
          <div class="col-6">
            <label for="input_idTipo" class="form-label">Tipo:</label>
            <?php
            if ($Sel_Tipos) {
              echo '<select name="input_idTipo" class="form-select">';
                while ($row = $Sel_Tipos->fetch_assoc()) {
                  // Imprimir cada opción
                  echo '<option value="' . $row['id_tipo_consorcio'] . '">' . $row['tipo'] . '</option>';
              }
              echo '</select>';
            } else {
              // Manejar el caso en que la consulta no fue exitosa
              echo 'Error: ' . $conn->error;
            }
          ?>
          </div>
          <div class="d-grid gap-2 d-md-flex">
            <button type="button" class="col-6 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="col-6 btn btn-success">Guardar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<?php
require '..//footer.php';
?>

<!--Modal_editar-->
<div class="modal fade" id="modal_editar_consorcio" tabindex="-1" aria-labelledby="modal_editar_consorcioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar pais</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="contenedor_editor"></div>
        </div>
    </div>
</div>

<script>
new DataTable('#consorcios', {
lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ], // Establece las opciones disponibles
pageLength: 50 // Establece el número de elementos por página por defecto
});

/*Para el modal que edita consorcio*/
$(document).ready(function() {
        $('.btn-editar-consorcio').click(function() {
            var id = $(this).data('bs-id');
            // Realizar la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: 'get_consorcio.php',
                data: { id: id },
                success: function(response) {
                    // Actualizar el contenido del modal con la respuesta
                    $('#contenedor_editor').html(response);
                },
                error: function(error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        });
    });

// Función para eliminar un consorcio
function baja_consorcio(idConsorcio) {
// Mostrar un mensaje de confirmación
if (confirm('¿Estás seguro de que deseas eliminar este consorcio?')) {
  // Realizar una solicitud AJAX para eliminar el consorcio en el servidor
  fetch('baja_consorcio.php?id=' + idConsorcio, {
    method: 'DELETE', // Puedes utilizar POST o DELETE según tu API
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al eliminar consorcio');
      }
      return response.json();
    })
    .then(data => {
      console.log('Eliminación exitosa:', data);
      // Recargar la tabla después de la eliminación
      location.reload();
    })
    .catch(error => {
      console.error('Error al eliminar consorcio:', error);
    });
}
}
</script>

