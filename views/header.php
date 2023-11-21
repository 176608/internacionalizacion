<?php
include('head.php');
// Inicializa la variable de control para el enlace activo
//$enlaceActivo = 'visor';

// Verifica si se ha enviado un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enlace_elegido'])) {
    $enlaceActivo = $_POST['enlace_elegido'];

    // Redirecciona según el enlace seleccionado
    if ($enlaceActivo === 'crud') {
        header("Location: crud.php");
        $enlaceActivo = 'crud';
        exit(); // Asegura que el script se detenga después de la redirección
    } elseif ($enlaceActivo === 'visor') {
        header("Location: index.php");
        $enlaceActivo = 'visor';
        exit(); // Asegura que el script se detenga después de la redirección
    }
}
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UACJ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form method="post" action="">
                                <input type="hidden" name="enlace_elegido" value="crud">
                                <button class="nav-link" type="submit">
                                    CRUD
                                </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form method="post" action="">
                                <input type="hidden" name="enlace_elegido" value="visor">
                                <button class="nav-link" type="submit">
                                    Visor
                                </button>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
                    </ul>
                </div>
        </div>
    </nav>
</header>

