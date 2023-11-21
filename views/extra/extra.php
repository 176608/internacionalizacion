<?php
include('../../_assets/conn.php');
//echo "Estoy en extra.php"; 
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="container mt-3">

<div class="accordion mb-3" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
    <button id="paisesBoton" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        CRUD Paises
    </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div id="paises_e" class="accordion-body">
        
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button id="intrumentosBoton" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        CRUD Instrumentos
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div id="instrumentos_e" class="accordion-body" >
      
      
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button id="tiposBoton" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        CRUD Tipo de Consorcio
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div id="tipos_e" class="accordion-body">
    
    
    </div>
    </div>
  </div>
</div>

</div>
<script>
$(document).ready(function() {
    $('#paisesBoton').on('click', function() {
        // Realizar la solicitud AJAX
        $.ajax({
            type: 'GET',
            url: 'views/extra/paises.php',
            success: function(response) {
                // Actualizar el contenido del contenedor con la respuesta del servidor
                $('#paises_e').html(response);
            },
            error: function(error) {
                console.log('Error en la solicitud AJAX: ' + error);
            }
        });
    });
});

$(document).ready(function() {
    $('#intrumentosBoton').on('click', function() {
        // Realizar la solicitud AJAX
        $.ajax({
            type: 'GET',
            url: 'views/extra/instrumentos.php',
            success: function(response) {
                // Actualizar el contenido del contenedor con la respuesta del servidor
                $('#instrumentos_e').html(response);
            },
            error: function(error) {
                console.log('Error en la solicitud AJAX: ' + error);
            }
        });
    });
});

$(document).ready(function() {
    $('#tiposBoton').on('click', function() {
        // Realizar la solicitud AJAX
        $.ajax({
            type: 'GET',
            url: 'views/extra/tipos.php',
            success: function(response) {
                // Actualizar el contenido del contenedor con la respuesta del servidor
                $('#tipos_e').html(response);
            },
            error: function(error) {
                console.log('Error en la solicitud AJAX: ' + error);
            }
        });
    });
});
</script>

