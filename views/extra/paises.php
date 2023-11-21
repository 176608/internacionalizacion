<?php
include('../../_assets/conn.php');
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

<!-- Modal WIP -->
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

<script>
    new DataTable('#paises_tabla');

    function refresh_paises() {
    location.reload();
    }

    document.getElementById('crear_pais_form').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    // Convertir FormData a objeto para imprimir
    var formObject = {};
    formData.forEach(function(value, key) {
        formObject[key] = value;
    });

    // Mostrar los datos del formulario en la consola
    //console.log(formObject);

    // Enviar los datos mediante AJAX
    fetch('views/extra/procesar_formulario.php', {
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

</script>
