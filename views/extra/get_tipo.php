<?php 
require '../../_assets/conn.php';
//print_r($_POST);

if (isset($_POST['id'])) {
    $idtipo = $_POST['id'];
    $sql = "SELECT id_tipo_consorcio, tipo FROM consorcio_tipo WHERE id_tipo_consorcio = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param('i', $idtipo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                // Accede a los campos específicos de la fila
                $id_tipo_consorcio = $fila['id_tipo_consorcio'];
                $tipo = $fila['tipo'];
            }
        } else {
            echo 'Error al ejecutar la consulta SQL.';
        }
    } else {
        echo 'Error al preparar la consulta SQL.';
    }
    //aca el modal con los datos
echo '<form id="editar" action="update_tipo.php" method="post" enctype="multipart/form-data">
<div class="input-group">
    <input type="hidden" class="form-control" id="update_this_id" name="update_this_id" value="'.$id_tipo_consorcio.'">
    <div class="input-group-text">tipo:</div>
    <input type="text" class="form-control" id="edit_tipo"
        name="edit_tipo" value="' . $tipo . '">
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


