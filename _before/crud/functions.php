<?php

function db(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

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

$sql = "SELECT * FROM Productos";
$result = $conn->query($sql);
    echo "<table>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id"]." - ".$row["nombre"]."</td>";
     echo "<td>$".$row["precio"]."</td>";
    echo '<td> <img width="100px" src="'.$row["imagen"].'"></td>';
    echo '<td> <a href="view.php?id='.$row["id"].'">Ver</a></td>';
    echo '<td> <a href="edit.php?id='.$row["id"].'">Editar</a></td>';
    echo '<td> <a href="delete.php?id='.$row["id"].'">Borrar</a></td>';
    echo "</tr>";
  }
} else {
  echo "0 results";
}

}


function view($id){
    
    $conn = db();

$sql = "SELECT * FROM Productos WHERE id = {$id}";
$result = $conn->query($sql);
    echo "<table>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$row["id"]." - ".$row["nombre"]."</td>";
     echo "<td>".$row["precio"]."</td>";
    echo '<td> <img width="100px" src="'.$row["imagen"].'"></td>';
    echo "</tr>";
  }
} else {
  echo "0 results";
}
    
}


function insert($nombre, $precio, $imagen){
   $conn = db();
$nombre = mysqli_real_escape_string($conn, $nombre);
$precio = mysqli_real_escape_string($conn, $precio);
$imagen = mysqli_real_escape_string($conn, $imagen);
// Insert data into the database
$sql = "INSERT INTO Productos (nombre, precio, imagen) VALUES ('$nombre', '$precio', '$imagen')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


function edit($id)
{
    
     $conn = db();

$sql = "SELECT * FROM Productos WHERE id = {$id}";
$result = $conn->query($sql);
    echo "<table>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     echo '<html>
    <body>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Iphone / Samsung" value="'.$row['nombre'].'">
            <input type="text" name="precio" placeholder="4999.24" value="'.$row['precio'].'">
            <input type="text" name="imagen" placeholder="imagen.jpg" value="'.$row['imagen'].'">
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



function update($id, $nombre, $precio, $imagen){
   $conn = db();
$nombre = mysqli_real_escape_string($conn, $nombre);
$precio = mysqli_real_escape_string($conn, $precio);
$imagen = mysqli_real_escape_string($conn, $imagen);
// Insert data into the database
$sql = "UPDATE Productos SET nombre = '$nombre', precio = '$precio', imagen='$imagen' WHERE id = {$id}";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


function delete($id){
   $conn = db();

$sql = "DELETE FROM Productos WHERE id = {$id}";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}



?>