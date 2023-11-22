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
                <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_editar_pais" data-bs-id="' . $fila['id_pais'] . '">Editar</button></td>
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

<div class="modal fade" id="modal_editar_pais" tabindex="-1" aria-labelledby="modal_editar_paisLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_editar_paisLabel">Editar registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_pais.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" id="id_to_edit" name="id_to_edit" value="">

                    <div class="mb-2">
                        <label for="inputPais" class="form-label">Pais:</label>
                        <input type="text" name="inputPais" id="inputPais" class="form-control form-control-sm" required>
                    </div>

                    <div class="d-flex justify-content-end pt2">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal" onclick="putdown_modal()">Cerrar</button>
                        <button type="submit" class="btn btn-primary ms-1" onclick="putdown_modal()" > Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    new DataTable('#paises_tabla');

    function refresh_paises() {
    location.reload();
    }

    function putdown_modal() {
        // Cerrar el modal
        var modal = new bootstrap.Modal(document.getElementById('modal_editar_pais'));
        modal.hide();
    }

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

/*Para el modal Editar*/
let modal_editar_pais = new bootstrap.Modal(document.getElementById('modal_editar_pais'));

modal_editar_pais = document.getElementById('modal_editar_pais')

modal_editar_pais.addEventListener('hide.bs.modal', event => {
            modal_editar_pais.querySelector('.modal-body #inputPais').value = ""
            //modal_editar_pais.querySelector('.modal-body #descripcion').value = ""
        })

modal_editar_pais.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')
    //let id = modal_editar_pais.querySelector('.modal-body #id_to_edit')
    let inputPais = modal_editar_pais.querySelector('.modal-body #inputPais')
    let url = "get_pais.php"
    let formData = new FormData()
    formData.append('id', id)
    fetch(url, {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
      //console.log(data);
        id_to_edit.value = data.id_pais
        inputPais.value = data.Pais
    })
    .catch(err => console.error('Error fetching data:', err));
})


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
