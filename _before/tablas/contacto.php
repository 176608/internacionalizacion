<style>
    table{
        border:1px solid black;
    }
    td{
        border:1px solid black;
    }
</style>
 
<?php
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
 
$sql = "SELECT * FROM contacto";
$result = $conn->query($sql);
    echo "<table>";
if ($result !== false && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 
    echo "<tr>";
    echo "<td>".$row["id_contacto"]." - ".$row["Nombre"]."</td>";
    echo "<td>".$row["Cargo"]."</td>";
    echo "<td>".$row["Telefono"]."</td>";
    echo "<td>".$row["NumeroCelular"]."</td>";
    /*echo "<td>".$row["Departamento"]."</td>";
    echo "<td>".$row["Fecha_Alta"]."</td>";
    echo '<td> <img width="100px" src="'.$row["imagen"].'"></td>';*/
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>