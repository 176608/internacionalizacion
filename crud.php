<?php
include('views/header.php');
include('_assets/conn.php');
?>

<!-- Cuerpo -->
<div class="container-fluid">
 
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <title>Bootstrap</title>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
  <symbol id="home" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
  </symbol>
  <symbol id="speedometer2" viewBox="0 0 16 16">
    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
  </symbol>
  <symbol id="table" viewBox="0 0 16 16">
    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
  </symbol>
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
  <symbol id="grid" viewBox="0 0 16 16">
    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
  </symbol>
</svg>
<!--https://icons.getbootstrap.com/-->
<main class="d-flex flex-nowrap">
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center" id="lista_selector">
      <li class="nav-item">
        <a id="li-consorcio" href="views/consorcio/consorcio.php" onclick="cambiarClase(1)" class="nav-link py-3 border-bottom rounded-0" aria-current="page" title="Consorcios" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Consorcios"><use xlink:href="#home"/></svg>
        </a>
      </li>
      <li>
        <a id="li-extra" href="views/extra/extra.php" onclick="cambiarClase(2)"  class="nav-link py-3 border-bottom rounded-0" title="Extras" >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" role="img" aria-label="Extras" class="bi bi-bank pe-none" viewBox="0 0 16 16">
          <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
        </svg>
        </a>
      </li>
      <li>
        <a id="li-evento" href="views/evento/evento.php" onclick="cambiarClase(3)" class="nav-link py-3 border-bottom rounded-0" title="Eventos" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Eventos"><use xlink:href="#table"/></svg>
        </a>
      </li>
      <li>
        <a id="li-ies" href="views/ies/ies.php" onclick="cambiarClase(4)" class="nav-link py-3 border-bottom rounded-0" title="IES" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="IES"><use xlink:href="#grid"/></svg>
        </a>
      </li>
      <li>
        <a id="li-contacto" href="views/contacto/contacto.php" onclick="cambiarClase(5)" class="nav-link py-3 border-bottom rounded-0" title="Contactos" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Contactos"><use xlink:href="#people-circle"/></svg>
        </a>
      </li>
    </ul>

    <!--Aqui comienza el visor CRUD de las entidades-->
<div class="container-fluid" id="vistas">

<?php //echo $vista_actual;?>

<ul class="nav nav-pills nav-flush flex-column mb-auto text-center" id="lista_selector">
      <li class="nav-item">
        <a href="views/consorcio/consorcio.php" onclick="cambiarClase(1)" class="nav-link py-3 border-bottom rounded-0" aria-current="page" title="Consorcios" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Consorcios"><use xlink:href="#none"/></svg> Consorcios
        </a>
      </li>
      <li>
        <a href="views/extra/extra.php"  onclick="cambiarClase(2)" class="nav-link py-3 border-bottom rounded-0" title="Extras" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Extras"><use xlink:href="#none"/></svg> Intrumentos, Paises, Tipo de Consorcios
        </a>
      </li>
      <li>
        <a href="views/evento/evento.php" onclick="cambiarClase(3)" class="nav-link py-3 border-bottom rounded-0" title="Eventos" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Eventos"><use xlink:href="#none"/></svg> Eventos
        </a>
      </li>
      <li>
        <a href="views/ies/ies.php" onclick="cambiarClase(4)" class="nav-link py-3 border-bottom rounded-0" title="IES" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="IES"><use xlink:href="#none"/></svg> IES, Campus, Departamentos
        </a>
      </li>
      <li>
        <a href="views/contacto/contacto.php" onclick="cambiarClase(5)" class="nav-link py-3 border-bottom rounded-0" title="Contactos" >
          <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Contactos"><use xlink:href="#none"/></svg> Contactos
        </a>
      </li>
    </ul>

</div>

</main>
</div>

<script>
$(document).ready(function() {
    // Manejar clic en elementos de la lista
    $("#lista_selector a").click(function(e) {
        e.preventDefault(); // Evitar el comportamiento predeterminado del enlace

        // Obtener el atributo href del enlace clicado
        var vistaURL = $(this).attr("href");

        // Cargar la vista en el contenedor con id "vistas" utilizando AJAX
        $("#vistas").load(vistaURL);
    });
});
/*function cambiarClase(opcion) {
    // Obtén el elemento por su ID
    var vista

    // Agrega la clase correspondiente según la opción
    if (opcion === 1) {
      vista = document.getElementById("li-consorcio");
        vista.classList.add('Active');
    } else if (opcion === 2) {
      vista = document.getElementById("li-extra");
        vista.classList.add('Active');
    }else if (opcion === 3) {
      vista = document.getElementById("li-evento");
        vista.classList.add('Active');
    }else if (opcion === 4) {
      vista = document.getElementById("li-ies");
        vista.classList.add('Active');
    }else if (opcion === 5) {
      vista = document.getElementById("li-contacto");
        vista.classList.add('Active');
    }
}*/

</script>

<?php
include('views/footer.php');
?>