<?php
require '../../_assets/conn.php';
require '../header.php';
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="container mt-3">

<div class="accordion mb-3" id="accordionExtra">
  <div class="accordion-item">
    <h2 class="accordion-header">
    <button id="paisesBoton" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        CRUD Paises
    </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExtra">

      <div id="paises_e" class="accordion-body"></div>

    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button id="intrumentosBoton" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        CRUD Instrumentos
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExtra">

      <div id="instrumentos_e" class="accordion-body" ></div>

    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button id="tiposBoton" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        CRUD Tipo de Consorcio
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExtra">

      <div id="tipos_e" class="accordion-body"></div>

    </div>
  </div>
</div>

</div>

<script>
$(document).ready(function() {

  function cargarVista(url, contenedor) {
    // Realizar la solicitud AJAX
    $.ajax({
        type: 'GET',
        url: url,
        success: function(response) {
            // Actualizar el contenido del contenedor con la respuesta del servidor
            contenedor.html(response);
        },
        error: function(error) {
            console.log('Error en la solicitud AJAX: ' + error);
        }
    });
}

// Función para destruir la vista actual
function destruirVista(contenedor) {
    contenedor.empty();
}

// Configuración de eventos de clic
$('#paisesBoton').on('click', function() {
    destruirVista($('#instrumentos_e'));
    destruirVista($('#tipos_e'));
    cargarVista('paises.php', $('#paises_e'));
});

$('#intrumentosBoton').on('click', function() {
    destruirVista($('#paises_e'));
    destruirVista($('#tipos_e'));
    cargarVista('instrumentos.php', $('#instrumentos_e'));
});

$('#tiposBoton').on('click', function() {
    destruirVista($('#paises_e'));
    destruirVista($('#instrumentos_e'));
    cargarVista('tipos.php', $('#tipos_e'));
});

});

</script>

<?php
require '..//footer.php';
?>