<?php
require '../../_assets/conn.php';
$query_paises = "SELECT id_pais, Pais FROM pais";
$resultado_paises = mysqli_query($conn, $query_paises); ?>

<div class="container d-grid gap-2 mb-2"><button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#crear_Pais">Agregar Pais </button></div>

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
                <td> <button class="btn-editar-pais" data-bs-toggle="modal" data-bs-target="#modal_editar_pais" data-bs-id="' . $fila['id_pais'] . '">Editar</button></td>
                <td> <button onclick="eliminarPais(' . $fila['id_pais'] . ')">Eliminar</button> </td>
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
<div class="modal fade" id="crear_Pais" tabindex="-1" aria-labelledby="crear_PaisLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="crear_PaisLabel">Formulario para agregar paises.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form id="crear_pais_form" action="" method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <label class="visually-hidden" for="insert_pais">pais</label>
        <div class="input-group col-9">
            <div class="input-group-text">Pais:</div>
            <input type="text" class="form-control" id="insert_pais" name="insert_pais" placeholder="Escribe el nombre del pais a agregar...">
        </div>
        <div class="btn-group" role="group" aria-label="btn-group">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" onclick="refresh_paises()" data-bs-dismiss="modal">Enviar</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!--Modal_editar-->
<div class="modal fade" id="modal_editar_pais" tabindex="-1" aria-labelledby="modal_editar_paisLabel" aria-hidden="true">
    <div class="modal-dialog">
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
    new DataTable('#paises_tabla', {
    lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ], // Establece las opciones disponibles
    pageLength: 100 // Establece el número de elementos por página por defecto
});

    function refresh_paises() {
    location.reload();
    }

/*Para el modal Editar*/
$(document).ready(function() {
        $('.btn-editar-pais').click(function() {
            var idPais = $(this).data('bs-id');
            //console.log('entre1');
            // Realizar la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: 'get_pais.php',
                data: { id: idPais },
                success: function(response) {
                    // Actualizar el contenido del modal con la respuesta
                    $('#contenedor_editor').html(response);
                    //console.log('entre2');
                },
                error: function(error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        });
    });

    document.getElementById('crear_pais_form').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    var formObject = {};
    formData.forEach(function(value, key) {
        formObject[key] = value;
    });

    // Enviar los datos mediante AJAX
    fetch('procesar_formulario.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la solicitud AJAX: ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        //console.log(data);
        // Puedes manejar la respuesta según tus necesidades
    })
    .catch(error => {
        console.error('Error al enviar datos:', error);
    });
});

// Función para eliminar un país
function eliminarPais(idPais) {
// Mostrar un mensaje de confirmación
if (confirm('¿Estás seguro de que deseas eliminar este país?')) {
  // Realizar una solicitud AJAX para eliminar el país en el servidor
  fetch('eliminar_pais.php?id=' + idPais, {
    method: 'DELETE', // Puedes utilizar POST o DELETE según tu API
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al eliminar país');
      }
      return response.json();
    })
    .then(data => {
      console.log('Eliminación exitosa:', data);
      // Recargar la tabla después de la eliminación
      location.reload();
    })
    .catch(error => {
      console.error('Error al eliminar país:', error);
    });
}
}

</script>
