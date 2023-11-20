<!DOCTYPE html>
<html lang="en">
<?php
    include_once '../static/head.php';
    include 'functions.php';
?>
<body>
<?php include_once '../static/navbar.php'; ?>
<div id="page-container">

    <div id="content-wrap">
        <div class="jumbotron">
        <div class="container text-center">
            <h1>CATÁLOGO</h1>      
            <p>para Instituciones de Educación a nivel Superior</p>
        </div>
        </div>
        
        <div class="text-center">    
            <h1>Consorcio</h1><br>
            <a href="insert.php"><button class="button" role = "button">Agregar registro</button></a>
            <div id="tabla">
            <?php echo select_all(); ?>
            </div>
        </div><br><br>
    </div>
    <?php include_once '../static/footer.php' ?>
</div>
</body>
</html>