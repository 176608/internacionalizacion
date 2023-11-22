<?php 
require '../../_assets/conn.php';

//print_r($_POST);

if (isset($_POST['id'])) {
    $idPais = $_POST['id'];
    $sql = "SELECT id_pais, Pais FROM pais WHERE id_pais = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param('i', $idPais);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                // Accede a los campos específicos de la fila
                $id_pais = $fila['id_pais'];
                $Pais_editado = $fila['Pais'];
            }
        } else {
            echo 'Error al ejecutar la consulta SQL.';
        }
    } else {
        echo 'Error al preparar la consulta SQL.';
    }
    //aca el modal con los datos
echo '<form id="editar" action="update_pais.php" method="post" enctype="multipart/form-data">
<div class="input-group">
    <input type="hidden" class="form-control" id="update_this_id" name="update_this_id" value="'.$id_pais.'">
    <div class="input-group-text">pais:</div>
    <input type="text" class="form-control" id="edit_pais"
        name="edit_pais" value="' . $Pais_editado . '">
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

/*
                <form action="update_pais.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id_to_edit" name="id_to_edit" value="">

                    <div class="mb-2">
                        <label for="inputPais" class="form-label">Pais:</label>
                        <input type="text" name="inputPais" id="inputPais" class="form-control form-control-sm" required>
                    </div>

                    <div class="d-flex justify-content-end pt2">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary ms-1" > Guardar</button>
                    </div>
                </form>
*/
?>


