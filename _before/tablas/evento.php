<style>
    table{
        border:1px solid black;
    }
    td{
        border:1px solid black;
    }
</style>
 
<?php
require_once '../db.php';
 
$sql = "SELECT * FROM evento";
$result = $conn->query($sql);
    echo "<table>";
if ($result !== false && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 
    echo "<tr>";
    echo "<td>".$row["id_evento"]." - ".$row["Nombre"]."</td>";;
    echo "<td>".$row["Fecha"]."</td>";
    echo "<td>".$row["Comentarios"]."</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>