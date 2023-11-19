<style>
    table{
        border:1px solid black;
    }
    td{
        border:1px solid black;
    }
</style>
 
<?php
 include 'functions.php';
?>

<html>
    <body>
        <a  href="insert.php"><button class="button">Agregar registro</button></a>
        <?php echo select_all();?>
    </body>
</html>