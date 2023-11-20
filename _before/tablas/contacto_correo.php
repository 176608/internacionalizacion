<style>
    table{
        border:1px solid black;
    }
    td{
        border:1px solid black;
    }
</style>
 
<?php
require_once("../db.php");
/*
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
*/
 
$sql = "SELECT * FROM contacto_correo";
$result = $conn->query($sql);
    echo "<table>";
if ($result !== false && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 
    echo "<tr>";
    echo "<td>".$row["correo_electronico"]." - ".$row["Fecha_alta"]."</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>