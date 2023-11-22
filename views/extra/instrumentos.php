<?php
require '../../_assets/conn.php';
    $query_instrumentos = "SELECT id_instrumento, instrumento FROM consorcio_instrumento";
    $resultado_instrumentos = mysqli_query($conn, $query_instrumentos);

    ?>

    <div class="container d-grid gap-2 mb-2"><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#crear_instrumento">Agregar Instrumento </button></div>
    
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
                    <td> <button onclick="eliminar_instrumento(' . $fila['id_instrumento'] . ')">Eliminar</button> </td>
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

<!-- Modal CREATE -->
<div class="modal fade" id="crear_instrumento" tabindex="-1" aria-labelledby="crear_instrumentoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="crear_instrumentoLabel">Formulario para agregar intrumentos.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form id="crear_instrumento_form" action="" method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <label class="visually-hidden" for="insert_instrumento">Instrumento</label>
        <div class="input-group col-9">
            <div class="input-group-text">Instrumento:</div>
            <input type="text" class="form-control" id="insert_instrumento" name="insert_instrumento" placeholder="Escribe el Instrumento a agregar...">
        </div>
        <div class="btn-group" role="group" aria-label="btn-group">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" onclick="enviar_ins()" data-bs-dismiss="modal">Enviar</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
    new DataTable('#instrumentos_tabla');

    function enviar_ins() {
    // Obtener el valor del input
    var instrumento = document.getElementById('insert_instrumento').value;

    // Verificar si el valor no está vacío
    if (instrumento.trim() !== '') {
        // Enviar los datos mediante AJAX
        fetch('procesar_formulario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'insert_instrumento=' + encodeURIComponent(instrumento),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la solicitud AJAX: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            // Puedes manejar la respuesta según tus necesidades
        })
        .catch(error => {
            console.error('Error al enviar datos:', error);
        })
        .finally(() => {
            // Recargar la página
            location.reload();
        });
    } else {
        console.error('El campo instrumento no puede estar vacío');
    }
}

function eliminar_instrumento(idInstrumento) {
  // Mostrar un mensaje de confirmación
  if (confirm('¿Estás seguro de que deseas eliminar este instrumento de consorcio?')) {
    // Realizar una solicitud AJAX para eliminar el instrumento en el servidor
    fetch('eliminar_instrumento.php?id=' + idInstrumento, {
      method: 'DELETE', // Puedes utilizar POST o DELETE según tu API
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Error al eliminar instrumento');
        }
        return response.json();
      })
      .then(data => {
        console.log('Eliminación exitosa:', data);
        // Recargar la tabla después de la eliminación
        location.reload();
      })
      .catch(error => {
        console.error('Error al eliminar instrumento:', error);
      });
  }
}
</script>