<?php 
require '../../_assets/conn.php';

//print_r($_POST);

if (isset($_POST['id'])) {
    $idInstrumento = $_POST['id'];
    $sql = "SELECT id_instrumento, instrumento FROM consorcio_instrumento WHERE id_instrumento = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param('i', $idInstrumento);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                // Accede a los campos específicos de la fila
                $id_instrumento = $fila['id_instrumento'];
                $instrumento = $fila['instrumento'];
            }
        } else {
            echo 'Error al ejecutar la consulta SQL.';
        }
    } else {
        echo 'Error al preparar la consulta SQL.';
    }
    //aca el modal con los datos
echo '<form id="editar" action="update_instrumento.php" method="post" enctype="multipart/form-data">
<div class="input-group">
    <input type="hidden" class="form-control" id="update_this_id" name="update_this_id" value="'.$id_instrumento.'">
    <div class="input-group-text">Instrumento:</div>
    <input type="text" class="form-control" id="edit_instrumento"
        name="edit_instrumento" value="' . $instrumento . '">
</div>
</div>
<div class="modal-footer">
    <div class="btn-group" role="group" aria-label="btn-group">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>';
} else {
    echo 'Error no existe id.';
}

?>


