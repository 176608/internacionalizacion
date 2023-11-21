
<?php
include('views/header.php');
include('_assets/conn.php');
?>

<!-- Cuerpo -->
<div class="container-fluid">
    <h1>Hola, mundo!</h1>
    <p>Index.</p>
</div>

<!-- Tabla de prueba -->
<div class="container-fluid">
<?php
$query = "SELECT id_consorcio, Siglas, Nombre, Enlace FROM consorcio";
$resultado = mysqli_query($conn, $query);
if ($resultado) {
// Iniciar la tabla HTML
echo '<table class="table" id="test" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Siglas</th>
                <th scope="col">Nombre</th>
                <th scope="col">Enlace</th>
            </tr>
        </thead>
        <tbody>';
// Iterar sobre los resultados
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo '<tr>
            <td>' . $fila['id_consorcio'] . '</td>
            <td>' . $fila['Siglas'] . '</td>
            <td>' . $fila['Nombre'] . '</td>
            <td>' . $fila['Enlace'] . '</td>
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

</div>

<script>
new DataTable('#test');
</script>


<?php
include('views/footer.php');
?>

