<?php 
require '../../_assets/conn.php';

//print_r($_POST);

if (isset($_POST['id'])) {
    $id_to_edit = $_POST['id'];
    $sql = "SELECT * FROM `consorcio` WHERE `id_consorcio` = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param('i', $id_to_edit);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                // Accede a los campos específicos de la fila
                $id_consorcio = $fila['id_consorcio'];
                $siglas = $fila['Siglas'];
                $nombre = $fila['Nombre'];
                $enlace = $fila['Enlace'];
                $id_tipo_consorcio = $fila['id_tipo_consorcio'];
                $id_procedencia = $fila['id_procedencia'];
                $id_instrumento = $fila['id_instrumento'];
            }
            //var_dump($id_consorcio,$siglas,$nombre,$enlace,$id_tipo_consorcio,$id_procedencia,$id_instrumento);
        } else {
            echo 'Error al ejecutar la consulta SQL.';
        }
    } else {
        echo 'Error al preparar la consulta SQL.';
    }

    $sqlPaises = "SELECT `id_pais`, `Pais` FROM `pais`;";
    $Sel_Paises = $conn->query($sqlPaises);
    
    $sqlInstrumentos = "SELECT `id_instrumento`, `instrumento` FROM `consorcio_instrumento`;";
    $Sel_Instrumentos = $conn->query($sqlInstrumentos);
    
    $sqlTipos = "SELECT `id_tipo_consorcio`, `tipo` FROM `consorcio_tipo`;";
    $Sel_Tipos = $conn->query($sqlTipos);

    //aca el modal con los datos
echo '<form id="editar" class="row g-3" action="actualizar_consorcio.php" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" id="update_this_id" name="update_this_id" value="'.$id_consorcio.'">
    <div class="col-12">
    <label for="edit_Enlace" class="form-label">Enlace:</label>
    <input type="text" class="form-control" name="edit_Enlace" value="'.$enlace.'">
  </div>
  <div class="col-12">
    <label for="edit_Nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" name="edit_Nombre" value="'.$nombre.'">
  </div>
  <div class="col-md-6">
    <label for="edit_Siglas" class="form-label">Siglas:</label>
    <input type="text" class="form-control" name="edit_Siglas" value="'.$siglas.'">
  </div>';
    if ($Sel_Paises) {
      echo '
      <div class="col-6">
        <label for="edit_idPais" class="form-label">Pais:</label><select name="edit_idPais" class="form-select">';
        while ($e = $Sel_Paises->fetch_assoc()) {
            $selected = ($e['id_pais'] == $id_procedencia) ? 'selected' : '';
            echo '<option value="' . $e['id_pais'] . '"' . $selected . '>' . $e['Pais'] . '</option>';    
      }
      echo '</select>';
    } else {
      // Manejar el caso en que la consulta no fue exitosa
      echo 'Error: ' . $conn->error;
    }
  
echo  '</div>
  <div class="col-6">
    <label for="edit_idInstrumento" class="form-label">Intrumento:</label>';
    if ($Sel_Instrumentos) {
      echo '<select name="edit_idInstrumento" class="form-select">';
                // Iterar sobre los resultados
        while ($i = $Sel_Instrumentos->fetch_assoc()) {
            // Imprimir cada opción con el atributo selected si coincide con el id actual
            $selected = ($i['id_instrumento'] == $id_instrumento) ? 'selected' : '';
            echo '<option value="' . $i['id_instrumento'] . '" ' . $selected . '>' . $i['instrumento'] . '</option>';
      }
      echo '</select>';
    } else {
      // Manejar el caso en que la consulta no fue exitosa
      echo 'Error: ' . $conn->error;
    }
echo  '</div>
  <div class="col-6">
    <label for="edit_idTipo" class="form-label">Tipo:</label>';
    if ($Sel_Tipos) {
      echo '<select name="edit_idTipo" class="form-select">';
        while ($row = $Sel_Tipos->fetch_assoc()) {
            // Imprimir cada opción con el atributo selected si coincide con el id actual
            $selected = ($row['id_tipo_consorcio'] == $id_tipo_consorcio) ? 'selected' : '';
            echo '<option value="' . $row['id_tipo_consorcio'] . '" ' . $selected . '>' . $row['tipo'] . '</option>';
      }
      echo '</select>';
    } else {
      // Manejar el caso en que la consulta no fue exitosa
      echo 'Error: ' . $conn->error;
    }
echo  '</div>
  <div class="d-grid gap-2 d-md-flex">
    <button type="button" class="col-6 btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
    <button type="submit" class="col-6 btn btn-success">Guardar</button>
  </div>
</form>';
} else {
    echo 'Error no existe id.';
}
?>