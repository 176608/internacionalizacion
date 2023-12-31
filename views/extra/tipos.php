<?php
require '../../_assets/conn.php';
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
                <td> <button class="btn-editar-tipo" data-bs-toggle="modal" data-bs-target="#modal_editar_tipo" data-bs-id="' . $fila['id_tipo_consorcio'] . '">Editar</button> </td>
                <td> <button onclick="eliminarTipo(' . $fila['id_tipo_consorcio'] . ')">Eliminar</button> </td>
            </tr>';
    }

    // Cerrar la tabla HTML
    echo '</tbody>
        </table>';
} else {
    // Manejar el caso en que la consulta no fue exitosa
    echo 'Error en la consulta: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!-- Modal CREATE -->
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

<!--Modal_editar-->
<div class="modal fade" id="modal_editar_tipo" tabindex="-1" aria-labelledby="modal_editar_tipoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Tipo de consorcio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="contenedor_editor"></div>
        </div>
    </div>
</div>

<script>
   new DataTable('#tipos_tabla', {
    lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ], // Establece las opciones disponibles
    pageLength: 100 // Establece el número de elementos por página por defecto
});

    function enviarTipo() {
  // Obtener el valor del input
  var tipo = document.getElementById('insert_tipos').value;

  // Verificar si el valor no está vacío
  if (tipo.trim() !== '') {
    // Enviar los datos mediante AJAX
    fetch('procesar_formulario.php', {
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

$(document).ready(function() {
        $('.btn-editar-tipo').click(function() {
            var idTipo = $(this).data('bs-id');

            // Realizar la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: 'get_tipo.php',
                data: { id: idTipo },
                success: function(response) {
                    // Actualizar el contenido del modal con la respuesta
                    $('#contenedor_editor').html(response);

                    // Mostrar el modal
                    //$('#modal_editar_tipo').modal('show');
                },
                error: function(error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        });
    });

function eliminarTipo(idTipo) {
  // Mostrar un mensaje de confirmación
  if (confirm('¿Estás seguro de que deseas eliminar este Tipo de consorcio?')) {
    // Realizar una solicitud AJAX para eliminar el Tipo en el servidor
    fetch('eliminar_tipo.php?id=' + idTipo, {
      method: 'DELETE', // Puedes utilizar POST o DELETE según tu API
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Error al eliminar Tipo');
        }
        return response.json();
      })
      .then(data => {
        console.log('Eliminación exitosa:', data);
        // Recargar la tabla después de la eliminación
        location.reload();
      })
      .catch(error => {
        console.error('Error al eliminar Tipo:', error);
      });
  }
}
</script>