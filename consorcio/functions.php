<?php
function db(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ies";
   
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function select_all(){

$conn = db();

$sql = "SELECT * FROM consorcio";
$result = $conn->query($sql);
    echo "<table>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id_consorcio"]." - ".$row["Siglas"]."</td>";
    echo "<td>".$row["Nombre"]."</td>";
    echo "<td>".$row["Enlace"]."</td>";
    echo "<td>".$row["Tipo"]."</td>";
    echo "<td>".$row["Procedencia"]."</td>";
    echo "<td>".$row["Instrumento"]."</td>";
    echo '<td> <a href="view.php?id='.$row["id_consorcio"].'">Ver</a></td>';
    echo '<td> <a href="edit.php?id='.$row["id_consorcio"].'">Editar</a></td>';
    echo '<td> <a href="delete.php?id='.$row["id_consorcio"].'">Borrar</a></td>';
    echo "</tr>";
  }
} else {
  echo "0 results";
}

}


function view($id){
    
    $conn = db();

$sql = "SELECT * FROM consorcio WHERE id_consorcio = {$id}";
$result = $conn->query($sql);
    echo "<table>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id_consorcio"]." - ".$row["Siglas"]."</td>";
    echo "<td>".$row["Nombre"]."</td>";
    echo "<td>".$row["Enlace"]."</td>";
    echo "<td>".$row["Tipo"]."</td>";
    echo "<td>".$row["Procedencia"]."</td>";
    echo "<td>".$row["Instrumento"]."</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}
    
}


function insert($siglas, $nombre, $enlace, $tipo, $procedencia, $instrumento){
  $conn = db();
  $siglas = mysqli_real_escape_string($conn, $siglas);
  $nombre = mysqli_real_escape_string($conn, $nombre);
  $enlace = mysqli_real_escape_string($conn, $enlace);
  $tipo = mysqli_real_escape_string($conn, $tipo);
  $procedencia = mysqli_real_escape_string($conn, $procedencia);
  $instrumento = mysqli_real_escape_string($conn, $instrumento);
  // Insert data into the database
  $sql = "INSERT INTO consorcio (Nombre, Enlace, Tipo, Procedencia, Instrumento) VALUES ('$nombre', '$enlace', '$tipo', '$procedencia', '$instrumento')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

}


function edit($id)
{
    
  $conn = db();

  $sql = "SELECT * FROM consorcio WHERE id_consorcio = {$id}";
  $result = $conn->query($sql);
      echo "<table>";
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo '<html>
      <body>
          <form action="" method="post">
              <input type="text" name="siglas" placeholder="siglas" value="'.$row['Siglas'].'">
              <input type="text" name="nombre" placeholder="nombre" value="'.$row['Nombre'].'">
              <input type="text" name="enlace" placeholder="enlace" value="'.$row['Enlace'].'">
              <input type="text" name="tipo" placeholder="tipo" value="'.$row['Tipo'].'">
              <input type="text" name="procedencia" placeholder="procedencia" value="'.$row['Procedencia'].'">
              <input type="text" name="instrumento" placeholder="instrumento" value="'.$row['Instrumento'].'">
              <input type="submit" name="submit" value="Actualizar">
          </form> 
      </body>
  </html>
  ';
    }
  } else {
    echo "0 results";
  }
      
   
}



function update($id, $siglas, $nombre, $enlace, $tipo, $procedencia, $instrumento){
  $conn = db();
  $siglas = mysqli_real_escape_string($conn, $siglas);
  $nombre = mysqli_real_escape_string($conn, $nombre);
  $enlace = mysqli_real_escape_string($conn, $enlace);
  $tipo = mysqli_real_escape_string($conn, $tipo);
  $procedencia = mysqli_real_escape_string($conn, $procedencia);
  $instrumento = mysqli_real_escape_string($conn, $instrumento);
  // Insert data into the database
  $sql = "UPDATE consorcio SET Siglas = '$siglas', Nombre = '$nombre', Enlace = '$enlace', Tipo ='$tipo', Procedencia = '$procedencia', Instrumento = '$instrumento' WHERE id_consorcio = {$id}";

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

}


function delete($id){
   $conn = db();

$sql = "DELETE FROM consorcio WHERE id_consorcio = {$id}";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>